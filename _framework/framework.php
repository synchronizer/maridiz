
<?php 

function create_block($block_name, $block_function) {
    global $blocks;
    $blocks[$block_name] = $block_function;
}

function render($source = 'index.html') {

    $source = $_SERVER['DOCUMENT_ROOT'] .$_SERVER['REQUEST_URI'] . '/' . $source;
    global $blocks;
    global $settings;
    $settings = json_decode(file_get_contents("$_SERVER[DOCUMENT_ROOT]/_framework/settings.json"), true);
    $html = file_get_contents($source);

    $css_content_dev = '';
    $css_content_public = '';
    $js_content_dev = '';
    $js_content_public = '';

    global $src_path;
    global $build_path;
    $src_path = $_SERVER['DOCUMENT_ROOT'] . $settings['src'];
    $build_path = $_SERVER['DOCUMENT_ROOT'] . $settings['build'];
    

    
    $search_path = $src_path;
    while (count(glob("$search_path")) > 0) { 

        foreach(glob("$search_path/*.php") as $block)
        {
            include($block);
        }

        foreach(glob("$search_path/*.css") as $css_file)
        {
            $file_content = file_get_contents($css_file);
            if (!str_contains($file_content, 'no_load')) $css_content_dev .= "\n" .  $file_content;
            if (!str_contains($file_content, 'for_dev') && !str_contains($file_content, 'no_load')) $css_content_public .= "\n" .  str_replace('/_resources', "$settings[public_url]", $file_content);
        }

        foreach(glob("$search_path/*.js") as $js_file)
        {
            $file_content = file_get_contents($js_file);
            if (!str_contains($file_content, 'no_load')) $js_content_dev .= "\n{\n" .  $file_content . "\n}\n";
            if (!str_contains($file_content, 'for_dev') && !str_contains($file_content, 'no_load')) $js_content_public .= "\n" .  str_replace('/_resources', '', $file_content);
        }

        $search_path .= '/*';
    }

    // Removing comments in CSS
    // $css_content_dev = preg_replace('%\/\*(.|\n)*?\*\/%i', '', $css_content_dev);
    // $css_content_public = preg_replace('%\/\*(.|\n)*?\*\/%i', '', $css_content_public);

    // Removing comments in JS
    // $js_content_dev = preg_replace('%\/\/.*%i', '', $js_content_dev);
    // $js_content_public = preg_replace('%\/\/.*%i', '', $js_content_public);

    // Replacing spaces in attributes with %20
    $html = preg_replace('%="[^ "]*\K |\G(?!\A)[^ "]*\K %i', '%20', $html);
    $html = preg_replace("%='[^ ']*\K |\G(?!\A)[^ ']*\K %i", '%20', $html);

    // Removing double spaces
    $html = preg_replace("%\<[^ \>]*\K\s+|\G(?!\A)[^ \>]*\K\s+ %i", ' ', $html);

    
    foreach ($blocks as $key => $value) {
        $uppercase_block_name =  ucfirst($key);
        $html = str_replace("<$uppercase_block_name", "[[$uppercase_block_name", $html);
        $html = str_replace("</$uppercase_block_name", "[[/$uppercase_block_name", $html);
    }

    while (str_contains($html, "[[")) {
        
        $leftPart = strstr($html, '[[', true);

        $blockNameWithAtts = substr(strstr(strstr($html, '[['), '>', true), 2);

        $blockNameWithAtts = preg_replace('%="[^ "]*\K |\G(?!\A)[^ "]*\K %i', '%20', $blockNameWithAtts);
        $blockNameWithAtts = preg_replace("%='[^ ']*\K |\G(?!\A)[^ ']*\K %i", '%20', $blockNameWithAtts);
        $blockNameWithAtts = preg_replace("%\<[^ \>]*\K\s+|\G(?!\A)[^ \>]*\K\s+ %i", ' ', $blockNameWithAtts);
        
        $blockName = explode(' ', $blockNameWithAtts)[0];

        $blockNameWithAttsArray = explode(' ', $blockNameWithAtts);
        $atts = count($blockNameWithAttsArray) > 1 ? array_splice($blockNameWithAttsArray, 1) : Array();

        $newAtts = array();
        foreach ($atts as &$value) {
            $attributeArray = explode('=', $value);
            $key = $attributeArray[0];
            
            $newAtts[$key] = (count($attributeArray) > 1) ? str_replace('%20', ' ', $attributeArray[1]) : true;
            $newAtts[$key] = trim($newAtts[$key], "'\"");

            $newAtts[$key] = (gettype(json_decode($newAtts[$key])) == 'array') ? json_decode($newAtts[$key]) : $newAtts[$key];
        }

        $content = substr(strstr(strstr($html, "[[$blockNameWithAtts>"), "[[/$blockName>", true), strlen($blockNameWithAtts)+3);
        $content = (gettype(json_decode($content)) == 'array') ? json_decode($content) : $content;

        $rightPart = substr(strstr($html, "[[/$blockName" . ">"), strlen($blockName) + 4);

        if ($blocks && array_key_exists(lcfirst($blockName), $blocks)) {
            $result = $blocks[lcfirst($blockName)]($content, $newAtts);
        } else {
            $result = $content;
        }
        $html = $leftPart . $result . $rightPart;
        
        foreach ($blocks as $key => $value) {
            $uppercase_block_name =  ucfirst($key);
            $html = str_replace("<$uppercase_block_name", "[[$uppercase_block_name", $html);
            $html = str_replace("</$uppercase_block_name", "[[/$uppercase_block_name", $html);
        }
    }


    $html = str_replace('%20', ' ', $html);
    $html = preg_replace('%\n\s+\n%i', '', $html);

    $output_dev = str_replace('%css', "<style>$css_content_dev</style>", $html);
    $output_dev = str_replace('%js', "<script defer>$js_content_dev</script>", $output_dev);

    echo $output_dev;





    $html = file_get_contents($source);
    
    // Replacing spaces in attributes with %20
    $html = preg_replace('%="[^ "]*\K |\G(?!\A)[^ "]*\K %i', '%20', $html);
    $html = preg_replace("%='[^ ']*\K |\G(?!\A)[^ ']*\K %i", '%20', $html);

    // Removing double spaces
    $html = preg_replace("%\<[^ \>]*\K\s+|\G(?!\A)[^ \>]*\K\s+ %i", ' ', $html);

    
    foreach ($blocks as $key => $value) {
        $uppercase_block_name =  ucfirst($key);
        $html = str_replace("<$uppercase_block_name", "[[$uppercase_block_name", $html);
        $html = str_replace("</$uppercase_block_name", "[[/$uppercase_block_name", $html);
    }

    while (str_contains($html, "[[")) {
        
        $leftPart = strstr($html, '[[', true);

        $blockNameWithAtts = substr(strstr(strstr($html, '[['), '>', true), 2);

        $blockNameWithAtts = preg_replace('%="[^ "]*\K |\G(?!\A)[^ "]*\K %i', '%20', $blockNameWithAtts);
        $blockNameWithAtts = preg_replace("%='[^ ']*\K |\G(?!\A)[^ ']*\K %i", '%20', $blockNameWithAtts);
        $blockNameWithAtts = preg_replace("%\<[^ \>]*\K\s+|\G(?!\A)[^ \>]*\K\s+ %i", ' ', $blockNameWithAtts);
        
        $blockName = explode(' ', $blockNameWithAtts)[0];

        $blockNameWithAttsArray = explode(' ', $blockNameWithAtts);
        $atts = count($blockNameWithAttsArray) > 1 ? array_splice($blockNameWithAttsArray, 1) : Array();

        $newAtts = array();
        foreach ($atts as &$value) {
            $attributeArray = explode('=', $value);
            $key = $attributeArray[0];
            
            $newAtts[$key] = (count($attributeArray) > 1) ? str_replace('%20', ' ', $attributeArray[1]) : true;
            $newAtts[$key] = trim($newAtts[$key], "'\"");

            $newAtts[$key] = (gettype(json_decode($newAtts[$key])) == 'array') ? json_decode($newAtts[$key]) : $newAtts[$key];
        }

        $content = substr(strstr(strstr($html, "[[$blockNameWithAtts>"), "[[/$blockName>", true), strlen($blockNameWithAtts)+3);
        $content = (gettype(json_decode($content)) == 'array') ? json_decode($content) : $content;

        $rightPart = substr(strstr($html, "[[/$blockName" . ">"), strlen($blockName) + 4);

        if ($blocks && array_key_exists(lcfirst($blockName), $blocks)) {
            $result = $blocks[lcfirst($blockName)]($content, $newAtts);
        } else {
            $result = $content;
        }
        
        if (str_contains($blockNameWithAtts, 'for_dev')) {
            $html = $leftPart . $rightPart;
        } else {
            $html = $leftPart . $result . $rightPart;
        }
        
        
        
        foreach ($blocks as $key => $value) {
            $uppercase_block_name =  ucfirst($key);
            $html = str_replace("<$uppercase_block_name", "[[$uppercase_block_name", $html);
            $html = str_replace("</$uppercase_block_name", "[[/$uppercase_block_name", $html);
        }
    }


    $html = str_replace('%20', ' ', $html);
    $html = preg_replace('%\n\s+\n%i', '', $html);







    $output_public = str_replace('%css', "<link rel=\"stylesheet\" href=\"/style.css\">", $html);
    $output_public = str_replace('%js', "<script src=\"/script.js\"></script>", $output_public);
    $output_public = str_replace('="/', "=\"$settings[public_url]/", $output_public);
    $output_public = str_replace("url('/", "url('$settings[public_url]/", $output_public);
    $output_public = str_replace("url(/", "url($settings[public_url]", $output_public);

    file_put_contents($build_path . "/style.css", $css_content_public);
    file_put_contents($build_path . "/script.js", $js_content_public);
    

    $pathArr = explode('/', $_SERVER['REQUEST_URI']);
    array_shift($pathArr);
    $dirPath = $build_path;
    foreach ($pathArr as $key => $value) {
        $dirPath .= '/' . $value;
        if (!file_exists($dirPath)) {
            mkdir($dirPath);
        }
    }
    $savePath = "$build_path/$_SERVER[REQUEST_URI]";

    
    file_put_contents("$savePath/index.html", str_replace('/_resources', '', $output_public));

    recurseCopy(
        $_SERVER['DOCUMENT_ROOT'] . "/_resources",
        $build_path
    );

    return;

}

