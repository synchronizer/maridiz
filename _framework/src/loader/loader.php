<?php
create_block('loader', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(), $atts);

	
	return "
    <div class=\"loader\">
    <div class=\"loader__circle\"></div>
    <div class=\"loader__circle\"></div>
    <div class=\"loader__circle\"></div>
  </div>
    ";
})
?>

