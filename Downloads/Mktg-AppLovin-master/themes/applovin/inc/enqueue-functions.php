<?php 

if ( ! defined( 'WP_ENV' ) ) {
    define( 'WP_ENV', 'production' ); // Default to production if WP_ENV is not defined
}

if ( WP_ENV !== 'local' && ! defined( 'APP_VERSION' ) ) {
    // Use the Git commit hash or a timestamp as the version.
    $version_file = get_stylesheet_directory() . '/version.txt';

    if ( file_exists( $version_file ) ) {
        $git_version = trim( file_get_contents( $version_file ) );
    } else {
        $git_version = '1.0.0'; // Fallback to a default version if the file is missing
    }

    define( 'APP_VERSION', $git_version );
}

/**
 * Enqueue scripts and styles.
 */
function applovin_theme_scripts() {
    // Define the version number based on your setup or dynamically using a versioning strategy
    $theme_version = APP_VERSION;
    $in_footer = true;

    // Check the environment and select the appropriate CSS files
    if (defined('WP_ENVIRONMENT_TYPE') && WP_ENVIRONMENT_TYPE === 'local') {
        $legacy_css_file = get_stylesheet_directory_uri() . '/dist/css/legacy-style.css';
        wp_enqueue_style('applovin-legacy-style', $legacy_css_file, array(), $theme_version);

        // Enqueue the non-minified Tailwind CSS file in the local environment (development)
        $tailwind_css_file = get_stylesheet_directory_uri() . '/tailwind_output.css';
        wp_enqueue_style('applovin-tailwind-style', $tailwind_css_file, array(), $theme_version);

        // Enqueue the non-minified theme CSS file
        $css_file = get_stylesheet_directory_uri() . '/dist/css/style.css'; // Non-minified in local
        wp_enqueue_style('applovin-theme-style', $css_file, array('applovin-tailwind-style'), $theme_version);

    } else {
        $legacy_css_file = get_stylesheet_directory_uri() . '/legacy-style.min.css';
        wp_enqueue_style('applovin-legacy-style', $legacy_css_file, array(), $theme_version);
        
        // Enqueue the minified Tailwind CSS file for production and other environments
        $tailwind_min_css_file = get_stylesheet_directory_uri() . '/dist/css/tailwind_output.min.css';
        wp_enqueue_style('applovin-tailwind-style', $tailwind_min_css_file, array(), $theme_version);

        // Enqueue the minified theme CSS file
        $css_file = get_stylesheet_directory_uri() . '/style.min.css'; // Minified in production
        wp_enqueue_style('applovin-theme-style', $css_file, array('applovin-tailwind-style'), $theme_version);
    }

    // Deregister default WordPress jQuery
    wp_deregister_script('jquery');

    // Register and enqueue jQuery from theme
    $jquery_path = get_stylesheet_directory_uri() . '/dist/js/jquery/jquery.min.js';
    wp_enqueue_script('jquery', $jquery_path, [], '3.7.2', $in_footer);

    // Enqueu slick slider JS
    $slick_path = get_stylesheet_directory_uri() . '/dist/js/slick.min.js';
    wp_enqueue_script('slick', $slick_path, [], '1.9', $in_footer);

    // Enqueue slick slider CSS
    $util_css_path = get_stylesheet_directory_uri() . '/dist/css/slick.min.css';
    wp_enqueue_style('slick-css', $util_css_path, array(), $theme_version);

    // LazySizes for lazy loading images
    wp_enqueue_script('lazysizes', 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js', array(), '3.10.4', $in_footer);
    
    // Enqueue GSAP
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js', array(), '3.10.4', $in_footer);

    // Enqueue ScrollTrigger (dependent on GSAP)
    wp_enqueue_script('scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js', array('gsap'), '3.10.4', $in_footer);


    wp_style_add_data('applovin-theme-style', 'rtl', 'replace');

}
add_action('wp_enqueue_scripts', 'applovin_theme_scripts');


function applovin_scripts_styles()
{
    $in_footer = true;

    // Load sitewide JavaScript files

    // ScrollTrigger js for scrolling based events
    wp_enqueue_script('scroll-trigger-script', get_template_directory_uri() . '/js/ScrollTrigger.min.js', array(), '', $in_footer);


    // misc site scripts and modifications
    wp_enqueue_script('applovin-main-script', get_template_directory_uri() . '/js/sitemain.js', array(), filemtime(get_template_directory() . '/js/sitemain.js'), $in_footer);



    // Loads our main custom stylesheet

    // wp_enqueue_style(
    //     'applovin-style',
    //     get_stylesheet_directory_uri() . '/style.css',
    //     array(),
    //     filemtime(get_stylesheet_directory() . '/style.css'),
    //     false
    // );


    // // Load utility and third party styles
    // wp_enqueue_style(
    //     'applovin-utilities',
    //     get_stylesheet_directory_uri() . '/css/style-utilities.min.css',
    //     array(),
    //     filemtime(get_stylesheet_directory() . '/css/style-utilities.min.css'),
    //     false
    // );

    // Load page/template-specific stylesheets and scripts as needed


    // Home Page

    // Flip.js + css for counter
    // if (is_page_template('applovin-home-page.php')) {

    //     wp_enqueue_style(
    //         'coverflow-style',
    //         get_stylesheet_directory_uri() . '/css/coverflow.css',
    //         array(),
    //         filemtime(get_stylesheet_directory() . '/css/coverflow.css'),
    //         false
    //     );

    //     wp_enqueue_script('coverflow-script', get_stylesheet_directory_uri() . '/js/FWDR3DCov.js', array(), '', false);
    // }

    // Partner Studios Page
    if (is_page_template('studios-page.php')) {

        wp_enqueue_style(
            'applovin-style-studios',
            get_stylesheet_directory_uri() . '/css/style-studios.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-studios.css'),
            false
        );
    }

    // Studios Single Page
    if (is_singular('studio')) {

        wp_enqueue_style(
            'applovin-style-studios',
            get_stylesheet_directory_uri() . '/css/style-studios.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-studios.css'),
            false
        );
    }


    // Blog and associated pages

    if (is_singular(array('post', 'jp_blog_post', 'kr_blog_post')) || is_archive() ||  is_search() || is_home() || is_page(15613) || is_page(15611)) {

        wp_enqueue_script(
            'blog-post-js',
            get_stylesheet_directory_uri() . '/js/blog.js',
            array(),
            filemtime(get_stylesheet_directory() . '/js/blog.js'),
            '',
            $in_footer
        );

        wp_enqueue_style(
            'blog-post-css',
            get_stylesheet_directory_uri() . '/css/style-blog.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-blog.css'),
            false
        );
    }


    if (is_page_template('single-guides_pod.php')) {


        wp_enqueue_style(
            'blog-post-css',
            get_stylesheet_directory_uri() . '/css/style-blog.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-blog.css'),
            false
        );
    }


    if (is_page_template('adjust-page.php')) {

        wp_enqueue_style(
            'applovin-style-adjust',
            get_stylesheet_directory_uri() . '/css/style-adjust.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-adjust.css'),
            false
        );
    }

    if (is_page_template('events-overview.php')) {

        wp_enqueue_style(
            'applovin-style-events',
            get_stylesheet_directory_uri() . '/css/event-overview.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/event-overview.css'),
            false
        );
    }

    if (is_page_template('sub-events-page.php')) {

        wp_enqueue_style(
            'applovin-style-sb-events',
            get_stylesheet_directory_uri() . '/css/event-overview.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/event-overview.css'),
            false
        );
    }




    if (is_page_template('creative-reports/creative-report-2024.php')) {

        wp_enqueue_style(
            'style-creative-report',
            get_stylesheet_directory_uri() . '/css/creative-report-2024.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/creative-report-2024.css'),
            false
        );
    }

    if (is_page_template('single-report_pod.php')) {

        wp_enqueue_style(
            'style-creative-single-report',
            get_stylesheet_directory_uri() . '/css/creative-report-2024.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/creative-report-2024.css'),
            false
        );
    }


    if (is_page_template('events-overview.php')) {

        wp_enqueue_style(
            'applovin-style-events',
            get_stylesheet_directory_uri() . '/css/event-overview.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/event-overview.css'),
            false
        );
    }

    if (is_page_template('sub-events-page.php')) {

        wp_enqueue_style(
            'applovin-style-sb-events',
            get_stylesheet_directory_uri() . '/css/event-overview.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/event-overview.css'),
            false
        );
    }




    if (is_page_template('appdiscovery-page.php')) {

        wp_enqueue_style(
            'applovin-style-appdiscovery',
            get_stylesheet_directory_uri() . '/css/style-appdiscovery.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-appdiscovery.css'),
            false
        );

        wp_enqueue_script('skrollr-script', get_stylesheet_directory_uri() . '/js/skrollr.min.js', array(), '', $in_footer);
    }


    if (is_page_template('contact-page.php')) {

        wp_enqueue_style(
            'applovin-style-contact',
            get_stylesheet_directory_uri() . '/css/style-contact.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-contact.css'),
            false
        );
    }


    if (is_page_template('creative-reports/creative-report-2024.php')) {

        wp_enqueue_style(
            'style-creative-report',
            get_stylesheet_directory_uri() . '/css/creative-report-2024.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/creative-report-2024.css'),
            false
        );
    }

    if (is_page_template('glossary-page.php')) {

        wp_enqueue_style(
            'applovin-style-glossary',
            get_stylesheet_directory_uri() . '/css/style-glossary.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-glossary.css'),
            false
        );
    }

    if (is_singular('glossary_entry')) {

        wp_enqueue_style(
            'applovin-style-glossary',
            get_stylesheet_directory_uri() . '/css/style-glossary.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-glossary.css'),
            false
        );
    }

    if (is_page_template('jobs-page.php')) {

        wp_enqueue_style(
            'applovin-style-jobs',
            get_stylesheet_directory_uri() . '/css/style-jobs.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-jobs.css'),
            false
        );
    }

    if (is_page_template(array('max-page.php', 'mopub-max-page.php', 'mopub-max-steps-page.php', 'mopub-max-features-page.php'))) {

        wp_enqueue_style(
            'applovin-style-max',
            get_stylesheet_directory_uri() . '/css/style-max.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-max.css'),
            false
        );
    }

    if (is_page_template('alx-page.php')) {

        wp_enqueue_style(
            'applovin-style-alx',
            get_stylesheet_directory_uri() . '/css/style-alx.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-alx.css'),
            false
        );
    }

    if (is_page_template('array-page.php')) {

        wp_enqueue_style(
            'applovin-style-array',
            get_stylesheet_directory_uri() . '/css/style-array.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-array.css'),
            false
        );

        wp_enqueue_style(
            'coverflow-style',
            get_stylesheet_directory_uri() . '/css/coverflow.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/coverflow.css'),
            false
        );

        wp_enqueue_script('coverflow-script', get_stylesheet_directory_uri() . '/js/FWDR3DCov.js', array(), '', false);
    }

    if (is_page_template('partners-page.php')) {

        wp_enqueue_style(
            'applovin-style-partners',
            get_stylesheet_directory_uri() . '/css/style-partners.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-partners.css'),
            false
        );
    }

    if (is_page_template('policy-gateway.php')) {

        wp_enqueue_style(
            'applovin-style-policy',
            get_stylesheet_directory_uri() . '/css/style-policies.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-policies.css'),
            false
        );
    }

    if (is_page_template('policies-page.php')) {

        wp_enqueue_style(
            'applovin-style-policy',
            get_stylesheet_directory_uri() . '/css/style-policies.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-policies.css'),
            false
        );
    }

    if (is_page_template('terms-page.php')) {

        wp_enqueue_style(
            'applovin-style-policy',
            get_stylesheet_directory_uri() . '/css/style-policies.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-policies.css'),
            false
        );
    }


    if (is_page_template('esg-page.php')) {

        wp_enqueue_style(
            'applovin-esg',
            get_stylesheet_directory_uri() . '/css/style-esg.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-esg.css'),
            false
        );
    }

    if (is_page_template('press-page.php')) {

        wp_enqueue_style(
            'applovin-style-press',
            get_stylesheet_directory_uri() . '/css/style-press.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-press.css'),
            false
        );
    }

    if (is_page_template('solutions-page.php')) {

        wp_enqueue_style(
            'applovin-style-solutions',
            get_stylesheet_directory_uri() . '/css/style-solutions.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-solutions.css'),
            false
        );

        wp_enqueue_script('skrollr-script', get_stylesheet_directory_uri() . '/js/skrollr.min.js', array(), '', false);
    }

    if (is_page_template('sparklabs-page.php')) {

        wp_enqueue_style(
            'applovin-style-sparklabs',
            get_stylesheet_directory_uri() . '/css/style-sparklabs.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-sparklabs.css'),
            false
        );
    }


    if (is_page_template('support-page.php')) {

        wp_enqueue_style(
            'applovin-style-support',
            get_stylesheet_directory_uri() . '/css/style-support.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-support.css'),
            false
        );
    }


    if (is_page_template('success-stories-overview-page.php')) {

        wp_enqueue_style(
            'applovin-style-success',
            get_stylesheet_directory_uri() . '/css/style-success.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-success.css'),
            false
        );
    }

    if (is_page_template(array('success-story-page.php', 'success-story-custom-fungi-page.php', 'success-story-page-custom.php', 'single-success_story_pod.php', 'single-success-stories-with.php'))) {

        wp_enqueue_style(
            'applovin-style-success',
            get_stylesheet_directory_uri() . '/css/style-success.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-success.css'),
            false
        );
    }

    if (is_singular(array('success-stories-with', 'success_story_pod'))) {

        wp_enqueue_style(
            'applovin-style-success',
            get_stylesheet_directory_uri() . '/css/style-success.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-success.css'),
            false
        );
    }

    if (is_page_template("videos-overview-page.php")) {

        wp_enqueue_style(
            'applovin-style-video',
            get_stylesheet_directory_uri() . '/css/style-video.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-video.css'),
            false
        );
    }


    if ( is_tax( 'video-categories' ) || is_tax( 'videos-series' ) ) {
        wp_enqueue_style(
            'applovin-style-video',
            get_stylesheet_directory_uri() . '/css/style-video.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-video.css'),
            false
        );
    }

    if (is_singular('video')) {

        wp_enqueue_style(
            'applovin-style-video',
            get_stylesheet_directory_uri() . '/css/style-video.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-video.css'),
            false
        );
    }




    if (is_page_template('pressreleases-page.php')) {

        wp_enqueue_style(
            'applovin-style-press',
            get_stylesheet_directory_uri() . '/css/style-press.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-press.css'),
            false
        );
    }

    if (is_page_template('ressource-center-overview.php')) {

        wp_enqueue_style(
            'style-resource-center',
            get_stylesheet_directory_uri() . '/css/style-resource-center.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-resource-center.css'),
            false
        );
    }


    if (is_page_template('rc-category-page.php')) {

        wp_enqueue_style(
            'style-resource-center',
            get_stylesheet_directory_uri() . '/css/style-resource-center.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-resource-center.css'),
            false
        );
    }


    if (is_page_template('rc-objective-page.php')) {

        wp_enqueue_style(
            'style-resource-center',
            get_stylesheet_directory_uri() . '/css/style-resource-center.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-resource-center.css'),
            false
        );
    }


    if (is_page_template('reports-overview-page.php')) {

        wp_enqueue_style(
            'reports-overview-page',
            get_stylesheet_directory_uri() . '/css/style-resource-center.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-resource-center.css'),
            false
        );
    }

    if (is_page_template('reports-with-blocks.php')) {

        wp_enqueue_style(
            'reports-overview-page',
            get_stylesheet_directory_uri() . '/css/style-resource-center.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-resource-center.css'),
            false
        );
    }




    if (is_page_template('brandassets-page.php')) {

        wp_enqueue_style(
            'applovin-style-press',
            get_stylesheet_directory_uri() . '/css/style-press.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-press.css'),
            false
        );
    }

    if (is_page_template('dev-source-page.php')) {

        wp_enqueue_style(
            'applovin-style-dev-source',
            get_stylesheet_directory_uri() . '/css/style-dev-source.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/style-dev-source.css'),
            false
        );

        wp_enqueue_script('clipboard-js', get_stylesheet_directory_uri() . '/js/clipboard.min.js', array(), filemtime(get_stylesheet_directory() . '/js/clipboard.min.js'), false);
    }

    if (is_page_template('alx-holiday-inventory-page.php')) {

        wp_enqueue_script('clipboard-js', get_stylesheet_directory_uri() . '/js/clipboard.min.js', array(), filemtime(get_stylesheet_directory() . '/js/clipboard.min.js'), false);
    }

    if (file_exists(get_template_directory() . '/theme.css')) {
        // Loads theme default stylesheet (if present)
        wp_enqueue_style('applovin-theme', get_template_directory_uri() . '/theme.css', array());
    }

    if (is_page_template('audience-plus.php')) {
        // GSAP animations (custom script)
        wp_enqueue_script('custom-script', get_template_directory_uri() . '/js/gsap-animations.js', array('jquery', 'gsap', 'scrolltrigger'), filemtime(get_template_directory() . '/js/gsap-animations.js'), true);
    }

    // Localized language vars 

    $langDetect = get_language_attributes();

    if (str_contains($langDetect, "zh-CN")) {

        wp_enqueue_style(
            'applovin-style-cn',
            get_stylesheet_directory_uri() . '/css/var-cn.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/var-cn.css'),
            false
        );
    } else if (str_contains($langDetect, "ko-KR")) {

        wp_enqueue_style(
            'applovin-style-ko',
            get_stylesheet_directory_uri() . '/css/var-ko.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/var-ko.css'),
            false
        );
    } else if (str_contains($langDetect, "ja")) {

        wp_enqueue_style(
            'applovin-style-ja',
            get_stylesheet_directory_uri() . '/css/var-ja.css',
            array(),
            filemtime(get_stylesheet_directory() . '/css/var-ja.css'),
            false
        );
    };
}

add_action('wp_enqueue_scripts', 'applovin_scripts_styles');
