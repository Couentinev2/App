<?php
/*
Template Name: Bouygues Privacy Policy
*/
// X-Robots-Tag header to noindex this template
header("X-Robots-Tag: noindex, nofollow", true);
?>

<?php get_header(); ?>

<?php
$navuiraw = get_query_var('navui', '');
$navuiclean = sanitize_text_field($navuiraw);
if ($navuiclean == "false") {

    echo '<style>
header, footer, .nav-col, .content-top-menu, .rmp_menu_trigger {
	display:none!important;
}
.main-col {
	clear:both!important;
	float: none!important;
	width: 100%!important;
}
button#responsive-menu-button, #mobile-nav-container, #mobile-nav-trigger {
	display: none!important;
}
</style>';
};
?>

<link rel='stylesheet' id='applovin-style-policy-css' href='https://www.applovin.com/wp-content/themes/applovin/css/style-policies.css' type='text/css' media='' />

<div class="policiesPage privacy-policy-template">
    <div class="title-row"><?php the_title('<h1>', '</h1>'); ?></div>
    <div class="container">
        <div id="content">
            <div class="wrap">
                <!-- Optional Navigation or Sidebar Structure -->
                <div class="main-col">
                    <?php
                    // Display the content of the page
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

<style>
    header,
    footer,
    .nav-col,
    .content-top-menu,
    .rmp_menu_trigger {
        display: none !important;
    }

    .main-col {
        clear: both !important;
        float: none !important;
        width: 100% !important;
    }

    button#responsive-menu-button,
    #mobile-nav-container,
    #mobile-nav-trigger {
        display: none !important;
    }
</style>
</style>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    document.addEventListener("DOMContentLoaded", function() {
        // Find the content element
        var content = document.getElementById("content");

        // If the content element exists, proceed to find h2 elements within it
        if (content) {
            var h2s = content.querySelectorAll("h2");

            // Create a new ordered list element
            var ol = document.createElement("ol");

            // Iterate through the h2 elements
            h2s.forEach(function(h2, index) {
                // Create an id for the h2 element if it doesn't have one
                if (!h2.id) {
                    h2.id = "heading_" + index;
                }

                // Create a list item and link element for the h2
                var li = document.createElement("li");
                var a = document.createElement("a");
                a.href = "#" + h2.id;
                a.innerText = h2.innerText;

                // Add a click event listener to the link
                a.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent the default jump-to behavior

                    // Calculate the position to scroll to
                    var targetPosition = h2.offsetTop;

                    // Smoothly scroll to the target position
                    window.scrollTo({
                        top: targetPosition,
                        behavior: "smooth"
                    });
                });

                // Append the link to the list item and the list item to the ordered list
                li.appendChild(a);
                ol.appendChild(li);
            });

            // Find the toc_links_wrapper element and append the ordered list to it
            var tocLinksWrapper = document.getElementById("toc_links_wrapper");
            if (tocLinksWrapper) {
                tocLinksWrapper.appendChild(ol);
            }
        }
    });
</script>