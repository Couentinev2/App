<?php
/**
 * Taxonomy Template for Videos Series
 */

get_header(); ?>

<div class="contentPage">
<div id="page-video-taxonomy"  class="video-series-main">
<div class="video-series-hero <?php
$term = get_queried_object();
if ($term) {
    $term_slug = $term->slug;
    echo $term_slug;
}
?>">
    <div class="inner-wrap inner-wrap-1200">
        <a class="back-to-all-videos" href="<?php echo esc_url(home_url('/videos')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
<path d="M13.0004 7.24994H4.81043L8.53043 3.52994C8.82043 3.23994 8.82043 2.75994 8.53043 2.46994C8.24043 2.17994 7.76043 2.17994 7.47043 2.46994L2.47043 7.46994C2.18043 7.75994 2.18043 8.23994 2.47043 8.52994L7.47043 13.5299C7.62043 13.6799 7.81043 13.7499 8.00043 13.7499C8.19043 13.7499 8.38043 13.6799 8.53043 13.5299C8.82043 13.2399 8.82043 12.7599 8.53043 12.4699L4.81043 8.74994H13.0004C13.4104 8.74994 13.7504 8.40994 13.7504 7.99994C13.7504 7.58994 13.4104 7.24994 13.0004 7.24994Z" fill="white"/>
</svg>Video Library</a>
        <?php remove_filter('term_description', 'wpautop'); ?>
        <h2 class="scale-50-40-28 title-series video-series-title-ov"><?php single_term_title(); ?></h2>
        <p class="scale-21-21-18 description-series"><?php echo term_description(); ?></p>
    </div>
</div>

<div class="video-serie-main-ov">
    <div class="inner-wrap inner-wrap-1200">

        <?php
        $order = isset($_GET['order']) ? $_GET['order'] : 'DESC';
        ?>

        <div class="dropdown-container">
            <div class="fixed-14 dropbtn custom-dropdown">
                <div class="selected-option allselect">
                    <?php
                    switch ($order) {
                        case 'ASC':
                            echo 'Oldest to newest';
                            break;
                        case 'alpha_asc':
                            echo 'A-Z';
                            break;
                        case 'alpha_desc':
                            echo 'Z-A';
                            break;
                        default:
                            echo 'Newest to oldest';
                            break;
                    }
                    ?>
                </div>

                <div class="options-container dropdown-option pointer-cursor">
                    
                    <!-- Option 1 -->
                    <div class="option dropdown-option pointer-cursor" data-value="DESC">Newest to oldest</div>
                    <!-- Option 2 -->
                    <div class="option dropdown-option pointer-cursor" data-value="ASC">Oldest to newest</div>
                    <!-- Option 3 -->
                    <div class="option dropdown-option pointer-cursor" data-value="alpha_asc">A-Z</div>
                    <!-- Option 4 -->
                    <div class="option dropdown-option pointer-cursor" data-value="alpha_desc">Z-A</div>
                </div>
                <span class="arrow-main arrow-series"></span>
            </div>
        </div>

        <form method="get" id="sortForm" style="display:none;">
            <input type="hidden" name="order" id="orderInput" value="<?php echo esc_attr($order); ?>">
        </form>

        <?php
        $current_term = get_queried_object();

        $args = array(
            'post_type' => 'video',
            'tax_query' => array(
                array(
                    'taxonomy' => 'videos-series',
                    'field'    => 'slug',
                    'terms'    => $current_term->slug,
                ),
            ),
            'orderby' => ($order === 'alpha_asc' || $order === 'alpha_desc') ? 'title' : 'date',
            'order'   => ($order === 'alpha_asc') ? 'ASC' : (($order === 'alpha_desc') ? 'DESC' : $order),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();

                $post_id        = get_the_ID();
                $bg_teasertest  = get_field('short_description', $post_id);
                $video_title    = get_field('video_title', $post_id);
                $video_thumbnail= get_field('video_thumbnail', $post_id);
                $timecodevideo  = get_field('timecodevideo', $post_id);
                $permalink      = get_permalink($post_id);

                ?>
                <a class="video-card-link-wrap"
                   href="<?php echo esc_url($permalink); ?>"
                   data-product="<?php echo esc_attr(implode(", ", wp_get_post_terms($post_id, 'products', array('fields' => 'slugs')))); ?>"
                   data-topic="<?php echo esc_attr(implode(", ", wp_get_post_terms($post_id, 'topics', array('fields' => 'slugs')))); ?>"
                   <?php if (! empty($objective_slugs_string)) : ?>
                       data-objective="<?php echo esc_attr($objective_slugs_string); ?>"
                   <?php endif; ?>>
                    <div class="video-card">
                        <div class="video-card-art">
                            <img class="video-overview-image" src="<?php echo esc_url($video_thumbnail); ?>" alt="" />
                            <p class="timeCode"><?php echo esc_html($timecodevideo); ?> MIN</p>
                        </div>
                        <div class="video-card-content">
                            <div class="card-content">
                                <h5 class="scale-21-21-18 video-series-title">
                                    <?php echo esc_html($video_title); ?>
                                </h5>
                                <p class="scale-18-18-16 video-series-description">
                                    <?php echo esc_html($bg_teasertest); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No videos found in this series.</p>';
        endif;
        ?>
    </div>
</div>

<div class="video-category">
    <div class="inner-wrap inner-wrap-1200">
        <h2 class="scale-28-24-21 category-title-series"><?php echo pll_e('Browse by Categories'); ?></h2>
    </div>
    <div class="video-category-series-wrap">
        <?php
        $video_categories = get_terms(array(
            'taxonomy' => 'video-categories',
            'hide_empty' => false
        ));
        ?>
        <?php foreach ($video_categories as $video_categorie): ?>
            <a class="video_categories <?php echo esc_attr($video_categorie->slug); ?>"
               data-value-product="<?php echo esc_attr($video_categorie->slug); ?>"
               href="<?php echo esc_url(get_term_link($video_categorie)); ?>">
                <h3><?php echo esc_html($video_categorie->name); ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
</div>
</div>

<?php get_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const options = document.querySelectorAll('.dropdown-container .option');
    const orderInput = document.getElementById('orderInput');
    const sortForm = document.getElementById('sortForm');

    options.forEach(option => {
        option.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            orderInput.value = value;
            sortForm.submit();
        });
    });
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
