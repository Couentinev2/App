document.addEventListener("DOMContentLoaded", function() {
    var cards = document.querySelectorAll(".card");

    if (cards.length > 0) {
        cards[0].classList.add("active");
    }

    function removeActiveClass() {
        cards.forEach(function(card) {
            card.classList.remove("active");
        });
    }

    cards.forEach(function(card) {
        card.addEventListener("mouseenter", function() {
            removeActiveClass();
            card.classList.add("active");
        });
    });


});