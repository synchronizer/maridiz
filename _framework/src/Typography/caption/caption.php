<?php
create_block('caption', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(), $atts);

	
	return "<div class=\"caption\"$dom_atts>$content</div>";
})
?>

