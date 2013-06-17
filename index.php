<? 
//	Created by Léo SERRE and under WTF License
//	Please read the config.php file to understand where the variables comes from
//	This is not a powerful war engine, only a simple website for small to medium companies

include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Head of the page -->
	<meta charset="utf-8" />
	<meta name="description" content="<? echo $full_name; ?>">
	<link rel="stylesheet" href="stylesheet.css" media="screen, handheld" />
	<title><? echo $full_name; ?></title>
</head>
<body>
	<!-- Header displayed, link to index page and Name of the company -->
	<header><h1><a href="<? echo $root; ?>"><? echo $full_name; ?></a></h1></header>
	<section id="homepage">
		<? foreach($types as $element) { // For all the blocks diplayed on the index page, in order to create one line per block
			include_once "plugin/".$element['plugin']."/index.php"; // Include the file containing the generating function of each plugin
			$function_name = "displayIndexElement_" . $element['plugin'];
			print $function_name($element, $root); // Display the block
		} ?>
	</section>
	<!-- Footer of the page -->
	<footer>
		<p>
			<? echo $footer_content; ?><br />
			<small>Icons under <a href="http://creativecommons.org/licenses/by/2.5/">CC-By 2.5</a> by <a href="http://famfamfam.com/lab/icons/silk/">FamFamFam</a></small>
		</p>
	</footer>
</body>
</html>
