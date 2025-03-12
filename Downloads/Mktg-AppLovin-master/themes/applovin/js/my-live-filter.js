jQuery(".options-container").hide();

let filteredItems = []; // Array to hold filtered items
let currentPage = 1;    // Current page number
const itemsPerPage = 12; // Number of items per page

function getSelectedOptionValue(selector) {
    let selectedOption = document.querySelector(selector);
    return selectedOption ? selectedOption.getAttribute("data-value-product") || selectedOption.getAttribute("data-value") || selectedOption.getAttribute("data-value-topics") : "";
}

// Function to apply filters
function applyFilters() {
    let allItems = document.querySelectorAll(".grid-container .grid-item, .three-cols .col");

    // Fetch current filters
    let currentFilters = {
        product: getSelectedOptionValue(".custom-dropdown .dropdown-option.selected"),
        postType: getSelectedOptionValue(".custom-dropdownsecond .dropdown-option.selected"),
        topic: getSelectedOptionValue(".custom-dropdownthree .dropdown-option.selected")
    };


    filteredItems = Array.from(allItems).filter(item => {
        let productValues = item.getAttribute("data-product") ? item.getAttribute("data-product").split(",") : [];
        let matchesProduct = !currentFilters.product || productValues.includes(currentFilters.product);

        let postTypeValues = item.getAttribute("data-post-type") ? item.getAttribute("data-post-type").split(",") : [];
        let matchesPostType = !currentFilters.postType || postTypeValues.includes(currentFilters.postType);

        let topicValues = item.getAttribute("data-topics") ? item.getAttribute("data-topics").split(",") : [];
        let matchesTopic = !currentFilters.topic || topicValues.includes(currentFilters.topic);

        return matchesProduct && matchesPostType && matchesTopic;
    });



    allItems.forEach(item => item.style.display = "none");
    filteredItems.forEach(item => item.style.display = "flex");

    updatePagination(filteredItems.length);
    displayPage(currentPage);
}


function updatePagination(totalItems, logWarnings = false) {
    const totalPages = Math.ceil(totalItems / itemsPerPage);
    const paginationContainer = document.getElementById("custom-pagination");

    // Check if the container exists
    if (!paginationContainer) {
        if (logWarnings) {
            console.warn("Pagination container not found. Skipping pagination rendering.");
        }
        return;
    }

    // Clear previous pagination links
    paginationContainer.innerHTML = "";

    // Add First and Previous Page Links (only if not on the first page)
    if (currentPage > 1) {
        const firstPageLink = createPaginationLink("«", 1); // Use actual character for «
        firstPageLink.classList.add("prev");
        paginationContainer.appendChild(firstPageLink);

        const prevPageLink = createPaginationLink("‹", currentPage - 1); // Use actual character for ‹
        prevPageLink.classList.add("prev");
        paginationContainer.appendChild(prevPageLink);
    }

    // Determine the range of pages to display
    let startPage = Math.max(1, currentPage - 2);
    let endPage = Math.min(totalPages, currentPage + 2);

    for (let i = startPage; i <= endPage; i++) {
        const pageLink = createPaginationLink(i.toString(), i);
        if (i === currentPage) {
            pageLink.classList.add("active");
        }
        paginationContainer.appendChild(pageLink);
    }

    // Add Next and Last Page Links (only if not on the last page)
    if (currentPage < totalPages) {
        const nextPageLink = createPaginationLink("›", currentPage + 1); // Use actual character for ›
        nextPageLink.classList.add("next");
        paginationContainer.appendChild(nextPageLink);

        const lastPageLink = createPaginationLink("»", totalPages); // Use actual character for »
        lastPageLink.classList.add("next");
        paginationContainer.appendChild(lastPageLink);
    }
}




function createPaginationLink(text, page) {
    const link = document.createElement("a");
    link.href = "#";
    link.innerText = text;
    link.addEventListener("click", (e) => {
        e.preventDefault();
        displayPage(page);
    });

    // Apply bold style for the current page
    if (page === currentPage) {
        link.style.fontWeight = "bold";
    }

    return link;
}


function displayPage(page) {
    currentPage = page;
    const start = (page - 1) * itemsPerPage;
    const end = start + itemsPerPage;

    filteredItems.forEach((item, index) => {
        item.style.display = (index >= start && index < end) ? "flex" : "none";
    });

    updatePagination(filteredItems.length); // Update pagination links
}

document.addEventListener("DOMContentLoaded", function() {
    setupFilterOptions(".custom-dropdown", applyFilters);
    setupFilterOptions(".custom-dropdownsecond", applyFilters);
    setupFilterOptions(".custom-dropdownthree", applyFilters);

    applyFilters(); // Initial filter setup

    observeDOMChanges(); // Setup MutationObserver
});

function setupFilterOptions(containerSelector, filterFunction) {
    let options = document.querySelectorAll(`${containerSelector} .dropdown-option`);
    options.forEach(option => option.addEventListener("click", function() {
        let currentlySelected = document.querySelectorAll(`${containerSelector} .dropdown-option.selected`);
        currentlySelected.forEach(selectedOption => selectedOption.classList.remove("selected"));
        this.classList.add("selected");
        filterFunction();

        // Close the dropdown menu after selection
        closeDropdownMenu();
    }));
}

// Function to close the dropdown menu
function closeDropdownMenu() {
    let optionsContainers = document.querySelectorAll(".options-container");
    optionsContainers.forEach(container => container.style.display = "none");
}


// Observe DOM changes and reapply filters
function observeDOMChanges() {
    let contentContainer = document.querySelector(".content-container");
    if (!contentContainer) return;

    let observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length > 0) {
                applyFilters();
            }
        });
    });

    observer.observe(contentContainer, { childList: true, subtree: true });
}
