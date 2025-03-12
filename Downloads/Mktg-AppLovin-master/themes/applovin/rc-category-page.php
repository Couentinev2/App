<?php
/*
Template Name: RC Category Page
*/
?>
<?php get_header(); ?>

<style>	.grid-item {
	    background-color: #f9f9f9;
	    padding: 16px;
	    text-align: center;
	}
</style>
<?php
$taxchoice = get_field( "taxonomy_selection" );

if ( $taxchoice == 'topics' ) {
    $mycat = get_field( "topics_category_to_display" );
    $mytax = 'topics';
} else if ( $taxchoice == 'products' ) {
    $mycat = get_field( "products_category_to_display" );
    $mytax = 'products';
}

?>
<div class="category-page">
	<div class="container rc-o inner-wrap inner-wrap-1200">
		<div class="top-text-sub">
			<h1 class="scale-36-30-24 pagecat" id="<?php echo $mycat->slug; ?>">
<?php echo $mycat->name; ?>
			</h1>
		</div>
<?php
 $paged = get_query_var('paged') ? get_query_var('paged') : 1;
     $posts_per_page = -1;
$args = array(
    'post_type' => array('post', 'success_story_pod', 'video', 'page' ,'guide_pod','report_pod'),
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
            'key' => '_wp_page_template',
            'value' => array('ctv-report.php', 'sparklab-report.php'),
            'compare' => 'IN',
        ),
        array(
            'key' => '_wp_post_template',
            'compare' => 'NOT EXISTS',
        ),
    ),
            'posts_per_page' => $posts_per_page,
    'paged' => $paged,
);
        $query = new WP_Query($args);?>
		<div class="dropdown">
			<p class="dropbtmnt fixed-14">
				<?php echo pll_e('Filter'); ?> 
			</p>


			<div class="dropdown-content" id="menu-drop-dontent-cat">
<?php

if ($mycat->name == 'MAX' || $mycat->name ==  "AppDiscovery" || $mycat->name ==  "AppLovin Exchange (ALX)"|| $mycat->name == "SparkLabs" ) {


// Get terms for the 'products' taxonomy
$products_type = get_terms(array('taxonomy' => 'products', 'hide_empty' => false));

// Get terms for the 'topics' taxonomy
$post_types = get_post_types(array('public' => true), 'names'); 
?>
<?php
// Get all public post types
$topics_terms = get_terms(array('taxonomy' => 'topics', 'hide_empty' => false));
?>

<div class="dropdown-container">

    <!-- Custom Dropdown for Topics -->
    <div class="fixed-14 dropbtn custom-dropdowntwo custom-dropdownthree">
        <div class="selected-option allselect"><?php  echo pll_e('All topics'); ?>
</div>
        <div class="options-container">
            <!-- All topics Option -->
            <div class="dropdown-option pointer-cursor" data-value-topics="" data-related-topics="">
               <?php  echo pll_e('All topics'); ?>
            </div>

<?php foreach ($topics_terms as $topic_term): ?>
    <?php 
    // Gathering related products
    $related_products = [];
    // Gathering related post types
    $related_types = [];

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
        // Adding products
        $post_products = wp_get_post_terms($post->ID, 'products');
        foreach ($post_products as $post_product) {
            $related_products[$post_product->slug] = $post_product->name;
        }

        // Adding post types
        if (!in_array($post->post_type, $related_types)) {
            $related_types[] = $post->post_type;
        }
    }

    $related_products_string = implode(',', array_keys($related_products));
    $related_types_string = implode(',', $related_types);
    ?>

    <div class="dropdown-option pointer-cursor" 
         data-value-topics="<?php echo htmlspecialchars($topic_term->slug); ?>" 
         data-related-products="<?php echo htmlspecialchars($related_products_string); ?>"
         data-related-types="<?php echo htmlspecialchars($related_types_string); ?>">
        <?php echo pll_e($topic_term->name); ?>
    </div>
<?php endforeach; ?>

        </div>
    </div>

    <select id="topics-dropdown" name="topics" style="display: none;">
        <option value="" id="alltopic"><?php  echo pll_e('All topics'); ?></option>
        <?php foreach ($topics_terms as $topic_term): ?>
            <option value="<?php echo $topic_term->slug; ?>">
               <?php  echo pll_e( $topic_term->name); ?>

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
					<div class="fixed-14 dropbtn custom-dropdowntwo custom-dropdownsecond">
						<div class="selected-option allselect">
