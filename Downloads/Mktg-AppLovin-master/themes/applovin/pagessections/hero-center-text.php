<div class="hero-center row" style="background-image: url('<?php the_field('hero_center_image'); ?>'),url('<?php the_field('hero_center_blur'); ?>') ;">
  <div class="inner-wrap inner-wrap-1200">
    <div class="hero-div1">
      <img src="<?php the_field('hero_logo'); ?>" alt="Max Logo">
      <h1 class="scale-60-50-32">
        <?php the_field('hero_title'); ?>
      </h1>
      <p class="scale-21-21-18">
        <?php the_field('hero_text'); ?>
      </p>

      <div class="primary-white-btn m-auto">
        <a class="scale-21-21-18" href="<?php the_field('cta_url'); ?>" target="_blank">
          <span><?php the_field('hero_cta'); ?></span>
        </a>
      </div>
    </div>

    <div class="hero-div2">
      <div class="hero-grid-1">
        <p class="hr-minititle fixed-12"><?php the_field('hero_minititleone'); ?></p>
        <ul>
          <?php if (have_rows('hero_mini_link_one')): ?>
            <?php while (have_rows('hero_mini_link_one')): the_row(); ?>

              <li class="scale-18-18-16"><a class="scale-18-18-16" href="#<?php the_sub_field('hero_mini_link_one'); ?>"><?php the_sub_field('hero_mini_text_one'); ?></a></li>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="hero-grid-2">
        <p class="hr-minititle fixed-12"><?php the_field('hero_minititletwo'); ?></p>
        <ul>
          <?php if (have_rows('hero_mini_link_two')): ?>
            <?php while (have_rows('hero_mini_link_two')): the_row(); ?>

              <li class="scale-18-18-16"><a class="scale-18-18-16" href="#<?php the_sub_field('hero_mini_link_two'); ?>"><?php the_sub_field('hero_mini_text_two'); ?></a></li>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="hero-grid-3">
        <p class="hr-minititle fixed-12"><?php the_field('hero_minititlethree'); ?></p>
        <ul>
          <?php if (have_rows('hero_mini_link_three')): ?>
            <?php while (have_rows('hero_mini_link_three')): the_row(); ?>

              <li class="scale-18-18-16"><a class="scale-18-18-16" href="#<?php the_sub_field('hero_mini_link_three'); ?>"><?php the_sub_field('hero_mini_text_three'); ?></a></li>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
      <div class="hero-grid-4">
        <p class="hr-minititle fixed-12"><?php the_field('hero_minititlefour'); ?></p>
        <ul>
          <?php if (have_rows('hero_mini_link_four')): ?>
            <?php while (have_rows('hero_mini_link_four')): the_row(); ?>

              <li class="scale-18-18-16"><a class="scale-18-18-16" href="#<?php the_sub_field('hero_mini_link_four'); ?>"><?php the_sub_field('hero_mini_text_four'); ?></a></li>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</div>



