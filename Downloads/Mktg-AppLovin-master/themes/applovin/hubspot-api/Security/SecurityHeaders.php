<?php
namespace NewApp\Security;

class SecurityHeaders {
    /**
     * Adds enhanced security headers to HTTP responses to enhance security.
     * 
     * @param mixed $served The response object being served.
     * @return mixed The modified response object with added security headers.
     */
    public static function addEnhancedSecurityHeaders($served) {
        // Use the main CSP configuration
        require_once dirname(dirname(dirname(__FILE__))) . '/security/csp.php';
        
        // Call the main security headers function which includes CSP and other security headers
        applovin_add_security_headers();

        // Additional API-specific headers
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Pragma: no-cache');

        return $served;
    }
}

// Registering the class method to WordPress filter hook
add_filter('rest_pre_serve_request', ['NewApp\Security\SecurityHeaders', 'addEnhancedSecurityHeaders'], 10, 4);
