<?php


require_once "vendor/autoload.php";
require_once "db/generated-conf/config.php";

class partecipaRest
{

	private $pq;

	private $uq;

	private $gq;

	public function __construct()
	{
		$this->pq = new \scc\scc\PartecipaQuery();
		$this->uq = new \scc\scc\UtenteQuery();
		$this->gq = new \scc\scc\GruppoQuery();
	}

	public function index()
	{
		$this->getAll();
	}

	function getAll()
	{
		$results = $this->pq->find()->toArray();
		$partecipanti = array();
		foreach ($results as $result){

			$utente = $this->uq->findOneByUsername($result['IdUtente'])->toArray();
			$gruppo = $this->gq->findOneById($result['IdGruppo'])->toArray();
			$partecipanti[] = ["Username" => $utente['Username'], "Id_Evento" => $result['IdEvento'], "Tipo" => $result['Tipo'], "Gruppo" => $gruppo['Categoria'].' '.$gruppo['Livello']];

		}

		echo json_encode($partecipanti);

	}

	function getById(int $id)
	{

		$results = $this->pq->findByIdEvento($id)->toArray();
		$partecipanti = array();
		foreach ($results as $result){

			$utente = $this->uq->findOneByUsername($result['IdUtente']);
			$gruppo = $this->gq->findOneById($result['IdGruppo']);

			if($utente != null)
				$utente = $utente->toArray();

			if($gruppo != null)
				$gruppo = $gruppo->toArray();

			$partecipanti[] = ["Username" => $utente['Username'], "Tipo" => $result['Tipo'], "Gruppo" => $gruppo['Categoria'].' '.$gruppo['Livello']];

		}

		echo json_encode($partecipanti);

	}

	function create()
	{

		if (isset($_POST["nome"]) &&
			isset($_POST["cognome"])) {

			$name = $_POST["nome"];
			$surname = $_POST["cognome"];

			$strumentiModel = new utenteModel();
			$strumentiModel->addUser($name, $surname);

		}

	}

	function update()
	{
		parse_str(file_get_contents("php://input"), $put);
		if (isset($put["name"]) &&
			isset($put["type"])) {

			$id = $put["id"];
			$name = $put["name"];
			$type = $put["type"];

			$strumentiModel = new utenteModel();
			$strumentiModel->updateUser($id, $name, $type);

		}
	}

	function delete()
	{
		parse_str(file_get_contents("php://input"), $put);
		if(isset($put["id"])) {
			$strumentiModel = new utenteModel();
			$strumentiModel->deleteById($put['id']);
		}

	}

}