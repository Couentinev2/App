<?php
/*
Template Name: Blog Page
*/
?>
<?php get_header(); ?>
<?php $page_language = get_language_attributes(); ?>

<div class="contentPage">
    <div class="topcontent-wrapper">
        <div class="topcontent inner-wrap inner-wrap-1200">
            <?php if ($blog_id = get_option('page_for_posts')) : ?>
                <?php if ($choose_featured_posts = get_field("primary_featured_post", $blog_id)) : ?>
                    <div class="articles-block header-block">
                        <div class="container">
                            <div class="prom-cols">
                                <?php foreach ($choose_featured_posts as $post) : ?>
                                    <?php setup_postdata($post); ?>
                                    <div class="col">
                                        <article class="article">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="img-holder">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <picture>
                                                            <?php
                                                            $thumb_id = get_post_thumbnail_id(get_the_ID());
                                                            $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                                                            $image_src = wp_get_attachment_image_src($thumb_id, 'thumbnail_768x432');
                                                            $post_type = get_post_type(get_the_ID());
                                                            if ($post_type === 'post') {
                                                                $post_type = 'Blog';
                                                            } else {
                                                                $post_type_object = get_post_type_object(get_post_type(get_the_ID()));
                                                                $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
                                                            }
                                                            ?>
                                                            <img src="<?php echo $image_src[0]; ?>" alt="<?php echo $alt; ?>">
                                                            <p class="timeCode"><?php echo pll_e($post_type); ?></p>
                                                        </picture>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="text-block">
                                                <a href="<?php the_permalink(); ?>" class="featurea">
                                                    <div class="title-heading-holder">
                                                        <?php if (has_term('', 'category')) : ?>
                                                            <span class="title"><?php the_category(', '); ?></span>
                                                        <?php endif; ?>
                                                        <h2><?php the_title(); ?></h2>
                                                    </div>
                                                    <div class="person-detail-block">
                                                        <div class="text-holder">
                                                            <span class="post-datestamp">
                                                                <strong>
                                                                    <?php
                                                                    if (strpos($page_language, 'ko') !== false) {
                                                                        echo get_the_date('M j일, Y');
                                                                    } elseif (strpos($page_language, 'ja') !== false) {
                                                                        echo get_the_date('M j日, Y');
                                                                    } else {
                                                                        echo get_the_date('M j, Y');
                                                                    }
                                                                    ?>
                                                                </strong>
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
            <?php endif; ?>
