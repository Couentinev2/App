<!-- Leadership Section Start -->
<section class="about-section" aria-labelledby="leadership-section-title">
    <div class="wrapper">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] lg:gap-[80px]">
            <div class="grid gap-[40px] my-auto">
                <div class="grid gap-[18px] md:gap-[22px] lg:gap-[27px]">
                    <div class="grid gap-[10px] md:gap-[15px] lg:gap-[18px]">
                        <h3 class="m-0 text-black text-center lg:text-left avenir-black" id="leadership-section-title"><?php the_field('leader_title'); ?></h3>
                        <p class="scale-21-21-18 text-center lg:text-left m-0 text-black lg:max-w-[520px]"><?php the_field('leader_text'); ?></p>
                    </div>
                </div>

                <div class="flex justify-center lg:justify-start">
                    <div class="blue-link-16">
                        <a href="<?php the_field('leader_link_url'); ?>">
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
                <img class="rounded-[16px]" src="<?php the_field('leader_image'); ?>" alt="<?php the_field('leader_image_alt'); ?>" />
            </div>
        </div>
    </div>
</section>
<!-- Leadership Section End -->