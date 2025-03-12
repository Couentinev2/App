jQuery(document).ready(function($) {
    $(".options-container").hide();

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
            $(".options-container").hide(); // Hide other options containers
            dropdown.find(".options-container").toggle(); // Toggle current options container
            toggleArrow(dropdown); // Function to toggle the arrow direction
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
        if (arrow.css("transform") === "rotate(180deg)") {
            resetArrow();
        } else {
            arrow.css({
                transform: "rotate(180deg)",
                top: "23%",
                right: "12px",
            });
        }
    }

    // Function to reset the arrow direction
    function resetArrow() {
        $(".custom-dropdown, .custom-dropdowntwo").parent().find(".arrow").css({
            transform: "",
            top: "",
            right: "",
        });
    }


    $("#products-dropdown, #topics-dropdown, #post-types-dropdown").change(function() {
        var product = $("#products-dropdown").val();
        var topic = $("#topics-dropdown").val();
        fetchFilteredPosts(product, topic);
    });

});