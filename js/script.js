function _(id) {
	return document.getElementById(id);
}
function viewForm(id) {
	_(id).style.display="block";
}

function hideForm(id) {
	_(id).style.display="none";
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

function signupValidate() {
	let pass = _('pass').value;
	let passConfirm = _('passConfirm').value;
	if (pass!=passConfirm) {
		_('signUp').style.borderColor = 'red';
		_('signUp').disabled = true;
		_('errorMsg').innerHTML = "Password confirmation failed";
	} else {
		_('signUp').style.borderColor = 'green';
		_('signUp').disabled = false;
		_('errorMsg').innerHTML = "";
	}
}