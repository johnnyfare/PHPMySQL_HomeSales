<html>
<script>
function myfunction(x){
	document.getElementById("div1").style.display="block";
}

</script>


<div id="div1" style="display:none;">
<button onclick="myfunction(4)">Delete</button>
<button onclick="myfunction(2)">Update</button>
<form action="../Controller/HouseControler.php?news=yes" method="POST">
<input type="text" name="houseId">
<input type="text" name="name">
<input type="hidden" name="code" id="codi"> 
<input name="house" type="hidd"/>
<button type="submit" name="add">submit</button>
</form>
</div>


<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="../Controller/HouseControler.php?news=yes">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
  <button onclick="myfunction()">Add</button>
</div>




<div id="div2" style="display:none">
Here you can see your item page
</div>

<script>
function onclickk(){
	document.getElementById("div1").style.display="block";
}
</script>

</html>