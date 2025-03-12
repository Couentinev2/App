<?php 

$current_language = pll_current_language();
?>
    
    <!-- End cards Section Start -->
    <section class="bg-[#E3E7F2]">
        <div class="wrapper mx-auto p-6">
            <div class="grid gap-[48px]">
                <?php if ($current_language == 'en') {
					echo '<h3 class="text-[24px] md:text-[30px] lg:text-[36px] avenir-black mb-0">End Card Inspiration</h3>';
                    } else if ($current_language == 'cn') {
                        echo '<h3 class="text-[24px] md:text-[30px] lg:text-[36px] avenir-black mb-0">结尾卡灵感</h3>';
                    };
				?>

                <!-- Static End Cards Start -->
                <div class="grid gap-[24px]">
                    <?php if ($current_language == 'en') {
                        echo '<div class="text-[24px] avenir-black">Static</div>';
                        } else if ($current_language == 'cn') {
                            echo '<div class="text-[24px] avenir-black">静态</div>';
                        };
                    ?>
                    <?php
                    // Query the Ads custom post type
                    $ads_query = new WP_Query([
                        'post_type' => 'ads',
                        'posts_per_page' => -1,
                        'tax_query' => [
                            [
                                'taxonomy' => 'ads_tag', // Registered taxonomy name
                                'field'    => 'slug',   // Slug to filter by the term slug
                                'terms'    => 'static', // The term slug you want to filter by
                            ]
                        ]
                    ]);

                    ?>

                    <!-- End Cards Layout Start -->
                    <div id="ads-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 ">
                        <?php

                        $static_items = []; // Store ad items for modal navigation

                        // Loop through the ads
                        if ($ads_query->have_posts()) :
                            while ($ads_query->have_posts()) : $ads_query->the_post();
                                // Get the ACF fields
                                $ad_html_file_url = get_field('ad_html_file_url'); // HTML file for iframe
                                $cn_ad_html_file_url = get_field('cn_ad_html_file_url'); // CN HTML file for iframe
                                $ad_logo = get_field('ad_company_logo');   // Company logo
                                $thumbnail = get_field('ad_thumbnail');   // Thumbnail for the ad
                                $categories = get_the_terms(get_the_ID(), 'ads_category'); // Ads categories
                                $tags = get_the_terms(get_the_ID(), 'ads_tag'); // Ads tags
                                $ad_url = ($current_language == 'cn') ? $cn_ad_html_file_url : $ad_html_file_url; // Use CN URL if current language is CN


                                // Prepare ad data for the modal
                                $static_items[] = [
                                    'title' => get_the_title(),
                                    'url' => $ad_url,
                                    'cn-url' => $cn_ad_html_file_url,
                                    'logo' => $ad_logo ?? '',
                                    'categories' => $categories ? wp_list_pluck($categories, 'name') : [],
                                    'tags' => $tags ? wp_list_pluck($tags, 'name') : [],
                                ];

                        ?>
                                <div class="relative group border overflow-hidden shadow-md rounded-[16px] w-[282px] lg:w-full m-auto">
                                    <!-- Thumbnail -->
                                    <div class="h-[500px] rounded-t-[16px] bg-center bg-no-repeat bg-cover" style="background-image: url('<?php echo esc_url($thumbnail); ?>');"></div>

                                    <!-- Overlay Container -->
                                    <div class="rounded-b-[16px] bg-white p-[24px] h-[80px] flex justify-between items-center space-y-4 z-30" style="box-shadow: 0px 4px 12px 0px rgba(16, 95, 251, 0.20);">
                                        <img src="<?php echo esc_url($ad_logo); ?>" alt="Company Logo" class="h-[32px] object-contain">
                                        <div class="flex gap-[8px] !m-0">
                                            <button
                                                class="bg-white text-[#3B5EF8] p-[8px] rounded-[8px] text-[12px] border border-[#3B5EF8] avenir-heavy flex items-center space-x-2 !m-0 gap-[4px]"
                                                data-index="<?php echo count($static_items) - 1; ?>"
                                                data-source="adItems"
                                                onclick="openAdModal(this)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <mask id="mask0_3108_978" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                                        <rect width="16" height="16" fill="#D9D9D9" />
                                                    </mask>
                                                    <g mask="url(#mask0_3108_978)">
                                                        <path d="M8.00033 10.6667C8.83366 10.6667 9.54199 10.375 10.1253 9.79169C10.7087 9.20835 11.0003 8.50002 11.0003 7.66669C11.0003 6.83335 10.7087 6.12502 10.1253 5.54169C9.54199 4.95835 8.83366 4.66669 8.00033 4.66669C7.16699 4.66669 6.45866 4.95835 5.87533 5.54169C5.29199 6.12502 5.00033 6.83335 5.00033 7.66669C5.00033 8.50002 5.29199 9.20835 5.87533 9.79169C6.45866 10.375 7.16699 10.6667 8.00033 10.6667ZM8.00033 9.46669C7.50033 9.46669 7.07533 9.29169 6.72533 8.94169C6.37533 8.59169 6.20033 8.16669 6.20033 7.66669C6.20033 7.16669 6.37533 6.74169 6.72533 6.39169C7.07533 6.04169 7.50033 5.86669 8.00033 5.86669C8.50033 5.86669 8.92533 6.04169 9.27533 6.39169C9.62533 6.74169 9.80033 7.16669 9.80033 7.66669C9.80033 8.16669 9.62533 8.59169 9.27533 8.94169C8.92533 9.29169 8.50033 9.46669 8.00033 9.46669ZM8.00033 12.6667C6.3781 12.6667 4.90033 12.2139 3.56699 11.3084C2.23366 10.4028 1.26699 9.18891 0.666992 7.66669C1.26699 6.14446 2.23366 4.93058 3.56699 4.02502C4.90033 3.11946 6.3781 2.66669 8.00033 2.66669C9.62255 2.66669 11.1003 3.11946 12.4337 4.02502C13.767 4.93058 14.7337 6.14446 15.3337 7.66669C14.7337 9.18891 13.767 10.4028 12.4337 11.3084C11.1003 12.2139 9.62255 12.6667 8.00033 12.6667Z" fill="#3B5EF8" />
                                                    </g>
                                                </svg>
                                            </button>

                                            <!-- Download Button -->
                                            <a
                                                href="<?php echo esc_url($current_language === 'cn' ? $cn_ad_html_file_url : $ad_html_file_url); ?>"
                                                target="_blank"
                                                download
                                                class="bg-white text-[#3B5EF8] p-[8px] rounded-[8px] text-[12px] border border-[#3B5EF8] avenir-heavy flex items-center space-x-2 !m-0 gap-[4px]">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="mask0_3531_4230" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="17">
                                                        <rect y="0.666992" width="16" height="16" fill="#D9D9D9" />
                                                    </mask>
                                                    <g mask="url(#mask0_3531_4230)">
                                                        <path d="M5.33301 12.0005H10.6663C10.8552 12.0005 11.0136 11.9366 11.1413 11.8088C11.2691 11.681 11.333 11.5227 11.333 11.3338C11.333 11.1449 11.2691 10.9866 11.1413 10.8588C11.0136 10.731 10.8552 10.6672 10.6663 10.6672H5.33301C5.14412 10.6672 4.98579 10.731 4.85801 10.8588C4.73023 10.9866 4.66634 11.1449 4.66634 11.3338C4.66634 11.5227 4.73023 11.681 4.85801 11.8088C4.98579 11.9366 5.14412 12.0005 5.33301 12.0005ZM7.33301 7.43382L6.73301 6.85049C6.61079 6.72827 6.45801 6.66715 6.27467 6.66715C6.09134 6.66715 5.93301 6.73382 5.79967 6.86715C5.67745 6.98938 5.61634 7.14493 5.61634 7.33382C5.61634 7.52271 5.67745 7.67827 5.79967 7.80049L7.53301 9.53382C7.66634 9.66715 7.8219 9.73382 7.99967 9.73382C8.17745 9.73382 8.33301 9.66715 8.46634 9.53382L10.1997 7.80049C10.3219 7.67827 10.3858 7.52549 10.3913 7.34215C10.3969 7.15882 10.333 7.00049 10.1997 6.86715C10.0775 6.74493 9.92467 6.68104 9.74134 6.67549C9.55801 6.66993 9.39967 6.72827 9.26634 6.85049L8.66634 7.43382V5.33382C8.66634 5.14493 8.60245 4.9866 8.47467 4.85882C8.3469 4.73104 8.18856 4.66715 7.99967 4.66715C7.81079 4.66715 7.65245 4.73104 7.52467 4.85882C7.3969 4.9866 7.33301 5.14493 7.33301 5.33382V7.43382ZM7.99967 15.3338C7.07745 15.3338 6.21079 15.1588 5.39967 14.8088C4.58856 14.4588 3.88301 13.9838 3.28301 13.3838C2.68301 12.7838 2.20801 12.0783 1.85801 11.2672C1.50801 10.456 1.33301 9.58938 1.33301 8.66715C1.33301 7.74493 1.50801 6.87827 1.85801 6.06715C2.20801 5.25604 2.68301 4.55049 3.28301 3.95049C3.88301 3.35049 4.58856 2.87549 5.39967 2.52549C6.21079 2.17549 7.07745 2.00049 7.99967 2.00049C8.9219 2.00049 9.78856 2.17549 10.5997 2.52549C11.4108 2.87549 12.1163 3.35049 12.7163 3.95049C13.3163 4.55049 13.7913 5.25604 14.1413 6.06715C14.4913 6.87827 14.6663 7.74493 14.6663 8.66715C14.6663 9.58938 14.4913 10.456 14.1413 11.2672C13.7913 12.0783 13.3163 12.7838 12.7163 13.3838C12.1163 13.9838 11.4108 14.4588 10.5997 14.8088C9.78856 15.1588 8.9219 15.3338 7.99967 15.3338Z" fill="#3B5EF8" />
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata();
                        else : ?>
                            <p class="text-gray-500">No ads found.</p>
                        <?php endif; ?>
                    </div>
                    <!-- End Cards Layout End -->
                </div>
                <!-- Static End Cards End -->

                <hr class="border-[1px] border-[#CCCCCC] m-0">

                <!-- Carousel or Animation End Cards Start -->
                <div class="grid gap-[24px]">
                    <?php if ($current_language == 'en') {
                        echo '<div class="text-[24px] avenir-black">Carousel or animation</div>';
                        } else if ($current_language == 'cn') {
                            echo '<div class="text-[24px] avenir-black">轮播或动画</div>';
                        };
                    ?>
                    <?php
                    // Query the Ads custom post type
                    $ads_query = new WP_Query([
                        'post_type' => 'ads',
                        'posts_per_page' => -1,
                        'tax_query' => [
                            [
                                'taxonomy' => 'ads_tag', // Registered taxonomy name
                                'field'    => 'slug',   // Slug to filter by the term slug
                                'terms'    => 'carousel-or-animation', // The term slug you want to filter by
                            ]
                        ]
                    ]);

                    ?>

                    <!-- End Cards Layout Start -->
                    <div id="ads-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <?php

                        $carousel_items = []; // Store ad items for modal navigation

                        // Loop through the ads
                        if ($ads_query->have_posts()) :
                            while ($ads_query->have_posts()) : $ads_query->the_post();
                                // Get the ACF fields
                                $ad_html_file_url = get_field('ad_html_file_url'); // HTML file for iframe
                                $cn_ad_html_file_url = get_field('cn_ad_html_file_url'); // CN HTML file for iframe
                                $ad_logo = get_field('ad_company_logo');   // Company logo
                                $thumbnail = get_field('ad_thumbnail');   // Thumbnail for the ad
                                $categories = get_the_terms(get_the_ID(), 'ads_category'); // Ads categories
                                $tags = get_the_terms(get_the_ID(), 'ads_tag'); // Ads tags
                                $ad_url = ($current_language == 'cn') ? $cn_ad_html_file_url : $ad_html_file_url; // Use CN URL if current language is CN

                                // Prepare ad data for the modal
                                $carousel_items[] = [
                                    'title' => get_the_title(),
                                    'url' => $ad_url,
                                    'cn-url' => $cn_ad_html_file_url,
                                    'logo' => $ad_logo ?? '',
                                    'categories' => $categories ? wp_list_pluck($categories, 'name') : [],
                                    'tags' => $tags ? wp_list_pluck($tags, 'name') : [],
                                ];

                        ?>
                                <div class="relative group border overflow-hidden shadow-md rounded-[16px] w-[282px] lg:w-full m-auto">
                                    <!-- Thumbnail -->
                                    <div class=" h-[500px] rounded-t-[16px] bg-center bg-no-repeat bg-cover" style="background-image: url('<?php echo esc_url($thumbnail); ?>');"></div>

                                    <!-- Overlay Container -->
                                    <div class="rounded-b-[16px] bg-white p-[24px] h-[80px] flex justify-between items-center space-y-4 z-30" style="box-shadow: 0px 4px 12px 0px rgba(16, 95, 251, 0.20);">
                                        <img src="<?php echo esc_url($ad_logo); ?>" alt="Company Logo" class="h-[32px] object-contain">
                                        <div class="flex gap-[8px] !m-0">
                                            <button
                                                class="bg-white text-[#3B5EF8] p-[8px] rounded-[8px] text-[12px] border border-[#3B5EF8] avenir-heavy flex items-center space-x-2 !m-0 gap-[4px]"
                                                data-index="<?php echo count($carousel_items) - 1; ?>"
                                                data-source="carousel"
                                                onclick="openAdModal(this)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <mask id="mask0_3108_978" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                                        <rect width="16" height="16" fill="#D9D9D9" />
                                                    </mask>
                                                    <g mask="url(#mask0_3108_978)">
                                                        <path d="M8.00033 10.6667C8.83366 10.6667 9.54199 10.375 10.1253 9.79169C10.7087 9.20835 11.0003 8.50002 11.0003 7.66669C11.0003 6.83335 10.7087 6.12502 10.1253 5.54169C9.54199 4.95835 8.83366 4.66669 8.00033 4.66669C7.16699 4.66669 6.45866 4.95835 5.87533 5.54169C5.29199 6.12502 5.00033 6.83335 5.00033 7.66669C5.00033 8.50002 5.29199 9.20835 5.87533 9.79169C6.45866 10.375 7.16699 10.6667 8.00033 10.6667ZM8.00033 9.46669C7.50033 9.46669 7.07533 9.29169 6.72533 8.94169C6.37533 8.59169 6.20033 8.16669 6.20033 7.66669C6.20033 7.16669 6.37533 6.74169 6.72533 6.39169C7.07533 6.04169 7.50033 5.86669 8.00033 5.86669C8.50033 5.86669 8.92533 6.04169 9.27533 6.39169C9.62533 6.74169 9.80033 7.16669 9.80033 7.66669C9.80033 8.16669 9.62533 8.59169 9.27533 8.94169C8.92533 9.29169 8.50033 9.46669 8.00033 9.46669ZM8.00033 12.6667C6.3781 12.6667 4.90033 12.2139 3.56699 11.3084C2.23366 10.4028 1.26699 9.18891 0.666992 7.66669C1.26699 6.14446 2.23366 4.93058 3.56699 4.02502C4.90033 3.11946 6.3781 2.66669 8.00033 2.66669C9.62255 2.66669 11.1003 3.11946 12.4337 4.02502C13.767 4.93058 14.7337 6.14446 15.3337 7.66669C14.7337 9.18891 13.767 10.4028 12.4337 11.3084C11.1003 12.2139 9.62255 12.6667 8.00033 12.6667Z" fill="#3B5EF8" />
                                                    </g>
                                                </svg>
                                            </button>

                                            <!-- Download Button -->
                                            <a
                                                href="<?php echo esc_url($current_language === 'cn' ? $cn_ad_html_file_url : $ad_html_file_url); ?>"
                                                target="_blank"
                                                download
                                                class="bg-white text-[#3B5EF8] p-[8px] rounded-[8px] text-[12px] border border-[#3B5EF8] avenir-heavy flex items-center space-x-2 !m-0 gap-[4px]">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="mask0_3531_4230" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="17">
                                                        <rect y="0.666992" width="16" height="16" fill="#D9D9D9" />
                                                    </mask>
                                                    <g mask="url(#mask0_3531_4230)">
                                                        <path d="M5.33301 12.0005H10.6663C10.8552 12.0005 11.0136 11.9366 11.1413 11.8088C11.2691 11.681 11.333 11.5227 11.333 11.3338C11.333 11.1449 11.2691 10.9866 11.1413 10.8588C11.0136 10.731 10.8552 10.6672 10.6663 10.6672H5.33301C5.14412 10.6672 4.98579 10.731 4.85801 10.8588C4.73023 10.9866 4.66634 11.1449 4.66634 11.3338C4.66634 11.5227 4.73023 11.681 4.85801 11.8088C4.98579 11.9366 5.14412 12.0005 5.33301 12.0005ZM7.33301 7.43382L6.73301 6.85049C6.61079 6.72827 6.45801 6.66715 6.27467 6.66715C6.09134 6.66715 5.93301 6.73382 5.79967 6.86715C5.67745 6.98938 5.61634 7.14493 5.61634 7.33382C5.61634 7.52271 5.67745 7.67827 5.79967 7.80049L7.53301 9.53382C7.66634 9.66715 7.8219 9.73382 7.99967 9.73382C8.17745 9.73382 8.33301 9.66715 8.46634 9.53382L10.1997 7.80049C10.3219 7.67827 10.3858 7.52549 10.3913 7.34215C10.3969 7.15882 10.333 7.00049 10.1997 6.86715C10.0775 6.74493 9.92467 6.68104 9.74134 6.67549C9.55801 6.66993 9.39967 6.72827 9.26634 6.85049L8.66634 7.43382V5.33382C8.66634 5.14493 8.60245 4.9866 8.47467 4.85882C8.3469 4.73104 8.18856 4.66715 7.99967 4.66715C7.81079 4.66715 7.65245 4.73104 7.52467 4.85882C7.3969 4.9866 7.33301 5.14493 7.33301 5.33382V7.43382ZM7.99967 15.3338C7.07745 15.3338 6.21079 15.1588 5.39967 14.8088C4.58856 14.4588 3.88301 13.9838 3.28301 13.3838C2.68301 12.7838 2.20801 12.0783 1.85801 11.2672C1.50801 10.456 1.33301 9.58938 1.33301 8.66715C1.33301 7.74493 1.50801 6.87827 1.85801 6.06715C2.20801 5.25604 2.68301 4.55049 3.28301 3.95049C3.88301 3.35049 4.58856 2.87549 5.39967 2.52549C6.21079 2.17549 7.07745 2.00049 7.99967 2.00049C8.9219 2.00049 9.78856 2.17549 10.5997 2.52549C11.4108 2.87549 12.1163 3.35049 12.7163 3.95049C13.3163 4.55049 13.7913 5.25604 14.1413 6.06715C14.4913 6.87827 14.6663 7.74493 14.6663 8.66715C14.6663 9.58938 14.4913 10.456 14.1413 11.2672C13.7913 12.0783 13.3163 12.7838 12.7163 13.3838C12.1163 13.9838 11.4108 14.4588 10.5997 14.8088C9.78856 15.1588 8.9219 15.3338 7.99967 15.3338Z" fill="#3B5EF8" />
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata();
                        else : ?>
                            <p class="text-gray-500">No ads found.</p>
                        <?php endif; ?>
                    </div>
                    <!-- End Cards Layout End -->
                </div>
                <!-- Carousel or Animation End Cards End -->

                <hr class="border-[1px] border-[#CCCCCC] m-0">

                <!-- Custom End Cards Start -->
                <div class="grid gap-[24px]">
                    <?php if ($current_language == 'en') {
                        echo '<div class="text-[24px] avenir-black">Custom</div>';
                        } else if ($current_language == 'cn') {
                            echo '<div class="text-[24px] avenir-black">自定义</div>';
                        };
                    ?>
                    <?php
                    // Query the Ads custom post type
                    $ads_query = new WP_Query([
                        'post_type' => 'ads',
                        'posts_per_page' => -1,
                        'tax_query' => [
                            [
                                'taxonomy' => 'ads_tag', // Registered taxonomy name
                                'field'    => 'slug',   // Slug to filter by the term slug
                                'terms'    => 'custom', // The term slug you want to filter by
                            ]
                        ]
                    ]);

                    ?>

                    <!-- End Cards Layout Start -->
                    <div id="ads-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <?php

                        $custom_items = []; // Store ad items for modal navigation

                        // Loop through the ads
                        if ($ads_query->have_posts()) :
                            while ($ads_query->have_posts()) : $ads_query->the_post();
                                // Get the ACF fields
                                $ad_html_file_url = get_field('ad_html_file_url'); // HTML file for iframe
                                $cn_ad_html_file_url = get_field('cn_ad_html_file_url'); // CN HTML file for iframe
                                $ad_logo = get_field('ad_company_logo');   // Company logo
                                $thumbnail = get_field('ad_thumbnail');   // Thumbnail for the ad
                                $categories = get_the_terms(get_the_ID(), 'ads_category'); // Ads categories
                                $tags = get_the_terms(get_the_ID(), 'ads_tag'); // Ads tags
                                $ad_url = ($current_language == 'cn') ? $cn_ad_html_file_url : $ad_html_file_url; // Use CN URL if current language is CN

                                // Prepare ad data for the modal
                                $custom_items[] = [
                                    'title' => get_the_title(),
                                    'url' => $ad_url,
                                    'cn-url' => $cn_ad_html_file_url,
                                    'logo' => $ad_logo ?? '',
                                    'categories' => $categories ? wp_list_pluck($categories, 'name') : [],
                                    'tags' => $tags ? wp_list_pluck($tags, 'name') : [],
                                ];

                        ?>
                                <div class="relative group border overflow-hidden shadow-md rounded-[16px] w-[282px] lg:w-full m-auto">
                                    <!-- Thumbnail -->
                                    <div class=" h-[500px] rounded-t-[16px] bg-center bg-no-repeat bg-cover" style="background-image: url('<?php echo esc_url($thumbnail); ?>');"></div>

                                    <!-- Overlay Container -->
                                    <div class="rounded-b-[16px] bg-white p-[24px] h-[80px] flex justify-between items-center space-y-4 z-30" style="box-shadow: 0px 4px 12px 0px rgba(16, 95, 251, 0.20);">
                                        <img src="<?php echo esc_url($ad_logo); ?>" alt="Company Logo" class="h-[32px] object-contain">
                                        <div class="flex gap-[8px] !m-0">
                                            <button
                                                class="bg-white text-[#3B5EF8] p-[8px] rounded-[8px] text-[12px] border border-[#3B5EF8] avenir-heavy flex items-center space-x-2 !m-0 gap-[4px]"
                                                data-index="<?php echo count($custom_items) - 1; ?>"
                                                data-source="custom"
                                                onclick="openAdModal(this)">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <mask id="mask0_3108_978" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                                        <rect width="16" height="16" fill="#D9D9D9" />
                                                    </mask>
                                                    <g mask="url(#mask0_3108_978)">
                                                        <path d="M8.00033 10.6667C8.83366 10.6667 9.54199 10.375 10.1253 9.79169C10.7087 9.20835 11.0003 8.50002 11.0003 7.66669C11.0003 6.83335 10.7087 6.12502 10.1253 5.54169C9.54199 4.95835 8.83366 4.66669 8.00033 4.66669C7.16699 4.66669 6.45866 4.95835 5.87533 5.54169C5.29199 6.12502 5.00033 6.83335 5.00033 7.66669C5.00033 8.50002 5.29199 9.20835 5.87533 9.79169C6.45866 10.375 7.16699 10.6667 8.00033 10.6667ZM8.00033 9.46669C7.50033 9.46669 7.07533 9.29169 6.72533 8.94169C6.37533 8.59169 6.20033 8.16669 6.20033 7.66669C6.20033 7.16669 6.37533 6.74169 6.72533 6.39169C7.07533 6.04169 7.50033 5.86669 8.00033 5.86669C8.50033 5.86669 8.92533 6.04169 9.27533 6.39169C9.62533 6.74169 9.80033 7.16669 9.80033 7.66669C9.80033 8.16669 9.62533 8.59169 9.27533 8.94169C8.92533 9.29169 8.50033 9.46669 8.00033 9.46669ZM8.00033 12.6667C6.3781 12.6667 4.90033 12.2139 3.56699 11.3084C2.23366 10.4028 1.26699 9.18891 0.666992 7.66669C1.26699 6.14446 2.23366 4.93058 3.56699 4.02502C4.90033 3.11946 6.3781 2.66669 8.00033 2.66669C9.62255 2.66669 11.1003 3.11946 12.4337 4.02502C13.767 4.93058 14.7337 6.14446 15.3337 7.66669C14.7337 9.18891 13.767 10.4028 12.4337 11.3084C11.1003 12.2139 9.62255 12.6667 8.00033 12.6667Z" fill="#3B5EF8" />
                                                    </g>
                                                </svg>
                                            </button>

                                            <!-- Download Button -->
                                            <a
                                                href="<?php echo esc_url($current_language === 'cn' ? $cn_ad_html_file_url : $ad_html_file_url); ?>"
                                                target="_blank"
                                                download
                                                class="bg-white text-[#3B5EF8] p-[8px] rounded-[8px] text-[12px] border border-[#3B5EF8] avenir-heavy flex items-center space-x-2 !m-0 gap-[4px]">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <mask id="mask0_3531_4230" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="17">
                                                        <rect y="0.666992" width="16" height="16" fill="#D9D9D9" />
                                                    </mask>
                                                    <g mask="url(#mask0_3531_4230)">
                                                        <path d="M5.33301 12.0005H10.6663C10.8552 12.0005 11.0136 11.9366 11.1413 11.8088C11.2691 11.681 11.333 11.5227 11.333 11.3338C11.333 11.1449 11.2691 10.9866 11.1413 10.8588C11.0136 10.731 10.8552 10.6672 10.6663 10.6672H5.33301C5.14412 10.6672 4.98579 10.731 4.85801 10.8588C4.73023 10.9866 4.66634 11.1449 4.66634 11.3338C4.66634 11.5227 4.73023 11.681 4.85801 11.8088C4.98579 11.9366 5.14412 12.0005 5.33301 12.0005ZM7.33301 7.43382L6.73301 6.85049C6.61079 6.72827 6.45801 6.66715 6.27467 6.66715C6.09134 6.66715 5.93301 6.73382 5.79967 6.86715C5.67745 6.98938 5.61634 7.14493 5.61634 7.33382C5.61634 7.52271 5.67745 7.67827 5.79967 7.80049L7.53301 9.53382C7.66634 9.66715 7.8219 9.73382 7.99967 9.73382C8.17745 9.73382 8.33301 9.66715 8.46634 9.53382L10.1997 7.80049C10.3219 7.67827 10.3858 7.52549 10.3913 7.34215C10.3969 7.15882 10.333 7.00049 10.1997 6.86715C10.0775 6.74493 9.92467 6.68104 9.74134 6.67549C9.55801 6.66993 9.39967 6.72827 9.26634 6.85049L8.66634 7.43382V5.33382C8.66634 5.14493 8.60245 4.9866 8.47467 4.85882C8.3469 4.73104 8.18856 4.66715 7.99967 4.66715C7.81079 4.66715 7.65245 4.73104 7.52467 4.85882C7.3969 4.9866 7.33301 5.14493 7.33301 5.33382V7.43382ZM7.99967 15.3338C7.07745 15.3338 6.21079 15.1588 5.39967 14.8088C4.58856 14.4588 3.88301 13.9838 3.28301 13.3838C2.68301 12.7838 2.20801 12.0783 1.85801 11.2672C1.50801 10.456 1.33301 9.58938 1.33301 8.66715C1.33301 7.74493 1.50801 6.87827 1.85801 6.06715C2.20801 5.25604 2.68301 4.55049 3.28301 3.95049C3.88301 3.35049 4.58856 2.87549 5.39967 2.52549C6.21079 2.17549 7.07745 2.00049 7.99967 2.00049C8.9219 2.00049 9.78856 2.17549 10.5997 2.52549C11.4108 2.87549 12.1163 3.35049 12.7163 3.95049C13.3163 4.55049 13.7913 5.25604 14.1413 6.06715C14.4913 6.87827 14.6663 7.74493 14.6663 8.66715C14.6663 9.58938 14.4913 10.456 14.1413 11.2672C13.7913 12.0783 13.3163 12.7838 12.7163 13.3838C12.1163 13.9838 11.4108 14.4588 10.5997 14.8088C9.78856 15.1588 8.9219 15.3338 7.99967 15.3338Z" fill="#3B5EF8" />
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile;
                            wp_reset_postdata();
                        else : ?>
                            <p class="text-gray-500">No ads found.</p>
                        <?php endif; ?>
                    </div>
                    <!-- End Cards Layout End -->
                </div>
                <!-- Custom End Cards End -->

            </div>
        </div>
    </section>
    <!-- Endcards Section End -->


    <!-- Modal -->
    <div id="ad-modal" class="hidden fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-[99999]">
        <div class="bg-white rounded-[24px] shadow-lg p-[40px] relative max-w-[659px]">
            <div class="gird grid-cols-1 md:grid-cols-2 gap-2">
                <button class="absolute top-[-44px] right-[-40px]" onclick="closeAdModal()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g opacity="0.3">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12ZM14.895 16.23L11.9998 13.3348L9.10465 16.23C8.92465 16.395 8.69965 16.5 8.44465 16.5C7.93465 16.5 7.51465 16.095 7.51465 15.57C7.51465 15.33 7.60465 15.09 7.78465 14.91L10.6798 12.0148L7.77 9.10501C7.59 8.92501 7.5 8.68501 7.5 8.44501C7.5 7.92001 7.92 7.51501 8.43 7.51501C8.685 7.51501 8.91 7.62001 9.09 7.78501L11.9998 10.6948L14.9096 7.78501C15.0896 7.62001 15.3146 7.51501 15.5696 7.51501C16.0796 7.51501 16.4996 7.92001 16.4996 8.44501C16.4996 8.68501 16.4096 8.92501 16.2296 9.10501L13.3198 12.0148L16.215 14.91C16.395 15.09 16.485 15.33 16.485 15.57C16.485 16.095 16.065 16.5 15.555 16.5C15.3 16.5 15.075 16.395 14.895 16.23Z" fill="black" />
                        </g>
                    </svg>
                </button>
                <div class="flex gap-[40px]">
                    <div class="w-[224px]">
                        <div class="flex flex-col justify-between h-full">
                            <div class="grid gap-[16px]">
                                <div class="border-b-[1px] border-[#E6E6E6] w-full">
                                    <div class="flex justify-between">
                                        <img id="ad-modal-logo" src="" alt="Company Logo" class=" mb-[24px] h-[32px] object-contain">

                                        <a
                                            id="ad-modal-download"
                                            href=""
                                            target="_blank"
                                            download
                                            class="bg-white text-[#3B5EF8] px-[8px] pt-[8px] pb-[6px] rounded-[8px] text-[12px] border border-[#3B5EF8] avenir-heavy flex items-center gap-[4px] h-fit">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <mask id="mask0_3531_4230" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="17">
                                                    <rect y="0.666992" width="16" height="16" fill="#D9D9D9" />
                                                </mask>
                                                <g mask="url(#mask0_3531_4230)">
                                                    <path d="M5.33301 12.0005H10.6663C10.8552 12.0005 11.0136 11.9366 11.1413 11.8088C11.2691 11.681 11.333 11.5227 11.333 11.3338C11.333 11.1449 11.2691 10.9866 11.1413 10.8588C11.0136 10.731 10.8552 10.6672 10.6663 10.6672H5.33301C5.14412 10.6672 4.98579 10.731 4.85801 10.8588C4.73023 10.9866 4.66634 11.1449 4.66634 11.3338C4.66634 11.5227 4.73023 11.681 4.85801 11.8088C4.98579 11.9366 5.14412 12.0005 5.33301 12.0005ZM7.33301 7.43382L6.73301 6.85049C6.61079 6.72827 6.45801 6.66715 6.27467 6.66715C6.09134 6.66715 5.93301 6.73382 5.79967 6.86715C5.67745 6.98938 5.61634 7.14493 5.61634 7.33382C5.61634 7.52271 5.67745 7.67827 5.79967 7.80049L7.53301 9.53382C7.66634 9.66715 7.8219 9.73382 7.99967 9.73382C8.17745 9.73382 8.33301 9.66715 8.46634 9.53382L10.1997 7.80049C10.3219 7.67827 10.3858 7.52549 10.3913 7.34215C10.3969 7.15882 10.333 7.00049 10.1997 6.86715C10.0775 6.74493 9.92467 6.68104 9.74134 6.67549C9.55801 6.66993 9.39967 6.72827 9.26634 6.85049L8.66634 7.43382V5.33382C8.66634 5.14493 8.60245 4.9866 8.47467 4.85882C8.3469 4.73104 8.18856 4.66715 7.99967 4.66715C7.81079 4.66715 7.65245 4.73104 7.52467 4.85882C7.3969 4.9866 7.33301 5.14493 7.33301 5.33382V7.43382ZM7.99967 15.3338C7.07745 15.3338 6.21079 15.1588 5.39967 14.8088C4.58856 14.4588 3.88301 13.9838 3.28301 13.3838C2.68301 12.7838 2.20801 12.0783 1.85801 11.2672C1.50801 10.456 1.33301 9.58938 1.33301 8.66715C1.33301 7.74493 1.50801 6.87827 1.85801 6.06715C2.20801 5.25604 2.68301 4.55049 3.28301 3.95049C3.88301 3.35049 4.58856 2.87549 5.39967 2.52549C6.21079 2.17549 7.07745 2.00049 7.99967 2.00049C8.9219 2.00049 9.78856 2.17549 10.5997 2.52549C11.4108 2.87549 12.1163 3.35049 12.7163 3.95049C13.3163 4.55049 13.7913 5.25604 14.1413 6.06715C14.4913 6.87827 14.6663 7.74493 14.6663 8.66715C14.6663 9.58938 14.4913 10.456 14.1413 11.2672C13.7913 12.0783 13.3163 12.7838 12.7163 13.3838C12.1163 13.9838 11.4108 14.4588 10.5997 14.8088C9.78856 15.1588 8.9219 15.3338 7.99967 15.3338Z" fill="#3B5EF8" />
                                                </g>
                                            </svg>
                                            <span class="text-[12px]">HTML</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="grid gap-[24px]">
                                    <div class="grid">
                                        <div class="avenir-heavy text-[#999] uppercase text-[10px]">Vertical</div>
                                        <!-- Categories -->
                                        <div id="ad-modal-categories"></div>
                                    </div>

                                    <div class="grid">
                                        <div class="avenir-heavy text-[#999] uppercase text-[10px]">Type</div>
                                        <!-- Tags -->
                                        <div id="ad-modal-tags"></div>
                                    </div>
                                </div>

                            </div>


                            <div class="flex gap-[10px] mt-4">
                                <button class="bg-[#F7F8FC] text-white px-2 py-2 rounded-[8px]" onclick="navigateAd(-1)">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.36341 9.36403L9.36342 3.36403C9.71142 3.01603 10.2874 3.01603 10.6354 3.36403C10.9834 3.71203 10.9834 4.28803 10.6354 4.63603L6.17141 9.10003H15.9994C16.4914 9.10003 16.8994 9.50803 16.8994 10C16.8994 10.492 16.4914 10.9 15.9994 10.9H6.17141L10.6354 15.364C10.9834 15.712 10.9834 16.288 10.6354 16.636C10.4554 16.816 10.2274 16.9 9.99941 16.9C9.77141 16.9 9.54342 16.816 9.36342 16.636L3.36341 10.636C3.01542 10.288 3.01542 9.71203 3.36341 9.36403Z" fill="#181625" />
                                    </svg>
                                </button>
                                <button class="bg-[#F7F8FC] text-white px-2 py-2 rounded-[8px]" onclick="navigateAd(1)">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.6366 9.36403L10.6366 3.36403C10.2886 3.01603 9.71259 3.01603 9.36459 3.36403C9.01659 3.71203 9.01659 4.28803 9.36459 4.63603L13.8286 9.10003H4.00059C3.50859 9.10003 3.10059 9.50803 3.10059 10C3.10059 10.492 3.50859 10.9 4.00059 10.9H13.8286L9.36459 15.364C9.01659 15.712 9.01659 16.288 9.36459 16.636C9.54459 16.816 9.77259 16.9 10.0006 16.9C10.2286 16.9 10.4566 16.816 10.6366 16.636L16.6366 10.636C16.9846 10.288 16.9846 9.71203 16.6366 9.36403Z" fill="#181625" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <!-- <div class="grid gap-[4px] absolute left-[-72px] bottom-[24px] bg-[#EEF0F6] w-[72px] h-[80px] p-[12px] rounded-l-[8px]">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_3551_4574" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                    <rect width="16" height="16" fill="#D9D9D9" />
                                </mask>
                                <g mask="url(#mask0_3551_4574)">
                                    <path d="M6.63327 14.0002C6.33327 14.0002 6.04716 13.9363 5.77494 13.8085C5.50271 13.6807 5.27216 13.5002 5.08327 13.2668L0.766602 7.95016L1.19993 7.5335C1.41105 7.32239 1.66105 7.20016 1.94993 7.16683C2.23882 7.1335 2.49994 7.20016 2.73327 7.36683L4.6666 8.71683V2.00016C4.6666 1.81127 4.73049 1.65294 4.85827 1.52516C4.98605 1.39738 5.14438 1.3335 5.33327 1.3335C5.52216 1.3335 5.68049 1.39738 5.80827 1.52516C5.93605 1.65294 5.99994 1.81127 5.99994 2.00016V7.3335H7.33327V4.66683C7.33327 4.47794 7.39716 4.31961 7.52493 4.19183C7.65271 4.06405 7.81105 4.00016 7.99994 4.00016C8.18882 4.00016 8.34716 4.06405 8.47494 4.19183C8.60271 4.31961 8.6666 4.47794 8.6666 4.66683V7.3335H9.99994V5.3335C9.99994 5.14461 10.0638 4.98627 10.1916 4.8585C10.3194 4.73072 10.4777 4.66683 10.6666 4.66683C10.8555 4.66683 11.0138 4.73072 11.1416 4.8585C11.2694 4.98627 11.3333 5.14461 11.3333 5.3335V7.3335H12.6666V6.66683C12.6666 6.47794 12.7305 6.31961 12.8583 6.19183C12.986 6.06405 13.1444 6.00016 13.3333 6.00016C13.5222 6.00016 13.6805 6.06405 13.8083 6.19183C13.936 6.31961 13.9999 6.47794 13.9999 6.66683V11.3335C13.9999 12.0668 13.7388 12.6946 13.2166 13.2168C12.6944 13.7391 12.0666 14.0002 11.3333 14.0002H6.63327Z" fill="#4F5A7D" />
                                </g>
                            </svg>

                            <div class="text-[12px] text-[#4F5A7D] avenir-light">Hover to interact</div>
                        </div> -->
                        <iframe id="ad-modal-iframe" src="" class="w-[315px] h-[560px] border-[4px] border-[#EEF0F6] rounded-[16px]" style="box-shadow: 0px 33.6px 44.8px -29.867px rgba(16, 95, 251, 0.20);"></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php
    // Pass ad items to JavaScript
    echo '<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">const adItems = ' . json_encode($static_items) . ';</script>';
    echo '<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">const carouselItems = ' . json_encode($carousel_items) . ';</script>';
    echo '<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">const customItems = ' . json_encode($custom_items) . ';</script>';
    ?>

    <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
