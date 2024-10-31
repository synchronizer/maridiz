<?php
create_block('notifications', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'title' => 'title',
        'lang' => 'ru',
        'description' => '',
    ), $atts);

	
	return "<div class=\"notifications\">
        <div class=\"notifications__prototype\">
            <div class=\"notifications__item rounded-m\">
            <div class=\"notifications__item-icon\"></div>
            <div class=\"notifications__item-text\">prototype</div>
             <div class=\"notifications__item-close\">
                <Button small ghost whitelabel icon=\"/_resources/icons/solar_close-circle-linear.svg\"></Button>
            </div>
        </div>
        </div>
    </div>
    ";
})
?>

