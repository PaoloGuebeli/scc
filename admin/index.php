<?php

// carico il file di configurazione
require 'config/config.php';

// carico le classi dell'applicazione
require 'libs/application.php';

// faccio partire l'applicazione
$app = new Application();
