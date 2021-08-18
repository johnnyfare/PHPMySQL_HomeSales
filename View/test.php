
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.filter{
	margin-left:20%;
	margin-right:20%;
	backgroun-color:lightgrey;
	width:500px;
	height:200px;
}
.right{
margin-left:500px;}
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
	position:absolute;
    background-color:black;
    color:lightgrey;
	margin:0;
    width:100%;
	font-size:20px;
    height:70px;
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

body{
	margin:0;
}

</style>

<script>
var j=100;
var i =0;
function loadDoc() {
	var date = new Date();
		var string="";	
	var lst=string.concat(date.getFullYear(),"-");
	var lm=lst.concat(date.getMonth()+1,"-");
	var r=lm.concat(date.getDay());
	
var a = new Date(r);
	
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  
    if (this.readyState == 4 && this.status == 200) {

	  var jsonObj = JSON.parse(xhttp.responseText);
	  
		for(var k = 1; k <= 6; k++) {
		   document.body.innerHTML += '<div style="margin-left:200px;margin-bottom:20px;background-color:lightgrey;height:40px;font-size:26px;width:1050px;padding:10px;" id="center">Rime '+jsonObj[k].Time+'&nbsp &nbsp &nbsp &nbsp &nbsp &nbspDate: '+jsonObj[k].Date+'<div id="'+k+'" style="color:red"></div></div>'
			if(jsonObj[k].Date==a){
			
				if(jsonObj[k].Time<a.getHours){
					document.getElementById(k).innerHTML+="MISSING";
				}
			}
			
		} 
					
			
			//+jsonObj[i].HouseID+"</div>");
		
    }
  };
  xhttp.open("GET", "../Controller/MeetingController.php?getMeeting=&page="+i, true);
  xhttp.send();
  i=i+6;
  
}
</script>
</head>

<body onload="loadDoc()" >

<div class="div">
<img src="../ProgImaj/house.jpg" style="position:fixed; top:0px; left:0px;" width="100" height="70">
<div class="div2">
 <a href="HouseControler.php?post">See Your Post</a>&nbsp &nbsp &nbsp &nbsp
 Home &nbsp &nbsp &nbsp &nbsp <a href="HouseControler.php?add">Add A house</a>
  &nbsp &nbsp &nbsp &nbsp  
AboutUs
</div>
</div>
<br><Br><br><br>
<br><br>
<div style="margin-left:200px;margin-bottom:20px;background-color:lightgrey;height:40px;font-size:26px;width:1050px;padding:10px;" id="center">
hello

</div>