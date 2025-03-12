<?php
/*
Template Name: Sparklab Report Page
*/
?>
<?php get_header(); ?>

  
<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/hero-with-overflow-logo.css' type='text/css' media='' />



<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/sparklab-report.css' type='text/css' media='' />


  <div class="contentPage">
    
  <?php $langDetect = get_language_attributes(); ?> 



<div id="page-sparklab-report">



<?php include('pagessections/hero-w-floating.php'); ?>


<div class="over-page-content">
<div class="inner-wrap inner-wrap-1200">
<div class="page-content">

<nav class="side-menu"> 

<p class="menu-title"><?php the_field('menu_main_title'); ?></p>
<a href="#idt" data-id="idt" class="menu-link"><?php the_field('menu_title_one'); ?></a>
<a href="#met" data-id="met" class="menu-link"><?php the_field('menu_title_two'); ?></a>
<a  href="#tps" data-id="tps" class="menu-link"><?php the_field('menu_title_three'); ?></a>
<a href="#vtt" data-id="vtt" class="menu-link"><?php the_field('menu_title_four'); ?></a>
<a href="#ccl" data-id="ccl" class="menu-link"><?php the_field('menu_title_five'); ?></a>

<hr/>
</nav>

<div class="main-content">

<div class="intro-section section"  id="idt">
<h2 class="scale-36-30-24 menu-jump" ><?php the_field('menu_title_one'); ?></h2>
<p class="scale-18-18-16"><?php the_field('intro_part_one'); ?><p>

<div class="key-section section">
  <h3 class="scale-21-21-18">  <?php the_field('key_title'); ?></h3>
  <ul>
  <?php the_field('key_points'); ?>
 
  </ul>
  
</div>
</div>
<div class="metho-section section"  id="met">
  <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_two'); ?></h2>
<p class="scale-18-18-16"><?php the_field('intro_part_two'); ?>
</p><br>

<p class="scale-18-18-16"><?php the_field('intro_part_data'); ?></p>
<div class="repeter-analyze">

<?php if( have_rows('analyze_repeater') ): ?> 
                <?php while( have_rows('analyze_repeater') ): the_row();?>
    <div class="analyze-repeater">    
          <h2 class="scale-32-24-21"><?php the_sub_field('title_data'); ?>
        </h2>
          <p class="scale-18-18-16"><?php the_sub_field('data_text'); ?></p>
          </div>    
                        <?php endwhile; ?>
              <?php endif; ?>

</div>

<p class="scale-18-18-16">
  <?php the_field('part_two_final'); ?>
</p>
<div class="end-section">
<object data="/wp-content/themes/applovin/images/img_sparklabs_report_section_break_top_performing_concepts.png" title="sparklab-report"></object>
</div>
</div>

<div class="top-perf-section section" id="tps">
  <h2 class="scale-36-30-24  menu-jump" ><?php the_field('menu_title_three'); ?></h2>
  <h3 class="scale-32-24-21"><?php the_field('part_three_sub_title_one'); ?></h3>

<p class="scale-18-18-16"><?php the_field('part_three_sub_text_one'); ?>
</p>
<div class="localvid">
    <?php
      if ( pll_current_language('slug') == 'cn' ) {
        echo ' <video  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/mm_renovatecastle_playableclip_01_zhcn_video_9s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
      } else {
 echo ' <video  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/matchington_mansion-sl-web.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>  ';
      };
?>

<p class="video-caption fixed-16"><?php the_field('part_three_sub_one_text_video'); ?></p>
</div>

<h3 class="small-title scale-18-18-16"><?php the_field('part_three_breakdown_one_title'); ?></h3>

<object class="break-image" data="<?php the_field('part_three_breakdown_one_image'); ?>" title="<?php the_field('part_three_breakdown_one_image_description'); ?>"></object>


<div class="higlight-b">
  <p class="scale-18-18-16"><?php the_field('part_three_highlight_one'); ?>
</p>
</div>

