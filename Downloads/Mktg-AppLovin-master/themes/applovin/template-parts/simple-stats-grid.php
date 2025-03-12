<style type="text/css">
.repeter-analyze {
    margin-top: 40px;
    margin-bottom: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50px, 1fr));
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    height: auto;
}

.repeter-analyze h2 {
    border-left: 1px solid #00B6E0;
    padding: 0 24px;
    margin-bottom: 0;
}

.repeter-analyze p {
    padding: 0 24px;
    margin-bottom: 0;
}

@media screen and (max-width: 760px){
.repeter-analyze {
    margin-top: 40px;
    margin-bottom: 40px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(50%, 1fr));
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    height: auto;

}

}
</style>


<div class="repeter-analyze">

<?php if( have_rows('analyze_repeater') ): ?> 
                <?php while( have_rows('analyze_repeater') ): the_row();?>
    <div class="analyze-repeater">    
          <h2 class="scale-32-24-21"><?php the_sub_field('title_data'); ?>
        </h2>
          <p class="scale-18-18-16"><?php the_sub_field('data_text'); ?></p>
          </div>    
            <?php endwhile; ?>
        <?php endif; ?>

</div>