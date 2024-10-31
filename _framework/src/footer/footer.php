<?php
create_block('footer', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'menu' => '/Menu/menu.json',
    ), $atts);

	// $href = $atts['href'] ? " href=\"$atts[href]\"": "";
	// $href = $atts['href'] == "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ? "" : $href;
	// $target = $atts['target'] ? " target=\"$atts[target]\"": "";

    global $src_path;

    $menu_src = json_decode(file_get_contents("$src_path$atts[menu]"), true);

    
    // function menu_build($menu_src) {
        $menu = '';
        $last_group = '';
        foreach ($menu_src as $key => $value) {
            $href = '';
            $ghost = '';
            if ($_SERVER['REQUEST_URI'] != $value['href']) {
                $href = "href=\"$value[href]\"";
                $ghost = 'ghost';
            }

            if (!array_key_exists('submenu', $value)) {
                $last_group .= "<Button  $ghost $href small>$key</Button>";
            } else {
                $menu .= "
                <div class=\"footer__menu-group\">
                    ";

                    foreach ($value['submenu'] as $subkey => $subvalue) {
                        $subhref = '';
                        $subghost = '';
                        if ($_SERVER['REQUEST_URI'] != $subvalue['href']) {
                            $subhref = " href=\"$subvalue[href]\"";
                            $subghost = ' ghost';
                        }
                        $menu .= "<Button $subghost$subhref small>$subkey</Button>";
                    }

                
                $menu .= "</div>";
            }
            
            
        }

        $menu .= "<div class=\"footer__menu-group\">
                    $last_group
                    <Button small ghost>Telegram</Button>
                    <Button small ghost>WhatApp</Button>
                    <Button small ghost>+7 (999) 813-55-55</Button>
                </div>";

    //     return $menu;
    // }

    // $menu = menu_build($menu_src);

    // $main_href = $_SERVER['REQUEST_URI'] != '/' ? ' href="/"' : '';

    $cls = 'footer';

	return "

    <footer class=\"$cls\">
        <nav class=\"footer__menu\">
            $menu
        </nav>
        <div class=\"footer__info\">
            <Caption>
                Copyright © ИП Андреева Мария Андреевна 2015-2024, Маридиз.
                <br>
                Использование контента запрещается без письменного разрешения ИП Андреевой М.А.
            </Caption>
            <Caption>
                ИНН 771989306812
                <br>
                ОГРН 315774600368370
            </Caption>
        </div>
        
    </footer>
    ";
})
?>
