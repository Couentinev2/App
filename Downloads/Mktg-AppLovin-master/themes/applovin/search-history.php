<?php get_header(); ?>

<style>
 nav.pagination {display: none}

</style>

<div class="secondmenu">
<?php include('rc-nav-demo.php');
$related_posts = get_field( "reports_pages") 
 ?>
</div>

<script type='text/javascript' src='/wp-content/themes/applovin/js/my-live-filter.js' id='my-live-filter-js'></script>

	<section class="articles-block">
		    <div class="inner-wrap inner-wrap-1200">
        <div class="container containersearch" style="padding-top: 150px;">

                       <div class="dropdown">
      <p class="dropbtmnt fixed-14">
Filter
      </p>


      <div class="dropdown-content" id= "menu-drop-dontent-cat">


<?php
// Get terms for the 'products' taxonomy
$products_type = get_terms(array('taxonomy' => 'products', 'hide_empty' => false));

// Get terms for the 'topics' taxonomy
$post_types = get_post_types(array('public' => true), 'names'); 
?>


<div class="dropdown-container">

    <!-- Custom Dropdown for Products -->
    <div class="fixed-14 dropbtn custom-dropdown ">
        <div class="selected-option allselect"><?php  echo pll_e('All products'); ?></div>
        <div class="options-container">
            <!-- All Products Option -->
            <div class="dropdown-option pointer-cursor" data-value-product="">
               <?php  echo pll_e('All products'); ?>
            </div>

            <!-- PHP code to generate product options -->
            <?php foreach ($products_type as $product_term): ?>

                <?php 
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

                <div class="dropdown-option pointer-cursor" data-value-product="<?php echo htmlspecialchars($product_term->slug); ?>" >
                    <?php echo htmlspecialchars($product_term->name); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Hidden original select for Products (for backend functionality) -->
    <select id="product-dropdown" name="products" style="display: none;">
        <option value="" id="allproducts"><?php  echo pll_e('All products'); ?></option>
        <?php foreach ($products_type as $product_term): ?>
            <option value="<?php echo htmlspecialchars($product_term->slug); ?>">
                <?php echo htmlspecialchars($product_term->name); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <span class="arrow"></span>

</div>


<?php
// Get all public post types
$post_types = get_post_types(array('public' => true), 'objects');  
?>

<div class="dropdown-container">
    <!-- Custom Dropdown for Post Types -->
    <div class="fixed-14 dropbtn custom-dropdowntwo">
        <div class="selected-option allselect"><?php  echo pll_e('All Types'); ?></div>
        <div class="options-container">
            <!-- All Post Types Option -->
            <div class="dropdown-option pointer-cursor" data-value="">
                <?php  echo pll_e('All Types'); ?>
            </div>

            <!-- PHP code to generate post type options -->
            <?php foreach ($post_types as $post_type): ?>
                                <?php
                // Check if the post type is one of the desired types
                if (in_array($post_type->name, ['reports', 'video', 'success_story_pod', 'post'])):

                ?>
                <div class="dropdown-option pointer-cursor" data-value="<?php echo htmlspecialchars($post_type->name); ?>">
                   <?php          
                    $blogcheck = htmlspecialchars($post_type->labels->singular_name);
                          if (htmlspecialchars($post_type->labels->singular_name) == 'Post'){
                    echo 'Blog';
                   }else{
                     echo htmlspecialchars($post_type->labels->singular_name); 
                 } ?>
                </div>
                                <?php endif; ?>

            <?php endforeach; ?>
        </div>
    </div>

    <!-- Hidden original select for Post Types (for backend functionality) -->
    <select id="post-types-dropdown" name="post_types" style="display: none;">
        <option value=""><?php  echo pll_e('All Types'); ?></option>
        <?php foreach ($post_types as $post_type): ?>
            <option value="<?php echo htmlspecialchars($post_type->name); ?>">
                <?php echo htmlspecialchars($post_type->labels->singular_name); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <span class="arrow"></span>
</div>



<?php
// Get all public post types
$topics_terms = get_terms(array('taxonomy' => 'topics', 'hide_empty' => false));
?>

