<?php 
// Detect the language attribute
$langDetect = get_language_attributes(); 
$isChinese = strpos($langDetect, 'zh-CN') !== false; // Check if language contains 'zh-CN'
?>

<div class="single-section">
    <div class="inner-wrap-1200">
        <div class="single-grid single-one">
            <div class="div1-single grid-image">
                <div class="single-image">
                    <div class="div2-video grid-text">

                        <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                            <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">

                                <!-- Check if language is Chinese and append the 'zh-CN' subtitle query -->
                                <iframe 
                                    src="https://fast.wistia.net/embed/iframe/<?php the_field('video_simple_id'); ?>?seo=true&videoFoam=true<?php echo $isChinese ? '&captionsLang=zh-CN' : ''; ?>" 
                                    title="<?php the_field('video_simple_id'); ?>" 
                                    allow="autoplay; fullscreen" 
                                    allowtransparency="true" 
                                    frameborder="0" 
                                    scrolling="no" 
                                    class="wistia_embed" 
                                    name="wistia_embed" 
                                    msallowfullscreen 
                                    width="100%" 
                                    height="100%">
                                </iframe>

                            </div>
                        </div>
                        <script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>

                    </div>
                </div>
            </div>

    <div class="div2-single grid-text">
     <h1 class="scale-36-30-24">
        <?php the_field('simple_title_first'); ?>
      </h1>
      <p class="scale-21-21-18">
        <?php the_field('simple_text_first'); ?>
      </p>
    </div>
        </div>
  </div>
</div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js">
        </script>
        <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
        <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
        jQuery(document).ready(function(){
            jQuery('.cta-pop-form').magnificPopup({
                type:'inline',
                midClick: true 
            });
        });
        </script>