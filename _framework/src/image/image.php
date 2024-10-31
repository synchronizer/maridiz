<?php
create_block('image', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'src' => false,
        'caption' => false,
        'width' => false,
        'height' => false,
        'alt' => false,
        'rounded' => false,
    ), $atts);

    $caption = $atts['caption'] ? "<figcaption class=\"image__caption\">$atts[caption]</figcaption>" : "";
    $alt = $atts['alt'] ? "alt=\"$atts[alt]\"" : "";
    $width = $atts['width'] ? "width=$atts[width]" : "";
    $height = $atts['height'] ? "height=$atts[height]" : "";
    $class = "image";
    $img_class = "image__img";
    $img_class .= $atts['rounded'] ? " rounded-m" : "";
    
    return "
<figure class=\"$class\">
    <div class=\"image__wrapper\">
        <img class=\"$img_class\" src=\"$atts[src]\" $alt $height $width $dom_atts>
    </div>
    $caption
</figure>
    ";
})
?>
