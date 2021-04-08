<?php
require_once 'connection.php';
$dsn = "mysql:host=$host;dbname=$database";
$opt = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $password, $opt);
$input = json_decode(file_get_contents("php://input"), true);
$year_1 = $input['year_of_birth'];
$year_2 = $year_1 + 1;
$date_1 = (string)$year_1 . "-01-01";
$date_2 = (string)$year_2 . "-01-01";
$sql = 'SELECT * FROM users WHERE bdate >= ? AND bdate < ?';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $date_1);
$stmt->bindValue(2, $date_2);
$stmt->execute();
$row = $stmt->fetchAll();
echo json_encode($row);






/* $stmt = $pdo->query($sql);
$row = $stmt->fetchAll();
$count = count($row);
echo json_encode($row); */

/* if (trim($birth_data) == "") {
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
}  */