<?php
create_block('title', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        // 'no-margin-top' => false,
        // 'no-margin-bottom' => false,
        'center' => false,
    ), $atts);

    $cls = 'title';
    // $cls .= $atts['no-margin-top'] ? ' title_no-margin-top' : '';
    // $cls .= $atts['no-margin-bottom'] ? ' title_no-margin-bottom' : '';
    $cls .= $atts['center'] ? ' title_center' : '';

	
	return "<h2 class=\"$cls\" $dom_atts>$content</h2>";
})
?>

