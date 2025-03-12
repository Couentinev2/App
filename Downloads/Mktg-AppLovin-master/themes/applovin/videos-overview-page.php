
<?php
/*
Template Name: Videos Overview Page
*/
?>

<?php get_header(); ?>
<script src="https://www.youtube.com/iframe_api"></script>

<div class="contentPage main-ov-vl">
    <div id="page-video" class="overview-v">
    <div class="row hero">
    <div class="inner-wrap inner-wrap-1200">
    <?php
        $featured_posts = get_field('promoted_video');

        if ($featured_posts) {
            $posts_data = [];
            $codevideo = []; // Initialize the array to store video codes

            foreach ($featured_posts as $index => $featured_post) {
                $bg_teasertest = get_field('short_description', $featured_post->ID);
                $idfeat = $featured_post->ID;
                $titleFeatured = get_field('video_title', $featured_post->ID);
                $prmotedvideo = get_field('overview_promoted_video', $featured_post->ID);
                $prmotedvideomobile = get_field('overview_promoted_video_mobile', $featured_post->ID);
                $post_url = get_permalink($featured_post->ID); // Get the post URL

                $terms = get_the_terms($idfeat, 'video_categories');
                $namemain = '';
                $parent_name = '';

                $str = get_field('video_link', $featured_post->ID);
                if (str_contains($str, 'embed')) {
                    $strlong = explode("/", $str);
                    $codevideo[] = $strlong[4]; // Append the video code to the array
                } else {
                    $strlong = explode("=", $str);
                    if (str_contains($strlong[1], '&')) {
                        $strlong = explode("&", $strlong[1]);
                        $codevideo[] = $strlong[0]; // Append the video code to the array
                    } else {
                        $codevideo[] = $strlong[1]; // Append the video code to the array
                    }
                }

                if (!is_wp_error($terms) && !empty($terms)) {
                    foreach ($terms as $term) {
                        $namemain = $term->name;
                        $parent_term = $term->parent;
                        if ($parent_term) {
                            $parent_name = get_term($parent_term);
                        }
                    }
                } else {
                    $namemain = 'No category';
                    $parent_name = null;
                }

                $posts_data[] = [
                    'bg_teasertest' => $bg_teasertest,
                    'titleFeatured' => $titleFeatured,
                    'prmotedvideo' => $prmotedvideo,
                    'prmotedvideomobile' => $prmotedvideomobile,
                    'namemain' => $namemain,
                    'parent_name' => $parent_name,
                    'post_url' => $post_url // Add the post URL to the data array
                ];
            }

            echo '<div class="video-card-pod grid text-content">
                    <div class="hero-intro">
                        <div class="inner-wrap inner-wrap-1200 inner-wrap-max-right text-one active">
                            <a class="" href="' . esc_url($posts_data[0]['post_url']) . '">
                                <h1 class="scale-50-40-28" style="max-width:600px">' . $posts_data[0]['titleFeatured'] . '</h1>
                            </a>
                            <p class="scale-21-18-18" style="max-width:600px">' . $posts_data[0]['bg_teasertest'] . '</p>
                        </div>
                        <div class="inner-wrap inner-wrap-1200 inner-wrap-max-right text-two">
                            <a class="" href="' . esc_url($posts_data[1]['post_url']) . '">
                                <h1 class="scale-50-40-28" style="max-width:600px">' . $posts_data[1]['titleFeatured'] . '</h1>
                            </a>
                            <p class="scale-21-18-18" style="max-width:600px">' . $posts_data[1]['bg_teasertest'] . '</p>
                        </div>
                        <div class="inner-wrap inner-wrap-1200 inner-wrap-max-right text-three">
                            <a class="" href="' . esc_url($posts_data[2]['post_url']) . '">
                                <h1 class="scale-50-40-28" style="max-width:600px">' . $posts_data[2]['titleFeatured'] . '</h1>
                            </a>
                            <p class="scale-21-18-18" style="max-width:600px">' . $posts_data[2]['bg_teasertest'] . '</p>
                        </div>
                    </div>
                    <div class="video-hero-section desktop relative h-screen overflow-y-scroll">
                    <div class="video-one herovideo-panel-video w-full rounded-lg shadow-lge active">
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/' . $codevideo[0] . '?autoplay=1&mute=1&rel=0&enablejsapi=1&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>
                        </div>

                        <div class="video-two herovideo-panel-video w-full rounded-lg shadow-lge">
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/' . $codevideo[1] . '?autoplay=0&mute=1&rel=0&enablejsapi=1&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>
                        </div>

                        <div class="video-three herovideo-panel-video w-full rounded-lg shadow-lge">
<iframe width="100%" height="auto" src="https://www.youtube.com/embed/' . $codevideo[2] . '?autoplay=0&mute=1&rel=0&enablejsapi=1&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>
                        </div>
                        <div class="video-navigation">
                            <button class="arrow-left">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M14.9989 20.6239C15.2839 20.6239 15.5689 20.5189 15.7939 20.2939C16.2289 19.8589 16.2289 19.1389 15.7939 18.704L9.08925 11.9993L15.7939 5.29469C16.2289 4.85971 16.2289 4.13975 15.7939 3.70477C15.3589 3.2698 14.639 3.2698 14.204 3.70477L6.70438 11.2044C6.2694 11.6393 6.2694 12.3593 6.70438 12.7943L14.204 20.2939C14.429 20.5189 14.7139 20.6239 14.9989 20.6239Z" fill="white"/>
                                </svg>
                            </button>
                            <button class="arrow-right">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M9.00217 20.6261C8.71715 20.6261 8.43214 20.5211 8.20713 20.2961C7.7721 19.8611 7.7721 19.141 8.20713 18.706L14.9125 12.0006L8.20713 5.29526C7.7721 4.86024 7.7721 4.1402 8.20713 3.70517C8.64215 3.27015 9.36219 3.27015 9.79721 3.70517L17.2976 11.2056C17.7326 11.6406 17.7326 12.3606 17.2976 12.7957L9.79721 20.2961C9.5722 20.5211 9.28718 20.6261 9.00217 20.6261Z" fill="white"/>
                                </svg>
                            </button>
                            <div class="progress-bar-container">
                                <div class="progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>';
            wp_reset_postdata();
        }
    ?>
