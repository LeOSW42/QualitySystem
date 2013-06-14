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
		if(!isset($_GET['number'])) { $number = 1; }
		else { $number = $_GET['number']; }

		$table = $types[$_GET['id']]['table'];
		$link = mysql_connect($host,$user,$password);
		mysql_select_db($base,$link);

		$query = mysql_query("SELECT * FROM `$table` WHERE number='$number'");
		$pr = mysql_fetch_array($query);

		if($pr['number'] != NULL)
		{
			?>
			<article id="view_ok">
				<div id="nav_buttons">
					<a href="view.php?id=<? echo $_GET['id']; ?>&number=<? echo $number-1; ?>"><img alt="Previous" src="<? echo $root; ?>imgs/prev.png" /></a> 
					<a href="view.php?id=<? echo $_GET['id']; ?>&number=<? echo $number+1; ?>"><img alt="Next" src="<? echo $root; ?>imgs/next.png" /></a>
				</div>
				<h2>Read Only Version <a class="mono" href="edit.php?id=<? echo $_GET['id']; ?>&number=<? echo $number; ?>">[edit]</a> <a class="mono" href="new.php?id=<? echo $_GET['id']; ?>">[new]</a></h2>
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
						<td colspan="2"><div class="title">Description and cause of the problem</div><? echo $pr['description']; ?></td>
					</tr>
					<tr>
						<td><div class="title">Auditee</div><? echo $pr['auditee']; ?></td>
						<td><div class="title">Auditor</div><? echo $pr['auditor']; ?></td>
					</tr>
					<tr>
						<td colspan="2"><div class="title">The problem analysis &amp; Action required to prevent reocurrence</div><? echo $pr['analysis']; ?></td>
					</tr>
					<tr>
						<td><div class="title">Action By</div><? echo $pr['action_by']; ?></td>
						<td><div class="title">Completion date</div><? echo $pr['completion_date']; ?></td>
					</tr>
					<tr>
						<td colspan="2"><div class="title">Action taken and result of CAR</div><? echo $pr['action_taken']; ?></td>
					</tr>
					<tr>
						<td><div class="title">Closed by</div><? echo $pr['closed_by']; ?></td>
						<td><div class="title">Closed date</div><? echo $pr['closed_date']; ?></td>
					</tr>
				</table>
			</article>
		<? } else { 
		$query = "SELECT * FROM `$table`";
		$list = mysql_query($query);
		?>
			<article id="view_number">
				<h2>Wrong number!</h2>
				<p class="legend">Please select a problem number bellow…</p>
				<form method="GET" action="">
					<select name="number">
						<? while ( $line = mysql_fetch_assoc($list) ) { ?>
							<option value="<? echo $line['number']; ?>"><? echo $line['number']; ?></option>
						<? } ?>
					</select>
					<input type="hidden" value="<? echo $_GET['id']; ?>" name="id">
					<input type="submit" value="Ok">
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