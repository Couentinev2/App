<?php
   /*
   Template Name: Resource Center Overview Page
   */
?>
<?php
get_header(); 
$current_language = pll_current_language('slug'); 
$page_language = get_language_attributes();

?>

<div class="top-featured-post">

<div class="featured-post">
    <div class="container inner-wrap inner-wrap-1200">
        <?php if ($choose_featured_posts = get_field("primary_featured_post")) : ?>
            <div class="articles-block header-block">
                <div class="container">
                    <div class="prom-cols">
                        <?php foreach ($choose_featured_posts as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <div class="col mainfeatcol">
                                <article class="article">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="img-holder">
                                            <a href="<?php the_permalink(); ?>">
                                                <picture>
                                                    <?php
                                                    $main_id = get_the_ID();
                                                    $thumb_id = get_post_thumbnail_id($main_id);
                                                    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                                                    $image_src = wp_get_attachment_image_src($thumb_id, 'thumbnail_768x432');
                                                    $post_type = get_post_type($main_id);
                                                    $bg_teasertest = get_field('teaser_text', $main_id);

                                                    if ($post_type === 'post') {
                                                        $post_type = 'Blog';
                                                    } elseif ($post_type == 'page') {
                                                        $post_type = 'Report';
                                                    } else {
                                                        $post_type_object = get_post_type_object($post_type);
                                                        $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
                                                    }
                                                    ?>
                                                    <source srcset="<?php echo $post_type === 'Blog' ? $image_src[0] : get_field('pod_bg_art') . get_field('video_thumbnail'); ?>" alt="<?php echo esc_attr($alt); ?>" media="(max-width: 767px)">
                                                    <source srcset="<?php echo $post_type === 'Blog' ? $image_src[0] : get_field('pod_bg_art') . get_field('video_thumbnail'); ?>" alt="<?php echo esc_attr($alt); ?>">
                                                    <img src="<?php echo $post_type === 'Blog' ? $image_src[0] : get_field('pod_bg_art') . get_field('video_thumbnail'); ?>" alt="<?php echo esc_attr($alt); ?>">
                                                    <p class="timeCode"><?php echo pll_e($post_type); ?></p>
                                                </picture>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="text-block">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="title-heading-holder">
                                                <?php if (has_term('', 'category')) : ?>
                                                    <span class="title"><?php the_category(', '); ?></span>
                                                <?php endif; ?>
                                                <h2 class="scale-32-24-21">
                                                    <?php echo $post_type === 'Success Stories' ? $bg_teasertest : get_the_title(); ?>
                                                </h2>
                                            </div>
                                            <div class="person-detail-block">
                                                <div class="text-holder">
                                                    <span class="post-datestamp">
                                                        <strong class="fixed-12"><?php
                                                        $page_language = get_language_attributes();

                                                                    if (strpos($page_language, 'ko') !== false) {
                                                                        echo get_the_date('M j일, Y');
                                                                    } elseif (strpos($page_language, 'ja') !== false) {
                                                                        echo get_the_date('M j日, Y');
                                                                    } elseif (strpos($page_language, 'zh-CN') !== false) {
                                                                        echo get_the_date('M j日, Y');
                                                                    } else {
                                                                        echo get_the_date('M j, Y');
                                                                    }
                                                                    ?></strong>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if ($related_posts = get_field("featured_posts")) : ?>
    <div class="articles-block top-block featured">
        <div class="container inner-wrap inner-wrap-1200">
            <h2 class="scale-32-24-21"><span><?php pll_e('Featured posts'); ?></span></h2>
            <div class="three-cols">
                <?php foreach ($related_posts as $post) : ?>
                    <?php setup_postdata($post); ?>
                    <div class="col">
                        <article class="article <?php echo get_post_type(get_the_ID()); ?>">
                            <div class="img-holder">
                                <a href="<?php the_permalink(); ?>">
                                    <picture>
                                        <?php
                                        $main_id = get_the_ID();
                                        $thumb_id = get_post_thumbnail_id($main_id);
                                        $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                                        $image_src = wp_get_attachment_image_src($thumb_id, 'thumbnail_768x432');
                                        $bg_teasertest = get_field('teaser_text', $main_id);
                                        $post_type = get_post_type($main_id);
                                        $post_s = get_post_type($thumb_id);

                                        if ($post_type === 'post') {
                                            $post_type = 'Blog';
                                        } elseif ($post_type === 'video') {
                                            $min = get_field('timecodevideo', $main_id);
                                            $post_type = "$min MIN";
                                        } else {
                                            $post_type_object = get_post_type_object($post_type);
                                            $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
                                        }
                                        ?>
                                        <source srcset="<?php echo $post_type === 'Blog' ? $image_src[0] : get_field('pod_bg_art') . get_field('video_thumbnail'); ?>" alt="<?php echo esc_attr($alt); ?>" media="(max-width: 767px)">
                                        <source srcset="<?php echo $post_type === 'Blog' ? $image_src[0] : get_field('pod_bg_art') . get_field('video_thumbnail'); ?>" alt="<?php echo esc_attr($alt); ?>">
                                        <img src="<?php echo $post_type === 'Blog' ? $image_src[0] : get_field('pod_bg_art') . get_field('video_thumbnail'); ?>" alt="<?php echo esc_attr($alt); ?>">
                                        <p class='timeCode'><?php echo pll_e($post_type); ?></p>
                                    </picture>
                                </a>
                            </div>
                            <div class="text-block">
                                <div class="title-heading-holder">
                                    <?php if (has_term('', 'category')) : ?>
                                        <span class="title"><?php the_category(', '); ?></span>
                                    <?php endif; ?>
                                    <h2 class="scale-18-18-16">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo ($post_s == 'success_story_pod' || $post_type == 'Success Stories') ? $bg_teasertest : get_the_title(); ?>
                                        </a>
                                    </h2>
                                </div>
                                <div class="person-detail-block">
                                    <div class="text-holder">
                                        <span class="post-datestamp"><strong class="fixed-12"><?php
                                                                    if (strpos($page_language, 'ko') !== false) {
                                                                        echo get_the_date('M j일, Y');
                                                                    } elseif (strpos($page_language, 'ja') !== false) {
                                                                        echo get_the_date('M j日, Y');
                                                                    } elseif (strpos($page_language, 'zh-CN') !== false) {
                                                                        echo get_the_date('M j日, Y');
                                                                    } else {
                                                                        echo get_the_date('M j, Y');
                                                                    }
                                                                    ?></strong></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>

</div>

<?php include('template-parts/slide-ojoective.php'); ?>

<div id="rc-home-all-posts" class="allpost">
    <div class="container inner-wrap inner-wrap-1200">
        <h2 class="scale-32-24-21 alltitle"><span><?php pll_e('All posts'); ?></span></h2>
        <div class="articles-frame">
            <?php
            $mytax = 'topics';
            $paged = get_query_var('paged') ?: 1;
            $posts_per_page = 12;
            $current_language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            $post_types = $current_language == 'CN' ? ['success_story_pod'] : ['post', 'success_story_pod', 'video', 'guide_pod', 'report_pod'];

            $args = [
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
                'post_type' => $post_types,
                'tax_query' => [
                    [
                        'taxonomy' => $mytax,
                        'field' => 'term_id',
                        'terms' => get_terms(['taxonomy' => 'topics', 'fields' => 'ids']),
                        'include_children' => true,
                    ],
                ],
            ];

            $loop = new WP_Query($args);

            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();
                    $post_id = get_the_ID();
                    $thumb_id = get_post_thumbnail_id($post_id);
                    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                    $image_src = wp_get_attachment_image_src($thumb_id, 'thumbnail_768x432');
                    $bg_teasertest = get_field('teaser_text', $post_id);
                    $ext_link = get_field('ext_link');
                    $post_type = get_post_type($post_id);

                    if ($post_type === 'post') {
                        $post_type = 'Blog';
                    } elseif ($post_type === 'video') {
                        $min = get_field('timecodevideo', $post_id);
                        $post_type = "$min MIN";
                    } elseif ($post_type === 'report_pod') {
                        $post_type = 'Report';
                    } elseif ($post_type === 'guide_pod') {
                        $post_type = 'Guide';
                    } else {
                        $post_type_object = get_post_type_object($post_type);
                        $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
                    }
                    ?>
                    <div class="col">
                        <article class="article <?php echo get_post_type(get_the_ID()); ?>">
                            <div class="img-holder">
                                <a href="<?php echo !empty($ext_link) ? esc_url($ext_link) : get_permalink(); ?>" class="" <?php echo !empty($ext_link) ? 'target="_blank"' : ''; ?>>
                                    <picture>
                                        <?php
                                        if ($post_type === 'Blog') {
                                            $src = $image_src[0];
                                        } else {
                                            $src = get_field('pod_bg_art') . get_field('video_thumbnail');
                                        }
                                        ?>
                                        <source srcset="<?php echo $src; ?>" alt="<?php echo esc_attr($alt); ?>" media="(max-width: 767px)">
                                        <source srcset="<?php echo $src; ?>" alt="<?php echo esc_attr($alt); ?>">
                                        <img src="<?php echo $src; ?>" alt="<?php echo esc_attr($alt); ?>">
                                        <p class='timeCode <?php echo !empty($ext_link) ? 'timeCode-out' : ''; ?>'><?php echo pll_e($post_type); ?></p>
                                        <?php if (!empty($ext_link)) : ?>
                                            <p class='timeCode'>&#x2197;</p>
                                        <?php endif; ?>
                                    </picture>
                                </a>
                            </div>
                            <div class="text-block">
                                <div class="title-heading-holder">
                                    <?php if (has_term('', 'category')) : ?>
                                        <span class="title"><?php the_category(', '); ?></span>
                                    <?php endif; ?>
                                    <h2 class="scale-18-18-16"><a href="<?php the_permalink(); ?>">
                                            <?php echo ($post_type == 'Success Stories' || $post_type == 'Guides') ? $bg_teasertest : get_the_title(); ?>
                                        </a></h2>
                                </div>
                                <div class="person-detail-block">
                                    <div class="text-holder">
                                        <span class="post-datestamp"><strong class="fixed-12"><?php
                                                                    if (strpos($page_language, 'ko') !== false) {
                                                                        echo get_the_date('M j일, Y');
                                                                    } elseif (strpos($page_language, 'ja') !== false) {
                                                                        echo get_the_date('M j日, Y');
                                                                    } elseif (strpos($page_language, 'zh-CN') !== false) {
                                                                        echo get_the_date('M j日, Y');
                                                                    } else {
                                                                        echo get_the_date('M j, Y');
                                                                    }
                                                                    ?></strong></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
                <div class="paginationfinal">
                    <?php echo paginate_links(['total' => $loop->max_num_pages, 'prev_text' => __(' &#8249;'), 'next_text' => __('&#8250;')]); ?>
                </div>
                <?php wp_reset_postdata();
            else :
                echo '<p>' . pll_e('No posts found') . '</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_template_part('template-modules/email-signup');?>


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

    scrollbar.addEventListener('mousedown', function (e) {
        var startX = e.pageX;
        var scrollbarStartX = scrollbar.offsetLeft;

        function onMouseMove(e) {
            var currentX = e.pageX;
            var diffX = currentX - startX;
            var newScrollLeft = (diffX / scrollContainer.clientWidth) * scrollContent.scrollWidth;

            scrollContent.scrollLeft = newScrollLeft + scrollbarStartX * (scrollContent.scrollWidth / scrollContainer.clientWidth);
        }

        document.addEventListener('mousemove', onMouseMove);
        document.addEventListener('mouseup', function () {
            document.removeEventListener('mousemove', onMouseMove);
        }, { once: true });
    }, { passive: true });

    window.addEventListener('resize', function () {
        setContainerStyle();
        updateScrollbar();
    });

    updateScrollbar();
</script>


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
document.addEventListener('DOMContentLoaded', function() {
    // Check if the URL path matches the specified pattern, accounting for optional trailing slashes
    if (/\/page\/\d+\/?$/.test(window.location.pathname)) {
        // Find the element with the specified ID
        var targetElement = document.getElementById('rc-home-all-posts');

        // If the element exists, scroll to 100px above it
        if (targetElement) {
            var elementPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - 100;
            window.scrollTo({
                top: elementPosition
            });
        }
    }
});
</script>