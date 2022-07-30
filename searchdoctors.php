<?php
session_start(); 
if (!isset($_SESSION['username'])|| $_SESSION['role'] != "admin"){
	header("Location: loginpage.php");
}
 include('adminmenu.php');
?>
<html>
<head>

<script>
function showHint(str)
{
	if (str.length==0)	{ 
		document.getElementById("txtHint").innerHTML="";
		return;
	}
	xmlhttp=new XMLHttpRequest();	
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)   {
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","doctors.php?q="+str,true);
	xmlhttp.send();
}
</script>
</head>
<div class="body">
<body>
<div align="right" style="margin-right:30px;">
<?php include('date.php');?></div>
<form> 
Search by name : <input type="text" onkeyup="showHint(this.value)" name="fn">
</form>
<div id="txtHint">
The result will be shown here:</div>
</body>
</html>
<style>
body{
    background:#EBDCD9;
}
</style>