<?php
include('Database Connection/connection.php');
session_start();
if(isset($_POST['name_btn']))
{
	$AdminName=$_POST['adminname'];
	if($AdminName!=null)
	{
		$sql1="SELECT * FROM admin ORDER BY ID DESC LIMIT 1";
		$result=mysqli_query($db_Con,$sql1);
		$row=mysqli_fetch_array($result);
		$id=$row['ID'];
		$sql="UPDATE admin SET AdminName='$AdminName' WHERE ID='$id' ";
		mysqli_query($db_Con,$sql);
	}
	else
	{
		echo "The box is empty";
	}
}
if(isset($_POST['password_btn']))
{
	$AdminPassword=$_POST['adminpassword'];
	if($AdminPassword!=null)
	{
		$AdminPassword=md5($AdminPassword);
		$sql1="SELECT * FROM admin ORDER BY ID DESC LIMIT 1";
		$result=mysqli_query($db_Con,$sql1);
		$row=mysqli_fetch_array($result);
		$id=$row['ID'];
		$sql="UPDATE admin SET AdminPassword='$AdminPassword' WHERE ID='$id' ";
		mysqli_query($db_Con,$sql);
	}
	else
	{
		echo "The box is empty";
	}
}
if(isset($_POST['email_btn']))
{
	$AdminEmail=$_POST['adminemail'];
	if($AdminEmail!=null)
	{
		$sql1="SELECT * FROM admin ORDER BY ID DESC LIMIT 1";
		$result=mysqli_query($db_Con,$sql1);
		$row=mysqli_fetch_array($result);
		$id=$row['ID'];
		$sql="UPDATE admin SET AdminEmail='$AdminEmail' WHERE ID='$id' ";
		mysqli_query($db_Con,$sql);
	}
	else
	{
		echo "The box is empty";
	}
}
if(isset($_POST["LogOut"]))
{
		unset($_SESSION['login_email']);
		session_destroy();
		header("location:Home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#main
{
	position:relative;
	background-color:white;
	left:300px;
	top:100px;
	height:400px;
	width:1000px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#main general
{
	position:relative;
	left:420px;
	top:30px;
}
#main ch
{
	position:relative;
	left:30px;
	top:100px;
}
#main form
{
	position:relative;
	left:300px;
}
#main ch button
{
	position:relative;
	left:30px;
	cursor:pointer;
	height:30px;
	width:100px;
}
#main ch input
{
	height:30px;
	width:200px;
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
<po><a href="Admin.php">Admin Home</a></po><br/><br/>
<po>Companies Profile</po><br/><br/>
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
<general>Genenral Setting</general>
<br/>
<form method="post" action="AdminSetting.php">
<ch><input type="name" name="adminname" class="adminname" id="adminname" placeholder="Change Admin Name"/><button name="name_btn" id="AdminName" class="AdminNam">Change</button></ch><br/><br/>
<ch><input type="password" name="adminpassword" class="adminpassword" id="adminpassword" placeholder="Change Admin Password"/><button name="password_btn">Change</button></ch><br/><br/>
<ch><input type="email" name="adminemail" class="adminemail" id="adminemail" placeholder="Change Admin Email"/><button name="email_btn">Change</button></ch><br/><br/>
</form>
</div>
</body>
</html>
