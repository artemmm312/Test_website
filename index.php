<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<?php
	require_once 'connection.php';
	$dsn = "mysql:host=$host;dbname=$database";
	$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$pdo = new PDO($dsn, $user, $password, $opt);

	$sql = 'SELECT * FROM users WHERE bdate BETWEEN "1990-01-01" AND "1990-12-31"';
	$stmt = $pdo->query($sql);
	if ($stmt){
	echo "<table border='1' cellspacing='0' width='50%'><tr><th>Id</th><th>first_name</th><th>last_name</th><th>bdate</th></tr>";
	while ($row = $stmt->fetch()){
		echo "<tr>";
		echo "<td>" .$row['id']. "</td>","<td>" .$row['first_name']. "</td>","<td>" .$row['last_name']. "</td>","<td>" .$row['bdate']. "</td>";
		echo "</tr>";
	}
	echo "</table>";
	}

	/**
	$link = mysqli_connect($host, $user, $password, $database)
		or die("Ошибка" . mysqli_error($link));

	$query = "SELECT * FROM users WHERE bdate BETWEEN '1990-01-01' AND '1990-12-31'";

	$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
	if ($result) {
		$rows = mysqli_num_rows($result); // количество полученных строк
		echo "<table border='1' cellspacing='0' width='50%'><tr><th>Id</th><th>first_name</th><th>last_name</th><th>bdate</th></tr>";
		for ($i = 0; $i < $rows; ++$i) {
			$users = mysqli_fetch_row($result);
			echo "<tr>";
			for ($j = 0; $j < 4; ++$j) echo "<td>$users[$j]</td>";
			echo "</tr>";
		}
		echo "</table>";

		// очищаем результат
		mysqli_free_result($result);
	}
	mysqli_close($link)
	*/
	?>
</body>

</html>