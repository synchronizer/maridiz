<?php
create_block('example', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'dark' => false,
        'fullwidth' => false,
    ), $atts);

    $block = $content;
    $dark = $atts['dark'] ? " example_dark" : "";
    $fullwidth = $atts['fullwidth'] ? " example_fullwidth" : "";

    $code = str_replace('[[', '&lt;', $content);
    $code = str_replace('<', '&lt;', $code);
    $code = str_replace('>', '&gt;', $code);
    $code = str_replace(']]', '&gt;', $code);


    
    return "<div class=\"example$dark $fullwidth\"$dom_atts>
                <div class=\"example__block\">$block</div>
                <div class=\"example__code\">
                    <code class=\"example__code-src\">$code</code>
                </div>
                <div class=\"example__html\">
                    <textarea class=\"example__html-src\"></textarea>
                    <div class=\"example__html-buttons\">
                        <div class=\"example__html-reset\">
                            <Button small>Reset</Button>
                        </div>
                        <div class=\"example__html-copy\">
                            <Button small disabled>Copy</Button>
                        </div>
                    </div>
                </div>
            </div>";
})
?>






