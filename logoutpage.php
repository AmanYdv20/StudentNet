<?php
require 'connectiontodatabase.php';
setcookie('name',$r['name'],time()-86400);
setcookie('username',$r['username'],time()-86400);
setcookie('batch',$r['batch'],time()-86400);
setcookie('roll_no',$r['roll_no'],time()-86400);
setcookie('branch',$r['branch'],time()-86400);
setcookie('designation',$r['designation'],time()-86400);
setcookie('gender',$r['gender'],time()-86400);
$uname = $_COOKIE['username']; 
$query = "DELETE FROM loginpeople WHERE username = '".$uname."'";
mysqli_query($con,$query);
header('Location: index.php');
?>