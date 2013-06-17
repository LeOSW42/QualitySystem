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
	<? if(isset($_GET['id']) && $types[$_GET['id']]['plugin'] == "problem_report" && isset($_POST['submit']))
	{
		$table = $types[$_GET['id']]['table'];
		$link = mysql_connect($host,$user,$password);
		mysql_select_db($base,$link);

		mysql_query("INSERT $table SET number='".$_POST['number']."',date='".$_POST['date']."',customer='".$_POST['customer']."',type_of_pb='".$_POST['type_of_pb']."',description='".$_POST['description']."',auditee='".$_POST['auditee']."',auditor='".$_POST['auditor']."',analysis='".$_POST['analysis']."',action_by='".$_POST['action_by']."',completion_date='".$_POST['completion_date']."',action_taken='".$_POST['action_taken']."',closed_by='".$_POST['closed_by']."',closed_date='".$_POST['closed_date']."'");
		
			?>
			<article id="new_submit">
				<p><a href="javascript:history.back()">Go back to the previous page</a></p><br />
				<p>Debug info - SQL query:<br />
				<span class="mono"><? echo "INSERT $table SET number='".$_POST['number']."',date='".$_POST['date']."',customer='".$_POST['customer']."',type_of_pb='".$_POST['type_of_pb']."',description='".$_POST['description']."',auditee='".$_POST['auditee']."',auditor='".$_POST['auditor']."',analysis='".$_POST['analysis']."',action_by='".$_POST['action_by']."',completion_date='".$_POST['completion_date']."',action_taken='".$_POST['action_taken']."',closed_by='".$_POST['closed_by']."',closed_date='".$_POST['closed_date']."'"; ?></span></p>
			</article>
	<? } else if(isset($_GET['id']) && $types[$_GET['id']]['plugin'] == "problem_report")
	{
		$table = $types[$_GET['id']]['table'];
		$link = mysql_connect($host,$user,$password);
		mysql_select_db($base,$link);

		$query = mysql_query("SELECT `number` FROM `$table` ORDER BY `$table`.`number` DESC LIMIT 1");
		$pr = mysql_fetch_array($query);
		?>
		<article id="new_ok">
			<h2>Add a problem <a class="mono" href="view.php?id=<? echo $_GET['id']; ?>">[view details]</a> <a class="mono" href="list.php?id=<? echo $_GET['id']; ?>">[list view]</a> <a class="mono" href="edit.php?id=<? echo $_GET['id']; ?>">[edit]</a></h2></h2>
			<form action="" method="POST">
			<table cellspacing="5" width="100%">
				<tr>
					<td><div class="title">Type of Problem</div><input type="text" value="" name="type_of_pb" /></td>
					<td><div class="title">Customer</div><input type="text" value="" name="customer" /></td>
				</tr>
				<tr>
					<td rowspan="2" style="width: 50%;"><div class="title">Infos about date formatting</div>The dates format is strict, it must be AAAA-MM-DD</td>
					<td><div class="title">Number</div><input type="text" value="<? echo $pr['number']+1; ?>" name="number" readonly /></td>
				</tr>
				<tr>
					<td><div class="title">Date</div><input type="text" value="AAAA-MM-DD" name="date" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="title">Description and cause of the problem</div><textarea name="description"></textarea></td>
				</tr>
				<tr>
					<td><div class="title">Auditee</div><input type="text" value="" name="auditee" /></td>
					<td><div class="title">Auditor</div><input type="text" value="" name="auditor" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="title">The problem analysis &amp; Action required to prevent reocurrence</div><textarea name="analysis"></textarea></td>
				</tr>
				<tr>
					<td><div class="title">Action By</div><input type="text" value="" name="action_by" /></td>
					<td><div class="title">Completion date</div><input type="text" value="AAAA-MM-DD" name="completion_date" /></td>
				</tr>
				<tr>
					<td colspan="2"><div class="title">Action taken and result of CAR</div><textarea name="action_taken"></textarea></td>
				</tr>
				<tr>
					<td><div class="title">Closed by</div><input type="text" value="" name="closed_by" /></td>
					<td><div class="title">Closed date</div><input type="text" value="AAAA-MM-DD" name="closed_date" /></td>
				</tr>
			</table>
			<br /><input type="submit" value="Save changes" name="submit" />
			</form>
		</article>
	<? } else { ?>
		<article id="id_select">
			<h2>Select the database</h2>
			<p class="legend">Please select the table…</p>
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

