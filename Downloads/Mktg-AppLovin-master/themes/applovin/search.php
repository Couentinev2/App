<?php get_header(); ?>

<style>
.disabled-option {
    color: grey;
    pointer-events: none;
}

</style>

    <section class="articles-block">
            <div class="inner-wrap inner-wrap-1200">
        <div class="container containersearch" style="padding-top: 150px;">
<div class="dropdown">
    <p class="dropbtmnt fixed-14"><?php echo pll_e('Filter'); ?></p>
    <div class="dropdown-content" id="menu-drop-dontent-cat">

        <?php
        // Get terms for the 'products' taxonomy
        $products_type = get_terms(array('taxonomy' => 'products', 'hide_empty' => false));

        // Get all public post types
        $post_types = get_post_types(array('public' => true), 'objects');

        // Get terms for the 'topics' taxonomy
        $topics_terms = get_terms(array('taxonomy' => 'topics', 'hide_empty' => false));
        ?>

        <!-- Custom Dropdown for Products -->
        <div class="dropdown-container">
            <div class="fixed-14 dropbtn custom-dropdown">
                <div class="selected-option allselect"><?php echo pll_e('All products'); ?></div>
                <div class="options-container">
                    <div class="dropdown-option pointer-cursor" data-value-product="">
                        <?php echo pll_e('All products'); ?>
                    </div>
                    <?php foreach ($products_type as $product_term): ?>
                        <div class="dropdown-option pointer-cursor" data-value-product="<?php echo htmlspecialchars($product_term->slug); ?>">
                            <?php echo htmlspecialchars($product_term->name); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                    <span class="arrow"></span>

            </div>
        </div>

        <!-- Custom Dropdown for Post Types -->
        <div class="dropdown-container">
            <div class="fixed-14 dropbtn custom-dropdowntwo custom-dropdownsecond">
                <div class="selected-option allselect"><?php echo pll_e('All types'); ?></div>
                <div class="options-container">
                    <div class="dropdown-option pointer-cursor" data-value="">
                        <?php echo pll_e('All types'); ?>
                    </div>
                    <?php foreach ($post_types as $post_type): ?>
                        <?php if (in_array($post_type->name, ['reports', 'video', 'success_story_pod', 'post','guide_pod','report_pod'])): ?>
                            <div class="dropdown-option pointer-cursor" data-value="<?php echo htmlspecialchars($post_type->name); ?>">
                                <?php 
                                if ( $post_type->labels->singular_name == 'Post' || $post_type->labels->singular_name == '投稿' || $post_type->labels->singular_name == '글' ) {
                                                    echo pll_e('Blog');
                   }else{
                                echo pll_e($post_type->labels->singular_name);
                                } ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                    <span class="arrow"></span>

            </div>
        </div>

        <!-- Custom Dropdown for Topics -->
        <div class="dropdown-container">
            <div class="fixed-14 dropbtn custom-dropdowntwo custom-dropdownthree">
                <div class="selected-option allselect"><?php echo pll_e('All topics'); ?></div>
                <div class="options-container">
                    <div class="dropdown-option pointer-cursor" data-value-topics="">
                        <?php echo pll_e('All topics'); ?>
                    </div>
                    <?php foreach ($topics_terms as $topic_term): ?>
                        <div class="dropdown-option pointer-cursor" data-value-topics="<?php echo htmlspecialchars($topic_term->slug); ?>">
                            <?php echo pll_e($topic_term->name); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                    <span class="arrow"></span>

            </div>
        </div>

    </div>
</div>


            <h2 class="scale-18-18-16 titlesearch">
            <?php if ( pll_current_language('slug') == 'ja' ||  pll_current_language('slug') == 'ko') { // for JA and KO ?>
				<span><?php echo $wp_query->found_posts; ?><?php pll_e( 'results for' ); ?>:<strong> <?php echo get_search_query(); ?></strong></span>
			<?php } else if ( pll_current_language('slug') == 'cn' ){ // for CN ?>
				<span><?php echo $wp_query->found_posts; ?>: <strong><?php echo get_search_query(); ?></strong><?php pll_e( 'results for' ); ?></span>
			<?php } else { ?>
				<span><?php pll_e( 'Showing'); ?> <?php echo $wp_query->found_posts; ?> <?php pll_e( 'results for' ); ?>:<strong> <?php echo get_search_query(); ?></strong></span>
            <?php }?>
            </h2>

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
        $ext_link = get_field('ext_link');

    $product_type_names = array();

    $success_hide = get_field('success_hide');

    if ($success_hide == "True") {
     continue;
 }

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
                        <div class="col"  data-product="<?php echo esc_attr($product_types); ?>" data-post-type="<?php echo $real_type ?>" data-topics="<?php echo $topics_types ?>">
                            
                            <article class="article <?php echo get_post_type(get_the_ID()); ?>">
