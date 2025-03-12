<?php
/*
Template Name: Wurl Page
*/
?>

<?php get_header(); ?>

<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/simple-grid-w-title-w-floating.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/quote-section-hz.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/wurl-page.css' type='text/css' media='' />

<div class="contentPage">
  <div id="page-wurl">
    <div class="hero-center row" style="background-image: url('<?php the_field('hero_center_bgsecond'); ?>'), url('<?php the_field('hero_center_blur'); ?>'), url('<?php the_field('hero_center_image'); ?>');">
      <div class="inner-wrap inner-wrap-1200">
        <div class="hero-div1">
          <img src="<?php the_field('hero_logo'); ?>" alt="Logo">
          <h1 class="scale-60-50-32"><?php the_field('hero_title'); ?></h1>
          <p class="scale-21-21-18"><?php the_field('hero_text'); ?></p>

          <div class="primary-slate-btn m-auto">
            <a class="scale-21-21-18" href="<?php the_field('hero_cta_link'); ?>" target="_blank">
              <span><?php the_field('hero_cta_text'); ?></span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="single-sub-grid-section single-grid-with-float">
      <div class="inner-wrap-1200">
        <p class="fixed-14 mini-title-section" id="<?php the_field('anchor_link_section_grid_four'); ?>">
          <?php the_field('mini_title_section_grid_four'); ?>
        </p>
        <h2 class="main-title-four scale-36-30-24"><?php the_field('title_section_grid_four'); ?></h2>
        <p class="main-text-four scale-21-21-18"><?php the_field('text_section_grid_four'); ?></p>

        <div class="single-grid single-one">
          <div class="div1-four grid-text">
            <div class="sub-grid-four">
              <div class="four-1">
                <p class="grid-four-title scale-21-21-18"><?php the_field('grid_four_title_one'); ?></p>
                <p class="grid-four-text scale-18-18-16"><?php the_field('grid_four_text_one'); ?></p>
              </div>
              <div class="four-2">
                <p class="grid-four-title scale-21-21-18"><?php the_field('grid_four_title_two'); ?></p>
                <p class="grid-four-text scale-18-18-16"><?php the_field('grid_four_text_two'); ?></p>
              </div>
              <div class="four-2">
                <p class="grid-four-title scale-21-21-18"><?php the_field('grid_four_title_three'); ?></p>
                <p class="grid-four-text scale-18-18-16"><?php the_field('grid_four_text_three'); ?></p>
              </div>
              <div class="four-3">
                <p class="grid-four-title scale-21-21-18"><?php the_field('grid_four_title_four'); ?></p>
                <p class="grid-four-text scale-18-18-16"><?php the_field('grid_four_text_four'); ?></p>
              </div>
            </div>
          </div>

          <div class="div2-four grid-image">
            <div class="single-image">
              <img class="image-main-bb" src="<?php the_field('simple_image_left_section_grid_four'); ?>" alt="MAX - How it Works">
              <!--  <img class="image-left-bb" src="<?php the_field('simple_image_float_left'); ?>" alt="MAX - How it Works">
              <img class="image-right-bb" src="<?php the_field('simple_image_flow_right'); ?>" alt="MAX - How it Works">
              <img class="image-bottom-bb" src="<?php the_field('simple_image_flow_bottom'); ?>" alt="MAX - How it Works">

              <div class="text-bb-right">
                <p class="fixed-16"><?php the_field('text_bb_right'); ?></p>
              </div>
              <div class="text-bb-left-top">
                <p class="fixed-16"><?php the_field('text_bb_left_top'); ?></p>
              </div>
              <div class="text-bb-left-bottom">
                <p class="fixed-16"><?php the_field('text_bb_left_bottom'); ?></p>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="intermediate-cta">
      <div class="inner-wrap inner-wrap-1200">
        <div class="card">
          <div class="mini-cardsec">
            <img class="inter-logo" src="<?php the_field('app_icon_intermediate_cta'); ?>" alt="Wurl">
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

    <div class="results-quote-hz-section">
      <div class="inner-wrap-1200">
        <div class="results-quote-hz">
          <div class="div1-quote-hz">
            <img class="game-screen" src="<?php the_field('quote_hz_image'); ?>" alt="MAX - How it Works">
          </div>
          <div class="div2-quote-hz">
            <p class="scale-24-21-18 quote-hz-title"><?php the_field('quote_hz_text'); ?></p>
            <div class="footer-quote-hz">
              <div class="footer-quote-hz-text">
                <div class="footer-quote-hz-speakerinfo">
                  <p class="scale-18-18-16">
                    <strong><?php the_field('quote_hz_speaker'); ?></strong>
                  </p>
                  <p class="fixed-14"><?php the_field('quote_hz_speaker_title'); ?></p>
                </div>
                <img src="<?php the_field('quote_hz_logo'); ?>" alt="Logo">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="simple-wurl simple-wurl-zero grey-bg">
      <div class="inner-wrap-1200">
        <div class="simple-grid-wurl">
          <div class="image-grid">
            <img class="grid_logo" src="<?php the_field('grid_image_zero'); ?>" loading="lazy" alt="grid logo">
          </div>
          <div class="text-grid">
            <div class="header-grid">
              <img class="grid_logo" src="<?php the_field('grid_logo_zero'); ?>" loading="lazy" alt="grid logo">
              <hr class="hremid" />
              <p class="fixed-14 sub-ti"><?php the_field('grid_logo_text_zero'); ?></p>
            </div>
            <h3 class="scale-36-30-24"><?php the_field('grid_title_zero'); ?></h3>
            <p class="scale-21-21-18"><?php the_field('grid_text_zero'); ?></p>
            <ul>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_one_grid_zero'); ?></li>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_two_grid_zero'); ?></li>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_three_grid_zero'); ?></li>
            </ul>

            <div class="slate-link-16">
              <a href="<?php the_field('grid_link_zero'); ?>">
                <span><?php the_field('grid_link_text_zero'); ?></span>
                <div class="arrow"></div>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="UI icon/arrow_forward">
                    <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                  </g>
                </svg>
              </a>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="simple-wurl">
      <div class="inner-wrap-1200">
        <div class="simple-grid-wurl">
          <div class="text-grid">
            <div class="header-grid">
              <img class="grid_logo" src="<?php the_field('grid_logo_one'); ?>" loading="lazy" alt="grid logo">
              <hr class="hremid" />
              <p class="fixed-14 sub-ti"><?php the_field('grid_logo_text_one'); ?></p>
            </div>
            <h3 class="scale-36-30-24"><?php the_field('grid_title_one'); ?></h3>
            <p class="scale-21-21-18"><?php the_field('grid_text_one'); ?></p>
            <ul>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_one_grid_one'); ?></li>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_two_grid_one'); ?></li>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_three_grid_one'); ?></li>
            </ul>

            <div class="slate-link-16">
              <a href="<?php the_field('grid_link_one'); ?>">
                <span><?php the_field('grid_link_text_one'); ?></span>
                <div class="arrow"></div>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="UI icon/arrow_forward">
                    <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                  </g>
                </svg>
              </a>
            </div>

          </div>
          <div class="image-grid">
            <img class="grid_logo" src="<?php the_field('grid_image_one'); ?>" loading="lazy" alt="grid logo">
          </div>
        </div>
      </div>
    </div>

    <div class="simple-wurl grey-bg">
      <div class="inner-wrap-1200">
        <div class="simple-grid-wurl">
          <div class="image-grid">
            <img class="grid_logo" src="<?php the_field('grid_image_two'); ?>" loading="lazy" alt="grid logo">
          </div>
          <div class="text-grid">
            <div class="header-grid">
              <img class="grid_logo" src="<?php the_field('grid_logo_two'); ?>" loading="lazy" alt="grid logo">
              <hr class="hremid" />
              <p class="fixed-14 sub-ti"><?php the_field('grid_logo_text_two'); ?></p>
            </div>
            <h3 class="scale-36-30-24"><?php the_field('grid_title_two'); ?></h3>
            <p class="scale-21-21-18"><?php the_field('grid_text_two'); ?></p>
            <ul>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_one_grid_two'); ?></li>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_two_grid_two'); ?></li>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_three_grid_two'); ?></li>
            </ul>

            <div class="slate-link-16">
              <a href="<?php the_field('grid_link_two'); ?>">
                <span><?php the_field('grid_link_text_two'); ?></span>
                <div class="arrow"></div>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="UI icon/arrow_forward">
                    <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                  </g>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="simple-wurl simple-third">
      <div class="inner-wrap-1200">
        <div class="simple-grid-wurl">
          <div class="text-grid">
            <div class="header-grid">
              <img class="grid_logo" src="<?php the_field('grid_logo_three'); ?>" loading="lazy" alt="grid logo">
              <hr class="hremid" />
              <p class="fixed-14 sub-ti"><?php the_field('grid_logo_text_three'); ?></p>
            </div>
            <h3 class="scale-36-30-24"><?php the_field('grid_title_three'); ?></h3>
            <p class="scale-21-21-18"><?php the_field('grid_text_three'); ?></p>
            <ul>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_one_grid_three'); ?></li>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_two_grid_three'); ?></li>
              <li class="grid-point scale-18-18-16"><?php the_field('grid_point_three_grid_three'); ?></li>
            </ul>

            <div class="slate-link-16">
              <a href="<?php the_field('grid_link_three'); ?>">
                <span><?php the_field('grid_link_text_three'); ?></span>
                <div class="arrow"></div>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="UI icon/arrow_forward">
                    <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                  </g>
                </svg>
              </a>
            </div>
          </div>
          <div class="image-grid">
            <img class="grid_logo" src="<?php the_field('grid_image_three'); ?>" loading="lazy" alt="grid logo">
          </div>
        </div>
      </div>
    </div>

    <div class="wurl-line"></div>

    <div class="bg-[#f7f8fc]">
      <div class="wrapper">
        <div class="m-auto text-center max-w-[800px] grid gap-[40px]">
          <img class="h-[25px] m-auto" src="<?php the_field('hero_logo'); ?>" alt="Wurl Logo">
          <h3 class="scale-36-30-24 m-auto"><?php the_field('cta_title'); ?></h3>
          <!-- Button Start -->
          <div class="primary-gradient-btn m-auto">
            <a class="scale-21-21-18" href="<?php the_field('cta_link'); ?>" target="_blank">
              <span><?php the_field('cta_link_text'); ?></span>
            </a>
          </div>
          <!-- Button End -->
        </div>
      </div>
    </div>

    <div class="row content-row row-modern-gray-200 resources-row">
      <div class="inner-wrap inner-wrap-1200">
        <h2 class="fixed-14 mini-title-section"><?php the_field('ressources_title'); ?></h2>
        <h3 class="scale-36-30-24"><?php the_field('ressources_text'); ?></h3>
      </div>
      <div class="inner-wrap inner-wrap-1200 hz-scrollable">
        <div class="pods-wrap">
          <a href="<?php the_field('pod_link_one'); ?>" class="home_resources_link_wrap">
            <div class="home_resources_pod">
              <img class="home_resources_image" src="<?php the_field('pod_img_one'); ?>" loading="lazy" alt="thumbnail image">
              <div class="home_resources_text_cell">
                <h6 class="fixed-12"><?php the_field('pod_title_one'); ?></h6>
                <p class="scale-18-18-16"><?php the_field('pod_text_one'); ?></p>
              </div>
            </div>
          </a>
          <a href="<?php the_field('pod_link_two'); ?>" class="home_resources_link_wrap">
            <div class="home_resources_pod">
              <img class="home_resources_image" src="<?php the_field('pod_img_two'); ?>" loading="lazy" alt="thumbnail image">
              <div class="home_resources_text_cell">
                <h6 class="fixed-12"><?php the_field('pod_title_two'); ?></h6>
                <p class="scale-18-18-16"><?php the_field('pod_text_two'); ?></p>
              </div>
            </div>
          </a>
          <a href="<?php the_field('pod_link_three'); ?>" class="home_resources_link_wrap">
            <div class="home_resources_pod home_resources_pod_last">
              <img class="home_resources_image" src="<?php the_field('pod_img_three'); ?>" loading="lazy" alt="thumbnail image">
              <div class="home_resources_text_cell">
                <h6 class="fixed-12"><?php the_field('pod_title_three'); ?></h6>
                <p class="scale-18-18-16"><?php the_field('pod_text_three'); ?></p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>