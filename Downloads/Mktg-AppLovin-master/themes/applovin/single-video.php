<?php
/*
 * Template Name: Video Page
 * Template Post Type: post
 */
?>
<?php get_header(); ?>

<script>
   function addShareButtons() {
      // AddThis buttons setup
      var addthisScript = document.createElement("script");
      addthisScript.src = "https://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-502baf1c470dc886";
      addthisScript.type = "text/javascript";
      document.getElementsByTagName("head")[0].appendChild(addthisScript);
   }

   window.onload = function() {
      addShareButtons();
   };
</script>

<div class="contentPage">

   <?php if ('yes' == get_field('cta_option')): ?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
      <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

      <script>
         jQuery(document).ready(function() {
            jQuery('.cta-pop-form').magnificPopup({
               type: 'inline',
               midClick: true
            });
         });
      </script>
   <?php endif; ?>

   <?php
      $str = get_field('video_link');
      if (str_contains($str, 'embed')) {
         $strlong = explode("/", $str);
         $codevideo = $strlong[4];
      } else {
         $strlong = explode("=", $str);
         if (str_contains($strlong[1], '&')) {
            $strlong = explode("&", $strlong[1]);
            $codevideo = $strlong[0];
         } else {
            $codevideo = $strlong[1];
         }
      }

      $idfeat = get_the_ID();
      $taxoname = [];
      $parent_name = '';
      $namemain = '';
      foreach (get_the_terms($idfeat, 'video_categories') as $ct) {
         $cy = get_term($ct);
         $taxoname[] = $cy->slug;
         $namemain = $cy->name;
         $parent_term = $cy->parent;
         if ($parent_term) {
            $parent_name = get_term($parent_term)->name;
         }

         echo '<!-- parent = ' . esc_html($parent_term) . ' -->';
      }
   ?>

   <div id="page-video-single" class="individual" style="">
      <div class="illo-slider-parent inner-wrap">
         <div class="slider-sibling content-column">
            <div class="row hero">
               <div class="content-intro">
                  <div class="single-back">
                     <a class="fixed-14" href="../">VIDEO LIBRARY</a>
                     <?php if (!empty($parent_name)): ?>
                        <p class="subname_cat fixed-14"><?php echo esc_html($parent_name); ?> / <?php echo esc_html($namemain); ?></p>
                     <?php else: ?>
                        <p class="fixed-14"><?php echo esc_html($namemain); ?></p>
                     <?php endif; ?>
                  </div>

                  <div class="single-title-video">
                     <h1 class="scale-50-40-28"><?php echo esc_html(get_field('video_title')); ?></h1>
                  </div>

                  <div class="video-section">
                     <iframe
                        width="100%"
                        height="auto"
                        src="https://www.youtube.com/embed/<?php echo esc_html($codevideo); ?>?autoplay=1&rel=0&enablejsapi=1"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                     </iframe>
                  </div>

                  <div class="single-decription">
                     <p class="scale-21-21-18"><?php echo esc_html(get_field('short_description')); ?></p>
                     <div class="share-block" id="footer-share">
                        <div class="addthis_toolbox footer-share">
                           <div class="custom_images">
                              <a class="" id="tweetButton" href="">
                                 <img
                                    src="<?php echo esc_url(get_template_directory_uri()); ?>/images/logo-social-x-blue.svg"
                                    width="50"
                                    height="50"
                                    border="0"
                                    alt="Share on X"
                                 />
                              </a>
                              <a class="" id="fbButton" href="">
                                 <img
                                    src="<?php echo esc_url(get_template_directory_uri()); ?>/images/facebook.svg"
                                    width="50"
                                    height="50"
                                    border="0"
                                    alt="Share on Facebook"
                                 />
                              </a>
                              <a class="" id="linkedinShareButton" href="">
                                 <img
                                    src="<?php echo esc_url(get_template_directory_uri()); ?>/images/linkedin-blue.svg"
                                    width="50"
                                    height="50"
                                    border="0"
                                    alt="Share on LinkedIn"
                                 />
                              </a>
                              <a class="" id="copyButton" href="">
                                 <img
                                    src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Frame.svg"
                                    width="50"
                                    height="50"
                                    border="0"
                                    alt="Copy link to this page"
                                 />
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="playlist inner-wrap-video-playlist">
         <div class="section-title inner-wrap inner-wrap-1200 inner-wrap-max-right">
            <h4 class="scale-24-21-18 related">Related Videos</h4>
         </div>
         <div class="video-cards-wrap hz-scrollable">
            <?php
               $args = array(
                  'post_type' => 'video',
                  'posts_per_page' => -1
               );
               $loop = new WP_Query($args);
               while ($loop->have_posts()): $loop->the_post();
                  $post_id = get_the_ID();

                  foreach (get_the_terms($post_id, 'video_categories') as $ct) {
                     $cy = get_term($ct);
                     $name = $cy->name;
                     if ($name == $namemain && $post_id != $idfeat) {
                        echo '<a class="video-card-link-wrap display ' . esc_attr($cy->slug) . '" href="' . esc_url(get_permalink()) . '">
                                 <div class="video-card">
                                    <div class="video-card-art">
                                       <img
                                          class="video-overview-image"
                                          src="' . esc_url(get_field('video_thumbnail')) . '"
                                          alt=""
                                       />
                                       <p class="timeCode">' . esc_html(get_field('timecodevideo', $post_id)) . ' MIN</p>
                                    </div>
                                    <div class="video-card-content">
                                       <div class="card-content">
                                          <h5 class="scale-18-18-16">' . esc_html(get_field('video_title', $post_id)) . '</h5>
                                       </div>
                                    </div>
                                 </div>
                              </a>';
                     }
                  }
               endwhile;
               wp_reset_postdata();
            ?>
         </div>
      </div>
   </div>

   <div class="video-category solo-page">
      <div class="inner-wrap inner-wrap-1200">
         <h2 class="scale-32-24-21 category-title-series"><?php echo esc_html(pll__('Browse by Categories')); ?></h2>
      </div>
      <div class="video-category-series-wrap">
         <?php
            $video_categories = get_terms(array('taxonomy' => 'video-categories', 'hide_empty' => false));
            foreach ($video_categories as $video_categorie):
         ?>
            <a
               class="video_categories <?php echo esc_attr($video_categorie->slug); ?>"
               data-value-product="<?php echo esc_attr($video_categorie->slug); ?>"
               href="<?php echo esc_url(get_term_link($video_categorie)); ?>">
               <h3><?php echo esc_html($video_categorie->name); ?></h3>
            </a>
         <?php endforeach; ?>
      </div>
   </div>

   <div class="row cta">
      <div class="inner-wrap inner-wrap-600">
         <h2 class="scale-36-30-24">
            <?php echo esc_html(get_field('cta_title', 26538)); ?>
         </h2>
         <p class="scale-21-21-18">
            <?php echo esc_html(get_field('cta_text', 26538)); ?>
         </p>
         <a class="cta-btn-standard scale-21-21-18" href="<?php echo esc_url(get_field('cta_button_link', 26538)); ?>">
            <?php echo esc_html(get_field('cta_button_text', 26538)); ?>
         </a>
      </div>
   </div>
