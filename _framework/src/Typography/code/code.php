<?php
create_block('code', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(), $atts);

	
	return "
    <span class=\"code\"$dom_atts>$content</span>
    ";
})
?>

