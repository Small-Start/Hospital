<?php
header("Cache-Control: private, must-revalidate, max-age=0");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  require_once("connectvars.php");
  ?>
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
	  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/#';
  header('Location: ' . $home_url);
  }
?>
<head>
  <style>
 .box-shadow{
  box-shadow:0 0 10px 0 rgba(0,0,0,.40);
  height:auto;
  margin:1%;
  padding:2%;
 }
 .textarea{
  margin:1%;
  padding:1%;
 }
 .btn-primary{
  margin:5%;
 }
 body{
font-family: 'Montserrat', sans-serif;
}
.patient_info{
  margin:2%;
  padding:1%;
}
.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group{
  font-size:20px;
}
  </style>
	<title>Patient page</title>

<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../js/angular.min.js"></script>
<script type="text/javascript" src="../js/app.js"></script>
<link rel="stylesheet" type="text/css" href="../angular-loader/build/loading-bar.css">
<script type="text/javascript" src="../angular-loader/build/loading-bar.js"></script>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
</head>

<body ng-controller="healthcontroller">

 
   <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">E-Village Aid</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://<?php echo DB_HOST;?>/Hospital/#">Home</a></li>

      <li>   <a type="button" style="cursor:pointer;" data-toggle="modal" data-target="#myModal">Register</a>


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
  <div class="form-group">
    <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
<label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>

  </div>
   <div class="form-group">
    <label for="dob"><h4>Date Of Birth:</h4></label>
    <input type="text" class="form-control" id="dob" name="dob" />
  </div>
  <div class="form-group">
    <label for="dis"><h4>Disease:</h4></label>
    <input type="text"  id="dis" name="dis" />
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
  <form class=" navbar-form " role="search">
                <div class="col-md-offset-4 col-md-4 input-group">
                    <input type="text" class="form-control" ng-model="patient" placeholder="Search this site">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
   <div style="margin-top:2%"class="row"></div>
<?php
 

  if (isset($_POST['submit'])) {
    // Grab the score data from the POST
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
	$gender= $_POST['gender'];
	$dob= $_POST['dob'];
	$dis= $_POST['dis'];
  $report = $_FILES['report']['name'];
    $report_type = $_FILES['report']['type'];
    $report_size = $_FILES['report']['size'];
	$status="Pending";
$hname=	$_SESSION['username'];
     if (!empty($pid) && !empty($pname) && !empty($report) && !empty($gender)&& !empty($dob) && !empty($dis)) {
     
        if ($_FILES['report']['error'] == 0) {
          // Move the file to the target upload folder
          $target = 'files/' . $report;
          if (move_uploaded_file($_FILES['report']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or
die('error connecting to MySql server');


            // Write the data to the database
            $query = "INSERT INTO patient_file(p_id,p_name,gender,dob,disease,p_file,ph_name,status) VALUES ( '$pid', '$pname','$gender','$dob','$dis', '$report','$hname','$status')";
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
<div ng-repeat="name in data|filter:patient " class="row patient_info">
  
    <div class="col-md-4 col-xs-12 col-sm-12"></div>
   <div class="col-md-4 col-xs-12 col-sm-12 box-shadow">
    <div class="row">
     <div class="col-md-6 col-xs-12 col-sm-12"><h4>Patient Id</h4></div>
      <div class="col-md-6 col-xs-12 col-sm-12">{{name.p_id}}</div>
    </div>
  <div class="row">
     <div class="col-md-6 col-xs-12 col-sm-12"><h4>Patient Name</h4></div>
      <div class="col-md-6 col-xs-12 col-sm-12">{{name.p_name}}</div>
    </div>
  <div class="row">
     <div class="col-md-6 col-xs-12 col-sm-12"><h4>Patient Report</h4></div>
      <div class="col-md-6 col-xs-12 col-sm-12"><a href="files/{{name.p_file}}" target="_blank">{{name.p_file}}</a></div>
    </div>
  
  <div class="row">
     <div class="col-md-6 col-xs-12 col-sm-12" ><h4>Status</h4></div>
      <div class="col-md-6 col-xs-12 col-sm-12" ><a href="files/{{name.sreport}}" target="_blank">{{name.status}}</a></div>
    </div>
    <div class="row">
     <div class="textarea text-center col-md-12 col-xs-12 col-sm-12" ><h4>Doctors Advice For You:</h4></div>
   </div>
  
      <div class=" textarea text-center col-md-12 col-xs-12 col-sm-12" >{{name.comment}}</div>
      <div class="row">
         <?php
  echo '<a  type="button"class="btn btn-primary" href="submitp.php?id=' . "{{name.p_id}}".'"><h5>Add Report</h5></a><BR/>';
  ?>
      </div>
    </div>
 
<div class="col-md-4"></div>
 
</div>
</body>
</html>
