<!-- Engineering Section Start -->
<section class="about-section bg-[#F7F8FC]" aria-labelledby="about-section-title">
    <div class="wrapper grid gap-[40px] lg:gap-[80px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] lg:gap-[80px]">
            <div class="grid gap-[40px]">
                <div class="grid gap-[18px] md:gap-[22px] lg:gap-[27px]">
                    <div class="grid gap-[10px] md:gap-[15px] lg:gap-[18px]">
                        <h3 class="m-0 text-black text-center lg:text-left avenir-black" id="about-section-title"><?php the_field('subhead_about'); ?></h3>
                        <p class="scale-21-21-18 text-center lg:text-left m-0 text-black lg:max-w-[520px]"><?php the_field('about_copy'); ?></p>
                    </div>
                </div>

                <div class="flex justify-center lg:justify-start">
                    <div class="blue-link-16">
                        <a href="<?php the_lang_base(); ?>/leadership/">
                            <span><?php pll_e('Meet our leadership team'); ?></span>
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="UI icon/arrow_forward">
                                    <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="m-auto max-w-[600px]">
                <img class="rounded-[16px]" src="<?php echo get_template_directory_uri(); ?>/images/img-press-aboutus.jpg" alt="Careers Hero">
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-[40px] lg:gap-[80px]">
            <div class="border-t-2 border-[#E6E6E6]">
                <div class="flex flex-col">
                    <div class="grid gap-[18px]">
                        <div class="grid gap-[8px] pt-[18px]">
                            <h3 class="scale-18-18-16 text-black mb-0"><?php the_field('subhead_company'); ?></h3>
                            <p class="text-[16px] text-black mb-0"><?php the_field('company_copy'); ?></p>
                        </div>

                        <div class="flex justify-start">
                            <div class="blue-link-16">
                                <a onclick="openLightbox(); return false;" href="#">
                                    <span><?php pll_e('See us in action'); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 8.5C0.25 4.22 3.72 0.75 8 0.75C12.28 0.75 15.75 4.22 15.75 8.5C15.75 12.78 12.28 16.25 8 16.25C3.72 16.25 0.25 12.78 0.25 8.5ZM8 2.25C4.55 2.25 1.75 5.05 1.75 8.5C1.75 11.95 4.55 14.75 8 14.75C11.45 14.75 14.25 11.95 14.25 8.5C14.25 5.05 11.45 2.25 8 2.25Z" fill="#099AC6" />
                                        <path d="M7 5.92999L10.7 8.05999C11.03 8.24999 11.03 8.72999 10.7 8.92999L7 11.06C6.67 11.25 6.25 11.01 6.25 10.63V6.35999C6.25 5.97999 6.67 5.72999 7 5.92999Z" fill="#099AC6" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t-2 border-[#E6E6E6]">
                <div class="flex flex-col">
                    <div class="grid gap-[18px]">
                        <div class="grid gap-[8px] pt-[18px]">
                            <div class="flex gap-[8px] items-center">
                                <h3 class="scale-18-18-16 text-black mb-0"><?php the_field('subhead_brand_assets'); ?></h3>
                                <span class="px-[6px] py-[2px] text-[#6441E2] bg-purple text-[10px] rounded-[4px] uppercase avenir-heavy tracking-[0.5px] leading-[14px]"><?php pll_e('NEW'); ?></span>
                            </div>
                            <p class="text-[16px] text-black mb-0"><?php the_field('brand_assets_copy'); ?></p>
                        </div>

                        <div class="flex justify-start">
                            <div class="blue-link-16">
                                <a href="/brand-hub/">
                                    <span><?php pll_e('View brand resources'); ?></span>
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

            <div class="border-t-2 border-[#E6E6E6]">
                <div class="flex flex-col">
                    <div class="grid gap-[18px]">
                        <?php if (pll_current_language('slug') != 'cn') : ?>
                            <div class="grid gap-[8px] pt-[18px]">
                                <h3 class="scale-18-18-16 text-black mb-0"><?php the_field('subhead_blogs_wechat'); ?></h3>
                                <p class="text-[16px] text-black mb-0"><?php the_field('blogs_wechat_copy'); ?></p>
                            </div>

                            <div class="flex justify-start">
                                <div class="blue-link-16">
                                    <a href="<?php the_lang_base(); ?>/blog/">
                                        <span><?php pll_e('Read the blog'); ?></span>
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="UI icon/arrow_forward">
                                                <path id="Vector" d="M27.06 14.94L17.06 4.94C16.48 4.36 15.52 4.36 14.94 4.94C14.36 5.52 14.36 6.48 14.94 7.06L22.38 14.5H6C5.18 14.5 4.5 15.18 4.5 16C4.5 16.82 5.18 17.5 6 17.5H22.38L14.94 24.94C14.36 25.52 14.36 26.48 14.94 27.06C15.24 27.36 15.62 27.5 16 27.5C16.38 27.5 16.76 27.36 17.06 27.06L27.06 17.06C27.64 16.48 27.64 15.52 27.06 14.94Z"></path>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="mt-[18px] max-w-[105px] h-auto border-8 border-white rounded-lg box-content">
                                <img src="<?php echo get_field('qrc_image_applovin'); ?>" class="qrc_image" alt="AppLovin WeChat QR Code" />
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('template-modules/applovin-lightbox'); ?>
</section>
<!-- Engineering Section End -->