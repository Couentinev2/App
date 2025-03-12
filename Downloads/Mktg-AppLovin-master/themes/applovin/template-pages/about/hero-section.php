<!-- Hero Section -->
<section class="hero-section" aria-labelledby="hero-section-title">
    <div class="wrapper !pt-[120px] !pb-[80px] md:!py-[120px] lg:!py-[140px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px]">
            <div class="grid gap-[40px] md:gap-[42px] m-auto lg:my-auto lg:ml-0 max-w-[550px]">
                <div class="grid gap-[8px] md:gap-[12px] lg:gap-[15px]">
                    <div class="avenir-black label-14 uppercase !tracking-[1px] text-center lg:text-left text-black"><?php the_field('hero_title'); ?></div>
                    <h1 class="scale-50-40-28 avenir-black text-center lg:text-left text-black m-0" id="hero-section-title"><?php the_field('hero_intro'); ?></h1>
                </div>
            </div>

            <div class="m-auto">
                <img src="/wp-content/themes/applovin/images/illo-about-header.png" alt="Quote Mark Icon" />
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->