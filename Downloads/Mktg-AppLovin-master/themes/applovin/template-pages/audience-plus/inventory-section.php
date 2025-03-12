<!-- Inventory Section Start -->
<?php
// Get the inventory_section group field
$inventory_section = get_field('inventory_section');

if ($inventory_section) {
    // Access the h2 and p fields within the inventory_section group
    $h2 = $inventory_section['h2'];
    ?>
    <!-- Inventory Section Start -->
    <section class="bg-[#252A3A]" aria-labelledby="targeting-section-title" id="inventory">
        <div class="wrapper">
            <div class="grid gap-[40px] lg:gap-[80px]">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_1.3fr] gap-[80px]">
                <div class="grid gap-[18px] md:gap-[22px] lg:gap-[27px] m-auto text-center lg:text-left w-full">
                    <div class="uppercase text-[14px] tracking-[1px] text-[#FF9E1D] avenir-black">Inventory</div>
                    <h3 class="scale-36-30-24 text-white mb-0 lg:max-w-[400px]" id="targeting-section-title"><?php echo esc_html($h2); ?></h3>
                </div>

                <div id="videoContainer">
                <video id="myVideo" class="rounded-[16px] m-auto w-full max-w-[640px]" controls poster="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/audience-plus.webp">
                    <source src="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B_ad_placements_demo_new_icons_OCT_2024_v03.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                </div>
            </div>

            </div>
        </div>
    </section>
    <!-- Inventory Section End -->

<?php } ?>
<!-- Inventory Section End -->
