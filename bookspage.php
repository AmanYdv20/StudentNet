
<?php
die('this is bookspage');
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
<button id="sidebutton" style="margin-top:1px;" onclick="function(){ window.location = 'homepage.php';}"><b>Home</b></button>
<button id="sidebutton" style="margin-top:51px;"><b>Sessions</b></button>
<button id="sidebutton" style="margin-top:101px;"><b>My Uploads</b></button>
<button id="sidebutton" style="margin-top:151px;"><b>All Uploads</b></button>
<button id="sidebutton" style="margin-top:201px;"><b>Ask & Answer</b></button>
<button id="sidebutton" style="margin-top:251px;"><b>Books</b></button>
</div>
 

<div class="main"><!-- middle one -->
<button id="b1" >Upload A Book</button>
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
	</form>
</div>

<div id="footer">
<p>this page is made for students of nit sikkim. on our private network for our social communication and interactions of teachers and students in our collage. </p>
</div>

</body>
</html>
</div>