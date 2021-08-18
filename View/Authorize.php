<?php 
session_start();
if(isset($_SESSION['user'])){
	
}else{
	header("Location:index.php");
}
?>
<html>
<p>Authorized</p>
Welcome<?php echo $_SESSION['user'] ?>
<a href="index.php?logout=true">Logout</a>

</html>