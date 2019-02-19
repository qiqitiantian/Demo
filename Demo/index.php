<?php
	header("content-Type:text/html;charset=utf-8");
	date_default_timezone_set("PRC");

	$name = $_POST['username'];
	$password = $_POST['password'];

	setcookie('username',$name);
	setcookie('password',$password);

	// if(isset($_POST['remember'])){
	// 	setcookie('name',$name);
	// }

	// setcookie('name',$name);

	if(isset($_POST['login'])){
		header("location:login.php");
	}else{
		header("location:register.php");
	}


 ?>
