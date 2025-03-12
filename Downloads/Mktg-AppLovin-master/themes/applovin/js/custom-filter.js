jQuery(document).ready(function($) {
    $(".options-container").hide();

    var currentPage = 1;
    var totalPages = 1;
    var isRequestInProgress = false; // Declare the variable to track the Ajax call
    var $filteredContent = $("#filtered-content");
    var defaultProduct = $("#products-dropdown").val();
    var defaultTopic = $("#topics-dropdown").val();

    // Initialize both .custom-dropdown and .custom-dropdowntwo dropdowns
    $(".custom-dropdown, .custom-dropdowntwo").each(function() {
        var dropdown = $(this);
        var select = dropdown.next("select");

        // Toggle the options container on click
        dropdown.find(".selected-option").click(function() {
            var optionsContainer = dropdown.find(".options-container");
            if (optionsContainer.is(":visible")) {
                optionsContainer.hide();
            } else {
                $(".options-container").hide(); // hide others
                optionsContainer.show();
            }
            toggleArrow(dropdown);
        });

        // Update selected option and sync with hidden select
        dropdown.find(".dropdown-option").click(function() {
            var value = $(this).data("value");
            var text = $(this).text();
            dropdown.find(".selected-option").text(text);
            select.val(value).change();
        });
    });

    // Close dropdowns when clicking outside
    $(document).click(function(e) {
        if (!$(e.target).closest(".custom-dropdown, .custom-dropdowntwo").length) {
            $(".options-container").hide();
            resetArrow(); // Reset the arrow direction
        }
    });

    // Function to toggle the arrow direction
    function toggleArrow(dropdown) {
        var arrow = dropdown.parent().find(".arrow");
        var optionsContainer = dropdown.find(".options-container");

        if (optionsContainer.is(":visible")) {
        // Dropdown is open, rotate the arrow
            arrow.css({
                "transform": "rotate(180deg)",
                "top": "23%",
                "right": "12px"
            });
        } else {
        // Dropdown is closed, reset the arrow
            resetArrow();
        }
    }


    // Function to reset the arrow direction
    function resetArrow() {
        $(".custom-dropdown, .custom-dropdowntwo").parent().find(".arrow").css({
            "transform": "",
            "top": "",
            "right": ""
        });
    }

    function fetchFilteredPosts(product, topic, page) {
        if (isRequestInProgress) {
            return; // Avoid multiple simultaneous Ajax calls
        }

        isRequestInProgress = true;
        var data = {
            action: "filter_posts",
            nonce: my_ajax_obj.nonce,
            product: product,
            topic: topic,
            page: page,
        };

        jQuery.ajax({
            url: my_ajax_obj.ajax_url,
            type: "POST",
            data: data,
            dataType: "json",
            beforeSend: function() {
                $filteredContent.html("<div class=\"loading\">Loading...</div>");
            },
            success: function(response) {
                var paginationHtml = $(response.pagination);
                var lastPageLink = paginationHtml.last().prev(); // Assuming the last but one link is the total pages
                var totalPagesEstimate = parseInt(lastPageLink.text(), 10) || 1;

                isRequestInProgress = false;
                $filteredContent.html(response.content);
                totalPages = totalPagesEstimate;
                currentPage = page;
                // console.log("Total Pages:", totalPages, "Current Page:", currentPage);

                // Check if there are no more posts
                if (currentPage >= totalPages) {

                    disableNextPaginationControls();
                }

                buildPagination(totalPages, currentPage);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                isRequestInProgress = false;
                $filteredContent.html("<div class=\"no-content\">Error loading content</div>");
            }
        });
    }



    function buildPagination(totalPages, currentPage) {
        var paginationHtml = "";
        var range = 2;
        var startPage, endPage;


        if (totalPages > 1) {
        // Adjust startPage and endPage
            if (currentPage <= range + 1) {
                startPage = 1;
                endPage = Math.min(1 + range * 2, totalPages);
            } else if (currentPage >= totalPages - range) {
                startPage = Math.max(totalPages - range * 2, 1);
                endPage = totalPages;
            } else {
                startPage = currentPage - range;
                endPage = currentPage + range;
            }


            // First and Previous Page Links
            if (currentPage > 1) {
                paginationHtml += "<a href=\"#top\" class=\"page-link prev\" data-page=\"1\">&laquo;</a> ";
                paginationHtml += "<a href=\"#top\" class=\"page-link prev\" data-page=\"" + (currentPage - 1) + "\">&lsaquo;</a> ";
            }

            // Page Number Links
            for (var i = startPage; i <= endPage; i++) {
                paginationHtml += "<a href=\"#top\" class=\"page-link " + (i === currentPage ? "active" : "") + "\" data-page=\"" + i + "\">" + i + "</a> ";
            }

            // Ellipsis and Last Page Link
            if (endPage < totalPages) {
                paginationHtml += "<span class=\"ellipsis\">…</span>";
                paginationHtml += "<a href=\"#top\" class=\"page-link\" data-page=\"" + totalPages + "\">" + totalPages + "</a> ";
            }

            // Next and Last Page Links
            if (currentPage < totalPages) {
                paginationHtml += "<a href=\"#top\" class=\"page-link next\" data-page=\"" + (currentPage + 1) + "\">&rsaquo;</a> ";
                paginationHtml += "<a href=\"#top\" class=\"page-link next\" data-page=\"" + totalPages + "\">&raquo;</a> ";
            }


            $(".pagination").html(paginationHtml);
        } else {
            $(".pagination").html("");
        }
    }


    fetchFilteredPosts(defaultProduct, defaultTopic, currentPage);


    $("#products-dropdown, #topics-dropdown, #post-types-dropdown").change(function() {
        currentPage = 1; // Reset to page 1 when filters change
        var product = $("#products-dropdown").val();
        var topic = $("#topics-dropdown").val();
        fetchFilteredPosts(product, topic, currentPage); // Corrected the parameters
    });

    // Re-bind the pagination click event for dynamically generated content
    $(document).on("click", ".page-link", function(e) {
        e.preventDefault();
        scrollToTop(); // Scroll to the top of the page

        var selectedPage = $(this).data("page");
        currentPage = selectedPage;
        var product = $("#products-dropdown").val();
        var topic = $("#topics-dropdown").val();
        fetchFilteredPosts(product, topic, selectedPage);
    });

    function scrollToTop() {
        var topElement = document.getElementById("top");
        if (topElement) {
            var elementPosition = topElement.getBoundingClientRect().top;
            var offsetPosition = elementPosition + window.pageYOffset - 250;
            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth"
            });
        } else {
            window.scrollTo(0, 0);
        }
    }
});
