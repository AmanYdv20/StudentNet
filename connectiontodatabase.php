<?php 
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'user');
function ip_exist($ip){
	global $con;
	$query="SELECT `ipaddress` FROM `hit_ip` WHERE `ipaddress`='".$ip."'";
	$result=mysqli_query($con,$query);
	if(@ mysqli_num_rows($result)==0){
     return false;
   }else{
     return true;   
   }
}
function update_hit_count(){
   global $con;   
   $query="SELECT `count` FROM `hit_count`";
   if($result=mysqli_query($con,$query)){
      $row=mysqli_fetch_assoc($result);
      $count=$row["count"];
      $count++;
      $query="UPDATE `hit_count` SET `count`=".$count." ";
      mysqli_query($con,$query);
   } 
}
function update_ip($ip){
	global $con;
   $query="INSERT INTO `hit_ip` VALUES (0,'".$ip."')";
   if(mysqli_query($con,$query)){
   echo 'successfully added ip';
   return true;
   }
}
?>