<!-- Our Values Section Start -->
<section class="our-values" id="our-values" aria-labelledby="values-section-title">
	<div class="wrapper">
		<div class="grid grid-cols-1 lg:grid-cols-[auto_auto] gap-[40px] lg:gap-[120px] grid-main-values">
			<h3 class="scale-36-30-24 text-black w-full lg:max-w-[164px] text-left avenier-black"><?php the_field('our_values_title'); ?></h3>
			<div class="flex flex-col gap-[24px] md:grid md:grid-cols-[auto_auto] md:grid-rows-[auto_auto_auto] md:gap-[40px_16px] lg:grid lg:grid-cols-[auto_auto] lg:grid-rows-[auto_auto_auto] lg:gap-[40px_16px]">
				<?php
				require_once get_template_directory() . '/template-modules/icon-text-item.php';
				render_icon_text_items('values');
				?>
			</div>
		</div>
	</div>
</section>
<!-- Our Values Section End -->