// Initialize the current ad index and source
let currentAdIndex = 0;
let currentDataSource = "";

// Open the modal and display the current ad
function openAdModal(button) {
    // Get the index and source of the selected ad from the button
    currentAdIndex = parseInt(button.getAttribute("data-index"), 10);
    currentDataSource = button.getAttribute("data-source");

    // Determine the correct dataset
    let dataItems;
    if (currentDataSource === "carousel") {
        dataItems = carouselItems;
    } else if (currentDataSource === "custom") {
        dataItems = customItems;
    } else {
        dataItems = adItems;
    }

    // Show the ad
    showAd(dataItems, currentAdIndex);

    // Set inline style for the iframe
    const iframe = document.getElementById("ad-modal-iframe");
    iframe.style.width = "315px";

    // Show the modal and disable scrolling on the body
    document.getElementById("ad-modal").classList.remove("hidden");
    document.body.classList.add("no-scroll");
}

function closeAdModal() {
    const modal = document.getElementById("ad-modal");
    if (modal) {
        modal.classList.add("hidden"); // Hide the modal
        document.body.classList.remove("no-scroll"); // Re-enable body scrolling

        // Reset the iframe source to stop any media playing
        const iframe = document.getElementById("ad-modal-iframe");
        iframe.src = "";
    }
}


