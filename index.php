<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

define("IMG_URL","/Public/home/img/");
define('IMG1_URL',"/Public/home/img/banner/");
define('CSS_URL','/Public/home/css/');
define("H_URL","/Home/View/Index/");
define("JS_URL","/Public/home/js/");

// 开启调试模式  部署阶段注释或者设为false
define('APP_DEBUG',false);

// 定义应用目录
define('APP_PATH','./Azjklynew/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';


