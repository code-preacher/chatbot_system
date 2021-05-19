<?php
include_once "config.php";

class Crud extends Config
{

	function __construct()
	{
		parent::__construct();
	}

	public function displayAllWithOrder($table,$orderValue,$orderType)
	{
		$query = "SELECT * FROM {$table} ORDER BY {$orderValue} {$orderType}";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$data = array();
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}else{
			return false;
		}
	}
	
//Counting All
	public function countAll($table)
	{
		$q=$this->con->query("SELECT id FROM {$table}");
		if ($q) {
		    return $q->num_rows;
		} else {
			return 0;
		}
		
		
	}

	
// Inserting

	public function insertChat($post)
	{
		$question=$this->cleanse($_POST['question']);
		$reply=$this->cleanse($_POST['reply']);
		$query="INSERT into bot(question,reply) values('$question','$reply')";
		$sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:add.php?msg=Data was created successfully&type=success");
		}else{
			header("Location:add.php?msg=Error adding data try again!&type=error");
		}
	}

	
	//Search
	public function displaySearchWithOption($table,$col,$item,$question)
	{
	//Search box value assigning to $Name variable.
		$question= $this->cleanse($question);
		$item= $this->cleanse($item);
		$col= $this->cleanse($col);
		$query = "SELECT $col FROM $table WHERE $item LIKE '%$question%'";
		$result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		}else{
			return 0;
		}
	}




		public function authCheck($post)
	{
		$name=$this->cleanse($_POST['name']);
		$password=$this->cleanse($_POST['password']);
		if ($name == 'admin' && $password == '123456') {
		$_SESSION['login']=1;
		header("location:add.php");
		} else {
		header("location:login.php?msg=Password is incorrect try again!!!&type=error");
		}
		
	}


		public function delete($id, $table,$url) 
	{ 
		$id = $this->cleanse($id);
		$query = "DELETE FROM {$table} WHERE id = $id";

		$result = $this->con->query($query);

		if ($result == true) {
			header("Location:$url?msg=Data was successfully deleted&type=success");
		} else {
			header("Location:$url?msg=Error deleting data&type=error");
		}
	}




	public function cleanse($str)
	{
   #$Data = preg_replace('/[^A-Za-z0-9_-]/', '', $Data); /** Allow Letters/Numbers and _ and - Only */
		$str = htmlentities($str, ENT_QUOTES, 'UTF-8'); /** Add Html Protection */
		$str = stripslashes($str); /** Add Strip Slashes Protection */
		if($str!=''){
			$str=trim($str);
			return mysqli_real_escape_string($this->con,$str);
		}
	}


}

?>

