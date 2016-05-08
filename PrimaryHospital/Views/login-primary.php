<?php
 // Start the session
  session_start();
 // Clear the error message
  $error_msg = "";
// If the user isn't logged in, try to log them in
  if (!isset($_SESSION['username'])) {
    if (isset($_POST['submit'])) {
      // Connect to the database
      $dbc = mysqli_connect('localhost','root','','healthcare');

      // Grab the user-entered log-in data
      $user_username = $_POST['hospitalid'];
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['hospitalpass']));

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        $query = "SELECT username FROM user_primary WHERE username = '$user_username' AND password = '$user_password'";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['username'] = $row['username'];
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/patient.php';
          header('Location: ' . $home_url);
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
		  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/../../#/primary';
          header('Location: ' . $home_url);
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
		 $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/../../#/primary';
          header('Location: ' . $home_url);
      }
    }
  }
  else{
	  echo "session is created";
	  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/patient.php';
          header('Location: ' . $home_url);
  }
?>
<html>
<head>
	<title>Admin page</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

</head>
<style>
form.ng-pristine.ng-valid{
  padding:4%;
  margin:12%;
  background-color:rgba(70, 49, 49, 0.06);
}
</style>
<body>
<?php
  // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
  if (empty($_SESSION['username'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>
<div class="row">
<div class="col-md-offset-3 col-md-6">
<form role=" form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <label for="login"><h3>Login-Village</h3></label>
   
  </div>
  <div class="form-group">
      <label for="mainid"></label>
    <select class="form-control"  id="hospitalid" name="hospitalid">
    <option ng-repeat="hospital in data" value="{{hospital.username}}">{{hospital.username}}</option>
    </select>
     <label for="hospitalpass"></label><input placeholder="password" type="password" class="form-control" name="hospitalpass" id="hospitalpass">
       </div>
  <div>
    
   <button type="submit" class="btn btn-primary" name="submit">Login</button>
     
  
  </div>
 
</form>
</div>
</div>
<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>
</body>
</html>