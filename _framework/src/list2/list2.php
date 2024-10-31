<?php
create_block('list2', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'sorted' => false,
    ), $atts);

    create_block('list2__item', function ($content) use($atts) {
        $dom_atts = domAtts($atts);
        
        return "<li>$content</li>";
    });

	$tagName = $atts['sorted'] ? 'ol' : 'ul';
	return "<$tagName>
        $content
    </$tagName>
    ";
});


?>

