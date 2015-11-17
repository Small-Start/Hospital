<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <body>
<?php 
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$database = "healthcare"; 

$linkID = mysql_connect($host, $user, $pass) or die("Could not connect to host."); 
mysql_select_db($database, $linkID) or die("Could not find database."); 

$query = mysql_query("SELECT * FROM patient_file");
$rows = array();
while($row = mysql_fetch_assoc($query)) {
    $rows[] = $row;
}
print json_encode($rows);
?>
</body>
</head>
</html>