<div class="funfact">
  <img src="/wp-content/themes/applovin/images/img_sparklabs_report_fun_fact_mud_girl.png" alt="fun-fact-img">
  <div class="funfact-text">
  <p class="funfact-title fixed-14"><?php the_field('fun_fact'); ?></p>
  <p class="scale-21-21-18"><?php the_field('part_three_funfact_one'); ?>
  </p>
  </div>
</div>


  <h3 class="scale-32-24-21 mid-section"><?php the_field('part_three_sub_title_two'); ?></h3>


<p class="scale-18-18-16"><?php the_field('part_three_sub_text_two'); ?></p><br>

<p class="scale-18-18-16"><?php the_field('part_three_sub_text_two_second'); ?></p><br>

<p class="scale-18-18-16"><?php the_field('part_three_sub_text_two_third'); ?></p>


<div class="localvid">
      <?php
      if ( pll_current_language('slug') == 'cn' ) {
        echo ' <video  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/m3d_mergealongpathbrainage_01_zhcn_video_27s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
      } else {
 echo ' <video  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/match3d-v2-sl-web.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
      };
?>


<p class="video-caption fixed-16"><?php the_field('part_three_sub_two_text_video'); ?></p>
</div>
<p class=" sub-text-video scale-18-18-16"><?php the_field('part_three_sub_text_two_four'); ?></p>

  <h3 class="scale-32-24-21 mid-section"><?php the_field('part_three_sub_title_three'); ?></h3>


<p class="scale-18-18-16"><?php the_field('part_three_sub_text_three'); ?></p><br>

<p class="scale-18-18-16"><?php the_field('part_three_sub_text_three_two'); ?></p>

<div class="localvid">
        <?php
      if ( pll_current_language('slug') == 'cn' ) {
        echo '<video autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/sa_gmply_3dstorychoices_01_zhcn_video_29s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>';
      } else {
 echo ' <video autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/sarahs_adventure-sl-web.mp4" type="video/mp4">
Your browser does not support the video tag.
</video>';
      };
?>
 
<p class="video-caption fixed-16"><?php the_field('part_three_sub_three_text_video'); ?></p>
</div>
<p class=" sub-text-video scale-18-18-16"><?php the_field('part_three_sub_text_three_three'); ?></p>


 <h3 class="scale-32-24-21 mid-section"><?php the_field('part_three_sub_title_four'); ?></h3>


<p class="scale-18-18-16"><?php the_field('part_three_sub_text_four'); ?></p>

<div class="localvid">
        <?php
      if ( pll_current_language('slug') == 'cn' ) {
        echo ' <video  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/sr_brainage_charreactv2_01_zhcn_video_30s_1920x1080.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
      } else {
 echo ' <video  autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/wordscapes_search-sl-web.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
      };
?>


<p class="video-caption fixed-16"><?php the_field('part_three_sub_four_text_video'); ?></p>
</div>

<h3 class="small-title scale-18-18-16"><?php the_field('part_three_sub_four_data_img_title'); ?></h3>

<object class="break-image" data="<?php the_field('part_three_sub_four_breakdown_one_image'); ?>" title="<?php the_field('part_three_sub_four_breakdown_one_image_title'); ?>"></object>

<div class="higlight-b">
  <p class="scale-18-18-16"><?php the_field('part_three_highlight_two'); ?></p>
</div>

<div class="funfact grandma-fact">
  <img class="grandma" src="/wp-content/themes/applovin/images/img_sparklabs_report_fun_fact_grandma.png" alt="fun-fact-img">
  <div class="funfact-text">

  <p class="funfact-title fixed-14"><?php the_field('fun_fact'); ?></p>
  <p class="scale-21-21-18"><?php the_field('part_three_funfact_two'); ?></p>
  </div>
</div>

<h3 class="scale-32-24-21 mid-section"><?php the_field('part_three_sub_title_five'); ?></h3>


<p class="scale-18-18-16"><?php the_field('part_three_sub_text_five_one'); ?></p><br>

