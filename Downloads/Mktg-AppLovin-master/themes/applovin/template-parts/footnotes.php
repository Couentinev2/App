<style type="text/css">
.case-study-footnotes, .case-study-footnotes a {
    width: 100%;
    padding: 0 3em;
    padding-left: 0;
    margin: 64px 0;
    text-align: left;
    font-size: 14px!important;
    line-height: 1.4em;
    color: #666666!important;
    font-family: var(--font-wt-Light)!important;
    font-weight: 400!important;
}
.case-study-footnotes{
margin-top: 32px;
}
.case-study-footnotes p {
    padding-left: 0;
    font-size: 14px!important;

}

.case-study-footnotes sup {
    padding-right: 5px;
    color: #099AC6;
}

.case-study-footnotes sup {
        font-family: var(--font-wt-Heavy);
    font-weight: 700;
    top: 0;
}

.case-study-footnotes span {display: flex}

</style>

<div class="case-study-footnotes" style="">
<?php
// Get the current post's ID

// Initialize a counter variable
$counter = 1;

// Check if the repeater field has values
if (have_rows('footnotes')) {
    // Start a loop through the repeater rows
    while (have_rows('footnotes')) {
        // Get the current repeater row
        the_row();

        // Get the value of the subfield 'sub_field_name' for the current row
        $sub_field_value = get_sub_field('line');

        // Display the counter and subfield value
        echo '<span><sup>' . $counter . '</sup>' . $sub_field_value . '</span>';

        // Increment the counter for the next iteration
        $counter++;
    }
}
?>
</div>