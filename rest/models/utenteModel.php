<?php

class utenteModel
{


    function __construct() {
	    require_once 'Database.php';
    }


    public function getAll()
    {

	    $connection = new MySQL();
	    $sql = "select nome,cognome,telefono,grado,anno_nascita  FROM utente";
	    $stmt = $connection->prepare($sql);
	    $stmt->execute();
	    $arr = $stmt->fetchAll(PDO::FETCH_NUM);
	    return $arr;

	}
	
	public function getById($id): array
	{
		
		$connection = new MySQL();
		$sql = "SELECT username, nome, cognome, telefono, grado, anno_nascita, pass FROM utente WHERE username = :id";
		$stmt = $connection->prepare($sql);
		$stmt->bindParam(":id", $id);
		if ($stmt->execute()) {

			$array = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($array) {

				return $array;

			}

		}

		return [null];

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

	public function updateUser($username, $name, $surname, $phone, $level, $date, $pass): bool
	{
		
		$connection = new MySQL();
		$sql = "UPDATE utente SET nome = :nome, cognome = :cognome, telefono = :telefono, grado = :grado, anno_nascita = :anno_nascita, pass = :pass WHERE username = :username";
		$stmt = $connection->prepare($sql);

		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":nome", $name);
		$stmt->bindParam(":cognome", $surname);
		$stmt->bindParam(":telefono", $phone);
		$stmt->bindParam(":grado", $level, PDO::PARAM_INT);
		$stmt->bindParam(":anno_nascita", $date);
		$stmt->bindParam(":pass", $pass);

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
