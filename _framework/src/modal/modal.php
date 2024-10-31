<?php
create_block('modal', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'card'  => true,
        'id'    => false,
    ), $atts);

    $id = $atts['id'] ? "id=\"$atts[id]\"" : "";

    $cls = "modal";
    $cls .= $atts['card'] ? " modal_card" : "";

	return "
<dialog class=\"$cls\" $id>
    <div class=\"modal__scroller\">
        <div class=\"modal__content-wrapper\">
        <div class=\"modal__content rounded-l\">
            $content
        </div>
        </div>
    </div>
    <div class=\"modal__close\">
        <Button small ghost icon=\"/_resources/icons/cross.svg\"></Button>
    </div>
</dialog>
    ";
})
?>

