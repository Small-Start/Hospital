<html>
<head>
	<title>Patient page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

  
  

  
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
    <label for="pid">Patient id:</label>
     <input type="text" class="form-control" id="pid" name="pid">
  </div>
  <div class="form-group">
    <label for="pname">Patient Name:</label>
    <input type="text" class="form-control" id="pname" name="pname">
  </div>
  <div>
   <label for="report">Patient Reports:</label>
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

    if (!empty($pid) && !empty($pname) && !empty($report)) {
     
        if ($_FILES['report']['error'] == 0) {
          // Move the file to the target upload folder
          $target = 'files/' . $report;
          if (move_uploaded_file($_FILES['report']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect('localhost','root', '', 'healthcare');

            // Write the data to the database
            $query = "INSERT INTO patient_file VALUES ( '$pid', '$pname', '$report')";
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
      echo '<p class="error">Please enter all of the information to add your high score.</p>';
    }
  
?>

</body>
</html>