<?php
include("../Model/MeetingModel.php");

class HouseController{
	public $MeetingModel;
	function __construct(){
		$this->MeetingModel= new Meeting();
	}
	
	
	function getMeeting($USer,$start,$end){
		$update=$this->MeetingModel->getMeetings($USer,$start,$end);
		if($update){
			return $update;
		}
		
		return null;
	}
	public function insertMeeting($Date,$Time,$HouseID,$userid){
	$update=$this->MeetingModel->insertMeeting($Time,$Date,$userid,$HouseID);
	if($update){
		return $update;
		
	}
	else{
		return null;
	}
	}
	
	public function deleteMeeting($meet){
		$this->MeetingModel->deleteMeeting($meet);
	}
	
	public function getMeetingID($userI){
		$r=$this->MeetingModel->getMeetingId($userI);
		return $r;
	}
	
	function getMeetingDetails($meeting){
		$arr=$this->MeetingModel->getMeetingDeaatails($meeting);
		return $arr;
	}
}
session_start();
$controller= new HouseController();
//$controller->insertMeeting("2004-4-5","10:0:0",92,1);
	if(isset($_GET['arrag'])){
		header("Location:../View/Meeting.php?houseid=".$_GET['arrag']);
	}
	else if(isset($_POST['submit'])){
		$Time=htmlspecialchars($_POST['Time']);
		$TimeReal=strtotime($Time);
		$TimeStart="09:00";
		
		$houseid=$_POST['id'];
		$TimeEnd="15:00";
		$TimeStart=strtotime($TimeStart);
		$TimeEnd=strtotime($TimeEnd);
		$Date=$_POST['Date'];
		$Date2 = date("y-m-d"); 
		$dateTimestamp1 = strtotime($Date); 
		$dateTimestamp2 = strtotime($Date2); 
		if($TimeReal<$TimeStart || $TimeReal>$TimeEnd){
			header("Location:../View/Meeting.php?error1=&houseid=".$houseid);
		}
		else if($dateTimestamp1<$dateTimestamp2){
			header("Location:../View/Meeting.php?error2=&houseid=".$houseid);
		}
		else{
		$result=$controller->insertMeeting($Date,$Time,$houseid,$_SESSION['user']);
		if($result){
			
			$meetingid=$controller->getMeetingID($_SESSION['user']);
			$arr=$controller->getMeetingDetails($meetingid);
			header("Location:../View/Filter.php?Time=".$Time."&Date=".$Date."&employeename=".$arr['EmployeeName']."&employeenumber=".$arr['Telephone']);
		}
		else{
			header("Location:../View/Meeting.php?null&houseid=".$houseid);
		}}
	}
	else if(isset($_GET['meeting'])){
		header("Location:../View/Meetingid.php");
	}
	
	else if(isset($_GET['getMeeting'])){
		if(isset ($_GET['userid'])){
		$arr=$controller->getMeeting(htmlspecialchars($_GET['userid']),$_GET['page'],htmlspecialchars($_GET['page']+6));
		echo json_encode($arr);	
		}
		else{
		$arr=$controller->getMeeting($_SESSION['user'],htmlspecialchars($_GET['page']),htmlspecialchars($_GET['page']+6));
		echo json_encode($arr);
		}
	}
	else if(isset($_GET['hello'])){
		$controller->deleteMeeting(27);
	}
	else if(isset($_GET['time'])){
		$Date2 = date("y-m-d"); 
		$Date=htmlspecialchars($_GET['date']);
		$dateTimestamp2 = strtotime($Date); 
		$dateTimestamp1 = strtotime($Date2);
		if($_GET['time']>=9 && $_GET['time']<15){
			if($dateTimestamp2>=$dateTimestamp1){
				$result=$controller->insertMeeting($Date,$_GET['time'],$_GET['houseid'],$_GET['userid']);
				if($result==true){
					echo "True";
				}
				else{
					echo "Employee";
				}
			}
			else{
				echo "Date";
			}
		}
		else{
			echo "time";
		}
	}
?>