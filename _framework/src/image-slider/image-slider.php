<?php
create_block('image-slider', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'aspect-ratio' => '2',
        'height' => false,
        'src' => false,
    ), $atts);

    $attsAspectRatio = $atts['aspect-ratio'];

    $aspectRatio = $attsAspectRatio ? "aspect-ratio: $attsAspectRatio;" : "";
    $height = $atts['height'] ? "height: $atts[height];" : "";

    $style = ($aspectRatio || $height) ? "style=\"$aspectRatio $height\"" : "";

    if ($atts['src']) {
        foreach(glob("$_SERVER[DOCUMENT_ROOT]$atts[src]/*.*") as $key => $src)
            {
                $image_src = substr($src, strlen($_SERVER['DOCUMENT_ROOT']));
                $image_alt = preg_replace('/(.*\/)/', '', $src);
                $image_alt = preg_replace('/\.(.+)$/', '', $image_alt);
                $image_alt = str_replace('_', ' ', $image_alt);
                $content .= "<Image-slider__item src=\"$image_src\" alt=\"$image_alt\"></Image-slider__item>";
            }
    }

    return "
<div class=\"image-slider rounded-m\" $style>
    <div class=\"image-slider__content\">
        $content
    </div>
    <div class=\"image-slider__left image-slider__left_hide\"><Button appearance=\"dark\" icon=\"/_resources/icons/arrow-left.svg\"></Button></div>
    <div class=\"image-slider__right image-slider__right_hide\"><Button appearance=\"dark\" icon=\"/_resources/icons/arrow-right.svg\"></Button></div>
</div>
    ";
});

create_block('image-slider__item', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'src'   => false,
        'alt'   => false,
    ), $atts);

    return "
    <img class=\"image-slider__item\" src=\"$atts[src]\" alt=\"$atts[alt]\">
    ";
});
?>






