<?php

class App {
	  protected $controller = 'home';
		protected $method = 'index';
		protected $params = [];
    function __construct() {
		    $url = $this->parseUrl();
				print_r($url);
				if($url && file_exists('../app/controllers/' . $url[0] .'.php')) {
						$this->controller =  $url[0];
						unset($url[0]);
				}
				print_r($url);
				require_once '../app/controllers/' . $this->controller . '.php';
				/* echo '../'.__DIR__; */

				$this->controller = new $this->controller;

				if(isset($url[1]))
				{
					if(method_exists($this->controller, $url[1]))
					{
						$this->method = $url[1];
						unset($url[1]);
					}
				}
				print_r($url);

				$this->params = $url ? array_values($url) : [];
				print_r($this->params);
        var_dump($this->params);

				/* var_dump($this->controller); */
				call_user_func_array([$this->controller, $this->method], $this->params);
		}

		function parseUrl() {
		    if(isset($_GET['url'])) {
					return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
				}
		}
}
?>
