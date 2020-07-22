<?php

require_once 'vendor/autoload.php';
require_once 'model/DbManager.php';

class Login
{

	private $dbh;
	private $config;
	private $auth;

	/**
	 * Costruttore Login.
	 * @param \PHPAuth\Config $config
	 * @param \PHPAuth\Auth $auth
	 */
	public function __construct()
	{

		/**
		 * Istanza del databse per permettere a phpAuth di connettersi.
		 */
		$this->dbh = DbManager::getDb();
		$this->config = new PHPAuth\Config($this->dbh, null, null, "it_IT");
		$this->auth = new PHPAuth\Auth($this->dbh, $this->config);
	}

	/**
	 * Pagina di login
	 */
	function index(){
		require('view/login.php');
	}

	/**
	 * Autenticazione del utente con i parametri email e password.
	 */
	function authenticate(){
		if(isset($_POST['email']) && isset($_POST['pass'])) {
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			$return = $this->auth->login($email, $pass);
			if (!$return['error']) {

				setcookie('authIDD', $return["hash"], $return["expire"], '/');
				$userhash = $return['hash'];

				$home = new Home();

				$home->index();

			} else {
				require('view/login.php');
			}
		}
	}

	function resetPassword()
	{
		if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

			$return = $this->auth->requestReset($_POST['email']);

			if (!$return['error']) {
				echo json_encode([true]);
			} else {
				echo json_encode([false, $return['message']]);
			}

		}else{

			echo json_encode([false, "Inserisci l'email per fare il reset della password."]);

		}
	}

}