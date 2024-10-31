<?php
create_block('row', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(), $atts);

	
	return "
    <div class=\"row\"$dom_atts>$content</div>
    ";
})
?>

