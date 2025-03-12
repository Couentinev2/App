document.addEventListener("DOMContentLoaded", function() {
    var popup = document.getElementById("leader-popup");
    var popupBody = document.getElementById("popup-body");
    var span = document.getElementsByClassName("close")[0];

    document.querySelectorAll(".leaders-pod").forEach(function(element) {
        element.addEventListener("click", function(event) {
            event.preventDefault();
            var postId = this.getAttribute("data-id");
            fetchPopupContent(postId);
        });
    });

    span.onclick = function() {
        closeModal();
    };

    window.onclick = function(event) {
        if (event.target == popup) {
            closeModal();
        }
    };

    // Close modal on ESC key press
    document.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            closeModal();
        }
    });

    function closeModal() {
        popup.style.display = "none";
        document.body.classList.remove("no-scroll");
    }

    function fetchPopupContent(postId) {
        fetch("/wp-json/wp/v2/leader/" + postId)
            .then(response => response.json())
            .then(data => {
                popupBody.innerHTML = `
                <div class="bio-content">
                    ${data.acf.leader_headshot_secondary
        ? `<img src="${data.acf.leader_headshot_secondary}" alt="${data.acf.leader_name}" class="leader-headshot" />`
        : `<img src="${data.acf.leader_headshot}" alt="${data.acf.leader_name}" class="leader-headshot" />`}
                    <div class="bio-copy">
                        <div class="default-bio-text">
                            <h4 class="scale-24-21-18">${data.acf.leader_name}</h4>
                            <p class="avanier-light text-[#666] scale-18-18-16 pb-[25px]">${data.acf.leader_title}</p>
                        </div>
                        <p class="scale-18-18-16">${data.acf.leader_bio_text}</p>
                    </div>
                </div>
            `;
                popup.style.display = "block";
                document.body.classList.add("no-scroll");
            })
            .catch(error => console.error("Error fetching leader data:", error));
    }
});