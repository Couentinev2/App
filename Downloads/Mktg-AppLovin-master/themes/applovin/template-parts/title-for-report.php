<?php


$para_title = get_field('para_title');
$id_attribute = str_replace(' ', '', $para_title);



?>
<div class="title-report">
    <h2 class="scale-36-30-24 menu-jump" id="<?php echo esc_attr($id_attribute); ?>">
        <?php echo esc_html($para_title); ?>
    </h2>
</div>