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










/*var form = document.querySelector('#myForm');

form.addEventListener('submit', function(evt){
	evt.preventDefault();

	var formData = {
		year_of_birth: document.querySelector('input[name="year_of_birth"].value')
	};
	var request = new XMLHttpRequest();

	request.addEventListener('load', function(){
		alert('Результат по вашему запросу.')
	});
	request.open('POST', '/check.php', true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencode; charset=UTF-8');
	request.send
}
)*/