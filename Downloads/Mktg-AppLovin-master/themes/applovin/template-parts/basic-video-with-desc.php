<style type="text/css">
.video-caption {
    color: #808080;
    line-height: 24px;
}

.localvid {
    width: 100%;
    text-align: center;
}

.localvid .video-caption {
    text-align: center;
    margin: auto;
    margin-bottom: 0;
    margin-top: 16px;
    max-width: 744px;
}



.localvid iframe {
    max-width: 720px;
    border-style: solid;
    border-color: #EEF0F6;
    border-width: 12px;
    border-radius: 30px;
    margin-top: 24px;
    width: 100%;
    box-sizing: border-box;
}

</style>

<div class="localvid">



        <h3 class="scale-24-21-18"><?php the_field('part_four_sub_one_text_one'); ?></h3>
        <p class="scale-18-18-16"><?php the_field('part_four_sub_one_text_two'); ?></p>

        <div class="localvid-cn localiframe">

<iframe  src="https://www.youtube.com/embed/<?php the_field('youtube_id'); ?>?si=mT2aRXrvEDb4DvkE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>


                <p class="video-caption fixed-16"><?php the_field('part_three_sub_one_text_video'); ?></p>
        </div>
</div>