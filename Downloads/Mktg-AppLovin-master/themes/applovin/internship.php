<?php
/*
Template Name: Internship
*/

// Define meta tags
$page_title = "AppLovin Tech Internships, Palo Alto, CA";
$page_description = "Apply for entry-level engineering and developer jobs and internships at our Palo Alto headquarters. Start building your future here.";
$page_url = "https://applovin.com/careers-and-internships/";
$page_image = get_template_directory_uri() . "/images/open-graph-Internship.jpg";
$page_image_alt = "Internship OpenGraph Image";

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
    if (locate_template("template-pages/internship/{$section}.php")) {
        get_template_part("template-pages/internship/{$section}");
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

<div id="internship">
    <?php 
    // Load each section using the reusable function
    $sections = [
        'hero-section',
        'programs-section',
        'engineering-section',
        'testimonial-section',
        'cta-section',
    ];

    foreach ($sections as $section) {
        include_template_part($section);
    }
    ?>
</div>

<?php
// Enqueue the script for the internship slider
if (locate_template("template-pages/internship/hero-section.php")) {
    wp_enqueue_script('internship-slider-script', get_template_directory_uri() . '/js/internship-slider.js', array('jquery'), null, true);
}

get_footer();
?>
