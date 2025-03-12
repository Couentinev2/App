<style type="text/css">

.bottom-40 {
    margin-bottom: 40px;
}
.joc {
    background-color: #f7f8fc;
    padding: 40px;
    border-radius: 16px;
    margin-top: 40px;
    margin-bottom: 40px;
}
.joc video {
    max-width: 100%;
    border-color: unset;
    border: unset;
    border-radius: 8px;
    width: 100%;
    box-sizing: border-box;
    margin-top: 0;
}

.localvid .video-caption {
    text-align: center;
    margin: auto;
    margin-bottom: 0;
    margin-top: 16px;
    max-width: 600px;
        color: #808080;

}

@media screen and (max-width: 640px) {
.joc {
    padding: 0;
    margin-bottom: 40px;
}
.joc video {
    padding-top: 40px;
    border-radius: 0;
}
}
</style>

<div class="localvid joc">
<video controls  autoplay muted loop playsinline>
  <source src="<?php the_field('video');?>" type="video/mp4">
Your browser does not support the video tag.
</video> 
<p class="video-caption fixed-16"><?php the_field('sub_text_video'); ?></p>
</div>
