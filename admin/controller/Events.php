<?php

require_once 'vendor/autoload.php';
require_once 'model/DbManager.php';
require_once 'db/generated-conf/config.php';

class Events
{

    private $dbh;
    private $config;
    private $auth;
    private $uq;

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
        $this->config = new PHPAuth\Config($this->dbh, null, null, "it_IT");
        $this->auth = new PHPAuth\Auth($this->dbh, $this->config);
        //$this->uq = new \scc\scc\PhpauthUsersQuery();
    }

    function index(){
        $page = 'events';
        require 'view/template/header.php';
        require 'view/events.php';

    }
}