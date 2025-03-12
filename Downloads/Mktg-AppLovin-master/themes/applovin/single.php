<?php get_header(); ?>
<?php 
if ( pll_current_language('slug') != 'ja' ) {       
$twitter = 'AppLovin';
} else {            
$twitter = 'AppLovin_JP';
};
global $post;

?>      

<?php $page_language = get_language_attributes(); ?>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
   function addTwitterFeedAndShareButtons() {
   
   // twitter widget setup
   
     twttr.widgets.createTimeline(
     {
       sourceType: 'profile',
       screenName: '<?=$twitter?>'
     },
     document.getElementById('twitter-feed-wrap')
   );
   
   // addthis buttons setup
   
   var addthisScript = document.createElement("script");
   addthisScript.src = "https://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502baf1c470dc886";
   addthisScript.type = "text/javascript";
   addthisScript.onload = function() {
       document.getElementById('mobile-share').style.display = 'block';
       document.getElementById('footer-share').style.display = 'block';
   }
   
   document.getElementsByTagName("head")[0].appendChild(addthisScript);
   
   }
      
window.onload = function() {
   addTwitterFeedAndShareButtons();
};
   
</script>           

<!-- preload twitter JS functions -->

    <?php while ( have_posts() ) : the_post(); 

    $terms = get_the_terms( get_the_ID(), 'topics' );

    if (!empty($terms) && !is_wp_error($terms)) {
        $term_names = array();

        foreach ($terms as $term) {
            $term_names[] = $term->name;
        }

        $terms_string = implode(', ', $term_names);
    ?>

    <section class="latest-articles-block header-b-article">
        <div class="container track">
            <div class="inner-wrap inner-wrap-1000">
                <div id="content" class="header-article">
                    <div class="content-holder">
                        <p class="fixed-12 termspost"><?php echo $terms_string; ?></p>
                            <?php if( has_term( '', 'category' ) ) : ?>
                                <span class="title"><?php the_category( ', ' ); ?></span>
                            <?php endif; ?>
                            <h1 class="scale-36-30-24"><?php the_title(); ?></h1>
                            <div class="speack-share">
                            <div class="person-detail-block">
                                <div class="img-block">
                                    <a class="fixed-16" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
                                        <picture>
                                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 140 ); ?>
                                        </picture>
                                    </a>
                                </div>
                                <div class="text-holder">
                                    <span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></strong>
                                        <br/>
                                        <span class="fixed-16"> <?php
                                                    if (strpos($page_language, 'ko') !== false) {
                                                        echo get_the_date('M j일, Y');
                                                    } elseif(strpos($page_language, 'ja') !== false) {
                                                        echo get_the_date('M j日, Y');
                                                    }else{
                                                        echo get_the_date('M j, Y');
                                                    }
                                                    ?></span></span>
                                </div>
                            </div>
                            <div id="mobile-share">
                                <div class="addthis_toolbox">
                                    <?php echo do_shortcode('[social_share]') ?>
                                </div>
                            </div>


                        </div>
                                <?php if( has_post_thumbnail() ) : ?>
                                <div class="img-holder">
                                    <picture>
                                        <?php
                                            $thumb_id = get_post_thumbnail_id( get_the_ID() );
                                            $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
                                            $image_src = wp_get_attachment_image_src( $thumb_id, 'full' );  
                                            $post_type = get_post_type();                                       
                                        ?>
                                        <img src="<?php echo $image_src[0]; ?>" alt="<?php echo $alt; ?>">
                                    </picture>
                                    <?php 
$thumbnail_excerpt = get_post(get_post_thumbnail_id())->post_excerpt;
if (!empty($thumbnail_excerpt)) : ?>
    <small class="featured-caption"><?php echo $thumbnail_excerpt; ?></small>
