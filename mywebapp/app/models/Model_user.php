<?php
class Model_user extends Model
{
	public function getUser()
	{
		$query = "
			select u_id,u_role_id,u_name,u_email,u_password,u_status,r_name
			from user
			inner join user_role on u_role_id = r_id
		";

		$this->db->query($query);
		return $this->db;
	}

	public function getUserByEmail($data)
	{
		$query = "
			select u_id,u_role_id,u_name,u_email,u_password
			from user
			where u_email = '".$data['email']."' and u_status = 1
		";

		$this->db->query($query);
		return $this->db;
	}

	public function register($data)
	{
		$query = "
			Insert Into user (u_role_id,u_name,u_email,u_password,u_status,u_created_at)
			values (2,'".$data["username"]."','".$data["email"]."','".password_hash($data["password"],PASSWORD_DEFAULT)."',1,Now())
		";

		$this->db->query($query);
		return $this->db;
	}
}
?>