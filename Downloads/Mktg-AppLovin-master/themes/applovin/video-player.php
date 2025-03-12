<?php
/*
Template Name: Video Player Test
*/
?>
<div id="wistia-video-player">
    <div id="main-video-container">
        <video id="main-video" controls>
            <source id="video-source" src="" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div id="video-tabs">
        <!-- Tabs will be dynamically generated here -->
    </div>
</div>


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
document.addEventListener('DOMContentLoaded', function () {
    // Fetch video data from the REST API
    fetch('/wp-json/main-api/v1/wistia-feed')
        .then(response => response.json())
        .then(videos => {
            const videoTabs = document.getElementById('video-tabs');
            const mainVideo = document.getElementById('main-video');
            const videoSource = document.getElementById('video-source');

            console.log('Fetched videos:', videos);

            // Ensure the first video loads initially
            if (videos.length > 0) {
                console.log('Initial video URL:', videos[0].video_url);
                videoSource.src = videos[0].video_url;
                mainVideo.load();
            }

            // Create tabs for each video
            videos.forEach((video, index) => {
                console.log(`Video ${index + 1} URL:`, video.video_url);

                const tab = document.createElement('button');
                tab.innerText = `Video ${index + 1}`;
                tab.style.cursor = 'pointer';
                
                // Add click event listener to each tab
                tab.addEventListener('click', () => {
                    console.log(`Selected Video ${index + 1} URL:`, video.video_url);

                    // Update the video source and play the selected video
                    videoSource.src = video.video_url;
                    mainVideo.load();
                    mainVideo.play();
                });

                // Append each tab to the videoTabs container
                videoTabs.appendChild(tab);
            });
        })
        .catch(error => {
            console.error('Error fetching videos:', error);
        });
});


</script>

<style>
#wistia-video-player {
    max-width: 600px;
    margin: 0 auto; /* Center the container */
    padding: 10px;
}

#main-video-container {
    width: 100%; /* Ensure the video takes up the full width of the container */
}

#main-video {
    width: 100%; /* Make the video responsive */
    height: auto;
}

#video-tabs {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

#video-tabs button {
    padding: 10px 20px;
    cursor: pointer;
    flex: 1;
    margin: 0 5px; /* Space between buttons */
    text-align: center;
}


#main-video-container {
    margin-bottom: 10px;
}

#video-tabs {
    display: flex;
    justify-content: space-between;
}

#video-tabs button {
    padding: 10px 20px;
    cursor: pointer;
}

</style>