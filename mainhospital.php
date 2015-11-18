<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['usermain'])) {
    if (isset($_COOKIE['usermain'])) {
      $_SESSION['usermain'] = $_COOKIE['usermain'];
    }
  }
   if((!isset($_SESSION['usermain'])) && (!isset($_COOKIE['usermain'])))
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
if (isset($_SESSION['usermain'])) {
    echo '&#10084; <a href="logoutmain.php">Log Out (' . $_SESSION['usermain'] . ')</a>';
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