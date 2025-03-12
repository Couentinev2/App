<?php
/*
Template Name: Adjust Page
*/
?>
<?php get_header(); ?>
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/single-grid.css' type='text/css' media='' />

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/slide-quote-simple.css' type='text/css' media='' />

<div class="contentPage">
  <div id="page-adjust">


    <div class="hero-center row" style="background-image: url('<?php the_field('hero_center_bgsecond'); ?>'),url('<?php the_field('hero_center_blur'); ?>'), url('<?php the_field('hero_center_image'); ?>') ;">
      <div class="inner-wrap inner-wrap-1200">
        <div class="hero-div1">
          <img src="<?php the_field('hero_logo'); ?>" alt="Logo">

          <h1 class="scale-60-50-32"><?php the_field('hero_title'); ?></h1>
          <p class="scale-21-21-18"><?php the_field('hero_text'); ?></p>

          <div class="primary-white-btn m-auto">
            <a class="scale-21-21-18" href="<?php the_field('hero_cta_link'); ?>" target="_blank">
              <span><?php the_field('hero_cta_text'); ?></span>
            </a>
          </div>

        </div>
      </div>
    </div>

    <div class="single-sub-grid-section single-grid-with-float single-first">
      <div class="inner-wrap-1200">


        <div class="single-grid single-one">
          <div class="div1-four grid-text">
            <div class="sub-grid-four">
              <p class="fixed-14 mini-title-section" id="<?php the_field('anchor_link_section_grid_four'); ?>">
                <?php the_field('mini_title_section_grid_four'); ?>
              </p>
              <h2 class="main-title-four scale-36-30-24"> <?php the_field('title_section_grid_four'); ?></h2>
              <p class="main-text-four scale-21-21-18"><?php the_field('text_section_grid_four'); ?></p>
            </div>
          </div>

          <div class="div2-four grid-image">
            <div class="single-image">
              <img class="image-main-bb" src="<?php the_field('simple_image_left_section_grid_four'); ?>" alt="MAX - How it Works">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="intermediate-cta">
      <div class="inner-wrap inner-wrap-1200">
        <div class="card">
          <div class="mini-cardsec">
            <img class="inter-logo" src="<?php the_field('app_icon_intermediate_cta'); ?>" alt="Adjust">
            <p class="scale-24-21-18"><?php the_field('min_title_intermediate_cta'); ?></p>
          </div>

          <div class="primary-slate-btn m-auto">
            <a class="scale-18-18-16" href="<?php the_field('link_intermediate_cta'); ?>" target="_blank">
              <span><?php the_field('min_cta_text_intermediate_cta'); ?></span>
            </a>
          </div>

        </div>
        <div class="shadow-card"></div>
      </div>
    </div>

    <div class="simple-adjust simple-adjust-fist">
      <div class="inner-wrap-1200">
        <h2 class="scale-36-30-24"><?php the_field('grids_main_title'); ?></h2>
        <div class="simple-grid-adjust ">
          <div class="image-grid">
            <img class="grid_logo" src="<?php the_field('grid_image_one'); ?>" loading="lazy" alt="grid logo">
          </div>

          <div class="text-grid">

            <h3 class="scale-32-24-21"><?php the_field('grid_title_one'); ?></h3>
            <p class="scale-18-18-16"><?php the_field('grid_text_one'); ?></p>


          </div>

        </div>
      </div>


    </div>

    <div class="simple-adjust">
      <div class="inner-wrap-1200">
        <div class="simple-grid-adjust">
          <div class="text-grid">

            <h3 class="scale-32-24-21"><?php the_field('grid_title_two'); ?></h3>
            <p class="scale-18-18-16"><?php the_field('grid_text_two'); ?></p>


          </div>
          <div class="image-grid">
            <img class="grid_logo" src="<?php the_field('grid_image_two'); ?>" loading="lazy" alt="grid logo">
          </div>
        </div>
      </div>


    </div>

    <div class="simple-adjust simple-third">
      <div class="inner-wrap-1200">
        <div class="simple-grid-adjust">
          <div class="image-grid">
            <img class="grid_logo" src="<?php the_field('grid_image_three'); ?>" loading="lazy" alt="grid logo">
          </div>
          <div class="text-grid">

            <h3 class="scale-32-24-21"><?php the_field('grid_title_three'); ?></h3>
            <p class="sscale-18-18-16"><?php the_field('grid_text_three'); ?></p>


          </div>

        </div>
      </div>


    </div>

    <div class="simple-adjust simple-forth">
      <div class="inner-wrap-1200">
        <div class="simple-grid-adjust">
          <div class="text-grid">

            <h3 class="scale-32-24-21"><?php the_field('grid_title_four'); ?></h3>
            <p class="scale-18-18-16"><?php the_field('grid_text_four'); ?></p>


          </div>
          <div class="image-grid">
            <img class="grid_logo" src="<?php the_field('grid_image_four'); ?>" loading="lazy" alt="grid logo">
          </div>
        </div>
      </div>


    </div>

    <?php include('pagessections/slide-quote-simple.php'); ?>


    <div class="bg-[#181625]">
      <div class="wrapper">
        <div class="m-auto text-center max-w-[800px] grid gap-[40px]">
          <img class="h-[25px] m-auto" src="/wp-content/themes/applovin/images/adjust_primary_white.svg" alt="Adjust Logo">
          <h3 class="scale-36-30-24 m-auto text-white"><?php the_field('footer_cta_headline'); ?></h3>
          <!-- Button Start -->
          <div class="primary-gradient-btn m-auto">
            <a class="scale-21-21-18" href="<?php the_field('cta_url'); ?>" target="_blank">
              <span><?php the_field('footer_cta_btn_label'); ?></span>
            </a>
          </div>
          <!-- Button End -->
        </div>
      </div>
    </div>


    <div class="row content-row content-row-short row-white inside-al-row">
      <div class="inner-wrap inner-wrap-1200">
        <div class="inside-al-wrap">
          <div class="inside-al-title">
            <h5 class="scale-24-21-18"><?php the_field('cta_slide_title'); ?></h5>
          </div>
          <div class="hz-scrollable">
            <div class="inside-al-grid">
              <a href="<?php the_field('cta_slide_url_one'); ?>" class="inside-al-pod-link">
                <div class="inside-al-pod" style="background-image:url('<?php the_field('cta_slide_img_one'); ?>');">
                  <div>
                    <h6 class="scale-21-21-18"><?php the_field('cta_slide_title_one'); ?></h6>
                    <p class="fixed-14"><?php the_field('cta_slide_text_one'); ?></p>
                  </div>
                </div>
              </a>
              <a href="<?php the_field('cta_slide_url_two'); ?>" class="inside-al-pod-link">
                <div class="inside-al-pod" style="background-image:url('<?php the_field('cta_slide_img_two'); ?>');">
                  <div>
                    <h6 class="scale-21-21-18"><?php the_field('cta_slide_title_two'); ?></h6>
                    <p class="fixed-14"><?php the_field('cta_slide_text_two'); ?></p>
                  </div>
                </div>
              </a>
              <a href="<?php the_field('cta_slide_url_three'); ?>" class="inside-al-pod-link">
                <div class="inside-al-pod" style="background-image:url('<?php the_field('cta_slide_img_three'); ?>');">
                  <div>
                    <h6 class="scale-21-21-18"><?php the_field('cta_slide_title_three'); ?></h6>
                    <p class="fixed-14"><?php the_field('cta_slide_text_three'); ?></p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- -->
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(document).ready(function() {

    jQuery('#ads-slider').slick({
      slidesToShow: 1,
      slidesToSlide: 1,
      dots: true,
      centerMode: false

    });

  });
