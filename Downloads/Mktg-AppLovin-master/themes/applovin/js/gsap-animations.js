document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(ScrollTrigger);

    gsap.from(".gradient-pill-one img", {
        scrollTrigger: {
            trigger: ".gradient-pill-one",
            start: "top 80%",
            end: "bottom 20%",
            scrub: true,
        },
        opacity: 0,
        x: -50,
        duration: 1,
    });

    gsap.from(".gradient-pill-two img", {
        scrollTrigger: {
            trigger: ".gradient-pill-two",
            start: "top 80%",
            end: "bottom 20%",
            scrub: true,
        },
        opacity: 0,
        x: 200,
        duration: 1,
    });

    gsap.from(".app-one img", {
        scrollTrigger: {
            trigger: ".app-one",
            start: "top 80%",
            end: "bottom 20%",
            scrub: true,
        },
        opacity: 0,
        y: 50,
        duration: 1,
    });

    gsap.from(".app-two img", {
        scrollTrigger: {
            trigger: ".app-two",
            start: "top 80%",
            end: "bottom 20%",
            scrub: true,
        },
        opacity: 0,
        y: 50,
        duration: 1,
    });

    gsap.from(".app-three img", {
        scrollTrigger: {
            trigger: ".app-three",
            start: "top 80%",
            end: "bottom 20%",
            scrub: true,
        },
        opacity: 0,
        y: 50,
        duration: 1,
    });

    gsap.from(".app-four img", {
        scrollTrigger: {
            trigger: ".app-four",
            start: "top 80%",
            end: "bottom 20%",
            scrub: true,
        },
        opacity: 0,
        y: 50,
        duration: 1,
    });
});