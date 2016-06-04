var indexapp= angular.module('indexapp',['ngRoute','angular-loading-bar'])
indexapp.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'Main-Hospital/main.php',
		controller:'maincontroller'
	     
	})
	.when('/primary',{
		templateUrl:'Primary-Hospital/login-primary.php',
		controller:'primarycontroller'
	})
	.when('/main',{
		templateUrl:'Main-Hospital/login-main.php',
	    controller:'indexcontroller'
	})
}]);

indexapp.controller('maincontroller',function($scope){

	/*$apply(){
		 $interval(function select(style){
		 	$scope.style={'background-color':'red'}
        if($scope.style={'background-color':'red'}){
        	 console.log($scope.style);
        	 $scope.style={'background-color':'green'};
        	
        }

 
      
    },1000);}
      
  */       
         	         
});
indexapp.controller('indexcontroller',function($scope,$http){
  $http.get("http://localhost/hospital/Main-Hospital/jsonmain.php")
  .success(function (data) {$scope.data = data;
  console.log($scope.data)});
  
});
indexapp.controller('primarycontroller',function($scope,$http){
  $http.get("http://localhost/hospital/Primary-Hospital/jsonprimary.php")
  .success(function (data) {$scope.data = data;
  console.log($scope.data)});
  
})
