<!-- Creative Section Start -->
<?php
// Get the creatives_section group field
$creatives_section = get_field('creatives_section');

if ($creatives_section) {
    // Access the h2 and p fields within the creatives_section group
    $section_title = $creatives_section['section_title'];
    $h2 = $creatives_section['h2'];
    $p = $creatives_section['p'];

    // Access the row_one and row_two groups within the creatives_section group
    $row_one = $creatives_section['row_one'];
    $row_two = $creatives_section['row_two'];
    $row_three = $creatives_section['row_three'];
    $cta_bar = $creatives_section['cta_bar'];

    // Access individual columns within row_one
    $row_one_left_column = $row_one['left_column'];
    $row_one_right_column = $row_one['right_column'];

    // Access individual columns within row_two
    $row_two_left_column = $row_two['left_column'];
    $row_two_right_column = $row_two['right_column'];

    // Access individual columns within row_three
    $row_three_left_column = $row_three['left_column'];
    $row_three_right_column = $row_three['right_column'];

    $cta = $cta_bar['cta'];

    
?>
    <section class="creatives-section" aria-labelledby="creatives-section-title" id="creatives">
        <div class="wrapper">
            <div class="text-center m-auto">
                <div class="uppercase text-[14px] pb-[18px] md:pb-[22px] lg:pb-[27px] tracking-[1px] section-title"><?php echo esc_html($section_title); ?></div>
                <h2 class="scale-36-30-24 pb-[10px] md:pb-[15px] lg:pb-[18px] text-black mb-0" id="creatives-section-title"><?php echo esc_html($h2); ?></h2>
                <p class="scale-21-21-18 mb-0"><?php echo esc_html($p); ?></p>
            </div>

            <!-- Row One Start -->
            <?php if ($row_one): ?>
                <div class="grid md:grid-cols-4 lg:grid-cols-2 gap-[32px] pt-[40px] md:pt-[80px]">
                    <div class="md:col-[span_2] lg:col-span-1 m-auto md:mx-[48px] order-2 md:order-1">
                        <?php if ($row_one_left_column): ?>
                            <h3 class="text-[21px] md:text-[24px] text-center md:text-left pb-[8px] text-black mb-0"><?php echo esc_html($row_one_left_column['h3']); ?></h3>
                            <p class="scale-18-18-16 text-center md:text-left mb-0"><?php echo esc_html($row_one_left_column['p']); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="md:col-[span_2] lg:col-span-1 order-1 md:order-2">
                        <?php if ($row_one_right_column && $row_one_right_column['image']): ?>
                            <img src="<?php echo esc_url($row_one_right_column['image']); ?>" alt="Creatives Image">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Row One End -->

            <!-- Row Two Start -->
            <?php if ($row_two): ?>
                <div class="grid md:grid-cols-4 lg:grid-cols-2 gap-[32px] pt-[40px] md:pt-[80px]">
                    <div class="md:col-[span_2] lg:col-span-1">
                        <?php if ($row_two_left_column && $row_two_left_column['image']): ?>
                            <img src="<?php echo esc_url($row_two_left_column['image']); ?>" alt="Creatives Image">
                        <?php endif; ?>
                    </div>

                    <div class="md:col-[span_2] lg:col-span-1 m-auto md:mx-[48px]">
                        <?php if ($row_two_right_column): ?>
                            <h3 class="text-[21px] md:text-[24px] text-center md:text-left pb-[8px] text-black mb-0"><?php echo esc_html($row_two_right_column['h3']); ?></h3>
                            <p class="scale-18-18-16 text-center md:text-left mb-0"><?php echo esc_html($row_two_right_column['p']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Row Two End -->

            <!-- Row Three Start -->
            <?php if ($row_three): ?>
                <div class="grid md:grid-cols-4 lg:grid-cols-2 gap-[32px] pt-[40px] md:pt-[80px]">
                    <div class="md:col-[span_2] lg:col-span-1 m-auto md:mx-[48px] order-2 md:order-1">
                        <?php if ($row_three_left_column): ?>
                            <h3 class="text-[21px] md:text-[24px] text-center md:text-left pb-[8px] text-black mb-0"><?php echo esc_html($row_three_left_column['h3']); ?></h3>
                            <p class="scale-18-18-16 text-center md:text-left mb-0"><?php echo esc_html($row_three_left_column['p']); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="md:col-[span_2] lg:col-span-1 order-1 md:order-2">
                        <?php if ($row_three_right_column && $row_three_right_column['image']): ?>
                            <img src="<?php echo esc_url($row_three_right_column['image']); ?>" alt="Creatives Image">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Row Three End -->

            <?php if ($cta_bar): ?>
                <div class="max-w-[960px] m-auto">
                    <img class="absolute max-w-[200px] lg:left-[40px] top-[-72px] lg:transform-none z-10 left-1/2 transform -translate-x-1/2 " src="https://storage.googleapis.com/applovin_assets_us/images/img_audience_banner.png" alt="video image">
                    <div class="lg:pl-[280px] pt-[140px] lg:pt-[32px] p-[32px] bg-[#181625] rounded-[16px] m-auto mt-[80px] overflow-hidden">

                        <div class="absolute left-[-240px] top-[50px] lg:left-[-100px] lg:top-[-10px]">
                            <svg width="512" height="" viewBox="0 0 712 728" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.45" filter="url(#filter0_f_9112_2483)">
                                    <path d="M542 264.061C542 212.112 501.624 170 451.818 170H260.182C210.376 170 170 212.112 170 264.061V463.939C170 515.888 210.376 558 260.182 558H451.818C501.624 558 542 515.888 542 463.939V264.061Z" fill="url(#paint0_linear_9112_2483)" />
                                </g>
                                <defs>
                                    <filter id="filter0_f_9112_2483" x="0" y="0" width="712" height="728" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                        <feGaussianBlur stdDeviation="85" result="effect1_foregroundBlur_9112_2483" />
                                    </filter>
                                    <linearGradient id="paint0_linear_9112_2483" x1="356" y1="170" x2="216.076" y2="554.332" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF9E1D" />
                                        <stop offset="1" stop-color="#AF0E91" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>

                        <div class="grid lg:flex gap-[40px] z-10">
                            <div class="grid gap-[4px] text-white max-w-[466px] text-center lg:text-left m-auto lg:m-0">
                                <h5 class="avenir-black m-0"><?php echo esc_html($cta_bar['h5']); ?></h5>
                                <p class="m-0 text-[16px]"><?php echo esc_html($cta_bar['p']); ?></p>
                            </div>

                            <!-- Button Start     -->
                            <div class="primary-white-btn m-auto fit-content">
                                <a href="<?php echo esc_html($cta['cta_url']); ?>">
                                    <span><?php echo esc_html($cta['cta_text']); ?></span>
                                </a>
                            </div>
                            <!-- Button End -->
                        </div>

                        <div class="absolute right-[-330px] bottom-[25px] lg:right-[-275px] lg:bottom-[-135px]">
                            <svg width="712" height="" viewBox="0 0 712 728" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g opacity="0.45" filter="url(#filter0_f_9112_2483)">
                                    <path d="M542 264.061C542 212.112 501.624 170 451.818 170H260.182C210.376 170 170 212.112 170 264.061V463.939C170 515.888 210.376 558 260.182 558H451.818C501.624 558 542 515.888 542 463.939V264.061Z" fill="url(#paint0_linear_9112_2483)" />
                                </g>
                                <defs>
                                    <filter id="filter0_f_9112_2483" x="0" y="0" width="712" height="728" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                        <feGaussianBlur stdDeviation="85" result="effect1_foregroundBlur_9112_2483" />
                                    </filter>
                                    <linearGradient id="paint0_linear_9112_2483" x1="356" y1="170" x2="216.076" y2="554.332" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FF9E1D" />
                                        <stop offset="1" stop-color="#AF0E91" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        
                    </div>
                </div>
            <?php endif; ?>


        </div>
    </section>
<?php
}
?>
<!-- Creative Section End -->