</div>



</div>

<div class="video-category">
    <div class="inner-wrap inner-wrap-1200">
        <h2 class="scale-28-24-21 title-series title-series-home"><?php echo pll_e('Browse by Categories'); ?></h2>
      <div class="video-category-wrap">
    <?php $video_categories = get_terms(array('taxonomy' => 'video-categories', 'hide_empty' => false)); ?>
                        <?php foreach ($video_categories as $video_categorie): ?>
                            <a class="video_categories <?php echo esc_attr($video_categorie->slug); ?>" data-value-product="<?php echo esc_attr($video_categorie->slug); ?>" href="<?php echo esc_url(get_term_link($video_categorie)); ?>">
                                <h3 class="scale-28-24-21"><?php echo esc_html($video_categorie->name); ?></h3>
                        </a>
                        <?php endforeach; ?>
      </div>  
    </div>
</div>

<div class="over-content-main-video">
<div class="inner-wrap inner-wrap-1200">
  <div class="main-video-title">
    <h2 class="scale-32-24-21"><?php echo pll_e('All videos'); ?></h2>
  </div>

    <div class="dropdown">
        <p class="dropbtmnt fixed-14">
            <?php echo pll_e('Filter'); ?>
        </p>
        <div class="dropdown-content" id="menu-drop-dontent-video">
            <!-- Dropdown for Products -->
            <div class="dropdown-container">
                <div class="fixed-14 dropbtn custom-dropdown">
                    <div class="selected-option allselect">All Products</div>
                    <div class="options-container">
                        <div class="dropdown-option pointer-cursor" data-value-product="">All Products</div>
                        <?php $products_type = get_terms(array('taxonomy' => 'products', 'hide_empty' => true)); ?>
                        <?php foreach ($products_type as $product_term): ?>
                            <div class="dropdown-option pointer-cursor" data-value-product="<?php echo esc_attr($product_term->slug); ?>">
                                <?php echo esc_html($product_term->name); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <span class="arrow-main"></span>

                </div>
            </div>
            <!-- Dropdown for Topics -->
            <div class="dropdown-container">
                <div class="fixed-14 dropbtn custom-dropdown custom-dropdownthree">
                    <div class="selected-option allselect">All Topics</div>
                    <div class="options-container">
                        <div class="dropdown-option pointer-cursor" data-value-topics="">All Topics</div>
                        <?php $topics_terms = get_terms(array('taxonomy' => 'topics', 'hide_empty' => true)); ?>
                        <?php foreach ($topics_terms as $topic_term): ?>
                            <div class="dropdown-option pointer-cursor" data-value-topics="<?php echo esc_attr($topic_term->slug); ?>">
                                <?php echo esc_html($topic_term->name); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <span class="arrow-main"></span>

                </div>
            </div>
            <!-- Dropdown for Objectives 
            <div class="dropdown-container">
                <div class="fixed-14 dropbtn custom-dropdown-business-objective">
                    <div class="selected-option allselect">Select Objective</div>
                    <div class="options-container">
                        <div class="dropdown-option pointer-cursor" data-value-objective="">All Objectives</div>
                        <?php $objectives_type = get_terms('objectives'); ?>
                        <?php foreach ($objectives_type as $objective_term): ?>
                            <div class="dropdown-option pointer-cursor" data-value-objective="<?php echo esc_attr($objective_term->slug); ?>">
                                <?php echo esc_html($objective_term->name); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <span class="arrow-main"></span>

                </div>
            </div> -->
        </div>
    </div>
