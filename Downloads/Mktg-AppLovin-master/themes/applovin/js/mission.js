document.addEventListener("DOMContentLoaded", () => {
    const pods = document.querySelectorAll(".mission-pod");
    const leftArrow = document.getElementById("left-arrow");
    const rightArrow = document.getElementById("right-arrow");
    let currentPodIndex = 0;

    function showPod(index) {
        pods.forEach((pod, i) => {
            const h4 = pod.querySelector("h4");
            const p = pod.querySelector("p");
            const images = pod.querySelectorAll(".img-mission-pod");

            if (i === index) {
                pod.classList.add("active");
                pod.style.display = "block"; // Make sure the element is displayed

                // Fade in h4, p, and images
                setTimeout(() => {
                    h4.style.opacity = "1";
                    p.style.opacity = "1";
                    images.forEach((img) => img.style.opacity = "1");
                }, 50); // Slight delay to ensure the pod is visible
            } else {
                // Fade out h4, p, and images
                h4.style.opacity = "0";
                p.style.opacity = "0";
                images.forEach((img) => img.style.opacity = "0");

                pod.classList.remove("active");
                pod.addEventListener("transitionend", function handleTransitionEnd() {
                    if (!pod.classList.contains("active")) {
                        pod.style.display = "none"; // Hide the pod after the fade-out transition ends
                    }
                    pod.removeEventListener("transitionend", handleTransitionEnd);
                });
            }
        });
    }

    rightArrow.addEventListener("click", () => {
        currentPodIndex = (currentPodIndex + 1) % pods.length;
        showPod(currentPodIndex);
    });

    leftArrow.addEventListener("click", () => {
        currentPodIndex = (currentPodIndex - 1 + pods.length) % pods.length;
        showPod(currentPodIndex);
    });

    // Initially show the first pod
    showPod(currentPodIndex);
});