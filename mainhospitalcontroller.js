var health=angular.module('mainhospital',[])
health.controller('mainhospitalcontroller',function($scope,$http){
	 setTimeout(function(){
  $http.get("http://localhost/hospitalp/tojsonmain.php")
  .success(function (hospitaldata) {
	 
		$scope.hospitaldata = hospitaldata;
  console.log($scope.hospitaldata)});
},2000);
	  
	  
  
})