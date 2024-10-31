<?php
create_block('page', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'title' => 'title',
        'lang' => 'ru',
        'description' => '',
        'code-mirror' => false,
        'map' => false,
    ), $atts);

    $codeMirror = $atts['code-mirror'] ? "
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/codemirror@5.65.0/lib/codemirror.css\">
    <script src=\"https://cdn.jsdelivr.net/npm/codemirror@5.65.0/lib/codemirror.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/codemirror@5.65.0/mode/xml/xml.js\"></script>
    " : "";

    $map = $atts['map'] ? "
    <script src=\"https://api-maps.yandex.ru/v3/?apikey=0999bf04-ae25-480a-87e8-c5ee294addc0&lang=ru_RU\" defer></script>
    <script src=\"/_resources/clients-map/clients-map.js\" defer></script>
    " : "";

	return "
    <!DOCTYPE html>
    <html lang=\"$atts[lang]\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"robots\" content=\"noindex, nofollow\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\">
        <title>$atts[title]</title>
        <meta name=\"description\" content=\"$atts[description]\">
        %css
        <link rel=\"icon\" href=\"/_resources/favicon.svg\">
        $codeMirror
        $map
    </head>
    <body class=\"body\">
        <Dev-panel for_dev></Dev-panel>
        <Notifications></Notifications>
        $content
        %js
    </body>
    </html>
    ";
})
?>

