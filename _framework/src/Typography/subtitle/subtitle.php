<?php
create_block('subtitle', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        // 'no-margin-top' => false,
        // 'no-margin-bottom' => false,
        'center' => false,
    ), $atts);

    $cls = 'subtitle';
    // $cls .= $atts['no-margin-top'] ? ' subtitle_no-margin-top' : '';
    // $cls .= $atts['no-margin-bottom'] ? ' subtitle_no-margin-bottom' : '';
    $cls .= $atts['center'] ? ' subtitle_center' : '';

	
	return "<h3 class=\"$cls\" $dom_atts>$content</h3>";
})
?>

