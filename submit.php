<?php
  session_start();
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
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
  if (isset($_SESSION['usermain'])) {

  }
$id = $_GET['id'];
require_once("connectvars.php");

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
or
die('error connecting to MySql server');

$query = "SELECT * FROM patient_file WHERE p_id='$id'";
$result = mysqli_query($dbc,$query)
or
die('Error querying to mysql server');
while ($row = mysqli_fetch_array($result)) { 

 

 if (isset($_POST['submit'])) {
	  $sreport = $_FILES['sreport']['name'];
    $sreport_type = $_FILES['sreport']['type'];
    $sreport_size = $_FILES['sreport']['size'];
	$comment=$_POST['comment'];
	$dname=$_POST['usr'];
	$ddept=$_POST['dr'];
	 if (!empty($sreport)) {
     
        if ($_FILES['sreport']['error'] == 0) {
          // Move the file to the target upload folder
          $target = 'mfiles/' . $sreport;
          if (move_uploaded_file($_FILES['sreport']['tmp_name'], $target)) {
            // Connect to the database
           

            // Write the data to the database
            $query1 = "UPDATE patient_file SET sreport='$sreport',status='Active',comment='$comment',d_name='$dname',ddept='$ddept',timestamp=NOW() WHERE p_id='$id' ";
            mysqli_query($dbc, $query1);

            // Confirm success with the user
            $query2 = "INSERT INTO doc_report(p_id,sreport,comment,d_name,ddept,timestamp) VALUES('$id','$sreport','$comment','$dname','$ddept',NOW())";
            mysqli_query($dbc, $query2);

            echo "Information is shared with the primary hospital";
            // Clear the score data to clear the form
    
            $sreport = "";

          
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }


      // Try to delete the temporary screen shot image file
      @unlink($_FILES['sreport']['tmp_name']);
    }
    else {
      
    }
	
 ?>
 <head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="w3.css">
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.backstretch.min.js"></script>
 </head>

 <style>
body {
    background-color: #CCCCCC;
    font-family: 'Montserrat', sans-serif;
}
.w3-container
{background-color:rgba(255, 255, 255, 0.49);}
.sessioncolor{
  color: #009688;
  font-weight: bolder;
  padding: 2%;
  margin:2%;
}
.text{
  margin:2%;
  padding:2%;
}
.w3-container {
    padding: 0px;
    background-color:white;
    padding: 1px;
}
a.pull-right {
    padding: 2%;
}
button#submit{
  padding: 2%;
  margin:3%;
}
label{
  padding: 2%;
  margin:2%;
}
.active{
  color:#337AB7;
  font-weight: bolder;
 }
  </style>
   <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">E-Village Aid</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://<?php echo DB_HOST;?>/Hospital/#">Home</a></li>
        <li><?php
if (isset($_SESSION['usermain'])) {
    echo '<a href="logoutmain.php" type="button" class="btn btn-sm">Log Out </a><div class="active">(' . $_SESSION['usermain'] . ')</div>';
  }
  ?></li> 
      </ul>
    </div>
  </div>
</nav>

<form   role=" form" enctype="multipart/form-data" method="post" action="">
  <div class="col-md-offset-3 col-md-6 w3-container">
<header class="w3-container w3-teal">
<h3 class="text-center ">Patient Details</h3>
</header>




<table class="w3-table w3-bordered w3-striped">
<thead>
<tr>
  <th>Patient Name</th>
  <th>Patient Id</th>
  <th> View Patient Report</th>
</tr>
</thead>
<tbody>
<tr>
  <td><?php echo $row['p_name'];?></td>
  <td><?php echo $row['ph_name'];?></td>
  <td><?php echo '<a href="' . 'files/' . $row['p_file'] . '" target="_blank" />view file</a>';?> </td>
  
</tr>

</tr>
</tbody>
</table>


<div class="w3-row-padding w3-margin-top">

<div class=" col-md-12 col-xs-12 col-sm-12 w3-full">
 
   
    
<h4>Advice Patient:</h4> <center><textarea name="comment" rows="5" ></textarea></center>


</div>
<div class=" col-md-12 col-xs-12 col-sm-12 w3-full">
 
   
    
<div class="form-group">
  <label for="usr"><h4>Doctor's Name:</h4></label>
  <input type="text" class="form-control" id="usr" name="usr">
</div>
<div class="form-group">
  <label for="dr"><h4>Doctor's Department:</h4></label>
  <input type="text" class="form-control" id="dr" name="dr">
</div>

</div>


</div>

<footer class="w3-container w3-teal w3-margin-top">


  <label for="sreport">UPLOAD:<input type="file" name="sreport" id="sreport"></label>

    <button class="pull-right btn btn-sucess" name="submit" id="submit">Submit</button>

</footer>

<?php
}
mysqli_close($dbc);
?>

</div>
</form>
<script>
 $.backstretch([
      "HOSPITALHEART_1stblue.jpg",
      "HOSPITALHEART1_midblue.jpg",
      "HOSPITALHEART1_lastblue.jpg"    
      ], {
        fade: 1050,
        duration: 500
    });

</script>
</body>
</html> 