<!-- Hero Section Start -->
<section class="hero-section" aria-labelledby="hero-section-title">
    <div class="wrapper !pt-[120px] !pb-[80px] md:!py-[120px] lg:!py-[140px]">
        <?php
        // Get the hero_section group field
        $hero_section = get_field('hero_section');

        if ($hero_section) {
            // Access the left and right fields within the hero_section group
            $left_column = $hero_section['left_column'];
            $right_column = $hero_section['right_column'];

            if ($left_column) {
                // Access the fields within the left_column group
                $div = $left_column['div'];
                $h1 = $left_column['h1'];

                // Access the cta group within the left_column group
                $cta = $left_column['cta'];

                if ($cta) {
                    // Access the fields within the cta group
                    $cta_text = $cta['cta_text'];
                    $cta_url = $cta['cta_url'];
                }
            }

            if ($right_column) {
                // Access the image field within the right_column group
                $image = $right_column['image'];
            }

        ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px]">
                <div class="lg:col-span-1 m-auto lg:my-auto lg:ml-0 max-w-[560px]">
                    <div class="grid gap-[42px]">
                        <div class="grid gap-[8px] md:gap-[12px] lg:gap-[15px]">
                            <div class="uppercase text-[14px] text-center lg:text-left tracking-[1px] text-black avenir-black"><?php echo esc_html($div); ?></div>
                            <h1 class="text-center lg:text-left text-black" id="hero-section-title"><?php echo esc_html($h1); ?></h1>
                        </div>

                        <?php if ($cta_text && $cta_url) : ?>
                            <div class="m-auto lg:m-0">
                                <div class="primary-slate-btn">
                                    <a href="<?php echo esc_url($cta_url); ?>"><span><?php echo esc_html($cta_text); ?></span></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="m-auto">
                    <img src="<?php echo esc_html($image); ?>" alt="Careers Hero">
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<!-- Hero Section End -->