<!-- Board of Directors Section Start -->
<section class="board-section" id="board-of-directors" aria-labelledby="board-section-title">
    <div class="wrapper grid gap-[40px]">
        <h3 class="avenir-black text-black text-center m-0" id="board-section-title"><?php the_field('board_of_directors_title'); ?></h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-[40px]">

            <?php

            // Check that rows exist
            if (have_rows('board_of_directors')):

                // Loop through rows
                while (have_rows('board_of_directors')) : the_row();

                    // Load sub fields
                    $sub_name = get_sub_field('board_member_name');
                    $sub_title = get_sub_field('board_member_title_1');
                    $sub_company = get_sub_field('board_member_company_1');
                    $sub_title_2 = get_sub_field('board_member_title_2');
                    $sub_company_2 = get_sub_field('board_member_company_2');

                    echo '<div class="text-center md:text-left">
                        <h4 class="avenir-black text-black scale-21-21-18">' . $sub_name . '</h4>
                        <p class="text-black m-0">' . $sub_title . '</p>
                        <p class="avenir-light fixed-16 text-[#999999] mb-[8px]">' . $sub_company . '</p>';
                    if ($sub_title_2 != '') :
                        echo '<p class="text-black m-0">' . $sub_title_2 . '</p>
                                <p class="avenir-light fixed-16 text-[#999999] m-0">' . $sub_company_2 . '</p>';
                    endif;

                    echo '</div>';

                // End loop.
                endwhile;

            endif;
            ?>

        </div>

    </div>
</section>
<!-- Board of Directors Section End -->