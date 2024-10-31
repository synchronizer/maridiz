<?php
create_block('input', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'label' => '',
        'disabled' => false,
        'type' => 'text',
        'id' => false,
        'value' => '',
    ), $atts);


    $type = $atts["type"];

    if ($type != "tel" && $type != "password" && $type != "email") $type = "text";

    $id = $atts['id'] ? "id=\"$atts[id]\"" : "";
    $name = $atts['id'] ? "name=\"$atts[id]\"" : "";
    $for = $atts['id'] ? "for=\"$atts[id]\"" : "";
    $disabled = $atts['disabled'] ? " disabled" : "";


    $class = "input";
    $class = $atts['disabled'] ? "$class input_disabled" : $class;
    return "
    <div class=\"$class\">
    <input type=\"$type\" value=\"$atts[value]\" class=\"input__input rounded-s\" $name$disabled $dom_atts>
  <label $for class=\"input__label\" >$atts[label]:</label>
  
</div>";
})
?>