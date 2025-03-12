// Open lightbox when user clicks on the button
function openLightbox() {
    var lightbox = document.getElementById("lightbox");
    lightbox.classList.remove("hidden");
    document.body.classList.add("no-scroll");

    // Trigger Wistia video reload by re-embedding it
    reloadWistiaVideo();

    // Autoplay the video after it's reloaded
    Wistia.api("ani3v9r25z").ready(function(video) {
        video.play();
        video.resize(); // Ensure video resizes properly
    });
}

// Close lightbox when user clicks on the close button
function closeLightbox() {
    var lightbox = document.getElementById("lightbox");
    lightbox.classList.add("hidden");
    document.body.classList.remove("no-scroll");

    // Pause the video when the lightbox is closed
    Wistia.api("ani3v9r25z").ready(function(video) {
        video.pause();
    });
}

document.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
        closeLightbox();
    }
});

// Re-embed the Wistia video when lightbox is opened
function reloadWistiaVideo() {
    var wistiaContainer = document.querySelector(".wistia_embed");
    var wistiaWrapper = wistiaContainer.parentNode;

    // Remove the existing Wistia embed
    wistiaContainer.remove();

    // Create a new embed container and append it to the wrapper
    var newWistiaContainer = document.createElement("div");
    newWistiaContainer.classList.add("wistia_embed", "wistia_async_ani3v9r25z", "seo=true", "videoFoam=true");
    newWistiaContainer.style.cssText = "height: 100%; position: relative; width: 100%;";
    wistiaWrapper.appendChild(newWistiaContainer);

    // Re-embed the Wistia video script
    var script = document.createElement("script");
    script.src = "https://fast.wistia.com/embed/medias/ani3v9r25z.jsonp";
    script.async = true;
    document.body.appendChild(script);
}