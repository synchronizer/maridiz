<?php
create_block('text', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        // 'no-margin-top' => false,
        // 'no-margin-bottom' => false,
    ), $atts);

    $cls = 'text';
    // $cls .= $atts['no-margin-top'] ? ' text_no-margin-top' : '';
    // $cls .= $atts['no-margin-bottom'] ? ' text_no-margin-bottom' : '';

	
	return "<p class=\"$cls\" $dom_atts>$content</p>";
})
?>

