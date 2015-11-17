<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
	<title>Patient page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
<div class="row">
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
  <button class="btn btn-primary" type="submit" name='submit'>Upload</button>
  <button type="reset" class="btn btn-primary">Download</button>
</form>
</div>
</div>
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
            echo '<p><strong>Name:</strong> ' . $pid . '<br />';
            echo '<strong>Score:</strong> ' . $pname . '<br />';
            echo '<img src="' . 'files/' . $report . '" alt="Score image" /></p>';
             

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