<?php
/*
Template Name: RC Objective Page
*/
?>
<?php get_header(); ?>

<style>
    .grid-item {
        background-color: #f9f9f9;
        padding: 16px;
        text-align: center;
    }
</style>
<div class="objectif-page">
    <div class="rc-o">
        <?php
        $objective = get_field("business_objective_to_display");
        $title = $objective;

        switch ($objective) {
            case "Premium Supply":
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts_per_page = -1;
                $description = "Reach audiences at scale with direct access to premium in-app supply";
                $bg_image = "/wp-content/themes/applovin/images/img_business_objective_header_premium_supply@2x.png";
                $bg_image_mobile = "/wp-content/themes/applovin/images/premium_mobile.png";

                $bg_color = '#0092FF';
                $args = array(
                    'post_type' => array('post', 'success_story_pod', 'video', 'page', 'guide_pod', 'report_pod'),
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'topics',
                                'field' => 'slug',
                                'terms' => 'brand-safety',
                            ),
                            array(
                                'taxonomy' => 'products',
                                'field' => 'slug',
                                'terms' => 'alx',
                            ),
                        ),
                        array(
                            'taxonomy' => 'topics',
                            'field' => 'slug',
                            'terms' => 'brand-advertising',
                        ),
                    ),
                );
                break;
            case "Activate CTV":
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts_per_page = -1;
                $description = "Extend the impact of your mobile performance campaigns to CTV";
                $bg_color = '#CF2556';
                $bg_image = "/wp-content/themes/applovin/images/img_business_objective_header_activate_ctv@2x.png";
                $bg_image_mobile = "/wp-content/themes/applovin/images/ctv_mobile.png";

                $args = array(
                    'post_type' => array('post', 'success_story_pod', 'video', 'page', 'guide_pod', 'report_pod'),
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'topics',
                            'field' => 'slug',
                            'terms' => 'ctv',
                        ),
                    ),
                );
                break;
            case "Acquire Users":
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts_per_page = -1;
                $description = "Hit your performance goals and improve scalability of campaigns";
                $bg_color = '#01B7E1';
                $bg_image = "/wp-content/themes/applovin/images/img_business_objective_header_acquire_users@2x.png";
                $bg_image_mobile = "/wp-content/themes/applovin/images/acquire_mobile.png";

                $args = array(
                    'post_type' => array('post', 'success_story_pod', 'video', 'page', 'guide_pod', 'report_pod'),
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'topics',
                            'field' => 'slug',
                            'terms' => 'user-acquisition',
                        ),
                    ),
                );
                break;
            case "360 Growth":
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts_per_page = -1;
                $description = "Improve monetization and UA to create 360º growth for your apps";
                $bg_color = '#540AC6'; 
                $bg_image = "/wp-content/themes/applovin/images/img_business_objective_header_360_growth@2x.png";
                $bg_image_mobile = "/wp-content/themes/applovin/images/growth_mobile.png";

                $args = array(
                    'post_type' => array('post', 'success_story_pod', 'video', 'page', 'guide_pod', 'report_pod'),
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => 'topics',
                            'field' => 'slug',
                            'terms' => 'mobile-app-growth',
                        ),
                        array(
                            'taxonomy' => 'topics',
                            'field' => 'slug',
                            'terms' => 'performance-marketing',
                        ),
                    ),
                );
                break;
            case "Increase ARPDAU":
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts_per_page = -1;
                $description = "Optimize your ad monetization strategy and drive more revenue";
                $bg_color = '#5904B0'; 
                $bg_image = "/wp-content/themes/applovin/images/img_business_objective_header_increase_arpdau@2x.png";
                $bg_image_mobile = "/wp-content/themes/applovin/images/increase_mobile.png";

                $args = array(
                    'post_type' => array('post', 'success_story_pod', 'video', 'page', 'guide_pod', 'report_pod'),
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'topics',
                            'field' => 'slug',
                            'terms' => 'monetization',
                        ),
                        array(
                            'taxonomy' => 'products',
                            'field' => 'slug',
                            'terms' => 'max',
                        ),
                    ),
                );
                break;
            case "Ad Creatives":
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts_per_page = -1;
                $description = "Produce engaging, high-impact ad creatives that drive results";
                $bg_color = '#B00E91';
                $bg_image = "/wp-content/themes/applovin/images/img_business_objective_header_ad_creatives@2x.png";
                $bg_image_mobile = "/wp-content/themes/applovin/images/ad_creative_mobile.png";

                $args = array(
                    'post_type' => array('post', 'success_story_pod', 'video', 'page', 'guide_pod', 'report_pod'),
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => 'topics',
                            'field' => 'slug',
                            'terms' => 'high-impact-creatives',
                        ),
                        array(
                            'taxonomy' => 'products',
                            'field' => 'slug',
                            'terms' => 'sparklabs',
                        ),
                    ),
                );
                break;
            case "Protect Users":
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts_per_page = -1;
                $bg_color = '#6441E2';
                $description = "Protect brand and user experience with high-quality, verified inventory";
                $bg_image = "/wp-content/themes/applovin/images/img_business_objective_header_protect_users@2x.png";
                $bg_image_mobile = "/wp-content/themes/applovin/images/protect_mobile.png";

                $args = array(
                    'post_type' => array('post', 'success_story_pod', 'video', 'page', 'guide_pod', 'report_pod'),
                    'posts_per_page' => $posts_per_page,
                    'paged' => $paged,
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'topics',
                            'field' => 'slug',
                            'terms' => 'brand-safety',
                        ),
                        array(
                            'relation' => 'OR',
                            array(
                                'taxonomy' => 'products',
                                'field' => 'slug',
                                'terms' => 'max',
                            ),
                            array(
                                'taxonomy' => 'products',
                                'field' => 'slug',
                                'terms' => 'alx',
                            ),
                        ),
                    ),
                );
                break;
        }


        ?>

        <style>

            .top-text-sub h1 {
                max-width: 440px;
            }
    .top-text-sub {
        background-image: url('<?php echo $bg_image; ?>');
    }

    @media (max-width: 640px) {
        .top-text-sub {
            background-image: url('<?php echo $bg_image_mobile; ?>');
        }
        .top-obj {
    padding: 14px;
    padding-top: 30px;
}
    }
