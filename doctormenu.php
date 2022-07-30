<html>

<div class="header">

<h2>

    <b> Welcome </b>

    <?php

        echo $_SESSION['fullName']." !";

    ?>

</h2>

<div class="menu">

    <a href="doctor.php">Profile</a>

	<a href="viewdoctorappointments.php">View appointments</a>

	<a href="doctorchangepassword.php">Change password</a>

    <a href="logout.php">Logout</a>

</div>

</div>

<style>

*{

  margin: 0;

}

.header {

  width:100%;

  background-color:#b30000;

  border: 2px solid black; 

  border-collapse: collapse;

  padding:5px ,5px;

  line-height:1px;

  height :80px;

}

.header a {

  float: left;

  color: black;

  text-align: center;

  padding: 10px;

  text-decoration: none;

  font-size: 18px;

  line-height: 1px;

  border-radius: 4px;

  margin-top:15px;

}



.header a:hover {

  background-color:White;

  color: black;

}

.menu{

  float: right;

}

h2{

    padding-top:20px;

    padding-bottom:22px;

}

</style>

</html>