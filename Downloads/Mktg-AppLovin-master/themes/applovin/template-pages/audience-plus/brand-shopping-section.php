<!-- Brand Shopping Section Start -->
<section class="brand-shopping-section overflow-hidden">
    <?php
    // Get the brand_section group field
    $brand_section = get_field('brand_section');

    if ($brand_section) {
        // Access the h2 and p fields within the brand_section group
        $h2 = $brand_section['h2'];
        $p = $brand_section['p'];

    ?>
        <div class="wrapper !pt-[260px] lg:!pt-[200px] lg:!pb-[120px]" aria-labelledby="brand-section-title">
            <div class="grid gap-[40px]">
                <div class="grid gap-[80px]">
                    <div class="text-center m-auto max-w-[864px] z-10">
                        <h2 class="scale-36-30-24 pb-[18px] mb-0" id="brand-section-title"><?php echo esc_html($h2); ?></h2>
                        <p class="scale-21-21-18 m-0 "><?php echo esc_html($p); ?></p>
                    </div>

                    <div id="videoContainer">
                        <video id="myVideo" class="rounded-[16px] m-auto w-full z-10 relative max-w-[800px]" controls poster="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/audience-plus.webp">
                            <source src="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B_ad_placements_demo_new_icons_OCT_2024_v03.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="gradient-pill-one">
        <img src="/wp-content/uploads/2024/06/gradient-pill-left.svg" alt="Gradient Pill">
    </div>

    <div class="gradient-pill-two">
        <img src="/wp-content/uploads/2024/06/gradient-pill-right.svg" alt="Gradient Pill">
    </div>

    <div class="app-one">
        <img src="/wp-content/uploads/2024/06/app-one.png" alt="App Icon">
    </div>

    <div class="app-two">
        <img src="/wp-content/uploads/2024/06/app-two.png" alt="App Icon">
    </div>

    <div class="app-three">
        <img src="/wp-content/uploads/2024/06/app-three.png" alt="App Icon">
    </div>

    <div class="app-four">
        <img src="/wp-content/uploads/2024/06/app-four.png" alt="App Icon">
    </div>
    <div class="overlay"></div>
</section>
<!-- Brand Shopping Section End -->