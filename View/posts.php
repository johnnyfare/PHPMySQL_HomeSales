<?php
?>
<html>
<script>
function myfunction(x){
	document.getElementById("id").style.display="block";
}

</script>





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
var j=100;
var i =0;
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

	  var jsonObj = JSON.parse(xhttp.responseText);
		//.write(jsonObj);
		for(var c = 0; c <=6; c++) {
document.body.innerHTML += '<div class="houseContainer" onclick="house('+jsonObj[c].HouseID+')"><img src="'+jsonObj[c].ImageSrc+'" width="400" height="290"><br><br>Price:'+jsonObj[c].Price+'<br>Surface:'+jsonObj[c].Surface+'<br>Level:'+jsonObj[c].level+'</div>'
		}	 
					
			
			//+jsonObj[i].HouseID+"</div>");
		
    }
	
  };
  xhttp.open("GET", "../Controller/HouseControler.php?poste=true&page="+i, true);
  xhttp.send();
  i=i+6;
}
</script>

<script>
function house(yes){
	//window.location.href = "/New%20folder/Tajribee/Controller/HouseControler.php?houseid="+yes;
	window.location.href ="../index.php?houseid="+yes;
}

window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > j || document.documentElement.scrollTop > j) {
		loadDoc();
		
		j=j+150;
  }
}


</script>


<body onload="loadDoc()">

<div class="div">
<img src="../ProgImaj/house.jpg" style="position:fixed; top:0px; left:0px;" width="100" height="70">
<div class="div2">
 See Your Post&nbsp &nbsp &nbsp &nbsp
 <a href="allHouses.html">Home</a> &nbsp &nbsp &nbsp &nbsp <a href="addHouse.html">Add A house</a>
  &nbsp &nbsp &nbsp &nbsp
<a href="../Controller/MeetingController.php?meeting=true</a>">  
SeeYourMeetings</a>  <a href="../Controller/Controller.php?logout">LogOut</a>
</div>
</div>
<br><Br><br><br>


