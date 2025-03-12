<!-- Testimonial Section Start-->
<section class="testimonials-section bg-blue-purple-gradient" aria-labelledby="testimonials-section-title">
  <?php

  $testimonials_section = get_field('testimonials_section');

  if ($testimonials_section) {
    $h3 = $testimonials_section['h3'];
    $testimonials_slides = $testimonials_section['testimonials_slides'];
  ?>
    <div class="wrapper lg:!py-[120px] grid gap-[40px]">
      <h3 class="text-white avenir-black m-auto text-center" id="testimonials-section-title"><?php echo esc_html($h3); ?></h3>
      <div class="max-w-[1000px] m-auto block md:grid md:grid-cols-[30px_auto] md:grid-rows-[auto] md:gap-x-2.5">

        <div class="m-auto text-white flex flex-row gap-6 items-center justify-center pb-5 md:m-auto md:text-white md:flex md:flex-col md:gap-6 md:items-center slider-controls">
          <img class="-rotate-90 cursor-pointer md:rotate-0 prev" src="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/App-BrandSEM-2024/img/arrow_up.svg">
          <span class="counter fixed-12 avenir-heavy"></span>
          <img class="-rotate-90 cursor-pointer md:rotate-0 next" src="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/App-BrandSEM-2024/img/arrow_down.svg">
        </div>

        <?php if (!empty($testimonials_slides)) :
          foreach ($testimonials_slides as $testimonials_slide) :
            $testimonial_image = $testimonials_slide['slide']['image'];
            $testimonial_text = $testimonials_slide['slide']['text'];
            $testimonial_name = $testimonials_slide['slide']['name'];
            $testimonial_position = $testimonials_slide['slide']['position'];
        ?>

        <!-- Testimonial Panel 1 -->
        <div class="testimonials-panel mt-0 grid grid-cols-1 gap-x-5 md:grid-cols-[240px_auto] md:grid-rows-[auto] md:gap-x-10 md:gap-y-0">
          <div class="max-w-[240px] m-auto">
            <img class="rounded-[15px]" src="<?php echo esc_url($testimonial_image); ?>" alt="">
          </div>

          <div class="flex text-white">
            <div class="flex flex-col justify-between lg:my-[16px]">
              <p class="scale-28-24-21 mb-[40px] main-quote"><span class="avenir-medium-oblique">“</span><?php echo esc_html($testimonial_text); ?><span class="avenir-medium-oblique">“</span></p>

              <div class="flex justify-between items-center">
                <div class="company-info">
                  <p class="text-[16px] avenir-heavy m-0"><?php echo esc_html($testimonial_name); ?></p>
                  <p class="text-[16px] avenir-light m-0"><?php echo esc_html($testimonial_position); ?></p>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Testimonial Panel 1 End -->

        <?php endforeach;
                endif; ?>

      </div>
    </div>
  <?php
  }
  ?>
</section>
<!-- Testimonial Section Start-->


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  document.addEventListener('DOMContentLoaded', function() {
    const panels = document.querySelectorAll('.testimonials-panel');
    let currentIndex = 0; // Start with the first panel

    // Function to update the slider view
    function updateSlider() {
      panels.forEach((panel, index) => {
        if (index === currentIndex) {
          panel.classList.add('active');
        } else {
          panel.classList.remove('active');
        }
      });
      document.querySelector('.slider-controls .counter').textContent = `${currentIndex + 1} / ${panels.length}`;
    }

    // Initially show the first panel
    updateSlider();

    let autoplayIntervalID; // Variable to store interval ID
    const autoplayInterval = 5000; // 5000 milliseconds = 5 seconds

    // Function to reset and restart the autoplay interval
    function resetAutoplayInterval() {
      clearInterval(autoplayIntervalID);
      autoplayIntervalID = setInterval(moveToNextPanel, autoplayInterval);
    }

    // Function to move to the next panel
    function moveToNextPanel() {
      currentIndex = (currentIndex + 1) % panels.length;
      updateSlider();
      resetAutoplayInterval(); // Reset the timer whenever the panel changes
    }

    // Previous button event listener
    document.querySelector('.slider-controls .prev').addEventListener('click', function() {
      currentIndex = (currentIndex - 1 + panels.length) % panels.length;
      updateSlider();
      resetAutoplayInterval(); // Explicitly reset the timer on prev click
    });

    // Next button event listener
    document.querySelector('.slider-controls .next').addEventListener('click', function() {
      currentIndex = (currentIndex + 1) % panels.length;
      updateSlider();
      resetAutoplayInterval(); // Explicitly reset the timer on next click
    });

    // Start autoplay for the first time
    resetAutoplayInterval(); // Initialize the autoplay functionality
  });
</script>