</script>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(function($) {
    if ($("#tabs").length) {
      $("#tabs").tabs();
    }
    if ($("#tabs2").length) {
      $("#tabs2").tabs();
    }
    if ($("#tabs3").length) {
      $("#tabs3").tabs();
    }
  });
</script>


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  // AppLovin Tab/Panel Slides v1 - 2022
  let activeSlideNumBis = 1;
  let maxSlideNumThree = 3;
  let slideIDBis = 0;

  function cycleQuoteBis(n) {
    clearInterval(slideIDBis);

    let $loop = 0;
    const logoTabs = document.querySelectorAll(".logo-tabb");
    logoTabs.forEach(function(currentIndex) {
      $loop += 1;
      if ($loop == n) {
        currentIndex.classList.add('active');
        activeSlideNumBis = n;
      } else {
        currentIndex.classList.remove('active');
      };
    });
    maxSlideNumThree = $loop;
    $loop = 0;

    const quotePanels = document.querySelectorAll(".quote-slideb");
    quotePanels.forEach(function(currentIndex) {
      $loop += 1;
      if ($loop == n) {
        currentIndex.classList.add('active');
      } else {
        currentIndex.classList.remove('active');
      };
    });
    slideIDBis = setInterval(advanceSlideBis, 6000);

  }



  function advanceSlideBis() {
    if (activeSlideNumBis < 3) {
      cycleQuoteBis(activeSlideNumBis + 1);
    } else {
      cycleQuoteBis(1);
    }
  }




  if (window.innerWidth > 640) {
    slideIDBis = setInterval(advanceSlideBis, 6000);
  }
</script>
<?php get_footer(); ?>