</div>
</div>
<div class="main-content-main-video">
<div class="inner-wrap inner-wrap-1200">
<div class="main-content-ov-video" id="video-posts-container">
    <?php 
        $args = array( 
            'post_type' => 'video', 
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => -1,
        );

        $loop = new WP_Query($args);
        if ($loop->have_posts()):
            while ($loop->have_posts()): $loop->the_post();
                $post_id = get_the_ID();
                $video_title = get_field('video_title', $post_id);
                $video_thumbnail = get_field('video_thumbnail', $post_id);
                $timecodevideo = get_field('timecodevideo', $post_id);
                $permalink = get_permalink($post_id);
                ?>
                <a class="video-card-link-wrap" href="<?php echo esc_url($permalink); ?>" 
                    data-product="<?php echo esc_attr(implode(", ", wp_get_post_terms($post_id, 'products', array('fields' => 'slugs')))); ?>"
                    data-topic="<?php echo esc_attr(implode(", ", wp_get_post_terms($post_id, 'topics', array('fields' => 'slugs')))); ?>"
                    <?php if ( ! empty($objective_slugs_string) ) : ?>
       data-objective="<?php echo esc_attr($objective_slugs_string); ?>"
   <?php endif; ?>>
                    <div class="video-card">
                        <div class="video-card-art">
                            <img class="video-overview-image" src="<?php echo esc_url($video_thumbnail); ?>" alt="" />
                            <p class="timeCode"><?php echo esc_html($timecodevideo); ?> MIN</p>
                        </div>
                        <div class="video-card-content">
                            <div class="card-content">
                                <h5 class="scale-18-18-16">
                                    <?php echo esc_html($video_title); ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
            endwhile;
        endif;
        wp_reset_postdata();
    ?>
</div>
<div id="pagination-container" class="paginations"></div>

</div>
</div>

</div>
<div class="video-series">
    
    <div class="">
    <div class="inner-wrap inner-wrap-1200">

    <h2 class="scale-32-24-21 title-series"><?php echo pll_e('Browse by Series'); ?></h2>
</div>
      <div class="video-series-wrap">
    <?php $video_categories = get_terms(array('taxonomy' => 'videos-series', 'hide_empty' => false)); ?>
                        <?php foreach ($video_categories as $video_categorie): ?>
                            <a class="video_series <?php echo esc_attr($video_categorie->slug); ?>" data-value-product="<?php echo esc_attr($video_categorie->slug); ?>" href="<?php echo esc_url(get_term_link($video_categorie)); ?>">
                                <h3 class="scale-32-24-21"><?php echo esc_html($video_categorie->name); ?></h3>
                        </a>
                        <?php endforeach; ?>
      </div>  
    </div>
