<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-92649184-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-92649184-1');
        </script>
        <title>Antoine Viau, Senior Architect / Software Engineer Freelance</title>
        <meta charset="utf-8" />
        <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="Antoine Viau, Senio Architect / Software Engineer Freelance" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <?=isset($argv[1]) && $argv[1] == 'build' ? ' <!-- ' : '';?>
        <link rel="stylesheet" group href="./assets/css/unify-core.css">
        <link rel="stylesheet" group href="./assets/css/unify-components.css">
        <link rel="stylesheet" group href="./assets/css/unify-globals.css">
        <link rel="stylesheet" group href="./custom.css">
        <?=isset($argv[1]) && $argv[1] == 'build' ? ' --> ' : '';?>
        <?=isset($argv[1]) && $argv[1] == 'build' ? 'include-css-here' : '';?>
        <style>
            @media print
            {
                @page { margin: 0; }
                body { margin: 1.6cm; }
                .no-print, .no-print * { display: none !important; }
                .page-break { page-break-after: always; }
                a {
                    text-decoration: none !important;
                    color: black !important;
                }
                section.g-brd-bottom { border-bottom: none !important; }
            }
        </style>
    </head>
    <body>
        <main class="g-pt-50">
            <?php
$json = file_get_contents(__DIR__ . "/menu.json");
$menu = json_decode($json);
require '010-header.html';
section('intro', '', '015-intro.html', -1);
foreach ($menu as $idx => $item) {
    section($item->id, $item->label, $item->file, $idx, $item->addClasses);
}
?>
            <footer class="g-bg-gray-dark-v1 g-color-white-opacity-0_8 g-py-20 no-print">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 text-center text-md-left g-mb-15 g-mb-0--md">
                            <div class="d-lg-flex">
                                <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md">2019 © All Rights Reserved.</small>
                            </div>
                        </div>
                        <div class="col-md-4 align-self-center">
                        </div>
                    </div>
                </div>
            </footer>
        </main>
    </body>
</html>
<?php
function section($id, $title, $file, $idx, $addClasses = '')
{
    $clazzes = 'g-pb-30 g-brd-gray-light-v1 g-brd-bottom ';
    $clazzes .= ' ' . $addClasses . ' ';
    $clazzes .= $idx % 2 != 0 ? ' g-bg-graylight-radialgradient-ellipse ' : ' g-bg-secondary ';
    echo '<section id="' . $id . '" class="' . $clazzes . '">';
    if ($title) {
        echo '<div class="g-max-width-550 text-center mx-auto g-pt-60 g-pb-30">';
        echo "<h1 class='h1'><strong>$title</strong></h1>";
        echo "</div>";
    }
    require $file;
    echo '</section>';
}
?>