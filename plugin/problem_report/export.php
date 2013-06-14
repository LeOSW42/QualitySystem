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
	<header><h1>Export Database</h1></header>
	<section>
<?
$file = backup_tables($host,$user,$password,$base,$table);

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables)
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	$tables = is_array($tables) ? $tables : explode(',',$tables);
	
	//cycle through
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
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
	}
	
	//save file
	$file = 'backup/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql';
	$handle = fopen($file,'w+');
	fwrite($handle,$return);
	fclose($handle);
	return $file;
}

?>

		<article id="export_ok">
			<h2>The table is successfully exported !</h2>
			<p>Please download this file : <a href="<? echo $file; ?>"><? echo $file; ?></a></p>
		</article>
	</section>
	<footer>
		<p>
			<? echo $footer_content; ?><br />
			<small>Thanks ot David Walsh for his <a href="http://davidwalsh.name/backup-mysql-database-php">script</a></small>
		</p>
	</footer>
</body>
</html>
