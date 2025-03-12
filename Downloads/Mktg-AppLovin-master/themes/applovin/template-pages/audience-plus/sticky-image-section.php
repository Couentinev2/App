<?php
// Get the sticky_image_section group field
$getting_started_section = get_field('getting_started_section');

if ($getting_started_section) {
    // Access the title, description, and image fields within the sticky_image_section group
    $intro_slide = $getting_started_section['intro_slide'];
    $intro_slide_title = $intro_slide['section_title'];
    $intro_slide_h2 = $intro_slide['h2'];

    $slide_one = $getting_started_section['slide_one'];
    $slide_one_h3 = $slide_one['h3'];
    $slide_one_p = $slide_one['p'];

    $slide_two = $getting_started_section['slide_two'];
    $slide_two_h3 = $slide_two['h3'];
    $slide_two_p = $slide_two['p'];

    $slide_three = $getting_started_section['slide_three'];
    $slide_three_h3 = $slide_three['h3'];
    $slide_three_p = $slide_three['p'];

    $slide_four = $getting_started_section['slide_four'];
    $slide_four_h3 = $slide_four['h3'];
    $slide_four_p = $slide_four['p'];

?>

<section class="bg-[#F7F8FC]" id="getting-started">
  <div class="wrapper">
    <div class="slider-con">

      <div class="slider-main grid grid-cols-1 gap-[64px] md:gap-[80px] lg:gap-[40px]">
        <!-- Sticky Image -->
        <div class="ColumnLayout ColumnLayout--alignCenter">
          <div class="section">
            <div class="max-w-[1200px] m-auto">
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] lg:gap-[80px] lg:h-screen lg:max-h-[600px]">

              <div class="w-full m-auto lg:my-auto">
                <div class="grid gap-[24px] lg:w-[478px] text-center lg:text-left text-container transition-opacity duration-300 ease-in-out">
                  <div class="uppercase text-[#929BBA] text-[14px] tracking-[1px] avenir-black"><?php echo esc_html($intro_slide_title); ?></div>
                  <h2 class="text-[24px] md:text-[30px] lg:text-[36px] leading-[32px] md:leading-[38px] lg:leading-[45px] lg:max-w-[370px]"><?php echo esc_html($intro_slide_h2); ?></h2>
                </div>
              </div>

                <figure class="StickyAnimation">
                  <div class="StickyAnimation__container" id="stickyContainer">
                    <div class="StickyAnimation__content transform-gpu backface-hidden" style="top: calc(50% - 270px);">
                      <div class="StickyAnimation__contentSection">
                        <!-- Update SVG objects with Tailwind classes -->
                        <object id="svg1" data="https://storage.googleapis.com/applovin_assets_us/svg/audience_step_intro.svg" type="image/svg+xml" class="svg-item show w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                        <object id="svg2" data="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/step_2.svg" type="image/svg+xml" class="svg-item hide w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                        <object id="svg3" data="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/step_3.svg" type="image/svg+xml" class="svg-item hide w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                        <object id="svg4" data="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/step_1.svg" type="image/svg+xml" class="svg-item hide w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                        <object id="svg5" data="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/step_4.svg" type="image/svg+xml" class="svg-item hide w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                      </div>
                    </div>
                  </div>
                </figure>


                <div class="lg:hidden">
                  <div class="svg-container aspect-[1/1] max-w-[540px] m-auto">
                    <object type="image/svg+xml" data="https://storage.googleapis.com/applovin_assets_us/svg/audience_step_intro.svg" class="svg-animation-trigger responsive-svg w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Section 1 -->
        <div class="section-1 section">
          <div class="max-w-[1200px] m-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] lg:gap-[80px] lg:h-screen lg:max-h-[656px]">
              <div class="w-full m-auto lg:my-auto">
                <div class="grid gap-[32px] lg:w-[478px] text-center lg:text-left text-container">
                  <div class="m-auto lg:m-0">
                    <svg width="40" height="41" viewBox="0 0 40 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                            d="M0 20.5C0 9.45431 8.95431 0.5 20 0.5C31.0457 0.5 40 9.45431 40 20.5C40 31.5457 31.0457 40.5 20 40.5C8.95431 40.5 0 31.5457 0 20.5Z"
                            fill="#FAF2E8" />
                      <path d="M22.276 14.131V26.875H19.684V17.155L17.128 19.405L15.598 17.641L19.756 14.131H22.276Z"
                            fill="#FF9E1D" />
                    </svg>
                  </div>
                  <div class="grid gap-[16px]">
                    <h3 class="text-[21px] md:text-[24px] lg:text-[32px] leading-[28px] md:leading-[32px] lg:leading-[40px] avenir-heavy mb-0"><?php echo esc_html($slide_one_h3); ?></h3>
                    <p class="text-[16px] md:text-[18px] mb-0"><?php echo esc_html($slide_one_p); ?></p>
                  </div>
                </div>
              </div>

              <div class="lg:hidden">
                <div class="svg-container aspect-[1/1] max-w-[540px] m-auto">
                  <object type="image/svg+xml" data="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/step_2.svg" class="svg-animation-trigger responsive-svg w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Section 1 -->

        <!-- Section 2 -->
        <div class="section-2 section">
          <div class="max-w-[1200px] m-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] lg:gap-[80px] lg:h-screen lg:max-h-[656px]">
              <div class="w-full m-auto lg:my-auto">
                <div class="grid gap-[32px] lg:w-[478px] text-center lg:text-left text-container">
                  <div class="m-auto lg:m-0">
                    <svg width="40px" height="40px" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                            d="M0 20C0 8.95431 8.95431 0 20 0C31.0457 0 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.95431 40 0 31.0457 0 20Z"
                            fill="#FAF2E8" />
                      <path
                            d="M20.044 13.415C21.292 13.415 22.288 13.763 23.032 14.459C23.788 15.143 24.166 16.073 24.166 17.249C24.166 17.993 24.034 18.617 23.77 19.121C23.518 19.613 23.002 20.207 22.222 20.903L18.622 23.999H24.274V26.375H15.382V23.513L20.332 19.067C20.776 18.659 21.076 18.329 21.232 18.077C21.388 17.825 21.466 17.561 21.466 17.285C21.466 16.865 21.31 16.529 20.998 16.277C20.686 16.025 20.32 15.899 19.9 15.899C19.444 15.899 19.066 16.043 18.766 16.331C18.466 16.619 18.292 17.015 18.244 17.519L15.544 17.321C15.628 16.049 16.066 15.083 16.858 14.423C17.662 13.751 18.724 13.415 20.044 13.415Z"
                            fill="#FF9E1D" />
                    </svg>
                  </div>
                  <div class="grid gap-[16px]">
                    <h3 class="text-[21px] md:text-[30px] lg:text-[36px] leading-[28px] md:leading-[32px] lg:leading-[40px] avenir-heavy mb-0"><?php echo esc_html($slide_two_h3); ?></h3>
                    <p class="text-[16px] md:text-[18px] mb-0"><?php echo esc_html($slide_two_p); ?></p>
                  </div>
                </div>
              </div>

              <div class="lg:hidden">
                <div class="svg-container aspect-[1/1] max-w-[540px] m-auto">
                  <object type="image/svg+xml" data="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/step_3.svg" class="svg-animation-trigger responsive-svg w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Section 2 -->

        <!-- Section 3 -->
        <div class="section-3 section">
          <div class="max-w-[1200px] m-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] lg:gap-[80px] lg:h-screen lg:max-h-[656px]">
              <div class="w-full m-auto lg:my-auto">
                <div class="grid gap-[32px] lg:w-[478px] text-center lg:text-left text-container">
                  <div class="m-auto lg:m-0">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                            d="M0 20C0 8.95431 8.95431 0 20 0C31.0457 0 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.95431 40 0 31.0457 0 20Z"
                            fill="#FAF2E8" />
                      <path
                            d="M19.72 13.415C21.016 13.415 22.054 13.733 22.834 14.369C23.626 14.993 24.022 15.857 24.022 16.961C24.022 17.693 23.83 18.305 23.446 18.797C23.062 19.289 22.528 19.607 21.844 19.751V19.805C22.576 19.901 23.158 20.231 23.59 20.795C24.022 21.347 24.238 22.007 24.238 22.775C24.238 23.939 23.818 24.869 22.978 25.565C22.15 26.249 21.04 26.591 19.648 26.591C18.412 26.591 17.398 26.309 16.606 25.745C15.826 25.169 15.316 24.353 15.076 23.297L17.92 22.631C18.124 23.615 18.754 24.107 19.81 24.107C20.362 24.107 20.788 23.963 21.088 23.675C21.388 23.387 21.538 22.985 21.538 22.469C21.538 21.977 21.37 21.611 21.034 21.371C20.698 21.119 20.05 20.993 19.09 20.993H18.388V18.653H19.216C19.924 18.653 20.452 18.545 20.8 18.329C21.148 18.101 21.322 17.735 21.322 17.231C21.322 16.823 21.166 16.499 20.854 16.259C20.542 16.019 20.17 15.899 19.738 15.899C19.354 15.899 19.018 16.001 18.73 16.205C18.442 16.409 18.25 16.703 18.154 17.087L15.184 16.475C15.724 14.435 17.236 13.415 19.72 13.415Z"
                            fill="#FF9E1D" />
                    </svg>
                  </div>
                  <div class="grid gap-[16px]">
                    <h3 class="text-[21px] md:text-[30px] lg:text-[36px] leading-[28px] md:leading-[32px] lg:leading-[40px] avenir-heavy mb-0"><?php echo esc_html($slide_three_h3); ?></h3>
                    <p class="text-[16px] md:text-[18px] mb-0"><?php echo esc_html($slide_three_p); ?></p>
                  </div>
                </div>
              </div>

              <div class="lg:hidden">
                <div class="svg-container aspect-[1/1] max-w-[540px] m-auto">
                  <object type="image/svg+xml" data="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/step_1.svg" class="svg-animation-trigger responsive-svg w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Section 3 -->

        <!-- Section 4 -->
        <div class="section-4 section">
          <div class="max-w-[1200px] m-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-[40px] lg:gap-[80px] lg:h-screen lg:max-h-[600px]">
              <div class="w-full m-auto lg:my-auto">
                <div class="grid gap-[32px] lg:w-[478px] text-center lg:text-left text-container">
                  <div class="m-auto lg:m-0">
                    <svg width="40px" height="40px" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                            d="M0 20C0 8.95431 8.95431 0 20 0C31.0457 0 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.95431 40 0 31.0457 0 20Z"
                            fill="#FAF2E8" />
                      <path
                            d="M23.086 13.631V21.551H24.724V23.819H23.086V26.375H20.494V23.819H14.932V21.551L20.134 13.631H23.086ZM20.458 17.159L17.632 21.551H20.494V17.159H20.458Z"
                            fill="#FF9E1D" />
                    </svg>
                  </div>
                  <div class="grid gap-[16px]">
                    <h3 class="text-[21px] md:text-[30px] lg:text-[36px] avenir-heavy mb-0"><?php echo esc_html($slide_four_h3); ?></h3>
                    <p class="text-[16px] md:text-[18px] mb-0"><?php echo esc_html($slide_four_p); ?></p>
                  </div>
                </div>
              </div>
              
              <div class="lg:hidden">
                <div class="svg-container aspect-[1/1] max-w-[540px] m-auto">
                  <object type="image/svg+xml" data="https://5209470.fs1.hubspotusercontent-na1.net/hubfs/5209470/Audience%2B%20LP%20-%202024/step_4.svg" class="svg-animation-trigger responsive-svg w-full h-full block transition-opacity duration-300 ease-in-out transform-gpu backface-hidden"></object>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- Section 4 -->


      </div>
    </div>
  </div>
