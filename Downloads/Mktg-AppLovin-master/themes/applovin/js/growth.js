document.addEventListener("DOMContentLoaded", () => {
    const podsWrap = document.querySelector(".growth-pods-wrap");
    const pods = document.querySelectorAll(".growth-pod");
    const podCount = pods.length;

    // Clone the pods to ensure seamless scrolling
    for (let i = 0; i < podCount; i++) {
        podsWrap.appendChild(pods[i].cloneNode(true));
    }
});
