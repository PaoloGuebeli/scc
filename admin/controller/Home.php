<?php


require_once 'vendor/autoload.php';
require_once 'model/DbManager.php';

class Home
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

    function index(){
        $page = "home";
        require('view/template/header.php');
        require('view/home.php');
    }
}