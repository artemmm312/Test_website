<?php
require_once 'connection.php';
$dsn = "mysql:host=$host;dbname=$database";
$opt = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $password, $opt);
$birth_date = trim($_POST['year_of_birth']);
$sql = "SELECT * FROM users WHERE bdate LIKE '$birth_date%'";
$stmt = $pdo->query($sql);
$row = $stmt->fetchAll();
$count = count($row);
//print_r($row);
if ($_POST['year_of_birth'] == "") {
	echo "Введите год рождения!!!<a href='/Test_website/'>На главную</a>";
} else {
	if ($count > 0) {
		echo "<table border='1' cellspacing='0' width='50%'><tr><th>Id</th><th>first_name</th><th>last_name</th><th>bdate</th></tr>";
		foreach ($row as $key => $value) {
			echo "<tr>";
			foreach ($value as $data)
				echo "<td>" . $data . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<a href='/Test_website/'>На главную</a>";
	} else echo "Юзеров с таким годом рождения нет. <a href='/Test_website/'>На главную</a>";
}