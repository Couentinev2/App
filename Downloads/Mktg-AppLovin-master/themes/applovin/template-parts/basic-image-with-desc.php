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



.localvid img {
    max-width: 720px;

    border-radius: 16px;
    margin-top: 24px;
    width: 100%;
    box-sizing: border-box;
}

</style>

<div class="localvid">


        <div class="localiframe">
                  <img src="<?php the_field('image_local'); ?> " alt="<?php the_field('page_slug'); ?> logo" class="partner-logo">



                <p class="video-caption fixed-16"><?php the_field('part_three_sub_one_text_video'); ?></p>
        </div>
</div>