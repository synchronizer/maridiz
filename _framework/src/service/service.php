<?php
create_block('service', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'title' => '',
        'text' => '',
        'img' => '',
        'background' => false,
        'background-image' => false,
    ), $atts);

    $background = $atts['background'] ? "style=\"background: $atts[background]\"" : "";
    $background_image = $atts['background-image'];
    $background = $background_image ? "style=\"background-image: $background_image\"" : $background;

	
	return "
        <div class=\"servic rounded-m\" $background $dom_atts>
            <img class=\"service__image\" src=\"$atts[img]\" alt=\"\">
            <h2 class=\"service__title\">$atts[title]</h2>
                <p class=\"service__text\">$atts[text]</p>
            <div class=\"service__content\">
                
                $content
            </div>
        </div>
    ";
})
?>