</style>

        <div class="top-obj" style="background-color: <?php echo $bg_color; ?> ">
            <div class="top-text-sub"  >
                <div class="inner-wrap inner-wrap-1200">
                    <h1 class=""><?php pll_e($title); ?></h1>
                    <p class="scale-18-18-16"><?php pll_e($description); ?></p>

            </div>
        </div>
    </div>
        <?php
        $query = new WP_Query($args);

        if ($query->have_posts()) : ?>
            <div class="grid-container inner-wrap inner-wrap-1200">
                <?php while ($query->have_posts()) : $query->the_post();
                    $thumb_id = get_the_ID();
                    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                    $imgsuccess = get_field('pod_bg_art', $thumb_id);
                    $post_s = get_post_type($thumb_id);
                    $bg_teasertest = get_field('teaser_text');
                    $post_type = get_post_type(get_the_ID());

                    if ($post_type === 'post' || $post_type === 'page') {
                        $thumb_id = get_post_thumbnail_id(get_the_ID());
                        $post_type = 'Blog';
                    } elseif ($post_type === 'video') {
                        $min = get_field('timecodevideo', $thumb_id);
                        $post_type = "$min MIN";
                    } else {
                        $post_type_object = get_post_type_object(get_post_type(get_the_ID()));
                        $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
                    }

                    $image_src = wp_get_attachment_image_src($thumb_id, 'thumbnail_768x432');

                    $post_type = get_post_type($thumb_id);
                    $real_type = get_post_type($thumb_id);
                    $product_terms = get_the_terms($thumb_id, 'products');
                    $topics_terms = get_the_terms(get_the_ID(), 'topics');

                    $product_type_names = array();

                    if ($product_terms && !is_wp_error($product_terms)) {
                        foreach ($product_terms as $term) {
                            $product_type_names[] = $term->slug;
                        }
                    }

                    $product_types = implode(", ", $product_type_names);

                    $topics_type_names = array();

                    if ($topics_terms && !is_wp_error($topics_terms)) {
                        foreach ($topics_terms as $term) {
                            $topics_type_names[] = $term->slug;
                        }
                    }

                    $topics_types = implode(", ", $topics_type_names);
                    ?>
                    <div class="grid-item <?php echo get_post_type(get_the_ID()); ?>" data-post-type="<?php echo $real_type ?>" data-topics="<?php echo $topics_types ?>">
                        <div class="text-block">
                            <p class="cattitle class-18-18-16">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if ($post_s == 'success_story_pod') { ?>
                                        <?php echo $bg_teasertest; ?>
                                    <?php } else { ?>
                                        <?php the_title(); ?>
                                    <?php } ?>
                                </a>
                            </p>
                            <span class="post-datestamp">
                                <strong class="fixed-12">
                                    <?php echo get_the_date('M j, Y'); ?>
                                </strong>
                            </span>
                        </div>

                        <a href="<?php the_permalink(); ?>">
                            <picture>
                                <?php
                                $post_type = get_post_type(get_the_ID());
                                if ($post_type === 'post') {
                                    $post_type = 'Blog';
                                } elseif ($post_type === 'video') {
                                    $min = get_field('timecodevideo', $thumb_id);
                                    $post_type = "$min MIN";
                                } elseif ($post_type == 'page') {
                                    $post_type = 'Report';
                                } else {
                                    $post_type_object = get_post_type_object(get_post_type(get_the_ID()));
                                    $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
                                }
                                ?>
                                <source srcset="<?php echo $image_src[0]; ?><?php the_field('pod_bg_art'); ?>" media="(max-width: 767px)">
                                <source srcset="<?php echo $image_src[0]; ?><?php the_field('pod_bg_art'); ?>" media="(max-width: 1024px)">
                                <img src="<?php echo $image_src[0]; ?><?php the_field('pod_bg_art'); ?><?php the_field('video_thumbnail', $thumb_id); ?>" alt="<?php echo $alt; ?>">
                                <p class='timeCode'><?php echo pll_e($post_type) ?></p>
                            </picture>
                        </a>
                    </div>
                <?php endwhile; ?>

                <div class="paginationfinal pagination-cat custom-cat-pag" id="custom-pagination">
                </div>
            </div>
        <?php endif;

        wp_reset_postdata();
        ?>
    </div>
    <?php include('template-parts/slide-ojoective.php'); ?>
