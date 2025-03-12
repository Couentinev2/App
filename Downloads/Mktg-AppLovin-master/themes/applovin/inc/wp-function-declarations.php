<?php
/**
 * WordPress Function Declarations for Linting
 *
 * This file contains function declarations to prevent linting errors.
 * These functions are actually provided by WordPress core and PHP core.
 *
 * @package AppLovin
 */

// PHP Core Functions
if (!function_exists('file_exists')) {
    function file_exists() {}
}
if (!function_exists('trim')) {
    function trim() {}
}
if (!function_exists('file_get_contents')) {
    function file_get_contents() {}
}
if (!function_exists('pathinfo')) {
    function pathinfo() {}
}
if (!function_exists('ltrim')) {
    function ltrim() {}
}
if (!function_exists('strpos')) {
    function strpos() {}
}
if (!function_exists('str_replace')) {
    function str_replace() {}
}
if (!function_exists('filemtime')) {
    function filemtime() {}
}
if (!function_exists('str_contains')) {
    function str_contains() {}
}

// WordPress Constants
if (!defined('WP_ENVIRONMENT_TYPE')) {
    define('WP_ENVIRONMENT_TYPE', 'production');
}

// WordPress Core Functions
if (!function_exists('get_stylesheet_directory')) {
    function get_stylesheet_directory(): string { return ''; }
}
if (!function_exists('get_stylesheet_directory_uri')) {
    function get_stylesheet_directory_uri(): string { return ''; }
}
if (!function_exists('get_template_directory')) {
    function get_template_directory(): string { return ''; }
}
if (!function_exists('get_template_directory_uri')) {
    function get_template_directory_uri(): string { return ''; }
}
if (!function_exists('wp_enqueue_style')) {
    function wp_enqueue_style() {}
}
if (!function_exists('wp_enqueue_script')) {
    function wp_enqueue_script() {}
}
if (!function_exists('wp_deregister_script')) {
    function wp_deregister_script() {}
}
if (!function_exists('wp_style_add_data')) {
    function wp_style_add_data() {}
}
if (!function_exists('add_action')) {
    function add_action() {}
}
if (!function_exists('is_page_template')) {
    function is_page_template() {}
}
if (!function_exists('is_singular')) {
    function is_singular() {}
}
if (!function_exists('is_archive')) {
    function is_archive() {}
}
if (!function_exists('is_search')) {
    function is_search() {}
}
if (!function_exists('is_home')) {
    function is_home() {}
}
if (!function_exists('is_page')) {
    function is_page() {}
}
if (!function_exists('get_header')) {
    function get_header() {}
}
if (!function_exists('get_footer')) {
    function get_footer() {}
}
if (!function_exists('esc_attr')) {
    function esc_attr() {}
}
if (!function_exists('get_language_attributes')) {
    function get_language_attributes(): string { return ''; }
} 