<?php
	require("config/db_config.php");
	header("Content-Type: text/html;charset=utf-8"); 
	//session_start();//登录状态
	$user = $_POST["_username"];  
	$psw = $_POST["_password"];
	if($user == "" || $psw == "")  
	{
		echo json_encode(array("msg"=>"请输入用户名或密码！", "result"=>"0"));
	}
	else
	{
		$mysqli = mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
		$mysqli->query("set names utf8");//**设置字符集***
		$sql = "select name from user where name = '$user'"; //SQL语句  
		$result = $mysqli->query($sql); 
        if ($result->num_rows > 0) {
        	$sql_insert = "update user set password='$psw' where name = '$user'";  
            $res_insert = $mysqli->query($sql_insert);  
            //$num_insert = mysql_num_rows($res_insert);  
            if($res_insert)  
            {  
                echo json_encode(array("msg"=>"恭喜！修改成功！", "result"=>"1"));
            }  
            else  
            {  
                echo json_encode(array("msg"=>"系统繁忙，请稍后重试。", "result"=>"2"));
            }  
           
        }else{  
            echo json_encode(array("msg"=>"该手机号未被注册", "result"=>"3"));
        }  
	}
  
?>  