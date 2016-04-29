
<html ng-app="indexapp">
<head >
	<title>Admin page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.backstretch.min.js"></script>
<script type="text/javascript" src="angular.min.js"></script>
<script type="text/javascript" src="angular-route.min.js"></script>

<script src="indexroute.js"></script>
<script src="app.js"></script>



</head>
<style>
body{
font-family: 'Montserrat', sans-serif;
}

.row-margins{
  margin:10%;
}
hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid black;
    width: 30%;
}
body{
  background-color:#CCCCCC;
}
.jumbotron{
  border-radius:5%;
  background-color:rgba(238, 238, 238, 0.53)
}
</style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">E-village Aid</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        
      </ul>
</nav>  
<body ng-controller="maincontroller" >
 <div>
  <div class="header"></div>
<div class="row-margins row">
  <div  class="jumbotron col-md-5 col-xs-12 col-sm-12">
    <div class="text-center row">
    <h2>Primary-Hospital</h2>
    <hr>
     </div>
     <div class="text-center row">
     <a type="button" href="#primary" class="btn btn-primary">Login</a>
     </div> 
  </div>
  <div class="col-md-2"></div>
  <div class="jumbotron col-md-5 col-xs-12 col-sm-12">
    <div class="text-center row">
    <h2>Main-Hospital</h2>
    <hr>
     </div>
     <div class="text-center row">
      <a type="button" href="#main" class="btn btn-primary">Login</a>
     </div> 
  </div>
</div>
</div>

</body>


