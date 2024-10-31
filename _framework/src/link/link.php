<?php
create_block('link', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
       'target' => false,
	   'href' => false,
    ), $atts);

	$href = $atts['href'] ? " href=\"$atts[href]\"": "";
	$href = $atts['href'] == "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ? "" : $href;
	$target = $atts['target'] ? " target=\"$atts[target]\"": "";
	return "<a class=\"link\"$href$dom_atts>$content</a>";
})
?>
