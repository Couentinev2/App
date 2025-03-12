<?php
/*
Template Name: Press
*/
$current_language = pll_current_language();


// Define meta tags
$page_title = "In The News | AppLovin news, press releases, and media info";
$page_description = "Extra! Extra! Find the latest news stories and press releases about AppLovin, as well as hi-res logos, images, and leadership bios.";
$page_url = "https://applovin.com/press/";
$page_image = get_template_directory_uri() . "/images/open-graph-press.jpg";
$page_image_alt = "Press OpenGraph Image";

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
    if (locate_template("template-pages/press/{$section}.php")) {
        get_template_part("template-pages/press/{$section}");
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

<div id="press">
    <?php 
    // Define the sections to include
    $sections = [
        'hero-section',
        'featured-news-section',
        'awards',
        'parallax-section',
        'about-section',
        'news-feed',
        'press-feed',
        'cta-section',
    ];

    // Load each section using the reusable function
    foreach ($sections as $section) {
        if ($section) {
            include_template_part($section);
        }
    }
    ?>
</div>

<?php 
// Enqueue scripts
if (locate_template("template-pages/press/about-section.php")) {
    wp_enqueue_script('light-script', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), null, true);
}

get_footer(); 
?>
