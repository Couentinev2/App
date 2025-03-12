<?php

use NewApp\ErrorHandling\ErrorHandler;

// Set the global exception handler from your ErrorHandler class
set_exception_handler([ErrorHandler::class, 'handleException']);


/**
 * Registers REST API endpoints.
 */
function register_custom_endpoints() {
    // Endpoint for fetching EN pages
    register_rest_route('hubspot-api/v1', '/en-posts', array(
        'methods' => 'GET',
        'callback' => 'handle_all_methods',
        'permission_callback' => '__return_true'
    ));

    // Endpoint for fetching CN posts
    register_rest_route('hubspot-api/v1', '/cn-posts', array(
        'methods' => 'GET',
        'callback' => 'get_cn_posts',
        'permission_callback' => '__return_true'
    ));

    // Endpoint for fetching JA posts
    register_rest_route('hubspot-api/v1', '/ja-posts', array(
        'methods' => 'GET',
        'callback' => 'get_ja_posts',
        'permission_callback' => '__return_true'
    ));

    // Endpoint for fetching KO posts
    register_rest_route('hubspot-api/v1', '/ko-posts', array(
        'methods' => 'GET',
        'callback' => 'get_ko_posts',
        'permission_callback' => '__return_true'
    ));
}

add_action('rest_api_init', 'register_custom_endpoints');

/**
 * Handles GET requests for hubspot pages.
 * Fetches the latest 3 posts from 'post', 'video', 'success_story_pod', 'report_pod', and 'guide_pod' post types.
 *
 * @param WP_REST_Request $request The request object.
 * @return WP_REST_Response The response containing the fetched page data.
 */
function handle_all_methods($request) {
    return get_latest_posts();  // Fetch the latest 3 posts from specified post types.
}

/**
 * Retrieves the latest 3 CN posts from specified post types.
 *
 * @return WP_REST_Response A response object with the post data.
 */
function get_cn_posts() {
    return get_latest_posts('/cn');
}

/**
 * Retrieves the latest 3 JA posts from specified post types.
 *
 * @return WP_REST_Response A response object with the post data.
 */
function get_ja_posts() {
    return get_latest_posts('/ja');
}

/**
 * Retrieves the latest 3 KO posts from specified post types.
 *
 * @return WP_REST_Response A response object with the post data.
 */
function get_ko_posts() {
    return get_latest_posts('/ko');
}

/**
 * Retrieves the latest 3 posts from specified post types.
 * Optionally filters by a language path.
 *
 * @param string|null $language_path The language path to filter posts by (/cn, /ja, /ko).
 * @return WP_REST_Response A response object with the post data.
 */
