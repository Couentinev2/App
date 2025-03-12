<?php 

/**
 * Setup custom post types
 */
function include_custom_post_types()
{
    include_once(get_stylesheet_directory() . '/post/ads/register-ads.php');
    include_once(get_stylesheet_directory() . '/post/ads/register-ads-taxonomies.php');
}

include_custom_post_types();

/**
 * Reroute ads singles
 */
function single_template($single)
{
    global $post;

    // Check if the current post is of the 'ads' custom post type
    if ($post->post_type === 'ads') { // Ensure 'ads' matches your custom post type slug
        // Specify the path to the single template within the 'post/types/ads/' directory
        $ads_single_template_path = get_stylesheet_directory() . '/src/post/ads/single-ads.php';
        if (file_exists($ads_single_template_path)) {
            return $ads_single_template_path;
        }
    }

    // Return the default single template if not a 'ads' post or if the custom template does not exist
    return $single;
}
add_filter('single_template', 'single_template');

/**
 * Reroute ads archives
 */
function archive_template($archive_template) {
    global $post;

    if (is_post_type_archive('ads')) {
        // Specify the path to the archive template within the 'post/types/ads/' directory
        $ads_archive_template_path = get_stylesheet_directory() . '/src/post/ads/archive-ads.php';
        if (file_exists($ads_archive_template_path)) {
            return $ads_archive_template_path;
        }
    }

    // Return the default archive template if not a 'ads' archive or if the custom template does not exist
    return $archive_template;
}
add_filter('archive_template', 'archive_template');
