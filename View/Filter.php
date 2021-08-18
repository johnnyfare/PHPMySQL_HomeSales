
<html>
<head>
<style>
body{
	margin:0;
	background-color:whitesmoke;
}

.filter{
	margin-left:20%;
	margin-right:20%;
	backgroun-color:lightgrey;
	width:500px;
	height:200px;
}

.houseContainer{
	float:left;
	margin:30px;
	width:400px;
	height:350px;
	padding:10px;
	color:black;
	background-color:white;
}

.div{
	position:fixed;
    background-color:black;
    color:lightgrey;
    padding :10px;
	margin:0;
    width:99%;
	font-size:20px;
    height:50px;
	text-align:center;
	
}

.div2{
	padding-top:10px;
	font-size:20px;
	margin-left:50px;
	margin-bottom:20px;
}

.sopoo{
    margin-top:20px;
    background-color:lightgrey;
    color:black;
    padding : 10px;
    width:400px;
    height:50px;
    border-radius:10px;
}


</style>
</head>
<script>
function fucn(){
	window.location="allHouses.html";
}
</script>

<div class="div">
<img src="/New Folder/Tajribee/ProgImaj/house.jpg" style="position:fixed; top:0px; left:0px;" width="100" height="70">
<div class="div2">
 See Your Post&nbsp &nbsp &nbsp &nbsp
 <a href="allHouses.html">Home</a> &nbsp &nbsp &nbsp &nbsp <a href="addHouse.html">Add A house</a>
  &nbsp &nbsp &nbsp &nbsp
<a href="../Controller/MeetingController.php?meeting=true</a>">  
SeeYourMeetings</a>  <a href="../Controller/Controller.php?logout">LogOut</a>
</div>
</div>
<br><Br><br><br>
<?php
echo "Time: ".$_GET['Time'].'<br>'.'Date: '.$_GET['Date'].'<br>'.'Employee number: '.$_GET['employeenumber'].'<br>'.'Employee name: '.$_GET['employeename'].'<br>';

?>
<button onclick="fucn()">

ok</button>
</html>