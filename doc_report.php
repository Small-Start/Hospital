<?php
 require_once("connectvars.php");
 $p_id="";
 $p_id=$_GET['p_id'];
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or
die('error connecting to MySql server');

$query = "SELECT * FROM doc_report WHERE p_id='$p_id' ORDER BY timestamp DESC";
$data = mysqli_query($dbc, $query);
$rows = array();
while($row = mysqli_fetch_assoc($data)) {
    $rows[] = $row;
}
print json_encode($rows);
mysqli_close($dbc);
?>

