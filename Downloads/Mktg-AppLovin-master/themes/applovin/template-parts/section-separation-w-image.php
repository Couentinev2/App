<style type="text/css">
.end-section {
    background: #E3E7F2;
    margin-top: 96px;
}

.end-section:before {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: -9999px;
    right: 0;
    border-left: 9999px solid #E3E7F2;
    box-shadow: 9999px 0 0 #E3E7F2;
}

.end-section object {
    margin-bottom: 0;
}

.first-end {
    margin-bottom: 96px;
}

@media screen and (max-width: 1080px){
.first-end {
        margin-bottom: 80px;
    }
    .end-section {
    background: #E3E7F2;
    margin-top: 80px;
}
}
@media screen and (max-width: 760px){
    .first-end {
        margin-bottom: 64px;
    }
    .end-section {
    background: #E3E7F2;
    margin-top:64px;
}

}

</style>

  <div class="end-section first-end">
<object data="<?php the_field('sep_img'); ?>" title="guide-report"></object>
</div>