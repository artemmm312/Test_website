<?php

namespace App\Domain\Repository;

use PDO;

class UserSelectRepository
{
	private $connection;

	public function __construct(PDO $connection)
	{
		$this->connection = $connection;
	}

	public function selectUser()
	{
		$input = json_decode(file_get_contents("php://input"), true);
		$year_1 = $input['year_of_birth'];
		$year_2 = $year_1 + 1;
		$date_1 = (string)$year_1 . "-01-01";
		$date_2 = (string)$year_2 . "-01-01";
		$sql = 'SELECT * FROM users WHERE bdate >= ? AND bdate < ?';
		$stmt = $this->connection->prepare($sql);
		$stmt->bindValue(1, $date_1);
		$stmt->bindValue(2, $date_2);
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}
}