</section>
<?php } ?>


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
// Cache DOM queries for better performance
const state = {
  sections: document.querySelectorAll('.section'),
  svgs: document.querySelectorAll('.svg-item'),
  textContainers: document.querySelectorAll('.text-container'),
  stickyContainer: document.getElementById('stickyContainer'),
  sliderMain: document.querySelector('.slider-main'),
  responsiveSvgs: document.querySelectorAll('.responsive-svg')
};

// Debounce function for resize events
const debounce = (func, wait) => {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
};

// Function to start the animation of an SVG by reloading it (preserved from original)
function startSVGAnimation(svg) {
  const svgData = svg.getAttribute('data');
  svg.setAttribute('data', '');
  setTimeout(() => {
    svg.setAttribute('data', svgData);
  }, 50);
}

// Intersection Observer callback for SVG fade in/out
const observerCallback = (entries) => {
  entries.forEach(entry => {
    const index = Array.from(state.sections).indexOf(entry.target);
    if (entry.isIntersecting) {
      // Section is in view, show the corresponding SVG
      state.svgs.forEach((svg, i) => {
        if (i === index) {
          svg.classList.add('show');
          svg.classList.remove('hide');
          if (i !== 0) {
            startSVGAnimation(svg);
          }
        } else {
          svg.classList.remove('show');
          svg.classList.add('hide');
        }
      });
    }
  });
};

