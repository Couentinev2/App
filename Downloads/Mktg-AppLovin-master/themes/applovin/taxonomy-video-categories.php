<?php
/**
 * Taxonomy Template for Video Categories
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
        <h2 class="scale-50-40-28 title-series-tax video-series-title-ov"><?php single_term_title(); ?></h2>
        <p class="scale-21-21-18 description-series"><?php echo term_description(); ?></p>
    </div>
</div>
    <div class="inner-wrap inner-wrap-1200">

    <div class="video-category-wrap">

        <?php
        $current_term = get_queried_object();

        $args = array(
            'post_type' => 'video', 
            'tax_query' => array(
                array(
                    'taxonomy' => 'video-categories',
                    'field'    => 'slug',
                    'terms'    => $current_term->slug,
                ),
            ),
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

                // If you have objective slugs, ensure you define $objective_slugs_string
                // before you use it in the data-objective attribute.
                ?>
                <a class="video-card-link-wrap" 
                   href="<?php echo esc_url($permalink); ?>"
                   data-product="<?php echo esc_attr(implode(", ", wp_get_post_terms($post_id, 'products', array('fields' => 'slugs')))); ?>"
                   data-topic="<?php echo esc_attr(implode(", ", wp_get_post_terms($post_id, 'topics', array('fields' => 'slugs')))); ?>"
                   <?php if (! empty($objective_slugs_string)) : ?>
                       data-objective="<?php echo esc_attr($objective_slugs_string); ?>"
                   <?php endif; ?>>
                    <div class="video-card-category">
                        <div class="video-card-art-cat">
                            <img class="video-overview-image" src="<?php echo esc_url($video_thumbnail); ?>" alt="" />
                            <p class="timeCode"><?php echo esc_html($timecodevideo); ?> MIN</p>
                        </div>
                        <div class="video-card-content">
                            <div class="card-content">
                                <h5 class="scale-21-21-18 video-series-title">
                                    <?php echo esc_html($video_title); ?>
                                </h5>

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
<div class="video-category">
   <div class="inner-wrap inner-wrap-1200">
      <h2 class="scale-32-24-21 category-title-series"><?php echo pll_e('Browse by Categories'); ?></h2>
   </div>
   <div class="video-category-series-wrap">
      <?php $video_categories = get_terms(array('taxonomy' => 'video-categories', 'hide_empty' => false)); ?>
      <?php foreach ($video_categories as $video_categorie): ?>
      <a class="video_categories <?php echo esc_attr($video_categorie->slug); ?>" data-value-product="<?php echo esc_attr($video_categorie->slug); ?>" href="<?php echo esc_url(get_term_link($video_categorie)); ?>">
         <h3 class=""><?php echo esc_html($video_categorie->name); ?></h3>
      </a>
      <?php endforeach; ?>
   </div>
</div>
</div>
<?php get_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const postsPerPage = 6; 
    const postsContainer = document.querySelector('.video-category-wrap'); 
    const paginationContainer = document.createElement('div'); 
    paginationContainer.id = 'pagination-container-video-category'; 
    postsContainer.parentNode.insertBefore(paginationContainer, postsContainer.nextSibling);

    let currentPage = 1;
    let allPosts = Array.from(postsContainer.querySelectorAll('.video-card-link-wrap')); 

    function showPage(page) {
        const start = (page - 1) * postsPerPage;
        const end = start + postsPerPage;
        const postsToShow = allPosts.slice(start, end); 

        allPosts.forEach(post => post.style.display = 'none');

        postsToShow.forEach(post => post.style.display = 'flex');
    }

    function updatePagination() {
        paginationContainer.innerHTML = '';
        const totalPages = Math.ceil(allPosts.length / postsPerPage);

        if (totalPages <= 1) {
            return;
        }

        // Left arrow
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

        // Add page buttons
        for (let i = 1; i <= totalPages; i++) {
            const pageBtn = document.createElement('button');
            pageBtn.textContent = i;
            if (i === currentPage) {
                pageBtn.classList.add('active');
            }
            pageBtn.addEventListener('click', () => {
                currentPage = i;
                showPage(currentPage);
                updatePagination();
            });
            paginationContainer.appendChild(pageBtn);
        }

        // Right arrow
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
    }

    showPage(currentPage);
    updatePagination();
});
</script>