<p class="scale-18-18-16"><?php the_field('part_three_sub_text_five_two'); ?></p>



          <?php
      if ( pll_current_language('slug') == 'cn' ) {

        echo '
        <div class="localvid-cn localiframe">
        <script src="https://fast.wistia.com/embed/medias/3jn2i86u2x.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="testfram wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_3jn2i86u2x videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/3jn2i86u2x/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>';
      } else {
 echo '
<div class="localvid localiframe">
 <div class="testfram" style="padding:calc(56.25% + 12px) 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/788796271?h=988637f9dc&color=00b6e0&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
';
      };
?>


<p class="video-caption fixed-16"><?php the_field('part_three_sub_five_text_video'); ?></p>
</div>

<h3 class="small-title scale-18-18-16"><?php the_field('part_three_sub_five_data_img_title'); ?></h3>

<object class="break-image" data="<?php the_field('part_three_sub_five_data_img'); ?>" title="<?php the_field('part_three_sub_five_data_img_alt'); ?>"></object>

<div class="higlight-b">
  <p class="scale-18-18-16"><?php the_field('part_three_highlight_three'); ?></p>
</div>

<h3 class="scale-32-24-21 mid-section"><?php the_field('part_three_sub_six_title'); ?></h3>


<p class="scale-18-18-16"><?php the_field('part_three_sub_six_intro'); ?></p><br>

<p class="scale-18-18-16"><?php the_field('part_three_sub_six_intro_part_two'); ?></p>

<div class="localvid">
          <?php
      if ( pll_current_language('slug') == 'cn' ) {
        echo ' <video autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/tile_garden-sl-web_CHS_rev01.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
      } else {
 echo ' <video autoplay muted loop playsinline>
  <source src="/wp-content/themes/applovin/images/tile_garden-sl-web.mp4" type="video/mp4">
Your browser does not support the video tag.
</video> ';
      };
?>


<p class="video-caption fixed-16"><?php the_field('part_three_sub_six_video_text'); ?></p>
</div>

<h3 class="small-title scale-18-18-16"><?php the_field('part_three_sub_six_img_title'); ?></h3>

<object class="break-image" data="<?php the_field('part_three_sub_six_img'); ?>" title="<?php the_field('part_three_sub_six_img_description'); ?>"></object>

<div class="higlight-b">
  <p class="scale-18-18-16"><?php the_field('part_three_highlight_four'); ?></p>
</div>
<div class=" second-end end-section">
<object data="/wp-content/themes/applovin/images/img_sparklabs_report_section_break_variables_to_try.svg" title="sparklab-report"></object>
</div>

</div>



<div class="var-try-section section"  id="vtt">
  <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_four'); ?></h2>
<p class="scale-18-18-16"><?php the_field('part_four_intro_one'); ?></p><br>

<p class="scale-18-18-16"><?php the_field('part_four_intro_two'); ?></p>


  <h3 class="scale-32-24-21"><?php the_field('part_four_sub_one_title'); ?></h3>


<p class="scale-21-21-18"><?php the_field('part_four_sub_one_intro'); ?></p>

<h3 class="small-title scale-18-18-16"><?php the_field('part_four_sub_one_img_title'); ?></h3>

<object class="break-image" data="<?php the_field('part_four_sub_one_img'); ?>" title="<?php the_field('part_four_sub_one_img_description'); ?>"></object>

<p class="scale-18-18-16" style="margin-top: 24px;"><?php the_field('part_four_sub_one_text_one'); ?></p><br>
<p class="scale-18-18-16"><?php the_field('part_four_sub_one_text_two'); ?></p>


<h3 class="scale-32-24-21 mid-section"><?php the_field('part_four_sub_two_title'); ?></h3>


<p class="scale-21-21-18"><?php the_field('part_four_sub_two_intro'); ?></p>

<h3 class="small-title scale-18-18-16"><?php the_field('part_four_sub_two_img_title'); ?></h3>

<object class="break-image" data="<?php the_field('part_four_sub_two_img'); ?>" title="<?php the_field('part_four_sub_two_img_description'); ?>"></object>

<p class="scale-18-18-16" style="margin-top: 24px;"><?php the_field('part_four_sub_two_text'); ?></p>


