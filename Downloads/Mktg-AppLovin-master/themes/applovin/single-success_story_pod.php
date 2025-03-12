<?php
/*
 * Template Name: Success Stories Standard Block Page
 * Template Post Type: post
*/
get_header();

$page_language = get_language_attributes();
?>

<div class="contentPage test">

    <?php if (get_field('cta_option') === 'yes') : ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <link rel="stylesheet prefetch" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
        <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
            jQuery(document).ready(function () {
                jQuery('.cta-pop-form').magnificPopup({
                    type: 'inline',
                    midClick: true
                });
            });
        </script>
    <?php endif; ?>

    <?php
            $products_terms = get_the_terms(get_the_ID(), 'products');
            $products_classes = '';
            $add_white_class = false;
            $specific_terms = ['Array', 'AppDiscovery', 'Axon', 'Audience+'];

            if ($products_terms && !is_wp_error($products_terms)) {
                if (count($products_terms) === 1 && in_array($products_terms[0]->name, $specific_terms)) {
                    $add_white_class = true;
                } else {
                    $products_classes .= 'multiple ';
                }

                foreach ($products_terms as $term) {
                    $products_classes .= esc_attr($term->slug) . ' ';
                }

                if ($add_white_class) {
                    $products_classes .= 'white ';
                }
            } else {
                $products_classes .= 'appdiscovery white';
            }
         ?>

    <div id="page-success" class="individual <?php the_field('partner'); ?> <?php echo trim($products_classes); ?>">

        <div class="illo-slider-parent inner-wrap inner-wrap-1200">
            <div class="slider-sibling content-column">
                <div class="row hero">
                    <div class="content-intro">
                        <div class="single-back"></div>
                        <?php
