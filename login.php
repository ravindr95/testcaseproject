<?php 
session_start();
require('connection.php');

	if(isset($_POST['sub']))
	{
		//$id = $GET['id'];
		$uname = $_POST['user_name'];
		$pass = $_POST['password'];
	
		$query="select * from users where user_name='$uname' and password='$pass'";
		$run = mysqli_query($con,$query) or die(mysqli_error($con));
		$data = mysqli_fetch_assoc($run);
	
		$id = $data['user_name'];	
		$password =  $data['password'];
	
	
		if($uname==$id and $pass==$password)
		{
			$_SESSION['uname']= $id;
			$_SESSION['pass'] = $password;
			header('location:home.php');
		}
		else
		{
			echo "<center><h1 style='color:red'>Invalid user name or password<h1></center>";
		}
	
	}
 ?>