</div>

<script type="text/javascript">
   jQuery(document).ready(function() {
      jQuery("#copyButton").on("click", function() {
         navigator.clipboard.writeText(window.location.href)
         .then(function() {
            alert('URL Copied');
         })
         .catch(function(error) {
            alert('Error in copying URL to clipboard');
         });
      });
   });
</script>

<script type="text/javascript">
   jQuery(document).ready(function() {
      jQuery('#linkedinShareButton').on('click', function() {
         var currentUrl = window.location.href;
         var title = document.title;
         var summary = "";
         var source = "";

         var linkedInUrl = "https://www.linkedin.com/shareArticle?mini=true&url="
            + encodeURIComponent(currentUrl)
            + "&title=" + encodeURIComponent(title)
            + "&summary=" + encodeURIComponent(summary)
            + "&source=" + encodeURIComponent(source);

         window.open(linkedInUrl, '_blank');
      });
   });
</script>

<script type="text/javascript">
   jQuery(document).ready(function() {
      jQuery('#tweetButton').on('click', function() {
         var currentUrl = window.location.href;
         var tweetText = document.title;

         var twitterUrl = "https://twitter.com/intent/tweet?text="
            + encodeURIComponent(tweetText)
            + "&url=" + encodeURIComponent(currentUrl);

         window.open(twitterUrl, '_blank');
      });
   });
</script>

<script type="text/javascript">
   jQuery(document).ready(function() {
      jQuery('#fbButton').on('click', function() {
         var currentUrl = window.location.href;
         var fbUrl = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(currentUrl);
         window.open(fbUrl, '_blank');
      });
   });
</script>

<?php get_template_part('template-modules/email-signup'); ?>
<?php get_footer(); ?>
