<?php

use NewsFeed\ErrorHandling\ErrorHandler;

// Set the global exception handler from your ErrorHandler class
set_exception_handler([ErrorHandler::class, 'handleException']);


function register_news_links_endpoint() {
    register_rest_route('custom/v1', '/news_links', array(
        'methods' => 'GET',
        'callback' => 'get_news_links',
        'args' => array(
            'page' => array(
                'default' => 1,
                'validate_callback' => function($param, $request, $key) {
                    return is_numeric($param);
                }
            ),
            'posts_per_page' => array(
                'default' => 6,
                'validate_callback' => function($param, $request, $key) {
                    return is_numeric($param);
                }
            )
        )
    ));
}

// Function to get news links
function get_news_links($data) {
    $paged = $data['page'];
    $posts_per_page = $data['posts_per_page'];
    $lang = isset($data['lang']) ? $data['lang'] : 'en'; // Default to 'en' if lang is not provided

    // Set the query args based on the passed language
    $args = array(
        'post_type' => 'news_link',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'lang' => $lang
    );

    $news_query = new WP_Query($args);

    if ($news_query->have_posts()) {
        $posts = array();
        while ($news_query->have_posts()) {
            $news_query->the_post();
            $posts[] = array(
                'title' => get_the_title(),
                'link' => get_field('news_article_url'),
                'date' => get_the_date('c'),
                'source' => get_field('news_source')
            );
        }
        wp_reset_postdata();

        $response = array(
            'posts' => $posts,
            'total_pages' => $news_query->max_num_pages
        );

        return rest_ensure_response($response);
    } else {
        return new WP_Error('no_news', 'No news found', array('status' => 404));
    }
}

add_action('rest_api_init', 'register_news_links_endpoint');