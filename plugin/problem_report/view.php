<? include "../../config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="<? echo $full_name; ?>">
	<link rel="stylesheet" href="../../stylesheet.css" media="screen, handheld" />
	<title>Problem Report − <? echo $full_name; ?></title>
</head>
<body>
	<header><h1><a href="<? echo $root; ?>">Problem Report</a></h1></header>
	<section>
	<? if(isset($_GET['id']) && $types[$_GET['id']]['plugin'] == "problem_report")
	{
		// Take the good number
		if(!isset($_GET['number'])) { $number = 1; }
		else { $number = $_GET['number']; }

		// Connecting to MySQL database using PDO connector
		$strConnexion = "mysql:host=$host;dbname=$base";
		$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); // Bug in PHP 5.3
		$pdo = new PDO($strConnexion, $user, $password, $arrExtraParam);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		// Prepare the query
		$table = $types[$_GET['id']]['table'];
		$query = "SELECT * FROM $table WHERE number=?";
		$prep = $pdo->prepare($query);
	
		// Associate the values and execute
		$prep->bindValue(1, $number, PDO::PARAM_INT);
		$prep->execute();

		// Fetch and close
		$pr = $prep->fetch();
		$prep->closeCursor();
		$prep = NULL;

		if($pr['number'] != NULL)
		{
			?>
			<article id="view_ok">
				<div id="nav_buttons">
					<a href="view.php?id=<? echo $_GET['id']; ?>&number=<? echo $number-1; ?>"><img alt="Previous" src="<? echo $root; ?>imgs/prev.png" /></a> 
					<a href="view.php?id=<? echo $_GET['id']; ?>&number=<? echo $number+1; ?>"><img alt="Next" src="<? echo $root; ?>imgs/next.png" /></a>
				</div>
				<h2>Read Only Version <a class="mono" href="edit.php?id=<? echo $_GET['id']; ?>&number=<? echo $number; ?>">[edit]</a> <a class="mono" href="list.php?id=<? echo $_GET['id']; ?>">[list view]</a> <a class="mono" href="new.php?id=<? echo $_GET['id']; ?>">[new]</a></h2>
				<table cellspacing="5" width="100%">
					<tr>
						<td><div class="title">Type of Problem</div><? echo $pr['type_of_pb']; ?></td>
						<td><div class="title">Customer</div><? echo $pr['customer']; ?></td>
					</tr>
					<tr>
						<td class="noborder">&nbsp;</td>
						<td><div class="title">Number</div><? echo $pr['number']; ?></td>
					</tr>
					<tr>
						<td class="noborder">&nbsp;</td>
						<td><div class="title">Date</div><? echo $pr['date']; ?></td>
					</tr>
					<tr>
						<td colspan="2"><div class="title">Description and cause of the problem</div><pre><? echo $pr['description']; ?></pre></td>
					</tr>
					<tr>
						<td><div class="title">Auditee</div><? echo $pr['auditee']; ?></td>
						<td><div class="title">Auditor</div><? echo $pr['auditor']; ?></td>
					</tr>
					<tr>
						<td colspan="2"><div class="title">The problem analysis &amp; Action required to prevent reocurrence</div><pre><? echo $pr['analysis']; ?></pre></td>
					</tr>
					<tr>
						<td><div class="title">Action By</div><? echo $pr['action_by']; ?></td>
						<td><div class="title">Completion date</div><? echo $pr['completion_date']; ?></td>
					</tr>
					<tr>
						<td colspan="2"><div class="title">Action taken and result of CAR</div><pre><? echo $pr['action_taken']; ?></pre></td>
					</tr>
					<tr>
						<td><div class="title">Closed by</div><? echo $pr['closed_by']; ?></td>
						<td><div class="title">Closed date</div><? echo $pr['closed_date']; ?></td>
					</tr>
				</table>
			</article>
		<? } else {

		// Make the query
		$table = $types[$_GET['id']]['table'];
		$query = "SELECT * FROM $table";
		$data = $pdo->query($query);
		$list = $data->fetchAll();
		?>
			<article id="view_number">
				<h2>Wrong number!</h2>
				<p class="legend">Please select a problem number bellow…</p>
				<form method="GET" action="">
					<select name="number">
						<? foreach($list as $line) { ?>
							<option value="<? echo $line['number']; ?>"><? echo $line['number']; ?></option>
						<? } ?>
					</select>
					<input type="hidden" value="<? echo $_GET['id']; ?>" name="id">
					<input type="submit" value="Ok">
					or add a <a href="new.php?id=<? echo $_GET['id']; ?>">[new]</a> problem report
				</form>
			</article>
		<? }
	} else { ?>
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
			<? echo $footer_content; ?>
		</p>
	</footer>
</body>
</html>