</div>
<?php get_template_part('template-modules/email-signup');?>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    const posts = document.querySelectorAll('.video-card-link-wrap');

    function getSelectedValues() {
        const productElement = document.querySelector('.custom-dropdown .selected-option');
        const topicElement = document.querySelector('.custom-dropdownthree .selected-option');
        const objectiveElement = document.querySelector('.custom-dropdown-business-objective .selected-option');

        const product = productElement ? productElement.getAttribute('data-value-product') || '' : '';
        const topic = topicElement ? topicElement.getAttribute('data-value-topics') || '' : '';
        const objective = objectiveElement ? objectiveElement.getAttribute('data-value-objective') || '' : '';

        return { product, topic, objective };
    }

    function applyFilters() {
        const selected = getSelectedValues();
        posts.forEach(post => {
            const productValues = post.getAttribute('data-product') ? post.getAttribute('data-product').split(',').map(p => p.trim()) : [];
            const topicValues = post.getAttribute('data-topic') ? post.getAttribute('data-topic').split(',').map(t => t.trim()) : [];
            const objectiveValues = post.getAttribute('data-objective') ? post.getAttribute('data-objective').split(',').map(o => o.trim()) : [];

            const productMatch = !selected.product || productValues.includes(selected.product);
            const topicMatch = !selected.topic || topicValues.includes(selected.topic);
            const objectiveMatch = !selected.objective || objectiveValues.includes(selected.objective);

            if (productMatch && topicMatch && objectiveMatch) {
                post.style.display = 'flex';
            } else {
                post.style.display = 'none';
            }
        });
    }

    function handleDropdownClick(option, dropdownSelector) {
        const parentDropdown = option.closest(dropdownSelector);
        const selectedOptionDisplay = parentDropdown.querySelector('.selected-option');
        selectedOptionDisplay.innerHTML = option.innerHTML;

        const dataValueAttr = option.hasAttribute('data-value-product') ? 'data-value-product' :
                              option.hasAttribute('data-value-topics') ? 'data-value-topics' :
                              option.hasAttribute('data-value-objective') ? 'data-value-objective' : '';

        selectedOptionDisplay.setAttribute(dataValueAttr, option.getAttribute(dataValueAttr) || '');
        applyFilters();
        updateDropdownOptions();
    }

    document.querySelectorAll('.custom-dropdown .dropdown-option').forEach(option => {
        option.addEventListener('click', function() {
            handleDropdownClick(this, '.custom-dropdown');
        });
    });

    document.querySelectorAll('.custom-dropdownthree .dropdown-option').forEach(option => {
        option.addEventListener('click', function() {
            handleDropdownClick(this, '.custom-dropdownthree');
        });
    });

    document.querySelectorAll('.custom-dropdown-business-objective .dropdown-option').forEach(option => {
        option.addEventListener('click', function() {
            handleDropdownClick(this, '.custom-dropdown-business-objective');
        });
    });

    function updateDropdownOptions() {
        const selected = getSelectedValues();
        const availableOptions = {
            products: new Set(),
            topics: new Set(),
            objectives: new Set()
        };

        posts.forEach(post => {
            if (matchesFilter(post, selected)) {
                post.getAttribute('data-product').split(',').forEach(product => availableOptions.products.add(product.trim()));
                post.getAttribute('data-topic').split(',').forEach(topic => availableOptions.topics.add(topic.trim()));
                post.getAttribute('data-objective').split(',').forEach(objective => availableOptions.objectives.add(objective.trim()));
            }
        });

        updateDropdown(document.querySelectorAll('.custom-dropdown .dropdown-option'), availableOptions.products);
        updateDropdown(document.querySelectorAll('.custom-dropdownthree .dropdown-option'), availableOptions.topics);
        updateDropdown(document.querySelectorAll('.custom-dropdown-business-objective .dropdown-option'), availableOptions.objectives);
    }

    function matchesFilter(post, selected) {
        const productValues = post.getAttribute('data-product') ? post.getAttribute('data-product').split(',').map(p => p.trim()) : [];
        const topicValues = post.getAttribute('data-topic') ? post.getAttribute('data-topic').split(',').map(t => t.trim()) : [];
        const objectiveValues = post.getAttribute('data-objective') ? post.getAttribute('data-objective').split(',').map(o => o.trim()) : [];

        const productMatch = !selected.product || productValues.includes(selected.product);
        const topicMatch = !selected.topic || topicValues.includes(selected.topic);
        const objectiveMatch = !selected.objective || objectiveValues.includes(selected.objective);

        return productMatch && topicMatch && objectiveMatch;
    }

    function updateDropdown(options, availableOptions) {
        options.forEach(option => {
            const value = option.getAttribute('data-value-product') ||
                          option.getAttribute('data-value-topics') ||
                          option.getAttribute('data-value-objective') || '';

            if (availableOptions.has(value) || value === '') {
                option.style.color = 'black';
                option.style.pointerEvents = 'auto';
            } else {
                option.style.color = 'grey';
                option.style.pointerEvents = 'none';
            }
        });
    }

    applyFilters();
    updateDropdownOptions();
});
</script>

