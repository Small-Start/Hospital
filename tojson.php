<?php 
 session_start();
require_once("connectvars.php");
   // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['username'])) {
    if (isset($_COOKIE['username'])) {
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
 if (isset($_SESSION['username'])) {
 $name=$_SESSION['username'];
 }
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or
die('error connecting to MySql server');

$query = "SELECT * FROM patient_file WHERE ph_name='$name'";
$data = mysqli_query($dbc, $query);
$rows = array();
while($row = mysqli_fetch_assoc($data)) {
    $rows[] = $row;
}
print json_encode($rows);
mysqli_close($dbc);
?>

