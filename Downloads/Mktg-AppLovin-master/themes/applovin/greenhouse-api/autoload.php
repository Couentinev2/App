<?php
// Application components
require_once __DIR__ . '/MainApiRouter.php';
require_once __DIR__ . '/api-endpoint.php';
// require_once __DIR__ . '/PostsEndpoint.php';
// require_once __DIR__ . '/Security/SecurityHeaders.php';
// require_once __DIR__ . '/ErrorHandling/ErrorHandler.php';


// Activate function to  clear the Greenhouse API cache, visit the Admin dashboard to trigger it
// function clear_greenhouse_cache_handler() {
//     $apiRouter = new \GreenhouseApi\MainApiRouter();
//     $apiRouter->clearCache();
// }
// add_action('admin_init', 'clear_greenhouse_cache_handler');