<?php

    echo "<code>BUILD</code>";
    $search_path = $_SERVER['DOCUMENT_ROOT'];
    while (count(glob("$search_path")) > 0) { 

        foreach(glob("$search_path/*.php") as $block)
        {
           if (!str_contains($block, '_framework') && !str_contains($block, '_build.php')) {
            $path =  str_replace($_SERVER['DOCUMENT_ROOT'], '', $block);
            $re = '/[^\\\\\/]*$/';
            $subst = "";
            $result = preg_replace($re, $subst, $path, 1);

            echo '<br><code>' . $result . "</code>";
            echo "
                <iframe
                    style=\"position: absolute; opacity: 0;\"
                    id=\"$result\"
                    title=\"Inline Frame Example\"
                    width=\"150\"
                    height=\"100\"
                    src=\"$result\">
                    </iframe>
                ";
           }
        }
        $search_path .= '/*';
    }
?>