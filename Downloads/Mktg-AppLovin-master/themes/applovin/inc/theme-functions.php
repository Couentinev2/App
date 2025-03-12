<?php 


// REMOVE WP EMOJI CODE IN HEAD
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// GLOSSARY PAGE FUNCTIONS
function set_glossary_index( $post_id ) { // on save, update Glossary Entry posts with a custom field to hold their "index letter"

   if ( get_post_type($post_id) == 'glossary_entry' ) {

        // If this is a revision (old version), don't fire
        if ( wp_is_post_revision( $post_id ) )
        return;

        // Get the title of the post, lowercase it for consistency
        $title = strtolower( get_the_title() );

        // Get the first letter of the title
        $letter = substr( $title, 0, 1 );

        // Set to 0-9 if it's a number
        if ( is_numeric( $letter ) ) {
            $letter = '0-9';
        }
                
        // set the same default Featured Img for all Glossary posts using unique WP ID
        $featured_img_id = 6764;

        update_post_meta($post_id, 'glossary_term', $letter);
        set_post_thumbnail($post_id, $featured_img_id );
    }

}
add_action( 'save_post', 'set_glossary_index', 10, 2 );

// REGISTER ALLOWED CUSTOM QUERY VARS
function custom_queries( $vars ) {
    $vars[] = 'sort';
    $vars[] = 'category';
    $vars[] = 'cc';
    $vars[] = 'navui';
    $vars[] = 'region';
    return $vars;
}
add_filter( 'query_vars', 'custom_queries' );

// MULTI-LANG CONTENT DISPLAY HELPER FUNCTIONS
function multi_lang($f) {
global $mylang;
if ( $mylang == 'lang-kr' && get_field( $f . '_kr' ) ) :
    echo the_field( $f . '_kr');
elseif ( $mylang == 'lang-jp' && get_field( $f . '_jp' ) ) :
    echo the_field( $f . '_jp');
elseif ( $mylang == 'lang-cn' && get_field( $f . '_cn' ) ) :
    echo the_field( $f . '_cn');
else :                  
    echo the_field($f);                 
endif;
}
function multi_lang_subfield($f) {
global $mylang;
if ( $mylang == 'lang-kr' && get_sub_field( $f . '_kr' ) ) :
    echo the_sub_field( $f . '_kr');
elseif ( $mylang == 'lang-jp' && get_sub_field( $f . '_jp' ) ) :
    echo the_sub_field( $f . '_jp');
elseif ( $mylang == 'lang-cn' && get_sub_field( $f . '_cn' ) ) :
    echo the_sub_field( $f . '_cn');
else :                  
    echo the_sub_field($f);                 
endif;
}

// Ability to focus search to specific post types
function focus_search_query($query) {
    if ($query->is_search && $_GET['post_type']) {
        $query->set('post_type', explode(",", htmlspecialchars($_GET['post_type'])));
    }
    return $query;
}
add_filter('pre_get_posts', 'focus_search_query');

// add navui=false parameter to links on pages which were themselves called with that parameter -- limited to Terms/Privacy pages
add_filter( 'the_content', 'filter_content_for_links', 1 );

function filter_content_for_links( $content ) {

    // Check if the current page was loaded with the "navui=false" parameter.
    if ( isset( $_GET['navui'] ) && $_GET['navui'] === 'false' && is_page_template( array( 'terms-page.php', 'policies-page.php', 'terms-rewards-plus-page.php' ) ) ) {

            // Use regex to find and replace links that point to applovin.com
            $content = preg_replace_callback(
                '/<a\s+(?!.*?href="mailto:)(?!.*?href="#)(.*?)href="https?:\/\/(?:www\.)?applovin\.com([^"]+)"(.*?)>/', 
                function($matches) {
                    $url = $matches[2];
                    $delimiter = ( strpos($url, '?') !== false ) ? '&' : '?';

                    // Check if the URL has an on-page anchor at the end
                    if (preg_match('/(.*)(#.+)$/', $url, $submatches)) {
                        return '<a ' . $matches[1] . 'href="https://applovin.com' . $submatches[1] . $delimiter . 'navui=false' . $submatches[2] . '"' . $matches[3] . '>';
                    } else {
                        return '<a ' . $matches[1] . 'href="https://applovin.com' . $url . $delimiter . 'navui=false"' . $matches[3] . '>';
                    }
                },
                $content
            );

        }
 
    return $content;
}


// SET DEFAULT TIMEOUT FOR PUBLIC PREVIEW LINK EXPIRY

add_filter( 'ppp_nonce_life', 'my_nonce_life' );
function my_nonce_life() {
    return 5 * DAY_IN_SECONDS;
}


// add YouTube JSAPI call to native video embeds

add_filter( 'embed_oembed_html', 'wrap_oembed_html', 99, 4 );

function wrap_oembed_html( $cached_html, $url, $attr, $post_id ) {
    if ( false !== strpos( $url, "youtube.com") || false !== strpos( $url, "youtu.be" ) ) {
        $cached_html = str_replace( '?feature=oembed', '?feature=oembed&enablejsapi=1', $cached_html );
    }
    return $cached_html;
}

