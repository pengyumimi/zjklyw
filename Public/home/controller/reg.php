<?php
	require("config/db_config.php");
	header("Content-Type: text/html;charset=utf-8"); 
	//session_start();//登录状态
	$user = $_POST["_username"];  
	$psw = $_POST["_password"];
	$corporate_name = $_POST["_corporate_name"];
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
            echo json_encode(array("msg"=>"该用户名已经被注册", "result"=>"3"));
        }else{  
            $sql_insert = "insert into user (name,password) values('$user','$psw')";  
            $res_insert = $mysqli->query($sql_insert);  
            //$num_insert = mysql_num_rows($res_insert);  
            if($res_insert)  
            {  
                echo json_encode(array("msg"=>"恭喜！注册成功！", "result"=>"1"));
            }  
            else  
            {  
                echo json_encode(array("msg"=>"系统繁忙，请稍后重试。", "result"=>"2"));
            }  
        }  
		//$mysqli =new MySQLi("localhost","root","","ssosch");
//		$sql = "select * from web_user where (name = '$user') and (password = '$psw')";
//		$result = $mysqli->query($sql);
//		if ($result->num_rows > 0) {
//			while ($attr = $result->fetch_row()){ //将数据以索引方式储存在数组中
//				$_SESSION['user'] = $attr[1];//将用户名赋值到session
//				$_SESSION['id'] = $attr[0];//将用户名id赋值到session
//				echo json_encode(array("msg"=>"登陆成功！", "dm"=>"1", "id"=> $_SESSION['id'], "name"=> $_SESSION['user']));//返回到前台数据
//			}
//		}else{  
//			echo json_encode(array("msg"=>"用户名或密码不正确！", "dm"=>"2"));
//		}  
	}
  
?>  