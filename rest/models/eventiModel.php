<?php

class eventiModel
{


	function __construct() {
		require_once 'Database.php';
	}


	public function getAll()
	{

		$connection = new MySQL();
		$sql = "select nome, descr, data_inizio FROM evento";
		$stmt = $connection->prepare($sql);
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_NUM);
		return $arr;

	}

	public function getById(int $id): array
	{

		$connection = new MySQL();
		$sql = "SELECT id, nome, cognome FROM utente WHERE id = :id";
		$stmt = $connection->prepare($sql);
		$stmt->bindParam(":id", $id);
		if ($stmt->execute()) {

			$array = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($array) {

				return $array;

			}

		}

		return [];

	}

	public function addUser($name, $surname): bool
	{
		$connection = $connection = new MySQL();
		$sql = 'INSERT INTO utente (nome,cogonome) VALUES (:nome, :cognome) ';
		$stmt = $connection->prepare($sql);

		$stmt->bindParam(':nome', $name, PDO::PARAM_STR);
		$stmt->bindParam(':cognome', $surname, PDO::PARAM_STR);
		return $stmt->execute();
	}

	public function updateUser(int $id, string $name, string $type): bool
	{

		$connection = new MySQL();
		$sql = "UPDATE guitar SET name = :name, type = :type WHERE id = :id";
		$stmt = $connection->prepare($sql);

		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":type", $type);

		return $stmt->execute();

	}

	public function deleteById($id): bool
	{
		$connection = $connection = new MySQL();
		$sql = 'DELETE FROM guitar WHERE id = :id';
		$stmt = $connection->prepare($sql);

		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}


}
