<?php

session_start(); 



include('patientmenu.php');

$text='';

if (isset($_POST['add'])) {

	$patientid = $_SESSION['userID'];

	$doctorid = strip_tags(addslashes($_POST['doctor']));

	$date = strip_tags(addslashes($_POST['date']));

	$time = strip_tags(addslashes($_POST['time']));

	require 'config.php';

	$sql="insert into appointments values (NULL,'$doctorid','$patientid','$date','$time')";

	$conn =mysqli_connect($server,$user,$password,$database) or

	die("Can't open connection");

	mysqli_query($conn,$sql);

    if (mysqli_affected_rows($conn)<=0){

        $text="Please fill all required fields.";

    }

    else{

        $text="Appointment added successfully";



    }

    mysqli_close($conn);

}



?>

<html>

<head>

<title>Appointment</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<div align="right" style="margin-right:30px;margin-top:8px">

<?php include('date.php');?></div>

<div class="table" >

<h1>Add Appointment:</h1>

<form method=post >

<table border="0" style="border-spacing:15px" >

<?php

    echo "<th>Select doctor</th>";

    require'config.php';

    $conn =mysqli_connect($server,$user,$password,$database) or

	die("Can't open connection");

   

    $sql="select * from doctors";

    $r=mysqli_query($conn,$sql);

    echo"<td>";

    echo "<select name= 'doctor' size=15 width=20px color=blue > ";

    while($row = mysqli_fetch_array($r)) {

	       echo "<option value=".$row['userID'] .">" .$row['userID'] ."-".$row['fullName'] ."-".$row['category']." </option>";

    }

    echo "</select>";

    echo"</td></tr>"

    

?>

<tr>

<td><b>Date :</b></td><td><input name="date" type="date" size="20"></input></td>

</tr>

<tr>

    <td><b>Select time:</b></td>

        <td>

        <input type="time" name="time" size="20">

        </td>

</td>

</tr>

<tr colspan="2">

<td><input type="reset" value="Clear"></td>

<td><input type="submit" name="add" value="Add Appointment" ></td>

<span><?php echo $text; ?></span>

</tr>

</table>

</form>

</body>



<style>

    span{

    color:blue;

    float:right;

    }

    body{

        background:#D4F2F5;



    }

   

    .table{

        width:500px;

        border-radius:10px;

        font-family:raleway;

        border:4px solid blue;

        padding:10px 30px 25px;

        margin-left:150px;

        margin-right:50px;

        height:480px;

    }

    

    input[type=submit],input[type=reset] {

        background:blue; 

        border:0 none;

        color:white;

        padding:5px 15px; 

        cursor:pointer;

        margin-left:100px;

        margin-top:20px;

        border-radius: 5px; 

}

    input[type=date] {

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

