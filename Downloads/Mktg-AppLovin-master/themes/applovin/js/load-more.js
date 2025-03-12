jQuery(document).ready(function($) {
    // Function to apply or remove inline CSS based on the number of items and screen width
    function applyConditionalStyles() {
        var totalItems = $("#awards-container > div").length;
        var screenWidth = $(window).width();

        // Check if the screen width is between 640px and 1020px
        if (screenWidth >= 640 && screenWidth <= 1020) {
            // If the total number of items is odd, apply the inline CSS to the last child
            if (totalItems % 2 !== 0) {
                $("#awards-container > div:last-child").css({
                    "grid-column": "1 / -1",
                    "max-width": "50%",
                    "margin": "auto"
                });
            } else {
                // Ensure the last child has default styles if the total number is even
                $("#awards-container > div:last-child").css({
                    "grid-column": "auto",
                    "max-width": "100%",
                    "margin": ""
                });
            }
        } else {
            // Ensure the last child has default styles if the screen width is outside the range
            $("#awards-container > div:last-child").css({
                "grid-column": "auto",
                "max-width": "100%",
                "margin": ""
            });
        }
    }

    // Initially apply the styles based on the current items and screen size
    applyConditionalStyles();

    $("#load-more").on("click touchstart", function(event) {
        event.preventDefault();
        var button = $(this);
        var page = button.data("page");

        $.ajax({
            url: load_more_params.ajaxurl,
            type: "POST",
            data: {
                action: "load_more_awards",
                page: page
            },
            success: function(response) {
                if (response) {
                    // Before appending new items, reset the CSS of the current last child
                    $("#awards-container > div:last-child").css({
                        "grid-column": "auto",
                        "max-width": "100%",
                        "margin": ""
                    });

                    // Append the new items
                    $("#awards-container").append(response);
                    button.data("page", page + 1);

                    // Reapply the conditional styles after new items are loaded
                    applyConditionalStyles();
                } else {
                    button.text("No more awards to load");
                    button.prop("disabled", true);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
            }
        });
    });

    // Reapply styles when window is resized within the target range
    $(window).resize(function() {
        applyConditionalStyles();
    });
});
