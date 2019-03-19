<?php
include('Database Connection/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<!--<link rel="stylesheet" type="text/css" href="mystyle.css">-->
<style>
.singin
{
	position:relative;
	left:0px;
	padding:30px;
	background:#909497;
	width:420px;
	height:3px;
	padding-top:13px;
	padding-left:900px;
}
.vertical
{
	position:relative;
	padding:0px;
	height:700px;
	background:#1C1818;
	width:250px;
	color:white;
	font-family:monospace;
	font-size:16px;
}
.vertical po
{
	color:#848B9D;
	position:relative;
	left:30px;
	cursor:pointer;
}
.vertical po:hover
{
	color:white;
}
a
{
	text-decoration:none;
	color:#848B9D;
}
a:hover
{
	color:white;
}
.vertical button
{
	position:relative;
	left:25px;
	height:30px;
	width:200px;
	cursor:pointer;
}
#cv
{
	position:relative;
	padding:20px;
	width:900px;
	height:400px;
	background-color:white;
	left:300px;
	top:-650px;
}
#cv #photo
{
	display:block;
	position:relative;
	padding:20px;
	height:350px;
	width:250px;
	background-color:#B5CDCE;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#cv #info
{
	display:block;
	position:relative;
	padding:20px;
	left:300px;
	top:-390px;
	width:550px;
	height:350px;
	background-color:white;
	border-radius:10px;
}
#cv #info #Name
{
	position:relative;
	height:23px;
	background-color:white;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#cv #info #Name #data
{
	position:relative;
	background-color:#B3B6B7;
	width:440px;
	top:-20px;
	left:135px;
	color:black;
	padding-left:10px;
	text-transform:uppercase;

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
</div>
<div class="vertical">
<br/><br/>
<po>Job Home</po><br/><br/>
<po>Search</po><br/><br/>
<po>Companies Accounts</po><br/><br/>
<po>Users Accounts</po><br/><br/>
<po>Forum</po><br/><br/>
<po>About Us</po><br/><br/>
<hr width="230px"><br/>
<button>LogOut</button>
</div> 
<div id="cv">
<div id="photo">
</div>
<div id="info">
<div id="Name">
Name:-<div id="data"><?php echo "Ashish Subedi"; ?></div>
</div>
<br/>
<div id="Name">
DOB<div id="data"><?php echo "17th Jan 1997"; ?></div>
</div>
<br/>
<div id="Name">
Address<div id="data"> <?php echo "Kirtipur,Kathmandu"; ?></div>
</div>
<br/>
<div id="Name">
Education:-<div id="data"><?php echo "Bachelor"; ?></div>
</div>
<br/>
<div id="Name">
Applied Post:- <div id="data"><?php echo "Porgrammer"; ?></div>
</div>
<br/>
<div id="Name">
Experience:-<div id="data"><?php echo "Worked as System Manager Assistant"; ?></div>
</div>
<br/>
<div id="Name">
Contact Number:-<div id="data"><?php echo "9843520805"; ?></div>
</div>
</div>
</div>
</body>
</html>