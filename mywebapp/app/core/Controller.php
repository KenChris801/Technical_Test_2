<?php

class Controller
{
	protected $data = [];
	protected $input;
	protected $session;
	// protected $model;

	public function __construct()
	{
		$this->request();
		$this->session = new Session;
	} 

	public function view($view)
	{
		extract($this->data);
		require_once "../app/views/template/header.php";
		require_once "../app/views/$view.php";
		require_once "../app/views/template/footer.php";
		
		return file_exists("../app/views/$view.php");
	}

	public function model($model)
	{
		require_once "../app/models/$model.php";
		$this->{$model} = new $model;

		return file_exists("../app/models/$model.php");
	}

	public function library($library)
	{
		require_once "../app/libraries/$library.php";
		$this->{$library} = new $library;

		return file_exists("../app/libraries/$library.php");
	}

	function request()
	{
		if(isset($_GET)) 
		{
			$this->input = $_GET;
		}
		if(isset($_POST))
		{
			$this->input = $_POST;
		}
	}
}
?>