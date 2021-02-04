<?php


use db\scc\scc\PhpauthUsersQuery;

require_once 'vendor/autoload.php';
	require_once 'db/generated-conf/config.php';
	require_once 'model/DbManager.php';

//if(isset($_COOKIE['authIDD'])) {
	class Users
	{

		/**
		 * @var PDO Connessione al database.
		 */
		private $dbh;

		/**
		 * @var \PHPAuth\Config Configurazioni di phpAuth.
		 */
		private $config;

		/**
		 * @var \PHPAuth\Auth Istanza di phpAuth.
		 */
		private $auth;

		/**
		 * @var PhpauthUsersQuery Istanza di PhpauthUsers Query.
		 */
		private $uq;

		public function __construct()
		{
			$this->dbh = DbManager::getDb();
			$this->config = new PHPAuth\Config($this->dbh, null, null, "it_IT");
			$this->auth = new PHPAuth\Auth($this->dbh, $this->config);
			$this->uq = new PhpauthUsersQuery();
		}

		function index()
		{
		    $page = "users";
			require('view/template/header.php');
			require('view/users.php');

		}

		function getUtenti()
		{

			$uq = $this->uq->find();
			echo json_encode($uq->toArray());

		}

		function updateUtente()
		{
			if (isset($_POST['id']) && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['telefono']) && isset($_POST['ruolo'])) {

				$id = htmlspecialchars($_POST['id']);
				$nome = htmlspecialchars($_POST['nome']);
				$cognome = htmlspecialchars($_POST['cognome']);
				$telefono = htmlspecialchars($_POST['telefono']);
				$ruolo = $_POST['ruolo'];

				$values = [
					'Nome' => $nome,
					'Cognome' => $cognome,
					'Telefono' => $telefono,
					'Ruolo' => $ruolo,
				];

				try {

					$this->uq->filterById($id)->update($values);

					echo json_encode([true]);

				} catch (\Propel\Runtime\Exception\PropelException $e) {
					echo json_encode([false, $e]);
				}

			} else {

				echo json_encode([false, 'Valori non validi!']);
			}
		}

		function deleteUtente()
		{
			if (isset($_POST['id'])) {

				$id = htmlspecialchars($_POST['id']);

				if ($id != $this->auth->getCurrentUID()) {
					try {

						$this->uq->filterById($id)->delete();
						echo json_encode([true]);

					} catch (\Propel\Runtime\Exception\PropelException $e) {
						var_dump($e);
						echo json_encode([false, $e]);
					}

				} else {
					echo json_encode([false, 'Non puoi eliminare te stesso!']);
				}
			} else {
				echo json_encode([false, 'Valori passati non validi!']);
			}

		}

		function insertUtente()
		{
			if (isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['telefono'])
				&& isset($_POST['ruolo']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

				$email = htmlspecialchars($_POST['email']);
				$nome = htmlspecialchars($_POST['nome']);
				$cognome = htmlspecialchars($_POST['cognome']);
				$telefono = htmlspecialchars($_POST['telefono']);
				$ruolo = $_POST['ruolo'];

				$utenti = $this->uq->findByEmail($email);

				if (count($utenti) == 0) {
					try {

						$utente = new \sitonoleggio\sitonoleggio\PhpauthUsers();
						$utente->setEmail($email);
						$utente->setNome($nome);
						$utente->setCognome($cognome);
						$utente->setTelefono($telefono);
						$utente->setRuolo($ruolo);
						$utente->save();

						$return = $this->auth->requestReset($email);

						if (!$return["error"]) {

							echo json_encode([true, $return["message"]]);

						} else {

							$this->uq->findByEmail($email)->delete();
							echo json_encode([false, $return["message"]]);

						}

					} catch (\Propel\Runtime\Exception\PropelException $e) {
						echo json_encode([false, $e]);
					}
				} else {
					echo json_encode([false, 'Email già in uso!']);
				}


			} else {
				echo json_encode([false, 'I dati passati non sono validi!']);
			}
		}
	}
/**
 * }else{
	require_once ('controllers/Login.php');

	$login = new Login();
	$login->index();
}
 */