<div class="dropdown-container">

    <!-- Custom Dropdown for Topics -->
    <div class="fixed-14 dropbtn custom-dropdowntwo custom-dropdownthree">
        <div class="selected-option allselect"><?php  echo pll_e('All Topics'); ?>
</div>
        <div class="options-container">
            <!-- All Topics Option -->
            <div class="dropdown-option pointer-cursor" data-value-topics="" data-related-topics="">
               <?php  echo pll_e('All Topics'); ?>
            </div>

            <?php foreach ($topics_terms as $topic_term):         ?>

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

                <div class="dropdown-option pointer-cursor" data-value-topics="<?php echo $topic_term->slug; ?>" data-related-products="<?php echo htmlspecialchars($related_products_string); ?>">
                           <?php  echo pll_e( $topic_term->name); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <select id="topics-dropdown" name="topics" style="display: none;">
        <option value="" id="alltopic"><?php  echo pll_e('All Topics'); ?></option>
        <?php foreach ($topics_terms as $topic_term): ?>
            <option value="<?php echo $topic_term->slug; ?>">
               <?php  echo pll_e( $topic_term->name); ?>

            </option>
        <?php endforeach; ?>
    </select>

    <span class="arrow"></span>

</div>

      </div>

    </div>

			<h2 class="scale-18-18-16 titlesearch"><span><?php _e( 'Showing '); ?><?php echo $wp_query->found_posts; ?><?php _e( ' results for', 'applovin' ); ?>:<strong> <?php echo get_search_query(); ?></strong></span></h2>

			<div class="three-cols"  id="filtered-content-bis">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts( ) ) : the_post(); 
            $thumb_id = get_the_ID();
      $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
      $imgsuccess = get_field( 'pod_bg_art',    $thumb_id );
      $post_s = get_post_type($thumb_id);
       $bg_teasertest = get_field( 'teaser_text');
        $post_type = get_post_type(get_the_ID()); 
        $real_type = get_post_type(get_the_ID());
   $product_terms = get_the_terms($thumb_id, 'products'); 
      $topics_terms = get_the_terms($thumb_id, 'topics'); 

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
						<div class="col"  data-product="<?php echo esc_attr($product_types); ?>" data-post-type="<?php echo $real_type ?> " data-topics="<?php echo $topics_types ?>">
							<article class="article">
              <a href="<?php the_permalink(); ?>">
                <div class="img-holder index-holder">
                    <picture>
                      <?php
                      $main_id = get_the_ID();
                      $thumb_id = get_post_thumbnail_id( get_the_ID() );
                      $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
                      $image_src = wp_get_attachment_image_src( $thumb_id, 'thumbnail_768x432' );

                                             $post_type = get_post_type(get_the_ID());
                                                                   $main_id = get_the_ID();

                                           if ($post_type === 'post') {
                                               $post_type = 'Blog'; // Replace 'post' with 'Blog'

                                            }elseif ($post_type === 'video') {
                                            $min = get_field( 'timecodevideo', $main_id );	// c
                                             $post_type = "$min MIN";   
                                           }else{
                                                                                 
                                           $post_type_object = get_post_type_object(get_post_type(get_the_ID()));
                                           $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post'; // Get a more descriptive post type name
                                         }
                      ?>
                      <img src="<?php echo $image_src[0]; ?><?php  the_field( 'pod_bg_art'); ?><?php the_field( 'video_thumbnail', $thumb_id); ?>" alt="<?php echo $alt; ?>">
<p class='timeCode'><?php echo  $post_type  ?></p>

                    </picture>
                </div>
              <div class="text-block">
                <h3 class="scale-18-18-16"><?php the_title(); ?></h3>
                <div class="person-detail-block">
                  <div class="text-holder">
                    <span><strong><?php echo get_the_date( 'M j, Y' ); ?></strong></span> 
                  </div>
                </div>
              </div>
                 </a> 
							</article>
						</div>
					<?php endwhile; ?>


            <div class=" paginationfinal pagination-cat" id="custom-pagination">

            </div>


				<?php else : ?>
					<?php get_template_part( 'blocks/not_found' ); ?>
				<?php endif; ?>
			</div>

			<?php get_template_part( 'blocks/pager' ); ?>
		</div>
				</div>

	</section>




<?php get_footer(); ?>
