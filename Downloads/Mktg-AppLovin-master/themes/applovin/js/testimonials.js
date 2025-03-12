document.addEventListener("DOMContentLoaded", function() {
    let quotes = document.querySelectorAll(".quote-text");
    let speakers = document.querySelectorAll(".quote-speaker");
    let currentQuoteIndex = 0;
    let sliderInterval;

    function showQuote(index) {
        quotes.forEach((quote, i) => {
            if (i === index) {
                quote.classList.add("active");
                let lines = quote.querySelectorAll(".line");
                lines.forEach((line, j) => {
                    setTimeout(() => {
                        line.style.opacity = "1";
                        line.style.transform = "translateY(0)";
                    }, j * 5000);
                });
            } else {
                quote.classList.remove("active");
                let lines = quote.querySelectorAll(".line");
                lines.forEach(line => {
                    line.style.opacity = "0";
                    line.style.transform = "translateY(100%)";
                });
            }
        });
        speakers.forEach((speaker, i) => {
            if (i === index) {
                speaker.classList.add("active");
            } else {
                speaker.classList.remove("active");
            }
        });
    }

    function nextQuote() {
        currentQuoteIndex = (currentQuoteIndex + 1) % quotes.length;
        showQuote(currentQuoteIndex);
    }

    function resetInterval() {
        clearInterval(sliderInterval);
        sliderInterval = setInterval(nextQuote, 10000);
    }

    speakers.forEach((speaker, index) => {
        speaker.addEventListener("click", function() {
            currentQuoteIndex = index;
            showQuote(currentQuoteIndex);
            resetInterval(); // Reset the slider timer when a tab is clicked
        });
    });

    sliderInterval = setInterval(nextQuote, 10000);
    showQuote(currentQuoteIndex);
});