// Function to set the height of the sticky container
function setStickyContainerHeight() {
  if (!state.stickyContainer || !state.sliderMain) return;
  const adjustedHeight = state.sliderMain.offsetHeight - 560;
  state.stickyContainer.style.height = `${adjustedHeight}px`;
}

// Set up the Intersection Observer for SVGs
const observer = new IntersectionObserver(observerCallback, {
  root: null,
  threshold: 0.5
});

// Observe each section for SVG visibility
state.sections.forEach(section => observer.observe(section));

// Optimize event listeners with debouncing
window.addEventListener('load', setStickyContainerHeight);
window.addEventListener('resize', debounce(setStickyContainerHeight, 250));

// Mobile SVG trigger with original fade behavior
document.addEventListener("DOMContentLoaded", function () {
  const svgElements = document.querySelectorAll('.svg-animation-trigger');

  const reloadSVG = (element) => {
    element.classList.remove('fade-in');
    const src = element.getAttribute('data');
    setTimeout(() => {
      element.setAttribute('data', src);
      setTimeout(() => {
        element.classList.add('fade-in');
      }, 50);
    }, 50);
  };

  const mobileObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        reloadSVG(entry.target);
        mobileObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  svgElements.forEach((svg) => {
    mobileObserver.observe(svg);
  });
});

