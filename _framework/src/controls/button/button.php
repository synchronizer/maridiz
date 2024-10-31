<?php
create_block('button', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'ghost' => false,       // true, false
        'action' => false,      // true, false
        'href' => false,        // [href url]
        'load' => false,        // true, false
        'small' => false,       // true, false
        'extrasmall' => false,  // true, false
        'icon' => false,        // [icon url]
        'download' => false,    // true, false
        'whitelabel' => false,  // true, false
        'fullwidth' => false,   // true, false
        'abstract' => false,    // true, false
        'disabled' => false,    // true, false
        'appearance' => 'default',   // 'default', 'action', dark'
        'size' => 'm',           // 's', 'm', 'l'
        'counter' => false,      // NUMBER
    ), $atts);

	$class = "button button_appearance_$atts[appearance] button_size_$atts[size]";
    $class .= $atts['ghost'] ? " button_ghost" : "";
    $class .= $atts['action'] ? " button_action" : "";
    $class .= $atts['load'] ? " button_load" : "";
    $class .= $atts['small'] ? " button_small" : "";
    $class .= $atts['extrasmall'] ? " button_extrasmall" : "";
    $class .= $atts['whitelabel'] ? " button_whitelabel" : "";
    $class .= $atts['fullwidth'] ? " button_fullwidth" : "";
    $class .= $atts['abstract'] ? " button_abstract" : "";
    $class .= $atts['icon'] ? " button_with-icon" : "";

    $disabled = $atts['disabled'] ? " disabled" : "";
    $counter = $atts['counter'] ? " data-counter=\"$atts[counter]\"" : "";

    $tagName = $atts['abstract'] ? "div" : "button";
    $tagName = $atts['href'] ? "a" : $tagName;
    $abstractAtts = $atts['abstract'] ? "tabindex=\"0\"" : "";

    $href = $atts['href'] ? " href=\"$atts[href]\"" : "";

    $iconURL = $atts['icon'] ? " style=\"--icon: url('$atts[icon]')\"" : "";

    $download = $atts['download'] ? " download" : "";

    return "
    <$tagName $counter class=\"$class rounded-s\"$href $download $dom_atts $disabled $iconURL $abstractAtts>$content</$tagName>";
})
?>

