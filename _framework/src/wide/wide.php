<?php
create_block('wide', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(

    ), $atts);


	return "
    <div class=\"wide\">
        $content
    </div>
    ";
})
?>

