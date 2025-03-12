<?php

use PressFeed\ErrorHandling\ErrorHandler;

// Set the global exception handler from your ErrorHandler class
set_exception_handler([ErrorHandler::class, 'handleException']);


use GuzzleHttp\Client;

/**
 * Fetches all press releases.
 *
 * @param WP_REST_Request $data The request data.
 * @return WP_REST_Response The response containing the fetched press release data.
 */
function get_all_press_releases($data) {
    try {
        // Get language from request, default to 'en'
        $lang = isset($data['lang']) ? $data['lang'] : 'en';

        // For English, fetch from external API
        if ($lang === 'en') {
            $client = new Client();
            $apiUrl = 'https://investors.applovin.com/feed/PressRelease.svc/GetPressReleaseList?apiKey=BF185719B0464B3CB809D23926182246&languageId=1&includeTags=true&pressReleaseDateFilter=1';

            try {
                $res = $client->request('GET', $apiUrl, [
                    'headers' => [
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3',
                        'Accept' => 'application/json',
                        'Accept-Language' => 'en-US,en;q=0.9',
                        'Origin' => 'https://investors.applovin.com',
                        'Referer' => 'https://investors.applovin.com/',
                        'x-q4-client-integration' => '87b19657-18ab-4f90-9ad6-b8cf4544a5ab'
                    ],
                    'verify' => true
                ]);

                $data = json_decode($res->getBody(), true);

                if (!isset($data['GetPressReleaseListResult']) || !is_array($data['GetPressReleaseListResult'])) {
                    return new WP_REST_Response(['error' => 'Unexpected API response structure'], 500);
                }

                $feeds = array_map(function ($feed) {
                    return [
                        'title' => $feed['Headline'],
                        'link' => 'https://investors.applovin.com' . $feed['LinkToDetailPage'],
                        'date' => $feed['PressReleaseDate'],
                        'summary' => $feed['ShortDescription']
                    ];
                }, $data['GetPressReleaseListResult']);

                return new WP_REST_Response($feeds, 200);
            } catch (\Exception $e) {
                return new WP_REST_Response(['error' => $e->getMessage()], 500);
            }
        } 
        // For other languages, fetch from WordPress post type
        else {
            $args = array(
                'post_type' => 'press_release',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'post_status' => 'publish',
                'lang' => $lang
            );

            $query = new WP_Query($args);
            $feeds = array_map(function ($post) {
                return [
                    'title' => $post->post_title,
                    'link' => get_field('press_release_url', $post->ID),
                    'date' => get_the_date('c', $post->ID),
                    'summary' => get_the_excerpt($post->ID)
                ];
            }, $query->posts);

            return new WP_REST_Response($feeds, 200);
        }
    } catch (\Exception $e) {
        return new WP_REST_Response(['error' => $e->getMessage()], 500);
    }
}

// Register the REST API endpoint
function register_press_release_endpoint() {
    register_rest_route('main-api/v1', '/all-feeds', array(
        'methods' => 'GET',
        'callback' => 'get_all_press_releases',
        'args' => array(
            'lang' => array(
                'default' => 'en',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                }
            )
        ),
        'permission_callback' => '__return_true'
    ));
}
add_action('rest_api_init', 'register_press_release_endpoint');