<?php  echo pll_e('All types'); ?>
						</div>
						<div class="options-container">
<!-- All Post Types Option -->
							<div class="dropdown-option pointer-cursor" data-value="">
<?php  echo pll_e('All types'); ?>
							</div>
<!-- PHP code to generate post type options -->
<?php foreach ($post_types as $post_type): ?>
<?php
                // Check if the post type is one of the desired types
                if (in_array($post_type->name, ['reports', 'video', 'success_story_pod', 'post','guide_pod','report_pod'])):

                ?>
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
					</div>
<!-- Hidden original select for Post Types (for backend functionality) -->
					<select id="post-types-dropdown" name="post_types" style="display: none;">
						<option value=""><?php  echo pll_e('All types'); ?>
						</option>
<?php foreach ($post_types as $post_type): ?>
						<option value="<?php echo htmlspecialchars($post_type->name); ?>"> 
<?php echo htmlspecialchars($post_type->labels->singular_name); ?>
						</option>
<?php endforeach; ?>
					</select>
					<span class="arrow"></span> 
				</div>

				</div>

<?php }else{


// Get terms for the 'products' taxonomy
$products_type = get_terms(array('taxonomy' => 'products', 'hide_empty' => false));

// Get terms for the 'topics' taxonomy
$post_types = get_post_types(array('public' => true), 'names'); 
?>
				<div class="dropdown-container">
<!-- Custom Dropdown for Products -->
					<div class="fixed-14 dropbtn custom-dropdown ">
						<div class="selected-option allselect">
<?php  echo pll_e('All products'); ?>
						</div>
						<div class="options-container">
<!-- All Products Option -->
							<div class="dropdown-option pointer-cursor" data-value-product="">
<?php  echo pll_e('All products'); ?>
							</div>
<!-- PHP code to generate product options -->
<?php foreach ($products_type as $product_term): ?>
    <?php 
    // Exclude the product with the name "Audience+"
    if ($product_term->name === 'Audience+') {
        continue;
    }

    $related_topics = [];

    // Fetch posts related to the current product term
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

    // Collect related topics
    foreach ($posts as $post) {
        $post_topics = wp_get_post_terms($post->ID, 'topics');
        foreach ($post_topics as $post_topic) {
            $related_topics[$post_topic->slug] = $post_topic->name;
        }
    }

    // Convert related topics to a string
    $related_topics_string = implode(',', array_keys($related_topics));
    ?>
    <!-- Render the dropdown option -->
    <div class="dropdown-option pointer-cursor <?php echo htmlspecialchars($product_term->slug); ?>" data-value-product="<?php echo htmlspecialchars($product_term->slug); ?>">
        <?php echo htmlspecialchars($product_term->name); ?>
    </div>
<?php endforeach; ?>

						</div>
					</div>
<!-- Hidden original select for Products (for backend functionality) -->
					<select id="product-dropdown" name="products" style="display: none;">
						<option value="" id="allproducts"><?php  echo pll_e('All products'); ?>
						</option>
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
					<div class="fixed-14 dropbtn custom-dropdowntwo custom-dropdownsecond">
						<div class="selected-option allselect">
<?php  echo pll_e('All types'); ?>
						</div>
						<div class="options-container">
<!-- All Post Types Option -->
							<div class="dropdown-option pointer-cursor" data-value="">
<?php  echo pll_e('All types'); ?>
							</div>
<!-- PHP code to generate post type options -->
<?php foreach ($post_types as $post_type): ?>
<?php
                // Check if the post type is one of the desired types
                if (in_array($post_type->name, ['reports', 'video', 'success_story_pod', 'post','guide_pod','report_pod'])):

                ?>
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
					</div>
<!-- Hidden original select for Post Types (for backend functionality) -->
					<select id="post-types-dropdown" name="post_types" style="display: none;">
						<option value=""><?php  echo pll_e('All types'); ?>
						</option>
<?php foreach ($post_types as $post_type): ?>
						<option value="<?php echo htmlspecialchars($post_type->name); ?>"> 
<?php echo htmlspecialchars($post_type->labels->singular_name); ?>
						</option>
<?php endforeach; ?>
					</select>
					<span class="arrow"></span> 
				</div>
			</div>
<?php }; ?>





		</div>
<?php     
if ($query->have_posts()): ?>
		<div class="grid-container" id="filtered-content-bis">
