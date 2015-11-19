
<html ng-app="health">

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
	  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login-primary.php';
  header('Location: ' . $home_url);
  }
?>
<head>
  <style>
 .box-shadow{
  box-shadow:0 0 10px 0 rgba(0,0,0,.10);
  height:200px;
  margin:1%;
  padding:6%;
 }
  </style>
	<title>Patient page</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="angular.min.js"></script>
<script type="text/javascript" src="app.js"></script>
</head>
<body ng-controller="healthcontroller">


   <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>

      <li>   <a type="button" data-toggle="modal" data-target="#myModal">Register</a>


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p><div class="row">
<div class="col-md-offset-3 col-md-6">
<form  enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="form-group">
    <label for="pid"><h4>Patient id:</h4></label>
     <input type="text" class="form-control" id="pid" name="pid">
  </div>
  <div class="form-group">
    <label for="pname"><h4>Patient Name:</h4></label>
    <input type="text" class="form-control" id="pname" name="pname">
  </div>
  <div>
   <label for="report"><h4>Patient Reports:</h4></label>
	<input type="file" id="report" name="report">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Upload</button>
  <button type="submit" class="btn btn-primary">Download</button>
</form>
</div>
</div></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btn-lg" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  </li>
         <li> <?php
if (isset($_SESSION['username'])) {
    echo  '<a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a>';
  }
  ?> </li>
      </ul>
    </div>
  </div>
</nav>
  
   <div style="margin-top:2%"class="row"></div>
<?php
 

  if (isset($_POST['submit'])) {
    // Grab the score data from the POST
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
  $report = $_FILES['report']['name'];
    $report_type = $_FILES['report']['type'];
    $report_size = $_FILES['report']['size'];
$hname=	$_SESSION['username'];

    if (!empty($pid) && !empty($pname) && !empty($report)) {
     
        if ($_FILES['report']['error'] == 0) {
          // Move the file to the target upload folder
          $target = 'files/' . $report;
          if (move_uploaded_file($_FILES['report']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect('localhost','root', '', 'healthcare');

            // Write the data to the database
            $query = "INSERT INTO patient_file VALUES ( '$pid', '$pname', '$report','$hname')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Thanks for adding your new high score! It will be reviewed and added to the high score list as soon as possible.</p>';
            echo '<p><strong>ID:<strong> ' . $pid . '<br />';
            echo '<strong>Name:</strong> ' . $pname . '<br />';
            echo '<a href="' . 'files/' . $report . '" target="_blank" />view file</a></p>';
             

            // Clear the score data to clear the form
            $pid = "";
            $pname  = "";
            $report = "";

            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }


      // Try to delete the temporary screen shot image file
      @unlink($_FILES['report']['tmp_name']);
    }
    else {
      
    }
  
?>
<div ng-repeat="name in data " class=" row">
  
    <div class="col-md-4 col-xs-12 col-sm-12"></div>
   <div class="col-md-4 col-xs-12 col-sm-12 box-shadow">
    <div class="row">
     <div class="col-md-6 col-xs-12 col-sm-12">Patient Id</div>
      <div class="col-md-6 col-xs-12 col-sm-12">{{name.p_id}}</div>
    </div>
  <div class="row">
     <div class="col-md-6 col-xs-12 col-sm-12">Patient Name</div>
      <div class="col-md-6 col-xs-12 col-sm-12">{{name.p_name}}</div>
    </div>
  <div class="row">
     <div class="col-md-6 col-xs-12 col-sm-12">Patient Report</div>
      <div class="col-md-6 col-xs-12 col-sm-12"><a href="files/{{name.p_file}}" target="_blank">{{name.p_file}}</a></div>
    </div>
  
   </div>
<div class="col-md-4"></div>
 
</div>
</body>
</html>