<?php
/*
Template Name: Rewards + Page
*/
?>
<?php get_header(); ?>
<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/rewardsplus-page.css' type='text/css' media='' />

<div class="rewards-page">
  <div class="hero-center row" style="background-image :url('<?php the_field('hero_center_image'); ?>'),url('<?php the_field('hero_center_blur'); ?>'), url('<?php the_field('hero_center_second_image'); ?>')  ;">
  <div class="inner-wrap inner-wrap-1200">
    <div class="hero-div1">
       <img src="<?php the_field('hero_logo'); ?>" alt="Logo" class="logo-hero">

      <h1 class="scale-60-50-32"><?php the_field('hero_title'); ?></h1>
      <p class="scale-21-21-18"><?php the_field('hero_text'); ?></p>
      <a class="btn-standard scale-21-21-18" href="<?php the_field('hero_cta_link'); ?>" target="_blank"><?php the_field('hero_cta_text'); ?></a>

    </div>
</div>
</div>

<div class="temendous-section">

      <div class="inner-wrap inner-wrap-1200">
        <div class="temendous-header">   
           <h2 class="scale-36-30-24"><?php the_field('temendous_main_title_one'); ?></h2>
      <p class="scale-21-21-18"><?php the_field('temendous_main_text_one'); ?></p>
</div>

      <div class="temendous-grid temendous-grid-one">

    <div class="temendous-div1">
        <h2 class="scale-32-24-21"><?php the_field('temendous_title_one'); ?></h2>
      <p class="scale-18-18-16"><?php the_field('temendous_text_one'); ?></p>
    </div>

        <div class="temendous-div2">
  <img src="<?php the_field('temendous_img_one'); ?>" alt="<?php the_field('temendous_img_alt_one'); ?>"> 
    </div>
</div>



      <div class="temendous-grid">
        <div class="temendous-div2">
  <img src="<?php the_field('temendous_img'); ?>" alt="<?php the_field('temendous_img_alt'); ?>"> 
 <!-- <div class="text-bb-right">
        <p class="text scale-24-21-18"><?php the_field('temendous_bb_nb'); ?></p><br/>
</div>-->
    </div>
    <div class="temendous-div1">
        <h2 class="scale-32-24-21"><?php the_field('temendous_title'); ?></h2>
      <p class="scale-18-18-16"><?php the_field('temendous_text'); ?></p>
    </div>


</div>

</div>
</div>


<div class="early-section">
      <div class="inner-wrap inner-wrap-1200">

    <div class="early-div1">
        <h2 class="scale-36-30-24"><?php the_field('early_title'); ?></h2>
      <p class="scale-21-21-18"><?php the_field('early_text'); ?></p>
    </div>

        <div class="early-div2">
<div class="mini-pod">
      <img src="<?php the_field('early_pod_image_one'); ?>" alt="<?php the_field('early_pod_alt_one'); ?>"> 

      <p class="scale-21-21-18 early-pod-title"><?php the_field('early_pod_title_one'); ?></p>
      <p class="scale-18-18-16"><?php the_field('early_pod_text_one'); ?></p>

    </div>
    <div class="mini-pod">
      <img src="<?php the_field('early_pod_image_two'); ?>" alt="<?php the_field('early_pod_alt_two'); ?>"> 

      <p class="scale-21-21-18 early-pod-title"><?php the_field('early_pod_title_two'); ?></p>
      <p class="scale-18-18-16"><?php the_field('early_pod_text_two'); ?></p>

    </div>
    <div class="mini-pod">
      <img src="<?php the_field('early_pod_image_three'); ?>" alt="<?php the_field('early_pod_alt_three'); ?>"> 

      <p class="scale-21-21-18 early-pod-title"><?php the_field('early_pod_title_three'); ?></p>
      <p class="scale-18-18-16"><?php the_field('early_pod_text_three'); ?></p>

    </div>
    </div>
</div>
</div>


<div class="shopping-section">
      <div class="inner-wrap inner-wrap-1200">
      <div class="shopping-grid">

    <div class="shopping-div1">
        <h2 class="scale-36-30-24"><?php the_field('shopping_title'); ?></h2>
      <p class="scale-21-21-18"><?php the_field('shopping_text'); ?></p>
    </div>

        <div class="shopping-div2">
  <img src="<?php the_field('shopping_img'); ?>" alt="<?php the_field('shopping_img_alt'); ?>"> 

    </div>
</div>
</div>
</div>


<!--<div class="row success-section">
<div class="inner-wrap inner-wrap-800">

    <div class="partners-div1">
        <h2 class="scale-36-30-24"><?php the_field('partners_title'); ?></h2>
      <p class="scale-21-21-18 cta-firstp"><?php the_field('partners_text'); ?></p>
    </div>

      <div class="success-story-cards-wrap cards-wrap-single hz-scrollable">

        <?php

$featured_posts = get_field('partners_success');
if ($featured_posts):
    foreach ($featured_posts as $post):

        $post_id = $post->ID; 

        $partner_logo = get_field('partner_logo', $post_id);
        $partner_bg_art = get_field('pod_bg_art', $post_id); 
        $partner_permalink = get_permalink($post_id);

        echo '<a class="success-story-card-link-wrap" href="' . esc_url($partner_permalink) . '">
            <div class="success-story-card">
                <div class="success-card-pod success-card-art" style="background-image: url(' . esc_url($partner_bg_art) . ');">
                    <img class="logo-partners-overview" src="' . esc_url($partner_logo) . '" alt="" />
                </div>
                <div class="success-card-pod success-card-content">
                    <div class="text-content">
                        <h6 class="sub-cat">' . esc_html(get_the_title($post_id)) . '</h6>
                        <h5>' . esc_html(get_field('teaser_text', $post_id)) . '</h5>
                    </div>
                </div>
            </div>
        </a>';

    endforeach;

    wp_reset_postdata();
endif;



        ?>

</div>
</div>
</div>-->

<div class="row cta">
<div class="inner-wrap inner-wrap-800">


          <img class="cta-logo" src="<?php the_field('cta_img'); ?>" alt="Rewards +">

        <h2 class="scale-36-30-24">
          <?php the_field('cta_title'); ?></h2>
        <p>
                  </p>
        <a class="btn-standard cta-pop-form scale-21-21-18" href="<?php the_field('cta_link'); ?>"><?php the_field('cta_btn_text'); ?></a> 
</div>
</div>

</div>
<!-- -->
</div>
</div>
</div>
</div>
</div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
let isFirstPlay = true;

document.getElementById('myVideo').addEventListener('click', function(event) {
    event.preventDefault(); 

    if (isFirstPlay) {
        if (this.paused) {
            this.play().then(() => {
                this.setAttribute('controls', '');
                this.muted = false; 
                isFirstPlay = false; 
            }).catch(error => {
                console.error("Error playing the video:", error);
            });
        }
    } else {
        if (this.paused) {
            this.play();
        } else {
            this.pause();
        }
    }
});
</script>

<?php get_footer(); ?>