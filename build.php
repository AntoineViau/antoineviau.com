<?php


if ($argv[1] === 'merge') {
    echo "Merge\n";
    $workingDir = $argv[2];
    echo "Working dir: ".$workingDir."\n";
    $html = file_get_contents($argv[3]);
    
    $cssContent = "";
    preg_match_all('/group href="(.+)\.css"/i', $html, $matches);
    foreach ($matches[1] as $css) {
        $srcFileName = $css.".css";
        $cssContent .= file_get_contents($workingDir.'/'.$srcFileName)."\n\n\n";
    }
    file_put_contents('./dist/index.css', $cssContent);
}

if ($argv[1] === 'include-css') {
    echo "Include-css\n";
    $html = file_get_contents('./dist/index.html');
    $html = str_replace(
        'include-css-here',
        '<style "text/css">'.file_get_contents('./dist/index.min.css').'</style>',
        $html
    );
    file_put_contents('./dist/index.html', $html);
}