<script>
jQuery(document).ready(function($) {
    function switchVideo(clickedVideo) {
        const videos = $('.herovideo-panel-video');
        const texts = $('.inner-wrap-max-right');

        videos.removeClass('active');
        texts.removeClass('active');

        $(clickedVideo).addClass('active');

        const isMobile = window.innerWidth <= 768;
        const isTablet = window.innerWidth > 768 && window.innerWidth <= 1024;

        // Update video sizes and positions
        if ($(clickedVideo).hasClass('video-one')) {
    $('.video-one').css({
        width: '100%',
        top: '0',
        zIndex: 3,
        filter: 'brightness(1)'
    });
    $('.video-two').css({
        width: isMobile ? '90%' : isTablet ? '59%' : '90%',
        top: isMobile ? '8%' : isTablet ? '33%' : '10%',
        zIndex: 2,
        height: isMobile ? '40%' : isTablet ? '36%' : '59%',
        filter: 'brightness(0.8)'
    });
    $('.video-three').css({
        width: isMobile ? '80%' : isTablet ? '50%' : '80%',
        top: isMobile ? '15%' : isTablet ? '42%' : '20%',
        zIndex: 1,
        height: isMobile ? '35%' : isTablet ? '31%' : '53%',
        filter: 'brightness(0.6)'
    });

    $('.text-one').addClass('active');
} else if ($(clickedVideo).hasClass('video-two')) {
    $('.video-two').css({
        width: '100%',
        top: '0',
        zIndex: 3,
        filter: 'brightness(1)'
    });
    $('.video-one').css({
        width: isMobile ? '90%' : isTablet ? '59%' : '90%',
        top: isMobile ? '8%' : isTablet ? '33%' : '10%',
        zIndex: 2,
        height: isMobile ? '40%' : isTablet ? '36%' : '59%',
        filter: 'brightness(0.8)'
    });
    $('.video-three').css({
        width: isMobile ? '80%' : isTablet ? '50%' : '80%',
        top: isMobile ? '15%' : isTablet ? '42%' : '20%',
        zIndex: 1,
        height: isMobile ? '35%' : isTablet ? '31%' : '53%',
        filter: 'brightness(0.6)'
    });

    $('.text-two').addClass('active');
} else if ($(clickedVideo).hasClass('video-three')) {
    $('.video-three').css({
        width: '100%',
        top: '0',
        zIndex: 3,
        filter: 'brightness(1)'
    });
    $('.video-one').css({
        width: isMobile ? '90%' : isTablet ? '59%' : '90%',
        top: isMobile ? '8%' : isTablet ? '33%' : '10%',
        zIndex: 2,
        height: isMobile ? '40%' : isTablet ? '36%' : '59%',
        filter: 'brightness(0.8)'
    });
    $('.video-two').css({
        width: isMobile ? '80%' : isTablet ? '50%' : '80%',
        top: isMobile ? '15%' : isTablet ? '42%' : '20%',
        zIndex: 1,
        height: isMobile ? '35%' : isTablet ? '31%' : '53%',
        filter: 'brightness(0.6)'
    });

    $('.text-three').addClass('active');
}

        // Pause all videos, disable autoplay, and hide controls
        videos.find('iframe').each(function() {
            const iframeSrc = $(this).attr('src');
            // Disable autoplay, remove controls, and ensure the video is paused
            $(this).attr('src', iframeSrc.replace(/autoplay=\d/, 'autoplay=0').replace(/controls=\d/, 'controls=0'));
            this.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
        });

        // Enable autoplay, controls, and play the active video
        const activeIframe = $(clickedVideo).find('iframe')[0];
        const activeIframeSrc = $(activeIframe).attr('src');
        // Enable autoplay and controls for the active video
        $(activeIframe).attr('src', activeIframeSrc.replace(/autoplay=\d/, 'autoplay=1').replace(/controls=\d/, 'controls=1'));
        activeIframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
    }

    // Initialize videos
    const videos = $('.herovideo-panel-video');
    videos.find('iframe').each(function() {
        const iframeSrc = $(this).attr('src');
        // Ensure all videos start without autoplay and controls
        $(this).attr('src', iframeSrc.includes('autoplay=') ? iframeSrc.replace(/autoplay=\d/, 'autoplay=0') : iframeSrc + '&autoplay=0');
        $(this).attr('src', iframeSrc.includes('controls=') ? iframeSrc.replace(/controls=\d/, 'controls=0') : iframeSrc + '&controls=0');
        this.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    });
    // Play the first video with autoplay and controls
    const firstIframe = videos.first().find('iframe')[0];
    const firstIframeSrc = $(firstIframe).attr('src');
    $(firstIframe).attr('src', firstIframeSrc.replace(/autoplay=\d/, 'autoplay=1').replace(/controls=\d/, 'controls=1'));
    firstIframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');

    // Handle click events on video links
    $('.video-hero-section a').on('click', function(event) {
        const clickedVideo = $(this).find('.herovideo-panel-video');
        if (!clickedVideo.hasClass('active')) {
            event.preventDefault();
            switchVideo(clickedVideo);
            updateProgressBar($(this).index());
        } else {
            return true;
        }
    });

    // Handle arrow navigation
    const arrowLeft = $('.arrow-left');
    const arrowRight = $('.arrow-right');
    const progressBar = $('.progress-bar');

    let currentIndex = 0;

    function updateProgressBar(index) {
        const progressWidth = ((index + 1) / videos.length) * 100;
        progressBar.css('width', progressWidth + '%');
    }

    function showVideo(index) {
        const clickedVideo = videos.get(index);
        switchVideo($(clickedVideo));
        updateProgressBar(index);
    }

    arrowLeft.on('click', function() {
        currentIndex = (currentIndex - 1 + videos.length) % videos.length;
        showVideo(currentIndex);
    });

    arrowRight.on('click', function() {
        currentIndex = (currentIndex + 1) % videos.length;
        showVideo(currentIndex);
    });

    updateProgressBar(currentIndex);
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const postsPerPage = 6; 
    const postsContainer = document.getElementById('video-posts-container');
    const paginationContainer = document.getElementById('pagination-container');
    let currentPage = 1;
    let allPosts = Array.from(postsContainer.querySelectorAll('.video-card-link-wrap')); 
    let filteredPosts = []; 

    function showPage(page) {
        const start = (page - 1) * postsPerPage;
        const end = start + postsPerPage;
        const postsToShow = filteredPosts.slice(start, end); 

        allPosts.forEach(post => post.style.display = 'none');

        postsToShow.forEach(post => post.style.display = 'flex');
    }

    function updatePagination() {
        paginationContainer.innerHTML = '';
        const totalPages = Math.ceil(filteredPosts.length / postsPerPage);

        if (totalPages <= 1) {
            return;
        }

        const leftArrow = document.createElement('button');
        leftArrow.textContent = '<';
        if (currentPage === 1) {
            leftArrow.disabled = true;
        }
        leftArrow.addEventListener('click', () => {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
                updatePagination();
            }
        });
        paginationContainer.appendChild(leftArrow);

        addPageButton(1);

        let startPage = currentPage - 1;
        let endPage = currentPage + 1;

        if (startPage < 2) {
            startPage = 2;
        }
        if (endPage > totalPages - 1) {
            endPage = totalPages - 1;
        }

        if (startPage > 2) {
            addDots();
        }

        for (let i = startPage; i <= endPage; i++) {
            addPageButton(i);
        }

        if (endPage < totalPages - 1) {
            addDots();
        }

        if (totalPages > 1) {
            addPageButton(totalPages);
        }

        const rightArrow = document.createElement('button');
        rightArrow.textContent = '>';
        if (currentPage === totalPages) {
            rightArrow.disabled = true;
        }
        rightArrow.addEventListener('click', () => {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
                updatePagination();
            }
        });
        paginationContainer.appendChild(rightArrow);

        /**
         * Helper functions
         */
        function addPageButton(pageNumber) {
            const pageBtn = document.createElement('button');
            pageBtn.textContent = pageNumber;
            if (pageNumber === currentPage) {
                pageBtn.classList.add('active');
            }
            pageBtn.addEventListener('click', () => {
                currentPage = pageNumber;
                showPage(currentPage);
                updatePagination();
            });
            paginationContainer.appendChild(pageBtn);
        }

        function addDots() {
            const dots = document.createElement('span');
            dots.textContent = '...';
            dots.classList.add('dots');
            paginationContainer.appendChild(dots);
        }
    }

    // Function to apply filters
    function applyFilters() {
        const selected = getSelectedValues();

        // Filter all posts based on selected values
        filteredPosts = allPosts.filter(post => {
            const productValues = post.getAttribute('data-product') 
                ? post.getAttribute('data-product').split(',').map(p => p.trim()) 
                : [];
            const topicValues = post.getAttribute('data-topic') 
                ? post.getAttribute('data-topic').split(',').map(t => t.trim()) 
                : [];
            const objectiveValues = post.getAttribute('data-objective') 
                ? post.getAttribute('data-objective').split(',').map(o => o.trim()) 
                : [];

            const productMatch = !selected.product || productValues.includes(selected.product);
            const topicMatch = !selected.topic || topicValues.includes(selected.topic);
            const objectiveMatch = !selected.objective || objectiveValues.includes(selected.objective);

            return productMatch && topicMatch && objectiveMatch;
        });

        // Reset to the first page after filtering
        currentPage = 1;
        showPage(currentPage);
        updatePagination();
    }

    // Function to get selected filter values
    function getSelectedValues() {
        const productElement = document.querySelector('.custom-dropdown .selected-option');
        const topicElement = document.querySelector('.custom-dropdownthree .selected-option');
        const objectiveElement = document.querySelector('.custom-dropdown-business-objective .selected-option');

        const product = productElement 
            ? productElement.getAttribute('data-value-product') || '' 
            : '';
        const topic = topicElement 
            ? topicElement.getAttribute('data-value-topics') || '' 
            : '';
        const objective = objectiveElement 
            ? objectiveElement.getAttribute('data-value-objective') || '' 
            : '';

        return { product, topic, objective };
    }

    // Function to handle dropdown option clicks
    function handleDropdownClick(option, dropdownSelector) {
        const parentDropdown = option.closest(dropdownSelector);
        const selectedOptionDisplay = parentDropdown.querySelector('.selected-option');
        selectedOptionDisplay.innerHTML = option.innerHTML;

        const dataValueAttr = option.hasAttribute('data-value-product') 
            ? 'data-value-product' 
            : option.hasAttribute('data-value-topics') 
                ? 'data-value-topics' 
                : option.hasAttribute('data-value-objective') 
                    ? 'data-value-objective' 
                    : '';

        selectedOptionDisplay.setAttribute(dataValueAttr, option.getAttribute(dataValueAttr) || '');
        applyFilters(); // Reapply filters when a dropdown option is selected
    }

    // Attach event listeners to dropdown options
    document.querySelectorAll('.custom-dropdown .dropdown-option').forEach(option => {
        option.addEventListener('click', function () {
            handleDropdownClick(this, '.custom-dropdown');
        });
    });

    document.querySelectorAll('.custom-dropdownthree .dropdown-option').forEach(option => {
        option.addEventListener('click', function () {
            handleDropdownClick(this, '.custom-dropdownthree');
        });
    });

    document.querySelectorAll('.custom-dropdown-business-objective .dropdown-option').forEach(option => {
        option.addEventListener('click', function () {
            handleDropdownClick(this, '.custom-dropdown-business-objective');
        });
    });

    // Initialize the page
    filteredPosts = allPosts; // Start with all posts
    showPage(currentPage);
    updatePagination();
});
</script>

<script>
document.querySelectorAll('.dropdown-container').forEach(container => {
  container.addEventListener('click', function() {
    // Close all other dropdowns
    document.querySelectorAll('.dropdown-container').forEach(otherContainer => {
      if (otherContainer !== this) {
        otherContainer.classList.remove('open');
      }
    });

    // Toggle the clicked dropdown
    this.classList.toggle('open');
  });
});
</script>



<?php get_footer(); ?>