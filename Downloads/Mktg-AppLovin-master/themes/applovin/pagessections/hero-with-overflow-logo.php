<div class="hero-center row" style="background-image: url('<?php the_field('hero_main_image'); ?>'),url('<?php the_field('hero_secondary_image'); ?>') ;">
  <div class="inner-wrap inner-wrap-1200">
    <div class="hero-div1">
      <img src="<?php the_field('hero_logo'); ?>" alt="AppDiscovery Logo">
      <h1 class="scale-60-50-32"><?php the_field('hero_title'); ?></h1>
      <p class="scale-21-21-18">
        <?php the_field('hero_text'); ?>
      </p>

      <div class="primary-slate-btn m-auto">
          <a class="scale-21-21-18 avenier-black" href="<?php the_field('cta_url'); ?>" target="_blank"> 
              <span><?php the_field('hero_cta'); ?></span>
          </a>
      </div>

    </div>
  </div>
  <div class="hero-portait-wrap hero-portait-first"><img class="hero-portait hero-portait-one" src="<?php the_field('hero_portait_one'); ?>" alt="Portait" /></div>
  <div class="hero-portait-wrap hero-portait-second"> <img class="hero-portait hero-portait-two" src="<?php the_field('hero_portait_two'); ?>" alt="Portait" /></div>
  <div class="hero-portait-wrap hero-portait-third"> <img class="hero-portait hero-portait-three" src="<?php the_field('hero_portait_three'); ?>" alt="Portait" /></div>
  <div class="hero-portait-wrap hero-portait-forth"> <img class="hero-portait hero-portait-four" src="<?php the_field('hero_portait_four'); ?>" alt="Portait" /></div>
</div>

<div class="overflow-img">
  <img src="<?php the_field('hero_overflow_img'); ?>" alt="" />
</div>