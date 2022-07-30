<?php

session_start(); 

if (!isset($_SESSION['username']) || $_SESSION['role'] != "admin"){

	header("Location: loginpage.php");

}

require('adminmenu.php');

$text='';

$result="";

if (isset($_POST['change'])) {

    $un = strip_tags(addslashes($_POST['username']));

    $passw1 =strip_tags(addslashes($_POST['pass1']));

    $passw2 = strip_tags(addslashes($_POST['pass2']));

    if(empty($un)|| empty($passw1) || empty($passw2) )

       $text= "<b>Please fill the required fields.";

    if($passw1!=$passw2)

        $text= "<b>Passwords don't match.";

	if(!empty($passw1) &&!empty($passw2)){

	    if($passw1==$passw2){

            require'config.php';

            $conn =mysqli_connect($server,$user,$password,$database) or

            die("Can't open connection");

            $query="update  admin set password= unhex(sha2('$passw1',256)) where userID=".$_SESSION['userID'];

            mysqli_query($conn,$query);

    		if (mysqli_affected_rows($conn)>0){

    		    $result="Password has been changed.";

    		}

        	mysqli_close($conn);

	    }

	}

}

?>

<html>

<head>

<title>Change password</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<div align="right" style="margin-right:30px;margin-top:15px">

<?php include('date.php');?></div>

<div class="table">

<form action="a_changepassword.php" method=post>

<h1>Reset Your Password</h1>

<table border="0" style=" border-spacing:35px;border-collapse:seperate";

>

<tr>

<td><b>Username :</b></td><td><input name="username" type="text" size"20" value="<?php echo $_SESSION['username']?>" readonly></input><label>Read Only!</label></td>

</tr>

<tr>

<td><b>New password :</b></td><td><input name="pass1" type="password" size"30"></input></td>

</tr>

<tr>

<td><b>Repeat password :</b></td><td><input name="pass2" type="password" size"30"></input></td>

</tr>

</table>

<br>

<input type="submit" value="Change" name="change"></input>

</form>

<span><?php echo $text; ?></span>

<span><?php echo $result; ?></span>



</div>

</body>

</html>

<style>

body{

    background:#EBDCD9;



}

span{

    color:blue;

    margin-left:10px;

    margin-top:10px;

}

input[type=submit] {

    background:blue; 

    border:0 none;

    color:white;

    padding:5px 15px; 

    cursor:pointer;

    margin-left:250px;

    border-radius: 5px; 

}

input[type=text],input[type=password] {

    border-radius:10px;

    border:2px solid blue;

    font-size:14px;

}

  .table{

        width:500px;

        border-radius:10px;

        font-family:raleway;

        border:4px solid blue;

        padding:10px 30px 25px;

        margin-top:10px;

        height:350px;

    }

    h1{

        color:blue;

    }

</style>

</html>