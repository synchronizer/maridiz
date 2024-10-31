<?php
create_block('qa', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'q' => ' ',
    ), $atts);

    $cls = "qa";

    $content = lcfirst($content);

	return "
    <details class=\"qa rounded-m\">
        <summary class=\"qa__question\">$atts[q]</summary>
        <b>Ответ: </b>$content
    </details>
    ";
})
?>

