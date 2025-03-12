    <div class="accordion-section" style="background-image: url(' <?php the_field("acordion_image"); ?>' " id="accordion-main-section">
  <div class="inner-wrap-1200">   
    <div class="accordion-main">
<div id="partnership-left" class="partnership-left">
<h2 class="scale-36-30-24"><?php the_field('acordion_title_intro'); ?></h2>
<p class="scale-21-21-18"><?php the_field('acordion_text_intro'); ?></p>



  <div id="partnership-left-accordion">

  <div id="myProgress">
    <div id="myBar"></div>
  </div>

      <button onclick="move()" id ="panel-1" class="accordion scale-21-21-18" ><?php the_field('acordion_title_pannel_one'); ?></button>
    <div class="panel">
      <p class="scale-18-18-16"><?php the_field('acordion_pannel_one'); ?></p>
    </div>

  <div id="myProgressv2">
    <div id="myBarv2"></div>
  </div>

    <button  onclick="movebis()"  id ="panel-2" class="accordion scale-21-21-18"><?php the_field('acordion_title_pannel_two'); ?></button>
    <div class="panel">
      <p class="scale-18-18-16"><?php the_field('acordion_pannel_two'); ?></p>
    </div>
  </div>
</div>

<div class="partnership-right" >
</div>
</div>
</div>
</div>