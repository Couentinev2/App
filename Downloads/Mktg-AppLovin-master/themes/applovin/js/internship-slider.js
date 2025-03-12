document.addEventListener("DOMContentLoaded", function () {
    const sliderWrapper = document.getElementById("slider-wrapper");
    const slider = document.getElementById("slider");
    const slides = slider.querySelectorAll(".slide");

    function updateSlider() {
        const viewportWidth = window.innerWidth;
        let slideWidth;

        if (viewportWidth > 833) {
            slideWidth = 384; // Slide width for viewport above 834px
        } else {
            slideWidth = 310; // Default slide width
        }

        const gapWidth = 20;
        const totalWidth = (slideWidth + gapWidth) * slides.length - gapWidth;

        slider.style.width = `${totalWidth}px`;

        slides.forEach((slide) => {
            slide.style.width = `${slideWidth}px`;
        });
    }

    // Initial setup
    updateSlider();

    // Handle window resize
    window.addEventListener("resize", updateSlider);

    // Drag to scroll functionality
    let isDown = false;
    let startX;
    let scrollLeft;

    sliderWrapper.addEventListener("mousedown", (e) => {
        isDown = true;
        sliderWrapper.classList.add("active");
        startX = e.pageX - sliderWrapper.offsetLeft;
        scrollLeft = sliderWrapper.scrollLeft;
    });

    sliderWrapper.addEventListener("mouseleave", () => {
        isDown = false;
        sliderWrapper.classList.remove("active");
    });

    sliderWrapper.addEventListener("mouseup", () => {
        isDown = false;
        sliderWrapper.classList.remove("active");
    });

    sliderWrapper.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - sliderWrapper.offsetLeft;
        const walk = (x - startX) * 2; // Scroll-fast
        sliderWrapper.scrollLeft = scrollLeft - walk;
    });
});