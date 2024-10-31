<?php
create_block('clients-map', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(), $atts);

	
	return "
    
    <div class=\"clients-map clients-map_loading\">
        <div class=\"clients-map__loader\">
            <Loader></Loader>
        </div>
        <div class=\"clients-map__search\">
            <input type=\"text\" class=\"clients-map__search-input rounded-s\" placeholder=\"Поиск\">
            <div class=\"clients-map__search-suggest rounded-s\"></div>
        </div>
        <div class=\"clients-map__map\"></div>
    </div>";
})
?>

