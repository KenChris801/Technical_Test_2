<?php

class Admin extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->model('Model_user');
		$this->library('Form');
		if($this->session->user_data('id')!=1)
		{
			header('HTTP/1.0 401 Unauthorized');
		}
	}

	public function index()
	{
		$this->data["title"] = "Admin";
		$this->data["content"] = "Admin";
		$result = $this->Model_user->getUser()->result();
		$this->data["admin"] = $result;

		return $this->view('admin/index');
	}

	public function create()
	{
		$this->data["title"] = "Create New Admin";
		$this->data["content"] = "Admin";
		$this->data["form"] = 'Create New Admin';
		$this->data["url"] = BASE_URL.'/admin/create';
		if($_POST)
		{
			$check = $this->Form->form_validation();
			if($check->status)
			{
				if(password_verify($this->input['c_password'],password_hash($this->input['password'],PASSWORD_DEFAULT)))
				{
					$check_user = $this->Model_user->getUserByEmail($this->input)->row();
					if(!isset($check_user->u_id))
					{
						$this->input["session"] = $this->session->user_data('id');
						$this->Model_user->register($this->input)->exec();
					}
					else
					{
						$this->data["server_error"] = "Insert Failed, User already exists";
						return $this->view('admin/form');
					}
				}
				else
				{
					$this->data["server_error"] = "Confirm Password not matched";
					return $this->view('admin/form');
				}
			}
			else
			{
				$this->data["error"] = $check->form;
				return $this->view('admin/form');
			}	
		}
		else
		{
			return $this->view('admin/form');
		}	
	}
}
?>