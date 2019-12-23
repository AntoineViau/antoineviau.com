<?php
$base64 = base64_encode(file_get_contents(__DIR__ . '/assets/img/moi-micro.jpg'));
$json = file_get_contents(__DIR__ . "/skills.json");
$domains = json_decode($json);
$json = file_get_contents(__DIR__ . "/projects.json");
$projects = json_decode($json);
$json = file_get_contents(__DIR__ . "/experiences.json");
$xps = json_decode($json);
usort($xps, "xpsSort");
function xpsSort($a, $b)
{
    return $a->start < $b->start;
}
$json = file_get_contents(__DIR__ . "/confs.json");
$confs = json_decode($json);
usort($confs, "confsSort");
function confsSort($a, $b)
{
    return $a->date < $b->date;
}

$json = file_get_contents(__DIR__ . "/perso.json");
$persos = json_decode($json);
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
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
		<style type="text/css">
			body {
				margin: 1cm;
			}
			a {
				text-decoration: none !important;
				color: black !important;
			}
			.photo {
				width: 4cm !important;
			}
		</style>
	</head>
	<body>
		<div class="container ">
			<!-- --------------------------------------------------------------------------- -->
			<div class="row g-mb-30 g-pb-10 g-brd-bottom g-brd-1 g-brd-gray-light-v1">

				<div class="col-md-7">
					<h3 class="h3 g-mb-15">
					<a class="u-link-v5 g-color-gray-dark-v2 g-color-primary--hover" href="#">
						Antoine Viau<br />
						Senior Architecte / Software Engineer<br />
					</a>
					</h3>
					<div class="media g-font-size-12 g-color-gray-dark-v4 g-mb-0">
						<div class="media-body">
						</div>
					</div>
					<p>
						+33 6 14 49 64 03<br />
						contact@antoineviau.com<br />
						<a href="https://www.linkedin.com/in/antoine-viau-6ba9b610">
							https://www.linkedin.com/in/antoine-viau-6ba9b610
						</a>
					</p>
				</div>
<!-- 				<div class="col-md-5">
					Ingénieur diplômé de l'école d'ingénieurs du Cnam spécialité Architecture et ingénierie des systèmes et des logiciels<br />
					<br />
					Certifié Amazon Web Services Solutions Architect (2019)<br />
					<br />
					Anglais : capacité professionnelle complète, TOEIC 975/995.
				</div>
 -->				<div class="col-md-5 text-right">
					<img
					class="img-fluid w-50 g-mb-20 g-mb-0--md photo"
					src="data:image/jpeg;base64, <?=$base64;?>" alt="Antoine Viau">
				</div>
			</div>



			<!-- --------------------------------------------------------------------------- -->
			<div class="row">
				<div class="col-md-6 g-brd-right g-brd-1 g-brd-gray-light-v1">

					<div class="skills">
					<h3 class="h3 g-mb-15">Compétences</h3>
					<?php
foreach ($domains as $domain) {
    echo '<div class="domain g-mb-10">';
    echo '<h4 class="h5 g-font-weight-600">' . $domain->label . '</h4>';
    $technos = [];
    foreach ($domain->technos as $techno) {
        $technos[] = '<span class="g-mb-20 g-font-weight-600">' . $techno->label . '</span>';
    }
    echo join(", ", $technos);
    echo '</div>';
}
?>
</div>

<div class="diplomes g-mb-10">
<h3 class="h3 g-mb-15">Diplômes & Certifications</h3>
					Ingénieur diplômé de l'école d'ingénieurs du Cnam spécialité Architecture et ingénierie des systèmes et des logiciels<br />
					<br />
					Certifié Amazon Web Services Solutions Architect (2019)<br />
					<br />
					Anglais : capacité professionnelle complète, TOEIC 975/995.

</div>

<div class="confs g-mb-10">
<h3 class="h3 g-mb-15">Conférences</h3>
    <?php

foreach ($confs as $idx => $conf) {
    $year = substr($conf->date, 0, 4);
    echo "<div>";
    echo $year . ' - ' . $conf->title;
    echo "</div>";
}
?>
</div>

<div class="projets g-mb-10">
<h3 class="h3 g-mb-15">Projets</h3>
<div class="g-mb-10 g-font-weight-600">
	Github : <a href="https://github.com/AntoineViau">https://github.com/AntoineViau</a>
</div>

<?php
foreach ($projects as $project) {
    echo '<div class="">' . $project->title . '</div>';
}
?>
</div>


<div class="perso">
<h3 class="h3 g-mb-15">Activités</h3>
<?php
foreach ($persos as $perso) {
    echo "<strong>$perso->title</strong> : $perso->text<br >";
}
?>
</div>


</div>





				<div class="col-md-6">
					<h3>Expériences</h3>
	<?php
foreach ($xps as $idx => $xp) {
    xp1($xp, $idx);
}
?>
				</div>



			</div>
		</div>
	</body>
</html>


<?php

function xp1($xp, $idx)
{
    $startYear = substr($xp->start, 0, 4);
    $startMonth = substr($xp->start, 5, 2);
    $endYear = substr($xp->end, 0, 4);
    $endMonth = substr($xp->end, 5, 2);
    $textAlign = ($idx % 2 == 0 ? 'text-right' : 'text-left');

    if ($startYear < 2004) {
        return;
    }

    echo '<div class=" g-mb-15 ' . $textAlign . '" style="">';
    echo <<<EOT
		<div class="">
			<h2 class="h5 u-heading-v4__title g-mb-10"><strong>$xp->title</strong></h2>
			<div class=""><strong>$xp->client</strong>, du $startMonth/$startYear au $endMonth/$endYear </div>
		</div>
EOT;
    echo '<div class="' . $textAlign . '">';
    foreach ($xp->technos as $tidx => $techno) {
        techno($techno);
    }
    echo '</div>';
    echo '</div>';
}

function techno($techno)
{
    echo '<a href="#" class="btn btn-sm  g-letter-spacing-0_5 text-uppercase ">';
    echo $techno;
    echo '</a>';
}

?>
