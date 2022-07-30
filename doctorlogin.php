

<html>

<head>

<title>User Login </title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>

<div id="login">

<h2> Doctor Login</h2>
<?php
if(isset($_GET['error']))
echo"<h5 style='color:red'>Invalid UserName or Password !!</h5>";

?> 

<form   method="post" action="logindoctor_action.php">

<label style=color:blue >Enter your username :</label>

<input id="name" name="username" placeholder="username" type="text" required>

<label style=color:blue>Enter your password :</label>

<input id="password" name="password" placeholder="********" type="password" required>

<input name="submit" type="submit" value="Login "><br>
<input type="Reset" Value="Reset">


</form>

<br>
<br><b>
<A Href="index.php">Home </A>
</b>
</div>

</body>



</html>



