<?php
create_block('supertitle', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        // 'no-margin-top' => false,
        // 'no-margin-bottom' => false,
        'center' => false,
    ), $atts);

    $cls = 'supertitle';
    // $cls .= $atts['no-margin-top'] ? ' supertitle_no-margin-top' : '';
    // $cls .= $atts['no-margin-bottom'] ? ' supertitle_no-margin-bottom' : '';
    $cls .= $atts['center'] ? ' supertitle_center' : '';

	
	return "<h1 class=\"$cls\" $dom_atts>$content</h1>";
})
?>

