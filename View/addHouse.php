
<html>
<head>
<style>
body{
	margin:0;
	background-color:whitesmoke;
	text-align:center;
}



hr{
	width:50%;
	border-radius:red;
}

.div1{
	margin-bottom:100px;
	position:absolute;
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
	
	
}


input[type=text],textarea, select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.div3 {
  margin-top:50px;
  border-radius: 5px;
 color:red;
  padding: 20px;
  text-align:center;
}

</style>
</head>

<body>


<div class="div1">
<img src="../ProgImaj/house.jpg" style="position:absolute; top:0px; left:0px;" width="100" height="70">
<div class="div2">
Buy a house &nbsp &nbsp &nbsp &nbsp Arrange A meeting &nbsp &nbsp &nbsp &nbsp See Your Post&nbsp &nbsp &nbsp &nbsp
 Send a complain 

</div>


<div class="div3">
  <form action="HouseControler.php" method="POST" enctype="multipart/form-data" >
    <label>Price</label><br>
  <input type="number" name="Price" min="0" value="0">$<br>
        
<hr/>
    <label for="yearsOfconstruction">Year Of Construction</label><br>
	  <input type="number" name="yearsOfconstruction" min="0"value="00">
  
	<br>
	<hr/>
	<label for="description">Description</label><br>
    <textarea rows = "5" cols = "60" name = "description">
	
	</textarea>
	<hr/>
	<br>
	<label for="description">Rent Or Sell</label><br>
   
  <input type="radio"  checked name="gender" value="1">
  <label >&nbsp Sell</label><br>
  <input type="radio"   name="gender" value="2">
  <label for="female">Rent</label><br>
  <hr/>
  
	
    <label for="country">Country</label><br>
    <select  name="country">
	<?php 
		$o=0;
		foreach($arr as $x) {
			$o=$o+1;
		?>
      <option value="<?php echo $o?>"><?php echo $arr[$x];?></option>
	<?php }?>
	
    </select>
	<br>
	<hr/>
	<label for="country">Surface</label><br>
<input type="number" name="surface" min="0"value="00"><br>
<hr/>
	<label>Level</label><br>
<input type="number" name="level" min="0"value="00"><br>
	<hr/>
	
	<input type="file" name="fileUpload[]" multiple>
	<button type="submit" name="insert">Send </button>
</form>
</div>
</body>
