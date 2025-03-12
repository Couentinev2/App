document.addEventListener('DOMContentLoaded', function() {
    const jobListings = document.getElementById('job-listings'); // Job listings container
    const jobCounter = document.getElementById('job-counter');  // Job counter
    const resetFiltersButton = document.getElementById('reset-filters'); // Reset filters button
    // const fetchingJobsDiv = document.getElementById('fetching-jobs'); // Fetching jobs div for testing
    const internMessage = document.getElementById('intern-message'); // Intern message
    let filters = {}; // Filters object to hold department, location, and work sub-type filters

    // Cache jobs in local storage
    function cacheJobs(jobs) {
        localStorage.setItem('cachedJobs', JSON.stringify(jobs)); // Stringify and set jobs in local storage
    }

    // Fetch cached jobs from local storage
    function getCachedJobs() {
        const cachedJobs = localStorage.getItem('cachedJobs'); // Get cached jobs from local storage
        if (cachedJobs) {
            return JSON.parse(cachedJobs); // Parse cached jobs as JSON
        } else {
            return null; // Return null if no cached jobs
        }
    }

    // Cache dropdown options in local storage
    function cacheDropdownOptions(key, options) {
        localStorage.setItem(key, JSON.stringify(options)); // Stringify and set options in local storage
    }

    // Retrieve cached dropdown options from local storage
    function getCachedDropdownOptions(key) {
        const cachedOptions = localStorage.getItem(key); // Get cached options from local storage
        if (cachedOptions) {
            return JSON.parse(cachedOptions); // Parse cached options as JSON
        } else {
            return null; // Return null if no cached options
        }
    }

    // Fetch filters from /wp-json/greenhouse/v1/filters endpoint
    function fetchFilters() {
        // Use cached options if available
        const cachedDepartments = getCachedDropdownOptions('cachedDepartments'); // Get cached departments
        const cachedLocations = getCachedDropdownOptions('cachedLocations'); // Get cached locations
        const cachedWorkSubTypes = getCachedDropdownOptions('cachedWorkSubTypes'); // Get cached work sub-types

        if (cachedDepartments) {
            populateDropdown('department', cachedDepartments); // Populate department dropdown with cached data
        } else {
            populateDropdown('department', {}); // Populate department dropdown with empty data
        }

        if (cachedLocations) {
            populateDropdown('location', cachedLocations); // Populate location dropdown with cached data
        } else {
            populateDropdown('location', {}); // Populate location dropdown with empty data
        }

        if (cachedWorkSubTypes) {
            populateDropdown('work-sub-type', cachedWorkSubTypes); // Populate work sub-type dropdown with cached data
        } else {
            populateDropdown('work-sub-type', {}); // Populate work sub-type dropdown with empty data
        }

        // Fetch filters
        fetch('/wp-json/greenhouse/v1/filters')
            .then(response => response.json())  // Parse response as JSON
            .then(data => {
                filters = data; // Store the fetched filters in the global filters object
                cacheDropdownOptions('cachedDepartments', data.departments); // Cache departments
                cacheDropdownOptions('cachedLocations', data.locations); // Cache locations
                cacheDropdownOptions('cachedWorkSubTypes', data.workSubTypes); // Cache work sub-types

                populateDropdown('department', data.departments); // Populate department dropdown
                populateDropdown('location', data.locations); // Populate location dropdown
                populateDropdown('work-sub-type', data.workSubTypes); // Populate work sub-type dropdown
            })
            .catch(error => {
                console.error('Error fetching filters:', error); // Log error to console
            });
    }

    // Populate dropdown with options
    function populateDropdown(id, options, validOptions = null) {
        const dropdown = document.getElementById(`${id}-options`); // Dropdown options container
        const selectedDisplay = document.getElementById(id); // Selected display container
        dropdown.innerHTML = ''; // Clear dropdown options

        // Custom text for dropdown
        let defaultText = '';
        if (id === 'department') {
            defaultText = 'All Departments';   // Custom text for department dropdown
        } else if (id === 'location') {
            defaultText = 'All Offices';      // Custom text for location dropdown
        } else if (id === 'work-sub-type') {
            defaultText = 'All Positions';    // Custom text for work sub-type dropdown
        } else {
            defaultText = `All ${capitalizeFirstLetter(id.replace(/-/g, ' '))}`; // Custom text for other dropdowns
        }

        // Create default dropdown item
        dropdown.appendChild(createDropdownItem('', defaultText, false)); // Add default item

        // Convert options to an array so they can be sorted
        const sortedOptions = Object.entries(options).map(([value, label]) => {
            // Applying renaming logic for work sub-type before sorting the array
            if (id === 'work-sub-type') {
                if (label === 'Regular') {
                    label = 'Full-Time'; // Rename Regular to Full-Time
                } else if (label === 'Intern (Trainee)') {
                    label = 'Intern'; // Rename Intern (Trainee) to Intern
                }else if (label === 'Fixed Term (Fixed Term)') {
                    label = 'Fixed Term'; // Rename Fixed Term (Fixed Term) to Fixed Term
                }
            }
            return [value, label]; // Return value and label
        }).sort((a, b) => a[1].localeCompare(b[1])); // Sort array alphabetically

        // console.log(`Populating ${id} dropdown with valid options:`, validOptions); // Log valid options

        // Add sorted options to the dropdown
        for (const [value, label] of sortedOptions) {
            const isDisabled = validOptions && !validOptions.includes(value.toString()); // Determine if option should be disabled
            // console.log(`Adding item to ${id} dropdown: value=${value}, label=${label}, disabled=${isDisabled}, validOptions=${validOptions}`); // Log each item being added
            dropdown.appendChild(createDropdownItem(value, label, isDisabled)); // Add item to dropdown
        }

        const selectedValue = selectedDisplay.dataset.value; // Get selected value
        const selectedText = sortedOptions.find(([value]) => value === selectedValue)?.[1] || defaultText; // Get selected text
        selectedDisplay.textContent = selectedText; // Set selected text
    }

    // Create dropdown item
    function createDropdownItem(value, label, disabled) {
        const li = document.createElement('li'); // Create list item
        li.classList.add('item'); // Add class to list item
        li.dataset.value = value; // Set data attribute
        li.textContent = label; // Set text content
        if (disabled) {
            li.classList.add('disabled'); // Add disabled class if item is disabled
        } else {
            // Add click event listener to list item
            li.addEventListener('click', () => {
                const dropdown = li.closest('.wrapper-dropdown'); // Dropdown container
                dropdown.querySelector('.selected-display').textContent = label; // Set selected display text
                dropdown.querySelector('.selected-display').dataset.value = value; // Set selected display data attribute
                handleFilterChange(); // Handle filter change
                fetchJobs(); // Fetch jobs but don't show the fetching message
            });
        }
        return li; // Return list item
    }

    // Handle filter change
    function handleFilterChange() {
        const departmentId = document.getElementById('department').dataset.value; // Selected department ID
        const locationName = document.getElementById('location').dataset.value; // Selected location name
        const workSubType = document.getElementById('work-sub-type').dataset.value; // Selected work sub-type

        let validDepartments = Object.keys(filters.departments); // Default to all departments
        let validLocations = Object.keys(filters.locations); // Default to all locations
        let validWorkSubTypes = Object.keys(filters.workSubTypes); // Default to all work sub-types

        if (departmentId) {
            validLocations = filters.relationships.departments[departmentId]?.locations || []; // Filter valid locations by department
            validWorkSubTypes = filters.relationships.departments[departmentId]?.workSubTypes || []; // Filter valid work sub-types by department
        }

        if (locationName) {
            validDepartments = filters.relationships.locations[locationName]?.departments.map(String) || []; // Filter valid departments by location
            validWorkSubTypes = filters.relationships.locations[locationName]?.workSubTypes || []; // Filter valid work sub-types by location
        }

        // If both department and location are selected, filter valid work sub-types by both
        if (departmentId && locationName) {
            const departmentValidWorkSubTypes = filters.relationships.departments[departmentId]?.workSubTypes || []; // Filter valid work sub-types by department
            const locationValidWorkSubTypes = filters.relationships.locations[locationName]?.workSubTypes || []; // Filter valid work sub-types by location
            validWorkSubTypes = validWorkSubTypes.filter(workSubType =>
                departmentValidWorkSubTypes.includes(workSubType) && locationValidWorkSubTypes.includes(workSubType) // Filter valid work sub-types by department and location
            );
        } else if (locationName) {
            validWorkSubTypes = filters.relationships.locations[locationName]?.workSubTypes || []; // Check for Only Location Selection 
        } else if (departmentId) {
            validWorkSubTypes = filters.relationships.departments[departmentId]?.workSubTypes || []; // Check for Only Department Selection
        }
        
        // Filtering Valid Departments and Locations Based on Work Sub-Type
        if (workSubType) {
            validDepartments = validDepartments.filter(deptId =>
                filters.relationships.workSubTypes[workSubType]?.departments.map(String).includes(deptId) // Filter valid departments by work sub-type
            );
            validLocations = validLocations.filter(locName =>
                filters.relationships.workSubTypes[workSubType]?.locations.includes(locName) // Filter valid locations by work sub-type
            );
        }


        // console.log('Selected department:', departmentId); // Log selected department
        // console.log('Selected location:', locationName); // Log selected location
        // console.log('Selected work sub-type:', workSubType); // Log selected work sub-type
        // console.log('Valid departments:', validDepartments); // Log valid departments
        // console.log('Valid locations:', validLocations); // Log valid locations
        // console.log('Valid work sub-types:', validWorkSubTypes); // Log valid work sub-types

        populateDropdown('department', filters.departments, validDepartments); // Populate department dropdown with valid options
        populateDropdown('location', filters.locations, validLocations); // Populate location dropdown with valid options
        populateDropdown('work-sub-type', filters.workSubTypes, validWorkSubTypes); // Populate work sub-type dropdown with valid options
    }

    // Fetch jobs from /wp-json/greenhouse/v1/jobs endpoint
    function fetchJobs() { // showFetchingMessage = true by default (for testing)
        const department = document.getElementById('department').dataset.value || ''; // Selected department
        const location = document.getElementById('location').dataset.value || ''; // Selected location
        const workSubType = document.getElementById('work-sub-type').dataset.value || ''; // Selected work sub-type
        // Create query string
        const queryString = new URLSearchParams({
            department,
            location,
            work_sub_type: workSubType
        }).toString();

        // Display cached jobs while fetching new jobs
        const cachedJobs = getCachedJobs();
        if (cachedJobs) {
            jobListings.innerHTML = generateJobListingsHtml(cachedJobs); // Display cached jobs
            jobCounter.innerHTML = `<span>Total Jobs:</span> ${cachedJobs.length}`; // Display total jobs count
        } else {
            jobListings.innerHTML = '<p class="loading-jobs">Loading jobs...</p>'; // Loading text
        }

        // if (showFetchingMessage) {
        //     fetchingJobsDiv.innerHTML = '<p>Fetching new jobs...</p>'; // Fetching jobs text
        // }

        // Fetch jobs
        fetch(`/wp-json/greenhouse/v1/jobs?${queryString}`)
            .then(response => response.json()) // Parse response as JSON
            .then(data => {
                if (data.error) {
                    jobListings.innerHTML = `<p>Error: ${data.error}</p>`; // Display error message
                    jobCounter.textContent = '';
                } else {
                    cacheJobs(data.jobs); // Cache the new jobs in local storage
                    jobListings.innerHTML = generateJobListingsHtml(data.jobs); // Display fetched jobs
                    jobCounter.innerHTML = `<span>Total Jobs:</span> ${data.jobs.length}`; // Display total jobs count
                    updateInternMessage(data.jobs); // Update intern message
                }
                // Remove "Fetching new jobs..." message
                // fetchingJobsDiv.innerHTML = '';
            })
            .catch(error => {
                jobListings.innerHTML = `<p>Error: ${error.message}</p>`; // Display error message
                jobCounter.textContent = '';
                // Remove "Fetching new jobs..." message
                // fetchingJobsDiv.innerHTML = '';
            });
    }

    function updateInternMessage(jobs) {
        const hasIntern = jobs.some(job => 
            job.metadata.some(meta => 
                meta.name === "Worker Sub-Type" && meta.value === "Intern (Trainee)"
            )
        );
    
        if (hasIntern) {
            internMessage.innerHTML = '';
        } else {
            internMessage.innerHTML = '<p>There are currently no open intern positions. Please check back soon, as we update our job openings regularly.</p>';
        }
    }

    // Generate job listings HTML
    function generateJobListingsHtml(jobs) {
        if (jobs.length === 0) {
            return '<p class="no-job">No jobs found.</p>'; // No jobs found text
        }

        const jobsByDepartment = {}; // Jobs by department

        // Group jobs by department
        jobs.forEach(job => {
            job.departments.forEach(dept => {
                if (!jobsByDepartment[dept.name]) {
                    jobsByDepartment[dept.name] = [];
                }
                jobsByDepartment[dept.name].push(job);
            });
        });

        // Sort departments alphabetically
        const sortedDepartmentNames = Object.keys(jobsByDepartment).sort((a, b) => a.localeCompare(b));

        return sortedDepartmentNames.map(departmentName => `
        <h3>${departmentName}</h3>
        <ul>
            ${jobsByDepartment[departmentName].map(job => `
                <li class="job-listing-item">
                    <div class="job-listing" data-url="${job.absolute_url}">
                        <div class="job-title">${job.title}</div>
                        <p>${job.location.name}</p>
                    </div>
                </li>
            `).join('')}
        </ul>
    `).join(''); // Return job listings HTML
    }

    // Open job listing in new tab on click
    document.addEventListener('click', function(event) {
        const jobListing = event.target.closest('.job-listing');
        if (jobListing) {
            const url = jobListing.getAttribute('data-url');
            window.open(url, '_blank'); // Open job listing in new tab
        }
    });

    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1); // Capitalize first letter of string
    }

    // Reset filters
    function resetFilters() {
        const defaultTexts = {
            'department': 'All Departments',
            'location': 'All Offices',
            'work-sub-type': 'All Positions'
        };

        Object.keys(defaultTexts).forEach(id => {
            const selectedDisplay = document.getElementById(id); // Selected display container
            selectedDisplay.textContent = defaultTexts[id]; // Set default text
            selectedDisplay.dataset.value = ''; // Reset data attribute
        });

        populateDropdown('department', filters.departments); // Populate department dropdown
        populateDropdown('location', filters.locations); // Populate location dropdown
        populateDropdown('work-sub-type', filters.workSubTypes); // Populate work sub-type dropdown

        fetchJobs(); // Fetch jobs but don't show the fetching message
    }

    // Add click event listener to reset filters button
    resetFiltersButton.addEventListener('click', resetFilters);

    fetchFilters(); // Fetch filters
    fetchJobs(); // Fetch jobs
});
