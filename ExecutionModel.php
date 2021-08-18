<?php
class ExecutionModel{
	public $con;
	
	function __construct(){
		$idcon = mysqli_connect("localhost","root","","project");
		if(!$idcon){
			die();
		}
		$this->con = $idcon;
	}
}
?>