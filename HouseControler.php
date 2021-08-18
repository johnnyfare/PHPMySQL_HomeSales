<?php


include("../Model/HousModel.php");

class HouseController{
	public $houseModel;
	function __construct(){
		$this->houseModel= new house();
	}
	
	public function UpdateHouse($houseid,$houseName){
	$update=$this->houseModel->updateAHOUse($houseid,$houseName);
	if($update){
		header("Location:house.php?allfine");
		
	}
	else{
		header("Location:house.php");
	}
	}
	
	public function insertHomeS($pric,$yearsOfconstruction,$Description,$Surface,$Level,$UserID,$country,$gender){
		$insert=$this->houseModel->insertHouse($pric,$yearsOfconstruction,$Description,$Surface,$Level,$UserID,$country,$gender);
		if($insert){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function deleteAhouse($id){
		$delete=$this->houseModel->deleteHouse($id);
		if($delete){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function getHousese($userID){
		$ok=$this->houseModel->getAllHouse($userID);
		if($ok){
			return $ok;
		}
		else{
			return null;
		}
	}
	
	public function getHouseID(){
		$houseId=$this->houseModel->returnHouseID();
		return $houseId;
	}
	
	public function getPostALL($useriD,$star){
		$huoseOk=$this->houseModel->getAllHouse($useriD,$star,$star+6);
		if($huoseOk){
			
			return $huoseOk;
		}
		else{
			return null;
		}
	}
	
	public function getHousInfo($house){
		$huoseOk=$this->houseModel->getHouseInfo($house);
		if($huoseOk){
			return $huoseOk;
		}else{return null;}
		
	}
	
	public function getHouseContry(){
		$house=$this->houseModel->getHouseCountry();
		return $house;
	}
	public function getAllHousesS($starTt){

		$arr=$this->houseModel->getAllHouses($starTt,$starTt+6);
		if($arr!=null)
		return $arr;
		else
			return null;
	}
	

	
	public function insertImages($houseId,$imageSrc,$houseName){
				$this->houseModel->insertImage($houseId,$imageSrc,$houseName);
	}
	
	public function getHouseVillage($ville,$starTt){
		$arr=$this->houseModel->getVillage($ville,$starTt,$starTt+6);
		if($arr!=null)
		return $arr;
		else
			return null;
	}
}

$house=new HouseController();




if(isset($_GET['delete'])){
	if(isset($_GET['computer'])){
		$arr=$house->deleteAhouse(htmlspecialchars($_GET['delete']));
		echo "True";
	}else{
	$arr=$house->deleteAhouse(htmlspecialchars($_GET['delete']));
	header("Location:../View/posts.php");
	}
}

else if(isset($_POST['insert'])){//insert a house
session_start();
	$pric=htmlspecialchars($_POST['Price']);
	$yearsOfconstruction=htmlspecialchars($_POST['yearsOfconstruction']);
	$Description=htmlspecialchars($_POST['description']);
	$gender=htmlspecialchars($_POST['gender']);
	$country=htmlspecialchars($_POST['country']);
	$Surface=htmlspecialchars($_POST['surface']);
	$Level= htmlspecialchars($_POST['level']);
	$UserID=$_SESSION['user'];
	//echo $_POST['country'];
	//echo $UserID;
	$arr=$house->insertHomeS($pric,$yearsOfconstruction,$Description,$Surface,$Level,$UserID,$country,$gender);
	$houseId=$house->getHouseID();
	    $uploadsDir = "../ProgImaj/";//$uploadsDir = "http://localhost/NewFolder2/Tajribee/ProgImaj/";
        $allowedFileType = array('jpg','png','jpeg');
        
        // Velidate if files exist
        if (!empty(array_filter($_FILES['fileUpload']['name']))) {
            $i=0;
            // Loop through file items
            foreach($_FILES['fileUpload']['name'] as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['fileUpload']['name'][$id];
				$fileName=explode(".",$fileName);
				$fileName=$fileName[0].$houseId."-".$i.".".$fileName[1];
                //var_dump($fileName);
				$tempLocation    = $_FILES['fileUpload']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;
				//echo $fileName;
                if(in_array($fileType, $allowedFileType)){
					
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                            
                        } 
                    
                }
				$targeth=str_replace("../","http://localhost/NewFolder2/Tajribee/",$targetFilePath);
				
				$house->insertImages($houseId,$targeth,$fileName);
                // Add into MySQL database
			$i++;
			}
			
		}else{
			$house->insertImages($houseId,"http://localhost/NewFolder2/Tajribee/ProgImaj/house.jpg","house.jpg");
		}
	echo "ok";
	header("Location:../View/allHouses.html");
}

else if(isset($_GET['add'])){
	//header("Location:yes");
	$arr=$house->getHouseContry();
	
	//echo json_encode($arr);/////////////////////////////////////
	include("../View/TestArr.php");/////////////////////////////
}



else if(isset($_GET['poste'])){
	if(isset($_GET['get'])){
		//$_GET['page'];
			$arr=$house->getPostALL(htmlspecialchars($_GET['UseridI']),htmlspecialchars($_GET['page']));

		//echo json_encode($arr);/////////////
		include("../View/TestArr.php");////////////
	}else{
	session_start();
	$arr=$house->getPostALL($_SESSION['user'],htmlspecialchars($_GET['page']));

		echo json_encode($arr);
	
	//include("../View/posts.php");
	}
}

else if(isset($_GET['getHouse'])){
		//$_GET['page'];
		$ar=$house->getAllHousesS(htmlspecialchars($_GET['page']));

		include("../View/test2Arr.php");

}

else if(isset($_GET['houseid'])){
	$resultHouseInfo= $house->getHousInfo(htmlspecialchars($_GET['houseid']));
	//var_dump($resultHouseInfo);
	if($resultHouseInfo!=null){
		if(isset($_GET['computer'])){
			//var_dump($resultHouseInfo);
			//echo json_encode($resultHouseInfo);
			include("../View/est3.php");
		}
		else{
		session_start();
		$resultHouseInfo[0]['Userid']=$_SESSION['user'];
		echo json_encode($resultHouseInfo);
		}
	
	
	}
	else{return null;}
}
else if(isset($_GET['houseVillage'])){
		//$_GET['page'];
		$ar=$house->getHouseVillage(htmlspecialchars($_GET['houseVillage']),htmlspecialchars($_GET['page']));

		include("../View/test2Arr.php");
}

?>