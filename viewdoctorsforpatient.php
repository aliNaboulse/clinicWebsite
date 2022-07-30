<?php

session_start(); 



 include('patientmenu.php');

?>

<html>

<head>

    <title>Doctors available</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<h1 align='center'>List of Doctors</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"

      method="post" >

<table align="center">

    <tr>

         <th>Full Name</th>    <th>Department</th> <th>Time available</th>  <th>Day available</th> 

    </tr>

<?php

    require 'config.php';

    $conn =mysqli_connect($server,$user,$password,$database) or

    die("Can't open connection");

    $query="Select * from doctors ";

    $result=mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result)){

        echo"<tr align =center>";

        echo "<td>" . $row['fullName'] . "</td>";

        echo "<td>" .$row['category'] . "</td>";

        echo "<td>" .$row['timeAvailable'] . "</td>";
         echo "<td>" .$row['dayAvailable'] . "</td>"; 
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

  border-radius:30%;

  font-family:raleway;

  text-align:center;

  border:5px solid #33CEFF;

  padding:10px 30px 25px;

  margin-left:350px;

  margin-top:30px;

}





 th, td {

  padding: 8px;

  text-align:center;

  border-bottom: 3px solid #33CEFF;

}

tr:hover {

    background-color:#33FFDA;

}



body{

    background:#D4F2F5;


 
}

h1{

    color:#9A1DF1;

}

</style>



