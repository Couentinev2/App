<style type="text/css">

.grid-success {
    display: grid;
    grid-template-columns: repeat(2, auto);
    grid-template-rows: 1fr;
    grid-column-gap: 32px;
    grid-row-gap: 0;
    margin-top: 40px;
}

object {
    width: 100%;
    margin: 0 auto;
    display: block;
}
.success-mini-h {
    width: 100%;
    display: inline-flex;

}


.grid-success-text p {
    margin: 24px 0;
}

.promo-link {
color: var(--color-al-blue);
}

.promo-link:after {
margin-left: 7px;
background-position: center;
height: 10px;
width: 10px;
}

.main-content a{
    font-weight: 700;
    font-family: "Avenir Heavy";
    color: var(--color-al-blue-dark);
}

.success-mini-h object{
    max-width: 144px!important;
    margin-left: 0;
    margin-right: 24px;
}

    .grid-success-text object {
        max-height: 48px;
    }



.success-mini-h p {
    margin: 0;
    padding: 0.75em 1em;
    color: #929BBA;
    background-color: #F7F8FC;
    font-family: var(--font-wt-Black);
    font-weight: 800;
    letter-spacing: 1px;
    align-self: center;
    border-radius: 32px;
    white-space: nowrap;
    text-transform: uppercase;
}

.grid-success-text {
    min-width: 100%;
}

.side-image {
   border-radius: 6px;
 
}

.simple-separation {
  width: 100%;
  border-top: 1px solid #E6E6E6;
  margin: 40px 0;
}

.grid-success object {
    width: auto;
    max-width: 258px;
}

@media screen and (max-width: 760px){

    .grid-success object {
    width: auto;
    max-width: 100%;
}


    .grid-success-text {
        min-width: auto;
    }
.grid-success{
    display: block;
}
.grid-success object {
    margin-bottom: 32px;
}
.success-mini-h {
    width: auto;

}
.cat-left, .cat-right {
    margin: unset;
    border-top: unset;

}
.success-mini-h object{
    margin-bottom: 0;
}

.grid-cl-nb-2 {
    display: block;
}
}
</style>

<?php if( get_field('grey_line_separation_top') == 'Yes' ): ?>
    <div class="simple-separation">
    </div>
<?php endif; ?>


<div class="grid-success success-second">                    
    <a href="<?php the_field('success_url_two'); ?>" target="_blank">
    <object class="side-image" data="<?php the_field('success_img_two'); ?>" title="ctv-report"></object></a>
    <div class="grid-success-text">
            <div class="success-mini-h">
                <?php if( get_field('success_logo_two') ): ?>
                    <object data="<?php the_field('success_logo_two'); ?>" title="ctv-report"></object>
                <?php endif; ?>
                <?php if( get_field('success_tittle') ): ?>
                    <p class="fixed-12"><?php the_field('success_tittle'); ?></p>
                <?php endif; ?>
            </div>
        <p class="scale-18-18-16"><?php the_field('success_text_two'); ?></p>
        <a class="scale-18-18-16 promo-link" href="<?php the_field('success_url_two'); ?>" target="_blank"><?php the_field('success_link_two'); ?></a>
    </div>
</div>

<?php if( get_field('grey_line_separation_bottom') == 'Yes' ): ?>
    <div class="simple-separation">
    </div>
<?php endif; ?>