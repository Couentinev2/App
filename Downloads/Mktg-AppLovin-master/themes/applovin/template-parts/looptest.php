<div class="allpost">
    <div class="container inner-wrap inner-wrap-1200">

         <h2 class="scale-32-24-21 alltitle"><span><?php pll_e('All posts'); ?></span></h2>

<?php
                                   $post_id = get_the_ID();
$mytax = get_field( "taxonomy_selection" );
       $mycat= $mytax;

          foreach ( get_the_terms(  $post_id, 'video_categories' ) as $ct ) { 
        $mytax = get_term( $ct )
}
?>
         <div class="articles-frame">

<?php
// Query all posts, including custom post types
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $posts_per_page = 12;
        $args = array(
            'post_type' => array('post', 'success_story_pod', 'video'),
            'posts_per_page' => $posts_per_page,
            'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => $mytax,
                    'field'    => 'slug',
                    'terms'    => $mycat->slug,
                ),
            ),
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'blog_hide',
            'value' => 'false',
            'compare' => '=',
        ),
        array(
            'key' => 'blog_hide',
            'compare' => 'NOT EXISTS',
        ),
    ),
);


$loop = new WP_Query($args);

if ($loop->have_posts()) :

    while ($loop->have_posts()) : $loop->the_post();
 ?>


        <div class="col">
            <article class="article">
                <div class="img-holder">
                    <a href="<?php the_permalink(); ?>" target="_blank">
                        <picture>
                            <?php
                                   $post_id = get_the_ID();
$thumb_id = get_post_thumbnail_id(get_the_ID());
$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
$image_src = wp_get_attachment_image_src($thumb_id, 'thumbnail_338x189');
$imgsuccess = get_field('pod_bg_art');
$post_s = get_post_type();
$bg_teasertest = get_field('teaser_text');
$post_type = get_post_type(get_the_ID());
                            if ($post_type === 'post' || $post_type === 'page') {
                                $post_type = 'Blog'; // Replace 'post' with 'Blog'
                            } elseif ($post_type === 'Video'){
                                    $post_type = "Video";
                            }else{

                                $post_type_object = get_post_type_object(get_post_type(get_the_ID()));
                                $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
                            }
                            ?>
                            <source srcset="<?php
                            if ($post_type == 'Blog') {
                            echo $image_src[0];  
                            } else {?>
<?php the_field('pod_bg_art'); ?><?php the_field('video_thumbnail'); ?>" alt="<?php echo $alt; ?>
                           <?php }
                            ?>" media="(max-width: 767px)">
                            <source srcset="<?php
                            if ($post_type == 'Blog') {
                            echo $image_src[0];  
                            } else {?>
<?php the_field('pod_bg_art'); ?><?php the_field('video_thumbnail'); ?>" alt="<?php echo $alt; ?>
                           <?php }
                            ?>">
                            <img src="<?php
                            if ($post_type === 'Blog') {
                            echo $image_src[0];  
                            } else {?>
<?php the_field('pod_bg_art'); ?><?php the_field('video_thumbnail'); ?>" alt="<?php echo $alt; ?>
                           <?php }
                            ?>">
                            <p class='timeCode'><?php echo $post_type ?></p>

                        </picture>
                    </a>
                </div>
                <div class="text-block ">
                    <div class="title-heading-holder">
                        <?php if (has_term('', 'category')) : ?>
                            <span class="title"><?php the_category(', '); ?></span>
                        <?php endif; ?>
                        <h2 class="scale-18-18-16"><a href="<?php the_permalink(); ?>">
                                <?php if ($post_s == 'success_story_pod') { ?>
                                    <?php echo $bg_teasertest; ?>
                                <?php } else { ?>

                                    <?php the_title(); ?>
                                <?php } ?>
                            </a></h2>
                    </div>
                    <div class="person-detail-block">

                        <div class="text-holder">
                            <span><strong class="fixed-12"><?php echo get_the_date('M j, Y'); ?></strong></span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <?php 
    endwhile;

    echo '<div class="paginationfinal">';
    echo paginate_links(array(
        'total' => $loop->max_num_pages,
        'prev_text' => __('&laquo; &#8249;'),
        'next_text' => __('&#8250; &raquo;'),
    ));
    echo '</div>';

    wp_reset_postdata(); // Reset the loop data

endif;
?>

</div>
</div>
</div>