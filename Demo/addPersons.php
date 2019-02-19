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

	//连接数据库
	$conn = mysql_connect("localhost","root","root");

	if (!$conn){
		die('Could not connect: ' . mysql_error());
		return;
	}

	// // 创建数据库
	// if (mysql_query("CREATE DATABASE info1 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;",$conn)){
	//   	echo "Database created";
	//   }
	// else{
	//   	echo "Error creating database: " . mysql_error();
	//   	return;
	//   }

	// 选择数据库
	mysql_select_db("info1", $conn);

	//建表
	// $sql = "CREATE TABLE Persons
	// (
	// 	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	// 	Name varchar(15) not null,
	// 	Class varchar(15) not null,
	// 	Phone varchar(15) not null,
	// 	Email varchar(15) not null,
	// 	Word varchar(40) not null,
	// 	Lover varchar(15) not null,
	// 	Sex varchar(15) not null,
	// 	reg_time varchar(32) not null
	// )";

	// create table persons(
	// 	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	// 	name varchar(15) NOT NULL,
	// 	password varchar(15) not null,
	// 	reg_time varchar(32) not null
	// 	)

	// if (mysql_query($sql,$conn) === TRUE) {
	//     echo "Table MyGuests created successfully";
	// } else {
	//     echo "创建数据表错误: " . $conn->error;
	//     return;
	// }

	$time = date('y-m-d h:i:s',time());

	$data = "insert into Persons(Name,Class,Phone,Email,Word,Lover,Sex,reg_time) values
			('{$name}','{$class}','{$phone}','{$email}','{$word}','{$lover}','{$sex}','{$time}')
			";

	if (mysql_query($data,$conn) === TRUE) {
	    echo "<script>alert('数据已成功录入数据表!')</script>";
	} else {
	    echo "插入数据表错误: ".mysql_error();
		mysql_close($conn);
	    return;
	}

	mysql_close($conn);

	echo "<script>window.location.href='showPersons.php'</script>";

 ?>
