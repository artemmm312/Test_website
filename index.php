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
$link = mysqli_connect($host, $user, $password, $database)
   or die("Ошибка".mysqli_error($link));

$query ="SELECT * FROM users";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result){
 $rows = mysqli_num_rows($result); // количество полученных строк
   echo "<table border='1' cellspacing='0' width='50%'><tr><th>Id</th><th>first_name</th><th>last_name</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i){
     $row = mysqli_fetch_row($result);
      echo "<tr>";
       for ($j = 0 ; $j < 3 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";

    // очищаем результат
    mysqli_free_result($result);
}

mysqli_close($link);
?>
</body>
</html>