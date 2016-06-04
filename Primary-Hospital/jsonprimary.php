<?php 
require_once("connectvars.php");
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or
die('error connecting to MySql server');
$query ="SELECT * FROM user_primary";
$data = mysqli_query($dbc, $query);
$rows = array();
while($row = mysqli_fetch_assoc($data)) {
    $rows[] = $row;
}
print json_encode($rows);
mysqli_close($dbc);
?>



