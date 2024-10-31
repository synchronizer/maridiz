<?php
create_block('stages', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
    ), $atts);

    $cls = "stages";

	return "<div class=\"$cls\">$content</div> ";
});
create_block('stages__item', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'title' => false,
        'img' => false,
    ), $atts);

	return "<div class=\"stages__item\">
    <div class=\"stages__item-content\">
    $content
    </div>
    </div> ";
});

?>

