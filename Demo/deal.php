<?php
	header("content-Type:text/html;charset=utf-8");

	session_start();

	if(empty($_SERVER['HTTP_REFERER'])){
		header("location:index.html");
		exit;
	}

	$_SESSION['key'] = 'get_key';

	$name = $_POST['name'];
	$class = $_POST['class'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$word = $_POST['word'];
	$lover = $_POST['lover'];
	$sex = $_POST['sex'];

	//连接数据库
	$conn = mysql_connect("localhost","root","root");

	//判断是否连接成功
	if (!$conn){
		die('Could not connect: ' . mysql_error());
		return;
	}

	//选择数据库
	mysql_select_db("info1", $conn);

	//从数据表选择数据语句
	$selectSql = "select * from persons where phone = '{$phone}' ";

	//mysql执行语句
	$result = mysql_query($selectSql,$conn);

	setcookie("name",$name);
	setcookie("class",$class);
	setcookie("phone",$phone);
	setcookie("email",$email);
	setcookie("word",$word);
	setcookie("lover",$lover);
	setcookie("sex",$sex);

	//判断$result是否存在数据
	if(!mysql_fetch_array($result)){
		echo "<script>window.location.href='addPersons.php'</script>";
		exit;
	}
	echo "<script>
	if(confirm('系统检测到该手机号已注册，是否更新数据？')){
		window.location.href='updatePersons.php';
	}else{
		history.go(-1);
	}
	</script>";






 ?>
