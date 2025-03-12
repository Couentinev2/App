<?php

$video_ads_section = get_field('video_ads_section');

if($video_ads_section) {
    $h2 = $video_ads_section['h2'];
    $p = $video_ads_section['p'];

    $video_asset_details = $video_ads_section['video_asset_details'];

    $asset_one = $video_asset_details['asset_one'];
    $specifications_one = $asset_one['specifications'];
    $technical_attributes_one = $asset_one['technical_attributes'];

    $asset_two = $video_asset_details['asset_two'];
    $specifications_two = $asset_two['specifications'];
    $technical_attributes_two = $asset_two['technical_attributes'];

    $asset_three = $video_asset_details['asset_three'];
    $specifications_three = $asset_three['specifications'];
    $technical_attributes_three = $asset_three['technical_attributes'];

    $asset_four = $video_asset_details['asset_four'];
    $specifications_four = $asset_four['specifications'];
    $technical_attributes_four = $asset_four['technical_attributes'];
    $technical_attributes_detail_four = $asset_four['technical_attributes_detail'];

    $row = $video_ads_section['row'];

    $left_column = $row['left_column'];
    $right_column = $row['right_column'];

    $h3 = $left_column['h3'];
    $video_ads_faq = $left_column['video_ads_faq'];

    $faq_one = $video_ads_faq['faq_one'];
    $faq_one_h3 = $faq_one['h3'];
    $faq_one_p = $faq_one['p'];

    $faq_two = $video_ads_faq['faq_two'];
    $faq_two_h3 = $faq_two['h3'];
    $faq_two_p = $faq_two['p'];

    $faq_three = $video_ads_faq['faq_three'];
    $faq_three_h3 = $faq_three['h3'];
    $faq_three_p = $faq_three['p'];

    $faq_four = $video_ads_faq['faq_four'];
    $faq_four_h3 = $faq_four['h3'];
    $faq_four_p = $faq_four['p'];

    $video_ad = $right_column['video_ad'];
?>    
    
    <!-- FAQ One Section Start -->
    <section class="bg-[#181625]" id="accordian-dark">
        <div class="faq-section" data-faq="1">
            <div class="wrapper" data-scroll="centerVertical">
                <div class="grid gap-[80px]">
                    <div class="grid gap-[40px]">
                        <div class="text-center max-w-[800px] m-auto grid gap-[18px] text-white">
                            <h2 class="mb-0 max-w-[650px] m-auto"><?php echo esc_html($h2); ?></h2>
                            <p class="mb-0 text-[21px]"><?php echo esc_html($p); ?></p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[16px]">
                            <div class="flex gap-[12px] p-[24px] bg-[#252A3A] rounded-[8px] text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <mask id="mask0_3410_3312" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                        <rect y="16" width="16" height="16" transform="rotate(-90 0 16)" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_3410_3312)">
                                        <path d="M9.99935 4.66675V6.00008C9.99935 6.18897 10.0632 6.3473 10.191 6.47508C10.3188 6.60286 10.4771 6.66675 10.666 6.66675C10.8549 6.66675 11.0132 6.60286 11.141 6.47508C11.2688 6.3473 11.3327 6.18897 11.3327 6.00008V4.00008C11.3327 3.81119 11.2688 3.65286 11.141 3.52508C11.0132 3.3973 10.8549 3.33341 10.666 3.33341H8.66602C8.47713 3.33341 8.31879 3.3973 8.19102 3.52508C8.06324 3.65286 7.99935 3.81119 7.99935 4.00008C7.99935 4.18897 8.06324 4.3473 8.19102 4.47508C8.31879 4.60286 8.47713 4.66675 8.66602 4.66675H9.99935ZM5.99935 11.3334V10.0001C5.99935 9.81119 5.93546 9.65286 5.80768 9.52508C5.6799 9.3973 5.52157 9.33341 5.33268 9.33341C5.14379 9.33341 4.98546 9.3973 4.85768 9.52508C4.7299 9.65286 4.66602 9.81119 4.66602 10.0001V12.0001C4.66602 12.189 4.7299 12.3473 4.85768 12.4751C4.98546 12.6029 5.14379 12.6667 5.33268 12.6667H7.33268C7.52157 12.6667 7.6799 12.6029 7.80768 12.4751C7.93546 12.3473 7.99935 12.189 7.99935 12.0001C7.99935 11.8112 7.93546 11.6529 7.80768 11.5251C7.6799 11.3973 7.52157 11.3334 7.33268 11.3334H5.99935ZM13.3327 13.3334C13.3327 13.7001 13.2021 14.014 12.941 14.2751C12.6799 14.5362 12.366 14.6667 11.9993 14.6667H3.99935C3.63268 14.6667 3.31879 14.5362 3.05768 14.2751C2.79657 14.014 2.66602 13.7001 2.66602 13.3334L2.66602 2.66675C2.66602 2.30008 2.79657 1.98619 3.05768 1.72508C3.31879 1.46397 3.63268 1.33341 3.99935 1.33341H11.9993C12.366 1.33341 12.6799 1.46397 12.941 1.72508C13.2021 1.98619 13.3327 2.30008 13.3327 2.66675V13.3334Z" fill="#FF9E1D" />
                                    </g>
                                </svg>

                                <div class="grid gap-[4px] h-fit">
                                    <p class="text-[10px] mb-0"><?php echo esc_html($specifications_one); ?></p>
                                    <p class="avenir-heavy text-[16px] mb-0"><?php echo esc_html($technical_attributes_one); ?></p>
                                </div>
                            </div>

                            <div class="flex gap-[12px] p-[24px] bg-[#252A3A] rounded-[8px] text-white">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_3410_3319" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                        <rect width="16" height="16" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_3410_3319)">
                                        <path d="M6.66667 1.99996C6.47778 1.99996 6.31944 1.93607 6.19167 1.80829C6.06389 1.68051 6 1.52218 6 1.33329C6 1.1444 6.06389 0.98607 6.19167 0.858293C6.31944 0.730515 6.47778 0.666626 6.66667 0.666626H9.33333C9.52222 0.666626 9.68056 0.730515 9.80833 0.858293C9.93611 0.98607 10 1.1444 10 1.33329C10 1.52218 9.93611 1.68051 9.80833 1.80829C9.68056 1.93607 9.52222 1.99996 9.33333 1.99996H6.66667ZM8 9.33329C8.18889 9.33329 8.34722 9.2694 8.475 9.14163C8.60278 9.01385 8.66667 8.85552 8.66667 8.66663V5.99996C8.66667 5.81107 8.60278 5.65274 8.475 5.52496C8.34722 5.39718 8.18889 5.33329 8 5.33329C7.81111 5.33329 7.65278 5.39718 7.525 5.52496C7.39722 5.65274 7.33333 5.81107 7.33333 5.99996V8.66663C7.33333 8.85552 7.39722 9.01385 7.525 9.14163C7.65278 9.2694 7.81111 9.33329 8 9.33329ZM8 14.6666C7.17778 14.6666 6.40278 14.5083 5.675 14.1916C4.94722 13.875 4.31111 13.4444 3.76667 12.9C3.22222 12.3555 2.79167 11.7194 2.475 10.9916C2.15833 10.2638 2 9.48885 2 8.66663C2 7.8444 2.15833 7.0694 2.475 6.34163C2.79167 5.61385 3.22222 4.97774 3.76667 4.43329C4.31111 3.88885 4.94722 3.45829 5.675 3.14163C6.40278 2.82496 7.17778 2.66663 8 2.66663C8.68889 2.66663 9.35 2.77774 9.98333 2.99996C10.6167 3.22218 11.2111 3.5444 11.7667 3.96663L12.2333 3.49996C12.3556 3.37774 12.5111 3.31663 12.7 3.31663C12.8889 3.31663 13.0444 3.37774 13.1667 3.49996C13.2889 3.62218 13.35 3.77774 13.35 3.96663C13.35 4.15552 13.2889 4.31107 13.1667 4.43329L12.7 4.89996C13.1222 5.45551 13.4444 6.04996 13.6667 6.68329C13.8889 7.31663 14 7.97774 14 8.66663C14 9.48885 13.8417 10.2638 13.525 10.9916C13.2083 11.7194 12.7778 12.3555 12.2333 12.9C11.6889 13.4444 11.0528 13.875 10.325 14.1916C9.59722 14.5083 8.82222 14.6666 8 14.6666Z" fill="#FF9E1D" />
                                    </g>
                                </svg>


                                <div class="grid gap-[4px] h-fit">
                                    <p class="text-[10px] mb-0"><?php echo esc_html($specifications_two); ?></p>
                                    <p class="avenir-heavy text-[16px] mb-0"><?php echo esc_html($technical_attributes_two); ?></p>
                                </div>
                            </div>

                            <div class="flex gap-[12px] p-[24px] bg-[#252A3A] rounded-[8px] text-white">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_3410_3380" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                        <rect width="16" height="16" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_3410_3380)">
                                        <path d="M4.00033 12.6667V13.3333C4.00033 13.5222 3.93644 13.6806 3.80866 13.8083C3.68088 13.9361 3.52255 14 3.33366 14C3.14477 14 2.98644 13.9361 2.85866 13.8083C2.73088 13.6806 2.66699 13.5222 2.66699 13.3333V2.66667C2.66699 2.47778 2.73088 2.31944 2.85866 2.19167C2.98644 2.06389 3.14477 2 3.33366 2C3.52255 2 3.68088 2.06389 3.80866 2.19167C3.93644 2.31944 4.00033 2.47778 4.00033 2.66667V3.33333H5.33366V2.66667C5.33366 2.47778 5.39755 2.31944 5.52533 2.19167C5.6531 2.06389 5.81144 2 6.00033 2H10.0003C10.1892 2 10.3475 2.06389 10.4753 2.19167C10.6031 2.31944 10.667 2.47778 10.667 2.66667V3.33333H12.0003V2.66667C12.0003 2.47778 12.0642 2.31944 12.192 2.19167C12.3198 2.06389 12.4781 2 12.667 2C12.8559 2 13.0142 2.06389 13.142 2.19167C13.2698 2.31944 13.3337 2.47778 13.3337 2.66667V13.3333C13.3337 13.5222 13.2698 13.6806 13.142 13.8083C13.0142 13.9361 12.8559 14 12.667 14C12.4781 14 12.3198 13.9361 12.192 13.8083C12.0642 13.6806 12.0003 13.5222 12.0003 13.3333V12.6667H10.667V13.3333C10.667 13.5222 10.6031 13.6806 10.4753 13.8083C10.3475 13.9361 10.1892 14 10.0003 14H6.00033C5.81144 14 5.6531 13.9361 5.52533 13.8083C5.39755 13.6806 5.33366 13.5222 5.33366 13.3333V12.6667H4.00033ZM4.00033 11.3333H5.33366V10H4.00033V11.3333ZM4.00033 8.66667H5.33366V7.33333H4.00033V8.66667ZM4.00033 6H5.33366V4.66667H4.00033V6ZM10.667 11.3333H12.0003V10H10.667V11.3333ZM10.667 8.66667H12.0003V7.33333H10.667V8.66667ZM10.667 6H12.0003V4.66667H10.667V6Z" fill="#FF9E1D" />
                                    </g>
                                </svg>


                                <div class="grid gap-[4px] h-fit">
                                    <p class="text-[10px] mb-0"><?php echo esc_html($specifications_three); ?></p>
                                    <p class="avenir-heavy text-[16px] mb-0"><?php echo esc_html($technical_attributes_three); ?></p>
                                </div>
                            </div>

                            <div class="flex gap-[12px] p-[24px] bg-[#252A3A] rounded-[8px] text-white">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_3410_3333" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                        <rect width="16" height="16" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_3410_3333)">
                                        <path d="M2.66634 2.66663L3.74967 4.83329C3.82745 4.98885 3.93856 5.11107 4.08301 5.19996C4.22745 5.28885 4.38301 5.33329 4.54967 5.33329C4.88301 5.33329 5.13856 5.19163 5.31634 4.90829C5.49412 4.62496 5.50523 4.33329 5.34967 4.03329L4.66634 2.66663H5.99967L7.08301 4.83329C7.16079 4.98885 7.2719 5.11107 7.41634 5.19996C7.56079 5.28885 7.71634 5.33329 7.88301 5.33329C8.21634 5.33329 8.4719 5.19163 8.64967 4.90829C8.82745 4.62496 8.83856 4.33329 8.68301 4.03329L7.99967 2.66663H9.33301L10.4163 4.83329C10.4941 4.98885 10.6052 5.11107 10.7497 5.19996C10.8941 5.28885 11.0497 5.33329 11.2163 5.33329C11.5497 5.33329 11.8052 5.19163 11.983 4.90829C12.1608 4.62496 12.1719 4.33329 12.0163 4.03329L11.333 2.66663H13.333C13.6997 2.66663 14.0136 2.79718 14.2747 3.05829C14.5358 3.3194 14.6663 3.63329 14.6663 3.99996V12C14.6663 12.3666 14.5358 12.6805 14.2747 12.9416C14.0136 13.2027 13.6997 13.3333 13.333 13.3333H2.66634C2.29967 13.3333 1.98579 13.2027 1.72467 12.9416C1.46356 12.6805 1.33301 12.3666 1.33301 12V3.99996C1.33301 3.63329 1.46356 3.3194 1.72467 3.05829C1.98579 2.79718 2.29967 2.66663 2.66634 2.66663Z" fill="#FF9E1D" />
                                    </g>
                                </svg>


                                <div class="grid gap-[4px] h-fit">
                                    <p class="text-[10px] mb-0"><?php echo esc_html($specifications_four); ?></p>
                                    <div>
                                        <p class="avenir-heavy text-[16px] mb-0"><?php echo esc_html($technical_attributes_four); ?></p>
                                        <p class="avenir-light text-[12px] mb-0"><?php echo esc_html($technical_attributes_detail_four); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-[80px]">
                        <div class="section-slides-accordion grid gap-[24px] my-auto">

                            <h3 class="text-[14px] avenir-heavy text-[#FF9E1D] uppercase"><?php echo esc_html($h3); ?></h3>

                            <div class="text-white">
                                <div class="accordion-item">
                                    <div class="accordion-title" id="title1">
                                        <div class="loading-bar">
                                            <div class="progress"></div>
                                        </div>
                                        <h3 class="scale-21-21-18"><?php echo esc_html($faq_one_h3); ?></h3>
                                    </div>
                                    <div class="accordion-content">
                                        <p class="scale-18-18-16"><?php echo esc_html($faq_one_p); ?></p>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <div class="accordion-title" id="title2">
                                        <div class="loading-bar">
                                            <div class="progress"></div>
                                        </div>
                                        <h3 class="scale-21-21-18"><?php echo esc_html($faq_two_h3); ?></h3>
                                    </div>
                                    <div class="accordion-content">
                                        <p class="scale-18-18-16"><?php echo esc_html($faq_two_p); ?></p>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <div class="accordion-title" id="title3">
                                        <div class="loading-bar">
                                            <div class="progress"></div>
                                        </div>
                                        <h3 class="scale-21-21-18"><?php echo esc_html($faq_three_h3); ?></h3>
                                    </div>
                                    <div class="accordion-content">
                                        <p class="scale-18-18-16"><?php echo esc_html($faq_three_p); ?></p>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <div class="accordion-title" id="title4">
                                        <div class="loading-bar">
                                            <div class="progress"></div>
                                        </div>
                                        <h3 class="scale-21-21-18"><?php echo esc_html($faq_four_h3); ?></h3>
                                    </div>
                                    <div class="accordion-content">
                                        <p class="scale-18-18-16"><?php echo esc_html($faq_four_p); ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="bg-black rounded-[16px] py-[20px]">
                            <video playsinline autoplay muted loop class="rounded-[16px] w-[315px] h-[560px] m-auto">
                                <source src="<?php echo esc_html($video_ad); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php

$end_cards_section = get_field('end_cards_section');

if($end_cards_section) {
    $h2 = $end_cards_section['h2'];
    $p = $end_cards_section['p'];

    $asset_details = $end_cards_section['asset_details'];

    $asset_one = $asset_details['asset_one'];
    $specifications_one = $asset_one['specifications'];
    $technical_attributes_one = $asset_one['technical_attributes'];

    $asset_two = $asset_details['asset_two'];
    $specifications_two = $asset_two['specifications'];
    $technical_attributes_two = $asset_two['technical_attributes'];

    $asset_three = $asset_details['asset_three'];
    $specifications_three = $asset_three['specifications'];
    $technical_attributes_three = $asset_three['technical_attributes'];

    $row = $end_cards_section['row'];

    $left_column = $row['left_column'];
    $right_column = $row['right_column'];

    $h3 = $left_column['h3'];
    $end_cards_faq = $left_column['end_cards_faq'];

    $faq_one = $end_cards_faq['faq_one'];
    $faq_one_h3 = $faq_one['h3'];
    $faq_one_p = $faq_one['p'];

    $faq_two = $end_cards_faq['faq_two'];
    $faq_two_h3 = $faq_two['h3'];
    $faq_two_p = $faq_two['p'];

    $faq_three = $end_cards_faq['faq_three'];
    $faq_three_h3 = $faq_three['h3'];
    $faq_three_p = $faq_three['p'];

    $faq_four = $end_cards_faq['faq_four'];
    $faq_four_h3 = $faq_four['h3'];
    $faq_four_p = $faq_four['p'];

    $gif_ad = $right_column['gif_ad'];
?>    
    <section class="bg-[#EEF0F6]">
        <div class="faq-section" data-faq="2">
            <div class="wrapper" data-scroll="centerVertical">
                <div class="grid gap-[80px]">
                    <div class="grid gap-[40px]">
                        <div class="text-center max-w-[800px] m-auto grid gap-[18px]">
                            <h2 class="mb-0 max-w-[650px] m-auto"><?php echo esc_html($h2); ?></h2>
                            <p class="mb-0 text-[21px]"><?php echo esc_html($p); ?></p>
                        </div>

                        <div class="grid md:justify-center">
                            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-3 gap-[16px]">
                                <div class="grid md:col-[span_2] lg:col-span-1">
                                    <div class="flex gap-[12px] p-[24px] bg-[#F7F8FC] rounded-[8px] md:w-[288px]">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_3410_3796" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                                <rect width="16" height="16" fill="#D9D9D9" />
                                            </mask>
                                            <g mask="url(#mask0_3410_3796)">
                                                <path d="M5.88333 8L6.86667 7.01667C7 6.88333 7.06667 6.72778 7.06667 6.55C7.06667 6.37222 7 6.21667 6.86667 6.08333C6.73333 5.95 6.575 5.88333 6.39167 5.88333C6.20833 5.88333 6.05 5.95 5.91667 6.08333L4.46667 7.53333C4.4 7.6 4.35278 7.67222 4.325 7.75C4.29722 7.82778 4.28333 7.91111 4.28333 8C4.28333 8.08889 4.29722 8.17222 4.325 8.25C4.35278 8.32778 4.4 8.4 4.46667 8.46667L5.91667 9.91667C6.05 10.05 6.20833 10.1167 6.39167 10.1167C6.575 10.1167 6.73333 10.05 6.86667 9.91667C7 9.78333 7.06667 9.62778 7.06667 9.45C7.06667 9.27222 7 9.11667 6.86667 8.98333L5.88333 8ZM10.1167 8L9.13333 8.98333C9 9.11667 8.93333 9.27222 8.93333 9.45C8.93333 9.62778 9 9.78333 9.13333 9.91667C9.26667 10.05 9.425 10.1167 9.60833 10.1167C9.79167 10.1167 9.95 10.05 10.0833 9.91667L11.5333 8.46667C11.6 8.4 11.6472 8.32778 11.675 8.25C11.7028 8.17222 11.7167 8.08889 11.7167 8C11.7167 7.91111 11.7028 7.82778 11.675 7.75C11.6472 7.67222 11.6 7.6 11.5333 7.53333L10.0833 6.08333C10.0167 6.01667 9.94167 5.96667 9.85833 5.93333C9.775 5.9 9.69167 5.88333 9.60833 5.88333C9.525 5.88333 9.44167 5.9 9.35833 5.93333C9.275 5.96667 9.2 6.01667 9.13333 6.08333C9 6.21667 8.93333 6.37222 8.93333 6.55C8.93333 6.72778 9 6.88333 9.13333 7.01667L10.1167 8ZM3.33333 14C2.96667 14 2.65278 13.8694 2.39167 13.6083C2.13056 13.3472 2 13.0333 2 12.6667V3.33333C2 2.96667 2.13056 2.65278 2.39167 2.39167C2.65278 2.13056 2.96667 2 3.33333 2H12.6667C13.0333 2 13.3472 2.13056 13.6083 2.39167C13.8694 2.65278 14 2.96667 14 3.33333V12.6667C14 13.0333 13.8694 13.3472 13.6083 13.6083C13.3472 13.8694 13.0333 14 12.6667 14H3.33333Z" fill="#FF9E1D" />
                                            </g>
                                        </svg>


                                        <div class="grid gap-[4px] h-fit">
                                            <p class="text-[10px] mb-0"><?php echo esc_html($specifications_one); ?></p>
                                            <p class="avenir-heavy text-[16px] mb-0"><?php echo esc_html($technical_attributes_one); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid md:col-[span_2] lg:col-span-1">
                                    <div class="flex gap-[12px] p-[24px] bg-[#F7F8FC] rounded-[8px] md:w-[288px]">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_3410_3319" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                                <rect width="16" height="16" fill="#D9D9D9" />
                                            </mask>
                                            <g mask="url(#mask0_3410_3319)">
                                                <path d="M6.66667 1.99996C6.47778 1.99996 6.31944 1.93607 6.19167 1.80829C6.06389 1.68051 6 1.52218 6 1.33329C6 1.1444 6.06389 0.98607 6.19167 0.858293C6.31944 0.730515 6.47778 0.666626 6.66667 0.666626H9.33333C9.52222 0.666626 9.68056 0.730515 9.80833 0.858293C9.93611 0.98607 10 1.1444 10 1.33329C10 1.52218 9.93611 1.68051 9.80833 1.80829C9.68056 1.93607 9.52222 1.99996 9.33333 1.99996H6.66667ZM8 9.33329C8.18889 9.33329 8.34722 9.2694 8.475 9.14163C8.60278 9.01385 8.66667 8.85552 8.66667 8.66663V5.99996C8.66667 5.81107 8.60278 5.65274 8.475 5.52496C8.34722 5.39718 8.18889 5.33329 8 5.33329C7.81111 5.33329 7.65278 5.39718 7.525 5.52496C7.39722 5.65274 7.33333 5.81107 7.33333 5.99996V8.66663C7.33333 8.85552 7.39722 9.01385 7.525 9.14163C7.65278 9.2694 7.81111 9.33329 8 9.33329ZM8 14.6666C7.17778 14.6666 6.40278 14.5083 5.675 14.1916C4.94722 13.875 4.31111 13.4444 3.76667 12.9C3.22222 12.3555 2.79167 11.7194 2.475 10.9916C2.15833 10.2638 2 9.48885 2 8.66663C2 7.8444 2.15833 7.0694 2.475 6.34163C2.79167 5.61385 3.22222 4.97774 3.76667 4.43329C4.31111 3.88885 4.94722 3.45829 5.675 3.14163C6.40278 2.82496 7.17778 2.66663 8 2.66663C8.68889 2.66663 9.35 2.77774 9.98333 2.99996C10.6167 3.22218 11.2111 3.5444 11.7667 3.96663L12.2333 3.49996C12.3556 3.37774 12.5111 3.31663 12.7 3.31663C12.8889 3.31663 13.0444 3.37774 13.1667 3.49996C13.2889 3.62218 13.35 3.77774 13.35 3.96663C13.35 4.15552 13.2889 4.31107 13.1667 4.43329L12.7 4.89996C13.1222 5.45551 13.4444 6.04996 13.6667 6.68329C13.8889 7.31663 14 7.97774 14 8.66663C14 9.48885 13.8417 10.2638 13.525 10.9916C13.2083 11.7194 12.7778 12.3555 12.2333 12.9C11.6889 13.4444 11.0528 13.875 10.325 14.1916C9.59722 14.5083 8.82222 14.6666 8 14.6666Z" fill="#FF9E1D" />
                                            </g>
                                        </svg>


                                        <div class="grid gap-[4px] h-fit">
                                            <p class="text-[10px] mb-0"><?php echo esc_html($specifications_two); ?></p>
                                            <p class="avenir-heavy text-[16px] mb-0"><?php echo esc_html($technical_attributes_two); ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid md:col-[2_/_span_2] lg:col-span-1">
                                    <div class="flex gap-[12px] p-[24px] bg-[#F7F8FC] rounded-[8px] md:w-[288px]">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <mask id="mask0_3410_3806" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                                <rect width="16" height="16" fill="#D9D9D9" />
                                            </mask>
                                            <g mask="url(#mask0_3410_3806)">
                                                <path d="M10.1997 14.5832C10.0663 14.7165 9.90801 14.7832 9.72468 14.7832C9.54134 14.7832 9.38301 14.7165 9.24967 14.5832L7.79967 13.1332C7.66634 12.9998 7.59968 12.8443 7.59968 12.6665C7.59968 12.4887 7.66634 12.3332 7.79967 12.1998L9.24967 10.7498C9.38301 10.6165 9.54134 10.5498 9.72468 10.5498C9.90801 10.5498 10.0663 10.6165 10.1997 10.7498C10.333 10.8832 10.3997 11.0387 10.3997 11.2165C10.3997 11.3943 10.333 11.5498 10.1997 11.6832L9.21634 12.6665L10.1997 13.6498C10.333 13.7832 10.3997 13.9387 10.3997 14.1165C10.3997 14.2943 10.333 14.4498 10.1997 14.5832ZM12.4663 14.5832C12.333 14.4498 12.2663 14.2943 12.2663 14.1165C12.2663 13.9387 12.333 13.7832 12.4663 13.6498L13.4497 12.6665L12.4663 11.6832C12.333 11.5498 12.2663 11.3943 12.2663 11.2165C12.2663 11.0387 12.333 10.8832 12.4663 10.7498C12.5997 10.6165 12.758 10.5498 12.9413 10.5498C13.1247 10.5498 13.283 10.6165 13.4163 10.7498L14.8663 12.1998C14.9997 12.3332 15.0663 12.4887 15.0663 12.6665C15.0663 12.8443 14.9997 12.9998 14.8663 13.1332L13.4163 14.5832C13.283 14.7165 13.1247 14.7832 12.9413 14.7832C12.758 14.7832 12.5997 14.7165 12.4663 14.5832ZM2.66634 13.3332C2.29967 13.3332 1.98579 13.2026 1.72467 12.9415C1.46356 12.6804 1.33301 12.3665 1.33301 11.9998V3.99984C1.33301 3.63317 1.46356 3.31928 1.72467 3.05817C1.98579 2.79706 2.29967 2.6665 2.66634 2.6665H6.11634C6.29412 2.6665 6.46356 2.69984 6.62467 2.7665C6.78579 2.83317 6.92745 2.92762 7.04967 3.04984L7.99967 3.99984H13.333C13.6997 3.99984 14.0136 4.13039 14.2747 4.3915C14.5358 4.65262 14.6663 4.9665 14.6663 5.33317V7.99984C14.6663 8.18873 14.6025 8.34706 14.4747 8.47484C14.3469 8.60262 14.1886 8.6665 13.9997 8.6665H9.99967C8.88856 8.6665 7.94412 9.05539 7.16634 9.83317C6.38856 10.6109 5.99967 11.5554 5.99967 12.6665C5.99967 12.8554 5.93579 13.0137 5.80801 13.1415C5.68023 13.2693 5.5219 13.3332 5.33301 13.3332H2.66634Z" fill="#FF9E1D" />
                                            </g>
                                        </svg>



                                        <div class="grid gap-[4px] h-fit">
                                            <p class="text-[10px] mb-0"><?php echo esc_html($specifications_three); ?></p>
                                            <p class="avenir-heavy text-[16px] mb-0"><?php echo esc_html($technical_attributes_three); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-[80px]">
                        <div class="section-slides-accordion grid gap-[24px] my-auto">

                            <h3 class="text-[14px] avenir-heavy text-[#FF9E1D] uppercase"><?php echo esc_html($h3); ?></h3>

                            <div class="">
                                <div class="accordion-item">
                                    <div class="accordion-title" id="title1">
                                        <div class="loading-bar">
                                            <div class="progress"></div>
                                        </div>
                                        <h3 class="scale-21-21-18"><?php echo esc_html($faq_one_h3); ?></h3>
                                    </div>
                                    <div class="accordion-content">
                                        <p class="scale-18-18-16"><?php echo esc_html($faq_one_p); ?></p>
                                    </div>
                                </div>


                                <div class="accordion-item">
                                    <div class="accordion-title" id="title2">
                                        <div class="loading-bar">
                                            <div class="progress"></div>
                                        </div>
                                        <h3 class="scale-21-21-18"><?php echo esc_html($faq_two_h3); ?></h3>
                                    </div>
                                    <div class="accordion-content">
                                        <p class="scale-18-18-16"><?php echo esc_html($faq_two_p); ?></p>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <div class="accordion-title" id="title3">
                                        <div class="loading-bar">
                                            <div class="progress"></div>
                                        </div>
                                        <h3 class="scale-21-21-18"><?php echo esc_html($faq_three_h3); ?></h3>
                                    </div>
                                    <div class="accordion-content">
                                        <p class="scale-18-18-16"><?php echo esc_html($faq_three_p); ?></p>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <div class="accordion-title" id="title4">
                                        <div class="loading-bar">
                                            <div class="progress"></div>
                                        </div>
                                        <h3 class="scale-21-21-18"><?php echo esc_html($faq_four_h3); ?></h3>
                                    </div>
                                    <div class="accordion-content">
                                        <p class="scale-18-18-16"><?php echo esc_html($faq_four_p); ?></p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="bg-[#E3E7F2] rounded-[16px] py-[20px]">
                            <img class="rounded-[16px] w-[315px] h-[560px] m-auto" src="<?php echo esc_html($gif_ad); ?>" alt="">
                        </div>

                    </div>
                </div>
            </div>
            <?php } ?>

            <?php 
            $end_card_validation = get_field('end_card_validation');

            if($end_card_validation) {
                $technical_specs_one = $end_card_validation['technical_specs_one'];
                $technical_specs_one_h3 = $technical_specs_one['h3'];
                $technical_specs_one_p = $technical_specs_one['p'];
                $technical_specs_one_cta = $technical_specs_one['cta'];
                $technical_specs_one_cta_text = $technical_specs_one_cta['cta_text'];
                $technical_specs_one_cta_url = $technical_specs_one_cta['cta_url'];

                $technical_specs_two = $end_card_validation['technical_specs_two'];
                $technical_specs_two_h3 = $technical_specs_two['h3'];
                $technical_specs_two_p = $technical_specs_two['p'];
                $technical_specs_two_cta = $technical_specs_two['cta'];
                $technical_specs_two_cta_text = $technical_specs_two_cta['cta_text'];
                $technical_specs_two_cta_url = $technical_specs_two_cta['cta_url'];
            
            ?>

            <div class="bg-gradient-to-b from-[#EEF0F6] to-[#E3E7F2]">
                <div class="wrapper !pt-0 lg:!pb-[120px]">
                    <div class="max-w-[1140px] m-auto">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-[24px]">
                            <div class="grid gap-[20px] justify-between items-center p-[40px] sunset-gradient rounded-[16px] w-full">
                                <div class="grid gap-[4px]">
                                    <p class="text-[21px] mb-0 avenir-heavy"><?php echo esc_html($technical_specs_one_h3); ?></p>
                                    <p class="text-[18rpx] mb-0"><?php echo esc_html($technical_specs_one_p); ?></p>
                                </div>

                                <div class="slate-link-16">
                                    <a href="<?php echo esc_html($technical_specs_one_cta_url); ?>" target="_blank">
                                        <span><?php echo esc_html($technical_specs_one_cta_text); ?></span>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="UI icon/arrow_forward">
                                                <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="grid gap-[20px] justify-between items-center p-[40px] pink-gradient rounded-[16px] w-full">
                                <div class="grid gap-[4px]">
                                    <p class="text-[21px] mb-0 avenir-heavy"><?php echo esc_html($technical_specs_two_h3); ?></p>
                                    <p class="text-[18rpx] mb-0"><?php echo esc_html($technical_specs_two_p); ?></p>
                                </div>

                                <div class="slate-link-16">
                                    <a href="<?php echo esc_html($technical_specs_two_cta_url); ?>" target="_blank">
                                        <span><?php echo esc_html($technical_specs_two_cta_text); ?></span>
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
            <?php } ?>
        </div>
    </section>

    <!-- FAQ One Section End -->