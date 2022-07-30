<?php

session_start(); 



require('patientmenu.php'); 

require 'config.php';

$query = "select * from users  where userID =". $_SESSION['userID'];

$conn =mysqli_connect($server,$user,$password,$database) or

die("Can't open connection");

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);

mysqli_close($conn);

?>

<html>

    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Patient login</title>

    </head>

<body>

<div align="right" style="margin-right:30px;margin-top:15px">

<?php include('date.php');?>

</div>

<form  method="post">

<h1 align='left'> Profile:</h1>

 <table border ="0"  width="40%" style= "border-spacing:30px" >

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method ="post" >

        <tr><td>ID</td><td><input type="text" name="id"value ="<?php echo $row['userID']; ?>" readonly><label>Read Only!</label></td></tr>

        <tr><td>Full Name</td><td> <input type ="text" name = "fullname" value ="<?php echo $row['fullName']; ?>" ></td></tr>

        <tr><td>Phone Number</td><td><input type ="number" name="phoneNum" value ="<?php echo $row['phoneNumber']; ?>"></td></tr>

        <tr><td>Date of birth</td><td><input type ="date" name="dob" value ="<?php echo $row['dob']; ?>"></td></tr>

        <tr colspan="2">

            

            <td align="center"><input type ="submit" value="Update details"  name="update"></td>

        </tr>

    </form>

</table>
<div align="right" style="margin-right:75px;margin-top:-295px">

<img src="images\patientimg.jpg"   alt="patienProfile img" width="300" height="300">


</div>
</body>

</div>

</html>

<?php 

	if(isset($_POST['update'])){

			$id = strip_tags(addslashes($_POST['id']));

			$fullname=strip_tags(addslashes($_POST['fullname']));

			$phoneNum=strip_tags(addslashes($_POST['phoneNum']));

			$dob=strip_tags(addslashes($_POST['dob']));

			require 'config.php';

			$conn =mysqli_connect($server,$user,$password,$database) or

		    die("Can't open connection");

			$query = "update users set fullName = '$fullname', phoneNumber='$phoneNum',dob='$dob' where userID =". $_SESSION['userID'];

			$res = mysqli_query($conn,$query);

			if (mysqli_affected_rows($conn)<=0){

			    echo '<b><center><span style="color:#FF1493;"> Details not updated.</span></center></b>';



            }

            else{

                echo '<b><center><span style="color:#FF1493;"> Details updated successfully.</span></center></b>';



            }

            

            mysqli_close($conn);

	}

	

?>

<style>

body{

  background:#a0caca;



}

input[type=submit] {

    background:#0fdfdf; 

     border:2px solid #380cda;

    color:white;

    padding:5px 15px; 

    cursor:pointer;

    margin-left:60px;

    border-radius:10px; 

}

input[type=text],input[type=date],input[type=number] {

    border-radius:10px;

    border:2px solid #380cda;

    font-size:14px;

}

h1{

    color:#380cda;

}

img {
  border-radius: 50%;
  border: 8px solid #500000;
  position:relative;
box-shadow: 10px 3px 40px #500000;
}

</style>





