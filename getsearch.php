<?php
$q=$_GET["q"];
?>
<html>
<table border=0 align=center>
    <tr>
        <th>ID</th>    <th>Full Name</th>    <th>Phone Number</th>    <th>Date of birth</th> <th>Type</th>
    </tr>
    <?php
    require 'config.php';
    $conn =mysqli_connect($server,$user,$password,$database) or
    die("Can't open connection");
    $query="select * from users where  fullName like'%$q%' or userID like'%$q%'";
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($result)){
        echo"<tr align =center>";
        echo "<td>" . $row['userID'] . "</td>";
        echo "<td>" . $row['fullName'] . "</td>";
        echo "<td>" .$row['phoneNumber'] . "</td>";
        echo "<td>" .$row['dob'] . "</td>";
        if($row['role']==1){
            echo "<td>Admin</td> ";
        }
	    else if($row['role']==2){
	       echo "<td>Doctor</td> ";
	   }
	    else if($row['role']==3){
	       echo "<td>Patient</td> ";
	   }
	  
        echo "</tr>";
    }
    
    mysqli_close($conn);
    echo "</table>";

?>
<style>
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
</style>
