<?php 
require 'connectiontodatabase.php';
$string="please fill all the fields correctly";
if(isset($_POST['name'])&&isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['repassword'])&&isset($_POST['branch'])&&isset($_POST['collage'])&&isset($_POST['email'])&&isset($_POST['designation'])&&isset($_POST['batch'])&&isset($_POST['rollno'])){
	if($_POST['designation']=='teacher'){
	   if(!empty($_POST['name'])&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['repassword'])&&!empty($_POST['branch'])&&!empty($_POST['collage'])&&!empty($_POST['email'])){
        global $con;        
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $repassword=md5($_POST['repassword']);
        $gender=$_POST['gender'];
        if($gender == 'male'){
		        $gender='m';
	        }else {
		        $gender='f';
        }
        $branch=$_POST['branch'];
        $collage=$_POST['collage'];
        $email=$_POST['email'];
        $designation='t';
        $query="INSERT INTO user_info VALUES (0,'".$name."','".$gender."','".$username."','".$password."','".$designation."','','','".$branch."','".$email."','".$collage."')";
        if($password == $repassword){
	        if(mysqli_query($con,$query)){
	        	  if($gender == 'm') {   
		           if(mkdir('userfiles/'.$username.'') && mkdir('userfiles/'.$username.'/private') && mkdir('userfiles/'.$username.'/public') && copy('maleuser.jpg','userfiles/'.$username.'/userimg.jpg') && copy('security.php','userfiles/'.$username.'/index.php') && copy('security.php','userfiles/'.$username.'/public/index.php')&& copy('security.php','userfiles/'.$username.'/private/index.php')) {
			           $string= 'account successfully created';
		           }
	           }else {
					  if(mkdir('userfiles/'.$username.'') && mkdir('userfiles/'.$username.'/private') && mkdir('userfiles/'.$username.'/public') && copy('femaleuser.jpg','userfiles/'.$username.'/userimg.jpg' && copy('security.php','userfiles/'.$username.'/index.php') && copy('security.php','userfiles/'.$username.'/public/index.php')&& copy('security.php','userfiles/'.$username.'/private/index.php'))) {
			           $string= 'account successfully created';
		           }         
	           }
           }
        }else {
	        $string = 'passwords entered not match';
        }
        
	   }else {
        $string = 'please fill in all the fields';	   
	   }
   }else if($_POST['designation']=='student'){
   	if(!empty($_POST['name'])&&!empty($_POST['username'])&&!empty($_POST['password'])&&!empty($_POST['repassword'])&&!empty($_POST['branch'])&&!empty($_POST['collage'])&&!empty($_POST['email'])&&!empty($_POST['batch'])&&!empty($_POST['rollno'])){
        global $con;        
        $name=$_POST['name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $repassword=md5($_POST['repassword']);
        $gender=$_POST['gender'];
        if($gender == 'male'){
		        $gender='m';
	        }else {
		        $gender='f';
        }
        $branch=$_POST['branch'];
        $collage=$_POST['collage'];
        $email=$_POST['email'];
        $designation='s';
        $batch=$_POST['batch'];
        $rollno=$_POST['rollno'];
        $query="INSERT INTO user_info VALUES (0,'".$name."','".$gender."','".$username."','".$password."','".$designation."','".$batch."','".$rollno."','".$branch."','".$email."','".$collage."')";    	
        if($password == $repassword){
        	if(mysqli_query($con,$query)){
        	  if($gender == 'm') {
	        	  if(mkdir('userfiles/'.$username.'') && mkdir('userfiles/'.$username.'/private') && mkdir('userfiles/'.$username.'/public') && copy('maleuser.jpg','userfiles/'.$username.'/userimg.jpg') && copy('security.php','userfiles/'.$username.'/index.php') && copy('security.php','userfiles/'.$username.'/public/index.php')&& copy('security.php','userfiles/'.$username.'/private/index.php')) {
		           $string= 'account successfully created';
	           }   
           }else {
           	  if(mkdir('userfiles/'.$username.'') && mkdir('userfiles/'.$username.'/private') && mkdir('userfiles/'.$username.'/public') && copy('femaleuser.jpg','userfiles/'.$username.'/userimg.jpg') && copy('security.php','userfiles/'.$username.'/index.php') && copy('security.php','userfiles/'.$username.'/public/index.php')&& copy('security.php','userfiles/'.$username.'/private/index.php')) {
		           $string= 'account successfully created';
	           }
           }     
        }
        }else {
				echo 'passwords do not match';       
        } 
	     }else {
        $string= 'please fill in all the fields';	   
	     }   	
   	}
   }
?>
<link rel="stylesheet" href="loginstyle.css">
<div style="
background-color: rgba(255, 255, 255, 0.5);
	width: 500px;
	height: 720px;
align-self: center;
margin-top: 30px;
margin-left: 450px;
align-content: center;
align-items: left;
text-align: left;
padding-top: 1px;
padding-bottom: 10px;
border-radius: 25px;">
<p id="p1" style="margin-left: 170px;"><u>StudentNet</u></p>
<p align="center"><?php echo $string."<br>"; ?></p>
<form action="signuppage.php" method="POST">
<p style="margin-left: 100px;">
name: <input type="text" name="name" style="margin-left: 102px;" maxlength="50" required><br><br>
username:<input type="text" name="username" style="margin-left: 80px;" maxlength="50" required><br><br>
password:<input type="password" name="password" style="margin-left: 80px;" maxlength="100" required><br><br>
re-enter password:<input type="password" name="repassword" style="margin-left: 25px;" maxlength="100" required><br><br>
branch: <select name="branch" class="button3" style="margin-left: 92px;"><option>cse</option><option>ec</option><option>ce</option><option>ee</option><option>bt</option><option>chem</option><option>phy</option></select><br><br>
gender: <select name="gender" style="margin-left: 90px;" class="button3"><option>male</option><option>female</option></select><br><br>
collage: <select name="collage" style="margin-left: 90px;" class="button3"><option>nit sikkim</option><option>other</option></select><br><br>
email address: <input type="text" name="email" style="margin-left: 50px;" maxlength="30" required><br><br>
designation:<select name="designation" style="margin-left: 70px;" class="button3"><option>teacher</option><option>student</option></select><br><br>
batch(student):<input type="text" name="batch" style="margin-left: 50px;"><br><br>
roll number(student):<input type="text" name="rollno" maxlength="10"><br><br><br>
<input type="submit" value="Submit" class="button1" style="width: 320px; height: 40px;">
</p>
</form>
<form action="index.php">
<input type="submit" value="Login Page" class="button1" style="width: 320px; height: 40px; margin-left: 100px;">
</form>
</div>