</div>
<?php get_footer(); ?>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    var scrollContent = document.querySelector('.slide-quote-business');
    var scrollContainer = document.querySelector('#myScrollbarContainer');

    function setContainerStyle() {
        Object.assign(scrollContainer.style, {
            height: '6px',
            background: '#ddd',
            width: '95%',
            maxWidth: window.innerWidth <= 765 ? '220px' : '1200px',
            margin: '0 auto',
        });
    }

    setContainerStyle();

    var scrollbar = document.createElement('div');
    Object.assign(scrollbar.style, {
        background: 'linear-gradient(270deg, #00B6E0 0.36%, #6841E0 99.64%)',
        height: '6px',
        position: 'absolute',
    });

    scrollContainer.appendChild(scrollbar);

    function updateScrollbar() {
        var scrollWidth = scrollContent.scrollWidth;
        var scrollLeft = scrollContent.scrollLeft;
        var clientWidth = scrollContent.clientWidth;
        var scrollbarWidth = (clientWidth / scrollWidth) * scrollContainer.clientWidth;
        var scrollbarLeft = (scrollLeft / scrollWidth) * scrollContainer.clientWidth;

        scrollbar.style.width = scrollbarWidth + 'px';
        scrollbar.style.left = scrollbarLeft + 'px';
    }

    scrollContent.addEventListener('scroll', updateScrollbar);

    scrollbar.addEventListener('mousedown', function(e) {
        var startX = e.pageX;
        var scrollbarStartX = scrollbar.offsetLeft;

        function onMouseMove(e) {
            var currentX = e.pageX;
            var diffX = currentX - startX;
            var newScrollLeft = (diffX / scrollContainer.clientWidth) * scrollContent.scrollWidth;

            scrollContent.scrollLeft = newScrollLeft + scrollbarStartX * (scrollContent.scrollWidth / scrollContainer.clientWidth);
        }

        document.addEventListener('mousemove', onMouseMove);
        document.addEventListener('mouseup', function() {
            document.removeEventListener('mousemove', onMouseMove);
        }, { once: true });
    }, { passive: true });

    window.addEventListener('resize', function() {
        setContainerStyle();
        updateScrollbar();
    });

    updateScrollbar();
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    document.addEventListener('DOMContentLoaded', function() {
        var filters = document.querySelector('#menu-drop-dontent .selected-option');
        var dropdowns = document.querySelectorAll('.dropmbl .dropdown-container');

        filters.addEventListener('click', function() {
            dropdowns.forEach(function(dropdown) {
                dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
            });
        });
    });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    document.addEventListener('DOMContentLoaded', function() {
        var posts = document.querySelectorAll('.grid-item');

        function getSelectedValues() {
            return {
                type: document.querySelector('.custom-dropdownsecond .selected-option').getAttribute('data-value') || '',
                topic: document.querySelector('.custom-dropdownthree .selected-option').getAttribute('data-value-topics') || ''
            };
        }

        function updateDropdownOptions() {
            var selected = getSelectedValues();
            var dropdownOptions = {
                types: document.querySelectorAll('.custom-dropdownsecond .dropdown-option'),
                topics: document.querySelectorAll('.custom-dropdownthree .dropdown-option')
            };

            var availableOptions = {
                products: new Set(['']),
                types: new Set(['']),
                topics: new Set([''])
            };

            posts.forEach(post => {
                if (matchesFilter(post, selected)) {
                    availableOptions.types.add(post.dataset.postType.trim());
                    availableOptions.topics = new Set([...availableOptions.topics, ...post.dataset.topics.split(',').map(t => t.trim())]);
                }
            });

            updateDropdown(dropdownOptions.types, availableOptions.types, '');
            updateDropdown(dropdownOptions.topics, availableOptions.topics, '');
        }

        function matchesFilter(post, selected) {
            return (!selected.product || post.dataset.product === selected.product) &&
                   (!selected.type || post.dataset.postType.trim() === selected.type) &&
                   (!selected.topic || post.dataset.topics.split(',').map(t => t.trim()).includes(selected.topic));
        }

        function updateDropdown(options, availableOptions, allValue) {
            options.forEach(option => {
                var value = option.getAttribute('data-value-product') || option.getAttribute('data-value') || option.getAttribute('data-value-topics') || '';
                if (value === allValue || availableOptions.has(value)) {
                    option.style.color = 'black';
                    option.style.pointerEvents = 'auto';
                } else {
                    option.style.color = 'grey';
                    option.style.pointerEvents = 'none';
                }
            });
        }

        document.querySelectorAll('.dropdown-option').forEach(option => {
            option.addEventListener('click', function() {
                var parentDropdown = this.closest('.dropdown-container');
                var selectedOptionDisplay = parentDropdown.querySelector('.selected-option');
                selectedOptionDisplay.innerHTML = this.innerHTML;

                var dataValueAttr = this.getAttribute('data-value-product') !== null ? 'data-value-product' :
                                    this.getAttribute('data-value') !== null ? 'data-value' : 'data-value-topics';
                selectedOptionDisplay.setAttribute(dataValueAttr, this.getAttribute(dataValueAttr) || '');

                updateDropdownOptions();
            });
        });

        updateDropdownOptions();
    });
</script>
