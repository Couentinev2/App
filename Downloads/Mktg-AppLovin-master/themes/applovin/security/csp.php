<?php
/**
 * Content Security Policy Configuration
 *
 * @package Applovin
 */

// Prevent direct access
defined('ABSPATH') || exit;

/**
 * Add Content Security Policy and other security headers
 */
function applovin_add_security_headers() {
    $nonce = wp_create_nonce('script-nonce');
    
    if (!defined('CSP_NONCE')) {
        define('CSP_NONCE', $nonce);
    }
    
    $csp = array(
        // Scripts - allowing inline handlers and eval
        "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdnjs.cloudflare.com http://localhost:* https: https://applovindev.wpenginepowered.com *.hubspot.com *.hsforms.net *.hubspotusercontent.com",
        
        // Styles
        "style-src * 'self' 'unsafe-inline' https://cdnjs.cloudflare.com https: https://applovindev.wpenginepowered.com *.fonts.net",
        
        // Images - with HubSpot domain and Google Storage
        "img-src 'self' data: blob: https: http: *.hubspotusercontent.com *.hubspotusercontent-na1.net * https://applovindev.wpenginepowered.com https://storage.googleapis.com",
        
        // Fonts
        "font-src 'self' data: https: * https://applovindev.wpenginepowered.com",
        
        // Connect - allow HubSpot connections
        "connect-src 'self' https: http: ws: wss: *.hubspot.com *.hsforms.com",
        
        // Media
        "media-src 'self' blob: https: *.hubspotusercontent-na1.net",
        
        // Frames
        "frame-ancestors 'self' https://*.al-array.com https://*.arrayengine.com",
        "frame-src 'self' https: *.hsforms.com",
        
        // Forms
        "form-action 'self' https:",
        
        // Base URI
        "base-uri 'self'",
        
        // Worker sources
        "worker-src 'self' blob:",

        // Object sources
        "object-src 'self' https: data: *.hubspotusercontent-na1.net https://storage.googleapis.com"
    );

    // Add environment-specific rules
    if (defined('WP_ENVIRONMENT_TYPE') && WP_ENVIRONMENT_TYPE === 'local') {
        $csp[] = "script-src-elem 'self' 'unsafe-inline' http: https: blob: data:";
    }
    
    // Set main CSP header with Report-Only for testing
    if (defined('WP_ENVIRONMENT_TYPE') && WP_ENVIRONMENT_TYPE === 'local') {
        header("Content-Security-Policy-Report-Only: " . implode("; ", $csp));
    } else {
        header("Content-Security-Policy: " . implode("; ", $csp));
    }
    
    // Additional security headers
    header("X-Frame-Options: SAMEORIGIN");
    header("X-Content-Type-Options: nosniff");
    header("Referrer-Policy: strict-origin-when-cross-origin");
}

// Initialize security headers
add_action('send_headers', 'applovin_add_security_headers');

/**
 * Add nonce to inline scripts if needed
 */
function add_nonce_to_inline_scripts($tag, $handle, $src) {
    if (strpos($tag, 'onclick') !== false || strpos($tag, 'onload') !== false) {
        return str_replace('<script', '<script nonce="' . esc_attr(CSP_NONCE) . '"', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_nonce_to_inline_scripts', 10, 3);