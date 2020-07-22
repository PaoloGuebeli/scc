<?php


class partecipaModel
{

	function __construct() {
		require_once 'Database.php';
	}


	public function getAll()
	{

		$connection = new MySQL();
		$sql = "select Id_Utente, Id_Evento, Tipo, Id_Gruppo FROM partecipa";
		$stmt = $connection->prepare($sql);
		$stmt->execute();
		$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $arr;

	}

	public function getById(int $id): array
	{

		$connection = new MySQL();
		$sql = "select Id_Utente, Id_Evento, Tipo, Id_Gruppo FROM partecipa WHERE Id_Evento = :id";
		$stmt = $connection->prepare($sql);
		$stmt->bindParam(":id", $id);
		if ($stmt->execute()) {

			$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if ($array) {

				return $array;

			}

		}

		return [];

	}

	public function addUser($user, $event, $type, $group): bool
	{
		$connection = $connection = new MySQL();
		$sql = 'INSERT INTO partecipa (Id_Utente, Id_Evento, Tipo, Id_Gruppo) VALUES (:nome, :evento, :tipo, :gruppo) ';
		$stmt = $connection->prepare($sql);

		$stmt->bindParam(':nome', $user, PDO::PARAM_STR);
		$stmt->bindParam(':evento', $event, PDO::PARAM_STR);
		$stmt->bindParam(':tipo', $type, PDO::PARAM_STR);
		$stmt->bindParam(':gruppo', $group, PDO::PARAM_STR);
		return $stmt->execute();
	}

	public function updateUser($user, $event, $type, $group): bool
	{

		$connection = new MySQL();
		$sql = "UPDATE partecipa SET Id_Utente = :utente, Id_Evento = :evento, Tipo = :tipo, Id_Gruppo = :gruppo WHERE Id_Utente = :utente AND Id_Evento = :evento";
		$stmt = $connection->prepare($sql);

		$stmt->bindParam(":utente", $user);
		$stmt->bindParam(":evento", $event);
		$stmt->bindParam(":tipo", $type);
		$stmt->bindParam(":gruppo", $group);

		return $stmt->execute();

	}

	public function deleteById($event, $user): bool
	{
		$connection = $connection = new MySQL();
		$sql = 'DELETE FROM partecipa WHERE Id_Evento = :evento AND Id_Utente = :utente';
		$stmt = $connection->prepare($sql);

		$stmt->bindParam(':evento', $evento, PDO::PARAM_INT);
		$stmt->bindParam(':utente', $utente, PDO::PARAM_INT);

		return $stmt->execute();
	}

}