// Display the ad in the modal
function showAd(dataItems, index) {
    const ad = dataItems[index]; // Get the ad data from the selected dataset

    // Update the logo in the modal
    document.getElementById("ad-modal-logo").src = ad.logo || "";

    // Update the iframe source
    document.getElementById("ad-modal-iframe").src = ad.url;

    // Update the download button's href attribute
    const downloadButton = document.getElementById("ad-modal-download");
    downloadButton.href = ad.url;

    // Populate categories
    const categoriesContainer = document.getElementById("ad-modal-categories");
    categoriesContainer.innerHTML = ad.categories.length
        ? ad.categories.map(category => `
            <span class="text-[16px] text-gray-800 avenir-light">
                ${category}
            </span>`).join("")
        : '<span class="text-sm text-gray-400">No categories available</span>';

    // Populate tags
    const tagsContainer = document.getElementById("ad-modal-tags");
    tagsContainer.innerHTML = ad.tags.length
        ? ad.tags.map(tag => `
            <span class="text-[16px] text-gray-800 avenir-light">
                ${tag}
            </span>`).join("")
        : '<span class="text-sm text-gray-400">No tags available</span>';
}

// Navigate between ads in the modal
function navigateAd(direction) {
    // Determine the correct dataset
    let dataItems;
    if (currentDataSource === "carousel") {
        dataItems = carouselItems;
    } else if (currentDataSource === "custom") {
        dataItems = customItems;
    } else {
        dataItems = adItems;
    }

    // Update the current ad index based on the direction
    currentAdIndex += direction;

    // Wrap around if the index goes out of bounds
    if (currentAdIndex < 0) {
        currentAdIndex = dataItems.length - 1; // Go to the last ad
    } else if (currentAdIndex >= dataItems.length) {
        currentAdIndex = 0; // Go to the first ad
    }

    // Show the new ad
    showAd(dataItems, currentAdIndex);
}



    </script>
