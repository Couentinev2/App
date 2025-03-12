<!-- Programs Section Start -->
<section class="programs-section bg-[#F7F8FC]" aria-labelledby="programs-section-title">
    <?php

    $programs_section = get_field('programs_section');

    if ($programs_section) {

        $h2 = $programs_section['h2'];
        $programs_tiles = $programs_section['programs_tiles'];

    ?>

        <div class="wrapper !pt-0 grid gap-[40px]">

            <h3 class="m-0 text-center text-black avenir-black" id="programs-section-title"><?php echo esc_html($h2); ?></h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[40px] lg:gap-[24px]">
                <?php if (!empty($programs_tiles)) :
                    foreach ($programs_tiles as $programs_tile) :
                        $tile_image = $programs_tile['tile']['image'];
                        $tile_text = $programs_tile['tile']['text'];
                ?>
                        <div class="bg-white p-[40px] rounded-[16px] grid gap-[32px]">
                            <img src="<?php echo esc_url($tile_image); ?>" alt="Internship Icon">
                            <p class="scale-18-18-16 mb-0 text-black md:h-[105px]"><?php echo wp_kses_post($tile_text); ?></p>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>



        <?php
    }
        ?>


        <?php

        $experience_section = get_field('experience_section');

        if ($experience_section) {

            $left_column = $experience_section['left_column'];
            $right_column = $experience_section['right_column'];

            if ($left_column) {
                $h5 = $left_column['h5'];
                $benefits = $left_column['benefits_list'];
            }

            if ($right_column) {
                $image = $right_column['image'];
            }
        ?>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] lg:gap-[80px]">
                <div class="grid gap-[16px] md:gap-[40px] m-auto order-2 lg:order-1 my-auto">
                    <h5 class="m-0 text-black avenir-black"><?php echo esc_html($h5); ?></h5>
                    <ul class="text-[18px] md:columns-2 text-black m-0 p-0 avenir-light">
                        <?php if (!empty($benefits)) :
                            foreach ($benefits as $benefit) : ?>
                                <li><?php echo esc_html($benefit['benefit_item']); ?></li>
                        <?php endforeach;
                        endif; ?>
                    </ul>
                </div>

                <div class="order-1 lg:order-2 m-auto max-w-[640px]">
                    <img class="rounded-[16px]" src="<?php echo esc_url($image); ?>" alt="Intern Having Lunch">
                </div>
            </div>
        <?php
        }
        ?>
        </div>

</section>
<!-- Programs Section End -->