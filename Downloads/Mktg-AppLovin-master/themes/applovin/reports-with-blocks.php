<<?php
/*
Template Name:  Reports With Block Page 
*/
?>
<?php get_header(); ?>


  
<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/hero-with-overflow-logo.css' type='text/css' media='' />



<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/ctv-report.css' type='text/css' media='' />

<style type="text/css">
    .localiframe {
    max-width: 720px;
    margin: 40px auto 0;
    margin-top: 0;
}

.localvid img {

    margin-top: 0;
}

.main-content-success .title-report {
    margin: 40px 0;
}


.main-content-success .title-report:first-child {
    margin-top: 0!important;
}
</style>

  <div class="contentPage">
    
  <?php $langDetect = get_language_attributes(); ?> 


<div id="page-report">



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
    <p class="menu-title creat-second"><?php the_field('menu_main_title'); ?></p>
    <div id="dynamicMenuLinks"></div> 
    <hr/>
</nav>


   <div class="main-content-success">
      <div class="inner-wrap inner-wrap-700">
       <?php the_content(); ?>

</div>
</div>


<!-- -->
</div>
</div>
</div>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
document.addEventListener('DOMContentLoaded', function() {
    const menuContainer = document.getElementById('dynamicMenuLinks');
    const titles = document.querySelectorAll('.title-report h2');
    const navbarHeight = 70; 

    titles.forEach(function(title) {
        if (!title.id) {
            title.id = title.textContent.trim().replace(/\s+/g, '');
        }
        const id = title.id;
        const text = title.textContent.trim();

        const link = document.createElement('a');
        link.href = `#${id}`;
        link.className = 'menu-link';
        link.dataset.id = id;
        link.textContent = text;

        menuContainer.appendChild(link);

        link.addEventListener('click', function(event) {
            event.preventDefault(); 
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                const positionToScroll = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight;

                window.scrollTo({
                    top: positionToScroll,
                    behavior: 'smooth'
                });
            }
        });
    });

    if (titles.length === 0) {
        menuContainer.innerHTML = 'No menu items found.';
    }
});
</script>


<?php get_footer(); ?>