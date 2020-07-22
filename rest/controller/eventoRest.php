<?php

require_once "vendor/autoload.php";
require_once "db/generated-conf/config.php";

class eventoRest
{

	private $eq;

	public function __construct()
	{
		$this->eq = new \scc\scc\EventoQuery();
	}

	public function index()
	{
		$this->getAll();
	}

	function getAll()
	{
		$eventi = $this->eq->find()->toArray();

		echo json_encode($eventi);

	}

	function getById(int $id)
	{

		$evento = $this->eq->findById($id)->toArray();

		echo json_encode($evento);

	}

	function create()
	{
		var_dump($_POST);
		if (isset($_POST["nome"]) && isset($_POST["descrizione"]) &&
			isset($_POST["datainizio"])) {

			$evento = new \scc\scc\Evento();
			$evento->setNome($_POST["nome"]);
			$evento->setDescr($_POST["descrizione"]);
			$evento->setDataInizio($_POST["datainizio"]);

			try{
				$evento->save();
			}catch(Exception $e) {
				echo json_encode($e);
			}

			echo json_encode([true, "Creato con successo."]);

		}else{
			echo json_encode([false, "Dati insufficienti."]);
		}

	}

	function update()
	{
		if (isset($put["id"])) {

			$id = $put["id"];
			$nome =  $put["nome"];
			$desc = $put["descrizione"];

			$evento = $this->eq->findOneById($id);

			$evento->setNome($nome);
			$evento->setDescr($desc);

			try{
				$evento->save();
			}catch(Exception $e){
				echo json_encode($e);
			}

			echo json_encode([true, "Modificato con successo."]);
		}else{
			echo json_encode([false, "Dati insufficienti."]);
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