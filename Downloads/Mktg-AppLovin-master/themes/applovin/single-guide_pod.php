<?php
/*
Template Name: Guides With Block Page 
Template Post Type: Guides
*/
?>

<?php get_header(); ?>


  
<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/hero-with-overflow-logo.css' type='text/css' media='' />



<link rel='stylesheet' id='applovin-style-css'  href='/wp-content/themes/applovin/css/creative-report-2024.css' type='text/css' media='' />

<style type="text/css">

       .main-content-success h5 {
                    font-family: var(--font-wt-Black);
    font-weight: 750;
    padding: 40px 0;
    padding-bottom: 24px;
    margin: 0;
    }

    .hero-center .inner-wrap {
        padding: 0!important;
    }


    .main-content-success {
        margin-left: 80px;
    }

    .has-fixed-layout tbody {
        font-size: 16px;
    }

    .main-content-success a {
        color: #099AC6!important;
            font-family: var(--font-wt-Heavy);
    font-weight: 700;
    }

    .side-menu a {
        color: #000!important;
    }

    .btn-standard {
        color: #fff!important;
    }

    .repeater-analyze h2 {
        text-transform: uppercase;
    }

    .wp-block-table td, .wp-block-table th {
        padding: 16px 24px;
    }

    p {
        margin-bottom: 8px;
    }


        .menu-jump{text-transform: capitalize;}


    .hero-center {
    color: #fff;
    padding: 220px 120px !important;
    padding-bottom: 430px!important;
    color: #000;
    background-position: bottom center;
    background-size: 1440px, cover, 100vw;
    background-repeat: no-repeat;
    background-blend-mode: normal, normal;
    min-height: 650px!important;
    height: 100% !important;
}

.appd-cta {
    margin-top: 25px;
}
    .localiframe {
    max-width: 720px;
    margin: 40px auto 0;
    margin-top: 0;
}

.wp-block-image img {
    border-radius: 16px;
}

.localvid img {

    margin-top: 0;
}

.wp-block-separator {
    height: 1px;
    border: none!important;
        background-color: #e6e6e6;
        margin-top: 40px;
}

figure{
    margin: 1.5em 0;
}

.main-content-success .title-report {
    margin: 40px 0;
}


.main-content-success .title-report:first-child {
    margin-top: 0!important;
}

thead th {
    background-color:#181625;
    color: #fff;
    border: 1px solid #181625!important;
    font-weight: 750;
        font-family: var(--font-wt-Black);
}
.wp-block-table thead {
        border: 1px solid #181625!important;
    text-transform: uppercase;
}


.wp-block-table table {
        border-collapse: separate;
        border-spacing: 4px;
}

.wp-block-table.is-style-stripes tbody tr:nth-child(odd) {
    background-color: #F7F8FC;
}

.wp-block-table.is-style-stripes tbody tr:nth-child(even) {

   background-color:#EEF0F6
}

td a {

    font-family: var(--font-wt-Heavy);
    font-weight: 700;
}


.cta-inside a {
    color: #fff!important;
}

@media screen and (max-width: 1024px) {
    .inner-wrap {        padding: 0 32px!important;
}

.main-content-success .inner-wrap {        
    padding: 0 !important;

}

    .side-menu {
        margin-bottom: 16px;
}
.page-content{
padding-bottom: 80px;
}
    .main-content-success {
        margin-left: auto;
    }

}

@media screen and (max-width: 764px) {
.page-content{
padding-bottom: 64px;
}
    .side-menu {
        padding-left: 0 !important;
    }

        .hero-center {
    background-size: 675px, cover, 100vw;
        padding: 120px 56px!important;
        padding-top: 275px!important;
    }

        .cta-inside {
        margin: auto!important;
        text-align: center!important;
        padding-bottom: 270px!important;
    }
        .cta-inside .logo {
        margin: auto!important;
        margin-bottom: 24px!important;
    }


    .side-menu {
        margin-bottom: 32px;
    }
    .main-content-success h5 {

padding-bottom: 16px;
padding-top: 32px;

}

    .btn {
        margin: auto!important;
        margin-top: 24px!important;
    }

    .appd-cta {
    padding: 32px!important;
}
}

