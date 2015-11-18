<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['username'])) {
    if (isset($_COOKIE['username'])) {
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
   if((!isset($_SESSION['username'])) && (!isset($_COOKIE['username'])))
  {
	  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login-main.php';
  header('Location: ' . $home_url);
  }
?>
<html>
<head>
	<title>Main page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<?php
if (isset($_SESSION['username'])) {
    echo '&#10084; <a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';
  }
  ?>
<div class="row">
<div class="col-md-offset-3 col-md-6">
<form role=" form">
  <div class="form-group">
    <label for="pid">Solution Report</label>
   
  </div>
  <div class="form-group">
    <label for="pname"><input type="file">Upload</label>
  
  </div>
  <div>
    <label><a href="#">Download</a></label>
   
  </div>
 
</form>
</div>
</div>
</body>
</html>