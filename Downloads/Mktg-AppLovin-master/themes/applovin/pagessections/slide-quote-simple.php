<div class="slide-quote-simple">
  <h3 class="scale-24-21-18 text-center mb-[40px] avenir-black"><?php the_field('slide_quote_title'); ?></h3>
  <div class="testimonials-wrap">
    <div class="inner-wrap inner-wrap-1000  hz-scrollable">
      <div class="testimonials-panel tabs-3">
        <div class="quote-main-panel-wrap">
          <div class="quote-main-panel">
            <?php if (have_rows('testimonials')): ?>
              <?php $count = 0; ?>
              <?php while (have_rows('testimonials')): the_row(); ?>
                <?php $count += 1; ?>
                <div class="quote-slideb slide-<?php echo $count;
                                                if ($count == '1'): echo ' active';
                                                endif; ?>">
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
        <?php if (have_rows('testimonials')): ?>
          <?php $countb = 0; ?>
          <?php while (have_rows('testimonials')): the_row(); ?>
            <?php $countb += 1; ?>
            <div class="logo-tabb tab-<?php echo $countb;
                                      if ($countb == '1'): echo ' active';
                                      endif; ?>"><img src="<?php the_sub_field('logo'); ?>" alt="<?php the_sub_field('partner'); ?>" onclick="cycleQuoteBis(<?php echo $countb; ?>);" /></div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>


    </div>
  </div>
</div>

<div class="testimonials-panel-mobile  hz-scrollable">
  <?php if (have_rows('testimonials')): ?>
    <?php while (have_rows('testimonials')): the_row(); ?>
      <div class="quote-main-panel-wrap">
        <div class="quote-main-panel">
          <div class="quote-slide quote-mobile">
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