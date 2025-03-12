<!-- Hero Section Start -->
<section class="top-section">

    <div class="hero-section" aria-labelledby="hero-section-title">
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
                $p = $left_column['p'];

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

            // Display the fields
            ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px]">
                <div class="grid gap-[40px] md:gap-[42px] m-auto lg:my-auto lg:ml-0 max-w-[560px]">
                    <div class="grid gap-[8px] md:gap-[12px] lg:gap-[15px]">
                        <div class="avenir-black label-14 uppercase !tracking-[1px] text-center lg:text-left text-black"><?php echo esc_html($div); ?></div>
                        <h1 class="text-center lg:text-left text-black m-0" id="hero-section-title"><?php echo esc_html($h1); ?></h1>
                        <p class="scale-21-21-18 text-center lg:text-left m-0 text-black"><?php echo esc_html($p); ?></p>
                    </div>
                    
       
                    <?php if ($cta_text && $cta_url) : ?>
                        <div class="m-auto lg:m-0">
                            <div class="primary-slate-btn">
                                <a href="<?php echo esc_url($cta_url); ?>"><span><?php echo esc_html($cta_text); ?></span></a>
                            </div>
                        </div>
                    <?php endif; ?>
        
                </div>

                <div class="m-auto">
                    <img src="<?php echo esc_html($image); ?>" alt="Internship Hero">
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </div>

    <div class="internship-slider" aria-labelledby="internship-section-title">
    <?php
    // Get the career_section group field
    $career_section = get_field('career_section');

    if ($career_section) {

        // Access the main title
        $h2 = $career_section['h2'];

        // Access the card_one, card_two, and card_three fields within the career_section group
        $card_one = $career_section['card_one'];
        $card_two = $career_section['card_two'];
        $card_three = $career_section['card_three'];

        // Display the fields
    ?>
    <div class="wrapper lg:!py-[120px] flex flex-col gap-[40px]">
        <h3 class="text-black avenir-black m-0" id="internship-section-title"><?php echo esc_html($h2); ?></h3>
        
        <div class="-mx-[32px]">
            <!-- Slider wrapper -->
            <div id="slider-wrapper" class="overflow-x-auto pl-[32px]">
                <div id="slider" class="flex gap-[24px]">
                    
                    <?php if ($card_one) : ?>
                    <!-- Card 1 start -->
                    <div class="slide h-[480px] p-[24px] md:p-[40px] text-white flex flex-col justify-end rounded-[15px] slide-one">
                        <h3 class="deck text-[36px] md:text-[42px] lg:text-[46px] leading-[46px] mb-[8px] z-[2]"><?php echo esc_html($card_one['h3']); ?></h3>
                        <p class="mb-0 z-[2]"><?php echo esc_html($card_one['p']); ?></p>
                    </div>
                    <!-- Card 1 end -->
                    <?php endif; ?>
                    
                    <?php if ($card_two) : ?>
                    <!-- Card 2 start -->
                    <div class="slide h-[480px] p-[24px] md:p-[40px] text-white flex flex-col justify-end rounded-[15px] slide-two">
                        <h3 class="deck text-[36px] md:text-[42px] lg:text-[46px] leading-[46px] mb-[8px] z-[2]"><?php echo esc_html($card_two['h3']); ?></h3>
                        <p class="mb-0 z-[2]"><?php echo esc_html($card_two['p']); ?></p>
                    </div>
                    <!-- Card 2 end -->
                    <?php endif; ?>
                    
                    <?php if ($card_three) : ?>
                    <!-- Card 3 start -->
                    <div class="slide h-[480px] p-[24px] md:p-[40px] text-white flex flex-col justify-end rounded-[15px] slide-three">
                        <h3 class="deck text-[36px] md:text-[42px] lg:text-[46px] leading-[46px] mb-[8px] z-[2]"><?php echo esc_html($card_three['h3']); ?></h3>
                        <p class="mb-0 z-[2]"><?php echo esc_html($card_three['p']); ?></p>
                    </div>
                    <!-- Card 3 end -->
                    <?php endif; ?>
                    
                </div>
            </div>
            <!-- Slider wrapper end -->
        </div>
    </div>
    <?php
    }
    ?>
</div>



</section>
<!-- Hero Section End -->
