
<html>
<body>
<div class="container">
<h2>LOGIN FORM</h2>
<div class="form-container">
<form action="../Controller/Controller.php" method="POST">
<label><b>Username</b></label>
<input type="email" placeholder="Enter Email" name="email" required>
<br>
<label><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="password" required>
<br><br>
<button type="submit" name="login">LOGIN</button>
</form>
<span style="color:black;margin-left:55px;"><a href="SignIn.php">Don' t have an account create one</a>
</div>

</div>


</body>
</html>

<style>
body{
padding: 0px;
margin: 0px;
font-family: Abel;
background-image: url(img10.jpg);
background-color:whitesmoke;
background-size: cover;
background-attachment: fixed;
}
.container{
position: absolute;
top:50%;
left:50%;
transform: translate(-50%, -50%);
width:28%;
margin: auto;
background-color:#3C3C3C;
color: white;
padding:30px;
box-shadow: 0px 2px 8px 2px #555;
border-radius:6px;
box-sizing: border-box;
}

.container h2{
padding: 10px 15px;
letter-spacing: 1px;
}

.form-container{
padding:16px;
}

.form-container label{
text-transform: uppercase;
font-size: 12px;
letter-spacing: 1px;
}

input[type=text], input[type=password],input[type=email],  button{
width: 100%;
padding: 8px 12px;
margin: 8px 0px;
display: inline-block;
box-sizing: border-box;
color: white;
background-color: transparent;
border: 1px solid white;
}

input[type=text]:focus, input[type=password]:focus{
outline: none;
}

button{
padding:12px 20px;
cursor:pointer;
font-family:Abel;
font-size: 14px;
letter-spacing: 1px;
}
button:hover{
background: rgba(0, 0, 0, 0.5);
}

</style>
