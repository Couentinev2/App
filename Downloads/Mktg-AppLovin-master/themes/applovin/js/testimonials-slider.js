$(document).ready(function() {
    const headlines = [
        "Beauty brand Laura Geller diversified its media spend and grew its business",
        "Oral care brand Hismile identified Audience+ as a valuable long-term investment channel",
        "Underlining tapped into a new, high-intent audience of beauty lovers",
        "Organic beauty brand Ogee boosted sales and exceeded their ROAS goals"
    ];

    // Cache the dynamic h3 element
    const dynamicH3 = document.getElementById("dynamic-h3");
    let isTransitioning = false; // Lock to prevent rapid clicks

    // Initialize Slick slider
    const slickSlider = $(".autoplay").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        prevArrow: $(".prev"),
        nextArrow: $(".next"),
    });

    // Set the first headline by default
    dynamicH3.textContent = headlines[0];
    dynamicH3.classList.add("fade-in");

    // Helper function to change the headline with fade-in and fade-out transitions
    function updateHeadline(nextSlide) {
        // Fade out the current h3 text
        dynamicH3.classList.remove("fade-in");
        dynamicH3.classList.add("fade-out");

        // Wait for the fade-out transition to complete
        setTimeout(() => {
            // Update the h3 text after fade-out
            dynamicH3.textContent = headlines[nextSlide];
            dynamicH3.classList.remove("fade-out"); // Reset fade-out class
            dynamicH3.classList.add("fade-in"); // Fade in the new text
        }, 500); // Match this to the CSS transition duration
    }

    // Prevent rapid clicks during slide transitions
    function lockTransitions() {
        isTransitioning = true;
        setTimeout(() => {
            isTransitioning = false; // Unlock after the slide transition completes
        }, 600); // Ensure this matches or slightly exceeds your fade + slide transition time
    }

    // Listen to the next button click
    $(".next").on("click", function() {
        if (isTransitioning) return; // Prevent multiple clicks during transition
        slickSlider.slick("slickNext"); // Move to the next slide
        lockTransitions();
    });

    // Listen to the prev button click
    $(".prev").on("click", function() {
        if (isTransitioning) return; // Prevent multiple clicks during transition
        slickSlider.slick("slickPrev"); // Move to the previous slide
        lockTransitions();
    });

    // Handle slide change via autoplay or swiping (and ensure headline updates)
    slickSlider.on("beforeChange", function(event, slick, currentSlide, nextSlide) {
        updateHeadline(nextSlide); // Update the headline when the slide starts transitioning
    });
});