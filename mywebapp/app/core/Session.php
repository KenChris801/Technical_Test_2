<?php
class Session
{
	private $sessions;
	private $timelimit = 7200;

	public function __construct()
	{
		if(!isset($_SESSION))
		{
			$this->start();
		}
		$this->sessions = $_SESSION;
	}

	public function get($session=null)
	{
		if($session)
		{
			return $this->sessions[$session];
		}
		else
		{
			return $this->sessions;
		}
	}

	public function set($key,$data)
	{
		$_SESSION[$key] = $data; 
	}

	public function setCredential($data)
	{
		$credentials = (object)array(
			"id"=>$data->u_id,
			"name"=>$data->u_name,
			"role"=>$data->u_role_id,
			"email"=>$data->u_email,
			"token"=>$this->generateToken(),
			"last_active" => time()
		);
		$_SESSION["credentials"] = $this->encrypt($credentials);

	}

	public function user_data($key)
	{
		$data = $this->decrypt($this->sessions['credentials']);
		return $data->{$key};
	}

	public function checkCredential()
	{
		if(isset($this->sessions['credentials']))
		{
			$credential = $this->decrypt($this->sessions["credentials"]);
			if($credential)
			{
				if(time()-$credential->last_active < $this->timelimit)
				{
					return true;
				}
				else
				{
					$this->destroy();
				}
			}
			return false;
		}
		else
		{
			return false;
		}
	}

	public function start()
	{
		session_start();
	}

	public function destroy()
	{
		session_unset();
		session_destroy();
	}

	function generateToken()
	{
		$token = openssl_random_pseudo_bytes(32);
		$token = bin2hex($token);
		return $token;
	}

	function encrypt($data)
	{
		$data = json_encode($data);
		$data = base64_encode($data);
		return $data;
	}

	function decrypt($data)
	{
		$data = base64_decode($data);
		$data = json_decode($data);
		return $data;
	}
}

?>