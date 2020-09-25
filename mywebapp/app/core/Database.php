<?php
class Database{
	private $connection;
	private $query;
	private $result = [];

	public function __construct()
	{
		require_once "../app/config/database.php";
		extract($db);
		$this->connection = mysqli_connect($hostname,$username,$password,$dbname);
		if(!$this->connection)
		{
			die(mysqli_error($this->connection));
		}
	}

	public function query($query)
	{
		$this->query = $query;
	}

	public function result()
	{
		$result = mysqli_query($this->connection,$this->query);
		if($result)
		{
			while($row = $result->fetch_assoc())
			{
				array_push($this->result,(object)$row);
			}
			return $this->result;
		}
		else
		{
			die(mysqli_error($this->connection));
		}
	}

	public function row()
	{
		$result = mysqli_query($this->connection,$this->query);
		if($result)
		{
			return (object)$result->fetch_assoc();
		}
		else
		{
			die(mysqli_error($this->connection));
		}
	}

	public function exec()
	{
		mysqli_autocommit($this->connection,FALSE);
		$result = mysqli_query($this->connection,$this->query);
		if($result)
		{
			mysqli_commit($this->connection);
		}
		else
		{
			die(mysqli_error($this->connection));
		}
	}

	public function toArray($key)
	{
		$result = mysqli_query($this->connection,$this->query);
		if($result)
		{	
			while($row = $result->fetch_assoc())
			{
				array_push($this->result,$row[$key]);
			}
			return $this->result;
		}
		else
		{
			die(mysqli_error($this->connection));
		}
	}

	public function __destruct() {
		mysqli_close($this->connection);
  	}
}
?>