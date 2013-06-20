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
		// Connecting to MySQL database using PDO connector
		$strConnexion = "mysql:host=$host;dbname=$base";
		$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); // Bug in PHP 5.3
		$pdo = new PDO($strConnexion, $user, $password, $arrExtraParam);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		// Prepare the query
		$table = $types[$_GET['id']]['table'];
		$query = "UPDATE $table SET 
			date=?,
			customer=?,
			type_of_pb=?,
			description=?,
			auditee=?,
			auditor=?,
			analysis=?,
			action_by=?,
			completion_date=?,
			action_taken=?,
			closed_by=?,
			closed_date=?
			WHERE number=?";
		$prep = $pdo->prepare($query);
	
		// Associate the values and execute
		$prep->execute(array(
			$_POST['date'],
			$_POST['customer'],
			$_POST['type_of_pb'],
			$_POST['description'],
			$_POST['auditee'],
			$_POST['auditor'],
			$_POST['analysis'],
			$_POST['action_by'],
			$_POST['completion_date'],
			$_POST['action_taken'],
			$_POST['closed_by'],
			$_POST['closed_date'],
			$_POST['number'],));

		// Close
		$prep->closeCursor();
		$prep = NULL;		
		?>
			<article id="edit_submit">
				<p>That works - <a href="javascript:history.back()">Go back to the previous page</a></p>
			</article>
	<? } else if(isset($_GET['id']) && $types[$_GET['id']]['plugin'] == "problem_report")
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
			<article id="edit_ok">
				<div id="nav_buttons">
					<a href="edit.php?id=<? echo $_GET['id']; ?>&number=<? echo $number-1; ?>"><img alt="Previous" src="<? echo $root; ?>imgs/prev.png" /></a> 
					<a href="edit.php?id=<? echo $_GET['id']; ?>&number=<? echo $number+1; ?>"><img alt="Next" src="<? echo $root; ?>imgs/next.png" /></a>
				</div>
				<h2>Editable Version <a class="mono" href="view.php?id=<? echo $_GET['id']; ?>&number=<? echo $number; ?>">[view details]</a> <a class="mono" href="list.php?id=<? echo $_GET['id']; ?>">[list view]</a> <a class="mono" href="new.php?id=<? echo $_GET['id']; ?>">[new]</a></h2>
				<form action="" method="POST">
				<table cellspacing="5" width="100%">

					<tr>
						<td><div class="title">Type of Problem</div>
						<select name="type_of_pb">
<?						 foreach($type_of_pb_ddm as $item)
						{
							echo "\t\t\t\t\t\t\t<option value='$item'";
							if($item == $pr['type_of_pb']) { echo " selected"; }
							echo ">$item</option>\r\n";
						} ?>
						</select></td>
						<td><div class="title">Customer</div><input type="text" value="<? echo $pr['customer']; ?>" name="customer" /></td>
					</tr>
					<tr>
						<td rowspan="2" style="width: 50%;"><div class="title">Infos about date formatting</div>The dates format is strict, it must be YYYY-MM-DD</td>
						<td><div class="title">Number</div><input type="text" value="<? echo $pr['number']; ?>" name="number" readonly /></td>
					</tr>
					<tr>
						<td><div class="title">Date</div><input type="text" value="<? echo $pr['date']; ?>" name="date" /></td>
					</tr>
					<tr>
						<td colspan="2"><div class="title">Description and cause of the problem</div><textarea name="description"><? echo $pr['description']; ?></textarea></td>
					</tr>
					<tr>
						<td><div class="title">Auditee</div><input type="text" value="<? echo $pr['auditee']; ?>" name="auditee" /></td>
						<td><div class="title">Auditor</div>
						<select name="auditor">
<?						 foreach($auditor_ddm as $item)
						{
							echo "\t\t\t\t\t\t\t<option value='$item'";
							if($item == $pr['auditor']) { echo " selected"; }
							echo ">$item</option>\r\n";
						} ?>
						</select></td>
					</tr>
					<tr>
						<td colspan="2"><div class="title">The problem analysis &amp; Action required to prevent reocurrence</div><textarea name="analysis"><? echo $pr['analysis']; ?></textarea></td>
					</tr>
					<tr>
						<td><div class="title">Action By</div><input type="text" value="<? echo $pr['action_by']; ?>" name="action_by" /></td>
						<td><div class="title">Completion date</div><input type="text" value="<? echo $pr['completion_date']; ?>" name="completion_date" /></td>
					</tr>
					<tr>
						<td colspan="2"><div class="title">Action taken and result of CAR</div><textarea name="action_taken"><? echo $pr['action_taken']; ?></textarea></td>
					</tr>
					<tr>
						<td><div class="title">Closed by</div><input type="text" value="<? echo $pr['closed_by']; ?>" name="closed_by" /></td>
						<td><div class="title">Closed date</div><input type="text" value="<? echo $pr['closed_date']; ?>" name="closed_date" /></td>
					</tr>
				</table>
				<br /><input type="submit" value="Save changes" name="submit" />
				</form>
			</article>
		<? } else { 
		// Make the query
		$table = $types[$_GET['id']]['table'];
		$query = "SELECT * FROM $table";
		$data = $pdo->query($query);
		$list = $data->fetchAll();
		?>
			<article id="edit_number">
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

