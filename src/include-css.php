<?php

$htmlFile = $argv[1];
echo "Include-css in $htmlFile\n";
$html = file_get_contents($htmlFile);
$html = str_replace(
    'include-css-here',
    '<style "text/css">' . file_get_contents('./dist/index.min.css') . '</style>',
    $html
);
file_put_contents($htmlFile, $html);