<h3 class="scale-32-24-21 mid-section"><?php the_field('part_four_sub_three_title'); ?></h3>


<p class="scale-21-21-18"><?php the_field('part_four_sub_three_intro'); ?></p>

<h3 class="small-title scale-18-18-16"><?php the_field('part_four_sub_three_img_title'); ?></h3>

<object class="break-image" data="<?php the_field('part_four_sub_three_img'); ?>" title="<?php the_field('part_four_sub_three_img_description'); ?>"></object>

<p class="scale-18-18-16" style="margin-top: 24px;"><?php the_field('part_four_sub_three_text'); ?></p>

<div class="higlight-b">
  <p class="scale-18-18-16"><?php the_field('part_four_highlight'); ?></p>
</div>


<h3 class="scale-32-24-21 mid-section"><?php the_field('part_four_sub_four_title'); ?></h3>


<p class="scale-21-21-18"><?php the_field('part_four_sub_four_intro'); ?></p>

<h3 class="small-title scale-18-18-16"><?php the_field('part_four_sub_four_img_title'); ?></h3>

<object class="break-image" data="<?php the_field('part_four_sub_four_img'); ?>" title="<?php the_field('part_four_sub_four_img_description'); ?>"></object>

<p class="scale-18-18-16" style="margin-top: 24px;"><?php the_field('part_four_sub_four_txt'); ?></p>

<h3 class="small-title scale-18-18-16" style="margin: 24px 0";></h3>

<ul >

  <?php if( have_rows('final_list_repeater') ): ?> 
                <?php while( have_rows('final_list_repeater') ): the_row();?>
                    <li><?php the_sub_field('final_list_point'); ?></li>
   
                        <?php endwhile; ?>
              <?php endif; ?>

</ul>


<div class=" second-end end-section">
<object data="/wp-content/themes/applovin/images/img_sparklabs_report_section_break_conclusion.png" title="sparklab-report"></object>
</div>

</div>

<div class="conclusion-section section"  id="ccl">
  <h2 class="scale-36-30-24 menu-jump"><?php the_field('menu_title_five'); ?></h2>
<p class="scale-18-18-16"><?php the_field('conclusion_intro'); ?></p><br>
<p><?php the_field('conclusion_final_word'); ?></p>

</div>
</div>

</div>
</div>
</div>

<div class="row cta cta-dark">
<div class="inner-wrap inner-wrap-600">
            <img class="cta-logo" src="/wp-content/themes/applovin/images/sparklabs_primary_horizontal_white.svg" alt="SparkLabs Logo" />

        <h2 class="scale-36-30-24"><?php the_field('cta_title'); ?></h2>
        <div class="links-cta">
        <a class="btn-standard cta-pop-form scale-21-21-18" href="../../sparklabs/"><?php the_field('cta_btn'); ?></a><a href="https://try.applovin.com/sparklabs-contact" class="second-cta fixed-16"><?php the_field('cta_work'); ?></a>
</div>
</div>
</div>
<!-- -->
</div>
</div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
jQuery(window).scroll(function () { //on scroll event on window
        var position = jQuery(this).scrollTop(); //position scrolled
  
        jQuery('.section').each(function() { //check class section element

  var target = Math.floor(jQuery(this).offset().top) - 100;//each element position from top - 100px for header bar
            var targetBot = target + Math.floor(jQuery(this).height()) + 96;//add bottom padding

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
if ( window.innerWidth < 1024 ) {
  var accqa = document.getElementsByClassName("menu-title");
  var clkmn = document.getElementsByClassName("menu-link");

var f;
var x;

for (f = 0; f < accqa.length; f++) {
  accqa[f].addEventListener("click", function() {
   Array.from(document.getElementsByClassName("menu-link")).map(function(elem){
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
   Array.from(document.getElementsByClassName("menu-link")).map(function(elem){

    if (elem.style.display === "block") { 
      elem.style.display = "none"; 
      accqa[0].classList.remove("open");}

    });

  });
}

}



  </script>

<?php get_footer(); ?>