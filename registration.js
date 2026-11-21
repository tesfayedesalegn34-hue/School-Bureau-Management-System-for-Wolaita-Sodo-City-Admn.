function validateForm() {
    var x = document.forms["myForm"]["Fname"].value;
    if (x == "") {
        alert("Please enter first name");
        return false;
    }
	var x = document.forms["myForm"]["Lname"].value;
    if (x == "") {
        alert("Please enter last name");
        return false;
    }
		var x = document.forms["myForm"]["MNum"].value;
    if (x == "") {
        alert("Please enter your mobile number");
        return false;
    }
		var x = document.forms["myForm"]["email"].value;
    if (x == "") {
        alert("Please enter email");
        return false;
    }
	var x = document.forms["myForm"]["Upload-Resum[]"].value;
    if (x == "") {
        alert("Please please upload the file");
        return false;
    }
}