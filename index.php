<?php
include("Controller/Controller.php");

if(isset($_POST['login'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	$c= new Controller();

	$c->login($email,$password);
	exit();
}

if(isset($_POST['signIn'])){
	$name=$_POST['name'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$number=$_POST['number'];
	$address= $_POST['address'];
	$c = new Controller();
	$c->signIn($name,$password,$email,$number,$address);
}

if(isset($_GET['homepage'])){
	header("Location:View/news.php");
}

if(isset($_GET['error'])){
	header("Location:View/logIn.php?erro=missingInfo");
}
if(isset($_GET['houseid'])){
	header("Location:View/house.html?houseid=".$_GET['houseid']);
}

include("View/logIn.php");
?>