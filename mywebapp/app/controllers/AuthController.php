<?php

class AuthController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->model('Model_user');
		$this->library('Form');
	}

	public function login()
	{
		$this->data["title"] = "Login";
		if($_POST)
		{	
			$this->data["email"] = $this->input["email"];
			$check = $this->Form->form_validation();
			if($check->status)
			{
				$user = $this->Model_user->getUserByEmail($this->input)->row();
				$check_pwd = isset($user->u_password)?password_verify($this->input["password"],$user->u_password):false;
				if($check_pwd)
				{
					$this->session->setCredential($user);
					try {
						header('Location: '.BASE_URL.'/main/index');
					}
					catch(Exception $e) {
				   	 	header('HTTP/1.0 401 Unauthorized');			
				   	}
				   	exit;
				}
				else
				{
					$this->data["server_error"] = "username or password not matched";
					return $this->view('auth/login');
				}
			}
			else
			{
				$this->data["error"] = $check->form;
				return $this->view('auth/login');
			}	
		}
		else
		{
			$this->view('auth/login');
		}
	}

	public function logout()
	{
		$this->session->destroy();
		try {
			header('Location: '.BASE_URL.'/login');
		}
		catch(Exception $e) {
	   	 	header('HTTP/1.0 401 Unauthorized');			
	   	}
	   	exit;
	}
}

?>