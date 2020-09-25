<?php

class Form {

	public function form_validation()
	{
		$status = false;
		$form = [];
		$check = $this->check_form();
		if(is_bool($check))
		{
			$status = true;
		}
		else
		{
			$form = $check;
		}
		return (object) array (
			"status"=>$status,
			"form" => $form
		);
	}

	public function set_error($key,$err)
	{
		return (object) array(
			"input"=>$key,
			"error"=>$error
		);
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function check_form()
	{
		foreach($_POST as $key=>$value)
		{
			if($value=="")
			{
				return (object) array(
					"input"=>$key,
					"error"=>"$key is required"
				);
			}
			else if($this->test_input($value)=="")
			{
				return (object) array(
					"input"=>$key,
					"error"=>"$key is not valid input"
				);
			}
		}
		return true;
	}
}
?>