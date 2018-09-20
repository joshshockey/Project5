"use strict";

var $ = function(id) {
    return document.getElementById(id);
};

var joinList = function() {
    var emailAddress1 = $("email_address1").value;
    var emailAddress2 = $("email_address2").value;
    var firstName = $("first_name").value;
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
	
	if (emailAddress2 == "") {
		$("email_address2").nextElementSibling.firstChild.nodeValue = "Valid email required";
		$("email_address2").focus();
		isValid = false;
    }
	
    else if (emailAddress2 != emailAddress1) {
    	$("email_address2").nextElementSibling.firstChild.nodeValue = "Email entries must match";
		$("email_address2").focus();
		isValid = false;
	}
	else {
		$("email_address2").nextElementSibling.firstChild.nodeValue = "";
	}
    if (firstName == "") {
    	$("first_name").nextElementSibling.firstChild.nodeValue = "First name is required.";
		$("first_name").focus();
		isValid = false;
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