<nav id="max-nav-panel">
  <div class="menus-inner">
    <div class="menu">
      <h6 class="nav-submenu"><?php the_field('hero_minititleone'); ?></h6>
      <ul>
        <?php if (have_rows('hero_mini_link_one')): ?>
          <?php while (have_rows('hero_mini_link_one')): the_row(); ?>

            <li class=""><a class="" href="#<?php the_sub_field('hero_mini_link_one'); ?>"><?php the_sub_field('hero_mini_text_one'); ?></a></li>
          <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
    <div class="menu">
      <h6 class="nav-submenu"><?php the_field('hero_minititletwo'); ?></h6>
      <ul>
        <?php if (have_rows('hero_mini_link_two')): ?>
          <?php while (have_rows('hero_mini_link_two')): the_row(); ?>

            <li class=""><a class="" href="#<?php the_sub_field('hero_mini_link_two'); ?>"><?php the_sub_field('hero_mini_text_two'); ?></a></li>
          <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
    <div class="menu">
      <h6 class="nav-submenu"><?php the_field('hero_minititlethree'); ?></h6>
      <ul>
        <?php if (have_rows('hero_mini_link_three')): ?>
          <?php while (have_rows('hero_mini_link_three')): the_row(); ?>

            <li class=""><a class="" href="#<?php the_sub_field('hero_mini_link_three'); ?>"><?php the_sub_field('hero_mini_text_three'); ?></a></li>
          <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
    <div class="menu">
      <h6 class="nav-submenu"><?php the_field('hero_minititlefour'); ?></h6>
      <ul>
        <?php if (have_rows('hero_mini_link_four')): ?>
          <?php while (have_rows('hero_mini_link_four')): the_row(); ?>

            <li class=""><a class="" href="#<?php the_sub_field('hero_mini_link_four'); ?>"><?php the_sub_field('hero_mini_text_four'); ?></a></li>
          <?php endwhile; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <div class="nav-panel-footer">
    <svg version="1.1" id="nav-panel-logo" width="95" height="28" viewBox="0 0 95 28" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95 28">
      <style type="text/css">
        .st0 {
          fill: #FFFFFF;
        }

        .st1 {
          clip-path: url(#SVGID_00000052795515844702687860000017285000297573823905_);
        }

        .st2 {
          fill: #7B32CD;
        }

        .st3 {
          fill: #5803AF;
        }

        .st4 {
          fill: #6E5BF6;
        }

        .st5 {
          fill: #5406C6;
        }
      </style>
      <path class="st0" d="M54,12.5L54,12.5l-3,8.2h-1.9l-2.9-8.2h-0.1l-0.7,8.3H42l1.3-14h3.6l3.1,8.1l3.1-8.1h3.7l1.3,14h-3.5L54,12.5z" />
      <path class="st0" d="M70.9,18.6h-5.2L65,20.8h-3.5l4.8-14h4.1l4.8,14h-3.5L70.9,18.6z M70,15.6l-1.6-5.2l-1.6,5.2H70z" />
      <path class="st0" d="M91.9,20.8l-5.2-7.3l4.7-6.7h-3.9l-2.8,3.9L82,6.8h-4.2l4.8,6.9l-5.1,7.2h3.9l3.1-4.4l3.1,4.4H91.9z" />
      <g>
        <defs>
          <rect id="SVGID_1_" y="0" width="28" height="28" />
        </defs>
        <clipPath id="SVGID_00000110470973789409557830000008221144716254680754_">
          <use xlink:href="#SVGID_1_" style="overflow:visible;" />
        </clipPath>
        <g style="clip-path:url(#SVGID_00000110470973789409557830000008221144716254680754_);">
          <path class="st2" d="M13.3,7.9L7.7,0.3C7.5,0.1,7.3,0,7,0v19.8c0.3,0,0.5,0.1,0.7,0.3l5.6,7.5c0.2,0.2,0.4,0.3,0.7,0.3V8.2
			C13.7,8.2,13.5,8.1,13.3,7.9L13.3,7.9z" />
          <path class="st3" d="M6.3,0.3L0.2,8.5C0.1,8.7,0,8.9,0,9v17c0,0.8,1,1.2,1.5,0.5l4.8-6.4c0.2-0.2,0.4-0.3,0.7-0.3V0
			C6.7,0,6.5,0.1,6.3,0.3z" />
          <path class="st4" d="M27.8,8.5l-6.2-8.2C21.5,0.1,21.3,0,21,0v19.8c0.3,0,0.5,0.1,0.7,0.3l4.8,6.4C27,27.2,28,26.8,28,26V9
			C28,8.9,27.9,8.7,27.8,8.5L27.8,8.5z" />
          <path class="st5" d="M20.3,0.3l-5.6,7.5c-0.2,0.2-0.4,0.3-0.7,0.3V28c0.3,0,0.5-0.1,0.7-0.3l5.6-7.5c0.2-0.2,0.4-0.3,0.7-0.3V0
			C20.7,0,20.5,0.1,20.3,0.3z" />
        </g>
      </g>
    </svg>
    <div>
      <svg id="nav-panel-opener" width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="0.5" width="18.75" height="1.5" rx="0.75" fill="white" />
        <rect x="0.5" y="5.25" width="18.75" height="1.5" rx="0.75" fill="white" />
        <rect x="0.5" y="10.5" width="18.75" height="1.5" rx="0.75" fill="white" />
      </svg>
      <svg id="nav-panel-closer" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M11.6242 0.375L0.375 11.625" stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M11.625 11.6258L0.375 0.375977" stroke="white" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </div>
  </div>
</nav>
<div id="nav-bg-shader"></div>