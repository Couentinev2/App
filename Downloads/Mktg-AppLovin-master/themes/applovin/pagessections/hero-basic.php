<div class="hero !p-0" style="background-image: url('<?php the_field('hero_image'); ?>'),url('<?php the_field('hero_blur'); ?>') ;">
  <div class="wrapper !pt-[120px] !pb-[80px] md:!py-[120px] lg:!py-[140px]">
    <div class="grid gap-[40px lg:gap-[60px] grid-cols-1 grid-rows-2 lg:grid-rows-1 lg:grid-cols-2">
      <div class="grid gap-[40px] md:gap-[42px] m-auto lg:my-auto lg:ml-0 max-w-[520px] pb-[20px] lg:pb-0">
        <div class="grid gap-[8px] md:gap-[12px] lg:gap-[15px]">
          <div class="avenir-black label-14 uppercase !tracking-[1px] text-center lg:text-left text-black"> <?php the_field('page_title'); ?></div>
          <h1 class="text-center lg:text-left text-black !m-0"><?php the_field('hero_title'); ?></h1>
          <p class="scale-21-21-18 text-center lg:text-left !m-0 text-black"><?php the_field('hero_text'); ?></p>
        </div>

        <div class="primary-slate-btn m-auto lg:m-0">
          <a class="scale-21-21-18" href="<?php the_field('cta_url'); ?>" target="_blank">
            <span><?php the_field('hero_cta'); ?></span>
          </a>
        </div>
      </div>

      <div>
        <div class="hero-image"></div>
      </div>

    </div>
  </div>
</div>