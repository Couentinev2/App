<?php
/*
Template Name: Press Page
*/
?>
<?php get_header(); ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">
</script>
	<div class="contentPage">
	<div id="pressPage">
		<div class="hero">
		<div class="inner-wrap inner-wrap-1000">
				<h5>
					<?php the_field('hero_title'); ?>
				</h5>
				<h2>
					<?php the_field('hero_intro'); ?>
				</h2>
				<h6><?php the_field('hero_contact_info'); ?></h6>
		</div>
		</div>
		<div class="featured-news row">
		<div class="wrap">
			<h3>
				<?php the_field('featured_title'); ?>
			</h3>
<div class="inner-wrap inner-wrap-1200 featured-pod-wrap">
<?php

$posts = get_field('top_3_news_articles');

if( $posts ): ?>
<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
			<a href="<?php the_field('news_article_url', $p->ID); ?>" class="featured-pod" target="_blank">
				<div class="featured-pod-img">
					<img src="<?php the_field('featured_article_image', $p->ID); ?>" alt="<?php the_field('news_source', $p->ID); ?> story header" class="featured-article-image" />
				</div>
				<div class="featured-pod-text">
					<p class="news-source"><?php the_field('news_source', $p->ID); ?></p>
					<?php echo get_the_title( $p->ID ); ?>
				</div>
			</a>
<?php endforeach; ?>
<?php endif; ?>
</div>
<a href="#stories" class="btn-outline midsize"><?php pll_e('See more stories'); ?></a>
</div>
		</div>
		<div class="awards row">
		<div class="wrap">
		<h3><?php the_field('subhead_awards'); ?></h3>
		<div class="inner-wrap inner-wrap-1000 awards-grid-wrap">

<?php 

echo do_shortcode( '[ajax_load_more id="4952283797" container_type="div" post_type="award" orderby="menu_order" order="ASC" posts_per_page="4" scroll="false" transition_container_classes="awards-container" images_loaded="true" button_label="' . pll__('Show more') . '" button_loading_label="' . pll__('Show more') . '"]' ); ?>

		</div>
		</div>
		</div>
		<div class="about row">
		<div class="inner-wrap inner-wrap-800">
		<h3><?php the_field('subhead_about'); ?></h3>
		<p><?php the_field('about_copy'); ?></p>
		<a href="<?php the_lang_base(); ?>/leadership/" class="promo-link"><?php pll_e('Meet our leadership team'); ?></a>
		</div>
</div>
		<div class="photo-divider-resources row content-row">
			<h2><?php pll_e('Resources'); ?></h2>
		</div>
		<div class="resources row row-modern-gray-100">
				<div class="inner-wrap">
			<div class="resources-pod" id="applovin-in-action">
				<h6><?php the_field('subhead_company'); ?></h6>
				<p><?php the_field('company_copy'); ?></p>
				<a href="#applovin-in-action" class="vimeo-start promo-link promo-video-link" data-id="998434935"><?php pll_e('See us in action'); ?></a>
			</div>
			<div class="resources-pod">
				<h6><?php the_field('subhead_releases'); ?></h6>
				<p><?php the_field('releases_copy'); ?></p>
				<a href="<?php the_lang_base(); ?>/releases/" class="promo-link"><?php pll_e('See recent releases'); ?></a>
			</div>
			<div class="resources-pod">
				<h6><?php the_field('subhead_brand_assets'); ?></h6>
				<p><?php the_field('brand_assets_copy'); ?></p>
				<a href="/brand-hub/" class="promo-link"><?php pll_e('View brand resources'); ?></a>
			</div>
			<div class="resources-pod">
				<h6><?php the_field('subhead_blogs_wechat'); ?></h6>
				<?php if( pll_current_language('slug') != 'cn' ) : ?>
				<p><?php the_field('blogs_wechat_copy'); ?></p>
				<a href="<?php the_lang_base(); ?>/blog/" class="promo-link"><?php pll_e('Read the blog'); ?></a>
				<?php else : ?>
				<div>
					<img src="<?php echo get_field('qrc_image_applovin'); ?>" class="qrc_image" alt="AppLovin WeChat QR Code" />
				</div>
				<?php endif; ?>
			</div>
			</div>
		</div>
		<div id="stories" class="news-list row">
				<h3><?php the_field('subhead_news'); ?></h3>
				<div class="inner-wrap inner-wrap-1000">
			<div class="wrapper">
<?php 
echo do_shortcode( '[ajax_load_more repeater="template_1" post_type="news_link" posts_per_page="5" scroll="false" transition_container_classes="news-links-container" button_label="' . pll__('Show more') . '" button_loading_label="' . pll__('Show more') . '"]' ); 
?>
			</div>

		</div>
		</div>
	<div class="row cta">
		<div class="inner-wrap inner-wrap-800">
			<h2>
				<?php pll_e('Get in touch.') ?>
			</h2>
			<a class="btn-standard mailto" href="mailto:press@applovin.com">press@applovin.com</a> 
		</div>
	</div>
	</div>
</div> <!-- -->
</div>
</div>
</div>
</div>
</div>
</div>
<div class="vimeo-lay">
	<div class="embed-container">
		<iframe src="about:blank" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen allow=autoplay></iframe>
	</div>
	<div class="vimeo-close">
		Close
	</div>
</div>
<?php get_footer(); ?>

