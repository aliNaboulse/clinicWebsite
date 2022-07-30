<?php

$q=$_GET["q"];

?>

<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<h1 align='center'>List of Doctors</h1>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"

      method="post" >

<table align="center">

    <tr>

        <th>ID</th>    <th>Full Name</th>    <th>Phone Number</th>    <th>Date of birth</th>    <th>Department</th>

        <th>Time available</th> <th>Action</th>

    </tr>

<?php

    require 'config.php';

    $conn =mysqli_connect($server,$user,$password,$database) or

    die("Can't open connection");

    $query="Select * from doctors where role=2 and fullName like'%$q%' or userID like'%$q%'";

    $result=mysqli_query($conn,$query);

    while($row=mysqli_fetch_array($result)){

        echo"<tr align =center>";

        echo "<td>" . $row['userID'] . "</td>";

        echo "<td>" . $row['fullName'] . "</td>";

        echo "<td>" .$row['phoneNumber'] . "</td>";

        echo "<td>" .$row['dob'] . "</td>";

        echo "<td>" .$row['category'] . "</td>";

        echo "<td>" .$row['timeAvailable'] . "</td>";

        echo"<td><a href=deletedoctor.php?userID=".$row['userID'].">Delete</a></td>";

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

  text-align:center;

  border:5px solid blue;

  padding:10px 30px 25px;

  margin-left:350px;

  margin-top:30px;

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

h1{

    color:blue;

}

</style>



