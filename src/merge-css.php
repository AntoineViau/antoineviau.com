<?php
echo "Merge CSS files in $argv[2] to $argv[3]\n";
$workingDir = $argv[1];
echo "Working dir: " . $workingDir . "\n";
$html = file_get_contents($argv[2]);

$cssContent = "";
preg_match_all('/group href="(.+)\.css"/i', $html, $matches);
foreach ($matches[1] as $css) {
    $srcFileName = $css . ".css";
    $cssContent .= file_get_contents($workingDir . '/' . $srcFileName) . "\n\n\n";
}
file_put_contents($argv[3], $cssContent);
