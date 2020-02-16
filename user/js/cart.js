function _(id) {
	return document.getElementById(id);
}

function clickThis(id) {
	_(id).click();
}

function cardValidate() {
	let name = _('cName').value;
	let num = _('cNum').value;
	let year = _('cYear').value;
	let month = _('cMonth').value;
	let ccv = _('ccv').value;
	let valid = false;

	if (name.length >= 3) {
		_('cName').style.borderColor = "green";
		valid = true;
	} else {
		_('cName').style.borderColor = "darkred";
		valid = false;
	}

	if (num.length == 16) {
		_('cNum').style.borderColor = "green";
		valid = true;
	} else {
		_('cNum').style.borderColor = "darkred";
		valid = false;
	}

	if (year>=2020 && year<=2028) {
		_('cYear').style.borderColor = "green";
		valid = true;
	} else {
		_('cYear').style.borderColor = "darkred";
		valid = false;
	}

	if (month>=1 && month<=12) {
		_('cMonth').style.borderColor = "green";
		valid = true;
	} else {
		_('cMonth').style.borderColor = "darkred";
		valid = false;
	}

	if (ccv.length == 3 && ccv>=0 && ccv<999) {
		_('ccv').style.borderColor = "green";
		valid = true;
	} else {
		_('ccv').style.borderColor = "darkred";
		valid = false;
	}

	if (valid==true) {
		_('purchace').disabled = false;
		_('purchace').style.backgroundColor = "green";
	} else {
		_('purchace').disabled = true;
		_('purchace').style.backgroundColor = "gray";
	}
} 

function closePayment() {
	_('payment-window').style.display = "none";
}