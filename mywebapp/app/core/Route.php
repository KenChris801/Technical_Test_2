<?php
class Route 
{
	private $routes = [];
	private $default;

	public function __construct()
	{
		require_once '../app/config/routes.php';
		foreach($routes as $r)
		{
			$this->routes[$r["url"]]= array(
				"method"=>$r["method"],
				"src"=>$r["src"]
			);
		}
		$this->default = $default;
	}

	public function get($key=null)
	{
		if($key)
		{
			return $this->routes[$key];
		}
		else
		{
			return $this->routes;
		}
	}

	public function default()
	{
		return $this->default;
	}

	public function getURL()
	{
		if(isset($_GET['url'])) 
		{
			return $_GET['url'];
		}
		if(isset($_POST['url'])) 
		{
			return $_POST['url'];
		}
	}

	public function parseURL($url)
	{
		$url = rtrim($url,'/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		return $url;
	}

	public function parseRoute($route)
	{
		$url = rtrim($route,'/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		return $url;
	}
}
?>