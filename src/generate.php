<?php
require_once __DIR__ . '/../vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader);

$json = file_get_contents(__DIR__ . "/menu.json");
$menu = json_decode($json);

$photo = base64_encode(file_get_contents(__DIR__ . '/assets/img/moi-micro.jpg'));

$json = file_get_contents(__DIR__ . "/skills.json");
$domains = json_decode($json);

$json = file_get_contents(__DIR__ . "/confs.json");
$confs = json_decode($json);
usort($confs, "confsSort");
function confsSort($a, $b)
{
    return $a->date < $b->date;
}
foreach ($confs as $conf) {
    $conf->picture = base64_encode(file_get_contents(__DIR__ . '/assets/img/confs/' . $conf->picture));
}

$json = file_get_contents(__DIR__ . "/experiences.json");
$xps = json_decode($json);
usort($xps, "xpsSort");
function xpsSort($a, $b)
{
    return $a->start < $b->start;
}

$json = file_get_contents(__DIR__ . "/diplomes.json");
$diplomes = json_decode($json);

$json = file_get_contents(__DIR__ . "/projects.json");
$projects = json_decode($json);
foreach ($projects as $project) {
    $project->picture = base64_encode(file_get_contents(__DIR__ . '/assets/img/projects/' . $project->picture));
}

$json = file_get_contents(__DIR__ . "/perso.json");
$persos = json_decode($json);

echo $twig->render('index.html.twig', [
    'build' => isset($argv[1]) && $argv[1] == 'build',
    'photo' => $photo,
    'menu' => $menu,
    'domains' => $domains,
    'confs' => $confs,
    'xps' => $xps,
    'diplomes' => $diplomes,
    'projects' => $projects,
    'persos' => $persos,
]);
