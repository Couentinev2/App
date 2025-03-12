<?php
/*
 * Template Name:  Success Stories Standard Block Page
 * Template Post Type: post
*/
?>
<?php get_header(); ?>

<?php $page_language = get_language_attributes(); ?>
<div class="contentPage test">

   <?php if ( 'yes' == get_field('cta_option') ): ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
   <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
   <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
      jQuery(document).ready(function(){
          jQuery('.cta-pop-form').magnificPopup({
              type:'inline',
              midClick: true 
          });
      });
   </script>
   <?php endif; ?>


<?php
// Fetch the terms in the 'products' taxonomy related to the current post
$products_terms = get_the_terms(get_the_ID(), 'products');
// Initialize a variable to hold the class names
$products_classes = '';
// Initialize control variables
$add_white_class = false;
$specific_terms = ['Array', 'AppDiscovery', 'Axon'];

// Check if there are any terms retrieved
if ($products_terms && !is_wp_error($products_terms)) {
    // Check the number of terms and adjust class name addition logic accordingly
    if (count($products_terms) == 1) {
        // Only one term, check if it's one of the specific terms
        if (in_array($products_terms[0]->name, $specific_terms)) {
            $add_white_class = true;
        }
    } else {
        // More than one term, set to add 'multiple' class instead
        $products_classes .= 'multiple ';
    }

    // Concatenate all term slugs into a string of class names
    foreach ($products_terms as $term) {
        $products_classes .= esc_attr($term->slug) . ' ';
    }
}

// Add 'white' class if one of the specific terms is found and only one term exists
if ($add_white_class) {
    $products_classes .= 'white ';
}
?>

<div id="page-success" class="individual <?php the_field('partner'); ?> <?php echo trim($products_classes); ?>" style="">

      <div class="illo-slider-parent inner-wrap inner-wrap-1200">
         <div class="slider-sibling content-column">
            <div class="row hero">
               <div class="content-intro">
                               <div class="single-back">

                  </div>  
                  <h2>
                     <?php the_field('success_story_title'); ?> 
                  </h2>
                  <h5 class="scale-21-21-18">
                     <?php the_field('success_story_intro'); ?> 
                  </h5>
                     <div class="hero-stats">

                        <div class="lef">
                           <h1 class="scale-36-30-24"><?php the_field('stats_hero_one'); ?></h1>
                            <p class="scale-18-18-16"><?php the_field('stats_text_hero_one'); ?></p>
                        </div>
                              <div class="right">
                            <h1 class="scale-36-30-24"><?php the_field('stats_hero_two'); ?></h1>
                           <p class="scale-18-18-16"><?php the_field('stats_text_hero_two'); ?></p>      
                        </div>
                  </div>
               </div>
               <div class="illo-phone-hero illo-phone-hero-midsize">
            <div class="phone-intro-main">
               <img src="<?php the_field('phone_intro'); ?>"  style="" /> 
            </div>

         </div>
        </div>    
        </div>

         <div class="slider-sibling open-column">
         <div class="illo-phone-hero">
            <div class="phone-intro-main">
               <img src="<?php the_field('phone_intro'); ?>"  style="" /> 
            </div>

         </div>
         </div>
         </div>         </div>


<div class="data-success">
                       <div class="inner-wrap inner-wrap-1200">
                             <div class="cat">
                                                    <div class="cat-right">
                        <h3><?php pll_e('Marketing Objective') ?></h3>

