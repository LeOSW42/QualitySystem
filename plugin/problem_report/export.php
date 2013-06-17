<? include "../../config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="<? echo $full_name; ?>">
	<link rel="stylesheet" href="../../stylesheet.css" media="screen, handheld" />
	<title>Export database − <? echo $full_name; ?></title>
</head>
<body>
	<header><h1><a href="<? echo $root; ?>">Export Database</a></h1></header>
	<section>
	<? if(isset($_GET['id']) && $types[$_GET['id']]['plugin'] == "problem_report")
	{
		/* backup the db OR just a table */
		function backup_tables($host,$user,$pass,$name,$tables)
		{

			$link = mysql_connect($host,$user,$pass);
			mysql_select_db($name,$link);

			$result = mysql_query('SELECT * FROM '.$tables);
			$num_fields = mysql_num_fields($result);

			$return = 'DROP TABLE '.$tables.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$tables));
			$return.= "\n\n".$row2[1].";\n\n";

			for ($i = 0; $i < $num_fields; $i++) 
			{
				while($row = mysql_fetch_row($result))
				{
					$return.= 'INSERT INTO '.$tables.' VALUES(';
					for($j=0; $j<$num_fields; $j++) 
					{
						$row[$j] = addslashes($row[$j]);
						$row[$j] = ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			}
			$return.="\n\n\n";

			//save file
			$file = 'backup/'.(md5($tables)).'-'.time().'.sql';
			$handle = fopen($file,'w+');
			fwrite($handle,$return);
			fclose($handle);
			return $file;
		}

		$file = backup_tables($host,$user,$password,$base,$types[$_GET['id']]['table']);

		?>
		<article id="export_ok">
			<h2>The table is successfully exported !</h2>
			<p>Please download this file : <a href="<? echo $file; ?>"><? echo $file; ?></a></p>
			<br />
			<p><i><small>You also can download the content of the database <a href="csv.php?id=<? echo $_GET['id']; ?>">here</a> in CSV format, which can be opened with many Calc (separator: ;)</small></i></p>
		</article>
	<? } else { ?>
		<article id="id_select">
			<h2>Select the database</h2>
			<p class="legend">Please select the table to be exported…</p>
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
			<small>Thanks to David Walsh for his <a href="http://davidwalsh.name/backup-mysql-database-php">script</a> and to ComScript for their <a href="http://www.comscripts.com/sources/php.export-csv.102.html">script</a></small>
		</p>
	</footer>
</body>
</html>
