<?php

class Application
{
    private $url_controller = null;
    private $url_parameter_1 = null;
    private $url_parameter_2 = null;
    private $url_parameter_3 = null;

    public function __construct()
    {
        $this->splitUrl(); //funzione da creare per dividere l'URL
        if (is_null($this->url_controller)) {
            require './controller/utenteRest.php';
            $rest = new utenteRest();
            $rest->index();

        } else if (file_exists('./controller/' . $this->url_controller . '.php')) {
            require './controller/' . $this->url_controller . '.php';
			$this->url_controller = new $this->url_controller();
			switch ($_SERVER["REQUEST_METHOD"]) {
				case "GET":

					if(isset($this->url_parameter_1)) {
						$this->url_controller->{"getById"}($this->url_parameter_1);
					}else{
						$this->url_controller->{"getAll"}();

					}
					break;

				case "POST":

					$this->url_controller->{"create"}();

					break;

				case "PUT":

					$this->url_controller->{"update"}();

					break;

				case "DELETE":
					$this->url_controller->{"delete"}();

					break;

			}
        }
    }

    /**
     * Splitto l'url URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // tolgo il carattere / dalla fine della stringa
            $url = rtrim($_GET['url'], '/');
            //rimuove tutti i caratteri illegali dall'URL
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //divido in un array in base al carattere /
            $url = explode('/', $url);

            // divido le parti dell'utl in base a controller, azione e 3 parametri
            $this->url_controller = (isset($url[0]) ? $url[0] : null);
            $this->url_parameter_1 = (isset($url[1]) ? $url[1] : null);
            $this->url_parameter_2 = (isset($url[2]) ? $url[2] : null);
            $this->url_parameter_3 = (isset($url[3]) ? $url[3] : null);

            // Per debug
            // echo 'Controller: ' . $this->url_controller . '<br />';
            // echo 'Action: ' . $this->url_action . '<br />';
            // echo 'Parameter 1: ' . $this->url_parameter_1 . '<br />';
            // echo 'Parameter 2: ' . $this->url_parameter_2 . '<br />';
            // echo 'Parameter 3: ' . $this->url_parameter_3 . '<br />';
        }
    }
}
