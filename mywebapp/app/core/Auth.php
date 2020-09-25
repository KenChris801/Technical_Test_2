<?php

require_once "../app/core/Session.php";

class Auth
{
	private $controller;
	private $method;
	private $params = [];
	private $route;
	private $src;
	private $default;

	public function __construct()
	{
		$this->route = new Route;
		$this->default = $this->route->default();
		
		$check = $this->checkAuth();
		if($check)
		{
			$this->set();
			$this->exec();
		}
		else
		{
			try {
				header('Location: '.BASE_URL.'/'.$this->default);
			}
			catch(Exception $e) {
	   	 		header('HTTP/1.0 401 Unauthorized');			
	   	 	}
	   	 	exit;
		}
	}

	function exec()
	{
		try{
			require_once "../app/controllers/$this->controller.php";
		}catch(Exception $e) {
   	 		header('HTTP/1.0 404 Not Found');			
   	 	}

		$this->controller = new $this->controller;

		if(method_exists($this->controller,$this->method))
		{
			$this->controller->{$this->method}($this->params);
		}
		else
		{
			header('HTTP/1.0 404 Not Found');
		}
	}

	function checkAuth()
	{
		$routes = $this->route->get();
		$url = $this->route->getURL();
		$session = new Session;
		foreach($routes as $key=>$value)
		{
			if(substr($url.'/',0,strlen($key.'/')) === $key.'/')
			{
				$this->src = $value;
				$this->params = (sizeof(explode($key.'/',$url))>1)?array_values($this->route->parseURL(explode($key.'/',$url)[1])):[];
				break;
			}
		}

		if($session->checkCredential())
		{
			$this->default = 'main/index';
			if(isset($this->src['method'])&&$this->route->getURL()!='login')
			{
				$methods = explode("/",$this->src['method']);
				if(in_array(strtolower($_SERVER["REQUEST_METHOD"]),$methods))
				{
					return true;
				}
				else
				{
					header('HTTP/1.1 405 Method Not Allowed');
					exit;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			if($this->route->getURL()==$this->default)
			{
				return true;
			}
			return false;
		}
	}

	function set()
	{
		$src = $this->route->parseURL($this->src["src"]);
		$this->controller = $src[0];
		$this->method = $src[1];
	}
}

?>