// allow PHP inside widget
function php_execute($html){

if(strpos($html,"<"."?php")!==false){

ob_start(); eval("?".">".$html); $html=ob_get_contents();

ob_end_clean(); }

return $html; 

}

add_filter('widget_text','php_execute',100);


// Custom language base constructor
function get_lang_base() {
    if ( pll_current_language('slug') != 'en' ) {
        return '/' . pll_current_language('slug');
    } else {
        return '';
    }
}

function the_lang_base() {
    if ( pll_current_language('slug') != 'en' ) {
        echo '/' . pll_current_language('slug');
    } else {
        echo '';
    }
}

// display menu item descriptions by default
function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<p class="menu-description">' . $item->description . '</p>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );

// UNREGISTER TAGS + CATEGORIES FOR BLOG POSTS BY DEFAULT
function unregister_tags_cats_blog() {
    unregister_taxonomy_for_object_type( 'post_tag', 'post' );
    unregister_taxonomy_for_object_type( 'category', 'post' );
}
add_action( 'init', 'unregister_tags_cats_blog' );


function enable_gutenberg_for_success_story_pod_new_post() {
    if (get_post_type() === 'Success Stories' && !get_current_screen()->action) {
        add_filter('use_block_editor_for_post_type', '__return_true', 10);
    }
}
add_action('admin_head', 'enable_gutenberg_for_success_story_pod_new_post');


function enable_gutenberg_for_success_story_pod_new_post_bis() {
    if (get_post_type() === 'Success Stories') {
        add_filter('use_block_editor_for_post_type', '__return_true', 10);
    }
}
add_action('admin_head', 'enable_gutenberg_for_success_story_pod_new_post_bis');





// SUPPRESS UNNEEDED PANELS FROM APPEARING IN POST EDIT VIEWS
// based on solution by C. Cooper: https://wordpress.stackexchange.com/questions/339436/removing-panels-meta-boxes-in-the-block-editor/339437#339437 
function update_gutenberg_register_files() {
    // script file
    wp_register_script(
        'panel-block-script',
        get_stylesheet_directory_uri() .'/js/block-script.js', // adjust the path to the JS file
        array( 'wp-blocks', 'wp-edit-post' )
    );
    // register block editor script
    register_block_type( 'cc/ma-block-files', array(
        'editor_script' => 'panel-block-script'
    ) );

}
add_action( 'init', 'update_gutenberg_register_files' );

// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
    if ( is_page_template( 'partners-page.php' ) )  {
?>
<script<?php echo defined('CSP_NONCE') ? ' nonce="' . esc_attr(CSP_NONCE) . '"' : ''; ?>>
function fetch(){
    jQuery.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'post',
        data: { action: 'data_fetch', keyword: jQuery('#keyword').val() },
        success: function checkData(data) {
            if (!jQuery.trim(data)){   
                var originalData = jQuery('#datafetch').html();
                jQuery(".partner-pods-wrap").html("<p class='nofoundsearch'><?php pll_e('No partners match your search. Try removing filters or changing your search terms'); ?>. <span id='clear-all'><?php pll_e('Clear all filters'); ?></span></p>");
                jQuery(".partner-pods-wrap").addClass('gridreset');

                jQuery('.nofoundsearch span').click(function() {
                    jQuery(".searchbox").val('');
                    jQuery('li input[type="checkbox"]').empty();
                    jQuery("li input[type='checkbox']").each(function() { 
                        jQuery("li input[type='checkbox']").attr("indeterminate", false);
                        jQuery("li input[type='checkbox']").attr("checked", false);
                        jQuery('li input[type="checkbox"]').empty();
                        jQuery('li input[type="checkbox"]').prop({
                            indeterminate: false,
                            checked: false,
                        });

                        jQuery("#menu-drop").html("Partner Type");
                        jQuery(".display").show();    
                    });
                    fetch();
                });
            } else {   
                jQuery(".partner-pods-wrap").removeClass("gridreset");
                jQuery('#datafetch').html(data);
            }
        }
    });
}
</script>
<?php
    }
}

// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => -1, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'partners_entry', 'orderby'=> 'title', 'order' => 'ASC' ) );
  
                  if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); 
                  $a=array();
                  $b=array();
                  $parentstaxo=array();
                  $logoproduct=array();
                  $post_id = get_the_ID();
                  
                  foreach ( get_the_terms( $post_id, 'partners_pods_categories' ) as $ct ) { // loop through
                   $cy = get_term( $ct ); // grab each custom taxonomy category (term) object for the post
                   $name = $cy->name;
                   $slugmain = $cy->slug;
                   $parentsterm = $ct->parent;
                  
                  if ( $parentsterm == 4337 ){ // ID = Measurement & Analytics
                  array_push($parentstaxo, 'ALX' );
                  array_push($parentstaxo, 'MAX' );
                  }elseif ( $parentsterm == 4434 ){
                  array_push($parentstaxo, 'ALX' );
                  array_push($parentstaxo, 'MAX' );
                  }elseif (  $parentsterm == 4452 ){
                  array_push($parentstaxo, 'ALX' );
                  array_push($parentstaxo, 'MAX' );
                    }elseif ( $parentsterm == 4454){
                  array_push($parentstaxo, 'ALX' );
                  array_push($parentstaxo, 'MAX' );
                  }else{
                  $parentstermname = get_term( $parentsterm);
                  array_push($parentstaxo, $parentstermname->name );
                  };

                  if ( $parentsterm == 4337 || $parentsterm == 4434 ||  $parentsterm == 4337 ||  $parentsterm == 4454 ){ // ID = Measurement & Analytics
                  array_push($logoproduct, '<img class="partner-product" src="/wp-content/themes/applovin/images/max-logov1.svg" alt="AppLovin Product" />' );
                  array_push($logoproduct, '<img class="partner-product" src="/wp-content/themes/applovin/images/alx-logov1.svg" alt="AppLovin Product" />' );
                  }elseif ($parentsterm == 4342){ // ID = ALX
                  $parentstermname = get_term( $parentsterm);
                  array_push($logoproduct, '<img class="partner-product" src="/wp-content/themes/applovin/images/alx-logov1.svg" alt="AppLovin Product" />' );
                  }else{
                  array_push($logoproduct, '<img class="partner-product" src="/wp-content/themes/applovin/images/max-logov1.svg" alt="AppLovin Product" />' );
                  };
                  
                   array_push($a, $name );
                   $List = implode(', ', $a);
                  
                   array_push($b, $slugmain );
                   $Listslug = implode(' ', $b);
                  
                  };  
                  
                   $parentstaxo = array_unique($parentstaxo); 
                   $logoproduct =  array_unique($logoproduct); 
                   rsort($parentstaxo); 
                  
                    $Listsparents = implode('</p><p>', $parentstaxo); 
                    $listlogoproduct = implode(' ', $logoproduct); 
            ?>

            
               <a href="#i<?php echo get_the_id(); ?>" class="open-popup-link std-button display c<?php echo get_the_id(); ?> <?php echo $Listslug ; ?>" id="x<?php echo get_the_id(); ?>">
                  <div  class="popup" data-id="<?php echo $post_id; ?>" id="b<?php echo get_the_id(); ?>" >
                     <span>
                        <img class="partner-pod-logo" src="<?php the_field('logo_partner');?>" alt="<?php the_field('partner_name');?>" />
                        <hr>
                        <div class="partner-small">
                           <h3><?php the_field('partner_name'); ;?></h3>
                           <p> <?php echo  $List?></p>
                        </div>
                        <div class="parents-align">
                           <div class="parents-list">
                              <p><?php echo  $Listsparents ?></p>
                           </div>
                        </div>
                     </span>
                  </div>
               </a>
               <div id="i<?php echo get_the_id(); ?>" class="pop-up mfp-hide">
                  <div class="invisibleDiv">
                     <div class="submission white-popup">
                        <div class="partner-image-section">
                        <img class="partner-pod-logo" src="<?php the_field('logo_partner');?>" alt="<?php the_field('partner_name');?>" />
                        </div>
                        <div class="partner-description-section">
                        <h3><?php the_field('partner_name');?></h3>
                        <div class="appcat">
                            <div class="prod">
                              <h4><?php pll_e('APPLOVIN PRODUCT'); ?></h4>
                              <div class="logo-product-list">
                              <?php echo $listlogoproduct;?>
                            </div>

                           </div>
                           <div class="cat">
                              <h4><?php pll_e('CATEGORY'); ?></h4>
                              <p><?php  echo $List;?></p>
                           </div>

                     </div>
                                                <hr>
                        <h4><?php pll_e('DETAILS'); ?></h4>
                        <a href="<?php the_field('partner_url');?>" target="_blank" class="pop-url"><?php the_field('partner_url');?></a><br>
                        <?php 
     $contactInfo = get_field( "partner_email" ); 
         if ( $contactInfo ) : 
?>
                        <a href="<?php the_field('partner_email');?>" target="_blank" class="pop-email"><?php the_field('partner_email');?></a>

    <?php endif; ?>
                        </div>
                           </div>
                        </div>
 
                  </div>
               </div>
<script<?php echo defined('CSP_NONCE') ? ' nonce="' . esc_attr(CSP_NONCE) . '"' : ''; ?>>
   jQuery(document).ready(function(){
   var allpop = [];
   //  var array = []
   //  var allid = allpop.each.attr("data-id");
   //  var poparray = jQuery.makeArray("." + allpop);
   
   jQuery(".popup").each(function(){
   allpop.push(".c" + jQuery(this).attr("data-id"));
   });
   
   allpops = allpop.join(", ");
   
   
   jQuery(allpops).magnificPopup({
     type:'inline',
     midClick: true 
   });
   });
</script>

<script<?php echo defined('CSP_NONCE') ? ' nonce="' . esc_attr(CSP_NONCE) . '"' : ''; ?>>
   jQuery(document).ready(function () {
   
    var getClass;
   
 jQuery(".mfp-content div").click(function () {
   
       var getClass = jQuery(this);
       console.log(getClass);
   
   document.getElementsByClassName('invisibleDiv').onclick = function()    {
   
   
            jQuery('#i'+ getClass).addClass("mfp-hide")
            
       };
   
   
   });
   
   
     })
       
