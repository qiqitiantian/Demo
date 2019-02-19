<?php
    header("Content-type:text/html;charset=utf-8");
    date_default_timezone_set("PRC");
    $name = $_COOKIE['username'];

    $conn = mysql_connect("localhost","root","root");

    if (!$conn){
        echo"<script>alert('数据库信息错误，请重新登录！')</script>";
        header("location:index.html");
        return;
    }

    mysql_select_db("info1");

    $sql = "select * from persons";

    $result = mysql_query($sql,$conn);
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
     <head>
         <meta charset="utf-8">
         <title>showPersons</title>
         <link rel="stylesheet" href="css/showPersons.css">
     </head>
     <body>
         <table border="1" cellspacing="0">
             <tr>
                 <th colspan="9" align="center" height="50">人员信息展示[欢迎你：<font color="blue"><?php echo $name?></font>  ]</th>
             </tr>
             <tr>
                 <th width="30">Id</th>
                 <th width="100">Name</th>
                 <th width="100">Class</th>
                 <th width="150">Phone</th>
                 <th width="150">Email</th>
                 <th width="300">Word</th>
                 <th width="100">Lover</th>
                 <th width="30">Sex</th>
                 <th width="150">Reg_time</th>
             </tr>
             <?php
                 while($row = mysql_fetch_array($result)) {
                     $sex = substr($row['Sex'],0,3);
                     echo "<tr>";
                          echo "<td align='center'>{$row['id']}</td>";
                          echo "<td align='center'>{$row['Name']}</td>";
                          echo "<td align='center'>{$row['Class']}</td>";
                          echo "<td align='center'>{$row['Phone']}</td>";
                          echo "<td align='center'>{$row['Email']}</td>";
                          echo "<td align='center'>{$row['Word']}</td>";
                          echo "<td align='center'>{$row['Lover']}</td>";
                          echo "<td align='center'>{$sex}</td>";
                          echo "<td align='center'>{$row['reg_time']}</td>";
                      echo "</tr>";
                 }
              ?>
              <tr>
                  <td colspan="1"> <input type="button" onclick="window.location.href='addPersons.html'" name="" value="新增"></td>
                  <td colspan="1"> <input type="button" onclick="window.location.href='zhaoliying.html'" name="" value="退出"></td>
              </tr>
         </table>
     </body>
 </html>
