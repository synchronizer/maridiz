<?php
create_block('dev-panel', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
    ), $atts);
    
    return "
    <div class=\"dev-panel dev-element\">
        <Button dom-data-nofocus=\"\" icon=\"/_resources/icons/dev-tools/build.svg\" ghost href=\"/_build.php\" dom-target=\"_blank\" dom-title=\"Build\"></Button>
         <Button dom-data-nofocus=\"\" icon=\"/_resources/icons/dev-tools/documentation.svg\" ghost href=\"/documentation\" dom-id=\"documentation-button\" dom-title=\"Documentation\"></Button>
         <div class=\"dev-panel__divider\"></div>
        <Check-button dom-data-nofocus=\"\" icon=\"_resources/icons/dev-tools/frames.svg\" ghost dom-id=\"frames-button\" dom-title=\"Frames\"></Check-button>
        <Button dom-data-nofocus=\"\" icon=\"_resources/icons/dev-tools/notification.svg\" ghost dom-id=\"notification-button\" dom-title=\"Notification\"></Button>
        <Check-button dom-data-nofocus=\"\" icon=\"_resources/icons/dev-tools/dark-mode.svg\" ghost dom-id=\"dark-mode-button\" dom-title=\"Dark mode\"></Check-button>
        
    </div>
    ";
})
?>

<!-- <Check-button dom-title=\"Toggle img alt texts warning\" ghost dom-data-nofocus icon=\"_resources/icons/dev-tools/alt.svg\" dom-id=\"image-alt-button\"></Check-button>
        <Check-button ghost dom-title=\"Toggle button title warning\" dom-data-nofocus icon=\"_resources/icons/dev-tools/title.svg\" dom-id=\"button-title-button\"></Check-button> -->