<?php endif; ?>                                </div>
                            </div>
                        </div>
                    </div>
                                            </div>
                    </div>
                            <?php endif; ?>
                                                <div class="content-article">
                                                                    <div class="inner-wrap inner-wrap-1200">
                                                                    <div class="inside-c">

                            <?php the_content(); ?>
                        </div>
                        </div>
                            </div>

                            <?php wp_link_pages(); ?>
                            <?php edit_post_link( __( 'Edit', 'applovin' ) ); ?>
                            <?php if( has_term( '', 'post_tag' ) ) : ?>
                                <div class="tags-list-block">
                                    <strong class="title"><?php _e( 'Tags:', 'applovin' ); ?></strong>
                                    <ul>
                                        <?php the_tags( __( '<li>', 'applovin' ), ",</li>\n<li>", '</li>' ); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>


                        </div>


                    </div>
                </div>
            </div>
        </section>

    <?php
    // Get the ID of the RC Home Page, where the Top Picks fields are set

    $rc_home_id = "32709"; // EN/default RC home page ID
    if ( pll_current_language('slug') == 'ja' ) { // for JA
    $rc_home_id = "32766";
    } else if ( pll_current_language('slug') == 'ko' ){ // for KO
    $rc_home_id = "32767";
    }

    if( $related_posts = get_field( "rc_top_picks",  $rc_home_id) ) : // pull field from RC Home Page, based on ID; ID varies by locale ?>
            <div class="articles-block top-block">
                <div class="container inner-wrap inner-wrap-1200">
                    <h2 class="scale-36-30-24"><span><?php pll_e('Top Picks'); ?></span></h2>
                    <div class="three-cols">
                  <?php foreach( $related_posts as $post ) : ?>
                            <?php setup_postdata( $post ); ?>
                     <div class="col">
                        <article class="article <?php echo get_post_type(get_the_ID()); ?>">
                              <div class="img-holder">
                                 <a href="<?php the_permalink(); ?>" target="_blank">
                                    <picture>
                                       <?php                   
                                        $main_id =  get_the_ID();

                                          $thumb_id = get_post_thumbnail_id( get_the_ID() );
                                          $alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
                                          $image_src = wp_get_attachment_image_src( $thumb_id, 'thumbnail_768x432' );
                                          $imgsuccess = get_field( 'pod_bg_art',    $thumb_id );
                                          $post_s = get_post_type($thumb_id);
                                           $bg_teasertest = get_field( 'teaser_text', $main_id);
                                             $post_type = get_post_type(get_the_ID());
                                             $acceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

$current_language = substr($acceptLanguage, 0, 2);
                                           if ($post_type === 'post') {
                                               $post_type = 'Blog'; // Replace 'post' with 'Blog'
                                                  }elseif ($post_type === 'video') {
    $min = get_field('timecodevideo', $main_id );  
     $post_type = "$min MIN"; 
                                           }else{
                                                                                 
                                           $post_type_object = get_post_type_object(get_post_type(get_the_ID()));
                                           $post_type = $post_type_object ? $post_type_object->labels->singular_name : 'Post'; // Get a more descriptive post type name
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
                            }elseif ($post_s == 'page'){
echo $featured_img_url;
                            } else {?>
<?php the_field('pod_bg_art'); ?><?php the_field('video_thumbnail'); ?>" alt="<?php echo $alt; ?>
                           <?php }
                            ?>">
                                           <p class='timeCode'><?php echo  pll_e($post_type)  ?></p>
                                    </picture>
                                 </a>
                              </div>
                           <div class="text-block">
                              <div class="title-heading-holder">
                                 <?php if( has_term( '', 'category' ) ) : ?>
                                    <span class="title"><?php the_category( ', ' ); ?></span>
                                 <?php endif; ?>
                                 <h2><a href="<?php the_permalink(); ?>">
                        <?php if( $post_s == 'success_story_pod' ||  $post_type == 'Success Stories') { ?>
                     <?php echo $bg_teasertest; ?>
                        <?php }else { ?>
                           <?php the_title(); ?>
                        <?php } ?>
                              </a></h2>
                              </div>
                              <div class="person-detail-block">

                                 <div class="text-holder">
                                    <span class="post-datestamp"><strong class="fixed-12">                                                   <?php
                                                    if (strpos($page_language, 'ko') !== false) {
                                                        echo get_the_date('M j일, Y');
                                                    } elseif(strpos($page_language, 'ja') !== false) {
                                                        echo get_the_date('M j日, Y');
                                                    }else{
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
    <?php
    }; endwhile; ?>

<?php include('template-parts/slide-ojoective.php'); ?>
<?php get_template_part('template-modules/email-signup');?>


</div>

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