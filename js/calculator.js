 
 
var $ = function(id) {
	return document.getElementById(id);
};		

var calculateMpg = function(miles, gallons) {
	var mpg = (miles / gallons);
	mpg = mpg.toFixed(1);
	return mpg;
};

var processEntries = function() {
	var miles = parseFloat($("miles").value);
	var gallons = parseFloat($("gallons").value);

	if (isNaN(miles) ||  miles <= 0) {				
		alert("Miles must be numeric and greater than zero");
		$("miles").focus();
	} else if (isNaN(gallons)|| gallons <= 0) {
		alert("Gallons must be numeric and greater than zero");
		$("gallons").focus();
	}
	else {
		$("mpg").value = calculateMpg(miles, gallons);
	}
};
var clearEntries = function(miles, gallons, mpg) {
	document.getElementById("miles").value = "";
	document.getElementById("gallons").value = "";
	document.getElementById("mpg").value = "";
	
}
window.onload = function() {
	$("calculate").onclick = processEntries;
	$("miles").focus();
	$("clear").onclick = clearEntries;
};