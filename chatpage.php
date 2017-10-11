<?php
if(count($_COOKIE) <= 2){
	die('Oops ! your session has been closed, try login again.');
}
$name = $_COOKIE['name'];
$uname = $_COOKIE['username'];
$u2name = $_COOKIE['chatman'];
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
	<button id="b1"style="position: absolute; margin-left: 150px;"><b>Logout</b></button>
</div>
<script type="text/javascript">
	var logoutbutton = document.getElementById('b1');
	logoutbutton.addEventListener('click',function () {
		window.location = 'index.php';
	})
</script>
</div>


<div class="header" style="height:40px; top:92px;">
 <input type="text" placeholder="Search" class="icon" >
 <button id="b2" style="position: absolute; margin-left:5px; top: 3px;"><b>Search</b></button>
</div>


</div>
<div class="sideleft"><!-- side wala division -->
<button id="sidebutton" style="margin-top:1px;" onclick="f1()"><b>Home</b></button>
<button id="sidebutton" style="margin-top:51px;"><b>Sessions</b></button>
<button id="sidebutton" style="margin-top:101px;"><b>My Uploads</b></button>
<button id="sidebutton" style="margin-top:151px;"><b>All Uploads</b></button>
<button id="sidebutton" style="margin-top:201px;"><b>Ask & Answer</b></button>
<button id="sidebutton" style="margin-top:251px;"><b>Books</b></button>
<script type="text/javascript">
function f1() {
	window.location = 'homepage.php';
}
</script>
</div>
 

<div class="main"><!-- middle one -->
	<?php echo '<h2 style="position: static; top: 5px; margin-left: 7px; font-size: 25px; margin-top: 5px; margin-bottom:2px;">'.$u2name.'</h2>';
	$filename = '';
	if(file_exists('chats/'.$uname.'~'.$u2name.'.txt')) {
	  $filename = 'chats/'.$uname.'~'.$u2name.'.txt';
	}else if(file_exists('chats/'.$u2name.'~'.$uname.'.txt')){ 
	  $filename = 'chats/'.$u2name.'~'.$uname.'.txt';
	}else {
	  $handle = fopen('chats/'.$uname.'~'.$u2name.'.txt','w') or die('could not create file');
	  fclose($handle);
	  $filename = 'chats/'.$uname.'~'.$u2name.'.txt';
	}
	?>
	<form action="chatpage.php" method="POST">
	<textarea id="chatarea" class="icon" style="margin-top: 5px; margin-left:7px; margin-right:5px; width: 765px; height: 350px;">
	</textarea>
	<p style="margin-left: 7px; margin-top:1px;">Enter Message : <input type="text" name="chatter" class="icon" style="margin-top: 5px; margin-left:7px; margin-right:5px; width:622px; " />
   </form>	 
   <form action="clearchat.php" method="POST">
	 <input type="submit" name="clearchat" value="clear chat" id="b1" style="position: absolute; float: left; bottom: 45px; left: 7px; width: 90px;"/></p>
   </form>	
   <?php 
	   if(isset($_POST['chatter']) && !empty($_POST['chatter'])){
	   $message = $_POST['chatter'];
	   $handle = fopen($filename,'a');
	   fwrite($handle,'['.$name.']: '.$message.'&#10');
	   fclose($handle);}
   ?>
	<script type="text/javascript">
		var id=setInterval(fun,500);
		function fun(){
		var xhttp=new XMLHttpRequest();
		xhttp.onreadystatechange=function () {
		if(this.readyState==4 && this.status==200){
		document.getElementById('chatarea').innerHTML = this.responseText;
		}
		};
		xhttp.open("POST","<?php echo $filename;?>",true);
		xhttp.send();}
	</script>
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