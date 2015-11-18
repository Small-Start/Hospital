
function isEven(number){

	if(number>0){
	return isEven(number-2);
}
	

	if(number==0){
		console.log("number is even");
	}
	else{
		console.log("number is odd");
	}}
isEven(190);
