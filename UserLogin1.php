<?php
include('Database Connection/connection.php');
session_start();
if(isset($_POST['login']))
{
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];
	$sql="SELECT * FROM register WHERE email='$Email'";
	$res=mysqli_query($db_Con,$sql);
	$row=mysqli_fetch_array($res);
	$dPassword=$row['password'];
	if($dPassword==$Password)
	{
		$_SESSION['user_email']=$Email;
		header('location:User_Profile_Inner.php');
		
	}
	else
	{
		echo "<script>
		window.alert('Login Failed');
		</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title></title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#main
{
	position:absolute;
	padding:20px;
	background-color:white;
	height:200px;
	width:600px;
	top:150px;
	left:400px;
	font-family:"Trebuchet MS";


}
#main input
{
	position:relative;
	height:30px;
	width:250px;
	left:200px;
}
#main lo
{
	position:relative;
	left:250px;
	font-size:17px;
}
#main button
{
	position:relative;
	height:30px;
	width:150px;
	left:250px;
	cursor:pointer;
}
</style>
</head>
<body bgcolor="#ECF0F1">
<div class="singin">
<pro>
Job Finder
</pro>
</div>
<div class="vertical">
<br/><br/>
<po><a href="Home.php">Job Home</a></po><br/><br/>
<po><a href="Vacancy.php">Vacancy</a></po><br/><br/>
<po><pi>Companies Accounts</pi></po><br/><br/>
<po><a href="#">Users Accounts</a></po><br/><br/>
<po><a href="HomeForum.php">Forum</a></po><br/><br/>
<po>About Us</po><br/><br/>
</div>
<div id="main">
<lo>User Login</lo><br/>
<form action="UserLogin1.php" method="post">
<input type="Email" name="Email" placeholder="Email"><br/><br/>
<input type="password" name="Password" placeholder="Password"><br/><br/>
<button name="login">Login</button>
</form>
</div>
</body>
</html>
