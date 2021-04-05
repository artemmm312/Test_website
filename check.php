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
$sql_2 = "SELECT COUNT(*) FROM users WHERE bdate LIKE '$birth_date%'";
$stmt_2 = $pdo->query($sql_2);
$count = $stmt_2->fetchColumn();

if ($_POST['year_of_birth'] == "") {
	echo "Введите год рождения!!!<a href='/Test_website/'>На главную</a>";
} else {
	if ($count > 0) {
		if ($stmt) {
			echo "<table border='1' cellspacing='0' width='50%'><tr><th>Id</th><th>first_name</th><th>last_name</th><th>bdate</th></tr>";
			while ($row = $stmt->fetch()) {
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>", "<td>" . $row['first_name'] . "</td>", "<td>" . $row['last_name'] . "</td>", "<td>" . $row['bdate'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			echo "<a href='/Test_website/'>На главную</a>";
		}
	} else echo "Юзеров с таким годом рождения нет. <a href='/Test_website/'>На главную</a>";
}
?>