<?php
create_block('textarea', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
      'label' => '',
      'disabled' => false,
      'rows' => '5',
      'id' => false,
    ), $atts);

    $id = $atts['id'] ? "id=\"$atts[id]\"" : "";
    $name = $atts['id'] ? "name=\"$atts[id]\"" : "";
    $for = $atts['id'] ? "for=\"$atts[id]\"" : "";  
    $disabled = $atts['disabled'] ? "disabled" : "";

    $class = "textarea";
    $class = $atts['disabled'] ? "$class textarea_disabled" : $class;
    return "
    <div class=\"$class\">
      <textarea rows=\"$atts[rows]\"  class=\"textarea__textarea rounded-s\" $name $disabled $dom_atts></textarea>
  <label $for class=\"textarea__label\" >$atts[label]:</label>
  
</div>";

})
?>