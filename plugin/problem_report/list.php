<? include "../../config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="<? echo $full_name; ?>">
	<link rel="stylesheet" href="../../stylesheet.css" media="screen, handheld" />
	<title>Problem Report − <? echo $full_name; ?></title>
</head>
<body style="width: 100%">
	<header><h1><a href="<? echo $root; ?>">Problem Report</a></h1></header>
	<section>
	<? if(isset($_GET['id']) && $types[$_GET['id']]['plugin'] == "problem_report")
	{
		// Connecting to MySQL database using PDO connector
		$strConnexion = "mysql:host=$host;dbname=$base";
		$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); // Bug in PHP 5.3
		$pdo = new PDO($strConnexion, $user, $password, $arrExtraParam);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		// Prepare the query
		$table = $types[$_GET['id']]['table'];
		$query = "SELECT * FROM $table";
	
		// Execute the query and fetch
		$list = $pdo->query($query)->fetchAll();

		?>
		<article id="list_view_ok">
			<h2>List View <a class="mono" href="view.php?id=<? echo $_GET['id']; ?>">[view details]</a> <a class="mono" href="edit.php?id=<? echo $_GET['id']; ?>">[edit]</a> <a class="mono" href="new.php?id=<? echo $_GET['id']; ?>">[new]</a></h2></h2>
			<table cellspacing="0" width="100%">
					<tr>
						<th>Number</th>
						<th>Type of Problem</th>
						<th>Action By</th>
						<th>Completion By</th>
						<th>Closed By</th>
						<th>Closed Date</th>
						<th>Customer</th>
					</tr>
				<? foreach($list as $line) { ?>
					<tr>
						<td><? echo $line['number']; ?> <a href="view.php?id=<? echo $_GET['id']; ?>&number=<? echo $line['number']; ?>"><img alt="view" src="<? echo $root; ?>imgs/magnifier.png" /></a> <a href="edit.php?id=<? echo $_GET['id']; ?>&number=<? echo $line['number']; ?>"><img alt="edit" src="<? echo $root; ?>imgs/pencil.png" /></a></td>
						<td><? echo $line['type_of_pb']; ?></td>
						<td><? echo $line['action_by']; ?></td>
						<td><? echo $line['completion_date']; ?></td>
						<td><? echo $line['closed_by']; ?></td>
						<td><? echo $line['closed_date']; ?></td>
						<td><? echo $line['customer']; ?></td>
					</tr>
				<? } ?>
			</table>
		</article>
	<? } else { ?>
		<article id="id_select">
			<h2>Select the database</h2>
			<p class="legend">Please select the table to be viewed…</p>
			<form method="GET" action="">
				<select name="id">
					<? foreach($types as $element) { 
						if ($element['plugin']=="problem_report") { ?>
							<option value="<? echo $element['id']; ?>"><? echo $element['name']; ?></option>
						<? }
					} ?>
				</select>
				<input type="submit" value="Ok">
			</form>
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
