<?php
create_block('banner', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'title' => '',
        'text' => '',
        'background' => false,
        'background-image' => false,
        'content-width' => 'm',
        'rounded' => false,
    ), $atts);

    $background = $atts['background'] ? "style=\"background: $atts[background]\"" : "";
    $background_image = $atts['background-image'];
    $background = $background_image ? "style=\"background-image: $background_image\"" : $background;
    $content_width = $atts['content-width'];
    $cls = "banner banner_content-width_$content_width";
    $cls .= $atts['rounded'] ? " rounded-m" : "";
	
	return "
        <div class=\"$cls\" $background $dom_atts>
            <div class=\"banner__content\">
                <h2 class=\"banner__title\">$atts[title]</h2>
                <div class=\"banner__text\">$atts[text]</div>
                $content
            </div>
        </div>
    ";
});

?>

