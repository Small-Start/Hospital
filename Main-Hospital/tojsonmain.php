<?php 
session_start();
require_once("connectvars.php");
   // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['usermain'])) {
    if (isset($_COOKIE['usermain'])) {
      $_SESSION['usermain'] = $_COOKIE['usermain'];
    }
  }
 if (isset($_SESSION['usermain'])) {
 $name=$_SESSION['usermain'];
 }
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or
die('error connecting to MySql server'); 

$query = "SELECT * FROM patient_file WHERE ph_name IN(SELECT username FROM user_primary WHERE mhosname='$name') ORDER BY ph_name DESC";
$data = mysqli_query($dbc, $query);
$rows = array();
while($row = mysqli_fetch_assoc($data)) {
    $rows[] = $row;
}
print json_encode($rows);
mysqli_close($dbc);
?>

