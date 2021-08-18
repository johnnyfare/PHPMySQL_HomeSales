<?php
include("../Model/UserModel.php");
	
class Controller{
	private $userModel;
	function __construct(){
		$this->userModel= new user();
		
	}
	public function login($email,$password){
		$id=$this->userModel->checkUser($email,$password);
		if($id['User_ID']!=null){
			session_start();
			$_SESSION['user']=$id['User_ID'];
			$arr=json_encode($id);
			
			//echo $id;
			//header("Location:Controller/HouseControler.php");
			//var_dump($arr);
			return $arr;
		}
		else{
			return null;
		}
		
	}
	
	public function signIn($username,$password,$email,$number,$address){
		$result=$this->userModel->insertUSer($username,$password,$email,$number,$address);
		return $result;
	}
	
	public function checkUserLogin(){
		session_start();
		if(isset($_SESSION['user'])){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function checkRegex($email){
		if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i",$email)){
			return true;
		}
		else{return false;
		}
	}
	public function logout(){
		session_start();
		unset($_SESSION['user']);
		session_destroy();
		header("Location:../View/LogIn.php");
	}
	/*php Android*/
	
}


if(isset($_GET['loginAndroid'])){
		$House = new Controller();
		$username=htmlspecialchars($_GET['username']);
		$password=htmlspecialchars($_GET['password']);
		$result=$House->login($username,$password);
		echo $result;
	}
	
	
else if(isset($_GET['SignInAndroiD'])){
		$username=htmlspecialchars($_GET['username']);
		$email=htmlspecialchars($_GET['EmaiL']);
		$Password=htmlspecialchars($_GET['password']);
		$address=htmlspecialchars($_GET['address']);
	$number=htmlspecialchars($_GET['Number']);
	
		$House = new Controller();
/* 		$username=$_GET['username'];
		$password=$_GET['password']; */
		$House->signIn($username,$Password,$email,$number,$address);
		
	}
	
else if(isset($_POST['signIn'])){
	$name=htmlspecialchars($_POST['name']);
	$password=htmlspecialchars($_POST['password']);
	$email=htmlspecialchars($_POST['email']);
	$number=htmlspecialchars($_POST['number']);
	$address= htmlspecialchars($_POST['address']);
	$House= new Controller();
	$result=$House->signIn($name,$password,$email,$number,$address);
	if($result){
		header("Location:../View/LogIn.php");
	}
	else{
		header("Location:../View/Signin.php?missingError=true");
	}
}
else if(isset($_GET['logout'])){
	$house=new Controller();
	$house->logout();
}

else	if(isset($_POST['login'])){
	$email=htmlspecialchars($_POST['email']);
	$password=htmlspecialchars($_POST['password']);
	$house= new Controller();
	$result=$house->login($email,$password);
	if($result!=null){
		header("Location:../View/allHouses.html");
	}
	else{
		header("Location:../View/LogIn.php?missingError=true");
	}
}
	
?>