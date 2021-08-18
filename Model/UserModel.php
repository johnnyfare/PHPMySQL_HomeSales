<?php
include("ExecutionModel.php");
class user{
	public  $ex ;
	
	function __construct(){
		$this->ex =	 new ExecutionModel();
	}

	private function getUser($email){
		$sql="select id from user where $email='$email";
		$user=$this->ex->executerRequete($sql);
		$result=mysqli_fetch_assoc($user);
		return $result['id'];
	}
	
	public function insertUSer($name,$password,$email,$number,$address){
		$sql="insert into user(UserName,UserPassword,Email,Number,address) values('$name','$password','$email','$number','$address')";
		$result=mysqli_query($this->ex->con,$sql);
		return $result;
	}
	
	public function checkUser($email,$password){
		$sql="select User_ID  from user where Email='$email' and UserPassword='$password'";
		$result=mysqli_query($this->ex->con,$sql);
		if($result){
			
			$userId=mysqli_fetch_assoc($result);
			
			return $userId;
		}
		else{
			return null;
		}
	}
}
?>