<?php

$base64 = base64_encode(file_get_contents(__DIR__ . '/assets/img/moi-micro.jpg'));

echo <<<EOT
<div class="container g-pt-30">
	<div class="row g-mb-30">
		<div class="col-md-7 align-self-center">
			<h3 class="h3 g-mb-15">
			<a class="u-link-v5 g-color-gray-dark-v2 g-color-primary--hover" href="#">
				xxAntoine Viau<br />
				Senior Architecte / Software Engineer<br />
				Freelance
			</a>
			</h3>
			<div class="media g-font-size-12 g-color-gray-dark-v4 g-mb-20">
				<div class="media-body align-self-center">
				</div>
			</div>
			<p class="text-justify no-print">
				Je suis avant tout passionné par mon métier. Mon récent domaine d'expertise était essentiellement Angular, mais je ne me limite pas au front-end.<br />
				Mes compétences sont full-stack et architecturales, tant pour des startups, que pour des grands groupes.<br />
				J'ai une approche <strong>craftmanship</strong> : j'aime délivrer du bon et beau code et mettre en place des architectures logiciels et ops qui soient bien construites. Je crois en la qualité comme gage de pérennité et je cherche constamment à m'améliorer, notamment en travaillant avec d'autres (je suis adepte du peer-programming).<br />
				Par ailleurs, j'ai plaisir à faire des <a href="#confs">talks</a> sur des sujets techniques. Je suis donc ouvert aux offres de meetups et conférences.
			</p>
			<p>
				+33 6 14 49 64 03<br />
				contact@antoineviau.com<br />
				<a href="https://www.linkedin.com/in/antoine-viau-6ba9b610">
					https://www.linkedin.com/in/antoine-viau-6ba9b610
				</a><br />
				<a href="cv-antoine-viau.pdf" class="btn btn-md u-btn-indigo g-mr-10 g-mb-15 g-mt-15 no-print">CV au format PDF</a>
				<a href="cv-antoine-viau-one-page.pdf" class="btn btn-md u-btn-indigo g-mr-10 g-mb-15 g-mt-15 no-print">CV Une Page au format PDF</a>
			</p>
		</div>
		<div class="col-md-5 text-center g-pt-100">
			<img
			class="img-fluid w-70 g-mb-20 g-mb-0--md"
			src="data:image/jpeg;base64, <?=$base64;?>" alt="Antoine Viau">
		</div>
	</div>
</div>
EOT;
