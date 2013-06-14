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
	<header><h1><a href="<? echo $root; ?>"><? echo $full_name; ?></a></h1></header>
	<section>
		<? foreach($types as $element) { 
			include_once "plugin/".$element['plugin']."/index.php";
			$function_name = "displayIndexElement_" . $element['plugin'];
			print $function_name($element, $root);
		} ?>
	</section>
	<footer>
		<p>
			<? echo $footer_content; ?><br />
			<small>Icons under <a href="http://creativecommons.org/licenses/by/2.5/">CC-By 2.5</a> by <a href="http://famfamfam.com/lab/icons/silk/">FamFamFam</a></small>
		</p>
	</footer>
</body>
</html>
