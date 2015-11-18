var health=angular.module('health',[])
health.controller('healthcontroller',function($scope,$http){
  $http.get("http://localhost/hospital/tojson.php")
  .success(function (data) {$scope.data = data;
  console.log($scope.data)});
  
})