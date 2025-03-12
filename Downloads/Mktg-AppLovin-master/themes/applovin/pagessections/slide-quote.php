      <div class="slide-quote-section" style="background-image: url('/wp-content/themes/applovin/images/img_sparklabs_reel_withgradient2.png');background-repeat: no-repeat;
background-size: 1600px;
background-position: top center;">
      <div class="inner-wrap-1200">
        <div class="text-intro-slide">
                              <p class="fixed-14"><strong><?php the_field('section_title_part'); ?></strong></p>
          <h2 class="scale-50-40-28"><?php the_field('main_title_slide_quote'); ?></h2>

                            <img class="sub-logo" src="<?php the_field('sub_logo'); ?>" alt="<?php the_field('sub_partner'); ?>" />

          <p class="scale-21-21-18"><?php the_field('main_text_slide_quote'); ?></p>
        </div>
        <div class="repeter-improve">
          <?php if( have_rows('solution_improve') ): ?> 
                <?php while( have_rows('solution_improve') ): the_row();?>
         <div class="solution-improve-repeater">    
          <h2 class="scale-18-18-16"><?php the_sub_field('solution_improve_title'); ?></h2>

          <p class="scale-18-18-16"><?php the_sub_field('solution_improve_text'); ?></p>
          </div>    
          <?php endwhile; ?>
              <?php endif; ?>

    </div>
<div class="testimonials-wrap">
        <div class="inner-wrap inner-wrap-1000  hz-scrollable">
<div class="testimonials-panel tabs-3">
  <div class="quote-main-panel-wrap">
    <div class="quote-main-panel">
        <?php if( have_rows('testimonials') ): ?>
        <?php $count = 0; ?>
          <?php while( have_rows('testimonials') ): the_row(); ?>
          <?php $count += 1; ?>
          <div class="quote-slide slide-<?php echo $count; if ($count=='1'): echo ' active'; endif; ?>">
            <div class="slide-top">
            <span class="quote-mark" style="color:<?php the_sub_field('theme_color'); ?>;">“</span>
            <p class="quote-copy scale-24-21-18"><?php the_sub_field('quote'); ?></p>
            </div>
            <div class="slide-bottom">
            <p class="quote-name"><strong><?php the_sub_field('name'); ?></strong></p>
            <p class="quote-title fixed-14"><?php the_sub_field('title'); ?></p>
            </div>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>
    </div>
    </div>
        <?php if( have_rows('testimonials') ): ?>
        <?php $count = 0; ?>
          <?php while( have_rows('testimonials') ): the_row(); ?>
          <?php $count += 1; ?>
              <div class="logo-tab tab-<?php echo $count; if ($count=='1'): echo ' active'; endif; ?>"><img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('partner'); ?>" onclick="cycleQuote(<?php echo $count; ?>);" /></div>
        <?php endwhile; ?>
      <?php endif; ?>
</div>


</div>
  </div>

        <a href="../../sparklabs/" class="promo-link scale-18-18-16" style="text-align: center;"><?php the_field('promo_link_text_app'); ?></a>
  </div>
</div>
<div class="testimonials-panel-mobile" id="testimonials-panel-mobile">
    <?php if( have_rows('testimonials') ): ?>
        <?php while( have_rows('testimonials') ): the_row(); ?>
      <div class="quote-main-panel-wrap">
        <div class="quote-main-panel">
        <div class="quote-slide">
          <div class="slide-top">
            <span class="quote-mark" style="color:<?php the_sub_field('theme_color'); ?>;">“</span>
          <p class="quote-copy scale-24-21-18"><?php the_sub_field('quote'); ?></p>
        </div>
        <div class="slide-bottom">
        <p class="quote-name"><strong><?php the_sub_field('name'); ?></strong></p>
        <p class="quote-title fixed-14"><?php the_sub_field('title'); ?></p>
        <img class="quote-logo" src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('partner'); ?>" />
        </div>
      </div>
      </div>
      </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>