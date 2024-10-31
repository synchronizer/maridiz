<?php
create_block('list', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'no-marker' => false,
        'sorted' => false,
    ), $atts);

    $class = "list";
    $class .= $atts['no-marker'] ? " list_no-marker" : "";

    $tagName = $atts['sorted'] ? 'ol' : 'ul';

    return "<$tagName class=\"$class\" $dom_atts>$content</$tagName>";
});

create_block('list__item', function ($content, $atts) {
    $dom_atts = domAtts($atts);
    $class = "list__item";
    return "<li class=\"$class\" $dom_atts>$content</li>";
});
?>

