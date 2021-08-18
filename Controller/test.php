<?php
if(isset($_GET['Value'])){
	echo json_encode($_GET['Value']);
}
?>
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
<script>
var j=100;
var i =0;

function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

	  var jsonObj = JSON.parse(xhttp.responseText);	
	  document.writeln(jsonObj['2'].HouseID);
	  document.getElementById("houseContainer").innerHTML = jsonObj['2'].HouseID;
    }
  };
  xhttp.open("GET", "HouseControler.php?getHouse=true&page="+i, true);
  xhttp.send();

  i=i+6;
}
</script>
<script>
window.onscroll = function() {myFunction()};

function myFunction() {
  if (document.body.scrollTop > j || document.documentElement.scrollTop > j) {
		loadDoc();
		
		j=j+150;
  }
}


</script>
</head>
<body onload="loadDoc()">

<div id="demo">
<h1>The XMLHttpRequest Object</h1>
<button type="button" onclick="loadDoc()">Change Content</button>
</div>




<div>


<div class="houseContainer" id="houseContainer">

 
 
	
</div>
</div>

</body>
</html>
