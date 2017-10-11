<?php 
require 'connectiontodatabase.php';
$userip=$_SERVER['REMOTE_ADDR'];
if(!(ip_exist($userip))){
	global $userip;
  update_ip($userip);
  update_hit_count();     
}
$string='';
if(isset($_POST['username'])&&isset($_POST['password'])){
	if(!empty($_POST['username'])&&!empty($_POST['password'])){
		global $con;
		$username=mysqli_real_escape_string($con,$_POST['username']);
		$password=mysqli_real_escape_string($con,md5($_POST['password']));
		$result=mysqli_query($con,"SELECT * FROM user_info WHERE username='".mysqli_real_escape_string($con,$username)."' AND password='".$password."'");
		if(@ mysqli_num_rows($result)==0){
			$string= 'invalid username/password';
		}else{
			$r =mysqli_fetch_assoc($result);
			setcookie('name',$r['name'],time()+86400);
			setcookie('username',$r['username'],time()+86400);
			setcookie('batch',$r['batch'],time()+86400);
			setcookie('roll_no',$r['roll_no'],time()+86400);
			setcookie('branch',$r['branch'],time()+86400);
			setcookie('designation',$r['designation'],time()+86400);
			setcookie('gender',$r['gender'],time()+86400);
			header('Location: homepage.php');
		}
}else{
$string= 'please enter username and password';}
}
?>
<body>
<link rel="stylesheet" href="loginstyle.css">
<div id="div1">
<p id="p1"><u>StudentNet</u></p>
<?php echo $string;?>
<form action="index.php" method="POST"><p id="p2">
username: <input type="text" name="username"><br><br>
password: <input type="password" name="password"><br><br>
<input type="submit" value="Login" class="button1" >
</form>
<form action="signuppage.php">
<input type="submit" value="create an account" class="button2">
</form>
</p>
</div>
</body>
