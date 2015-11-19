var indexapp= angular.module('indexapp',['ngRoute'])
indexapp.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'main.html',
		controller:'maincontroller'
	     
	})
	.when('/primary',{
		templateUrl:'login-primary.php',
		
	})
	.when('/main',{
		templateUrl:'login-main.php',
	
	})
}]);

indexapp.controller('maincontroller',function($scope,$interval,$apply){

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