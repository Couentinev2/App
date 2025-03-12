<style type="text/css">

.img-tt {
    margin-bottom: 40px;
    max-height: 64px;
    width: auto ;
}
.repeater-analyze {
    margin-top: 40px;
    margin-bottom: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50px, 1fr));
    grid-column-gap: 32px;
    grid-row-gap: 0px;
}

.repeater-analyze h2, .repeater-analyze sup {
        font-family: var(--font-wt-Heavy);
    font-weight: 700;
}

.repeater-analyze h2 {
    margin-top: 0;
    margin-bottom: 0.25em;
}

.analyze-repeater-stats sup {
    font-family: var(--font-wt-Heavy);
    font-weight: 700;
}

.repeater-analyze p {

}

.last-rp {
margin-bottom: 0;
}

.analyze-repeater-stats {
    padding: 40px;
    border-radius: 16px;
    background: #F7F8FC
}

@media screen and (max-width: 760px){
.repeater-analyze {
    margin-top: 40px;
    margin-bottom: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
    grid-column-gap: 32px;
    grid-row-gap: 32px;
    height: 100%;
}

}
</style>


<div class="repeater-analyze">

<?php if( have_rows('lg_repeater') ): ?> 
                <?php while( have_rows('lg_repeater') ): the_row();?>
    <div class="analyze-repeater-stats">    
           <img src="<?php the_sub_field('img_rpt'); ?>" alt="AppDiscovery Logo" class="img-tt">

          <h2 class="fixed-14"><?php the_sub_field('tt_data'); ?></h2>
          <p class="last-rp scale-18-18-16"><?php the_sub_field('tt_text'); ?></p>
          </div>    
            <?php endwhile; ?>
        <?php endif; ?>

</div>