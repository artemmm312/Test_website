<?php
require_once 'connection.php';
$dsn = "mysql:host=$host;dbname=$database";
$opt = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $password, $opt);
//$birth_date = trim($_POST['year_of_birth']);
$input = json_decode(file_get_contents("php://input"), true);
$birth_data = (int)$input['year_of_birth'];
//$birth_data = (int)$birth->year_of_birth;
$sql = "SELECT * FROM users WHERE bdate LIKE '$birth_data%'";
$stmt = $pdo->prepare($sql);
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