<?php

session_start(); 

if (!isset($_SESSION['username'])|| $_SESSION['role'] != "admin"){

	header("Location: loginpage.php");

}

 include('adminmenu.php');

?>

<html>

<head>

    <title>view appoointments</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<div align="right" style="margin-right:30px;">

<?php include('date.php');?></div>

<h1 align='center'>List appointmets</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"

      method="post" >

<table  align='center'>

    <tr>

        <th>ID</th>    <th>Doctor </th>    <th>Patient</th>    <th>Date</th>   <th>Time</th> <th>Action</th>

    </tr>

<?php

    require 'config.php';

    $conn =mysqli_connect($server,$user,$password,$database) or

    die("Can't open connection");

    $query="SELECT A.appID ,d.FullName As Doctor , p.FullName As Patient, A.date ,A.time FROM appointments as A Inner Join doctors as d on A.docID = d.userID Inner Join users as p on A.patID = p.userID";



    $result=mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result)){

        echo"<tr align =center>";

        echo "<td>" . $row['appID'] . "</td>";

        echo "<td>" . $row['Doctor'] . "</td>";

        echo "<td>" .$row['Patient'] . "</td>";

        echo "<td>" .$row['date'] . "</td>";

        echo "<td>" .$row['time'] . "</td>";

        echo"<td><a href=deleteapp.php?appID=".$row['appID'].">Delete</a></td>";

        echo "</tr>";

    }

    

    mysqli_close($conn);

    

?>

</form>

</table>

</body>

</html>

<style>

a{

    color:black;

}

table {

  border-collapse: collapse;

  width: 50%;

  border-radius:15px;

  font-family:raleway;

  border:5px solid blue;

  padding:10px 30px 25px;

  margin-left:350px;

}

h1{

    color:blue;

}



th, td {

  padding: 8px;

  text-align:center;

  border-bottom: 3px solid blue;

}

tr:hover {

    background-color: blue;

    

}

body{

    background:#EBDCD9;



}

</style>



