<?php
require 'connectiontodatabase.php';
if(count($_COOKIE) <= 2){
	die('Oops ! your session has been closed,try login again.');
}else {
$name = $_COOKIE['name'];
$uname = $_COOKIE['username'];
$q = "select * from loginpeople where username = '".$uname."'";
$result = mysqli_query($con,$q);
if(@ mysqli_num_rows($result) == 0){
	$query = "INSERT INTO loginpeople VALUES ('".$name."','".$uname."')";
	if(mysqli_query($con,$query)){}else { die('Oops! something wrong happend at our end. try login again.');}
}
}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="jam.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="header">
<?php
 echo '<div style="position: absolute; float:left; width:30%; height:100%;"><div style="float:left; width:70px; height:100%;"><img src="userfiles/'.$uname.'/userimg.jpg" class = "loginimg" width="60" height="60"></img></div>
 <div style="position: absolute; margin-left: 80px; float:left; width:320px; height:100%;"><p style="margin-top:15px; font-size:22px;"><i>'.$name.'<br><a href="myaccount.php" style="margin-top:1px;">My Account</a></i></p></div> 
 </div>';
?>
<div style="margin-left: 400px; width:50%; height:100%; position:absolute; float:left;">
	<h1 class="heading">StudentNet</h1>
</div>
<div style="margin-left: 1060px; width:20%; height:100%; position:absolute; float:left;">
   <form action="logoutpage.php">
	<button id="b1"style="position: absolute; margin-left: 150px;"><b>Logout</b></button>
	</form>
</div>


</div>


<div class="header" style="height:40px; top:92px;">
 <input type="text" placeholder="Search" class="icon" >
 <button id="b2" style="position: absolute; margin-left:5px; top: 3px;"><b>Search</b></button>
</div>


</div>
<div class="sideleft"><!-- side wala division -->
<form action="leftsidebar.php" method="GET">
<button id="sidebutton" style="margin-top:1px;" name="home"><b>Home</b></button>
<button id="sidebutton" style="margin-top:51px;" name="sessions"><b>Sessions</b></button>
<button id="sidebutton" style="margin-top:101px;" name="myuploads"><b>My Uploads</b></button>
<button id="sidebutton" style="margin-top:151px;" name="alluploads"><b>All Uploads</b></button>
<button id="sidebutton" style="margin-top:201px;" name="ask&answer"><b>Ask & Answer</b></button>
<button id="sidebutton" style="margin-top:251px;" name="books"><b>Books</b></button>
</form>
</div>
 

<div class="main"><!-- middle one -->
<h2 style="margin-top: 1px; margin-left: 5px; margin-bottom: 1px;">Announcements</h2>
<textarea class="icon" style="margin-top: 3px; margin-left:7px; margin-right:5px; width: 765px; height: 150px;"></textarea>
</div>

<div class="sideright"> <!--for right sidebar-->
	<button id="sidebutton" style="margin-top:1px;">Chat</button>
	<button id="sidebutton" style="margin-top:51px;">All People</button>
	<form id="formlist" method="GET" action="chatpageinbetween.php">
       <script type="text/javascript">
       var id1 = setInterval(listfunction , 1000);
       function listfunction() {
       if(window.XMLHttpRequest){
	       var xhttp = new XMLHttpRequest();
       }else {
	       var xhttp = new ActiveXObject('Microsoft.XMLHttp');
       }
       xhttp.onreadystatechange = function () {
       	document.getElementById('formlist').innerHTML = this.responseText;
       }
       xhttp.open("GET","onlinepeople.php",false);
       xhttp.send();
       }
       </script>		 
		 <?php
		 /*if(!file_exists('userfiles/'.$uname.'/friends.txt')) {
		 	$handle = fopen('userfiles/'.$uname.'/friends.txt','w') or die('could not create file');
		 	fclose($handle);
		 }
		 $handle = fopen('userfiles/'.$uname.'/friends.txt','r');
		 if(filesize('userfiles/'.$uname.'/friends.txt') > 0) {
		 $data = fread($handle, filesize('userfiles/'.$uname.'/friends.txt'));
		 $name_array = explode(',',$data);
		 fclose($handle);
		 $x=101;
		 $y = 0;
		 if(sizeof($name_array)>0){
		 foreach($name_array as $d){
			 $arr = explode('~',$d);
			 echo '<button name="'.$y.'" id="sidebutton" style="margin-top: '.$x.'px; text-align: left;"><img src="userfiles/'.$arr[1].'/userimg.jpg" class = "loginimg" width="32" height="32"></img><h4 style="position: absolute; bottom: 10px; left: 50px; font-size: 16px; margin-bottom: 5px;">'.$arr[0].'<h4></button>';	 
			 $x = $x+50;
			 $y=$y+1;	 
		 }}}*/
		 ?>
	</form>
</div>

<div id="footer">
<p>this page is made for students of nit sikkim. on our private network for our social communication and interactions of teachers and students in our collage. </p>
</div>

</body>
</html>
</div>