var indexapp= angular.module('indexapp',['ngRoute'])
indexapp.config(['$routeProvider',function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'main.html',
	     
	})
	.when('/primary',{
		templateUrl:'login-primary.php',
		
	})
	.when('/main',{
		templateUrl:'login-main.php',
	
	})
}]);