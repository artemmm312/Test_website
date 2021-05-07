<?php

namespace App\models;

class CheckModel extends Model
{
	public function checkUser()
	{
		$pdo = $this->db;
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
		//$row = $stmt->fetchAll();
		$data = $stmt->fetchAll();
		//$data = json_encode($row);
		return $data;
	}
}