function defaultAtts($defaultAtts, $atts) {
    foreach ($defaultAtts as $key => $value) {
        if (!array_key_exists($key, $atts)) {
            $atts[$key] = $value;
        } elseif (gettype($value) == 'array' && gettype($atts[$key]) != 'array') {
            $atts[$key] = array();
        }
    }
    return $atts
    ;
}

function domAtts($atts) {
    $domAtts = '';
    foreach ($atts as $key => $value) {
        
        if (substr($key, 0, 4) == 'dom-') {
            $domKey = substr($key, 4);
            $domvalue = str_replace('"', '', $value);
            $domAtts .= " $domKey=\"$domvalue\"";
        }

        if ($key == 'overlay') {
            $domKey = 'data-overlay';
            $domvalue = str_replace('"', '', $value);
            $domAtts .= " $domKey=\"$domvalue\"";
        }

        if ($key == 'overlay-item') {
            $domKey = 'data-overlay-item';
            $domvalue = str_replace('"', '', $value);
            $domAtts .= " $domKey=\"$domvalue\"";
        }
    }

    return $domAtts;
}

// function mixClass($atts) {
//     $mix_cls = '';
//     foreach ($atts as $key => $value) {
        
//         if ($key == 'mix') {
//             $cls = str_replace('"', '', $value);
//             $mix_cls .= " $value";
//         }
//     }

//     return $mix_cls;
// }

function recurseCopy(
    string $sourceDirectory,
    string $destinationDirectory,
    string $childFolder = ''
): void {
    $directory = opendir($sourceDirectory);

    if (is_dir($destinationDirectory) === false) {
        mkdir($destinationDirectory);
    }

    if ($childFolder !== '') {
        if (is_dir("$destinationDirectory/$childFolder") === false) {
            mkdir("$destinationDirectory/$childFolder");
        }

        while (($file = readdir($directory)) !== false) {
            if ($file === '.' || $file === '..') {
                continue;
            }

            if (is_dir("$sourceDirectory/$file") === true) {
                recurseCopy("$sourceDirectory/$file", "$destinationDirectory/$childFolder/$file");
            } else {
                copy("$sourceDirectory/$file", "$destinationDirectory/$childFolder/$file");
            }
        }

        closedir($directory);

        return;
    }

    while (($file = readdir($directory)) !== false) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        if (is_dir("$sourceDirectory/$file") === true) {
            recurseCopy("$sourceDirectory/$file", "$destinationDirectory/$file");
        }
        else {
            copy("$sourceDirectory/$file", "$destinationDirectory/$file");
        }
    }

    closedir($directory);
}


?>