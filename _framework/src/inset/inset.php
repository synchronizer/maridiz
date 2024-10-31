<?php
create_block('inset', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(), $atts);
    $class = "inset";

	
	return "
<div class=\"$class rounded-m\"$dom_atts>$content</div>
    ";
})

?>

