"use strict";

const requestURL = 'check.php'

async function sendRequest(method, url, body = null) {
	const headers = {
		'Content-Type': 'application/json;charset=utf-8'
	}
	return fetch(url, {
		method: method,
		body: JSON.stringify(body),
		headers: headers
	}).then(async response => {
		if (response.ok) {
			return response.json()
		};
		return response.json().then(error => {
			const err = new Error('Что-то пошло не так');
			err.data = error;
			throw err
		})
	});
};

document.forms.Users.onsubmit = function (e) {
	e.preventDefault();
	let year = document.querySelector('input[name="year_of_birth"]').value;
	if (year == '') {
		alert("Введите год рождения!!!")
	} else {
		let body = {
			"year_of_birth": year
		};
		sendRequest('POST', requestURL, body)
			.then(data => {
				let div = document.querySelector('#request');
				if (data.length == 0) {
					div.innerHTML = `<a>"Юзеров с таким годом рождения нет."</a><a href='/Test_website/'>На главную</a>`;
				} else {
					let table = `<table border='1' cellspacing='0' width='50%'>
					<tr><th>Id</th><th>first_name</th><th>last_name</th><th>bdate</th></tr>`;

					for (let i = 0; i < data.length; i++) {
						table += "<tr></tr>";
						for (let j in data[i]) {
							table += `<td>${data[i][j]}</td>`;
						}
					}
					table += "</table>";
					div.innerHTML = table;
					document.body.insertAdjacentHTML("afterend", `<a href='/Test_website/'>На главную</a>`);
				}
			})
			.catch(err => console.log(err))
	};
}



//отправка json при помощи XHR
/* let servResponse = document.querySelector('#response');
document.forms.Users.onsubmit = function (e) {
	e.preventDefault();

	let xhr = new XMLHttpRequest();

	xhr.open("POST", "check.php");
	xhr.setRequestHeader("Content-type", "application/json");
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			servResponse.outerHTML = xhr.responseText
		}
	}

	let year = document.querySelector('input[name="year_of_birth"]').value;
	let data_years = JSON.stringify({
		"year_of_birth": year
	});

	xhr.send(data_years);
} */