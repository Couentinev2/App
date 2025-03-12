<?php
/*
Template Name: CTV Report Page
*/
?>
<?php get_header(); ?>


<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/hero-with-overflow-logo.css' type='text/css' media='' />



<link rel='stylesheet' id='applovin-style-css' href='/wp-content/themes/applovin/css/ctv-report.css' type='text/css' media='' />


<div class="contentPage">

  <?php $langDetect = get_language_attributes(); ?>



  <div id="page-ctv-report">



    <div class="hero-center row" style="background-image: url('<?php the_field('hero_main_image'); ?>'), url('<?php the_field('hero_secondary_image'); ?>'), linear-gradient(#F7F8FC , #E0DFF4) ;">
      <div class="inner-wrap inner-wrap-1200">
        <div class="hero-div1">
          <img src="<?php the_field('hero_logo'); ?>" alt="AppDiscovery Logo">

          <h1 class="scale-60-50-32">
            <?php the_field('hero_title'); ?>
          </h1>
          <p class="scale-21-21-18">
            <?php the_field('hero_text'); ?>
          </p>
          <a href="<?php the_field('cta_url'); ?>" class="btn-standard cta-pop-form scale-21-21-18"><?php the_field('hero_cta'); ?></a>
        </div>
      </div>



    </div>

    <div class="over-page-content">
      <div class="inner-wrap inner-wrap-1200">
        <div class="page-content">

          <nav class="side-menu">

            <p class="menu-title"><?php the_field('menu_main_title'); ?></p>
            <a href="#idt" data-id="idt" class="menu-link fixed-16"><?php the_field('menu_title_one'); ?></a>
            <a href="#met" data-id="met" class="menu-link fixed-16"><?php the_field('menu_title_two'); ?></a>
            <a href="#tps" data-id="tps" class="menu-link fixed-16"><?php the_field('menu_title_three'); ?></a>
            <a href="#vtt" data-id="vtt" class="menu-link fixed-16"><?php the_field('menu_title_four'); ?></a>
            <a href="#ccl" data-id="ccl" class="menu-link fixed-16"><?php the_field('menu_title_five'); ?></a>

            <hr />
          </nav>

          <div class="main-content">

            <div class="intro-section section" id="idt">
              <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_one'); ?></h2>
              <p class="scale-18-18-16"><?php the_field('intro_part_one'); ?>
              <p>

              <div class="key-section section">
                <object data="<?php the_field('key_img_one'); ?>" title="ctv-report"></object>

                <p class="scale-18-18-16"> <?php the_field('key_title'); ?></p>

              </div>
              <p class="scale-18-18-16 under-grey"><?php the_field('intro_part_under_grey'); ?></p>



              <div class="point-section section">
                <h3 class="scale-24-21-18"> <?php the_field('points_title'); ?></h3>
                <ul class="scale-18-18-16">
                  <?php the_field('key_points'); ?>


                </ul>

              </div>

            </div>
            <div class="end-section first-end">
              <object data="/wp-content/uploads/2023/09/img_ctv_report_section_break_1_applovin.png" title="sparklab-report"></object>
            </div>
            <div class="metho-section section" id="met">
              <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_two'); ?></h2>
              <p class="scale-21-21-18 metho-sub-t"><strong><?php the_field('intro_title_two'); ?></strong></p>
              <p class="scale-18-18-16"><?php the_field('intro_part_two'); ?>
              </p><br>


              <object class="break-image" data="<?php the_field('part_two_image'); ?>" title="<?php the_field('part_two_image_description'); ?>"></object>

              <p class="scale-18-18-16 mt-under-img"><?php the_field('mini_part_data'); ?></p>


              <div class="funfact">
                <img src="../../wp-content/themes/applovin/images/img_ctv_report_fast_pass_applovin.png" alt="fun-fact-img">
                <div class="funfact-text">
                  <p class="funfact-title fixed-14"><?php the_field('fun_fact_part_two'); ?></p>
                  <p class="scale-18-18-16 "><?php the_field('part_two_funfact_one'); ?>
                  </p>
                </div>
              </div>

              <p class="scale-18-18-16 under-f-fact"><?php the_field('intro_part_data'); ?></p>

              <div class="keyrep-one">
                <div class="key-section section">
                  <object data="<?php the_field('rep_img_one'); ?>" title="ctv-report"></object>
                  <p class="fixed-14 rep-tt"> <?php the_field('rep_title_one'); ?></p>

                  <p class="scale-18-18-16"> <?php the_field('rep_text_one'); ?></p>

                </div>


                <div class="key-section section">
                  <object data="<?php the_field('rep_img_two'); ?>" title="ctv-report"></object>
                  <p class="fixed-14 rep-tt"><?php the_field('rep_title_two'); ?></p>

                  <p class="scale-18-18-16"><?php the_field('rep_text_two'); ?></p>

                </div>


              </div>

              <h3 class="scale-32-24-21 section-tt"><?php the_field('sub_t_two'); ?></h3>

              <div class="keyrep-two">
                <div class="key-section section">
                  <p class="scale-32-24-21 rep-tt-stats"><?php the_field('rep_title_three'); ?></p>

                  <p class="scale-18-18-16"><?php the_field('rep_text_three'); ?></p>

                </div>


                <div class="key-section section">
                  <p class="scale-32-24-21  rep-tt-stats"><?php the_field('rep_title_four'); ?></p>

                  <p class="scale-18-18-16"><?php the_field('rep_text_four'); ?></p>

                </div>

                <div class="key-section section">
                  <p class="scale-32-24-21 rep-tt-stats"><?php the_field('rep_title_five'); ?></p>

                  <p class="scale-18-18-16"><?php the_field('rep_text_five'); ?></p>

                </div>


              </div>

              <div class="keyrep-three">
                <div class="key-section section">
                  <p class="scale-32-24-21 rep-tt-stats"><?php the_field('rep_title_six'); ?></p>

                  <p class="scale-18-18-16"><?php the_field('rep_text_six'); ?></p>

                </div>


                <div class="key-section section">
                  <p class="scale-32-24-21  rep-tt-stats"><?php the_field('rep_title_seven'); ?></p>

                  <p class="scale-18-18-16"><?php the_field('rep_text_seven'); ?></p>

                </div>


              </div>


              <div class="key-section section section-exp">
                <div class="text-part-bs">
                  <p class="scale-32-24-21 rep-tt-stats"><?php the_field('rep_title_height'); ?></p>

                  <p class="scale-18-18-16"><?php the_field('rep_text_height'); ?></p>
                </div>
                <object data="<?php the_field('rep_img_height'); ?>" title="ctv-report" class="dsk"></object>
                <object data="<?php the_field('rep_img_height_mbl'); ?>" title="ctv-report" class="mbl"></object>
                <!--  <p class="fixed-16 video-caption "><?php the_field('caption_height_text'); ?></p> -->

              </div>

              <div class="eff-section">
                <h3 class="scale-32-24-21 section-tt section-tt-w-b"><?php the_field('sub_t_three'); ?></h3>

                <p class="scale-18-18-16"><?php the_field('eff_text_one'); ?></p>

                <object data="<?php the_field('eff_img'); ?>" title="ctv-report"></object>

                <p class="scale-18-18-16"><?php the_field('eff_text_two'); ?></p>


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
                <div>
                  <div class="card">
                    <div class="mini-cardsec">
                      <img class="inter-logo" src="<?php the_field('success_cta_logo_one'); ?>" alt="SparkLab">
                      <p class="scale-24-21-18"><?php the_field('success_cta_text_one'); ?></p>
                    </div>
                    <div class="hyp-c">
                      <a class="scale-18-18-16 btn-standard link-an link-header cta-pop-form" href="<?php the_field('success_cta_url_one'); ?>"><?php the_field('success_cta_link_one'); ?></a>
                    </div>
                  </div>
                  <div class="shadow-card"></div>
                </div>
                <div class="end-section">
                  <object data="/wp-content/uploads/2023/09/img_ctv_report_section_break_2_applovin.png" title="sparklab-report"></object>
                </div>
              </div>
            </div>




            <div class="top-perf-section section" id="tps">
              <h2 class="scale-36-30-24  menu-jump"><?php the_field('menu_title_three'); ?></h2>

              <p class="scale-18-18-16"><?php the_field('part_three_sub_text_one'); ?>
              </p>


              <h3 class="mini-t scale-32-24-21"><?php the_field('part_three_breakdown_one_title'); ?></h3>

              <p class="scale-18-18-16 b-i"><?php the_field('part_three_highlight_one'); ?></p>

              <object class="break-image" data="<?php the_field('part_three_breakdown_one_image'); ?>" title="<?php the_field('part_three_breakdown_one_image_description'); ?>"></object>

              <div class="grid-cl-nb">
                <div class="cl-nb-card">
                  <p class="number scale-18-18-16">1</p>
                  <p class="mc-tt scale-21-21-18"><?php the_field('part_three_cards_cl_tt_one'); ?></p>
                  <p class="scale-18-18-16"><?php the_field('part_three_cards_cl_text_one'); ?></p>
                </div>
                <div class="cl-nb-card">
                  <p class="number scale-18-18-16">2</p>
                  <p class="mc-tt scale-21-21-18"><?php the_field('part_three_cards_cl_tt_two'); ?></p>
                  <p class="scale-18-18-16"><?php the_field('part_three_cards_cl_text_two'); ?></p>
                </div>
                <div class="cl-nb-card">
                  <p class="number scale-18-18-16">3</p>
                  <p class="mc-tt scale-21-21-18"><?php the_field('part_three_cards_cl_tt_three'); ?></p>
                  <p class="scale-18-18-16"><?php the_field('part_three_cards_cl_text_three'); ?></p>
                </div>
                <div class="cl-nb-card dg">
                  <p class="number scale-18-18-16">4</p>
                  <p class="mc-tt scale-21-21-18"><?php the_field('part_three_cards_cl_tt_four'); ?></p>
                  <p class="scale-18-18-16"><?php the_field('part_three_cards_cl_text_four'); ?></p>
                </div>
              </div>

              <div class="incre-int">
                <p class="scale-18-18-16 br-c"><?php the_field('part_three_sub_text_two'); ?></p>

                <p class="scale-18-18-16"><?php the_field('part_three_sub_text_two_second'); ?></p>


                <h3 class="mini-t scale-32-24-21"><?php the_field('part_three_breakdown_two_title'); ?></h3>


                <p class="scale-18-18-16"><?php the_field('part_three_sub_text_two_third'); ?></p>

                <div class="key-section key-bis section">
                  <object data="<?php the_field('key_img_one_two'); ?>" title="ctv-report"></object>

                  <p class="scale-18-18-16"> <?php the_field('key_title_two'); ?></p>

                </div>

                <h3 class="mini-t scale-32-24-21"><?php the_field('part_three_breakdown_two_title_two'); ?></h3>

                <p class=" sub-text scale-18-18-16"><?php the_field('part_three_sub_text_two_four'); ?></p>
              </div>

              <div class="quote-ctv">
                <object class="c-quote" data="/wp-content/themes/applovin/images/icon_quotation.svg" title="ctv-report"></object>

                <p class="scale-21-21-18"><?php the_field('quote_ctv_one'); ?></p>
                <div class="speaker-info">
                  <p class="fixed-16 sparker-ctv"><?php the_field('quote_speaker_ctv_one'); ?></p>
                  <p class="fixed-16"><?php the_field('quote_s_job_ctv_one'); ?></p>
                </div>
                <object class="logo-success" data="<?php the_field('logo_quote_one'); ?>" title="ctv-report"></object>

              </div>



              <div class="grid-success success-second">
                <object data="<?php the_field('success_img_two'); ?>" title="ctv-report"></object>
                <div class="grid-success-text">
                  <div class="success-mini-h">
                    <object data="<?php the_field('success_logo_two'); ?>" title="ctv-report"></object>
                    <p class="fixed-12"><?php the_field('success_tittle'); ?></p>

                  </div>
                  <p class="scale-18-18-16"><?php the_field('success_text_two'); ?></p>
                  <a class="scale-18-18-16 promo-link" href="<?php the_field('success_url_two'); ?>" target="_blank"><?php the_field('success_link_two'); ?></a>
                </div>
              </div>

              <div>
                <div class="card card-second">
                  <div class="mini-cardsec">
                    <img class="inter-logo" src="<?php the_field('success_cta_logo_one'); ?>" alt="SparkLab">
                    <p class="scale-24-21-18"><?php the_field('success_cta_text_one'); ?></p>
                  </div>
                  <div class="hyp-c">

                    <a class="scale-18-18-16 btn-standard link-an link-header cta-pop-form" href="<?php the_field('success_cta_url_one'); ?>"><?php the_field('success_cta_link_one'); ?></a>
                  </div>
                </div>
                <div class="shadow-card"></div>
              </div>
              <div class="end-section">
                <object data="/wp-content/uploads/2023/09/img_ctv_report_section_break_3_applovin.png" title="sparklab-report"></object>
              </div>
            </div>


            <div class="var-try-section section" id="vtt">
              <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_four'); ?></h2>
              <p class="scale-18-18-16"><?php the_field('part_four_intro_one'); ?></p>

              <div class="key-section key-ter section">
                <object data="<?php the_field('key_img_one_three'); ?>" title="ctv-report"></object>

                <p class="scale-18-18-16"> <?php the_field('key_title_three'); ?></p>

              </div>

              <p class="scale-18-18-16"><?php the_field('part_four_intro_two'); ?></p>


              <object class="cyv-cr-image dsk" data="<?php the_field('part_four_sub_one_img'); ?>" title="<?php the_field('part_four_sub_one_img_description'); ?>"></object>
              <object class="cyv-cr-image mbl" data="<?php the_field('part_four_sub_one_img_mbl'); ?>" title="<?php the_field('part_four_sub_one_img_description'); ?>"></object>

              <p class="scale-18-18-16"><?php the_field('part_four_sub_one_intro'); ?></p>


              <div class="point-section point-two section">
                <h3 class="scale-24-21-18"> <?php the_field('points_title_two'); ?></h3>
                <ul class="scale-18-18-16">
                  <?php the_field('key_points_two'); ?>

                </ul>
              </div>


              <div class="quote-ctv quote-ctv-two">
                <object class="c-quote" data="/wp-content/themes/applovin/images/icon_quotation.svg" title="ctv-report"></object>

                <p class="scale-21-21-18"><?php the_field('quote_ctv_two'); ?></p>

                <div class="speaker-info">
                  <p class="fixed-16 sparker-ctv"><?php the_field('quote_speaker_ctv_two'); ?></p>
                  <p class="fixed-16"><?php the_field('quote_s_job_ctv_two'); ?></p>
                </div>
                <object class="logo-success" data="<?php the_field('logo_quote_two'); ?>" title="ctv-report"></object>

              </div>

              <h3 class="scale-32-24-21 section-tt-ll"><?php the_field('part_four_sub_one_title'); ?></h3>

              <div class="localvid">

                <h3 class="scale-24-21-18"><?php the_field('part_four_sub_one_text_one'); ?></h3>
                <p class="scale-18-18-16"><?php the_field('part_four_sub_one_text_two'); ?></p>

                <div class="localvid-cn localiframe">

                  <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                    <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/xb5ir31f6r?seo=true&videoFoam=true" title="Wordscapes: Shakespeare Video" allow="autoplay; fullscreen" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" msallowfullscreen width="100%" height="100%"></iframe></div>
                  </div>
                  <script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>

                  <p class="video-caption fixed-16"><?php the_field('part_three_sub_one_text_video'); ?></p>
                </div>
              </div>



              <div class="localvid">

                <h3 class="scale-24-21-18"><?php the_field('part_four_sub_two_text_one'); ?></h3>
                <p class="scale-18-18-16"><?php the_field('part_four_sub_two_text_two'); ?></p>

                <div class="localvid-cn localiframe">

                  <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                    <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/9936mvbf3o?seo=true&videoFoam=true" title="Project Makeover: Mona Lisa Makeover Video" allow="autoplay; fullscreen" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" msallowfullscreen width="100%" height="100%"></iframe></div>
                  </div>
                  <script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>

                  <p class="video-caption fixed-16"><?php the_field('part_three_sub_two_text_video'); ?></p>
                </div>
              </div>



              <div class="localvid">

                <h3 class="scale-24-21-18"><?php the_field('part_four_sub_three_text_one'); ?></h3>
                <p class="scale-18-18-16"><?php the_field('part_four_sub_three_text_two'); ?></p>

                <div class="localvid-cn localiframe">
                  <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                    <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/4v4bcxxqnb?seo=true&videoFoam=true" title="Wordscapes: Disappointed Grandma (Mobile) Video" allow="autoplay; fullscreen" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" msallowfullscreen width="100%" height="100%"></iframe></div>
                  </div>
                  <script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>

                  <p class="video-caption fixed-16"><?php the_field('part_three_sub_three_text_video'); ?></p>
                </div>
                <div class="localvid-cn localiframe">
                  <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                    <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><iframe src="https://fast.wistia.net/embed/iframe/wkxp17ce5a?seo=true&videoFoam=true" title="Wordscapes: Disappointed Grandma (CTV) Video" allow="autoplay; fullscreen" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" msallowfullscreen width="100%" height="100%"></iframe></div>
                  </div>
                  <script src="https://fast.wistia.net/assets/external/E-v1.js" async></script>

                  <p class="video-caption fixed-16"><?php the_field('part_three_sub_four_text_video'); ?></p>
                </div>
              </div>

              <div class="webinar-sec">
                <div class="webinar-gird">

                  <div class="webinar-img">
                    <object data="<?php the_field('webinar_img'); ?>" title="sparklab-report"></object>
                  </div>

                  <div class="webinar-txt">
                    <p class="fixed-12 webtt"><?php the_field('webinar_tt'); ?></p>
                    <p class="scale-18-18-16"><?php the_field('webinar_text'); ?></p>

                  </div>

                </div>
              </div>

              <div class="end-section">
                <object data="/wp-content/uploads/2023/09/img_ctv_report_section_break_4_applovin.png" title="sparklab-report"></object>
              </div>

            </div>










            <div class="conclusion-section section" id="ccl">
              <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_five'); ?></h2>
              <p class="scale-18-18-16"><?php the_field('conclusion_intro'); ?></p>
              <p class="fixed-14 footer-cc" id="footnote"><?php the_field('conclusion_final_word'); ?></p>

            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="row cta">
      <div class="inner-wrap inner-wrap-600">
        <img src="<?php the_field('hero_logo'); ?>" alt="AppDiscovery Logo">
        <h2 class="scale-36-30-24 menu-jump"><?php the_field('form_tite'); ?></h2>
        <div class="form-bt" id="form">
          <?php the_field('ctv_form'); ?>
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