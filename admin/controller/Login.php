<?php

require_once 'vendor/autoload.php';
require_once 'model/DbManager.php';
require_once 'db/generated-conf/config.php';
require_once 'controller/Home.php';

class Login
{

    private $dbh;
    private $config;
    private $auth;
    private $uq;
    private $u;

    /**
     * Costruttore Login.
     * @param \PHPAuth\Config $config
     * @param \PHPAuth\Auth $auth
     */
    public function __construct()
    {

        /**
         * Istanza del database per permettere a phpAuth di connettersi.
         */
        $this->dbh = DbManager::getDb();
        $this->config = new PHPAuth\Config($this->dbh, '', '', "it_IT");
        $this->auth = new PHPAuth\Auth($this->dbh, $this->config);
        $this->uq = new \scc\scc\PhpauthUsersQuery();
        $this->u = new \scc\scc\PhpauthUsers();
    }

    /**
     * Pagina di login
     */
    function index()
    {
        require('view/login.php');
    }

    /**
     * Questa funzione permette di prendere le informazioni delll'utente loggato.
     * @return array|string
     */
    function getCurrentUser()
    {
        $id = $this->auth->getCurrentUID();
        return $this->uq->findOneById($id)->toArray();
    }

    /**
     * Autenticazione del utente con i parametri email e password.
     */
    function authenticate()
    {
        if (isset($_POST['email']) && isset($_POST['pass'])) {
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

        } else {

            echo json_encode([false, "Inserisci l'email per fare il reset della password."]);

        }
    }

    function activate()
    {
        if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $return = $this->auth->requestReset($_POST['email']);
            $this->uq->findByEmail($_POST['email'])->set('isactive', 1);

            if (!$return['error']) {
                echo json_encode([true]);
            } else {
                echo json_encode([false, $return['message']]);
            }

        } else {

            echo json_encode([false, "Inserisci l'email per attivare l'account."]);

        }
    }

    function setNewPassword()
    {
        if (isset($_POST['pass']) && isset($_POST['rpass']) && isset($_POST['code'])) {


            $return = $this->auth->resetPass($_POST['code'],$_POST['pass'],$_POST['rpass']);

            if (!$return['error']) {
                echo json_encode([true]);
            } else {
                echo json_encode([false, $return['message']]);
            }

        } else {

            echo json_encode([false, "Inserisci il codice e la password per attivare l'account."]);

        }
    }

    function logout()
    {
        $this->auth->logout($_COOKIE['authIDD']);
        $this->index();
    }
}