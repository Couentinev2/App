<?php
/*
Template Name: About
*/
// Define meta tags
$page_title = "About AppLovin | Company info, mission, vision, and values";
$page_description = "Address mission-critical business challenges with AppLovin's full-stack solutions for user acquisition, ad mediation, monetization, measurement, and more.";
$page_url = "https://applovin.com/about/";
$page_image = get_template_directory_uri() . "/images/open-graph-about.jpg";
$page_image_alt = "About Us OpenGraph Image";

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
    if (locate_template("template-pages/about/{$section}.php")) {
        get_template_part("template-pages/about/{$section}");
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

<div id="about">
    <?php 
    // Load each section using the reusable function
    $sections = [
        'hero-section',
        'office-section',
        'values-section',
        'leadership-section',
        'cta-section',
    ];

    foreach ($sections as $section) {
        include_template_part($section);
    }
    ?>
</div>

<?php
// Enqueue scripts
if (locate_template("template-pages/about/office-section.php")) {
    wp_enqueue_script('growth-script', get_template_directory_uri() . '/js/growth.js', array('jquery'), null, true);
}

get_footer();
?>
