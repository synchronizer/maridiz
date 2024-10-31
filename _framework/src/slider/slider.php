<?php
create_block('slider', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'time' => '4',
        'pause' => '4',
        'titles' => array(),
        'texts' => array(),
    ), $atts);

    $teaser_list = "";
    $titles_array = $atts['titles'];
    $texts_array = $atts['texts'];

    foreach ($titles_array as $key => $value) {
        $teaser_class = "slider__teaser";

        $text = (count($texts_array) > $key) ? $texts_array[$key] : "";

        $rounded = ($key == 0) ? " rounded-left-s" : "";
        $rounded = ($key == count($titles_array) - 1) ? " rounded-right-s" : $rounded;

        $teaser_list .= "
        
            <div class=\"$teaser_class\">
                <div class=\"slider__teaser-bg $rounded\">
                    <div class=\"slider__teaser-bar\"></div>
                </div>
                <div class=\"slider__teaser-title\">$value</div>
                <div class=\"slider__teaser-text\">$text</div>
            </div>
        
        ";
    }



    return "
        <div class=\"slider\"$dom_atts data-time=\"$atts[time]\" data-pause=\"$atts[pause]\">
            <div class=\"slider__content\">$content</div>
            <div class=\"slider__teaser-list\">$teaser_list</div>
        </div>
    ";
})
?>

