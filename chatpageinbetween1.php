<?php
setcookie('chatman',key($_GET),time()+24*60*60);
echo $_COOKIE['chatman'];
header('Location: chatpage.php');
?>