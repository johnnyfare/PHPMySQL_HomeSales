<?php
include_once("ExecutionModel.php");
class Meeting{
	public $ex;
	
	function __construct(){
		$this->ex = new ExecutionModel();
	}
	
	function ChooseAFreeEmployee($Time,$Date){
		$sql="SELECT employee.EmployeeID from employee where employee.EmployeeID NOT IN (select meeting.EmployeeID from meeting where meeting.Time='$Time' and meeting.Date='$Date')";
		$true=mysqli_query($this->ex->con,$sql);
		$row = mysqli_fetch_assoc($true);
		return $row['EmployeeID'];
	}
	
	function insertMeeting($Time,$Date,$UserID,$Houseid){
		$employee=$this->ChooseAFreeEmployee($Time,$Date);
		$sql="INSERT INTO `meeting`(`Time`, `Date`, `UserID`, `Houseid`, `EmployeeID`) 
		VALUES ('$Time','$Date','$UserID','$Houseid','$employee')";
		$true=mysqli_query($this->ex->con,$sql);
		if($true){
			return true;
		}
		else{
			return false;
		}
	}
	
	function getMeetings($userId,$start,$end){
		$i=0;
		$arr = array();
		$sql="select * from meeting,employee where UserID='$userId' and meeting.Date>=CURRENT_DATE and meeting.EmployeeID=employee.EmployeeID limit $start,$end";
		$use=mysqli_query($this->ex->con,$sql);
		if($use){
		while($row=mysqli_fetch_assoc($use)){
			$arr[$i]=$row;
			$i++;
		}
		return $arr;
		}return null;
	}
	
	function getMeetingId($userId){
		$sql="select max(MeetingID) from meeting where UserID=$userId";
		$result=mysqli_query($this->ex->con,$sql);
		$row=mysqli_fetch_assoc($result);
		return $row['max(MeetingID)'];
		
	}
	
	function getMeetingDeaatails($meetingh){
		$sql="select * from meeting,employee where meeting.EmployeeID = employee.EmployeeID
        and meeting.MeetingID =$meetingh";
		$arr=mysqli_query($this->ex->con,$sql);
		$result=mysqli_fetch_assoc($arr);
		return $result;
	}
	
	function deleteMeeting($meeting){
		$sql="delete from meeting where MeetingID=$meeting";
		mysqli_query($this->ex->con,$sql);
	}
}
?>