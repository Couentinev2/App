<?php
/*
Template Name: Jobs
*/
// Define meta tags
$page_title = "Grow Your Career at AppLovin | Workplace information and open roles";
$page_description = "Want to join AppLovin’s awesome team? See our open jobs and apply today. Learn why AppLovin employees love what they do, discover what sets AppLovin apart as a workplace, recent workplace awards and honors.";
$page_url = "https://applovin.com/jobs/";
$page_image = get_template_directory_uri() . "/images/open-graph-jobs.jpg";
$page_image_alt = "Jobs OpenGraph Image";

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
    if (locate_template("template-pages/careers/{$section}.php")) {
        get_template_part("template-pages/careers/{$section}");
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

<div id="careers">
    <?php 
    // Load each section using the reusable function
    $sections = [
        'hero-section',
        'video-section',
        'quote-section',
        'culture-section',
        'awards-section',
        'benefits-section',
        'internship-section',
        'job-board',
    ];

    foreach ($sections as $section) {
        include_template_part($section);
    }
    ?>
</div>

<?php
// Enqueue scripts
if (locate_template("template-pages/careers/job-board.php")) {
    wp_enqueue_script('jobs-script', get_template_directory_uri() . '/greenhouse-api/assets/js/jobs.js', array('jquery'), null, true);
    wp_enqueue_script('dropdown-script', get_template_directory_uri() . '/greenhouse-api/assets/js/dropdown.js', array('jquery'), null, true);
}

if (locate_template("template-pages/careers/video-section.php")) {
    wp_enqueue_script('light-script', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), null, true);
}

get_footer();
?>
