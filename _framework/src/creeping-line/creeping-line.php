<?php
create_block('creeping-line', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'interval' => 20,
    ), $atts);

    
    return "<div class=\"creeping-line\"$dom_atts>
                <div class=\"creeping-line__text\">
                    $content
                </div>
            </div>";
})
?>






