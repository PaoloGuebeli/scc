<?php

require_once "vendor/autoload.php";
require_once "db/generated-conf/config.php";

class utenteRest
{

	private $uq;

	public function __construct()
	{
		$this->uq = new \scc\scc\UtenteQuery();
	}

	public function index()
	{
		$this->getAll();
	}

	function getAll()
	{
		$utenti = $this->uq->find()->toArray();

		echo json_encode($utenti);

	}

	function getById($id)
	{

		$utenti = $this->uq->findOneByUsername($id)->toArray();

		echo "[".json_encode($utenti)."]";


	}

	function create()
	{

		if (isset($_POST["nome"]) &&
			isset($_POST["cognome"])) {

			$name = $_POST["nome"];
			$surname = $_POST["cognome"];

			$strumentiModel = new utenteModel();
			if ($strumentiModel->addUser($name, $surname)) {

				echo "Chitarra aggiunta con successo";

			} else {

				echo "Non è stato possibile aggiungere la chitarra";

			}

		}

	}

	function update()
	{
		$put = json_decode(file_get_contents("php://input"), true);
		
		if (isset($put["username"])) {
			$um = new utenteModel();
			$username = $put["username"];

			$user = $um->getById($username);


			if (isset($put["nome"])) {
				$name = $put["nome"];
			} else {
				$name = $user['nome'];
			}

			if (isset($put["cognome"])) {
				$surname = $put["cognome"];
			} else {
				$surname = $user['cognome'];
			}

			if (isset($put["telefono"])) {
				$phone = $put["telefono"];
			} else {
				$phone = $user['telefono'];
			}

			if (isset($put["grado"])) {
				$level = $put["grado"];
			} else {
				$level = $user['grado'];
			}

			if (isset($put["anno_nascita"])) {
				$date = $put["anno_nascita"];
			} else {
				$date = $user['anno_nascita'];
			}

			if (isset($put["pass"])) {
				$pass = $put["pass"];
			} else {
				$pass = $user['pass'];
			}

			$result = $um->updateUser($username, $name, $surname, $phone, $level, $date, $pass);

			echo '['.json_encode($result).']';

		}
	}

	function delete()
	{
		parse_str(file_get_contents("php://input"), $put);
		if (isset($put["id"])) {
			$strumentiModel = new utenteModel();
			if ($strumentiModel->deleteById($put['id'])) {

				echo "Chitarra eliminata con successo";

			} else {

				echo "Non è stato possibile eliminare la chitarra";

			}
		}

	}

}