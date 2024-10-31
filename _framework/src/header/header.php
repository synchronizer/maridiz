<?php
create_block('header', function ($content, $atts) {

    $dom_atts = domAtts($atts);
    $atts = defaultAtts(array(
        'menu' => '/Menu/menu.json',
    ), $atts);

	// $href = $atts['href'] ? " href=\"$atts[href]\"": "";
	// $href = $atts['href'] == "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ? "" : $href;
	// $target = $atts['target'] ? " target=\"$atts[target]\"": "";

    global $src_path;

    $menu_src = json_decode(file_get_contents("$src_path$atts[menu]"), true);

    

    // function menu_travel($menu_src) {
        $menu = '';
        foreach ($menu_src as $key => $value) {
            $href = '';
            $ghost = '';
            if ($_SERVER['REQUEST_URI'] != $value['href']) {
                $href = "href=\"$value[href]\"";
                $ghost = 'ghost';
            }

            $expand = array_key_exists('submenu', $value) ? "<input type=\"checkbox\" class=\"header__mobile-menu-item-expand\"/>" : "";
            $menu .= "
            <div class=\"header__menu-item\">
                <Button $ghost $href>$key</Button>
                $expand
                ";
            if (array_key_exists('submenu', $value)) {
                $submenu = '<div class="header__submenu rounded-m"><div class="header__submenu-holder"></div>';

                foreach ($value['submenu'] as $subkey => $subvalue) {
                    $subhref = '';
                    $subghost = '';
                    if ($_SERVER['REQUEST_URI'] != $subvalue['href']) {
                        $subhref = " href=\"$subvalue[href]\"";
                        $subghost = ' ghost';
                    }
                    $submenu .= "<Button $subghost$subhref small>$subkey</Button>";
                }

                $submenu .="</div>";
                $menu .= $submenu;
            }
            $menu .= "</div>";
        }

    //     return $menu;
    // }

    // $menu = menu_travel($menu_src);

    $main_href = $_SERVER['REQUEST_URI'] != '/' ? ' href="/"' : '';

    $cls = 'header';

	return "
    <header class=\"$cls\">
        <div class=\"header__logo\">
            <Button abstract $main_href>
                <img class=\"header__logo-img\" src=\"/_resources/img/logo.svg\"/>
            </Button>
        </div>
        <input type=\"checkbox\" class=\"header__mobile-menu-button\"/>
        <div class=\"header__content\">
            <nav class=\"header__menu\">
                $menu
            </nav>
            <div class=\"header__contacts\">
                <div class=\"header__messengers\">
                    <Button abstract>    
                        <img class=\"header__social-img\" src=\"/_resources/img/telegram.svg\" />
                    </Button>
                    <Button abstract>
                        <img class=\"header__social-img\" src=\"/_resources/img/whatsapp.svg\" />
                </Button>
                </div>
                <Button small>+7 999 813-55-55</Button>
                <Button small action>Обратный звонок</Button>
            </div>
        </div>
        
    </header>
    ";
})
?>
