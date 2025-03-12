<?php

use WistiaFeed\ErrorHandling\ErrorHandler;
use GuzzleHttp\Client;

// Set the global exception handler from your ErrorHandler class
set_exception_handler([ErrorHandler::class, 'handleException']);

// Register the REST API endpoint
function register_wistia_videos_endpoint()
{
    register_rest_route('main-api/v1', '/wistia-feed', array(
        'methods' => 'GET',
        'callback' => 'fetch_wistia_videos',
        'permission_callback' => '__return_true'
    ));
}
add_action('rest_api_init', 'register_wistia_videos_endpoint');

/**
 * Fetches all Wistia videos.
 *
 * @return WP_REST_Response The response containing the fetched Wistia video data.
 */
function fetch_wistia_videos()
{
    try {
        $client = new Client();
        $response = $client->request('GET', 'https://api.wistia.com/v1/medias.json', [
            'headers' => [
                'Authorization' => 'Bearer f30f0dd37e2c023edd648128c750170f09b10d05f77cac555ade7d9e19d560ec'
            ]
        ]);

        $videos = json_decode($response->getBody(), true);

        $videos = array_slice($videos, 0, 3);

        // Filter each video to only include the first asset and add the 'url' at the top level
        $filtered_videos = array_map(function ($video) {
            $first_asset = $video['assets'][0]; // Get the first asset
            $video['video_url'] = $first_asset['url']; // Add the 'url' to the top level
            unset($video['assets']); // Optionally, remove the 'assets' array if no longer needed
            return $video;
        }, $videos);

        return new WP_REST_Response($filtered_videos, 200);
    } catch (\Exception $e) {
        return new WP_REST_Response(['error' => $e->getMessage()], 500);
    }
}
