<? include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="<? echo $full_name; ?>">
	<link rel="stylesheet" href="stylesheet.css" media="screen, handheld" />
	<title><? echo $full_name; ?></title>
</head>
<body>
	<header><h1><? echo $full_name; ?></h1></header>
	<section>
		<? foreach($types as $element) { ?>
		<article id="<? echo $element['id']; ?>">
			<h2><? echo $element['name']; ?></h2>
			<p>
				<a <? if(!file_exists("readonly/".$element['id'].".".$element['extension_readonly'])) { echo 'style="opacity: 0.4;" '; } ?>class="dl_readonly" href="readonly/<? echo $element['id']; ?>.<? echo $element['extension_readonly']; ?>">Read only version</a>
				<a <? if(!file_exists("editable/".$element['id'].".".$element['extension_editable'])) { echo 'style="opacity: 0.4;" '; } ?>class="dl_editable" href="editable/<? echo $element['id']; ?>.<? echo $element['extension_editable']; ?>">Editable version</a>
				<a class="upload" href="publish.php?id=<? echo $element['id']; ?>">Publish a new version</a>
			</p>
		</article>
		<? } ?>
	</section>
	<footer>
		<p>
			<? echo $footer_content; ?><br />
			<small>Icons under <a href="http://creativecommons.org/licenses/by/2.5/">CC-By 2.5</a> by <a href="http://famfamfam.com/lab/icons/silk/">FamFamFam</a></small>
		</p>
	</footer>
</body>
</html>
