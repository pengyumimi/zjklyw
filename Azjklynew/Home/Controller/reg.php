<?php
//首先是获取到了数据
$username=$_POST['_username'];
$password=$_POST['_password'];

echo json_encode(array("msg"=>$username, "result"=>"0"));
?>