/* This script and many more are available free online at
The JavaScript Source!! http://www.javascriptsource.com
Created by: Jim Stiles | www.jdstiles.com */
function startCalc(){
  interval = setInterval("calc()",1);
}
function calc(){
  one = document.autoSumForm.total.value;
  two = document.autoSumForm.tendered.value; 
  three=(two * 1) - (one * 1);
  document.autoSumForm.change.value = three.toFixed(2);

  
}
function stopCalc(){
  clearInterval(interval);
}
function myFunction(){
	one = document.autoSumForm.total.value;
	document.autoSumForm.amount_due.value = one;
}
