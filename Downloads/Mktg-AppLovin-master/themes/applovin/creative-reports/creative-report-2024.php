<?php
/*
Template Name: Creative Report 2023 Page
*/
?>
<?php get_header(); ?>


<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/hero-with-overflow-logo.css' type='text/css' media='' />



<div class="contentPage">

  <?php $langDetect = get_language_attributes(); ?>



  <div id="page-sparklab-report">



    <div class="hero-center row" style="background-image: url('<?php the_field('hero_main_image'); ?>'),url('<?php the_field('hero_secondary_image'); ?>') ;">


      <div class="video-card-pod video-card-art " style="">
        <div class="video-hero-section desktop">
          <video class="herovideo-panel-video" id="intro-panel-video" autoplay="" muted="" loop="" playsinline="">
            <source src="/wp-content/themes/applovin/images/SparkLabs_header-1000k.mp4" type="video/mp4">
          </video>
        </div>

        <div class="video-hero-section tablet">
          <video class="herovideo-panel-video" id="intro-panel-video" autoplay="" muted="" loop="" playsinline="">
            <source src="/wp-content/themes/applovin/images/SparkLabs_headertablet.mp4" type="video/mp4">
          </video>
        </div>

        <div class="video-hero-section mobile">
          <video class="herovideo-panel-video" id="intro-panel-video" autoplay="" muted="" loop="" playsinline="">
            <source src="/wp-content/themes/applovin/images/SparkLabs_header-Mobile-250k.mp4" type="video/mp4">
          </video>
        </div>
        <div class=" hero-intro">

          <div class="text-content  inner-wrap inner-wrap-1200 inner-wrap-max-right">
            <img src="<?php the_field('hero_logo'); ?>" alt="AppDiscovery Logo">

            <h1 class="scale-60-50-32">
              <?php the_field('hero_title'); ?>
            </h1>
            <p class="scale-21-21-18">
              <?php the_field('hero_text'); ?>
            </p>
          </div>
        </div>
      </div>



    </div>



    <div class="over-page-content">
      <div class="inner-wrap inner-wrap-1200">
        <div class="page-content">

          <nav class="side-menu">

            <p class="menu-title creat-second"><?php the_field('menu_main_title'); ?></p>
            <a href="#idt" data-id="idt" class="menu-link"><?php the_field('menu_title_one'); ?></a>
            <a href="#met" data-id="met" class="menu-link"><?php the_field('menu_title_two'); ?></a>
            <a href="#tps" data-id="tps" class="menu-link"><?php the_field('menu_title_three'); ?></a>
            <a href="#vtt" data-id="vtt" class="menu-link"><?php the_field('menu_title_four'); ?></a>
            <a href="#ccl" data-id="ccl" class="menu-link"><?php the_field('menu_title_five'); ?></a>
            <a href="#ccp" data-id="ccp" class="menu-link"><?php the_field('menu_title_six'); ?></a>

            <hr />
          </nav>

          <div class="main-content">

            <div class="intro-section section" id="idt">
              <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_one'); ?></h2>
              <p class="scale-18-18-16"><?php the_field('intro_part_one'); ?>
              <p>

              <div class="key-section section" style="background: none; padding:0; ">
                <h3 class="scale-21-21-18"><?php the_field('key_title'); ?></h3>
                <ul>
                  <?php the_field('key_points'); ?>

                </ul>

              </div>
            </div>


            <div class="end-section">
              <object data="/wp-content/themes/applovin/images/end-one.jpg" title="sparklab-report"></object>
            </div>

            <div class="metho-section section" id="met">
              <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_two'); ?></h2>
              <p class="scale-18-18-16"><?php the_field('intro_part_two'); ?>
              </p><br>

              <p class="scale-18-18-16"><?php the_field('intro_part_data'); ?></p>
              <div class="repeter-analyze">

                <?php if (have_rows('analyze_repeater')): ?>
                  <?php while (have_rows('analyze_repeater')): the_row(); ?>
                    <div class="analyze-repeater">
                      <h2 class="scale-32-24-21 stats-nb"><?php the_sub_field('title_data'); ?>
                      </h2>
                      <p class="scale-18-18-16"><?php the_sub_field('data_text'); ?></p>
                    </div>
                  <?php endwhile; ?>
                <?php endif; ?>

              </div>

              <p class="scale-18-18-16">
                <?php the_field('part_two_final'); ?>
              </p>
              <div class="grid-success">
                <object data="<?php the_field('success_img_one'); ?>" title="ctv-report"></object>
                <div class="grid-success-text">
                  <div class="success-mini-h">
                    <object data="<?php the_field('success_logo_one'); ?>" title="ctv-report"></object>
                    <p class="fixed-12"><?php the_field('success_tittle'); ?></p>

                  </div>
                  <p class="scale-18-18-16"><?php the_field('success_text_one'); ?></p>
                  <a class="scale-18-18-16 promo-link" href="<?php the_field('success_url_one'); ?>" target="_blank"><?php the_field('success_link_one'); ?></a>
                </div>
              </div>

            </div>



            <div class="end-section">
              <object data="/wp-content/themes/applovin/images/end-two.png" title="sparklab-report"></object>
            </div>

            <div class="top-perf-section section" id="tps">
              <h2 class="scale-36-30-24  menu-jump"><?php the_field('menu_title_three'); ?></h2>

              <p class="scale-18-18-16"><?php the_field('part_three_sub_text_one'); ?>
              </p>



              <object class="break-image top-40 desktop" data="<?php the_field('part_three_breakdown_one_image'); ?>" title="<?php the_field('part_three_breakdown_one_image_description'); ?>"></object>
              <object class="break-image top-40 mobile" data="<?php the_field('part_three_breakdown_one_image_mobile'); ?>" title="<?php the_field('part_three_breakdown_one_image_description'); ?>"></object>

              <p class="fixed-16 subtext-img"><?php the_field('part_three_breakdown_one_image_subtext'); ?>
              </p>


              <div class="localvid joc bottom-96">
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/pm_artpiecemakeover_01_en_ctv_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/pm_artpiecemakeover_01_en_ctv_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>  ';
                };
                ?>

                <p class="video-caption fixed-16"><?php the_field('part_three_sub_one_text_video'); ?></p>
              </div>

              <h3 class="small-title scale-32-24-21"><?php the_field('part_three_breakdown_one_title'); ?></h3>

              <p class="scale-18-18-16"><?php the_field('part_three_sub_text_two'); ?></p>


              <div class="localvid">
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/peoplefun.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/peoplefun.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>  ';
                };
                ?>

                <p class="video-caption fixed-16"><?php the_field('part_three_breakdown_two_image_subtext'); ?></p>
              </div>



              <h3 class="small-title scale-32-24-21 top"><?php the_field('part_three_sub_four_data_img_title'); ?></h3>

              <p class="scale-18-18-16"><?php the_field('part_three_sub_text_three_one'); ?></p>

              <object class="break-image top-40 break-white desktop" data="<?php the_field('part_three_breakdown_three_image'); ?>" title="<?php the_field('part_three_breakdown_three_image_description'); ?>"></object>
              <object class="break-image top-40 break-white mobile" data="<?php the_field('part_three_breakdown_three_image_mobile'); ?>" title="<?php the_field('part_three_breakdown_three_image_description'); ?>"></object>

              <p class="fixed-16 subtext-img bottom-40 "><?php the_field('part_three_breakdown_three_image_subtext'); ?>
              </p>


              <p class="scale-18-18-16 "><?php the_field('part_three_sub_text_three'); ?></p>


              <h3 class="small-title scale-32-24-21 top"><?php the_field('part_three_sub__data'); ?></h3>

              <p class="scale-18-18-16"><?php the_field('part_three_sub__text'); ?></p>

              <p class="scale-18-18-16 list top-40"><?php the_field('part_three_sub__list'); ?></p>



              <div class="funfact">
                <img src="/wp-content/themes/applovin/images/fun62.png" alt="fun-fact-img">
                <div class="funfact-text">
                  <p class="funfact-title fixed-14"><?php the_field('fun_fact'); ?></p>
                  <p class="scale-21-21-18"><?php the_field('part_three_funfact_one'); ?>
                  </p>
                </div>
              </div>

              <object class="break-image top desktop" data="<?php the_field('part_three_breakdown_four_image'); ?>" title="<?php the_field('part_three_breakdown_four_image_description'); ?>"></object>
              <object class="break-image top mobile" data="<?php the_field('part_three_breakdown_four_image_mobile'); ?>" title="<?php the_field('part_three_breakdown_four_image_description'); ?>"></object>

              <p class="fixed-16 subtext-img"><?php the_field('part_three_breakdown_four_image_subtext'); ?>
              </p>



            </div>
            <div class="end-section">
              <object data="/wp-content/themes/applovin/images/breakfinalx.png" title="sparklab-report"></object>
            </div>






            <div class="var-try-section section" id="vtt">
              <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_four'); ?></h2>
              <p class="scale-18-18-16"><?php the_field('part_four_intro_one'); ?></p>
              <h3 class="small-title small-t-num scale-32-24-21"><?php the_field('part_four_sut_one'); ?></h3>

              <p class="scale-18-18-16"><?php the_field('part_four_intro_one_two'); ?></p>


              <div class="localvid joc">
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/ff2_numbercollectterritoryv2_01_en_video_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/ff2_numbercollectterritoryv2_01_en_video_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>  ';
                };
                ?>

                <p class="video-caption fixed-16"><?php the_field('part_four_video_one'); ?></p>
              </div>

              <p class="scale-18-18-16"><?php the_field('part_four_intro_one_three'); ?></p>

              <h3 class="small-title small-t-num scale-32-24-21"><?php the_field('part_four_sut_two'); ?></h3>

              <p class="scale-18-18-16"><?php the_field('part_four_intro_two_one'); ?></p>



              <div class="funfact">
                <img src="/wp-content/themes/applovin/images/fun2.png" alt="fun-fact-img">
                <div class="funfact-text">
                  <p class="funfact-title fixed-14"><?php the_field('fun_fact_two'); ?></p>
                  <p class="scale-21-21-18"><?php the_field('part_three_funfact_twp'); ?>
                  </p>
                </div>
              </div>


              <div class="localvid joc">
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/trendsreport_CQU.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/trendsreport_CQU.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                };
                ?>


                <p class="video-caption fixed-16"><?php the_field('part_four_intro_video_cap'); ?></p>
              </div>

              <p class="scale-18-18-16"><?php the_field('part_three_sub_title_tthree'); ?></p>




              <div class="localvid joc jocnb">
                <div class="stats-part">
                  <p class="stats-nb scale-50-40-28"><?php the_field('part_four_nb_stats'); ?></p>
                  <p class="text-stt scale-18-18-16"><?php the_field('part_four_nb_stats_text'); ?></p>
                </div>
                <object class="desktop" data="<?php the_field('part_four_nb_stats_img'); ?>" title="sparklab-report"></object>

                <object class="mobile" data="<?php the_field('part_four_nb_stats_img_mobile'); ?>" title="sparklab-report"></object>

              </div>



              <p class="scale-18-18-16"><?php the_field('part_three_sub_title_ffour'); ?></p>



              <div class="localvid joc jocnb">
                <div class="stats-part">
                  <p class="stats-nb nb-pink scale-50-40-28"><?php the_field('part_four_nb_stats_two'); ?></p>
                  <p class="text-stt scale-18-18-16"><?php the_field('part_four_nb_stats_text_two'); ?></p>
                </div>
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/trendsreport-rewardedplay.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/trendsreport-rewardedplay.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                };
                ?>

              </div>




              <h3 class="small-title small-t-num scale-32-24-21"><?php the_field('part_four_sut_three'); ?></h3>



              <p class="scale-18-18-16"><?php the_field('part_three_sub_title_ffive'); ?></p>



              <div class="localvid joc">
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/tiktok_boomerbonding_custom_01_en_ctv_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/tiktok_boomerbonding_custom_01_en_ctv_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                };
                ?>


                <p class="video-caption fixed-16"><?php the_field('part_ffive_intro_video_cap'); ?></p>
              </div>

              <div class="grid-success">
                <object data="<?php the_field('success_img_two'); ?>" title="ctv-report"></object>
                <div class="grid-success-text">
                  <div class="success-mini-h">
                    <object data="<?php the_field('success_logo_two'); ?>" title="ctv-report"></object>
                    <p class="fixed-12"><?php the_field('success_tittle_two'); ?></p>

                  </div>
                  <p class="scale-18-18-16"><?php the_field('success_text_twp'); ?></p>
                  <a class="scale-18-18-16 promo-link" href="<?php the_field('success_url_two'); ?>" target="_blank"><?php the_field('success_link_two'); ?></a>
                </div>
              </div>

            </div>




            <div class="end-section">
              <object data="/wp-content/themes/applovin/images/end3x.png" title="sparklab-report"></object>
            </div>


            <div class="section sectionccl" id="ccl">
              <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_five'); ?></h2>



              <p class="scale-18-18-16"><?php the_field('part_five_sub'); ?></p>
              <h3 class="small-title scale-32-24-21"><?php the_field('part_five_sub_tt_one'); ?></h3>

              <p class="scale-18-18-16"><?php the_field('part_five_sub_two'); ?></p>


              <div class="localvid joc">
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/wrd_spliceinfluencer_custom_01_en_video_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/wrd_spliceinfluencer_custom_01_en_video_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                };
                ?>


                <p class="video-caption fixed-16"><?php the_field('part_five_intro_video_cap'); ?></p>
              </div>

              <object class="break-image desktop" data="<?php the_field('part_five_intro_img_one'); ?>" title="<?php the_field('part_five_intro_tt_one'); ?>"></object>
              <object class="break-image mobile" data="<?php the_field('part_five_intro_img_one_mobile'); ?>" title="<?php the_field('part_five_intro_tt_one'); ?>"></object>

              <p class="fixed-16 subtext-img"><?php the_field('part_five_intro_text_one'); ?>
              </p>


              <h3 class="small-title scale-32-24-21 top"><?php the_field('part_five_intro_title_one'); ?></h3>

              <p class="scale-18-18-16"><?php the_field('part_five_sub_three'); ?></p>

              <div class="localvid joc">
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/trendsreport-shein.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/trendsreport-shein.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                };
                ?>


                <p class="video-caption fixed-16"><?php the_field('part_five_intro_video_cap_second'); ?></p>
              </div>


              <h3 class="small-title scale-32-24-21 top"><?php the_field('part_five_intro_title_two'); ?></h3>

              <p class="scale-18-18-16"><?php the_field('part_five_sub_three_two'); ?></p>

              <div class="localvid joc bottom-40">
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/hkd_borderwsipec_custom_01_en_video_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/hkd_borderwsipec_custom_01_en_video_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                };
                ?>


                <p class="video-caption fixed-16"><?php the_field('part_five_intro_video_cap_third'); ?></p>
              </div>

              <object class="break-image desktop" data="<?php the_field('part_five_intro_img_three'); ?>" title="<?php the_field('part_five_intro_tt_three'); ?>"></object>
              <object class="break-image mobile" data="<?php the_field('part_five_intro_img_three_mobile'); ?>" title="<?php the_field('part_five_intro_tt_three'); ?>"></object>

              <p class="fixed-16 subtext-img"><?php the_field('part_five_intro_text_three'); ?>
              </p>


              <h3 class="small-title scale-32-24-21 top"><?php the_field('part_five_intro_title_three'); ?></h3>


              <p class="scale-18-18-16"><?php the_field('part_five_sub_three_three'); ?></p>

              <div class="localvid joc">
                <?php
                if (pll_current_language('slug') == 'cn') {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/m3d_distractedkiller_clown_01_en_ctv_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                } else {
                  echo ' <video controls  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/m3d_distractedkiller_clown_01_en_ctv_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
                };
                ?>


                <p class="video-caption fixed-16"><?php the_field('part_five_intro_video_cap_four'); ?></p>
              </div>

            </div>

            <div class=" second-end end-section">
              <object data="/wp-content/themes/applovin/images/break4x.png" title="sparklab-report"></object>
            </div>

            <div class="conclusion-section section" id="ccp">
              <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_six'); ?></h2>

              <p class="scale-18-18-16"><?php the_field('conclusion_intro'); ?></p>

              <div class="grid-success grid-wild">
                <object data="<?php the_field('success_img_three'); ?>" title="ctv-report"></object>
                <div class="grid-success-text">
                  <div class="success-mini-h">
                    <p class="fixed-12"><?php the_field('success_tittle_three'); ?></p>

                  </div>
                  <p class="scale-18-18-16"><?php the_field('success_text_three'); ?></p>
                  <a class="scale-18-18-16 promo-link" href="<?php the_field('success_url_three'); ?>" target="_blank"><?php the_field('success_link_three'); ?></a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="row cta cta-dark">
      <div class="inner-wrap inner-wrap-600">
        <img class="cta-logo" src="/wp-content/themes/applovin/images/logo_sparklabs_primary_white.svg" alt="SparkLabs Logo" />
        <p class="fixed-12"><?php the_field('success_tittle_two'); ?></p>

        <h2 class="scale-36-30-24"><?php the_field('cta_title'); ?></h2>
        <div class="links-cta">
          <a class="btn-standard cta-pop-form scale-21-21-18" href="../../sparklabs/"><?php the_field('cta_btn'); ?></a><a href="https://try.applovin.com/sparklabs-contact" class="second-cta fixed-16"><?php the_field('cta_work'); ?></a>
        </div>
      </div>
    </div>

  </div>
