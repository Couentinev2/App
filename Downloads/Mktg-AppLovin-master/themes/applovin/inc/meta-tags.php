<?php

if (!function_exists('applovin_meta_tags')) {
    function applovin_meta_tags($title, $description, $url, $image, $image_alt, $extra_meta = []) {
        echo "<title>" . esc_html($title) . "</title>";
        echo "<meta name=\"description\" content=\"" . esc_attr($description) . "\">";
        
        echo "<!-- Facebook Meta Tags -->";
        echo "<meta property=\"og:url\" content=\"" . esc_url($url) . "\">";
        echo "<meta property=\"og:type\" content=\"website\">";
        echo "<meta property=\"og:title\" content=\"" . esc_html($title) . "\">";
        echo "<meta property=\"og:description\" content=\"" . esc_attr($description) . "\">";
        echo "<meta property=\"og:image\" content=\"" . esc_url($image) . "\" alt=\"" . esc_attr($image_alt) . "\">";
        
        echo "<!-- Twitter Meta Tags -->";
        echo "<meta name=\"twitter:card\" content=\"summary_large_image\">";
        echo "<meta property=\"twitter:domain\" content=\"" . esc_url($url) . "\">";
        echo "<meta property=\"twitter:url\" content=\"" . esc_url($url) . "\">";
        echo "<meta name=\"twitter:title\" content=\"" . esc_html($title) . "\">";
        echo "<meta name=\"twitter:description\" content=\"" . esc_attr($description) . "\">";
        echo "<meta property=\"og:image\" content=\"" . esc_url($image) . "\" alt=\"" . esc_attr($image_alt) . "\">";
        
        // Output additional meta tags if provided
        if (!empty($extra_meta)) {
            foreach ($extra_meta as $meta_tag) {
                echo $meta_tag;
            }
        }
    }
}
