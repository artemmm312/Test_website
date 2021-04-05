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
			const e = new Error('Что-то пошло не так');
			e.data = error;
			throw e
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
				let servResponse = document.querySelector('#request');
				if (data.length == 0) {
					servResponse.outerHTML = `<a>"Юзеров с таким годом рождения нет."</a><a href='/Test_website/'>На главную</a>"`;
				} else {
					servResponse.outerHTML = `
					<table class="users" border='1' cellspacing='0' width='50%'><tr><th>Id</th><th>first_name</th><th>last_name</th><th>bdate</th></tr></table>
					`;
					document.body.insertAdjacentHTML("afterend", `<a href='/Test_website/'>На главную</a>`);

					let table = document.querySelector('.users');

					function creatTable(table, data) {
						for (let i = 0; i < data.length; i++) {
							let object = data[i];
							let row = document.createElement('tr');
							for (let key in object) {
								/* let banner = document.createElement('th');
								banner.innerHTML = key;
								row.appendChild(banner); */
								let value = object[key];
								let cell = document.createElement('td');
								cell.innerHTML = value;
								row.appendChild(cell);
							}
							table.appendChild(row);
						}
					}
					creatTable(table, data)
				}
			})
			.catch(err => console.log(err))
	};
}



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



/* let servResponse = document.querySelector('#response');

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
};*/