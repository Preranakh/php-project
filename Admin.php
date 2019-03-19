<?php
include('Database Connection/connection.php');
session_start();
$AEmail=$_SESSION['login_email'];
$sql="SELECT * FROM admin WHERE AdminEmail='$AEmail'";
$res=mysqli_query($db_Con,$sql);
$row=mysqli_fetch_array($res);
$AName=$row['AdminName'];

//recently added companies
$sql1="SELECT * FROM company_register ORDER BY id desc";
$res1=mysqli_query($db_Con,$sql1);
$row1=mysqli_fetch_array($res1);
$Company_Name=$row1['company_name'];

//total number of companies
$sql2="SELECT  * FROM company_register";
$res2=mysqli_query($db_Con,$sql2);
$Total_Company=mysqli_num_rows($res2);

//total number of users

$sql3="SELECT * FROM register";
$res3=mysqli_query($db_Con,$sql3);
$Total_Users=mysqli_num_rows($res3);

if(isset($_POST["LogOut"]))
{
		unset($_SESSION['login_email']);
		session_destroy();
		header("location:Home.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<title>JobFinder</title>
<style>
#main
{
	position:relative;
	left:370px;
	top:200px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#main #img
{
	position:relative;
	padding:20px;
	top:-60px;
	left:-70px;
	background-color:white;
	width:300px;
	height:400px;
}
#main #img img
{
	position:relative;
	left:70px;
	height:150px;
	width:150px;
	border-radius:50%;
	border:1px solid #021a40;
}
#main #img nam
{
	position:relative;
	left:32%;

}
#main #img button
{
	position:relative;
	left:70px;
	cursor:pointer;
	background-color:#B5CDCE;
}
#main #recent
{
	position:relative;
	padding:20px;
	height:150px;
	width:600px;
	left:300px;
	top:-500px;

	background-color:white;
}
#main #numbers
{
	position:relative;
	background-color:white;
	padding:20px;
	height:155px;
	width:600px;
	left:300px;
	top:-450px;

}
#main #numbers #company
{
	position:relative;
	padding:20px;
	height:20px;
	width:550px;
	border:1px solid #021a40;
	height:20px;		

}
#main #numbers #user
{
	position:relative;
	padding:20px;
	height:20px;
	width:550px;
	border:1px solid #021a40;
	height:20px;		

}
#recent #recentheader
{
	position:relative;
	height:30px;
	font-size:20px;
	background-color:#2E86C1;
	color:white;
}
#recent #recentheader pi
{
	position:relative;
	left:180px;
}
</style>
<script>
function setting()
{
	window.location.href="AdminSetting.php";
}
</script>
</head>
<body bgcolor="#ECF0F1">
<div class="singin">
<pro>Job Finder</pro>
<button name="adminlogin" id="admin" onclick="adminlogin()">Admin</button>
<button name="userlogin" onclick="userlogin()">User</button>
</div>
<div class="vertical">
<br/><br/>
<po><pi>Admin Home</pi></po><br/><br/>
<po><a href="Admin_Company.php">Companies Profile</a></po><br/><br/>
<po>Users Profile</po><br/><br/>
<po><a href="Forum.php">Asked Questions</a></po><br/><br/>
<hr color="white" width="200"><br/>
<button onclick="setting()">Setting</button>
<br/><br/>
<form action="Admin.php" method="post">
<button name="LogOut">LogOut</button>
</form>
</div> 
<div id="main">
<div id="img">
<img src="/JobFinder/Images\Logo.jpg"/><br/>
<nam><?php echo $AName; ?></nam><br/><br/>
<button>Change Profile Picture</button><br/><br/>
Name:-<?php echo $AName; ?><br/><br/>
Email:-<?php echo $AEmail; ?>
<br/><br/>
</div>
<div id="recent">
<div id="recentheader"><pi>Recent Added Companies</pi></div><br/><br/>
<li><font style="text-transform:uppercase;"><?php echo $Company_Name ?></font> has recently registered
</div>
<div id="numbers">
<div id="company">
Total Companies:-<?php echo $Total_Company; ?>
</div>
<br/><br/>
<div id="user">
Total Users:-<?php echo $Total_Users; ?>
</div>
</div>
</div>
</body>
</html>
