<?php 
if(isset($_GET['home'])) {
	header('homepage.php');
}else if(isset($_GET['books'])) {
	header('bookspage.php');
}
?>