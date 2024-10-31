<?php
create_block('gallery', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'src' => false,
        // 'caption' => array(),
        'width' => false,
        'height' => false,
        'fade' => false,
        // 'alt' => false,
        'rounded' => false,
    ), $atts);

    $width = $atts['width'] ? "width=$atts[width]" : "";
    $height = $atts['height'] ? "height=$atts[height]" : "";
    $fade = $atts['fade'] ? "fade=$atts[fade]" : "";
    $rounded = $atts['rounded'] ? "rounded=$atts[rounded]" : "";

    $output = '';


    foreach(glob("$_SERVER[DOCUMENT_ROOT]$atts[src]/*.*") as $key => $src)
            {
                // $image_caption = '';
                // if (gettype($atts['caption']) == 'array' && array_key_exists($key, $atts['caption'])) {
                //     $image_caption = "caption=\"" . $atts['caption'][$key] . "\"";
                // } elseif ($atts['caption'] && gettype($atts['caption']) != 'array') {
                //     $image_caption = "caption=\"$atts[caption] " . ($key + 1) . '"';
                // }


                // $image_alt = '';
                // if (gettype($atts['alt']) == 'array' && array_key_exists($key, $atts['alt'])) {
                //     $image_alt = "alt=\"" . $atts['alt'][$key] . "\"";
                // } elseif ($atts['alt'] && gettype($atts['alt']) != 'array') {
                //     $image_alt = "alt=\"$atts[alt] " . ($key + 1) . '"';
                // }

                $image_alt = preg_replace('/(.*\/)/', '', $src);
                $image_alt = preg_replace('/\.(.+)$/', '', $image_alt);
                $image_alt = str_replace('_', ' ', $image_alt);
                $image_src = substr($src, strlen($_SERVER['DOCUMENT_ROOT']));
                
                $output .= "<Image alt=\"$image_alt\" $width $height $fade $rounded src=\"$image_src\"></Image>";
            }

    
    return "$output";
})
?>






