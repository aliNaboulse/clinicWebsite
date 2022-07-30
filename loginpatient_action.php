<?php

session_start(); 

$error='';

if (isset($_POST['submit'])) {

	if (empty($_POST['username'])) {

	    $error= "   Please fill username field.";

	}

	if(empty($_POST['password'])){

	    $error="   Please fill password field.";

	}

	else{

		$uname = $_POST['username'];

		$pass = $_POST['password'];

		require 'config.php';

		$sql="select * from users where username='$uname' and password = unhex(sha2('$pass',256))";

		$conn =mysqli_connect($server,$user,$password,$database) or

		die("Can't open connection");                         

		$result=mysqli_query($conn,$sql);

		$rows=mysqli_num_rows($result);
 $res = mysqli_fetch_array($result);

			if (mysqli_num_rows($result)>0){	
                $_SESSION['username']=$uname;

			$_SESSION['role']="patient";
$_SESSION['userID']=$res['userID'];
    
                    $_SESSION['fullName']=$res['fullName'];
				header("Location:patient.php");
                 
    
		
		}else {
            header("location:loginpage.php?error=1");

			

		}

		mysqli_close($conn);

	}

    }

?>