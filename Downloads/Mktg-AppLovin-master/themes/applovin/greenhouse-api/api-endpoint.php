<?php

namespace GreenhouseApi;

use WP_REST_Request;
use WP_REST_Response;

class ApiEndpoints {
    public static function register_endpoints() {
        // Register the /wp-json/greenhouse/v1/jobs endpoint
        register_rest_route('greenhouse/v1', '/jobs', array(
            'methods' => 'GET',
            'callback' => [self::class, 'get_jobs'],
        ));

        // Register the /wp-json/greenhouse/v1/filters endpoint
        register_rest_route('greenhouse/v1', '/filters', array(
            'methods' => 'GET',
            'callback' => [self::class, 'get_filters'],
        ));
    }

    // This function is called when the /wp-json/greenhouse/v1/jobs endpoint is hit
    public static function get_jobs(WP_REST_Request $request) {
        $department = $request->get_param('department');         // Get the department parameter from the request
        $location = $request->get_param('location');             // Get the location parameter from the request
        $work_sub_type = $request->get_param('work_sub_type');   // Get the work_sub_type parameter from the request

        $router = new MainApiRouter();                           // Create a new instance of the MainApiRouter class
        $jobsData = $router->fetchJobs();                        // Fetch the jobs data from the Greenhouse API

        if (isset($jobsData['error'])) {
            return new WP_REST_Response(['error' => $jobsData['error']], 500);  // Return an error response if there was an error fetching the jobs data
        }

        // Filter the jobs based on the department, location, and work_sub_type parameters
        $jobs = [];
        if (isset($jobsData['jobs']) && is_array($jobsData['jobs'])) {
            // Loop through each job to fetch the job details
            foreach ($jobsData['jobs'] as $job) {
                $jobDetails = $router->fetchJobDetails($job['id']);
                // If there was no error fetching the job details
                if (!isset($jobDetails['error'])) {
                    $matchesDepartment = !$department || in_array($department, array_column($jobDetails['departments'], 'id')); // Check if the department matches
                    $matchesLocation = !$location || $jobDetails['location']['name'] === $location; // Check if the location matches
                    $workSubTypeValues = array_column(array_filter($jobDetails['metadata'], function($meta) { return $meta['name'] === 'Worker Sub-Type'; }), 'value'); // Get the work sub type values
                    $matchesWorkSubType = !$work_sub_type || (empty($workSubTypeValues) && $work_sub_type === '') || in_array($work_sub_type, $workSubTypeValues); // Check if the work sub type matches

                    // If the department, location, and work sub type match, add the job to the jobs array
                    if ($matchesDepartment && $matchesLocation && $matchesWorkSubType) {
                        $jobs[] = $jobDetails; 
                    }
                }
            }
        }

        return new WP_REST_Response(['jobs' => $jobs], 200);
    }

