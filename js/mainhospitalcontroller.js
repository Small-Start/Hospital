var health=angular.module('mainhospital',[])
health.controller('mainhospitalcontroller',function($scope,$http){
	 setTimeout(function(){
  $http.get("http://localhost/hospital/Main-Hospital/tojsonmain.php")
  .success(function (hospitaldata) {
	 
		$scope.hospitaldata = hospitaldata;
  console.log($scope.hospitaldata)});
},2000);
	  
	  
  
})