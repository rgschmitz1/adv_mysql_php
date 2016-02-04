function validateForm() {
	var checkbox = document.getElementById("termsAndConditions");

	if(!checkbox.checked) {
		var currentClass = document.getElementById("termsAndConditionsContainer").className;
		document.getElementById("termsAndConditionsContainer").className = currentClass + " has-error";
		return false;
	} else {
		//conditional submit
		//if the password was entered -> send the user to validate.php
		//else send the user to cubsStink.php
		var passwordField = document.getElementById("password");
		if(passwordField.value.length == 0) {
			document.getElementById("newUserForm").action = "cubsStink.php";
		}

		return true;
	}
}
