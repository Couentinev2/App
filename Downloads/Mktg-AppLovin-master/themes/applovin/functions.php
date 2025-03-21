<?php 
$icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 147.46 125.71"><defs><style>.cls-1{fill:#0599c5;}</style></defs><title>Asset 1</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M130.65,92.09a16.81,16.81,0,1,0,16.81,16.81A16.83,16.83,0,0,0,130.65,92.09Zm9.94,16.81A9.94,9.94,0,1,1,130.65,99,10,10,0,0,1,140.59,108.9Z"/><path class="cls-1" d="M16.81,92.09A16.81,16.81,0,1,0,33.62,108.9,16.83,16.83,0,0,0,16.81,92.09Zm10,16.81A9.94,9.94,0,1,1,16.82,99,10,10,0,0,1,26.76,108.9Z"/><path class="cls-1" d="M73.73,0A16.81,16.81,0,1,0,90.54,16.81,16.83,16.83,0,0,0,73.73,0Zm9.94,16.81a9.94,9.94,0,1,1-9.94-9.94A10,10,0,0,1,83.67,16.81Z"/><path class="cls-1" d="M124.43,94,87.31,27.11,87,26.46l-.46.58a14.94,14.94,0,0,1-4.62,3.83l-.45.24.25.44,32.86,59.18a191,191,0,0,0-40.31-4c-16.1,0-30.41,1.37-41.5,4L65.57,31.54l.25-.44-.45-.24A15.1,15.1,0,0,1,60.75,27l-.46-.58-.36.65L22.81,94l-.29.52.56.2c1.82.64,3.49,2.9,5,4.2l.25.22.3-.14.12,0c11.85-3.28,27.58-5,45.52-5,16.14,0,31.8,1.77,44.12,5l.25.48.48-.39.1-.08c1.5-1.32,3.17-3.59,5-4.23l.56-.19Z"/></g></g></svg>';

// lib
include( get_template_directory() . '/wpframe-master/autoload.php' );

// Strings
include( get_template_directory() . '/inc/strings.php' );

// Default settings
//include( get_template_directory() . '/inc/default.php' );

// ACF functions
include( get_template_directory() . '/inc/acf-functions.php' );

// Custom Widgets
include( get_template_directory() . '/inc/widgets.php' );

// Theme sidebars
include( get_template_directory() . '/inc/sidebars.php' );

// Theme thumbnails
include( get_template_directory() . '/inc/thumbnails.php' );

// Theme menus
include( get_template_directory() . '/inc/menus.php' );

// Theme css & js
// include( get_template_directory() . '/inc/scripts.php' );

// Custom theme functions
include( get_template_directory() . '/inc/theme-functions.php' );

// Nav theme functions
include( get_template_directory() . '/inc/nav-functions.php' );

// Enqueue theme functions
include( get_template_directory() . '/inc/enqueue-functions.php' );

// Auto-load the REST API endpoint DO NOT REMOVE - MUST BE ABOVE THE REST API FUNCTIONS
require_once __DIR__ . '/vendor/autoload.php';  // Composer autoload

// API theme functions
include( get_template_directory() . '/inc/api-functions.php' );

// Post Types
include( get_template_directory() . '/inc/post-functions.php' );

// Social Share
include( get_template_directory() . '/inc/social-share.php' );

// Security Configuration
include( get_template_directory() . '/security/csp.php' );




