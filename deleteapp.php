<?php
$id=$_GET['appID'];
require 'config.php';
$conn =mysqli_connect($server,$user,$password,$database) or
 die("Can't open connection");
$query="delete from appointments where appID=".$id;
$res= mysqli_query($conn,$query) ;
$r=  mysqli_affected_rows ($conn);
if ($r==1) {
	header('Location:viewappointments.php');
}
else{
    echo "Error while deleting.";
}
mysqli_close($conn);
?>