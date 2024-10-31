<?php
create_block('select', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'label' => '',
        'disabled' => false,
    ), $atts);

    $label = $atts['label'] ? "<label class=\"select__label\">$atts[label]</label>" : "";
    $labelInside = "<option selected disabled value=\"\">$atts[label]</option>";
    $disabled = $atts['disabled'] ? " disabled" : "";

    return "
        <div class=\"select\">
            <select class=\"select__select button rounded-s\" $dom_atts$disabled>
                $labelInside
                $content
            </select>    
        </div>";
});

?>