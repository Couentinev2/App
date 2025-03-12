<!-- Legacy Press Releases setup -->
<section class="bg-[#EEF0F6]">
    <div class="wrapper">
        <div class="max-w-[1000px] mx-auto grid gap-[48px]">
            <h3 class="avenir-black text-center text-black m-0"><?php pll_e('Press Releases');?></h3>
			<?php 
			echo do_shortcode( '[ajax_load_more repeater="template_2" post_type="press_release" posts_per_page="6" scroll="false" css_classes="grid gap-6 sm:grid-cols-1 md:grid-cols-2 p-0" transition_container_classes="press-releases-container" button_label="' . pll__('Show more') . '" button_loading_label="' . pll__('Show more') . '"]' ); 
			?>
        </div>
    </div>
</section>
<!-- End Legacy Press Releases setup -->
