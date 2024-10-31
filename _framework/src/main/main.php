<?php
create_block('main', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(), $atts);

	
	return "<main class=\"main\"$dom_atts>$content</main>";
})
?>