</script>

        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}

add_filter( 'block_categories_all', 'applovin_new_block_category' );

function applovin_new_block_category( $cats ) {

    // create a new array element with anything as its index
    $new = array(
        'literallyanything' => array(
            'slug'  => 'applovin',
            'title' => 'Blocks by AppLovin'
        )
    );

    // just decide here at what position your custom category should appear
    $position = 0; // 2 – After Text and Media, so technically it is a 3rd position

    $cats = array_slice( $cats, 0, $position, true ) + $new + array_slice( $cats, $position, null, true );

    // reset array indexes
    $cats = array_values( $cats );

    return $cats;

}


function acf_slide_with_scroll_bar_block() {

    global $icon_svg;

    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Slide with Scroll Bar',
            'title'             => __('AppLovin Slide with Scroll Bar'),
            'description'       => __('A custom block for AppLovin.'),
            'render_template'   => 'template-parts/blocks/slide-with-scroll-bar.php',
            'category'          => 'applovin', 
            'icon'              => $icon_svg,
            'mode'              => 'preview',
            'enqueue_style'     => get_template_directory_uri() . '/css/slide-with-scroll-bar.css',
        ));
    }
}

add_action('acf/init', 'acf_slide_with_scroll_bar_block');

function acf_stats_simple() {

    global $icon_svg;

    // check function exists
    if( function_exists('acf_stats_simple') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Stats with colored line',
            'title'             => __('Stats with colored line'),
            'description'       => __('Stats with colored line'),
            'render_template'   => 'template-parts/simple-stats-grid.php',
            'category'          => 'applovin', 
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'acf_stats_simple');

function acf_quote_with_border_block() {

    global $icon_svg;
            
    // check function exists
    if( function_exists('acf_quote_with_border_block') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Simple Quote Text + logo',
            'title'             => __('Simple Quote Text + logo'),
            'description'       => __('Simple Quote Text + logo'),
            'render_template'   => 'template-parts/quote-with-left-border.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'acf_quote_with_border_block');


function acf_local_video() {
    
    global $icon_svg;
            
    // check function exists
    if( function_exists('acf_local_video') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Local Video',
            'title'             => __('Local Video'),
            'description'       => __('Local Video'),
            'render_template'   => 'template-parts/local-video-grey-bg.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'acf_local_video');

function acf_stats_and_descrition() {
    
    global $icon_svg;
            
    // check function exists
    if( function_exists('acf_stats_and_descrition') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Stats and description',
            'title'             => __('Stats and description'),
            'description'       => __('Stats and description'),
            'render_template'   => 'template-parts/repeater-big-stats.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'acf_stats_and_descrition');

function simple_photo_video() {
    
    global $icon_svg;
            
    // check function exists
    if( function_exists('acf_register_block') ) {

        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'simple-video-with-description',
            'title'             => __('Simple Video with Description'),
            'description'       => __('Simple Video with Description'),
            'render_template'   => 'template-parts/basic-video-with-desc.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'simple_photo_video');



function section_separation_guie_report() {
    
    global $icon_svg;

    // check function exists
    if( function_exists('section_separation_guie_report') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Separation with Img for guides and Reports',
            'title'             => __('Separation with Img for guides and Reports'),
            'description'       => __('Separation with Img for guides and Reports'),
            'render_template'   => 'template-parts/section-separation-w-image.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'section_separation_guie_report');


function logo_title_desc() {
    
        global $icon_svg;

            
    // check function exists
    if( function_exists('logo_title_desc') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Logo + title + Small Desc',
            'title'             => __('Logo + title + Small Desc'),
            'description'       => __('Logo + title + Small Desc'),
            'render_template'   => 'template-parts/logo-title-desc.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'logo_title_desc');


function key_point() {
    
    global $icon_svg;
            
    // check function exists
    if( function_exists('key_point') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Key Point',
            'title'             => __('Key Point'),
            'description'       => __('Key Point'),
            'render_template'   => 'template-parts/KeyPoint.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'key_point');


function simple_photo() {

    global $icon_svg;
    
    // check function exists
    if( function_exists('simple_photo') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Simple Photo with Description',
            'title'             => __('Simple Photo with Description'),
            'description'       => __('Simple Photo with Description'),
            'render_template'   => 'template-parts/basic-image-with-desc.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'simple_photo');


// Register a custom block using ACF
function acf_sub_title_for_reports() {

    global $icon_svg;
            
    if (function_exists('acf_register_block_type')) {  
        acf_register_block_type(array(
            'name'              => 'sub-title-for-report',
            'title'             => __('Sub Title For Report'),
            'description'       => __('A block to display a subtitle for reports.'),
            'render_template'   => 'template-parts/title-for-report.php',
            'category'          => 'applovin',  
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}
add_action('acf/init', 'acf_sub_title_for_reports');



function classic_cta() {

    global $icon_svg;
            
    if (function_exists('classic_cta')) {  
        acf_register_block_type(array(
            'name'              => 'Class-CTA',
            'title'             => __('Classic CTA'),
            'description'       => __('Classic CTA'),
            'render_template'   => 'template-parts/classic-cta-with-logo.php',
            'category'          => 'applovin',  
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}
add_action('acf/init', 'classic_cta');

function cta_products() {
    
    global $icon_svg;
            
    // check function exists
    if( function_exists('cta_products') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Products CTA',
            'title'             => __('Products CTA'),
            'description'       => __('Products CTA'),
            'render_template'   => 'template-parts/company-product-cta.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'cta_products');


function footnotes() {
    
    global $icon_svg;
            
    // check function exists
    if( function_exists('footnotes') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Footnotes',
            'title'             => __('Footnotes'),
            'description'       => __('Footnotes'),
            'render_template'   => 'template-parts/footnotes.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'footnotes');


function codesnipet() {
    
    global $icon_svg;

    // check function exists
    if( function_exists('codesnipet') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'codesnipet',
            'title'             => __('Code Snipet'),
            'description'       => __('Code Snipet'),
            'render_template'   => 'template-parts/code-snipet.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'codesnipet');

function succss_summary() {
    
    global $icon_svg;

            
    // check function exists
    if( function_exists('succss_summary') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Success Summary',
            'title'             => __('Success Summary'),
            'description'       => __('Success Summary'),
            'render_template'   => 'template-parts/simple-paragraphe-summary.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'succss_summary');

function four_with_number() {
    
    global $icon_svg;

    // check function exists
    if( function_exists('four_with_number') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Four numbered Text grid',
            'title'             => __('Four numbered Text grid'),
            'description'       => __('Four numbered Text grid'),
            'render_template'   => 'template-parts/four-grid-w-number.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'four_with_number');


function simple_paragraphe() {
    
    global $icon_svg;

            
    // check function exists
    if( function_exists('simple_paragraphe') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Simple Title Sutitle Paragraphe',
            'title'             => __('Simple Title Subtitle'),
            'description'       => __('Simple Title Subtitle'),
            'render_template'   => 'template-parts/simple-paragraphe.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'simple_paragraphe');

function company_info() {
    
    global $icon_svg;

    // check function exists
    if( function_exists('company_info') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Company Info',
            'title'             => __('Company Info'),
            'description'       => __('Company Info'),
            'render_template'   => 'template-parts/company-info.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'company_info');

function side_img_desc() {
    
    global $icon_svg;

    // check function exists
    if( function_exists('side_img_desc') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Side Image Description',
            'title'             => __('Side Image Description'),
            'description'       => __('Side Image Description'),
            'render_template'   => 'template-parts/side-img-desc.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'side_img_desc');



function go_deeper() {
    
    global $icon_svg;

    // check function exists
    if( function_exists('go_deeper') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Go Deeper Pod',
            'title'             => __('Go Deeper Pod'),
            'description'       => __('Go Deeper Pod'),
            'render_template'   => 'template-parts/go-deeper.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'go_deeper');


function note_with_image() {
    
    global $icon_svg;

            
    // check function exists
    if( function_exists('note_with_image') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Note With an Image',
            'title'             => __('Note With an Image'),
            'description'       => __('Note With an Image'),
            'render_template'   => 'template-parts/not-with-image.php',
            'category'          => 'applovin',
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'note_with_image');


function acf_portrait_youtube() {
    
        global $icon_svg;

    // check function exists
    if( function_exists('acf_portrait_youtube') ) {
        
        // register a portfolio item block
        acf_register_block(array(
            'name'              => 'Youtube Portrait Video',
            'title'             => __('Youtube Portrait Video'),
            'description'       => __('Youtube Portrait Video'),
            'render_template'   => 'template-parts/acf_portrait_youtube.php',
            'category'          => 'applovin', 
            'icon'              => $icon_svg,
            'mode'              => 'preview',
        ));
    }
}

add_action('acf/init', 'acf_portrait_youtube');




function my_drop_scripts() {
    // Check if the current page is not the search results page
    if (!is_search()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('custom-filter', get_template_directory_uri() . '/js/custom-filter.js', array('jquery'), null, true);
        wp_localize_script('custom-filter', 'my_ajax_obj', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('my_nonce'),
        ));
    }
}
add_action('wp_enqueue_scripts', 'my_drop_scripts');

function my_search_scripts() {
    if (is_search()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('search-filters', get_template_directory_uri() . '/js/search-filters.js', array('jquery'), null, true);
        // Add any additional data you want to pass to search-filters.js using wp_localize_script()
    }
}
add_action('wp_enqueue_scripts', 'my_search_scripts');

function get_template_content($template_name, $part_name = null) {
    ob_start();
    get_template_part($template_name, $part_name);
    return ob_get_clean();
}

add_action('wp_ajax_filter_posts', 'filter_posts_function');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts_function');

function filter_posts_function() {
    check_ajax_referer('my_nonce', 'nonce');

    $product_term = isset($_POST['product']) ? sanitize_text_field($_POST['product']) : '';
    $topic_term = isset($_POST['topic']) ? sanitize_text_field($_POST['topic']) : '';
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 12;

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => $posts_per_page,
        'paged'          => $page,
        'post_status'    => 'publish',
        'tax_query'      => array('relation' => 'AND'),
        'meta_query'     => array(
            'relation' => 'AND',
            array(
                'key'     => 'blog_hide',
                'value'   => 'true',
                'compare' => '!='
            )
        ),
    );

    if (!empty($product_term)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'products',
            'field'    => 'slug',
            'terms'    => $product_term
        );
    }

    if (!empty($topic_term)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'topics',
            'field'    => 'slug',
            'terms'    => $topic_term
        );
    }

    $the_query = new WP_Query($args);

    ob_start();

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();

            // Skip posts where the 'blog_hide' or 'is_it_an_external_page' custom field is set to 'true' or 'Yes' respectively
            if (get_post_meta(get_the_ID(), 'blog_hide', true) === 'true') {
                continue;
            }

            $thumb_id = get_post_thumbnail_id();
            $alt = get_post_meta($thumb_id, "_wp_attachment_image_alt", true);
            $image_url = get_the_post_thumbnail_url(null, "thumbnail_768x432");
            $post_type = get_post_type();
                                $ext_link = get_field('ext_link');

            if ($post_type === 'post') {
                $post_type = 'Blog';
            } else {
                $post_type_object = get_post_type_object($post_type);
                $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post';
            }

            $page_language = get_language_attributes(); 

            if (strpos($page_language, 'ko') !== false) {
                $post_day =  get_the_date('M j일, Y');
            } elseif (strpos($page_language, 'ja') !== false) {
                $post_day =  get_the_date('M j日, Y');
            } else {
                $post_day =  get_the_date('M j, Y');
            }

echo "<div class='article' data-post-type='" . esc_attr($post_type) . "'>
    <article class='articles'>
        <a href='" . (!empty($ext_link) ? esc_url($ext_link) : esc_url(get_permalink())) . "' class='' " . (!empty($ext_link) ? "target='_blank'" : "") . ">
            <div class='img-holder index-holder'>
                <picture>
                    <img src='" . esc_url($image_url) . "' alt='" . esc_attr($alt) . "'>
                    <p class='timeCode " . (!empty($ext_link) ? 'timeCode-out' : '') . "'>" . pll__($post_type) . "</p>";

if (!empty($ext_link)) {
    echo "<p class='timeCode'>&#x2197;</p>";
}

echo "          </picture>
            </div>
        </a>
        <div class='text-block'>
            <a href='" . esc_url(get_permalink()) . "'>
                <h3 class='scale-18-18-16'>" . get_the_title() . "</h3>
                <div class='person-detail-block'>
                    <div class='text-holder'>
                        <span class='post-datestamp'><strong>" . $post_day . "</strong></span>
                        
                    </div>
                </div>
            </a>
        </div>
    </article>
</div>";



        }
    } else {
        echo '<p>No posts found matching your criteria.</p>';
    }

    $pagination = paginate_links(array(
        'total'     => $the_query->max_num_pages,
        'current'   => $page,
        'format'    => '?page=%#%',
        'prev_next' => true,
        'prev_text' => __('«'),
        'next_text' => __('»'),
    ));

    $output = ob_get_clean();

    wp_send_json(array(
        'content'    => $output,
        'pagination' => $pagination,
    ));

    wp_reset_postdata();
}






add_action('wp_ajax_filter_posts', 'filter_posts_function');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts_function');

function get_linked_terms_function() {
    check_ajax_referer('my_nonce', 'nonce');

    $selected_term = $_POST['selected_term'];
    $type = $_POST['type'];

    if ($type === 'products') {
        // Fetch topics linked with the selected product
        $args = array(
            'post_type' => 'post', // Adjust if you have a custom post type
            'posts_per_page' => -1, // Retrieve all posts
            'fields' => 'ids', // Retrieve only post IDs to improve performance
            'tax_query' => array(
                array(
                    'taxonomy' => 'products',
                    'field'    => 'slug',
                    'terms'    => $selected_term
                )
            )
        );

        $query = new WP_Query($args);
        $post_ids = $query->posts;

        // Get all topics terms associated with these posts
        $linked_terms = wp_get_object_terms($post_ids, 'topics', array('fields' => 'all'));

        // Format terms for JSON response
        $terms_array = array();
        foreach ($linked_terms as $term) {
            $terms_array[] = array(
                'name' => $term->name,
                'slug' => $term->slug
            );
        }

        echo json_encode($terms_array);
    } elseif ($type === 'topics') {
        // Fetch topics linked with the selected product
        $args = array(
            'post_type' => 'post', // Adjust if you have a custom post type
            'posts_per_page' => -1, // Retrieve all posts
            'fields' => 'ids', // Retrieve only post IDs to improve performance
            'tax_query' => array(
                array(
                    'taxonomy' => 'topics',
                    'field'    => 'slug',
                    'terms'    => $selected_term
                )
            )
        );

        $query = new WP_Query($args);
        $post_ids = $query->posts;

        // Get all topics terms associated with these posts
        $linked_terms = wp_get_object_terms($post_ids, 'products', array('fields' => 'all'));

        // Format terms for JSON response
        $terms_array = array();
        foreach ($linked_terms as $term) {
            $terms_array[] = array(
                'name' => $term->name,
                'slug' => $term->slug
            );
        }

        echo json_encode($terms_array);
    }

    wp_die();
}

add_action('wp_ajax_get_linked_terms', 'get_linked_terms_function');
add_action('wp_ajax_nopriv_get_linked_terms', 'get_linked_terms_function');

function disable_event_post_type_permalink($args, $post_type) {
    if ('event' === $post_type) {
        $args['publicly_queryable'] = false;
        $args['rewrite'] = false;
    }
    return $args;
}
add_filter('register_post_type_args', 'disable_event_post_type_permalink', 10, 2);

function custom_remove_event_permalink($permalink, $post) {
    if ('event' === $post->post_type) {
        return ''; 
    }
    return $permalink;
}
add_filter('post_type_link', 'custom_remove_event_permalink', 10, 2);


function get_related_topics_callback() {
    check_ajax_referer('my_nonce', 'nonce');

    $product_slug = $_POST['product'];
    $related_topics = []; // Array to hold related topics

    // Your logic to fetch related topics based on the product slug
    // For example, querying a custom table or using WordPress taxonomies

    // Populate the $related_topics array with the related topics

    wp_send_json_success($related_topics);
}

add_action('wp_ajax_get_related_topics', 'get_related_topics_callback');
add_action('wp_ajax_nopriv_get_related_topics', 'get_related_topics_callback');

// Similarly, add a function for 'get_related_products'

function fetch_related_products() {
    check_ajax_referer('my_nonce', 'nonce');

    $selected_topic = $_POST['selected_topic'];
    $related_products = [];

    // Assuming 'product' is a custom post type and 'topic' is a taxonomy
    // Modify the query as per your data structure
    $args = array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'topic',
                'field'    => 'slug',
                'terms'    => $selected_topic,
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Assuming the slug of the product is what's needed
            $related_products[] = get_post_field('post_name', get_the_ID());
        }
    }

    wp_reset_postdata();

    echo json_encode($related_products);
    wp_die();
}

add_action('wp_ajax_fetch_related_products', 'fetch_related_products');
add_action('wp_ajax_nopriv_fetch_related_products', 'fetch_related_products');




// For logged-in users
add_action('wp_ajax_filter_posts', 'handle_filter_posts');

// For non-logged-in users
add_action('wp_ajax_nopriv_filter_posts', 'handle_filter_posts');

function handle_filter_posts() {
    // Get parameters from the AJAX request
    $topic = $_GET['topic'];
    $postType = $_GET['postType'];

    // Implement your filtering logic here

    // Don't forget to die() at the end
    wp_die();
}

function modify_search_query($query) {
    if ($query->is_search() && $query->is_main_query()) {
        $query->set('posts_per_page', -1);
    }
}
add_action('pre_get_posts', 'modify_search_query');


function enqueue_this_scripts() {
    wp_enqueue_script('my-live-filter', get_template_directory_uri() . '/js/my-live-filter.js', array('jquery'), '1.0', true);

    // Localize the script with new data
    wp_localize_script('my-live-filter', 'myAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('my_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_this_scripts');


// Enqueue custom stylesheets from scss and tailwind structure, do not make this global yet since this will cause conflicts with the current styles
// function enqueue_audience_plus_styles() {
//     $templates = array('audience-plus.php', 'internship.php', 'jobs.php', 'press.php', 'about.php', 'leadership.php', 'cares.php'); // Add your other templates here

//     if (is_404() || is_page_template($templates)) {
//         wp_enqueue_style('tailwind-style', get_template_directory_uri() . '/tailwind_output.css', array(), '1.0.0', 'all');
//         wp_enqueue_style('scss-style', get_template_directory_uri() . '/dist/css/style.css', array(), '1.0.1', 'all');

// }
// }
// add_action('wp_enqueue_scripts', 'enqueue_audience_plus_styles');


// Ajax Awards Function
function load_more_awards() {
    $paged = $_POST['page'] + 1;

    $args = array(
        'post_type' => 'award',
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'posts_per_page' => 3,
        'paged' => $paged,
    );

    $awards_query = new WP_Query($args);

    if ($awards_query->have_posts()) :
        while ($awards_query->have_posts()) : $awards_query->the_post(); ?>
            <div class="m-auto grid gap-[35px]">
                <a href="<?php echo esc_url(get_field('award_url')); ?>" target="_blank">
                    <img class="max-w-[215px] h-[120px] m-auto" src="<?php echo esc_url(get_field('award_image')); ?>" alt="<?php the_title(); ?>">
                </a>
                <h3 class="text-[18px] text-center">
                    <a href="<?php echo esc_url(get_field('award_url')); ?>" target="_blank">
                        <?php echo esc_html( get_field('award_title') ); ?> 
                    </a>
                </h3>
            </div>
        <?php endwhile;
    endif;

    wp_reset_postdata();

    wp_die();
}
add_action('wp_ajax_load_more_awards', 'load_more_awards');
add_action('wp_ajax_nopriv_load_more_awards', 'load_more_awards');


// Enqueue the script for load more awards
function enqueue_load_more_script() {
    wp_enqueue_script('load-more', get_template_directory_uri() . '/js/load-more.js', array('jquery'), null, true);

    wp_localize_script('load-more', 'load_more_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_script');

// Importing Meta Tags
require_once get_template_directory() . '/inc/meta-tags.php';


// 404 Page Styles
function add_custom_fields_to_rest_api() {
    register_rest_field('leader', 'acf', array(
        'get_callback' => function ($data) {
            return get_fields($data['id']);
        },
        'schema' => null,
    ));
}
add_action('rest_api_init', 'add_custom_fields_to_rest_api');

function add_404_inline_style() {
    if (is_404()) {
        echo '<style>
            .logo-outline {
                fill: #000 !important;
            }

            #header.transparent #mobile-nav-trigger .mobile-nav-icon-inner,
            #header.transparent #mobile-nav-trigger .mobile-nav-icon-inner::before,
            #header.transparent #mobile-nav-trigger .mobile-nav-icon-inner::after {
                background-color: #000!important;
            }
        </style>';
    }
}
add_action('wp_head', 'add_404_inline_style');

// Register Partners Entry Post Type
function register_partners_entry_post_type() {
    $labels = array(
        'name'                  => _x( 'Partners', 'Post Type General Name', 'applovin' ),
        'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'applovin' ),
        'menu_name'             => __( 'Partners', 'applovin' ),
        'name_admin_bar'        => __( 'Partner', 'applovin' ),
        'archives'              => __( 'Partner Archives', 'applovin' ),
        'attributes'            => __( 'Partner Attributes', 'applovin' ),
        'parent_item_colon'     => __( 'Parent Partner:', 'applovin' ),
        'all_items'             => __( 'All Partners', 'applovin' ),
        'add_new_item'          => __( 'Add New Partner', 'applovin' ),
        'add_new'               => __( 'Add New', 'applovin' ),
        'new_item'              => __( 'New Partner', 'applovin' ),
        'edit_item'             => __( 'Edit Partner', 'applovin' ),
        'update_item'           => __( 'Update Partner', 'applovin' ),
        'view_item'             => __( 'View Partner', 'applovin' ),
        'view_items'            => __( 'View Partners', 'applovin' ),
        'search_items'          => __( 'Search Partners', 'applovin' ),
        'not_found'             => __( 'Not found', 'applovin' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'applovin' ),
        'featured_image'        => __( 'Partner Logo', 'applovin' ),
        'set_featured_image'    => __( 'Set partner logo', 'applovin' ),
        'remove_featured_image' => __( 'Remove partner logo', 'applovin' ),
        'use_featured_image'    => __( 'Use as partner logo', 'applovin' ),
        'insert_into_item'      => __( 'Insert into partner', 'applovin' ),
        'uploaded_to_this_item' => __( 'Uploaded to this partner', 'applovin' ),
        'items_list'            => __( 'Partners list', 'applovin' ),
        'items_list_navigation' => __( 'Partners list navigation', 'applovin' ),
        'filter_items_list'     => __( 'Filter partners list', 'applovin' ),
    );
    $args = array(
        'label'                 => __( 'Partner', 'applovin' ),
        'description'           => __( 'Partner entries', 'applovin' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'partners_pods_categories' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'              => true,
        'show_in_menu'         => true,
        'menu_position'        => 5,
        'menu_icon'            => 'dashicons-groups',
        'show_in_admin_bar'    => true,
        'show_in_nav_menus'    => true,
        'can_export'           => true,
        'has_archive'          => false,
        'exclude_from_search'  => false,
        'publicly_queryable'   => true,
        'capability_type'      => 'post',
    );
    register_post_type( 'partners_entry', $args );
}
add_action( 'init', 'register_partners_entry_post_type' );

// Register Partners Categories Taxonomy
function register_partners_categories_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Partner Categories', 'Taxonomy General Name', 'applovin' ),
        'singular_name'              => _x( 'Partner Category', 'Taxonomy Singular Name', 'applovin' ),
        'menu_name'                  => __( 'Partner Categories', 'applovin' ),
        'all_items'                  => __( 'All Categories', 'applovin' ),
        'parent_item'                => __( 'Parent Category', 'applovin' ),
        'parent_item_colon'          => __( 'Parent Category:', 'applovin' ),
        'new_item_name'              => __( 'New Category Name', 'applovin' ),
        'add_new_item'               => __( 'Add New Category', 'applovin' ),
        'edit_item'                  => __( 'Edit Category', 'applovin' ),
        'update_item'                => __( 'Update Category', 'applovin' ),
        'view_item'                  => __( 'View Category', 'applovin' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'applovin' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'applovin' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'applovin' ),
        'popular_items'              => __( 'Popular Categories', 'applovin' ),
        'search_items'               => __( 'Search Categories', 'applovin' ),
        'not_found'                  => __( 'Not Found', 'applovin' ),
        'no_terms'                   => __( 'No categories', 'applovin' ),
        'items_list'                 => __( 'Categories list', 'applovin' ),
        'items_list_navigation'      => __( 'Categories list navigation', 'applovin' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'partners_pods_categories', array( 'partners_entry' ), $args );
}
add_action( 'init', 'register_partners_categories_taxonomy' );