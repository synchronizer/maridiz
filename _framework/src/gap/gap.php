<?php
create_block('gap', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
    ), $atts);

	return "
    <div class=\"gap\"$dom_atts></div>
    ";
})
?>
