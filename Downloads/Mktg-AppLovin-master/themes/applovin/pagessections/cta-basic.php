<div class="row cta 
<?php if (get_field('cta_style') == 'dark') : ?>
 cta-dark
<?php endif; ?>
 ">

  <div class="m-auto text-center max-w-[800px] grid gap-[40px]">
    <div class="grid gap-[8px] md:gap-[12px] lg:gap-[15px]">
      <h3 class="scale-36-30-24 m-auto"><?php the_field('footer_cta_headline'); ?></h3>
      <p class="scale-21-21-18 m-0"><?php the_field('footer_cta_text'); ?></p>
    </div>

    <!-- Button Start -->
    <div class="primary-gradient-btn m-auto">
      <a class="scale-21-21-18" href="<?php the_field('cta_url'); ?>"><span><?php pll_e('Start growing'); ?></span></a>
    </div>
    <!-- Button End -->
  </div>

</div>