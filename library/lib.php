<?php
session_start();

class Lib
{
	
	function __construct()
	{
		# code...
	}



	public function pre($arr)
	{
		echo '<pre>';
		print_r($arr);
	}

	public function date()
	{
		$date=date("d-m-y");
		return $date;
	}


	public function time()
	{
		$time=date("g:i A");
		return $time;
	}

	public function datetime()
	{
		$datetime=date("d-m-y @ g:i A");
		return $datetime;
	}


	public function redirect($url,$msg,$type)
	{
		if ($type === 'success') {
			$_SESSION['msg']="<span class='text-primary'>".$msg."</span>";
			header("location:$url");
		} else if ($type === 'error') {
			$_SESSION['msg']="<span class='text-error'>".$msg."</span>";
			header("location:$url");
		} else {
			$_SESSION['msg']="<span class='text-info'>NO INFO</span>";
			header("location:$url");
		}

	}

	public function redirect2($url)
	{
		header("location:$url");

	}

	public function msg()
	{
		if (isset($_GET['msg'])) {
			if ($_GET['type'] === 'success') {
				echo "<span style='color:green;'>".$_GET['msg']."</span>";
			} elseif ($_GET['type'] === 'info') {
				echo "<span style='color:blue;'>".$_GET['msg']."</span>";
			} elseif ($_GET['type'] === 'error'){
				echo "<span style='color:red;'>".$_GET['msg']."</span>";
			}else{
				echo "<span style='color:red;'>Invalid</span>";
			}
		}
	}


	public function check_login2()
	{
		if($_SESSION['login']=="")
		{	
			$this->redirect2('login.php?msg=You must login to access requested page!&type=error');
		}
	}


	public function logout()
	{
		$_SESSION['login'] = "";
		session_unset();	
		$this->redirect2('login.php?msg=You have successfully logged out&type=success');
	}




	public function greeting()
	{
      //Here we define out main variables 
		$welcome_string="Welcome!"; 
		$numeric_date=date("G"); 
		
 //Start conditionals based on military time 
		if($numeric_date>=0&&$numeric_date<=11) 
			$welcome_string="Good Morning!"; 
		else if($numeric_date>=12&&$numeric_date<=17) 
			$welcome_string="Good Afternoon!"; 
		else if($numeric_date>=18&&$numeric_date<=23) 
			$welcome_string="Good Evening!"; 

		return $welcome_string;
		
	}

	public function check_empty($data, $fields)
	{
		$msg = null;
		foreach ($fields as $value) {
			if (empty($data[$value])) {
				$msg .= "$value field empty <br />";
			}
		} 
		return $msg;
	}
	

}

?>

