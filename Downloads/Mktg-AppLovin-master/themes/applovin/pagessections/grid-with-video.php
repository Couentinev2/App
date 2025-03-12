      <div class="video-section">
      <div class="inner-wrap-1200">

    <div class="video-grid video-one">
     <div class="div1-video grid-image">
            <h1 class="scale-36-30-24">
        <?php the_field('video_title_first'); ?>
      </h1>
      <p class="scale-21-21-18" style="margin-bottom: 0;">
        <?php the_field('video_text_first'); ?>
      </p>
          
 
    </div>
    <div class="div2-video grid-text">

    <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
    <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
        <iframe src="https://fast.wistia.net/embed/iframe/<?php the_field('video_header_id'); ?>?seo=true&videoFoam=true" 
                title="<?php the_field('video_header_id'); ?>" 
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
<!--
    <div class="repeater-video-grid">
     <div class="div1-text">

      <p class="scale-24-21-18">
        <?php the_field('rep_video_text'); ?>
      </p>
          
 
    </div>
    <div class="div2-video">
  <?php if( have_rows('result_video_part') ): ?>
        <?php while( have_rows('result_video_part') ): the_row(); ?>
            <div class="description-result-video">
            <h2 class="scale-32-24-21"><?php the_sub_field('result_video_part_title'); ?></h2>
            <p class="scale-18-18-16"><?php the_sub_field('result_video_part_mini_text'); ?></p>
    </div>
            <?php endwhile; ?>
    <?php endif; ?>
        </div>



  </div> -->
</div>
</div>



<script src="{url}"></script>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  var videoPlayer = new Vimeo.Player('myVideo');
  videoPlayer.on('play', function() {
    console.log('Played the video');
  });
</script>