if ($products_terms && !is_wp_error($products_terms)) {
    foreach ($products_terms as $product_term) {
        if ($product_term->name === 'Audience+') {
            $partner_logo = get_field('partner_logo');
            if ($partner_logo) {
                echo '<img class="logo-partners-audience" src="' . esc_url($partner_logo) . '" alt="' . esc_attr($product_term->name) . '" />';
            }
            break; 
        }
    }
}
?>
                        <h2><?php the_field('success_story_title'); ?></h2>
                        <h5 class="scale-21-21-18"><?php the_field('success_story_intro'); ?></h5>
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


                        <?php if ('video' == get_field('video_intro')) : ?>
                  <div class="playable-video-wrapper">
                            <video controls autoplay loop muted class="playable-video-mobile">
                                <source src="<?php the_field('phone_intro_vid'); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>

                            </div>
                            <?php elseif ('playable' == get_field('video_intro')) : ?>
                                <div class="phone-intro-main">
                     <iframe class="phone-intro-pb-img" style="max-width:100%; position: relative;" src="<?php the_field('header_phone_playable'); ?>"></iframe>
                     </div>
                     <div class="game-phone-intro">
                        <img src="<?php the_field('phone_intro_game'); ?>" style="max-width:415px;" />
                        <div class="caption">
                           <h5><?php the_field('game_name_intro'); ?></h5>
                           <p><?php the_field('partner'); ?></p>
                        </div>
                     </div>
                                <?php else : ?>
                                <img src="<?php the_field('phone_intro'); ?>" alt="Phone Intro">
                            <?php endif; ?> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-sibling open-column">
                <div class="illo-phone-hero">
                    <div class="phone-intro-main">
                    <?php if ('video' == get_field('video_intro')) : ?>
                        <div class="playable-video-wrapper">
                            <video controls autoplay loop muted playsinline class="playable-video" controlsList="nodownload">
                                <source src="<?php the_field('phone_intro_vid'); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <div class="video-controls">
          <button class="restart-button">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="48" height="48" rx="24" fill="black" fill-opacity="0.2" />
              <rect width="48" height="48" rx="24" fill="white" fill-opacity="0.3" />
              <path
                    d="M18.2492 15.0836L22.9325 12.0836C23.3992 11.7836 23.9992 12.1169 23.9992 12.6669V13.9857C24.6483 13.9865 25.3113 14.0504 25.9826 14.1837C30.1493 15.0171 33.3993 18.5504 33.9159 22.7504L33.8993 22.7337C34.7326 29.5671 28.6159 35.2671 21.6826 33.7171C17.9826 32.8837 15.0159 29.8837 14.2159 26.1671C13.6159 23.3837 14.1993 20.7504 15.5493 18.6504C15.7993 18.2671 16.3326 18.1671 16.7326 18.4171L18.0826 19.2837C18.4826 19.5337 18.6159 20.0671 18.3659 20.4504C17.6993 21.4671 17.3159 22.6837 17.3159 23.9837C17.3159 28.1671 21.1993 31.4671 25.5493 30.4671C27.9659 29.9171 29.9159 27.9504 30.4659 25.5504C31.4646 21.2061 28.1746 17.3273 23.9992 17.3171V18.6669C23.9992 19.2169 23.3992 19.5503 22.9325 19.2503L18.2492 16.2503C17.8158 15.9836 17.8158 15.3503 18.2492 15.0836Z"
                    fill="white" />
            </svg>
          </button>

          <button class="mute-button">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="48" height="48" rx="24" fill="black" fill-opacity="0.2" />
              <rect width="48" height="48" rx="24" fill="white" fill-opacity="0.3" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M28.9988 23.8984V15.1833C28.9988 14.1333 27.7322 13.5999 26.9822 14.3499L23.2163 18.1158L19.8832 14.7828C19.3951 14.2946 18.6036 14.2946 18.1155 14.7828C17.6273 15.2709 17.6273 16.0624 18.1155 16.5505L31.4488 29.8839C31.937 30.372 32.7284 30.372 33.2166 29.8839C33.7047 29.3957 33.7047 28.6043 33.2166 28.1161L28.9988 23.8984ZM18.216 19H18.166C16.7827 19 15.666 20.1167 15.666 21.5V26.5C15.666 27.8833 16.7827 29 18.166 29H22.3327L26.9827 33.65C27.7327 34.4 28.9993 33.8667 28.9993 32.8167V29.7833L18.216 19Z"
                    fill="white" />
            </svg>
          </button>

        </div>
                            </div>
                            <?php elseif ('playable' == get_field('video_intro')) : ?>
                                <div class="phone-intro-main">
                     <iframe class="phone-intro-pb-img" style="max-width:100%; position: relative;" src="<?php the_field('header_phone_playable'); ?>"></iframe>
                     </div>
                     <div class="game-phone-intro">
                        <img src="<?php the_field('phone_intro_game'); ?>" style="max-width:415px;" />
                        <div class="caption">
                           <h5><?php the_field('game_name_intro'); ?></h5>
                           <p><?php the_field('partner'); ?></p>
                        </div>
                     </div>
                                <?php else : ?>
                                <img src="<?php the_field('phone_intro'); ?>" alt="Phone Intro">
                            <?php endif; ?>                </div>
                </div>
            </div>
        </div>

        <div class="data-success">
            <div class="inner-wrap inner-wrap-1200">
                <div class="cat">
                    <div class="cat-right">
                        <h3><?php pll_e('Marketing Objective'); ?></h3>
                        <p class="vertical scale-21-21-18">
                            <?php
                            $idfeat = get_the_ID();
                            $output = '';
                            $term_urls = [
                                'success_approach' => '/resource-center/360-growth/',
                                'success_monetization' => '/resource-center/increase-arpdau/',
                                'success_useracquisition' => '/resource-center/acquire-users/',
                                'creative_optimization' => '/resource-center/ad-creatives/',
                                'premium_supply' => '/resource-center/premium-supply/',
                                'protect_users' => '/resource-center/protect-users/',
                                'activate_ctv' => '/resource-center/activate-ctv/',
                                'web_conversions' => ''

                            ];

                            foreach (get_the_terms($idfeat, 'success_pods_categories') as $ct) {
                                $cy = get_term($ct);
                                $slug = $cy->slug;

                                if (($cy->parent == 4897 && isset($term_urls[$slug])) || ($cy->parent == 5412 && isset($term_urls[$slug])) || ($cy->parent == 5418 && isset($term_urls[$slug])) || ($cy->parent == 5424 && isset($term_urls[$slug]))  ) {
                                    $output .= '<a href="' . esc_url($term_urls[$slug]) . '">' . $cy->name . '</a>, ';
                                }
                            }

                            echo rtrim($output, ', ');
                            ?>
                        </p>
                    </div>
                    <div class="cat-left">
                        <h3><?php pll_e('VERTICAL'); ?></h3>
                        <p class="vertical scale-21-21-18">
                            <?php
                            $output = '';

                            foreach (get_the_terms($idfeat, 'success_pods_categories') as $ct) {
                                $cy = get_term($ct);
                                $name = $cy->name;

                                if (in_array($cy->parent, [4895, 4907, 4909, 4911])) {
                                    $output .= $name . ', ';
                                }
                            }

                            echo rtrim($output, ', ');
                            ?>
                        </p>
                    </div>

                    <?php
                    $product_terms = get_the_terms($idfeat, 'products');

                    if (!empty($product_terms)) {
                        $product_list = '<div class="product-logos">';
                        $product_urls = [
                            'MAX' => '/resource-center/max/',
                            'AppDiscovery' => '/resource-center/appdiscovery/',
                            'SparkLabs' => '/resource-center/sparklabs/',
                            'AppLovin Exchange (ALX)' => '/resource-center/applovin-exchange/',
                            'Array' => '/resource-center/array/',
                            'Axon' => '/resource-center/axon/',
                            'Audience+' => 'https://www.applovin.com/audience-plus/'
                        ];
                        $logos = [
                            'AppDiscovery' => '/wp-content/themes/applovin/images/logo-full-appdiscovery.svg',
                            'MAX' => '/wp-content/themes/applovin/images/max_black.svg',
                            'SparkLabs' => '/wp-content/themes/applovin/images/logo_sparklabs_primary_black.svg',
                            'AppLovin Exchange (ALX)' => '/wp-content/themes/applovin/images/logo-alx.svg',
                            'Axon' => '/wp-content/themes/applovin/images/axon-logo-black.svg',
                            'Array' => '/wp-content/themes/applovin/images/array-logo-black.svg',
                            'Audience+' => '/wp-content/themes/applovin/images/audience_black.svg'

                        ];

                        foreach ($product_terms as $ct) {
                            $name = $ct->name;

                            if (isset($product_urls[$name])) {
                                $product_list .= '<a href="' . esc_url($product_urls[$name]) . '"><img src="' . esc_url($logos[$name]) . '" alt="' . esc_attr($name) . '" /></a>';
                            }
                        }

                        $product_list .= '</div>';
                    ?>
                        <div class="cat-product">
                            <h3><?php pll_e('PRODUCTS USED'); ?></h3>
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
        </div>
    </div>

    <div class="more-success">
        <div class="row main-success">
            <div class="inner-wrap inner-wrap-1200">
                <h2 class="scale-36-30-24"><?php pll_e('More Success Stories'); ?></h2>

                <div class="success-story-cards-wrap cards-wrap-single hz-scrollable">
    <?php
    $args = [
        'post_type' => 'success_story_pod',
        'posts_per_page' => -1,
        'post__not_in' => [get_the_ID()]
    ];

    $loop = new WP_Query($args);
    $currentid = get_the_ID();
    $displayed_count = 0;
    $max_success_stories = 3;
    while ($loop->have_posts() && $displayed_count < $max_success_stories) : $loop->the_post();
        $post_id = get_the_ID();
        if (get_field('success_hide', $post_id) === 'True') {
            continue;
        }

        if ($post_id !== $currentid) {
            $categories = get_the_terms($post_id, 'success_pods_categories');
            if ($categories) {
                foreach ($categories as $ct) {
                    $cy = get_term($ct);
                    if (in_array($cy->parent, [4895, 4907, 4909, 4911])) {
                        echo '<a class="success-story-card-link-wrap display ' . $cy->slug . '" href="' . get_permalink() . '">
                                <div class="success-story-card">
                                    <div class="success-card-pod success-card-art" style="background-image: url(' . get_field('pod_bg_art', $post_id) . ');">
                                        <img class="logo-partners-overview" src="' . get_field('partner_logo') . '" alt="" />
                                    </div>
                                    <div class="success-card-pod success-card-content">
                                        <div class="text-content">
                                            <h6 class="sub-cat">' . $cy->name . '</h6>
                                            <h5>' . get_field('teaser_text') . '</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>';
                        $displayed_count++; 
                        break;
                    }
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

    <div class="row cta cta-dark">
        <div class="inner-wrap">
            <?php if (get_field('cta_option') === 'yes') : ?>
                <h2 class="scale-36-30-24">
                    <?php
                    if (str_contains($page_language, "ko-KR")) {
                        echo 'MAX에 관심 있으신가요?';
                    } elseif (str_contains($page_language, "zh-CN")) {
                        echo '想要了解更多？';
                    } elseif (str_contains($page_language, "ja")) {
                        echo '収益を最大化しましょう。';
                    } else {
                        echo 'Interested in learning more?';
                    }
                    ?>
                </h2>
                <p class="scale-21-21-18">
                    <?php
                    if (str_contains($page_language, "ko-KR")) {
                        echo '지금바로 수익을 극대화하세요.';
                    } elseif (str_contains($page_language, "zh-CN")) {
                        echo '开始最大化您的收入。';
                    } elseif (str_contains($page_language, "ja")) {
                        echo 'MAXの利用申請はこちら';
                    } else {
                        echo 'Start maximizing your revenue.';
                    }
                    ?>
                </p>
                <a class="btn-standard cta-pop-form scale-21-21-18" href="#cta-form">
                    <?php
                    if (str_contains($page_language, "ko-KR")) {
                        echo '이용신청';
                    } elseif (str_contains($page_language, "zh-CN")) {
                        echo '申请使用MAX';
                    } elseif (str_contains($page_language, "ja")) {
                        echo 'MAXの利用申請はこちら';
                    } else {
                        echo 'Get Started';
                    }
                    ?>
                </a>
            </div>
            <div id="cta-form" class="mfp-hide">
                <div class="max-gateway">
                    <img class="max-logo" src="/wp-content/themes/applovin/images/logo-full-max.svg" alt="MAX">
                    <?php
                    if (str_contains($page_language, "ko-KR")) {
                        echo '<h2 class="scale-36-30-24">계속하시려면 AppLovin 계정이 필요합니다</h2>';
                        echo '<a href="https://dash.applovin.com/login?cc=kr" class="btn-standard scale-21-21-18">로그인해서 MAX 설정하기</a>';
                        echo '<a href="https://dash.applovin.com/signup?cc=kr" class="secondary-link scale-21-21-18">AppLovin 계정 만들기</a>';
                    } elseif (str_contains($page_language, "zh-CN")) {
                        echo '<h2 class="scale-36-30-24">登陆前，请先确保您已开通AppLovin帐号</h2>';
                        echo '<a href="https://dash.applovin.com/login?cc=cn" class="btn-standard scale-21-21-18">登陆以设置MAX</a>';
                        echo '<a href="https://dash.applovin.com/signup?cc=cn" class="secondary-link scale-21-21-18">注册新账户</a>';
                    } elseif (str_contains($page_language, "ja")) {
                        echo '<h2 class="scale-36-30-24">MAX を使うには AppLovin <br>アカウントの登録が必要です。</h2>';
                        echo '<a href="https://dash.applovin.com/login?cc=jp" class="btn-standard scale-21-21-18">ログインして MAX を始める</a>';
                        echo '<a href="https://dash.applovin.com/signup?cc=jp" class="secondary-link scale-21-21-18">アカウント登録</a>';
                    } else {
                        echo '<h2 class="scale-36-30-24">You must have an AppLovin account to&nbsp;continue</h2>';
                        echo '<a href="https://dash.applovin.com/login" class="btn-standard scale-21-21-18">Log in to set up MAX</a>';
                        echo '<a href="https://dash.applovin.com/signup" class="secondary-link scale-21-21-18">Sign up for an account</a>';
                    }
                    ?>
                </div>
            </div>
            <?php else : ?>
                <h2><?php pll_e('Acquire new users.'); ?></h2>
                <p><?php pll_e('See real results.'); ?></p>
                <a class="btn-standard" href="https://dash.applovin.com/signup"><?php pll_e('Sign up today'); ?></a>
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

    <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
 jQuery(document).on('click', '.mute-button', function () {
    var $button = jQuery(this);
    var $video = jQuery('.playable-video').get(0); 

    if ($video) {
        console.log(' video');

      // Toggle mute/unmute
      if ($video.muted) {
        $video.muted = false; // Unmute video
        $button.html(`<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <rect width="48" height="48" rx="24" fill="black" fill-opacity="0.2"/>
                  <rect width="48" height="48" rx="24" fill="white" fill-opacity="0.3"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M30.4815 15.7494C30.9696 15.2612 31.7611 15.2612 32.2492 15.7494C36.8041 20.3042 36.8041 27.6957 32.2492 32.2505C31.7611 32.7386 30.9696 32.7386 30.4815 32.2505C29.9933 31.7623 29.9933 30.9709 30.4815 30.4827C34.06 26.9042 34.06 21.0957 30.4815 17.5172C29.9933 17.029 29.9933 16.2375 30.4815 15.7494Z" fill="white"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M27.5315 18.6994C28.0196 18.2112 28.8111 18.2112 29.2992 18.6994C32.2207 21.6209 32.2207 26.379 29.2992 29.3005C28.8111 29.7886 28.0196 29.7886 27.5315 29.3005C27.0433 28.8123 27.0433 28.0209 27.5315 27.5327C29.4767 25.5875 29.4767 22.4123 27.5315 20.4672C27.0433 19.979 27.0433 19.1875 27.5315 18.6994Z" fill="white"/>
                  <path d="M18.9987 28.9999H14.832C13.4487 28.9999 12.332 27.8833 12.332 26.4999V21.4999C12.332 20.1166 13.4487 18.9999 14.832 18.9999H18.9987L23.6487 14.3499C24.3987 13.5999 25.6654 14.1333 25.6654 15.1833V32.8166C25.6654 33.8666 24.3987 34.3999 23.6487 33.6499L18.9987 28.9999Z" fill="white"/>
                </g>
              </svg>`); // Update to unmute SVG
      } else {
        $video.muted = true; // Mute video
        $button.html(`<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g>
                  <rect width="48" height="48" rx="24" fill="black" fill-opacity="0.2"/>
                  <rect width="48" height="48" rx="24" fill="white" fill-opacity="0.3"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M28.9988 23.8984V15.1833C28.9988 14.1333 27.7322 13.5999 26.9822 14.3499L23.2163 18.1158L19.8832 14.7828C19.3951 14.2946 18.6036 14.2946 18.1155 14.7828C17.6273 15.2709 17.6273 16.0624 18.1155 16.5505L31.4488 29.8839C31.937 30.372 32.7284 30.372 33.2166 29.8839C33.7047 29.3957 33.7047 28.6043 33.2166 28.1161L28.9988 23.8984ZM18.216 19H18.166C16.7827 19 15.666 20.1167 15.666 21.5V26.5C15.666 27.8833 16.7827 29 18.166 29H22.3327L26.9827 33.65C27.7327 34.4 28.9993 33.8667 28.9993 32.8167V29.7833L18.216 19Z" fill="white"/>
                </g>
              </svg>`); // Update to mute SVG
      }

      $button.data('muted', $video.muted); // Store mute state
    }else{
      console.log('no video');
    }
  });

                </script>


                <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
jQuery(document).on('click', '.video-controls .restart-button', function () {
    var $slide = jQuery(this).closest('.slide');
    var $video = jQuery('.playable-video').get(0); 
    if ($video) {
      $video.currentTime = 0; // Reset video to start
      $video.play(); // Restart video playback
    }
  });

                </script>
    

    <?php get_footer(); ?>
