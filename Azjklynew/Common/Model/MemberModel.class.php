<?php
namespace Common\Model;
use Think\Model;

class MemberModel extends Model {
	private $_db = '';

	public function __construct() {
		$this->_db = M('member');
	}
   public function modelogin($username) {
     // $res= $this->_db->where('username"'.$username.'"')->find();
      $res = $this->_db->where('username="'.$username.'"')->find();
        return $res;
      
    }
   public function insert($date = array()){
    if (!$date || !is_array($add)) {
      return 0;
    }
    return $this->_db-add($data);
   }
   public function getMenus($data,$page,$pageSize=10) {
        $data['status'] = array('neq',-1);
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)->order('id desc')->limit($offset,$pageSize)->select();
        return $list;
    }
     public function getMenusCount($data= array()) {
        $data['status'] = array('neq',-1);
        return $this->_db->where($data)->count();
    }

  }

       