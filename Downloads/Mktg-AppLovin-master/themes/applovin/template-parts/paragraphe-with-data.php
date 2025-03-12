<style type="text/css">
.simple-para .title{
    margin-bottom: 40px!important
}

.simple-para .subtitle{
    margin-bottom: 40px!important
}


.grid-cl-nb-2 {
display: grid;
grid-template-columns: repeat(2, 1fr);
grid-template-rows: 1fr;
grid-column-gap: 32px;
grid-row-gap: 0px;
margin-bottom: 40px;
}

.number{
color: #00B6E0;
    font-family: var(--font-wt-Black);
    font-weight: 750;
}


.cl-nb-card {
    padding: 40px;
    background-color:#F7F8FC ;
    border-radius: 16px;
}


@media screen and (max-width: 760px){

.grid-cl-nb-2 {
    display: block;
}
.grid-cl-nb-2 .cl-nb-card:first-child{
    margin-bottom: 16px;
}

}

</style>


<div class="grid-cl-nb-2">
  <div class="cl-nb-card">
      <p class="number scale-32-24-21"><?php the_field('stat_one'); ?></p>
      <p class="scale-18-18-16"><?php the_field('part_three_cards_cl_text_one'); ?></p>
   </div>
     <div class="cl-nb-card">
      <p class="number scale-32-24-21"><?php the_field('stat_two'); ?></p>
      <p class="scale-18-18-16"><?php the_field('part_three_cards_cl_text_two'); ?></p>
   </div>
</div>