</div>


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  jQuery(window).scroll(function() { //on scroll event on window
    var position = jQuery(this).scrollTop(); //position scrolled

    jQuery('.section').each(function() { //check class section element

      var target = Math.floor(jQuery(this).offset().top) - 100; //each element position from top - 100px for header bar
      var targetBot = target + Math.floor(jQuery(this).height()) + 96; //add bottom padding

      var id = jQuery(this).attr('id'); //this element ID - should be same as data-id on your nav link
      jQuery('nav a[data-id=' + id + ']').removeClass('hovered');
      if (position >= target && targetBot > position) {
        jQuery('nav a[data-id=' + id + ']').addClass('hovered');
        //data-id need to be the same than id always
      }

    });

  });
</script>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  if (window.innerWidth < 1024) {
    var accqa = document.getElementsByClassName("menu-title");
    var clkmn = document.getElementsByClassName("menu-link");

    var f;
    var x;

    for (f = 0; f < accqa.length; f++) {
      accqa[f].addEventListener("click", function() {
        Array.from(document.getElementsByClassName("menu-link")).map(function(elem) {
          if (elem.style.display === "none") {
            elem.style.display = "block";
            accqa[0].classList.add("open");
          } else {
            elem.style.display = "none";
            accqa[0].classList.remove("open");
          }
        })
      });
    };

    for (x = 0; x < clkmn.length; x++) {
      clkmn[x].addEventListener("click", function() {
        Array.from(document.getElementsByClassName("menu-link")).map(function(elem) {

          if (elem.style.display === "block") {
            elem.style.display = "none";
            accqa[0].classList.remove("open");
          }

        });

      });
    }

  }
</script>

<?php get_footer(); ?>