// Text container fade effects (preserved from original)
const handleTextFade = (entries) => {
  entries.forEach(entry => {
    const textContainer = entry.target.querySelector('.text-container');

    if (entry.isIntersecting) {
      textContainer.classList.add('fade-in');
      textContainer.classList.remove('fade-out');
    } else {
      if (entry.boundingClientRect.top > 0) {
        textContainer.classList.add('fade-out');
        textContainer.classList.remove('fade-in');
      } else {
        textContainer.classList.add('fade-out');
        textContainer.classList.remove('fade-in');
      }
    }
  });
};

// Set up Intersection Observer for text fade-in/fade-out
const observerText = new IntersectionObserver(handleTextFade, {
  root: null,
  threshold: 0.8,
  rootMargin: '0px 0px 0px 0px'
});

// Observe each section that contains a text-container
state.sections.forEach(section => {
  observerText.observe(section);
});

// Handle responsive SVG fade effects
const handleSvgFade = (entries) => {
  entries.forEach(entry => {
    const svg = entry.target;

    if (entry.isIntersecting) {
      svg.classList.add('fade-in');
      svg.classList.remove('fade-out');

      const svgTriggers = document.querySelectorAll('.svg-animation-trigger');
      svgTriggers.forEach(reloadSVG);
    } else if (entry.boundingClientRect.top > 0) {
      svg.classList.add('fade-out');
      svg.classList.remove('fade-in');
    }
  });
};

// Set up Intersection Observer for responsive SVG fade-in/fade-out
const observerSvg = new IntersectionObserver(handleSvgFade, {
  root: null,
  threshold: 0,
  rootMargin: '0px 0px -50% 0px'
});

// Observe each responsive SVG element
state.responsiveSvgs.forEach(svg => {
  observerSvg.observe(svg);
});
</script>