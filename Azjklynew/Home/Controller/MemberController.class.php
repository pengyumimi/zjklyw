<?php
namespace Home\Controller;
use Think\Controller;
use Think\Exception;
class MemberController extends CommonController{

    public function  index(){
        $this->display(reg);
    }
	//调用页面方法
	public function logins(){
		 $this->display(signin);
	}

	//传参方法
	public function login(){

		if($_POST){
			$username=$_POST["username"];
			$password=$_POST["password"];

			if(!trim($username)){
				return  show(0,'用户名不能为空');
			}
			if(!trim($password)){
				return show(0, '密码不能为空');
			}
			$ret= D('Member')->modelogin($username);
			// $ret=M(member)->find($username);
			// $ret= $Momed->('member')->login();
			// print_r($ret);
			if($ret['username'] != $username || getMd5Password($password) != $ret['password']){
				return show(0,'用户名或者密码错误');
			}
			else {
				//session('memusername',$ret['username']);
				session('homeUser', $ret);
				//dump ($ret['username']);
				//return show(1,'登录成功');
				// dump ($_SESSION);
				return show(1,'登录成功');
			}
		}

	}

	//退出登录
	public function loginout() {
	    session('homeUser', null);
        $this->redirect('/index.php');
        if(session == ''){

        }

	}
//注册
public function  regist(){

        if($_POST){
           $username=$_POST["username"];
           $password=$_POST["password"];
          
           //$password= getMd5Password($_POST['password']);
           //print_r($password);exit;
         $_POST['password'] = getMd5Password($_POST['password']);
           $row=M("member")->where('username="'.$username.'"')->find();
           if($row>0){
            return  show(0,'用户名已经存在');
          }
        else{
          $ret= M("member")->add($_POST);
             //print_r($ret);exit;
             return show(1,'注册成功');
         }    //getMd5Password($_POST['password']);
       
        }else{
            $this->display(register);
        }

        }
    
}

    
  