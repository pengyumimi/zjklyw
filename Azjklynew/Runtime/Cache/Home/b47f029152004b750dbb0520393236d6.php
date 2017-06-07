<?php if (!defined('THINK_PATH')) exit();?>

 </!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
  <?php if(is_array($result['arr'])): $i = 0; $__LIST__ = $result['arr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["title"]); endforeach; endif; else: echo "" ;endif; ?>
 </body>
 </html>