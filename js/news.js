"use strict";

var $ = function(id) {
    return document.getElementById(id);
};

var joinList = function() {
     var emailAddress1 = $("email_address1").value;
     var isValid = true;
     
      // validate the entries(new additions)
    if (emailAddress1 == "") {
		$("email_address1").nextElementSibling.firstChild.nodeValue = "Valid email required";	
		$("email_address1").focus();
		isValid = false;
	}
	else {
		$("email_address1").nextElementSibling.firstChild.nodeValue = "";
	}
	// submit the form if all entries are valid
    // otherwise, display an error message
    if (isValid) {
        $("email_form").submit(); 
    }
};

window.onload = function() {
    $("join_list").onclick = joinList;
    $("email_address1").focus();
};
