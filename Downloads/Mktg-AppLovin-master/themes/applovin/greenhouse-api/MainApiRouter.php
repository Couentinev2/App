<?php

namespace GreenhouseApi; // Define the namespace for the class

use MyApp\ErrorHandling\ErrorHandler; // Import the ErrorHandler class
use GuzzleHttp\Client; // Import the GuzzleHttp\Client class

// Set the global exception handler from your ErrorHandler class
set_exception_handler([ErrorHandler::class, 'handleException']);

// Throw the exception to test
// throw new Exception("Test Exception to trigger handler");

class MainApiRouter {
    private $client; // GuzzleHttp\Client instance
    private $apiUrl = 'https://boards-api.greenhouse.io/v1/boards/applovin/jobs'; // Greenhouse API URL
    private $cacheExpiration = 1 * HOUR_IN_SECONDS; // Cache expiration time in seconds

    // Constructor to initialize the GuzzleHttp\Client instance
    public function __construct() {
        $this->client = new Client();
    }

    // Function to fetch the jobs data from the Greenhouse API
    public function fetchJobs() {
        $cache_key = 'greenhouse_jobs_data';   // Cache key for the jobs data
        $jobsData = get_transient($cache_key); // Get the jobs data from the cache

        // If the jobs data is not in the cache, fetch it from the Greenhouse API
        if ($jobsData === false) {
            try {
                $response = $this->client->request('GET', $this->apiUrl); // Make a GET request to the Greenhouse API
                // If the response status code is 200, decode the response body and cache the jobs data
                if ($response->getStatusCode() === 200) {
                    $jobsData = json_decode($response->getBody(), true);
                    set_transient($cache_key, $jobsData, $this->cacheExpiration); // Cache for 12 hours
                } else {
                    return ['error' => 'Failed to fetch job data']; // Return an error if the response status code is not 200
                }
            } catch (\Exception $e) {
                return ['error' => $e->getMessage()]; // Return an error if an exception occurs
            }
        }

        return $jobsData; // Return the jobs data
    }

    // Function to fetch the details of a specific job by its ID
    public function fetchJobDetails($jobId) {
        $cache_key = 'greenhouse_job_' . $jobId; // Cache key for the job details
        $jobDetails = get_transient($cache_key); // Get the job details from the cache

        // If the job details are not in the cache, fetch them from the Greenhouse API
        if ($jobDetails === false) {
            try {
                $response = $this->client->request('GET', "{$this->apiUrl}/{$jobId}"); // Make a GET request to the Greenhouse API for the specific job
                // If the response status code is 200, decode the response body and cache the job details
                if ($response->getStatusCode() === 200) {
                    $jobDetails = json_decode($response->getBody(), true);
                    set_transient($cache_key, $jobDetails, $this->cacheExpiration); // Cache for 12 hours
                } else {
                    return ['error' => 'Failed to fetch job details']; // Return an error if the response status code is not 200
                }
            } catch (\Exception $e) {
                return ['error' => $e->getMessage()]; // Return an error if an exception occurs
            }
        }

        return $jobDetails; // Return the job details
    }

    // Function to clear the Greenhouse API cache
    public function clearCache() {
        delete_transient('greenhouse_jobs_data'); // Delete the jobs data cache

        global $wpdb; // Get the global $wpdb object
        $transients = $wpdb->get_col("SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE '_transient_greenhouse_job_%'");
        foreach ($transients as $transient) {
            $key = str_replace('_transient_', '', $transient);
            delete_transient($key); // Delete the job details cache
        }
    }
}
