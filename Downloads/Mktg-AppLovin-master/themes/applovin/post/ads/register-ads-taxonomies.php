<?php
// Register Custom Taxonomies for Ads Custom Post Type

// Function to register a custom category-like taxonomy
function register_ads_category_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Ads Vertical', 'taxonomy general name', 'text_domain' ),
        'singular_name'              => _x( 'Ads Vertical', 'taxonomy singular name', 'text_domain' ),
        'search_items'               => __( 'Search Ads Verticals', 'text_domain' ),
        'all_items'                  => __( 'All Ads Verticals', 'text_domain' ),
        'parent_item'                => __( 'Parent Ads Vertical', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Ads Vertical:', 'text_domain' ),
        'edit_item'                  => __( 'Edit Ads Vertical', 'text_domain' ),
        'update_item'                => __( 'Update Ads Vertical', 'text_domain' ),
        'add_new_item'               => __( 'Add New Ads Vertical', 'text_domain' ),
        'new_item_name'              => __( 'New Ads Vertical Name', 'text_domain' ),
        'menu_name'                  => __( 'Ads Vertical', 'text_domain' ),
    );
    $args = array(
        'hierarchical'               => true, // Like categories
        'labels'                     => $labels,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'query_var'                  => true,
        'rewrite'                    => array( 'slug' => 'ads-category' ),
    );

    register_taxonomy( 'ads_category', array( 'ads' ), $args );
}

// Function to register a custom tag-like taxonomy
function register_ads_tag_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Ad Types', 'taxonomy general name', 'text_domain' ),
        'singular_name'              => _x( 'Ad Type', 'taxonomy singular name', 'text_domain' ),
        'search_items'               => __( 'Search Ad Types', 'text_domain' ),
        'all_items'                  => __( 'All Ad Types', 'text_domain' ),
        'parent_item'                => __( 'Parent Ad Type', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Ad Type:', 'text_domain' ),
        'edit_item'                  => __( 'Edit Ad Type', 'text_domain' ),
        'update_item'                => __( 'Update Ad Type', 'text_domain' ),
        'add_new_item'               => __( 'Add New Ad Type', 'text_domain' ),
        'new_item_name'              => __( 'New Ad Type Name', 'text_domain' ),
        'menu_name'                  => __( 'Ad Type', 'text_domain' ),
    );
    $args = array(
        'hierarchical'               => true, // Like tags
        'labels'                     => $labels,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'query_var'                  => true,
        'rewrite'                    => array( 'slug' => 'ads-tag' ),
    );

    register_taxonomy( 'ads_tag', array( 'ads' ), $args );
}

// Function to register a custom taxonomy for Ad Type
// function register_ads_type_taxonomy() {
//     $labels = array(
//         'name'                       => _x( 'Ad Types', 'taxonomy general name', 'text_domain' ),
//         'singular_name'              => _x( 'Ad Type', 'taxonomy singular name', 'text_domain' ),
//         'search_items'               => __( 'Search Ad Types', 'text_domain' ),
//         'all_items'                  => __( 'All Ad Types', 'text_domain' ),
//         'parent_item'                => __( 'Parent Ad Type', 'text_domain' ),
//         'parent_item_colon'          => __( 'Parent Ad Type:', 'text_domain' ),
//         'edit_item'                  => __( 'Edit Ad Type', 'text_domain' ),
//         'update_item'                => __( 'Update Ad Type', 'text_domain' ),
//         'add_new_item'               => __( 'Add New Ad Type', 'text_domain' ),
//         'new_item_name'              => __( 'New Ad Type Name', 'text_domain' ),
//         'menu_name'                  => __( 'Ad Type', 'text_domain' ),
//     );
//     $args = array(
//         'hierarchical'               => true, // Set to true for category-like, false for tag-like
//         'labels'                     => $labels,
//         'show_ui'                    => true,
//         'show_admin_column'          => true,
//         'query_var'                  => true,
//         'rewrite'                    => array( 'slug' => 'ad-type' ),
//     );

//     register_taxonomy( 'ad_type', array( 'ads' ), $args );
// }

// Hook into the 'init' action to register these taxonomies
add_action( 'init', 'register_ads_category_taxonomy', 0 );
add_action( 'init', 'register_ads_tag_taxonomy', 0 );
// add_action( 'init', 'register_ads_type_taxonomy', 0 );