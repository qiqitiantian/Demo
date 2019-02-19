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
    //$sql = "select * from persons";

    $result = mysql_query($sql,$conn);

    while($row = mysql_fetch_array($result)) {
        if($username==$row['name'] && $password == $row['password']){
            echo "<script>alert('登录成功！');window.location.href='showPersons.php'</script>";
            mysql_close($conn);
    		exit;
        }
    }

    echo "<script>alert('用户名或密码错误！');history.go(-1);</script>";



 ?>