<a href="<?php echo !empty(get_field('ext_link')) ? esc_url(get_field('ext_link')) : get_permalink(); ?>" class="" <?php echo !empty(get_field('ext_link')) ? 'target="_blank"' : ''; ?>>
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
                                               $post_type = 'Blog'; 

                                            }elseif ($post_type === 'video') {
                                            $min = get_field( 'timecodevideo', $main_id );  
                                             $post_type = "$min MIN";   
                                           }else{
                                                                                 
                                           $post_type_object = get_post_type_object(get_post_type(get_the_ID()));
                                           $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post'; 
                                         }


                      ?>
                      <source srcset="<?php the_field( 'pod_bg_art'); ?>" />
                      <source srcset="<?php the_field( 'video_thumbnail', $thumb_id); ?>" />
                      <source srcset="<?php echo $image_src[0]; ?>" />
                      <img src="<?php echo $image_src[0]; ?>" alt="<?php echo $alt; ?>"> 
            <p class='timeCode <?php echo !empty($ext_link) ? 'timeCode-out' : ''; ?>'><?php echo pll_e($post_type) ?></p>
            <?php if (!empty($ext_link)) : ?>
                <p class='timeCode'>&#x2197;</p>
            <?php endif; ?>
                    </picture>
                </div>
              <div class="text-block">
                <h3 class="scale-18-18-16">
                <?php if( $post_s == 'success_story_pod' ) {
					echo $bg_teasertest;
					}else {
					the_title();
				} ?>
				</h3>
                <div class="person-detail-block">
                  <div class="text-holder">
                    <span class="post-datestamp"><strong><?php echo get_the_date( 'M j, Y' ); ?></strong></span> 
                  </div>
                </div>
              </div>
                 </a> 
                            </article>
                        </div>
                    <?php endwhile; ?>


            <div class="paginationfinal pagination-cat" id="custom-pagination">

            </div>


                <?php else : ?>
                    <?php get_template_part( 'blocks/not_found' ); ?>
                <?php endif; ?>
            </div>

            <?php get_template_part( 'blocks/pager' ); ?>
        </div>
                </div>

    </section>



<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
document.addEventListener('DOMContentLoaded', function() {
    var posts = document.querySelectorAll('.col');

    function getSelectedValues() {
        const productElement = document.querySelector('.custom-dropdown .selected-option');
        const typeElement = document.querySelector('.custom-dropdownsecond .selected-option');
        const topicElement = document.querySelector('.custom-dropdownthree .selected-option');

        const product = productElement ? productElement.getAttribute('data-value-product') || '' : '';
        const type = typeElement ? typeElement.getAttribute('data-value') || '' : '';
        const topic = topicElement ? topicElement.getAttribute('data-value-topics') || '' : '';

        return {
            product,
            type,
            topic
        };


    }



function updateDropdownOptions() {
    var selected = getSelectedValues();
    var dropdownOptions = {
        products: document.querySelectorAll('.custom-dropdown .dropdown-option'),
        types: document.querySelectorAll('.custom-dropdownsecond .dropdown-option'),
        topics: document.querySelectorAll('.custom-dropdownthree .dropdown-option')
    };

    var availableOptions = {
        products: new Set(['']), // Initialize as an empty set
        types: new Set(['']), // Initialize as an empty set
        topics: new Set(['']) // Initialize as an empty set
    };

    posts.forEach(post => {
        if (matchesFilter(post, selected)) {
            // Split the data-product attribute by commas and add each product to availableOptions.products
            post.getAttribute('data-product').split(',').map(p => p.trim()).forEach(product => {
                availableOptions.products.add(product);
            });

            availableOptions.types.add(post.getAttribute('data-post-type').trim()); // Add post type
            // Split the data-topics attribute by commas and add each topic to availableOptions.topics
            post.getAttribute('data-topics').split(',').map(t => t.trim()).forEach(topic => {
                availableOptions.topics.add(topic);
            });
        }
    });

    // Update the dropdowns with the available options
    updateDropdown(dropdownOptions.products, availableOptions.products, '');
    updateDropdown(dropdownOptions.types, availableOptions.types, '');
    updateDropdown(dropdownOptions.topics, availableOptions.topics, '');
}


function matchesFilter(post, selected) {
    const selectedProducts = selected.product.split(',').map(p => p.trim());
    const selectedTypes = selected.type.split(',').map(t => t.trim());
    const selectedTopics = selected.topic.split(',').map(g => g.trim());




    const postProducts = post.getAttribute('data-product').split(',').map(p => p.trim());
    const postType = post.getAttribute('data-post-type').trim();
    const postTopics = post.getAttribute('data-topics').trim();



    return (!selected.product || selectedProducts.some(p => postProducts.includes(p))) &&
           (!selected.type || selectedTypes.includes(postType)) &&
           (!selected.topic || selectedTopics.some(t => postTopics.includes(t)));
}
    function updateDropdown(options, availableOptions, allValue) {
        options.forEach(option => {
            var value = option.getAttribute('data-value-product') || option.getAttribute('data-value') || option.getAttribute('data-value-topics') || '';

                                           console.log(availableOptions);

            if (value === allValue || availableOptions.has(value)) {
                option.style.color = 'black';
                option.style.pointerEvents = 'auto';
            } else {
                option.style.color = 'grey';
                option.style.pointerEvents = 'none';
            }


        });
    }

    // Attaching click event listeners to each dropdown option
    document.querySelectorAll('.dropdown-option').forEach(option => {
        option.addEventListener('click', function() {
            // Update the selected option display and data attributes
            var parentDropdown = this.closest('.dropdown-container');
            var selectedOptionDisplay = parentDropdown.querySelector('.selected-option');
            selectedOptionDisplay.innerHTML = this.innerHTML;

            var dataValueAttr = this.getAttribute('data-value-product') !== null ? 'data-value-product' :
                                this.getAttribute('data-value') !== null ? 'data-value' : 'data-value-topics';
            selectedOptionDisplay.setAttribute(dataValueAttr, this.getAttribute(dataValueAttr) || '');

            updateDropdownOptions();
        });
    });

    updateDropdownOptions(); // Initial update on page load
});

</script>

<?php get_template_part('template-modules/email-signup');?>
<?php get_footer(); ?>