function get_latest_posts($language_path = null) {
    $args = array(
        'post_type' => array('post', 'video', 'success_story_pod', 'report_pod', 'guide_pod'),
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $posts_query = new WP_Query($args);

    /**
     * Checks if the posts query has any posts. If not, returns a WP_REST_Response object with a 404 error.
     *
     * @param WP_Query $posts_query The WP_Query object representing the posts query.
     * @return WP_REST_Response The WP_REST_Response object with the 404 error.
     */
    if (!$posts_query->have_posts()) {
        return new WP_REST_Response([
            'error' => [
                'code' => 404,
                'message' => 'No posts found',
                'details' => 'There are no available posts.'
            ]
        ], 404);
    }

    /**
     * This array contains translations for different types of content.
     * Each content type has a default translation and translations for specific languages.
     * The keys represent the content types, and the values are associative arrays with the translations.
     * The default translation is stored under the 'default' key, and language-specific translations are stored under language codes.
     * For example, the translation for the 'post' content type in Japanese is stored under the '/ja' key.
     *
     * @var array $translations
     */
    $translations = [
        'post' => [
            'default' => 'Blog',
            '/ja' => 'ブログ',
            '/cn' => '博客',
            '/ko' => '블로그'
        ],
        'video' => [
            'default' => 'Video',
            '/ja' => '動画',
            '/cn' => '视频',
            '/ko' => '동영상'
        ],
        'success_story_pod' => [
            'default' => 'Success Story',
            '/ja' => '成功事例',
            '/cn' => '成功案例',
            '/ko' => '성공사례'
        ],
        'report_pod' => [
            'default' => 'Report',
            '/ja' => 'レポート',
            '/cn' => '报告',
            '/ko' => '리포트'
        ],
        'guide_pod' => [
            'default' => 'Guide',
            '/ja' => 'ガイド',
            '/cn' => '指南',
            '/ko' => '가이드'
        ]
    ];

    $posts_data = [];
    while ($posts_query->have_posts()) {
        $posts_query->the_post();
        $permalink = get_permalink();
        /**
         * Checks if the permalink is for an English post.
         *
         * @param string $permalink The permalink to check.
         * @return bool Returns true if the permalink is for an English post, false otherwise.
         */
        $is_english_post = strpos($permalink, '/cn') === false && strpos($permalink, '/ja') === false && strpos($permalink, '/ko') === false;

        /**
         * Checks if the permalink contains the language path or if it is an English post.
         * If either condition is true, it retrieves the post type and post ID.
         *
         * @param string $language_path The language path to check against the permalink.
         * @param string $permalink The permalink to check.
         * @param bool $is_english_post Indicates if the post is in English.
         * @return void
         */
        if (($language_path && strpos($permalink, $language_path) !== false) || (!$language_path && $is_english_post)) {
            $post_type = get_post_type();
            $post_id = get_the_ID();

            /**
             * Translates the post type based on the given language path and returns the translated post type.
             *
             * @param string $post_type The original post type.
             * @param string $language_path The language path.
             * @param array $translations The array of post type translations.
             * @return string The translated post type.
             */
            $translated_post_type = $translations[$post_type][$language_path] ?? $translations[$post_type]['default'];

            if ($post_type === 'video') {
                $min = get_field('timecodevideo', $post_id);
                $translated_post_type = "$min MIN";
            }

            /**
             * Retrieves the main thumbnail URL for a post.
             * 
             * This function first checks if the 'pod_bg_art' custom field is set for the post.
             * If it is set, the value of 'pod_bg_art' is used as the main thumbnail URL.
             * If 'pod_bg_art' is not set, the function falls back to the featured image URL of the post.
             * If no featured image is set, the function returns null.
             * 
             * @param int $post_id The ID of the post.
             * @return string|null The main thumbnail URL or null if no thumbnail is available.
             */
            $pod_bg_art = get_field('pod_bg_art');
            $featured_image_url = get_the_post_thumbnail_url($post_id, 'thumbnail_768x432');
            $main_thumbnail = $pod_bg_art ?: $featured_image_url;

            /**
             * This code block retrieves the title and teaser text from the current post and cleans them using the clean_text() function.
             * If the teaser text is null, it defaults to an empty string.
             * The cleaned teaser text is then assigned to the $clean_teaser_text variable.
             * Finally, the $main_text variable is assigned the value of $clean_teaser_text if it is not empty, otherwise it is assigned the value of $clean_title.
             */
            $clean_title = clean_text(get_the_title());
            $teaser_text = get_field('teaser_text') ?: ''; // Default to empty string if null
            $clean_teaser_text = clean_text($teaser_text);
            $main_text = $clean_teaser_text ?: $clean_title;

            /**
             * Sets the locale and date format based on the language path.
             *
             * @param string $language_path The language path.
             * @return string The formatted date.
             */
            $locale = 'en_US';
            $date_format = 'MMM d, yyyy';
            switch ($language_path) {
                case '/ja':
                    $locale = 'ja_JP';
                    $date_format = 'M月 d, yyyy';
                    break;
                case '/cn':
                    $locale = 'zh_CN';
                    $date_format = 'M月 d, yyyy';
                    break;
                case '/ko':
                    $locale = 'ko_KR';
                    $date_format = 'M월 d, yyyy';
                    break;
            }

            $date_formatter = new IntlDateFormatter(
                $locale,
                IntlDateFormatter::LONG,
                IntlDateFormatter::NONE,
                null,
                null,
                $date_format
            );
            $formatted_date = $date_formatter->format(strtotime(get_the_date()));

            /**
             * This code block creates an array of post data.
             * Each post data item includes the post ID, title, URL, date, author, type, thumbnail, pod_bg_art, main_thumbnail, teaser_text, main_text, and timecodevideo.
             * The values are retrieved using various WordPress functions and custom fields.
             * The translated post type name is used for the 'type' field.
             * The featured image URL is always returned for the 'thumbnail' field.
             * The 'pod_bg_art' field returns the set image.
             * The 'main_thumbnail' field returns either 'pod_bg_art' or the featured image.
             */
            $posts_data[] = [
                'id'          => $post_id,
                'title'       => $clean_title,
                'url'         => $permalink,
                'date'        => $formatted_date,
                'author'      => get_the_author(),
                'type'        => $translated_post_type, // Use the translated post type name
                'thumbnail'   => $featured_image_url, // Always return the featured image
                'pod_bg_art'  => $pod_bg_art,  // Return the set image
                'main_thumbnail' => $main_thumbnail, // Return either pod_bg_art or featured image
                'teaser_text' => $clean_teaser_text,
                'main_text'   => $main_text,
                'timecodevideo' => get_field('timecodevideo'),
            ];
        }
    }

    wp_reset_postdata();

    // Limit to the latest 3 posts
    $posts_data = array_slice($posts_data, 0, 3);

    return new WP_REST_Response($posts_data, 200);
}

/**
 * Cleans text by decoding HTML entities and removing unwanted characters.
 *
 * @param string $text The text to clean.
 * @return string The cleaned text.
 */
function clean_text($text) {
    if ($text) {
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = str_replace(array("\r", "\n", '<br>', '<br/>', '<br />'), '', $text);
    }
    return $text;
}

/**
 * Prepares and sanitizes the post content.
 * Removes unwanted HTML tags and cleans up the content for safe display.
 *
 * @param string $content The original content of the post.
 * @return string The sanitized content.
 */
function prepare_post_content($content) {
    $content = html_entity_decode($content, ENT_QUOTES | ENT_XML1, 'UTF-8'); // Decode HTML entities.
    $allowed_tags = [
        'a' => [
            'href' => [],
            'title' => [],
            'target' => [],
        ],
    ];
    $content = wp_kses($content, $allowed_tags);  // Remove unwanted HTML tags.
    $content = preg_replace('/<!--.*?-->/', '', $content);  // Remove HTML comments.
    $content = str_replace('&nbsp;', ' ', $content);  // Replace non-breaking spaces with regular spaces.
    $content = preg_replace('/\s+/', ' ', $content);  // Remove extra whitespace.
    return $content;
}

/**
 * Caches the REST API response if the response status is 200.
 *
 * @param WP_REST_Response $response The REST API response object.
 * @param WP_REST_Server   $server   The REST API server object.
 * @param WP_REST_Request  $request  The REST API request object.
 *
 * @return WP_REST_Response The modified REST API response object.
 */
function cache_rest_api_response($response, $server, $request) {
    if ($response->get_status() == 200) {
        $cache_duration = 60 * 5; // Cache duration in seconds (5 minutes)
        $response->header('Cache-Control', 'public, max-age=' . $cache_duration);
    }
    return $response;
}
add_filter('rest_post_dispatch', 'cache_rest_api_response', 10, 3);
?>
