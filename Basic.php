<?php
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
</body>
</html>