<?php while ($query->have_posts()): $query->the_post();
            $thumb_id = get_the_ID();
      $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
      $imgsuccess = get_field( 'pod_bg_art',    $thumb_id );
      $post_s = get_post_type($thumb_id);
       $bg_teasertest = get_field( 'teaser_text');
        $post_type = get_post_type(get_the_ID()); 
        $real_type = get_post_type(get_the_ID());
   $product_terms = get_the_terms($thumb_id, 'products'); 
    $product_type_names = array();
      $topics_terms = get_the_terms($thumb_id, 'topics'); 

    if ($product_terms && !is_wp_error($product_terms)) {
        foreach ($product_terms as $term) {
            $product_type_names[] = $term->slug;
        }
    }

    $product_types = implode(", ", $product_type_names);

if ($post_type === 'post') {
               $thumb_id = get_post_thumbnail_id( get_the_ID() );

  $post_type = 'Blog'; // Replace 'post' with 'Blog'
   }elseif ($post_type === 'video') {
    $min = get_field('timecodevideo', $thumb_id );  
     $post_type = "$min MIN"; 
  }elseif ($post_s == 'page'){
        $thumb_id = get_post_thumbnail_id( get_the_ID() );
 $post_type = 'Report';
     }else{
                                                                                 
    $post_type_object = get_post_type_object(get_post_type(get_the_ID()));
      $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post'; // Get a more descriptive post type name
   }

         $image_src = wp_get_attachment_image_src( $thumb_id, 'thumbnail_768x432' );
	  $topics_type_names = array();

        if ($topics_terms && !is_wp_error($topics_terms)) {
        foreach ($topics_terms as $term) {
            $topics_type_names[] = $term->slug;
        }
    }

    $topics_types = implode(", ", $topics_type_names);
 ?>
			<div class="grid-item colone <?php echo get_post_type(get_the_ID()); ?>" data-product="<?php echo esc_attr($product_types); ?>" data-post-type="<?php echo $real_type ?>" data-topics="<?php echo $topics_types ?>">
				<div class="text-block">
					<p class="cattitle class-18-18-16">
						<a href="<?php the_permalink(); ?>"> 
<?php if( $post_s == 'success_story_pod' ) { ?>
<?php echo $bg_teasertest; ?>
<?php }else { ?>
<?php the_title(); ?>
<?php } ?>
						</a>
					</p>
					<span class="post-datestamp"> <strong class="fixed-12"> 
<?php echo get_the_date('M j, Y'); ?>
					</strong> </span> 
				</div>
				<a href="<?php the_permalink(); ?>"> <picture> <source srcset="<?php echo $image_src[0]; ?><?php  the_field( 'pod_bg_art'); ?>" media="(max-width: 767px)"> <source srcset="<?php echo $image_src[0]; ?><?php  the_field( 'pod_bg_art'); ?>" media="(max-width: 1024px)"> <img src="<?php echo $image_src[0]; ?><?php  the_field( 'pod_bg_art'); ?><?php the_field( 'video_thumbnail', $thumb_id); ?>" alt="<?php echo $alt; ?>"> 
				<p class='timeCode'>

<?php echo  pll_e($post_type)  ?>
				</p>
				</picture> </a> 
			</div>
<?php endwhile;  ?>




		</div>
<?php endif;
        wp_reset_postdata();
    
    ?>


<div class="paginationfinal pagination-cat custom-cat-pag" id="custom-pagination">

</div>
	</div>

</div>
<?php include('template-parts/slide-ojoective.php'); ?>
</div>
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
	document.addEventListener('DOMContentLoaded', function () {
	    var dropdown = document.getElementById('post-types-dropdown');
	
	    dropdown.addEventListener('change', function () {
	        var selectedType = this.value;
	        var posts = document.querySelectorAll('.post');
	
	        posts.forEach(function (post) {
	            if (selectedType === '' || post.getAttribute('data-post-type') === selectedType) {
	                post.style.display = ''; // Show post
	            } else {
	                post.style.display = 'none'; // Hide post
	            }
	        });
	    });
	});
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
document.addEventListener('DOMContentLoaded', function() {
    var posts = document.querySelectorAll('.colone');

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
    const selectedTopics = selected.topic.split(',').map(t => t.trim());




    const postProducts = post.getAttribute('data-product').split(',').map(p => p.trim());
    const postType = post.getAttribute('data-post-type').trim();
    const postTopics = post.getAttribute('data-topics').split(',').map(t => t.trim());



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

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">

</script>
<?php get_footer(); ?>
