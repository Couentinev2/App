<div class="row cta 
<?php if (get_field('cta_style') == 'dark') : ?>
 cta-dark
<?php endif; ?>
 ">
  <div class="inner-wrap inner-wrap-600">
    <img class="cta-logo" src="<?php the_field('cta_logo'); ?>" alt="<?php the_field('cta_partner'); ?>" />

    <h3 class="scale-36-30-24 mb-[40px] avenir-black"><?php the_field('footer_cta_headline'); ?></h3>

    <div class="primary-gradient-btn m-auto">
      <a class="scale-21-21-18 avenier-black" href="<?php the_field('cta_url'); ?>" target="_blank">
        <span><?php the_field('btn_cta_text'); ?></span>
      </a>
    </div>

  </div>
</div>