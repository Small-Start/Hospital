var health=angular.module('health',['angular-loading-bar'])
health.controller('healthcontroller',function($scope,$http){
  
	 setTimeout(function(){
  $http.get("http://localhost/hospital/Primary-Hospital/tojson.php")
  .success(function (data) {
	
		$scope.data = data;
  console.log($scope.data)
 
  	  console.log(data[0].sreport);
    console.log(data[1].sreport);
  for(i=0;i<data.length;i++){
  	if(data[i].sreport==""){
  		 $scope.sreport="Pending";
  	}
  	
  	console.log(data[i].sreport);
  	if(data[i].sreport!=""){
	  	$scope.sreport=data[i].sreport;
	  	 	console.log($scope.sreport);
	
	  }
	  
	  console.log($scope.sreport);
  }
  
   });
},1000);

})