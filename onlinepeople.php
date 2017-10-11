<?php 
require 'connectiontodatabase.php';
$query = "SELECT * FROM loginpeople";
$result = mysqli_query($con,$query);
$n=$_COOKIE['name'];
$x=101;
$y = 0;
if(@ mysqli_num_rows($result) > 1) {
while($r = mysqli_fetch_assoc($result)) {
	if($r['name'] != $n) {
	echo '<button name="'.$r['username'].'" id="sidebutton" style="margin-top: '.$x.'px; text-align: left;"><img src="userfiles/'.$r['username'].'/userimg.jpg" class = "loginimg" width="32" height="32"></img><h4 style="position: absolute; bottom: 10px; left: 50px; font-size: 16px; margin-bottom: 5px;">'.$r['name'].'<h4></button>';
	$x = $x+50;
	$y=$y+1;
   }
}
}
?>