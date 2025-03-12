<?php
// Register Custom Endcard Type ads
function custom_post_type_ads() {

    $labels = array(
        'name'                  => _x( 'Ads Endcards', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Ads Endcard', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Ads Endcards', 'text_domain' ),
        'name_admin_bar'        => __( 'Ads Endcard', 'text_domain' ),
        'archives'              => __( 'Endcard Archives', 'text_domain' ),
        'attributes'            => __( 'Endcard Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Endcard:', 'text_domain' ),
        'all_items'             => __( 'All Endcards', 'text_domain' ),
        'add_new_item'          => __( 'Add New Endcard', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Endcard', 'text_domain' ),
        'edit_item'             => __( 'Edit Endcard', 'text_domain' ),
        'update_item'           => __( 'Update Endcard', 'text_domain' ),
        'view_item'             => __( 'View Endcard', 'text_domain' ),
        'view_items'            => __( 'View Endcards', 'text_domain' ),
        'search_items'          => __( 'Search Endcards', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into Endcard', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Endcard', 'text_domain' ),
        'items_list'            => __( 'Endcards list', 'text_domain' ),
        'items_list_navigation' => __( 'Endcards list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter Endcards list', 'text_domain' ),
    );

    $args = array(
        'label'                 => __( 'Ads Endcard', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ),
        'hierarchical'          => false,
        'public'                => false, // Set to false to prevent public visibility
        'show_ui'               => true,  // Still show in admin UI
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false, // Disable archive pages
        'exclude_from_search'   => true,  // Exclude from search results
        'publicly_queryable'    => false, // Prevent single pages
        'capability_type'       => 'post',
        'taxonomies'            => array('ads_category', 'ads_tag', 'ad_type'), // Include ad_type here
    );

    register_post_type( 'ads', $args );

}
add_action( 'init', 'custom_post_type_ads', 0 );
