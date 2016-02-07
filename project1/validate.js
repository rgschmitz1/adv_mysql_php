function validateForm() {
	var checkbox = document.getElementById("agree");

	if(!checkbox.checked) {
		var currentClass = document.getElementById("agreeContainer").className;
		document.getElementById("agreeContainer").className = currentClass + " has-error";
		return false;
	}
}
