<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="google-site-verification" content="in6kiwv4nMPxLQO-onWG1ogzDMwaazWmGCdCNHYuARY" />
	<meta name="facebook-domain-verification" content="eruhmv53ap0jjwu4nufqfmto5ryj0l" />
	<!-- 2022 -->
	<meta name="facebook-domain-verification" content="qfddcgj2nh2uqir6gase0zhzogyq7n" />
	<?php wp_head(); ?>
	<?php
	if (! is_page_template(array('terms-page.php', 'policies-page.php'))) { ?>
		<script>
			(function(w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({
					'gtm.start': new Date().getTime(),
					event: 'gtm.js'
				});
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != 'dataLayer' ? '&l=' + l : '';
				j.async = true;
				j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, 'script', 'dataLayer', 'GTM-5WHQPK9');
		</script>

	<?php } ?>
	<script>
		var dashScript = document.createElement("script");
		<?php if (is_page_template(array('applovin-home-page.php')) && !isset($_GET["noredirect"])) : ?>
			dashScript.src = "https://dash.applovin.com/dashboard/js?r=1";
		<?php else : ?>
			dashScript.src = "https://dash.applovin.com/dashboard/js";
		<?php endif; ?>
		dashScript.type = "text/javascript";

		document.getElementsByTagName("head")[0].appendChild(dashScript);
	</script>

	<?php
	$langDetect = get_language_attributes();

	if (str_contains($langDetect, "zh-CN")) { ?>

		<script type="text/javascript" src="https://fast.fonts.net/jsapi/7835d1f6-fe5e-4c28-ad37-c0a696770e84.js"></script>
		<?php $local = '/cn' ?>

	<?php } else if (str_contains($langDetect, "ko-KR")) { ?>

		<script type="text/javascript" srcs="https://fast.fonts.net/jsapi/38a315bb-940f-458e-9ab9-b8df46243811.js"></script>
		<?php $local = '/ko' ?>
	<?php } else if (str_contains($langDetect, "ja")) { ?>
		<?php $local = '/ja' ?>
		<script type="text/javascript" src="https://fast.fonts.net/jsapi/60853530-ad3d-41ff-bd9f-a52610a933b3.js"></script>

	<?php } else { ?>
		<?php $local = '' ?>
		<style type="text/css">
			@import url("https://cdn.fonts.net/t/1.css?apiType=css&projectid=8d68d7d1-1cef-4e68-a87a-f377afc8b375");

			@font-face {
				font-family: "Avenir Light";
				font-style: normal;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/Avenir/Avenir35Light_normal_normal.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/Avenir/Avenir35Light_normal_normal.woff') format('woff');
			}

			@font-face {
				font-family: "Avenir LightOblique";
				font-style: oblique;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/Avenir/Avenir35LightOblique_oblique_normal.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/Avenir/Avenir35LightOblique_oblique_normal.woff') format('woff');
			}

			@font-face {
				font-family: "Avenir Medium";
				font-style: normal;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/Avenir/Avenir65Medium_normal_normal.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/Avenir/Avenir65Medium_normal_normal.woff') format('woff');
			}

			@font-face {
				font-family: "Avenir MediumOblique";
				font-style: oblique;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/Avenir/Avenir65MediumOblique_oblique_normal.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/Avenir/Avenir65MediumOblique_oblique_normal.woff') format('woff');
			}

			@font-face {
				font-family: "Avenir Heavy";
				font-style: normal;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/Avenir/Avenir85Heavy_normal_normal.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/Avenir/Avenir85Heavy_normal_normal.woff') format('woff');
			}

			@font-face {
				font-family: "Avenir HeavyOblique";
				font-style: oblique;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/Avenir/Avenir85HeavyOblique_oblique_normal.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/Avenir/Avenir85HeavyOblique_oblique_normal.woff') format('woff');
			}

			@font-face {
				font-family: "Avenir Black";
				font-style: normal;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/Avenir/Avenir95Black_normal_normal.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/Avenir/Avenir95Black_normal_normal.woff') format('woff');
			}

			@font-face {
				font-family: "Avenir BlackOblique";
				font-style: oblique;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/Avenir/Avenir95BlackOblique_oblique_normal.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/Avenir/Avenir95BlackOblique_oblique_normal.woff') format('woff');
			}

			@font-face {
				font-family: "ClarendonBT-Bold";
				font-style: normal;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/ClarendonBT/ClarendonBTBold_normal_normal_subset1.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/ClarendonBT/ClarendonBTBold_normal_normal_subset1.woff') format('woff');
				unicode-range: U+201c-201d;
			}

			@font-face {
				font-family: "TTBackwardsSansBold";
				font-style: normal;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/TTBackwards/TTBackwardsSansBold_normal_normal_subset1.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/TTBackwards/TTBackwardsSansBold_normal_normal_subset1.woff') format('woff');
				unicode-range: U+0000, U+000d, U+0020-007e;
			}

			@font-face {
				font-family: "TTBackwardsSansBlack";
				font-style: normal;
				font-stretch: normal;
				font-display: swap;
				src: url('/wp-content/themes/applovin/fonts/TTBackwards/TTBackwardsSansBlack_normal_normal_subset1.woff2') format('woff2'), url('/wp-content/themes/applovin/fonts/TTBackwards/TTBackwardsSansBlack_normal_normal_subset1.woff') format('woff');
				unicode-range: U+0020-0024, U+0026-003b, U+003d, U+003f-005b, U+005d-005e, U+0060-007a, U+007e, U+00a5, U+00a7, U+00ab, U+00b4, U+00b7, U+00bb, U+00c0-00cf, U+00d1-00d4, U+00d6, U+00d8-00dc, U+00e0-00ef, U+00f1-00f4, U+00f6, U+00f8-00fc, U+00ff-0103, U+0112-0115, U+012a-012d, U+014c-014f, U+0152-0153, U+016a-016d, U+0178, U+1e9e, U+2010-2011, U+2013-2014, U+2018-201a, U+201c-201e, U+2020-2021, U+2026, U+2032-2033, U+2039-203a;
			}
		</style>
	<?php } ?>

</head>

<?php
$headerstyle = get_field('header_style');
if (is_singular(array('studio', 'glossary_entry', 'video'))) {
	$headerstyle = "dark";
};
$rcnav = false;
if (is_singular('post') || is_singular('success_story_pod') || is_singular('guide_pod') || is_singular('report_pod') || is_singular('success-stories-with') || is_singular('video') || is_singular('glossary_entry') || is_home() || is_search() || is_archive() || is_page_template(array('success-stories-overview-page.php', 'glossary-page.php', 'reports-overview-page.php', 'ctv-report.php', 'sparklab-report.php', 'creative-reports/creative-report-2024.php', 'videos-overview-page.php', 'ressource-center-overview.php', 'rc-category-page.php', 'rc-objective-page.php', 'events-overview.php', 'sub-events-page.php'))) { //array of pages/templates to show Resource Center nav 
	$rcnav = true;
}
?>

<body <?php body_class($headerstyle); ?> id="skrollr-body">
	<div id="wrapper" class="animsition">
    <?php if (is_page_template(array('frameless-page.php'))) : // array of pages to exclude from showing standard header/nav and footer; custom header code can follow here as needed, otherwise leave blank 
    ?>
    <?php else : // begin regular detection for pages with standard header/footer 
    ?>
        <?php 
        // Check if the current page is NOT the videos_series taxonomy AND matches other conditions
        if ( is_home() || (is_archive() && !is_tax('videos-series') && !is_tax('video-categories')) || is_search() || is_singular('report_pod') || is_page(15611) || is_page(15613) || is_page_template(array('ressource-center-overview.php', 'rc-category-page.php', 'rc-objective-page.php', 'success-stories-overview-page.php', 'reports-overview-page.php', 'policies-page.php', 'terms-page.php', 'policy-gateway.php', 'minimal-page.php', 'ghost-page.php', 'single-success_story_pod.php', 'events-overview.php', 'sub-events-page.php')) || is_singular('success_story_pod') || is_singular('guide_pod')) 
         : //array of pages/templates to exclude from showing a transparent header BG (no large photo in hero, just a plain header) 
        ?>
            <header id="header" class="opaque">
        <?php elseif (get_field('header_style') == 'dark' || is_singular('video') || is_singular('success_story_pod') || is_tax('videos-series') || is_tax('video-categories')): ?>
            <header id="header" class="scrollheader transparent expanded dark">
        <?php elseif (get_field('header_style') == 'light') : ?>
            <header id="header" class="scrollheader transparent expanded light">
        <?php elseif (get_field('header_style') == 'darknav') : ?>
            <header id="header" class="scrollheader transparent expanded dark-nav">
        <?php elseif (get_field('header_style') == 'darklogo' || is_singular('leader') || is_404()) : ?>
            <header id="header" class="scrollheader transparent expanded dark-logo">
        <?php else : ?>
            <header id="header" class="scrollheader transparent expanded">
        <?php endif; ?>
									<div class="nav-wrapper flex justify-between items-center h-[32px]">
										<a href="<?php the_lang_base(); ?>/">
											<div id="header-logo-wrap"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 360 64.821">
													<defs>
														<style>
															.logo-outline {
																fill: #fff;
															}
														</style>
													</defs>
													<title>AppLovin</title>
													<g id="logo-layer" data-name="logo-layer">
														<g id="Logo_Main" data-name="Logo Main">
															<path class="logo-outline" d="M124.543,52.439l-2.809-8.219h-15.4c-.416,1.248-.832,2.7-1.352,4.162l-1.249,4.057H96.243L110.081,14.15h8.011l13.422,38.289ZM113.931,22.474c-.937,2.6-1.873,5.1-2.706,7.595s-1.768,5-2.809,7.8h11.029Z" />
															<path class="logo-outline" d="M153.884,14.254H139.838V52.439h6.451v-12.9h7.595c7.7,0,11.445-3.226,11.445-9.885v-5.41c0-6.659-3.745-9.885-11.445-9.989m-7.595,6.139h7.387c4.37,0,5.1,1.145,5.1,3.954v5.306c0,2.7-.729,3.954-5.1,3.954h-7.387Z" />
															<path class="logo-outline" d="M186.971,14.254H172.925V52.439h6.451v-12.9h7.595c7.7,0,11.445-3.226,11.445-9.885v-5.41c0-6.659-3.745-9.885-11.445-9.989m-7.595,6.139h7.387c4.37,0,5.1,1.145,5.1,3.954v5.306c0,2.7-.728,3.954-5.1,3.954h-7.387Z" />
															<polygon class="logo-outline" points="217.665 48.694 235.249 48.694 235.249 52.543 213.815 52.543 213.815 14.358 217.665 14.358 217.665 48.694" />
															<path class="logo-outline" d="M269.064,41.41c0,6.347-3.954,11.55-13.839,11.55s-13.838-5.2-13.838-11.55V25.179c0-6.347,3.954-11.549,13.838-11.549s13.839,5.2,13.839,11.549Zm-24.035,0c0,5.515,3.329,8.532,10.405,8.532s10.4-3.121,10.4-8.532V25.179c0-5.514-3.329-8.532-10.4-8.532s-10.4,3.122-10.4,8.532Z" />
															<polygon class="logo-outline" points="274.994 14.358 278.74 14.358 291.121 48.694 303.503 14.358 307.353 14.358 293.619 52.543 288.624 52.543 274.994 14.358" />
															<rect class="logo-outline" x="315.364" y="14.358" width="3.85" height="38.185" />
															<polygon class="logo-outline" points="337.734 18.936 337.734 52.543 334.092 52.543 334.092 14.358 339.711 14.358 356.358 47.029 356.358 14.358 360 14.358 360 52.543 355.422 52.543 337.734 18.936" />
															<path class="logo-outline" d="M67.318,47.445a8.636,8.636,0,1,0,8.636,8.636,8.615,8.615,0,0,0-8.636-8.636m5.2,8.74a5.15,5.15,0,1,1-10.3-.1,5.15,5.15,0,1,1,10.3.1h0" />
															<path class="logo-outline" d="M8.636,47.445A8.7,8.7,0,0,0,0,56.185a8.636,8.636,0,0,0,17.272,0,8.7,8.7,0,0,0-8.636-8.74m5.2,8.74a5.2,5.2,0,0,1-5.2,5.1,5.2,5.2,0,0,1-5.1-5.2,5.15,5.15,0,1,1,10.3.1h0" />
															<path class="logo-outline" d="M37.977,0a8.636,8.636,0,1,0,8.636,8.636A8.615,8.615,0,0,0,37.977,0m5.2,8.636a5.1,5.1,0,1,1-5.1-5.1,5.106,5.106,0,0,1,5.1,5.1h0" />
															<path class="logo-outline" d="M64.2,48.486,45.052,13.942l-.208-.312-.208.312a7.381,7.381,0,0,1-2.393,1.977l-.208.1.1.208L59.1,46.821A100.116,100.116,0,0,0,38.289,44.74a93.034,93.034,0,0,0-21.434,2.081l16.96-30.486.1-.208-.208-.1a7.381,7.381,0,0,1-2.393-1.977l-.208-.312-.208.312L11.757,48.486l-.1.208.312.1c.937.312,1.769,1.456,2.6,2.185l.1.1.1-.1h.1a92.646,92.646,0,0,1,23.41-2.6,88.571,88.571,0,0,1,22.786,2.6l.1.208.208-.208h0c.833-.729,1.665-1.873,2.6-2.185l.313-.1Z" />
														</g>
													</g>
												</svg>
												<span class="logo-label">AppLovin</span>
											</div>
										</a>
										<div>
											<ul class="header-nav parent-menu">
												<li class="nav-parent-products"><a href="#" data-subnav="subnav-products-wrap"><?php pll_e('Products') ?></a></li>
												<li class="nav-parent-solutions"><a href="#" data-subnav="subnav-solutions-wrap"><?php pll_e('Solutions') ?></a></li>
												<li class="nav-parent-company"><a href="#" data-subnav="subnav-company-wrap"><?php pll_e('Resources') ?></a></li>
											</ul>
											<div id="subnav-products-wrap" class="sub-menu desktop-menu-wrap">
												<div>
													<div class="production-menu">
														<h6><?php pll_e('POWERFUL FLEXIBLE TECHNOLOGY'); ?></h6>
														<?php if (has_nav_menu('platform-subnav-1')) : ?>
															<?php
															$args = array(
																'theme_location'  => 'platform-subnav-1',
																'container'       => false,
																'menu_id'         => 'platform-products',
																'menu_class'      => 'sub-nav',
																'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
															);
															?>
															<?php wp_nav_menu($args); ?>
														<?php endif; ?>
													</div>
												</div>
											</div>
											<div id="subnav-solutions-wrap" class="sub-menu desktop-menu-wrap">
												<div>
													<div class="solutions-menu">
														<h6><?php pll_e('SOLUTIONS FOR YOUR GOALS'); ?></h6>

														<?php if (has_nav_menu('solutions-subnav-1')) : ?>
															<?php
															$args = array(
																'theme_location'  => 'solutions-subnav-1',
																'container'       => false,
																'menu_id'         => 'solutions-developers',
																'menu_class'      => 'sub-nav sub-nav-bare',
																'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
															);
															?>
															<?php wp_nav_menu($args); ?>
														<?php endif; ?>

													</div>
												</div>
											</div>
											<div id="subnav-company-wrap" class="sub-menu desktop-menu-wrap">
												<div>
													<div class="menu-wrap-con-left">
														<div class="menu-wrap">
															<div class="simple-menu menu-ressource-left">
																<h6><?php pll_e('Resource Center'); ?></h6>
																<?php if (has_nav_menu('platform-subnav-2')) : ?>
																	<?php
																	$args = array(
																		'theme_location'  => 'platform-subnav-2',
																		'container'       => false,
																		'menu_id'         => 'platform-resources',
																		'menu_class'      => 'sub-nav platform-resources-nav',
																		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
																	);
																	?>
																	<?php wp_nav_menu($args); ?>
																<?php endif; ?>

															</div>
														</div>

														<div class="menu-wrap">
															<div class="simple-menu menu-ressource-left">
																<h6><?php pll_e('More about us'); ?></h6>
																<?php if (has_nav_menu('company-subnav-1')) : ?>
																	<?php
																	$args = array(
																		'theme_location'  => 'company-subnav-1',
																		'container'       => false,
																		'menu_id'         => 'company-about',
																		'menu_class'      => 'sub-nav company-nav',
																		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
																	);
																	?>
																	<?php wp_nav_menu($args); ?>
																<?php endif; ?>
															</div>
														</div>
													</div>



													<div class="featured-resources-section">
														<div class="featured-part-section">
															<h6><?php pll_e('Featured posts'); ?></h6>
															<div class="nav-feature-pod-wrap">
																<?php $args = array('post_type' => 'nav_feature_pod', 'orderby' => 'menu_order', 'posts_per_page' => 2);  // retrieve Nav Featured Pods

																$loop = new WP_Query($args);
																while ($loop->have_posts()) : $loop->the_post();

																	$mylink = get_field('content_link_url');
																	$myimg = get_field('pod_image');
																	$mytitle = get_field('content_link_text');

																	echo '<div><a href="' . $mylink . '" target="_blank" rel="noreferrer"><img src="' . $myimg . '" alt="Featured article"><div class="wrappe-title"><h6>' . $mytitle . '</h6></div></a></div>';

																endwhile; ?>
																<?php wp_reset_postdata(); ?>
															</div>

															<div class="border-t-[1px] border-t-[#EEF0F6] w-full pt-[20px]">
																<div class="slate-link-12 uppercase">
																	<a class="!text-[10px] avenir-black" href="<?php the_lang_base(); ?>/resource-center/">
																		<span class="!pt-[0.15rem] !pr-[0.5rem]"><?php pll_e('View all resources'); ?></span>
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
										</div>
										<?php if (has_nav_menu('header-menu')) : ?>
											<?php
											$args = array(
												'theme_location'  => 'header-menu',
												'container'       => false,
												'menu_id'         => 'sign-up-log-in',
												'menu_class'      => 'header-nav',
												'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
											);
											?>
											<?php wp_nav_menu($args); ?>
										<?php endif; ?>

										<button type="button" aria-label="Menu Trigger" id="mobile-nav-trigger" class="mobile-nav-trigger">
											<span class="mobile-nav-icon-wrap">
												<span class="mobile-nav-icon-inner"></span>
											</span>
										</button>

									</div>
									<?php if ($rcnav == true) : // pages to show Resource Center nav 
									?>
										<div class="secondmenu">
											<?php include('rc-nav-demo.php'); ?>
										</div>
									<?php endif; ?>


									</header>


								<?php endif; ?>

								<div id="mobile-nav-container">
									<div class="mobile-header-con">
										<div id="mobile-nav-header">
											<a href="<?php the_lang_base(); ?>/"><img class="mobile-nav-header-logo" src="/wp-content/uploads/2019/09/applovin-logo-hz-black-2019.svg" alt="AppLovin" /></a>
										</div>

										<button type="button" aria-label="Close Menu" id="mobile-close-trigger" class="mobile-close-trigger">
											<span class="mobile-close-icon-wrap">
												<span class="mobile-close-icon-inner"></span>
											</span>
										</button>
									</div>

									<div id="mobile-nav-primary-wrap" class="mobile-nav-wrap">
										<?php
										$args = array(
											'theme_location'  => 'responsive-primary',
											'container'       => false,
											'menu_class'      => 'responsive-primary',
											'items_wrap'      => '<ul id="menu-responsive-nav" class="%2$s">%3$s</ul>',
										);
										?>
										<?php wp_nav_menu($args); ?>
									</div>
									<div id="mobile-nav-secondary-wrap" class="mobile-nav-wrap">
										<?php
										$args = array(
											'theme_location'  => 'header-menu',
											'container'       => false,
											'menu_id'         => 'sign-up-log-in',
											'menu_class'      => 'mobile-nav',
											'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										);
										?>
										<?php wp_nav_menu($args); ?>
										<ul class="social-icons contact-social-icons">
											<li><a href="https://twitter.com/AppLovin" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-x-2023.svg" alt="X"></a></li>
											<li><a href="https://www.facebook.com/AppLovin" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-fb-2023.svg" alt="Facebook"></a></li>
											<li><a href="https://www.linkedin.com/company/applovin" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-li-2023.svg" alt="LinkedIn"></a></li>
											<li><a href="https://www.instagram.com/applovin" target="_blank" rel="noreferrer"><img src="/wp-content/themes/applovin/images/social-icon-ig-2023.svg" alt="Instagram"></a></li>
										</ul>
										<div class="lang-switcher">
											<ul class="responsive-lang-menu">
												<li class="lang-en active"><a href="/">ENG</a></li>
												<li class="lang-cn"><a href="/cn/">中文</a></li>
												<li class="lang-jp"><a href="/ja/">日本語</a></li>
												<li class="lang-kr"><a href="/ko/">한국어</a></li>
											</ul>
										</div>
									</div>
								</div>

								<div id="content-wrapper">
									<main id="main" class="<?php if ($rcnav == 'true') {
																echo 'rc-nav-page';
															} ?>">

										<script>
											document.addEventListener('DOMContentLoaded', function() {
												// Now initiate the functionality that deals with blur effects on the new content-wrapper
												initMenuBlurFunctionality();
											});

											function initMenuBlurFunctionality() {
												var submenus = false;
												var header = jQuery("#header");
												var mainContent = jQuery("#content-wrapper"); // Correctly target the dynamically created content-wrapper

												if (header.hasClass("scrollheader")) {
													jQuery(window).scroll(function() {
														var myscroll = jQuery(window).scrollTop();
														if (myscroll >= 60) {
															jQuery(".scrollheader").removeClass("transparent");
														} else {
															jQuery(".scrollheader").addClass("transparent");
														}
													});
												}

												// Dropdown submenus setup
												jQuery("html").click(function() {
													jQuery(".sub-menu").removeClass("sub-menu-on");
													jQuery(".parent-menu li").removeClass("parent-nav-on parent-nav-disabled");
													submenus = false;
													mainContent.removeClass("blur-background"); // Remove blur from content-wrapper
												});

												jQuery("#header").mouseleave(function() {
													jQuery(".sub-menu").removeClass("sub-menu-on");
													jQuery(".parent-menu li").removeClass("parent-nav-on parent-nav-disabled");
													submenus = false;
													mainContent.removeClass("blur-background"); // Remove blur on mouse leave
												});

												jQuery(".header-nav.parent-menu > li > a").mouseenter(function(e) {
													if (submenus == true) {
														jQuery(".sub-menu").removeClass("sub-menu-on");
														submenus = false;
														mainContent.removeClass("blur-background"); // Remove blur if submenu is closed
													}
													jQuery(".parent-menu li").removeClass("parent-nav-on parent-nav-disabled");
													jQuery(this).parent().addClass("parent-nav-on");
													var activeSub = jQuery(this).attr("data-subnav");
													jQuery("#" + activeSub).addClass("sub-menu-on");
													submenus = true;
													mainContent.addClass("blur-background"); // Add blur to content-wrapper
													return false;
												});

												jQuery(".header-nav.parent-menu > li > a").click(function(e) {
													if (submenus == true) {
														jQuery(".sub-menu").removeClass("sub-menu-on");
														jQuery(this).parent().removeClass("parent-nav-on").addClass("parent-nav-disabled");
														submenus = false;
														mainContent.removeClass("blur-background"); // Remove blur from content-wrapper
													} else {
														var activeSub = jQuery(this).attr("data-subnav");
														jQuery("#" + activeSub).addClass("sub-menu-on");
														jQuery(this).parent().addClass("parent-nav-on").removeClass("parent-nav-disabled");
														submenus = true;
														mainContent.addClass("blur-background"); // Add blur to content-wrapper
													}

													if (jQuery(this).attr("data-subnav") == "none") {
														return true;
													} else {
														return false;
													}
												});
											}
										</script>

										<script>
											// Mobile Nav setup
											var mobileNavTrigger = document.querySelector('#mobile-nav-trigger');
											var mobileNavMenu = document.querySelector('#mobile-nav-container');
											var mobileCloseTrigger = document.querySelector('#mobile-close-trigger');

											// Toggle function for mobile nav trigger
											mobileNavTrigger.addEventListener('click', toggleNavState);

											function toggleNavState() {
												mobileNavTrigger.classList.toggle('active');
												mobileNavMenu.classList.toggle('active');
											}

											// Function to remove 'active' class (close the menu)
											function closeMobileMenu() {
												mobileNavTrigger.classList.remove('active'); // Revert the desktop trigger to hamburger
												mobileNavMenu.classList.remove('active'); // Hide the mobile menu
											}

											// Event listener for the mobile close button
											mobileCloseTrigger.addEventListener('click', closeMobileMenu);

											// Handle parent links with submenus
											var mobileNavParentLinks = document.querySelectorAll('#menu-responsive-nav .menu-item-has-children > a');
											for (var i = 0; i < mobileNavParentLinks.length; i++) {
												mobileNavParentLinks[i].addEventListener('click', toggleSubMenu);
											}

											function toggleSubMenu(e) {
												e.currentTarget.classList.toggle('active');
												return false;
											}
										</script>



										<script>
											document.addEventListener('DOMContentLoaded', function() {
												// Select the necessary elements
												var mobileNavTrigger = document.getElementById('mobile-nav-trigger');
												var mobileCloseTrigger = document.getElementById('mobile-close-trigger');
												var contentWrapper = document.getElementById('main');

												// Function to add blur-background class and disable scrolling
												function addBlurBackground() {
													contentWrapper.classList.add('blur-background');
													document.body.classList.add('no-scroll'); // Disable scrolling
												}

												// Function to remove blur-background class and enable scrolling
												function removeBlurBackground() {
													contentWrapper.classList.remove('blur-background');
													document.body.classList.remove('no-scroll'); // Enable scrolling
												}

												// Add event listener to the mobile nav trigger button
												mobileNavTrigger.addEventListener('click', addBlurBackground);

												// Add event listener to the mobile close trigger button
												mobileCloseTrigger.addEventListener('click', removeBlurBackground);
											});
										</script>





										<script>
											// Select all menu items
											var menuItems = document.querySelectorAll('.mobile-menu-item > a');

											// Define the SVG as a string
											var svgArrow = `
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
  <path d="M14.9998 13.7587H8.99977C8.38478 13.7587 8.02478 13.0537 8.39978 12.5587L11.3998 8.55373C11.6998 8.14873 12.2998 8.14873 12.5998 8.55373L15.5998 12.5587C15.9748 13.0537 15.6148 13.7587 14.9998 13.7587Z" fill="black"/>
</svg>`;

											// Loop through each menu item and insert the SVG
											menuItems.forEach(function(item) {
												// Inject the SVG as the last child of the <a> element
												item.insertAdjacentHTML('beforeend', svgArrow);
											});
										</script>