<?php
/*
Template Name: SparkLabs Page
*/
?>
<?php get_header(); ?>
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/section-with-tabs.css' type='text/css' media='' />
<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/simple-grid-video.css' type='text/css' media='' />

<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
<script delay src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script delay src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<div class="sparklabs-page">
  <div class="hero-center row" style="background-image :url('<?php the_field('hero_center_image'); ?>'),url('<?php the_field('hero_center_blur'); ?>'), linear-gradient(180deg, #000000 0%, #0883A8 100%)  ;">
    <div class="inner-wrap inner-wrap-1200">
      <div class="hero-div1">
        <img src="<?php the_field('hero_logo'); ?>" alt="Logo" class="logo-hero">

        <h1 class="scale-60-50-32"><?php the_field('hero_title'); ?></h1>
        <p class="scale-21-21-18"><?php the_field('hero_text'); ?></p>

        <div class="primary-white-btn m-auto">
          <a class="scale-21-21-18" href="<?php the_field('hero_cta_link'); ?>" target="_blank">
            <span><?php the_field('hero_cta_text'); ?></span>
          </a>
        </div>

        <div class="video-hero pt-[64px] md:pt-[80px] lg:pt-[94px]">
          <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
            <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
              <iframe src="https://fast.wistia.net/embed/iframe/t6pt5hb7e7?seo=true&videoFoam=true&autoplay=1"
                title="what_is_sparklabs_ (Original) Video"
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
    </div>
  </div>

  <div class="tabs-section">
    <div class="inner-wrap inner-wrap-1200">
      <p class="fixed-14 mini-title-section" id="<?php the_field('anchor_link_tabs'); ?>">
        <?php the_field('mini_title_section_tabs'); ?>
      </p>
      <h1 class="scale-36-30-24 tab-main-title">
        <?php the_field('simple_title_tabs'); ?>
      </h1>
      <p class="scale-21-21-18 tab-main-text">
        <?php the_field('simple_text_tabs'); ?>
      </p>
    </div>
    <div id="tabs2">
      <div class="inner-wrap inner-wrap-1200 tabs-wrap hz-scrollable">
        <ul>
          <?php $num = 1; ?>
          <?php if (have_rows('tabs_wrap')): ?>
            <?php while (have_rows('tabs_wrap')): the_row(); ?>
              <li><a class="fixed-16 tabs-title" href="#tabs2-<?php echo $num; ?>">
                  <?php the_sub_field('tab_menu_title'); ?>
                </a></li>
              <?php $num += 1; ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </ul>
      </div>
      <hr />
      <div class="inner-wrap inner-wrap-1200 main-second-part-tab">

        <?php $numnbis = 1; ?>
        <?php if (have_rows('tabs_wrap')): ?>
          <?php while (have_rows('tabs_wrap')): the_row(); ?>
            <div id="tabs2-<?php echo $numnbis; ?>" class="tab-grid">
              <div class="left-text">
                <p class="scale-21-21-18 tabs-rep-title">
                  <?php the_sub_field('tab_title'); ?>
                </p>
                <p class="scale-18-18-16 tabs-rep-text">
                  <?php the_sub_field('tab_text'); ?>
                </p>
                <div class="sub-tabs-repeater">
                  <div class="sub-tabs-repeater-one ">
                    <p class="scale-18-18-16 minititle-rep-tab"><?php the_sub_field('mini_title_rep'); ?></p>
                    <p class="scale-18-18-16 <?php the_sub_field('mini_title_rep'); ?>"><?php the_sub_field('mini_text_rep'); ?></p>
                    <a href="  <?php the_sub_field('mini_link'); ?>" class="mini-link-rep scale-18-18-16">
                      <?php the_sub_field('mini_link_text'); ?>
                    </a>
                  </div>


                </div>
              </div>
              <div class="right-img">

                <?php if ('yes' == get_sub_field('video_tab')): ?>
                  <div class="ad-wrapper-ctv">
                    <video playsinline autoplay loop muted controls poster="<?php the_sub_field('tab_poster_video'); ?>">
                      <source src="<?php the_sub_field('tab_video'); ?>" type="video/mp4">
                      Your browser does not support the video tag.
                    </video>
                  </div>
                <?php else: ?>

                  <div class="ad-wrapper">
                    <object data="<?php the_sub_field('tab_img'); ?>"></object>

                  </div>


                <?php endif; ?>

              </div>
            </div>
            <?php $numnbis += 1; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="single-section">
    <div class="inner-wrap-1200">

      <div class="single-grid single-one">
        <div class="div1-single grid-image">
          <div class="single-image">
            <div class="div2-video grid-text">

              <video playsinline autoplay loop muted controls poster="<?php the_sub_field('vid_poster_video'); ?>">
                <source src="<?php the_field('video_simple_id'); ?>" type="video/mp4">
                Your browser does not support the video tag.
              </video>


            </div>
          </div>

        </div>
        <div class="div2-single grid-text">
          <p class="fixed-14 mini-title-section" id="<?php the_field('anchor_link_tabs'); ?>">
            <?php the_field('mini_title_section_video'); ?>
          </p>
          <h1 class="scale-36-30-24">
            <?php the_field('simple_title_first'); ?>
          </h1>
          <p class="scale-21-21-18">
            <?php the_field('simple_text_first'); ?>
          </p>
        </div>
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


      </div>
    </div>

  </div>


  <div class="intermediate-cta">
    <div class="inner-wrap inner-wrap-1200">
      <div class="card flex justify-between">
        <div class="mini-cardsec">
          <img class="inter-logo" src="<?php the_field('app_icon_intermediate_cta'); ?>" alt="SparkLab">
          <p class="scale-24-21-18"><?php the_field('min_title_intermediate_cta'); ?></p>
        </div>

        <div class="primary-slate-btn m-auto md:m-0">
          <a class="scale-18-18-16" href="<?php the_field('link_intermediate_cta'); ?>" target="_blank">
            <span><?php the_field('min_cta_text_intermediate_cta'); ?></span>
          </a>
        </div>
      </div>
      <div class="shadow-card"></div>
    </div>
  </div>

  <div class="slideshow-container">

    <div class="tabs">



      <div class="tab-contents">


        <div class="tab-content tab-1" style="display: block;">
          <div class="inside-tab">
            <div class="tab-text">
              <p class="fixed-14 mini-title-tab"><?php the_field('creative_title'); ?></p>
              <h3 class="scale-36-30-24"><?php the_field('box_text_one'); ?></h3>
            </div>
            <img src="<?php the_field('box_image_one'); ?>" alt="Image 1" class="tab-image">

          </div>
        </div>
        <div class="tab-content tab-2" style="display: none;">
          <div class="inside-tab">
            <div class="tab-text">
              <p class="fixed-14 mini-title-tab"><?php the_field('creative_title'); ?></p>
              <h3 class="scale-36-30-24"><?php the_field('box_text_two'); ?></h3>
            </div>

            <img src="<?php the_field('box_image_two'); ?>" alt="Image 2" class="tab-image">
          </div>
        </div>
        <div class="tab-content tab-3" style="display: none;">
          <div class="inside-tab">
            <div class="tab-text">
              <p class="fixed-14 mini-title-tab"><?php the_field('creative_title'); ?></p>
              <h3 class="scale-36-30-24"><?php the_field('box_text_three'); ?></h3>
            </div>
            <img src="<?php the_field('box_image_three'); ?>" alt="Image 3" class="tab-image">

          </div>
        </div>

        <div class="tab-content tab-4" style="display: none;">
          <div class="inside-tab">
            <div class="tab-text">
              <p class="fixed-14 mini-title-tab"><?php the_field('creative_title'); ?></p>
              <h3 class="scale-36-30-24"><?php the_field('box_text_four'); ?></h3>
            </div>
            <img src="<?php the_field('box_image_four'); ?>" alt="Image 3" class="tab-image">

          </div>
        </div>

        <div class="tab-content tab-5" style="display: none;">
          <div class="inside-tab">
            <div class="tab-text">
              <p class="fixed-14 mini-title-tab"><?php the_field('creative_title'); ?></p>
              <h3 class="scale-36-30-24"><?php the_field('box_text_five'); ?></h3>

            </div>
            <img src="<?php the_field('box_image_five'); ?>" alt="Image 3" class="tab-image">

          </div>
        </div>
      </div>

      <div class="tab-links inner-wrap-1200">
        <ul>
          <li class="tab-link active">
            <div class="loading-bar load1"></div>
          </li>
          <li class="tab-link">
            <div class="loading-bar load2"></div>
          </li>
          <li class="tab-link">
            <div class="loading-bar load3"></div>
          </li>
          <li class="tab-link">
            <div class="loading-bar load4"></div>
          </li>
          <li class="tab-link">
            <div class="loading-bar load5"></div>
          </li>
        </ul>

        <div class="tab-titles">
          <p class="flex-tile scale-24-21-18" id="title-section">Research</p>
          <p class="flex-number scale-24-21-18"><span id="section-number">1</span>/5</p>
        </div>
      </div>

    </div>
  </div>

  <div class="result-vol-section">
    <div class="inner-wrap inner-wrap-1200">

      <p class="fixed-14 mini-title-section" id="<?php the_field('anchor_link_vol'); ?>">
        <?php the_field('mini_title_section_vol'); ?>
      </p>
      <h1 class="scale-36-30-24 tab-main-title">
        <?php the_field('simple_title_vol'); ?>
      </h1>
      <img src="<?php the_field('simple_img_vol'); ?>" alt="Image" class="vol-logo-image">

      <div class="stats-grid">
        <div class="grid1">
          <div class="text-stats">

            <h2 class="scale-50-40-28"><?php the_field('big_stats_one'); ?></h2>
            <p class="scale-18-18-16"><?php the_field('desc_stats_text_one'); ?></p>
          </div>

          <div class="logo-link">
            <img src="<?php the_field('desc_stats_one'); ?>" alt="Image 3" class="tab-image">

            <div class="white-link-16">
              <a href="<?php the_field('link_stats_one'); ?>">
                <span><?php the_field('link_text_stats_one'); ?></span>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="UI icon/arrow_forward">
                    <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                  </g>
                </svg>
              </a>
            </div>
          </div>
        </div>

        <div class="grid2">
          <div class="text-stats">
            <h2 class="scale-50-40-28"><?php the_field('big_stats_two'); ?></h2>
            <p class="scale-18-18-16"><?php the_field('desc_stats_text_two'); ?></p>
          </div>
          <div class="logo-link">
            <img src="<?php the_field('desc_stats_two'); ?>" alt="Image 3" class="tab-image">

            <div class="white-link-16">
              <a href="<?php the_field('link_stats_two'); ?>">
                <span><?php the_field('link_text_stats_two'); ?></span>
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="UI icon/arrow_forward">
                    <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                  </g>
                </svg>
              </a>
            </div>
          </div>
        </div>

        <div class="grid3">
          <div class="text-stats">

            <h2 class="scale-50-40-28"><?php the_field('big_stats_three'); ?></h2>
            <p class="scale-18-18-16"><?php the_field('desc_stats_text_three'); ?></p>
          </div>

          <div class="logo-link">
            <img src="<?php the_field('desc_stats_three'); ?>" alt="Image 3" class="tab-image">
 

            <div class="white-link-16">
              <a href="<?php the_field('link_stats_three'); ?>">
                <span><?php the_field('link_text_stats_three'); ?></span>
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

  </div>


  <div class="bg-[#f7f8fc]">
      <div class="wrapper">
        <div class="m-auto text-center max-w-[800px] grid gap-[40px]">
          <img class="h-[25px] m-auto" src="<?php the_field('logo_cta'); ?>" alt="Sparklab Logo">

          <div class="grid gap-[12px] md:gap-[12px]">
            <h3 class="scale-36-30-24 m-auto"><?php the_field('footer_cta_headline'); ?></h3>
            <p class="scale-21-21-18 m-auto"><?php the_field('text_cta'); ?></p>
          </div>
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

  <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    jQuery(document).ready(function() {

      jQuery(".load2").css("animation", "none");
      jQuery(".load3").css("animation", "none");
      jQuery(".load4").css("animation", "none");
      jQuery(".load5").css("animation", "none");

      var tabContent = jQuery(".tab-content");
      var tabLink = jQuery(".tab-link");
      var currentTab = 0;
      var interval;

      function startInterval() {
        interval = setInterval(function() {
          currentTab++;
          if (currentTab >= tabContent.length) {
            currentTab = 0;
          }
          changeTab(currentTab);
        }, 5000);
      }


      function changeTab(index) {

        clearInterval(interval);

        tabContent.hide();
        tabContent.eq(index).show();
        tabLink.removeClass("active");
        tabLink.eq(index).addClass("active");
        jQuery(".loading-bar").css("animation", "none");
        jQuery(".loading-bar").css("width", "0%");
        // Set the width of all previous loading bars to 100%

        jQuery("#section-number").text(index + 1);

        let expression = index;

        switch (expression) {
          case 0:
            jQuery("#title-section").text("<?php the_field('box_title_one'); ?>");
            break;
          case 1:
            jQuery("#title-section").text("<?php the_field('box_title_two'); ?>");
            break;
          case 2:
            jQuery("#title-section").text("<?php the_field('box_title_three'); ?>");
            break;
          case 3:
            jQuery("#title-section").text("<?php the_field('box_title_four'); ?>");
            break;
          case 4:
            jQuery("#title-section").text("<?php the_field('box_title_five'); ?>");
            break;

          default:
            jQuery("#title-section").text("Iterate");
        }

        for (let i = 0; i < index; i++) {
          $(".loading-bar").eq(i).css("width", "100%");
        }




        jQuery(".loading-bar").eq(index).css("animation", "");
        jQuery(".loading-bar").eq(index).css("width", "100%");

        startInterval();
      }

      tabLink.click(function() {
        var index = $(this).index();
        changeTab(index);
      });

      startInterval();
    });
  </script>

  <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    jQuery(function() {
      jQuery("#tabs, #tabs2").tabs();
    });
  </script>

  <?php get_footer(); ?>