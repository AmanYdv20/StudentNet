<?php 
require 'connectiontodatabase.php';
$userip=$_SERVER['REMOTE_ADDR'];
if(!(ip_exist($userip))){
	global $userip;
  update_ip($userip);
  update_hit_count();     
}else echo 'ip address already in database';
?>