    // This function is called when the /wp-json/greenhouse/v1/filters endpoint is hit
    public static function get_filters(WP_REST_Request $request) {
        $router = new MainApiRouter(); // Create a new instance of the MainApiRouter class
        $jobsData = $router->fetchJobs(); // Fetch the jobs data from the Greenhouse API

        if (isset($jobsData['error'])) {
            return new WP_REST_Response(['error' => $jobsData['error']], 500); // Return an error response if there was an error fetching the jobs data
        }

        $departments = [];   // Initialize an empty array to store the departments
        $locations = [];     // Initialize an empty array to store the locations
        $workSubTypes = [];  // Initialize an empty array to store the work sub types
        $relationships = [
            'departments' => [],
            'locations' => [],
            'wporkSubtypes' => [],
        ]; // Initialize array to store the relationships between departments, locations, and work sub types

        // Loop through the jobs data to extract the departments, locations, and work sub types
        if (isset($jobsData['jobs']) && is_array($jobsData['jobs'])) {
            // Loop through each job to fetch the job details
            foreach ($jobsData['jobs'] as $job) {
                $jobDetails = $router->fetchJobDetails($job['id']);
                // If there was no error fetching the job details
                if (!isset($jobDetails['error'])) {
                    // Loop through the departments of the job
                    foreach ($jobDetails['departments'] as $department) {
                        $departments[$department['id']] = $department['name'];  // Store the department id and name in the departments array
                    }
                    // Store the location name in the locations array
                    $locations[$jobDetails['location']['name']] = $jobDetails['location']['name']; 
                    // Loop through the metadata of the job
                    foreach ($jobDetails['metadata'] as $metadata) {
                        if ($metadata['name'] === 'Worker Sub-Type' && !empty($metadata['value'])) {
                            $workSubTypes[$metadata['value']] = $metadata['value'];  // Store the work sub type value in the work sub types array
                        }
                    }

                    $departmentIds = array_column($jobDetails['departments'], 'id'); // Get the department ids of the job
                    $locationName = $jobDetails['location']['name']; // Get the location name of the job
                    $workSubTypeValues = array_column(array_filter($jobDetails['metadata'], function($meta) {
                        return $meta['name'] === 'Worker Sub-Type';
                    }), 'value'); // Get the work sub type values of the job

                    foreach ($departmentIds as $departmentId) {
                        if (!isset($relationships['departments'][$departmentId])) {
                            $relationships['departments'][$departmentId] = ['locations' => [], 'workSubTypes' => []];
                        } // Initialize the department relationship array if it doesn't exist
                        if (!in_array($locationName, $relationships['departments'][$departmentId]['locations'])) {
                            $relationships['departments'][$departmentId]['locations'][] = $locationName;
                        } // Add the location to the department relationship array if it doesn't exist
                        foreach ($workSubTypeValues as $workSubTypeValue) {
                            if (!in_array($workSubTypeValue, $relationships['departments'][$departmentId]['workSubTypes'])) {
                                $relationships['departments'][$departmentId]['workSubTypes'][] = $workSubTypeValue; 
                            } // Add the work sub type to the department relationship array if it doesn't exist
                        }
                    }

                    foreach ($workSubTypeValues as $workSubType) {
                        if (!isset($relationships['workSubTypes'][$workSubType])) {
                            $relationships['workSubTypes'][$workSubType] = ['departments' => [], 'locations' => []];
                        } // Initialize the work sub type relationship array if it doesn't exist
                        foreach ($departmentIds as $departmentId) {
                            if (!in_array($departmentId, $relationships['workSubTypes'][$workSubType]['departments'])) {
                                $relationships['workSubTypes'][$workSubType]['departments'][] = $departmentId;
                            }  // Add the department to the work sub type relationship array if it doesn't exist
                        }
                        if (!in_array($locationName, $relationships['workSubTypes'][$workSubType]['locations'])) {
                            $relationships['workSubTypes'][$workSubType]['locations'][] = $locationName;
                        } // Add the location to the work sub type relationship array if it doesn't exist
                    }

                    if (!isset($relationships['locations'][$locationName])) {
                        $relationships['locations'][$locationName] = ['departments' => [], 'workSubTypes' => []];
                    } // Initialize the location relationship array if it doesn't exist
                    foreach ($departmentIds as $departmentId) {
                        if (!in_array($departmentId, $relationships['locations'][$locationName]['departments'])) {
                            $relationships['locations'][$locationName]['departments'][] = $departmentId;
                        } // Add the department to the location relationship array if it doesn't exist
                    }
                    foreach ($workSubTypeValues as $workSubTypeValue) {
                        if (!in_array($workSubTypeValue, $relationships['locations'][$locationName]['workSubTypes'])) {
                            $relationships['locations'][$locationName]['workSubTypes'][] = $workSubTypeValue;
                        } // Add the work sub type to the location relationship array if it doesn't exist
                    }

                }
            }
        }

        // Sort the departments, locations, and work sub types arrays
        return new WP_REST_Response([
            'departments' => $departments,
            'locations' => $locations,
            'workSubTypes' => $workSubTypes,
            'relationships' => $relationships,
        ], 200);  
    }
}

add_action('rest_api_init', ['GreenhouseApi\ApiEndpoints', 'register_endpoints']);
