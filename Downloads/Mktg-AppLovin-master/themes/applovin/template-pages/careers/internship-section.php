<!-- Internship Section Start -->
<section class="internship-section relative w-[100%] h-[722px] md:h-[780px] lg:h-[820px] overflow-hidden" aria-labelledby="internship-section-title">
        <img src="/wp-content/themes/applovin/images/img-jobs-internship-program.jpg" 
         alt="Background Image" 
         class="absolute top-0 left-0 w-full h-[320px] md:h-[480px] lg:h-full object-cover z-[1]">
         <div class="overlay flex items-end text-white relative z-[1] h-[100%]">
            <div class="wrapper">
                <?php

                $journey_section = get_field('journey_section');

                if ($journey_section) {

                    $div = $journey_section['div'];
                    $h3 = $journey_section['h3'];
                    $p = $journey_section['p'];

                    $apply_now_cta = $journey_section['apply_now_cta'];

                    if ($apply_now_cta) {
                        $apply_cta_text = $apply_now_cta['cta_text'];
                        $apply_cta_url = $apply_now_cta['cta_url'];
                    }

                    $learn_more_cta = $journey_section['learn_more_cta'];

                    if ($learn_more_cta) {
                        $learn_cta_text = $learn_more_cta['cta_text'];
                        $learn_cta_url = $learn_more_cta['cta_url'];
                    }

                ?>
                <div class="m-auto text-center max-w-[800px] grid gap-[40px]">
                    <div class="grid gap-[18px] md:gap-[22px] lg:gap-[27px]">
                        <div class="uppercase text-[14px] text-center tracking-[1px] text-white avenir-black"><?php echo esc_html($div); ?></div>
                        <div class="grid gap-[12px] md:gap-[15px] lg:gap-[18px]">
                            <h3 class="scale-36-30-24 text-white m-auto avenir-black" id="internship-section-title"><?php echo esc_html($h3); ?></h3>
                            <p class="scale-21-21-18 text-white m-0"><?php echo esc_html($p); ?></p>
                        </div>
                    </div>

                    <div class="m-auto w-fit">
                        <div class="flex gap-[24px]">
                        <?php if ($apply_cta_text && $apply_cta_url) : ?>
                            <!-- Button Start -->
                            <div class="primary-gradient-btn">
                                <a href="<?php echo esc_url($apply_cta_url); ?>">
                                    <span><?php echo esc_html($apply_cta_text); ?></span>
                                </a>
                            </div>
                            <!-- Button End -->
                        <?php endif; ?>

                        <?php if ($learn_cta_text & $learn_cta_url) : ?>
                            <!-- Button Start -->
                            <div class="white-link-16 flex">
                                <a href="<?php echo esc_url($learn_cta_url); ?>">
                                    <span><?php echo esc_html($learn_cta_text); ?></span>
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="UI icon/arrow_forward">
                                            <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <!-- Button End -->
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
    }
        ?>
        </div>
</section>
<!-- Internship Section End -->

<!-- Post Internship Section Image Start -->
<img class="block md:hidden" src="/wp-content/themes/applovin/images/illo-jobs-open-positions-mobile.jpg" alt="">
<img class="hidden md:block" src="/wp-content/themes/applovin/images/illo-jobs-open-positions-scaled.jpg" alt="">
<!-- Post Internship Section Image End -->