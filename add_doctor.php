<?php

session_start(); 

if (!isset($_SESSION['username'])){

	header("Location: index.php");

}

include('adminmenu.php');

$text='';

if (isset($_POST['add'])) {

	if (empty($_POST['un'])) {

	    $text= "Please fill username field.";

	}

	if(empty($_POST['pass1'])){

	    $text="Please fill password field.";

	}

	if(empty($_POST['pass2'])){

	    $text="Please fill password field.";

	}

	if($_POST['pass1']!=$_POST['pass2'])

        $text= "Passwords doesnt match.";

    if(empty($_POST['fn'])){

        $text="Please add your name.";

    }

     if(empty($_POST['phone'])){

        $text="Please add your phone.";

    }

     if(empty($_POST['date'])){

        $text="Please add your date.";

    }
    

	if($_POST['pass1']==$_POST['pass2']){

		$username = strip_tags(addslashes($_POST['un']));

		$p1 = strip_tags(addslashes($_POST['pass1']));

		$p2 = strip_tags(addslashes($_POST['pass2']));		

		$fullname = strip_tags(addslashes($_POST['fn']));

		$phone = strip_tags(addslashes($_POST['phone']));

		$date = strip_tags(addslashes($_POST['date']));

		$dep = strip_tags(addslashes($_POST['department']));

		$time = strip_tags(addslashes($_POST['time']));

        $day = strip_tags(addslashes($_POST['day']));


		require 'config.php';

		$sql="insert into doctors values (NULL,'$username' ,unhex(sha2('$p1',256)),'$fullname','$phone','$date','$dep','$time','$day','2')";

		$conn =mysqli_connect($server,$user,$password,$database) or

		die("Can't open connection");

		mysqli_query($conn,$sql);

        if (mysqli_affected_rows($conn)<=0){

            $text="Please fill all required fields.";

        }

        else{

            $text="Doctor  ".$fullname." added successfully";



        }

        mysqli_close($conn);



	}

}

?>

<html>

<head>

<title>add Doctor</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<div class="body">

<body>

<div align="right" style="margin-right:30px;margin-top:15px">

<?php include('date.php');?></div>

<div class="table" >

<h1>Add Doctor:</h1>

<form method=post >

<table border="0" style=" border-spacing:15px">

<tr>

<td><b>Username :</b></td><td><input name="un" type="text" size"20"></td>

</tr>

<tr>

<td><b>Password :</b></td><td><input name="pass1" type="password" size"20"></td>

</tr>

<tr>

<td><b>Repeat password :</b></td><td><input name="pass2" type="password" size"20"></td>

</tr>

<tr>

<td><b>Full Name :</b></td><td><input name="fn" type="text" size"20"></td>

</tr>

<td><b>Phone number :</b></td><td><input name="phone" type="number" size"8"></input></td>

</tr>

<tr>

<td><b>Date of birth :</b></td><td><input name="date" type="date" size"20"></input></td>

</tr>

<tr>

    <td><b>Select Department:</b></td>

    <td>

        <select name="department">

            <option value="Dermatology">Dermatology</option>

            <option value="Dentist">Dentist</option>

            <option value="Gynecologist">Gynecologist</option>

            <option value="Otolaryngology">Otolaryngology</option>

</select>

</td>

</tr>

<tr>

    <td><b>Select time available:</b></td>

    <td>

        <select name="time">

            <option >8-10 AM</option>

            <option >10-12 AM</option>

            <option >12-2 PM</option>

            <option >2-4 PM</option>

</select>

</td>

</tr>
<tr>

    <td><b>Select day available:</b></td>

    <td>

        <select name="day">

            <option >Monday-->wednesday</option>

            <option >Tuesday-->Thursday</option>

            <option >Monday-->Thursday</option>

            <option >wednesday--->Thursday</option>

</select>

</td>

</tr>



<tr colspan="2">

<td><input type="reset" value="Clear"></td>

<td><input type="submit" name="add" value="Add doctor" ></td>

</tr>

</table>

<span><?php echo $text; ?></span>

<br>

</form>

</body>



<style>

    span{

    color:blue;

    text-align:center;

    }

    body{

        background:#EBDCD9;



    }

   

    .table{

        width:375px;

        border-radius:10px;

        font-family:raleway;

        border:4px solid blue;

        padding:10px 30px 25px;

        margin-left:450px;

        height:470px;

    }

    

    input[type=submit],input[type=reset] {

        background:blue; 

        border:0 none;

        color:white;

        padding:5px 15px; 

        cursor:pointer;

        margin-left:60px;

        margin-top:20px;

        border-radius: 5px; 

}

    input[type=text],input[type=date],input[type=number],input[type=password] {

        border-radius:10px;

        border:2px solid blue;

        font-size:14px;

}

select{

    color:blue;

}

h1{

    color:blue;

}

</style>

</html>

