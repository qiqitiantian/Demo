<?php
	header("Content-type:text/html;charset=utf-8");
	date_default_timezone_set("PRC");

	session_start();

	if(empty($_SERVER['HTTP_REFERER'])){
		header("location:index.html");
		exit;
	}

	if(!isset($_SESSION['key'])){
		//echo "<script>alert('非法访问！');</script>";
		header("location:index.html");
		exit;
	}
	//获取表单数据
	$name = $_COOKIE['name'];
	$class = $_COOKIE['class'];
	$phone = $_COOKIE['phone'];
	$email = $_COOKIE['email'];
	$word = $_COOKIE['word'];
	$lover = $_COOKIE['lover'];
	$sex = $_COOKIE['sex'];
	$time = date('y-m-d h:i:s',time());

	$conn = mysql_connect("localhost","root","root");

	if(!$conn){
		die("Could not connect mysql:".mysql_error());
		return;
	}

	mysql_select_db("info1");

	$sql = "update persons set name = '{$name}',class='{$class}',phone='{$phone}',email='{$email}',word='{$word}',lover='{$lover}',sex='{$sex}',reg_time='{$time}' where phone = '{$phone}'";

	if(mysql_query($sql,$conn)){
		echo "<script>alert('更新成功！');window.location.href='showPersons.php';</script>";
	}else{
		echo "<script>alert('更新失败，请重试！');window.location.href='addPersons.html';</script>";
	}




 ?>