<div class="threelast">
    <?php
    // Arguments for WP_Query to get more than the last three posts to account for skipped ones
    $args = array(
        'posts_per_page' => 10, // Retrieve more posts to account for skipping
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    // The Query
    $the_query = new WP_Query($args);
    $post_type = get_post_type(get_the_ID());
    if ($post_type === 'post') {
        $post_type = 'Blog';
    } else {
        $post_type_object = get_post_type_object(get_post_type(get_the_ID()));
        $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
    }

    // The Loop
    if ($the_query->have_posts()) {
        $displayed_posts = 0; // Counter for displayed posts
        while ($the_query->have_posts() && $displayed_posts < 3) {
            $the_query->the_post();

            // Skip posts where the 'blog_hide' custom field is set to 'yes'
            if (get_post_meta(get_the_ID(), 'blog_hide', true) === 'true') {
                continue;
            }

            // Increment the counter for displayed posts
            $displayed_posts++;
            ?>
            <div class="article">
                <article class="articleblog">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="img-holder index-holder">
                            <a href="<?php the_permalink(); ?>">
                                <picture>
                                    <?php
                                    $thumb_id = get_post_thumbnail_id(get_the_ID());
                                    $alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
                                    $image_src = wp_get_attachment_image_src($thumb_id, 'thumbnail_768x432');
                                    ?>
                                    <img src="<?php echo esc_url($image_src[0]); ?>" alt="<?php echo esc_attr($alt); ?>">
                                    <p class="timeCode"><?php echo pll_e($post_type); ?></p>
                                </picture>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="text-block">
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="fixed-16 title-art"><?php the_title(); ?></h3>
                            <div class="person-detail-block">
                                <div class="text-holder">
                                    <span class="post-datestamp">
                                        <strong class="fixed-12 date-b">
                                            <?php
                                            if (strpos($page_language, 'ko') !== false) {
                                                echo get_the_date('M j일, Y');
                                            } elseif (strpos($page_language, 'ja') !== false) {
                                                echo get_the_date('M j日, Y');
                                            } else {
                                                echo get_the_date('M j, Y');
                                            }
                                            ?>
                                        </strong>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </article>
            </div>
            <?php
        }
        wp_reset_postdata();
    } else {
        // No posts found
        echo '<p>No recent posts found.</p>';
    }
    ?>
</div>


        </div>
        <div>
            <section class="latest-articles-block inner-wrap inner-wrap-1200" id="top">
                <div class="container">
                    <h2 class="sm-blog-t"><span class="hr scale-32-24-21 "><?php pll_e('All blog posts'); ?></span></h2>
                    <div class="dropdown">
                        <p class="dropbtmnt fixed-14">
                            <?php pll_e('Filter'); ?>
                        </p>
                        <div class="dropdown-content" id="menu-drop-dontent-mobile">
                            <?php
                            // Get terms for the 'products' taxonomy
                            $products_terms = get_terms(array('taxonomy' => 'products', 'hide_empty' => false));

                            // Get terms for the 'topics' taxonomy
                            $topics_terms = get_terms(array('taxonomy' => 'topics', 'hide_empty' => false));
                            ?>
                            <div class="dropdown-container">
                                <!-- Custom Dropdown for Topics -->
                                <div class="fixed-14 dropbtn custom-dropdowntwo">
                                    <div class="selected-option allselect"><?php echo pll_e('All topics'); ?></div>
                                    <div class="options-container">
                                        <!-- All Topics Option -->
                                        <div class="dropdown-option pointer-cursor" data-value="" data-related-topics="">
                                            <?php echo pll_e('All topics'); ?>
                                        </div>
                                        <?php foreach ($topics_terms as $topic_term) : ?>
                                            <?php
                                            $related_products = [];
                                            $posts = get_posts(array(
                                                'post_type' => 'any',
                                                'numberposts' => -1,
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'topics',
                                                        'field' => 'slug',
                                                        'terms' => $topic_term->slug,
                                                    ),
                                                ),
                                            ));
                                            foreach ($posts as $post) {
                                                $post_products = wp_get_post_terms($post->ID, 'products');
                                                foreach ($post_products as $post_product) {
                                                    $related_products[$post_product->slug] = $post_product->name;
                                                }
                                            }
                                            $related_products_string = implode(',', array_keys($related_products));
                                            ?>
                                            <div class="dropdown-option pointer-cursor" data-value="<?php echo $topic_term->slug; ?>" data-related-products="<?php echo htmlspecialchars($related_products_string); ?>">
                                                <?php echo pll_e($topic_term->name); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <select id="topics-dropdown" name="topics" style="display: none;">
                                    <option value="" id="alltopic"><?php echo pll_e('All topics'); ?></option>
                                    <?php foreach ($topics_terms as $topic_term) : ?>
                                        <option value="<?php echo $topic_term->slug; ?>">
                                            <?php echo pll_e($topic_term->name); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="arrow"></span>
                            </div>
                            <div class="dropdown-container">
                                <!-- Custom Dropdown for Products -->
                                <div class="fixed-14 dropbtn custom-dropdown">
                                    <div class="selected-option allselect"><?php echo pll_e('All products'); ?></div>
                                    <div class="options-container">
                                        <!-- All Products Option -->
                                        <div class="dropdown-option pointer-cursor" data-value="" data-related-topics="">
                                            <?php echo pll_e('All products'); ?>
                                        </div>
                                        <!-- PHP code to generate product options -->
                                        <?php foreach ($products_terms as $product_term) : ?>
    <?php
    if ($product_term->name === 'Audience+') {
        continue;
    }

    $related_topics = [];

    $posts = get_posts(array(
        'post_type' => 'any',
        'numberposts' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'products',
                'field' => 'slug',
                'terms' => $product_term->slug,
            ),
        ),
    ));

    foreach ($posts as $post) {
        $post_topics = wp_get_post_terms($post->ID, 'topics');
        foreach ($post_topics as $post_topic) {
            $related_topics[$post_topic->slug] = $post_topic->name;
        }
    }

    $related_topics_string = implode(',', array_keys($related_topics));
    ?>
    <div class="dropdown-option pointer-cursor <?php echo htmlspecialchars($product_term->slug); ?>" data-value="<?php echo htmlspecialchars($product_term->slug); ?>" data-related-topics="<?php echo htmlspecialchars($related_topics_string); ?>">
        <?php echo htmlspecialchars($product_term->name); ?>
    </div>
