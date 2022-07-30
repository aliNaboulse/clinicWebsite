<?php

session_start(); 

if (!isset($_SESSION['username'])|| $_SESSION['role'] != "doctor"){

	header("Location: loginpage.php");

}

 include('doctormenu.php');

?>

<html>

<head>

    <title>view appoointments</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<div align="right" style="margin-right:30px;">

<?php include('date.php');?></div>

<h1 align='center'>List appointmetss</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" >

<table  align='center'>

    <tr>

   <th>appID</th>  <th>Doctor </th>  <th>Patient</th>   <th>Date</th>   <th>Time</th>

    </tr>

<?php

    require 'config.php';

    $conn =mysqli_connect($server,$user,$password,$database) or

    die("Can't open connection");

    $query="SELECT A.docID , d.FullName As Doctor , p.FullName As Patient,  A.date ,A.time,A.appID,A.patID FROM appointments as A Inner Join doctors as d on A.docID = d.userID Inner Join users as p on A.patID = p.userID where d.userID=".$_SESSION['userID'];



    $result=mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result)){

        echo"<tr align =center>";

       echo "<td>" .$row['appID'] . "</td>"; 

        echo "<td>" . $row['Doctor'] . "</td>";

        echo "<td>" .$row['Patient'] . "</td>";

        echo "<td>" .$row['date'] . "</td>";

        echo "<td>" .$row['time'] . "</td>";
       echo "</tr>";

    }

    

    mysqli_close($conn);

    

?>

</form>

</table>

</body>

</html>

<style>

table {

  border-collapse: collapse;

  width: 50%;

  border-radius:15px;

  font-family:raleway;

  border:5px solid #D2691E;

  padding:10px 30px 25px;

  margin-left:350px;

}

h1{

    color:#D2691E;

}



th, td {

  padding: 8px;

  text-align:center;

  border-bottom: 3px solid #D2691E;

}

tr:hover {

    background-color: #D2691E;

    

}

body{

    background:#EBDCD9;



}

</style>



