<?php
create_block('plan', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'color-scheme' => 'light',
        'background' => false,
        'name' => 'name',
        'time' => 'time',
        'price' => 'price',
    ), $atts);

    $cls = "plan";
    $cls .= $atts['color-scheme'] == 'light' ? " plan_color-scheme_light" : "";
    $cls .= $atts['color-scheme'] == 'dark' ? " plan_color-scheme_dark" : "";

    $style = $atts['background'] ? "style=\"--_background: $atts[background]\"" : "";

	return "
   <div class=\"$cls rounded-l\" $style>
      <div class=\"plan__header\">
        <div class=\"plan__name\">$atts[name]</div>
        <div class=\"plan__time\">$atts[time]</div>
      </div>
      <div class=\"plan__price\">$atts[price]</div>
      $content
    </div>
    ";
});

create_block('plan__list', function ($content, $atts) {
    return "<ul class=\"plan__list\">
        $content
      </ul>";
});

create_block('plan__list-item', function ($content, $atts) {
    return "<li class=\"plan__list-item\">$content</li>";
});

create_block('plan__controls', function ($content, $atts) {
    return "<div class=\"plan__controls\">
                $content
            </div>";
});
?>

