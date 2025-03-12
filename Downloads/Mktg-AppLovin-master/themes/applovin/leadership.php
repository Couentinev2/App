<?php
/*
Template Name: Leadership
*/

// Define meta tags
$page_title = "Meet AppLovin's Leaders | AppLovin";
$page_description = "Meet AppLovin's leadership team. Find out more about AppLovin's CEO, co-founders, and others by reading their biographies.";
$page_url = "https://applovin.com/leadership/";
$page_image = get_template_directory_uri() . "/images/open-graph-jobs.jpg";
$page_image_alt = "Leadership OpenGraph Image";

// Define any extra meta tags
$extra_meta = [
    '<meta property="og:site_name" content="AppLovin">',
    '<meta name="twitter:site" content="@AppLovin">'
];

// Output the meta tags
applovin_meta_tags($page_title, $page_description, $page_url, $page_image, $page_image_alt, $extra_meta);

get_header();

// Define a reusable function to include a template part
function include_template_part($section) {
    // Check if the section exists in the page-specific directory
    if (locate_template("template-pages/leadership/{$section}.php")) {
        get_template_part("template-pages/leadership/{$section}");
    }
    // If not found, check the reusable modules directory
    elseif (locate_template("template-modules/{$section}.php")) {
        get_template_part("template-modules/{$section}");
    }
    // If the section is not found in either location, output a missing section comment
    else {
        echo "<!-- Missing section: {$section} -->";
    }
}
?>

<div id="leadershipPage">
    <?php 
    // Load each section using the reusable function
    $sections = [
        'hero-section',
        'leadership-section',
        'board-section',
        'cta-section',
    ];

    foreach ($sections as $section) {
        include_template_part($section);
    }
    ?>
</div>

<?php 
// Enqueue scripts
if (locate_template("template-pages/leadership/leadership-section.php")) {
    wp_enqueue_script('leadership-modal-script', get_template_directory_uri() . '/js/leadership-modal.js', array('jquery'), null, true);
}

get_footer(); 
?>
