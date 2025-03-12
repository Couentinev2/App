<!-- Quote Section Start -->
<section class="quote-section">
    <div class="wrapper text-center lg:!py-[120px] grid gap-[32px]">
        <?php

        // Get the quote_section group field
        $quote_section = get_field('quote_section');

        if ($quote_section) {
            // Access the fields within the quote_section group
            $quote = $quote_section['quote'];
            $name = $quote_section['name'];
            $position = $quote_section['position'];

        ?>
            <p class="scale-28-24-21 mb-0 text-white max-w-[800px] m-auto"><span class="avenir-medium-oblique">“</span><?php echo esc_html($quote); ?><span class="avenir-medium-oblique">“</span></p>
            <div class="grid gap-[8px]">
                <div class="text-white text-[16px] avenir-heavy"><?php echo esc_html($name); ?></div>
                <div class="text-white text-[16px] avenir-light"><?php echo esc_html($position); ?></div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<!-- Quote Section End -->