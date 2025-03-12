<div class="row row-modern-gray-100 content-row success-row">
	<div class="inner-wrap inner-wrap-1200 success-row-header">
		<h2 class="scale-36-30-24">
			<?php the_field('success_stories_title'); ?>
		</h2>
		<p class="scale-21-21-18"> <?php the_field('success_stories_text'); ?></p>
	</div>

    <?php      
          $posts = get_field('highlighted_success');

                if( $posts ): ?>
                <div class="inner-wrap inner-wrap-1200 hz-scrollable">
				<div class="success-story-cards-wrap">
<?php foreach( $posts as $p ): ?>

<?php 
$post_id = $p->ID;
foreach ( get_the_terms( $post_id, 'success_pods_categories' ) as $ct ) { // loop through
	$cy = get_term( $ct ); // grab each custom taxonomy category (term) object for the post
	$name = $cy->name;
}
            
            echo '<a class="success-story-card-link-wrap"  href=" '. get_permalink($post_id) .'">
          <div class="success-story-card">
              <div class="success-card-pod success-card-art" style=" background-image: url(' . get_field('pod_bg_art',$post_id ) . ');">
 <img class="logo-partners-overview" src="' . get_field( 'partner_logo', $post_id ) . '" alt="" />
              ';

            echo '</div>
          <div class="success-card-pod success-card-content">
            <div class="text-content">
              <h5 class="scale-18-18-16">
                ' . get_field( 'teaser_text', $post_id ) . '
              </h5>
            </div>
          </div>
        </div>
        </a>';
?>

<?php endforeach; 
		echo '	</div></div>';
        echo '</div>';
?>
<?php endif; ?>