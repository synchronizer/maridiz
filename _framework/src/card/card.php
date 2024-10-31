<?php
create_block('card', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        // 'title' => '',
        // 'text' => '',
        // 'img' => '',
        'whitetext' => false,
        'center' => false,
        'background' => false,
        'background-image' => false,
        'background-color' => false,
        'aspect-ratio' => false,
        'size' => false,
    ), $atts);

    $background_image_value = $atts['background-image'];
    $background_color_value = $atts['background-color'];

    $background = $atts['background'] ? "background: $atts[background];" : "";
    $background_image = $background_image_value ? "background-image: $background_image_value;" : "";
    $background_color = $background_color_value ? "background-color: $background_color_value;" : "";

    $aspect_ratio_value = $atts['aspect-ratio'];

    $aspect_ratio = $aspect_ratio_value ? "aspect-ratio: $aspect_ratio_value" : '';

    $style="style=\"$background $background_image $background_color $aspect_ratio\"";

    $cls = "card";
    $cls .= $atts['center'] ? " card_center" : '';
    $cls .= $atts['whitetext'] ? " card_whitetext" : '';
    $cls .= $atts['size'] ? " card_size_$atts[size]" : '';

	return "
        <div class=\"$cls rounded-m\" $style $dom_atts>
                <div class=\"card__content\">
                    $content
                </div>
        </div>
    ";
})
?>

