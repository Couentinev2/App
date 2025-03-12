<style type="text/css">
.sidefact {

    padding: 26px 0;
}

.sidefact-item {
    display: grid;
    grid-template-columns: repeat(2, auto);
    grid-template-rows: 1fr;
    grid-column-gap: 32px;
    grid-row-gap: 0px;

}

.sidefact img {
    max-width: 72px;
    align-self: center;
}

.fact-text {
    margin: auto;
    margin-right: 48px;
}

.fact-title {
    font-family: var(--font-wt-Heavy);
}

.main-content a {
    font-weight: 700;
    font-family: 'Avenir Heavy';
    color: var(--color-al-blue-dark);
}

    .sidefact-item {
        margin: 34px 0;
    }



    .sidefact-item:first-child {
        margin-top: 0;
    }

    

.sidefact-item:last-child {
    margin-bottom: 0;
}
@media screen and (max-width: 760px){
.sidefact-item {
    display: block;
    width: 100%;
    height: 100%;
    background: none;
}
.sidefact-item img {
    margin: auto;
    margin-bottom: 26px;
}
.fact-text {
    text-align: center;
}
}
</style>

<div class="sidefact">
<?php if( have_rows('img-desc_repeater') ): ?> 
    <?php while( have_rows('img-desc_repeater') ): the_row();?>
    <div class="sidefact-item">
  <img src="<?php the_sub_field('fact_image'); ?>" alt="fact-img">
  <div class="fact-text">
      <p class="scale-18-18-16"><?php the_sub_field('part_three_one'); ?>
  </p>
  </div>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
</div>