<p class="vertical scale-21-21-18">
    <?php
    $idfeat = get_the_ID();
    $taxoname = [];
    $output = '';

    // Define an associative array with term slugs and their respective URLs
    $term_urls = array(
        'success_approach' => '/resource-center/360-growth/',
        'success_monetization' => '/resource-center/increase-arpdau/',
        'success_useracquisition' => '/resource-center/acquire-users/',
        'creative_optimization' => '/resource-center/ad-creatives/',
        'premium_supply' => '/resource-center/premium-supply/',
        'protect_users' => '/resource-center/protect-users/',
        'activate_ctv' => '/resource-center/activate-ctv/'
    );

    foreach (get_the_terms($idfeat, 'success_pods_categories') as $ct) {
        $cy = get_term($ct);
        $taxoname[] = $cy->slug;
        $slug = $cy->slug;

        if (!empty($slug) && $cy->parent == 4897 && isset($term_urls[$slug])) {
            $term_link = $term_urls[$slug]; // Get the URL for the term slug
            $output .= '<a href="' . esc_url($term_link) . '">' . $cy->name . '</a>, ';
        }
    }

    echo rtrim($output, ', ');
    ?>
</p>










                     </div>
<div class="cat-left">
    <h3><?php pll_e('VERTICAL') ?></h3>
    <p class="vertical scale-21-21-18">
        <?php
        $idfeat = get_the_ID();
        $taxoname = [];
        $output = '';

        foreach (get_the_terms($idfeat, 'success_pods_categories') as $ct) {
            $cy = get_term($ct);
            $taxoname[] = $cy->slug;
            $name = $cy->name;

            if (!empty($name)) {
                if ($cy->parent == 4895 || $cy->parent == 4907 || $cy->parent == 4909 || $cy->parent == 4911) {
                    $output .= $name . ', '; 
                }
            }
        }

        echo rtrim($output, ', ');
        ?>
    </p>
</div>


<?php
$idfeat = get_the_ID();
$product_terms = get_the_terms($idfeat, 'products');

if (!empty($product_terms)) {
    $product_list = '<div class="product-logos">';

    $product_urls = array(
        'MAX' => '/resource-center/max/',
        'AppDiscovery' => '/resource-center/appdiscovery/',
        'SparkLabs' => '/resource-center/sparklabs/',
        'AppLovin Exchange (ALX)' => '/resource-center/applovin-exchange/',
        'Array' => '/resource-center/array/',
        'Axon' => '/resource-center/axon/'

    );

    foreach ($product_terms as $ct) {
        $cy = get_term($ct);
        $name = $cy->name;
        $logo_src = '';

        $background_color = get_field('background_color', get_the_ID());



    if ($name === 'AppDiscovery') {
        $logo = '/wp-content/themes/applovin/images/logo-full-appdiscovery.svg'; 
    } elseif ($name === 'MAX') {
        $logo = '/wp-content/themes/applovin/images/max_black.svg'; 
    } elseif ($name === 'SparkLabs') {
        $logo = '/wp-content/themes/applovin/images/logo_sparklabs_primary_black.svg'; 
    } elseif ($name === 'AppLovin Exchange (ALX)') {
        $logo = '/wp-content/themes/applovin/images/logo-alx.svg'; 
    }elseif ($name === 'Axon') {
        $logo = '/wp-content/themes/applovin/images/axon-logo-black.svg'; 
    }elseif ($name === 'Array') {
        $logo = '/wp-content/themes/applovin/images/array-logo-black.svg'; 
    }

;

        if (isset($product_urls[$name])) {
            $logo_src = $product_urls[$name]; 
        }

        if (!empty($logo_src)) {
            $product_list .= '<a href="' . esc_url($logo_src) . '"><img src="' . esc_url($logo) . '" alt="' . esc_attr($name) . '" /></a>';
        }
    }

    $product_list .= '</div>';
?>

<div class="cat-product">
    <h3><?php pll_e('PRODUCTS USED') ?></h3>
    <?php echo $product_list; ?>
</div>

<?php } ?>



</div>

                  </div>
                  </div>

</div>


<div class="main-content-success">
                    <div class="inner-wrap inner-wrap-700">
                     <?php the_content(); ?>





</div></div>

