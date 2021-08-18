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
<body onload="loadDoc()">


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


	
<script>

function loadDoc() {
var myParam = location.search.split('userid=')[1];
//document.write(myParam);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	  var jsonObj = JSON.parse(xhttp.responseText);
		
			for(var i= 0 ;i<jsonObj.length;i++){

		}
	}
  };
  xhttp.open("GET", "../Controller/HouseControler.php?userid="+myParam, true);
  xhttp.send();
}
</script>





<?php if($ar!=null){
		for($i=1;$i<=sizeof($ar);$i++){
	?>
<div class="houseContainer">

   <?php echo $ar[$i]['House_description']?> 
   <img src="<?php echo $ar[$i]['ImageSrc']?>"width="400" height="300"/>
	<!--     'HouseID' => string '12' (length=2)
      'Price' => string '1' (length=1)
      'YearOfConstruction' => string '2' (length=1)
      'House_description' => string 'ok	
	' (length=6)
      'surface' => string '2' (length=1)
      'level' => string '4' (length=1)
      'UserID' => string '2' (length=1)
      'codeCity' => string '1' (length=1)
      'codeProperty' => string '1' (length=1)
      'codeType' => string '1' (length=1)-->
 
 
	
	</div>
	

	
<?php } } ?>
</div>

