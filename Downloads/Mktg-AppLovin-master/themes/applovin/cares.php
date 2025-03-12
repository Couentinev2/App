<?php
/*
Template Name: Cares
*/
// Define meta tags
$page_title = "AppLovin Cares | AppLovin";
$page_description = "We're a team of AppLovin employees committed to giving back. Caring should be more than just donating. It should be about building community.";
$page_url = "https://applovin.com/cares/";
$page_image = get_template_directory_uri() . "/images/open-graph-cares.jpg";
$page_image_alt = "Cares OpenGraph Image";

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
    if (locate_template("template-pages/cares/{$section}.php")) {
        get_template_part("template-pages/cares/{$section}");
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

<div id="caresPage" class="caresPage">
    <?php 
    // Load each section using the reusable function
    $sections = [
        'hero-section',
        'mission-section',
        'projects-section',
        'testimonials-section',
        'contact-section',
    ];

    foreach ($sections as $section) {
        include_template_part($section);
    }
    ?>
</div>

<?php
// Enqueue scripts
if (locate_template("template-pages/cares/mission-section.php")) {
  wp_enqueue_script('mission-script', get_template_directory_uri() . '/js/mission.js', array('jquery'), null, true);
}

if (locate_template("template-pages/cares/testimonials-section.php")) {
  wp_enqueue_script('testimonials-script', get_template_directory_uri() . '/js/testimonials.js', array('jquery'), null, true);
}

get_footer();
?>