<div class="more-success">

  <div class="row main-success">

    <div class="inner-wrap inner-wrap-1200">
           <h2 class="scale-36-30-24"><?php pll_e('More Success Stories') ?> </h2> 

      <div class="success-story-cards-wrap cards-wrap-single hz-scrollable">

        <?php

          $args = array( 
            'post_type' => 'success_story_pod', 
            'posts_per_page' => 3,
            'post__not_in'  => array(get_the_ID())

               );
 
        //$posts = get_posts( $args );

        $loop = new WP_Query( $args );

        $currentid = get_the_ID();
        while ( $loop->have_posts() ): $loop->the_post();
        $post_id = get_the_ID();
     if ( $post_id != $currentid ) { // delete first post 
          foreach ( get_the_terms( $post_id, 'success_pods_categories' ) as $ct ) { // loop through
            $cy = get_term( $ct ); // grab each custom taxonomy category (term) object for the post
            $name = $cy->name;
       if ($cy -> parent == 4895 || $cy -> parent == 4907 ||$cy -> parent == 4909 || $cy -> parent ==4911){
            echo '<a class="success-story-card-link-wrap display '. $cy->slug .' "  href=" '. get_permalink() .'">
          <div class="success-story-card">
              <div class="success-card-pod success-card-art" style=" background-image: url(' . get_field('pod_bg_art',$post_id ) . ');">
 <img class="logo-partners-overview" src="' . get_field( 'partner_logo' ) . '" alt="" />
              ';

            echo '</div>
          <div class="success-card-pod success-card-content">
            <div class="text-content">
              <h6 class="sub-cat">' . $name . '</h6>
              <h5>
                ' . get_field( 'teaser_text' ) . '
              </h5>
            </div>
          </div>
        </div>
        </a>';
          }
}
        }
        endwhile;

        wp_reset_postdata();
        ?>

</div>
</div>
</div>
</div>



         <div class="row cta  cta-dark">
            <div class="inner-wrap">
              <?php if ( 'yes' == get_field('cta_option') ): ?>
               <h2 class="scale-36-30-24">
               <?php if ( str_contains($page_language, "ko-KR") ) : // set page language ?>
MAX에 관심 있으신가요?
<?php elseif ( str_contains( $page_language, "zh-CN") ) : ?>
想要了解更多？
<?php elseif ( str_contains($page_language, "ja") ) : ?>
収益を最大化しましょう。
<?php else : ?>
                  Interested in learning more? 
<?php endif; ?>
               </h2>
               <p class="scale-21-21-18">
               <?php if ( str_contains($page_language, "ko-KR") ) : // set page language ?>
지금바로 수익을 극대화하세요.
<?php elseif ( str_contains( $page_language, "zh-CN") ) : ?>
开始最大化您的收入。
<?php elseif ( str_contains($page_language, "ja") ) : ?>
<!-- -->
<?php else : ?>
                  Start maximizing your revenue. 
<?php endif; ?>
               </p>
               <a class="btn-standard cta-pop-form scale-21-21-18" href="#cta-form">
               <?php if ( str_contains($page_language, "ko-KR") ) : // set page language ?>
이용신청
<?php elseif ( str_contains( $page_language, "zh-CN") ) : ?>
申请使用MAX
<?php elseif ( str_contains($page_language, "ja") ) : ?>
MAXの利用申請はこちら
<?php else : ?>
Get Started
<?php endif; ?>
</a> 
            </div>
         </div>
      <div id="cta-form" class="mfp-hide">
         <div class="max-gateway">
         <img class="max-logo" src="/wp-content/themes/applovin/images/logo-full-max.svg" alt="MAX" />
      <?php if ( str_contains($page_language, "ko-KR") ) : // set page language ?>
         <h2 class="scale-36-30-24">계속하시려면 AppLovin 계정이 필요합니다</h2>
         <a href="https://dash.applovin.com/login?cc=kr" class="btn-standard scale-21-21-18">로그인해서 MAX 설정하기</a>
         <a href="https://dash.applovin.com/signup?cc=kr" class="secondary-link scale-21-21-18">AppLovin 계정 만들기</a>
<?php elseif ( str_contains( $page_language, "zh-CN") ) : ?>
         <h2 class="scale-36-30-24">登陆前，请先确保您已开通AppLovin帐号</h2>
         <a href="https://dash.applovin.com/login?cc=cn" class="btn-standard scale-21-21-18">登陆以设置MAX</a>
         <a href="https://dash.applovin.com/signup?cc=cn" class="secondary-link scale-21-21-18">注册新账户</a>
