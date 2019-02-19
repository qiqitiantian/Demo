<?php
    header("content-Type:text/html;charset=utf-8");
    date_default_timezone_set("PRC");

    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];

    $conn = mysql_connect("localhost","root","root");

    if (!$conn){
		echo"<script>alert('数据库信息错误，请稍后再试！')</script>";
        header("location:index.html");
		return;
	}

    mysql_select_db("user");

    $sql = "select * from persons where name = '{$username}'";

    $result = mysql_query($sql,$conn);

    if(mysql_fetch_array($result)){
		echo "<script>alert('用户名已存在！');history.go(-1);</script>";
		exit;
	}

    $time = date('y-m-d h:i:s',time());

	$sql = "insert into Persons(Name,password,reg_time) values
			('{$username}','{$password}','{$time}')
			";

    if (mysql_query($sql,$conn) === TRUE) {
	    echo "<script>alert('注册成功!');history.go(-1)</script>";
	} else {
	    echo "<script>alert('注册失败,请重试!');history.go(-1)</script>";
	    return;
	}
    mysql_close($conn);


 ?>