</style>

  <div class="contentPage">
    
  <?php $langDetect = get_language_attributes();

        $hero_bg = get_field('background_hero_type');

   ?> 


<div id="page-report page-guide">

<?php 

if($hero_bg == "Video") { ?>

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

<?php 

}else{ ?>
<div class="hero-center row" style="background-image: url('<?php the_field('hero_main_image'); ?>'), url('<?php the_field('hero_secondary_image'); ?>'), linear-gradient(#F7F8FC , #FBF7FF) ;">
  <div class="inner-wrap inner-wrap-1200">
    <div class="hero-div1">
<?php if (get_field('hero_logo')): ?>
    <img src="<?php the_field('hero_logo'); ?>" alt="AppDiscovery Logo">
<?php endif; ?>
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
<?php 

}; ?>
<div class="over-page-content" style="background-color: #fff;">
<div class="inner-wrap inner-wrap-1200">
<div class="page-content">

<nav class="side-menu"> 
    <p class="menu-title creat-second"><?php the_field('menu_main_title'); ?></p>
    <div id="dynamicMenuLinks"></div> 
    <hr/>
</nav>


   <div class="main-content-success">
       <?php the_content(); ?>


</div>

</div>
<!-- -->
</div>
</div>

<div class="row cta 
<?php if ( get_field('cta_style') == 'dark' ) : ?>
 cta-dark
<?php endif; ?>
 ">
<div class="inner-wrap inner-wrap-600">
          <img class="cta-logo" src="<?php the_field('cta_logo'); ?>" alt="<?php the_field('cta_partner'); ?>" />

        <h2 class="scale-36-30-24">
          <?php the_field('cta_title'); ?>
        </h2>
        <p>
          <?php the_field('cta_text'); ?>
        </p>
        <a class="btn-standard cta-pop-form scale-21-21-18" href="<?php the_field('cta_url'); ?>"><?php the_field('cta_btn'); ?></a> 
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

window.addEventListener('scroll', function() {
    const position = window.scrollY + 150; 
    const sections = document.querySelectorAll('.menu-jump'); 

    let currentSectionId = null;

    sections.forEach(function(section, index) {
        const target = Math.floor(section.getBoundingClientRect().top + window.pageYOffset) - 150; 
        const nextSection = sections[index + 1];
        const nextTarget = nextSection ? Math.floor(nextSection.getBoundingClientRect().top + window.pageYOffset) - 150 : Infinity;
        if (position >= target && position < nextTarget) {
            currentSectionId = section.id;
        }
    });

    const links = document.querySelectorAll('#dynamicMenuLinks a.menu-link');
    links.forEach(function(link) {
        if (link.dataset.id === currentSectionId) {
            link.classList.add('hovered');
        } else {
            link.classList.remove('hovered');
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
      Array.from(document.getElementsByClassName("menu-link")).map(function(elem){
        if (elem.style.display === "none") {
          elem.style.display = "block";
          accqa[0].classList.add("open");
        } else {
          elem.style.display = "none";
          accqa[0].classList.remove("open");
        }
      });
    });
  }

  for (x = 0; x < clkmn.length; x++) {
    clkmn[x].addEventListener("click", function() {
      Array.from(document.getElementsByClassName("menu-link")).map(function(elem){
        if (elem.style.display === "block") {
          elem.style.display = "none";
          accqa[0].classList.remove("open");
        }
      });
    });
  }
}

window.addEventListener("resize", function() {
  if (window.innerWidth >= 1024) {
    // Reset display properties and classes
    var accqa = document.getElementsByClassName("menu-title");
    var clkmn = document.getElementsByClassName("menu-link");

    Array.from(clkmn).forEach(function(elem) {
      elem.style.display = ""; // Reset display to default
    });

    Array.from(accqa).forEach(function(elem) {
      elem.classList.remove("open");
    });
  }
});


  </script>
<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
        document.addEventListener("DOMContentLoaded", function() {
            const titleReports = document.querySelectorAll('.title-report');

            titleReports.forEach(function(titleReport) {
                const nextSibling = titleReport.nextElementSibling;
                if (nextSibling && nextSibling.tagName === 'H5') {
                    titleReport.style.marginBottom = '0';
                }
            });
        });
</script>

<?php get_template_part('template-modules/email-signup');?>
<?php get_footer(); ?>