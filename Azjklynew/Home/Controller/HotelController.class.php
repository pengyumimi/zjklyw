<?php
namespace Home\Controller;
use Think\Controller;
class HotelController extends CommonController {

 public function index(){
    $this->display(list_hotel);
 }

}