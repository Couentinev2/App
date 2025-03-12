<?php
/*
Template Name: Brand Assets Page
*/
?>
<?php get_header(); ?>
	<div class="contentPage">
	<div id="pressPage" class="brandPage">
		<div class="hero">
		<div class="inner-wrap">

				<h5>
					<?php the_field('hero_title'); ?>
				</h5>
				<h2>
					<?php the_field('hero_intro'); ?>
				</h2>
				<h6><?php the_field('media_kit_desc'); ?></h6>
				<a href="/wp-content/themes/applovin/assets/AppLovinMediaKit2023v2.zip" class="btn-standard btn-inverted midsize" target="_blank" download><?php pll_e('Download media kit'); ?></a>
				<div class="filesize-stamp">(220MB .zip)</div>
		</div>
		</div>

		<div class="brand-logos row wrap">
			<div class="copy-pod">
				<h3><?php the_field('subhead_logos'); ?></h3>
				<p><?php the_field('logos_desc'); ?></p>
				<a href="/wp-content/themes/applovin/assets/AppLovinBrandLogos.zip" class="download" target="_blank" download><?php pll_e('Download logos'); ?></a> <div class="filesize-stamp">(10MB .zip)</div>
			</div>
			<div class="image-pod">
				<img src="/wp-content/themes/applovin/images/media-kit-logo-applovin.png" alt="AppLovin logo" />
				<img src="/wp-content/themes/applovin/images/media-kit-thumbnail-logos.jpg" alt="Platform logos" />
				<img src="/wp-content/themes/applovin/images/media-kit-logo-lion-2019.png" alt="Lion Studios logo" />
			</div>
		</div>
		<div class="brand-photos row wrap">
			<div class="copy-pod">
				<h3><?php the_field('subhead_office_photos'); ?></h3>
				<p><?php the_field('office_photos_desc'); ?></p>
				<a href="/wp-content/themes/applovin/assets/AppLovinOfficeShotsv2.zip" class="download" target="_blank" download><?php pll_e('Download photos'); ?></a> <div class="filesize-stamp">(25MB .zip)</div>
			</div>
			<div class="image-pod">
				<img src="/wp-content/themes/applovin/images/media-kit-photo-officev2.jpg" alt="AppLovin office photo" />
			</div>
		</div>
		<div class="brand-leadership row wrap">
			<div class="copy-pod">
				<h3><?php the_field('subhead_leader_photos'); ?></h3>
				<p><?php the_field('leader_photos_desc'); ?></p>
				<a href="/wp-content/themes/applovin/assets/AppLovin_Leadership_Photos_2024.zip" class="download" target="_blank" download><?php pll_e('Download photos'); ?></a> <div class="filesize-stamp">(135MB .zip)</div>
			</div>
			<div class="image-pod">
				<img src="/wp-content/themes/applovin/images/media-kit-photo-leaders.jpg" alt="AppLovin leadership headshots" />
			</div>
		</div>
		<div class="brand-language row row-modern-gray-200">
		<div class="inner-wrap">
			<div class="copy-pod">
				<h3><?php the_field('subhead_language'); ?></h3>
				<p><?php the_field('language_desc'); ?></p>
			</div>
			<div class="copy-pod copy-pod-secondary">
				<h6><?php the_field('subhead_spelling'); ?></h6>
				<p><?php the_field('spelling_desc'); ?></p>
				<h6><?php the_field('subhead_boilerplate'); ?></h6>
				<p><?php the_field('boilerplate_desc'); ?></p>
				<h6><?php the_field('subhead_url'); ?></h6>
				<p><?php the_field('url_desc'); ?></p>
				<h6><?php the_field('subhead_lion'); ?></h6>
				<p><?php the_field('lion_desc'); ?></p>
			</div>
		</div>
		</div>

	<div class="row cta cta-blue">
		<div class="inner-wrap">
			<h2>
				<?php pll_e('Get in touch.'); ?>
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
<?php get_footer(); ?>
