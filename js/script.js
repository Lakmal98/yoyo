function viewForm(id) {
	document.getElementById(id).style.display="block";
}

function hideForm(id) {
	document.getElementById(id).style.display="none";
}

function signUp(){
	viewForm('signUp-box');
	hideForm('login-box');
	viewForm('login-btn');
	hideForm('signUp-btn');
}

function login(){
	viewForm('login-box');
	hideForm('signUp-box');
	viewForm('signUp-btn');
	hideForm('login-btn');
}