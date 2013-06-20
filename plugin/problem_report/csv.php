<?
include "../../config.php";

// This file generate a CSV file containing all the database for one block

// Connecting to MySQL database using PDO connector
$strConnexion = "mysql:host=$host;dbname=$base";
$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); // Bug in PHP 5.3
$pdo = new PDO($strConnexion, $user, $password, $arrExtraParam);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// Prepare the query
$table= $types[$_GET['id']]['table'];
$query = "SELECT * FROM $table";

// Execute the query and fetch
$result = $pdo->query($query);
$num_rows = $result->rowCount();
$num_fields = $result->columnCount();
$result_f = $result->fetchAll();

// Create the CSV file headers
header("Content-Type: application/csv-tab-delimited-table");
header("Content-disposition: filename=table.csv");

if ($num_rows != 0) {
	// columns titles
	$i = 0;
	while ($i < $num_fields) {
		echo $result->getColumnMeta($i)['name'].";";
		$i++;
	}
	echo "\n";

	// content
	foreach ($result_f as $arrSelect) {
		foreach($arrSelect as $elem) {
			$elem = str_replace("\r", "", $elem);
			$elem = str_replace("\n", "\\n", $elem);
			echo "$elem;";
		}
		echo "\n";
	}
}

?>
