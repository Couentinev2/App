<style type="text/css">
.key-section {
    padding: 40px !important;
    background: #f7f8fc;
    border-radius: 16px;
    margin: 40px 0;
}

.key-section object {
    margin: 0;
    max-height: 32px;
    max-width: 80px;
    margin-bottom: 32px;
}

.key-section p {
    margin-bottom: 0;
}


@media screen and (max-width: 1080px){


}
@media screen and (max-width: 760px){

    .key-section {
        padding: 32px !important;
        padding-bottom: 32px !important;
    }

        .key-section object {
        margin-bottom: 24px;
    }

}

</style>

<div class="key-section section">
  <object data="<?php the_field('key_img_one'); ?>" title="ctv-report"></object>

  <p class="scale-18-18-16">  <?php the_field('key_title'); ?></p>
  
</div>