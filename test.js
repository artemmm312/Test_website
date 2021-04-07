"use strict";

let users = [
	{
		name: 'name1',
		surname: 'surname1',
		patronymic: 'patronymic1'
	},
	{
		name: 'name2',
		surname: 'surname2',
		patronymic: 'patronymic2'
	},
	{
		name: 'name3',
		surname: 'surname3',
		patronymic: 'patronymic3'
	},
];

let div = document.querySelector('#request')
let table = "<table  border='1' cellspacing='0' width='50%'>";
for (let i = 0; i < users.length; i ++){
	table += "<tr></tr>"
	for (let j in users[i]){
		table += `<td>${users[i][j]}</td>`;
	}
}
table += "</table>"
div.innerHTML = table
