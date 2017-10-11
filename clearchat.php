<?php 
if(isset($_POST['clearchat'])) {
   	$handle = fopen($filename,'w');
	   fwrite($handle,'');
	   fclose($handle);
	   header('Location: chatpage.php');
} 
?>