<?php endforeach; ?>

                                    </div>
                                </div>
                                <!-- Hidden original select for Products (for backend functionality) -->
                                <select id="products-dropdown" name="products" style="display: none;">
                                    <option value="" id="allproduct"><?php echo pll_e('All products'); ?></option>
                                    <?php foreach ($products_terms as $product_term) : ?>
                                        <option value="<?php echo htmlspecialchars($product_term->slug); ?>" data-related-topics="<?php echo htmlspecialchars($related_topics_string); ?>">
                                            <?php echo htmlspecialchars($product_term->name); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="arrow"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="two-cols">
                    <div class="articles-holder">
                        <div class="articles-frame" id="filtered-content">
                        </div>
                    </div>
                </div>
                <div class="pagination"></div>
            </section>
        </div>
    </div>
    <?php include('template-parts/slide-ojoective.php'); ?>
</div>
<?php get_template_part('template-modules/email-signup'); ?>
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
    jQuery(document).ready(function($) {
        $('.custom-dropdowntwo').find('.dropdown-option').on('click', function() {
            var selectedTopicSlug = $(this).data('value');
            var relatedProductsString = $(this).data('related-products');
            var relatedProducts = relatedProductsString ? relatedProductsString.split(',') : [];

            $('.custom-dropdown').find('.dropdown-option').css({ 'color': 'black', 'pointer-events': 'auto' });

            if (selectedTopicSlug !== "") {
                $('.custom-dropdown').find('.dropdown-option').each(function() {
                    var productSlug = $(this).data('value');

                    if (productSlug && relatedProducts.length > 0 && !relatedProducts.includes(productSlug)) {
                        $(this).css({ 'color': 'grey', 'pointer-events': 'none' });
                    }
                });
            }
        });

        $('.custom-dropdown').find('.dropdown-option').on('click', function() {
            var selectedProductSlug = $(this).data('value');
            var relatedTopicsString = $(this).data('related-topics');
            var relatedTopics = relatedTopicsString ? relatedTopicsString.split(',') : [];

            $('.custom-dropdowntwo').find('.dropdown-option').css({ 'color': 'black', 'pointer-events': 'auto' });

            if (selectedProductSlug !== "") {
                $('.custom-dropdowntwo').find('.dropdown-option').each(function() {
                    var topicSlug = $(this).data('value');

                    if (topicSlug && relatedTopics.length > 0 && !relatedTopics.includes(topicSlug)) {
                        $(this).css({ 'color': 'grey', 'pointer-events': 'none' });
                    }
                });
            }
        });

        $('#alltopic').on('click', function() {
            $('.custom-dropdown').find('.dropdown-option').css({ 'color': 'black', 'pointer-events': 'auto' });
        });
    });
</script>
