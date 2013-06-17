<? include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="<? echo $full_name; ?>">
	<link rel="stylesheet" href="<? echo $root; ?>stylesheet.css" media="screen, handheld" />
	<title>404 Error - <? echo $full_name; ?></title>
</head>
<body>
	<header><h1><a href="<? echo $root; ?>"><? echo $full_name; ?></a></h1></header>
	<section>
		<article id="404">
			<h2>Error 404</h2>
			<p>The file you are looking does not exist, please upload the first version <a href="<? echo $root; ?>plugin/files/publish.php">here</a> or go back to <a href="/index.php">home</a>.</p>
		</article>
	</section>
	<footer>
		<p>
			<? echo $footer_content; ?><br />
		</p>
	</footer>
</body>
</html>
