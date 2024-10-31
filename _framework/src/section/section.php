<?php
create_block('section', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        
    ), $atts);

    $cls = "section";
	
	return "
    <section class=\"$cls\"$dom_atts>$content</section>
    ";
})
?>

