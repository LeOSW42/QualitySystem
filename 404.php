<? include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="<? echo $full_name; ?>">
	<link rel="stylesheet" href="/stylesheet.css" media="screen, handheld" />
	<title>404 Error - <? echo $full_name; ?></title>
</head>
<body>
	<header><h1><? echo $full_name; ?></h1></header>
	<section>
		<article id="404">
			<h2>Error 404</h2>
			<p>The file you are looking does not exist, please upload the first version <a href="/publish.php">here</a> or go back to <a href="/index.php">home</a>.</p>
		</article>
	</section>
	<footer>
		<p>
			<? echo $footer_content; ?><br />
		</p>
	</footer>
</body>
</html>
