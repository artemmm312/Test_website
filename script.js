"use strict";

let servResponse = document.querySelector('#response');

document.forms.Users.onsubmit = function (e) {
	e.preventDefault();

	let xhr = new XMLHttpRequest();

	xhr.open('POST', 'check.php', true);

	let formDate = new FormData(document.forms.Users);

	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			servResponse.outerHTML = xhr.responseText;
		}
	}
	xhr.send(formDate);
};