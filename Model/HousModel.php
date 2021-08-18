<?php
include_once("ExecutionModel.php");
class house{
	public $ex;
	
	function __construct(){
		$this->ex = new ExecutionModel();
	}
	
	function insertHouse($pric,$yearsOfconstruction,$Description,$Surface,$Level,$UserID,$country,$gender){
		$sql="INSERT INTO `house`(`Price`, `YearOfConstruction`, `House_description`, `surface`, `level`, `UserID`, `codeCity`, `codeProperty`, `codeType`)
		VALUES ('$pric','$yearsOfconstruction','$Description','$Surface','$Level','$UserID','$country','$gender','1')";
		$true=mysqli_query($this->ex->con,$sql);
		if($true){
			return true;
		}
		else{
			return false;
		}
	}
	
	function updateAHOUse($houseid,$arr){
		$sql="update house set  housename='$arr' where houseId='$houseid'";
		$true=$this->ex->con($sql);
		return $true;
	}
	
	function getHouseInfo($houseID){
		$i=0;
		$arr=array();
		$sql="select * from house,images,house_city,house_property,housetype where house.HouseID=images.HouseID
        and house.codeCity=house_city.codeCity and house.codeProperty=house_property.codeProperty and house.codeType=housetype.codeType
			and    house.HouseID=$houseID";
		$result=mysqli_query($this->ex->con,$sql);
		if($result!=null){
			while($row=mysqli_fetch_assoc($result)){
				//
				$arr[$i]=$row;
			
				$i++;
				
			}
			return $arr;
		}
		return null;
	}
	
	public function getVillage($ville,$start,$end){
		$i=1;
		$arr=array();
		$sql="select * from house,images,house_city,house_property,housetype where house.HouseID=images.HouseID
        and house.codeCity=house_city.codeCity and house.codeProperty=house_property.codeProperty and house.codeType=housetype.codeType and house_city.description_City='$ville'
        GROUP By house.HouseID limit $start , $end ";
		$result=mysqli_query($this->ex->con,$sql);
		if($result!=null){
		while($row=mysqli_fetch_assoc($result)){
							$arr[$i]=$row;
						
							$i++;
		}
		return $arr;
		}
		return null;
		
	}
	
	function deleteHouse($id){
		$sql="delete from house where houseid=$id";
		$result=mysqli_query($this->ex->con,$sql);
		if($result){
			return true;
		}
		else{
			return false;
		}
	}
	
	function getAllHouse($userID,$start,$end){
		$arr=array();
		//$sql="select * from house,images where UserID='$userID'";
		$sql="select * from house,images,house_city,house_property,housetype where house.HouseID=images.HouseID
        and house.codeCity=house_city.codeCity and house.codeProperty=house_property.codeProperty and house.codeType=housetype.codeType
        and UserID=$userID GROUP By house.HouseID limit $start , $end";
		$i=0;
		$result=mysqli_query($this->ex->con,$sql);
	if($result!=null){
		while($row=mysqli_fetch_assoc($result)){
			//
			$arr[$i]=$row;
		
			$i++;
			
		}
		return $arr;
	}return null;
		
	}
	
	function getHouseCountry(){
		//$arr=array();
		$i=0;
		$sql="select * from house_city";
		$result=mysqli_query($this->ex->con,$sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$arr[$i]=$row;
			$i++;
		}
		//header("Location:yes");
		return $arr;
		
	}
	
	function insertImage($houseId,$imageSrc,$imageName){
		$sql="Insert into images(ImageSrc,HouseID,imaGeName) values('$imageSrc','$houseId','$imageName')";
		$result=mysqli_query($this->ex->con,$sql);
	}
	
	function getAllHouses($start,$end){
		
		$i=1;
		$sql="select * from house,images,house_city,house_property,housetype where house.HouseID=images.HouseID
        and house.codeCity=house_city.codeCity and house.codeProperty=house_property.codeProperty and house.codeType=housetype.codeType
        GROUP By house.HouseID limit $start , $end";
		//$sql="select * from house";		
		$result=mysqli_query($this->ex->con,$sql);
		if(mysqli_num_rows($result) > 0){
				while($row=mysqli_fetch_assoc($result)){
							$arr[$i]=$row;
						//	var_dump($arr);
							$i++;
				}
		return $arr;
		}
		else{return null;}
	}
	
	function returnHouseID(){
		$sql="SELECT * FROM house WHERE HouseID=(SELECT max(HouseID) FROM house)";
		$result=mysqli_query($this->ex->con,$sql);
		$row=mysqli_fetch_assoc($result);
		return $row['HouseID'];
	}
}

?>
