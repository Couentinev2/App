<!-- CTA Section Start -->
<section class="cta-section" aria-labelledby="cta-section-title">
    <div class="wrapper">
        <div class="m-auto text-center max-w-[800px] grid gap-[40px]">
            <div class="grid gap-[8px] md:gap-[12px] lg:gap-[15px]">
                <h3 class="text-slate-950 m-auto avenir-black" id="cta-section-title"><?php the_field('cta_title'); ?></h3>
                <p class="scale-21-21-18 m-0 text-black"><?php the_field('cta_text'); ?></p>
            </div>

            <!-- Button Start     -->
            <div class="primary-gradient-btn m-auto">
                <a href="/jobs/">
                    <span><?php pll_e('Work with us'); ?></span>
                </a>
            </div>
            <!-- Button End -->
        </div>
    </div>
</section>
<!-- CTA Section End -->