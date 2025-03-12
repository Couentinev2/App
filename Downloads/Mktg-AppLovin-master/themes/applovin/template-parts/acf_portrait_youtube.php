<style type="text/css">
	iframe {
		border-radius: 16px;
		width: 320px;
		height: 566px;
	}

	.youtube-ifr {
		text-align: center;
	}

	@media screen and (max-width: 760px){
			iframe {
        border-radius: 8px;
        width: 260px;
        height: 460px;
	}
}


</style>
<div class="youtube-ifr">
<iframe 
src="https://www.youtube.com/embed/<?php the_field('youtube_video_id'); ?>
">
</iframe>
</div>