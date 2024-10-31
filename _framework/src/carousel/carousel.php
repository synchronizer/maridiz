<?php
create_block('carousel', function ($content, $atts) {

    $dom_atts = domAtts($atts);

     $atts = defaultAtts( [
     ], $atts );
    
    
    return "
<div class=\"carousel\">
    <div class=\"carousel__content\">
        $content
    </div>   
    <div class=\"carousel__left carousel__left_hide\"><Button appearance=\"dark\" icon=\"/_resources/icons/arrow-left.svg\"></Button></div>
    <div class=\"carousel__right carousel__right_hide\"><Button appearance=\"dark\" icon=\"/_resources/icons/arrow-right.svg\"></Button></div>
</div>
    ";

       

})
?>

