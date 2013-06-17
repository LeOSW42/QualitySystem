<?

include "../../config.php";

$link = mysql_connect($host,$user,$password);
mysql_select_db($base,$link);

$table= $types[$_GET['id']]['table'];
$resQuery = mysql_query("SELECT * FROM $table");

header("Content-Type: application/csv-tab-delimited-table");
header("Content-disposition: filename=table.csv");

if (mysql_num_rows($resQuery) != 0) {
 // columns titles
 $fields = mysql_num_fields($resQuery);
 $i = 0;
 while ($i < $fields) {
  echo mysql_field_name($resQuery, $i).";";
  $i++;
 }
 echo "\n";

 // content
 while ($arrSelect = mysql_fetch_array($resQuery, MYSQL_ASSOC)) {
  foreach($arrSelect as $elem) {
   echo "$elem;";
  }
  echo "\n";
 }
}

?>
