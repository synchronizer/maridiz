<?php
create_block('check-button', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(), $atts);

    $buttonAtts = '';

    foreach($atts as $key => $value) {
        if ($key != 'id' && $key != 'dom-id') {$buttonAtts .= " $key=\"$value\"";}
        
    }

    return "
<div class=\"check-button\" $dom_atts>
    <Button $buttonAtts>$content</Button>
    <div class=\"check-button__check\"></div>
</div>
    ";
})
?>