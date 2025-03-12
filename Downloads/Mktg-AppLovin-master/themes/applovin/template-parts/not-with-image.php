<style type="text/css">
.funfact {
    display: grid;
    grid-template-columns: repeat(2, auto);
    grid-template-rows: 1fr;
    grid-column-gap: 0px;
    grid-row-gap: 0px;
    margin-top: 80px;
    background: url(/wp-content/themes/applovin/images/bg-fun.png) no-repeat bottom;
    background-size: 100% 100%;
    height: 280px;
}

.funfact img {
    max-width: 280px;
    margin-top: -40px;
}

.funfact-text {
    margin: auto;
    margin-right: 48px;
}

.funfact-title {
    font-family: var(--font-wt-Heavy);
}

.main-content a {
    font-weight: 700;
    font-family: 'Avenir Heavy';
    color: var(--color-al-blue-dark);
}

@media screen and (max-width: 760px){
.funfact {
    display: block;
    width: 100%;
    height: 100%;
    background: none;
}
}
</style>

<div class="funfact">
  <img src="<?php the_field('fun_fact_image'); ?>" alt="fun-fact-img">
  <div class="funfact-text">
  <p class="funfact-title fixed-14"><?php the_field('fun_fact'); ?></p>
  <p class="scale-21-21-18"><?php the_field('part_three_funfact_one'); ?>
  </p>
  </div>
</div>