<?php
include('Database Connection/connection.php');
session_start();
if(isset($_POST["Submit"]))
{
	$Email=$_POST["AEmail"];
	$Password=$_POST["APassword"];
	$Password=md5($Password);
	$sql="SELECT * FROM admin WHERE AdminEmail='$Email' LIMIT 1";
	$res=mysqli_query($db_Con,$sql);
	$row=mysqli_fetch_array($res);
	$dEmail=$row['AdminEmail'];
	$dName=$row['AdminName'];
	$dPassword=$row['AdminPassword'];
	if($dEmail==$Email && $dPassword==$Password)
	{
		$_SESSION['admin_name']=$dName;
		$_SESSION['login_email']=$Email;
		$_SESSION['login_password']=$Password;
		header("location:Admin.php");
	}
	else
	{
		echo "Email and Password doesn't match";
	}
		
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#login
{
	position:relative;
	padding:20px;
	background-color:white;
	width:900px;
	height:300px;
	left:325px;
	top:150px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;

}
#login form
{
	position:relative;
	top:-50px;
}
#login form input
{
	position:relative;
	left:280px;
	top:70px;
	height:30px;
	width:300px;
}
#login form button
{
	position:relative;
	height:30px;
	width:150px;
	top:100px;
	left:350px;
	cursor:pointer;
}
#login form #head
{
	position:relative;
	top:50px;
	left:380px;
}

</style>
<script type="text/javascript" src="Javascript File/script.js">
</script>
</head>
<body bgcolor="#ECF0F1">
<div class="singin">
<pro>
Job Finder
</pro>
<button name="adminlogin" onclick="adminlogin()">Admin</button>
<button name="userlogin" onclick="userlogin()">User</button>
</div>
<div class="vertical">
<br/><br/>
<po><pi>Job Home</pi></po><br/><br/>
<po><a href="Vacancy.php">Vacancy</a></po><br/><br/>
<po><a href="Organization.php">Companies Accounts</a></po><br/><br/>
<po><a href="#">Users Accounts</a></po><br/><br/>
<po><a href="HomeForum.php">Forum</a></po><br/><br/>
<po>About Us</po><br/><br/>
<hr width="230px"><br/>
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div> 
<div id="login">
<form action="Admin_Login.php" method="post">
<p id="head">Admin Login</p>
<input type="name" name="AEmail" placeholder="E-mail" required/><br/><br/>
<input type="password" name="APassword" placeholder="Password" required/><br/><br/>
<button name="Submit">Login</button>
</form>
</div>
</body>
</html>