<?php elseif ( str_contains($page_language, "ja") ) : ?>
         <h2 class="scale-36-30-24">MAX を使うには AppLovin <br>
アカウントの登録が必要です。</h2>
         <a href="https://dash.applovin.com/login?cc=jp" class="btn-standard scale-21-21-18">ログインして MAX を始める</a>
         <a href="https://dash.applovin.com/signup?cc=jp" class="secondary-link scale-21-21-18">アカウント登録</a>
<?php else : ?>
         <h2 class="scale-36-30-24">You must have an AppLovin account to&nbsp;continue</h2>
         <a href="https://dash.applovin.com/login" class="btn-standard scale-21-21-18">Log in to set up MAX</a>
         <a href="https://dash.applovin.com/signup" class="secondary-link scale-21-21-18">Sign up for an account</a>
<?php endif; ?>
         </div> 
      </div>
      <?php else : ?>
      <h2>
      <?php if ( str_contains($page_language, "ko-KR") ) : // set page language ?>
새로운 유저를 획득하여
<?php elseif ( str_contains( $page_language, "zh-CN") ) : ?>
获取新用户，收获卓越的成果。
<?php elseif ( str_contains($page_language, "ja") ) : ?>
AppLovin を活用して、 新規ユーザーを獲得しましょう!
<?php else : ?>
         Acquire new users.
<?php endif; ?>
      </h2>
      <?php if ( str_contains($page_language, "ko-KR") ) : // set page language ?>
<p>성공적인 결과를 내세요</p>
<?php elseif ( str_contains( $page_language, "zh-CN") ) : ?>
<!-- -->
<?php elseif ( str_contains($page_language, "ja") ) : ?>
<!-- -->
<?php else : ?>
         <p>See real results.</p>
<?php endif; ?>
      <?php if ( str_contains($page_language, "ko-KR") ) : // set page language ?>
      <a class="btn-standard" href="https://dash.applovin.com/signup?cc=kr">사작하기</a> 
<?php elseif ( str_contains( $page_language, "zh-CN") ) : ?>
      <a class="btn-standard" href="https://dash.applovin.com/signup?cc=cn">马上注册</a> 
<?php elseif ( str_contains($page_language, "ja") ) : ?>
      <a class="btn-standard" href="https://dash.applovin.com/signup?cc=jp">今すぐ登録</a> 
<?php else : ?>
      <a class="btn-standard" href="https://dash.applovin.com/signup">Sign up today</a> 
<?php endif; ?>
      </div>
   </div>
<?php endif; ?>
</div>
</div>



<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">

// Define the toggleDropdown function
var headerNav = document.getElementById('header');
var headerInitState = 'off';
if (headerNav.classList.contains('transparent') != false ) {
  headerInitState = 'transparent';
}
function toggleDropdown() {
  var rcNav = document.getElementById('rc-main-nav-row');
  var dropdown = document.getElementById('rc-dropdown-subnavs');
  var toggleElement = document.getElementById('rc-subnav-toggle');
  var myScroll = window.pageYOffset || document.documentElement.scrollTop;
  if (dropdown) {
    var currentDisplay = window.getComputedStyle(dropdown).display;
    if (currentDisplay === 'none') {
      dropdown.style.display = 'grid';
      rcNav.classList.add('active');
      if (headerInitState == 'transparent' ) {
        headerNav.classList.remove('transparent');
      }
    } else {
      dropdown.style.display = 'none';
      rcNav.classList.remove('active');
      if ( headerInitState == 'transparent' && myScroll <= 59 ) {
        headerNav.classList.add('transparent');
      }
    }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  var toggleElement = document.getElementById('rc-subnav-toggle');
  if (toggleElement) {
    toggleElement.addEventListener('click', toggleDropdown);
  }
});
</script>

<?php get_footer(); ?>

