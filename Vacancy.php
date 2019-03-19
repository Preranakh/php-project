<?php
include('Database Connection/connection.php');
$x=0;
$c=0;
$i=0;
$Vacancy;
$JobTitle=array();
$Organization=array();
$Vacancy;
$sql1="SELECT * FROM jobpost";
$res1=mysqli_query($db_Con,$sql1);
while($x<mysqli_num_rows($res1))
{
$sql="SELECT * FROM jobpost ORDER BY ID desc LIMIT 1 OFFSET $x";
$res=mysqli_query($db_Con,$sql);
$row=mysqli_fetch_array($res); // gives one row

$JobTitle[$x]=$row['JobTitle'];
$Organization[$x]=$row['Organization'];
$x++;
} 
?>
<?php
$View=array();
$v=0;
while($v<mysqli_num_rows($res1))
{
$View[$v]='View'.$v.'';
if(isset($_POST[$View[$v]]))
{
	session_start();
	$_SESSION['view_organization']=$Organization[$v];
	$_SESSION['view_jobtitle']=$JobTitle[$v];
	header('location:ViewOrganization.php');
}
$v++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#main
{
	position:absolute;
	padding:20px;
	background-color:white;
	min-height: xxx;
	overflow:auto;
	height:100%;
	width:1000px;
	left:280px;
	top:80px;
	box-shadow:0px 1px 1px 0px black;

}
::-webkit-scrollbar { 
    display: none; 
}
#content
{
    position: absolute;
    top:5px;
    bottom:20px;
}
#content #main form
{
	position:relative;
	top:-20px;
	left:-20px;
	padding:20px;
	height:100px;
	width:100%;
	box-shadow:0px 0px 1px 0px black;

}
#content #main form po
{
	position:relative;
	top:-85px;
	font-size:16px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;	
	color:#2E86C1;
	text-transform: uppercase;
}
#content #main form pi
{
	position:relative;
	left:105px;
	top:-80px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;	
	color:#34495E ;
}
#content #main form button
{
	position:relative;
	height:30px;
	width:150px;
	left:800px;
	top:-90px;
	background-color:#2E86C1;
	color:white;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
	cursor:pointer;
}
#content #main form #info
{
	position:relative;
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
<po><a href="Home.php">Job Home</a></po><br/><br/>
<po><pi>Vacancy</pi></po><br/><br/>
<po><a href="Organization.php">Companies Accounts</a></po><br/><br/>
<po>Users Accounts</po><br/><br/>
<po><a href="HomeForum.php">Forum</a></po><br/><br/>
<po>About Us</po><br/><br/>
<hr width="230px"><br/>
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div>
<div id="content">
<div id="main">
<?php
$i=0;
while($i<mysqli_num_rows($res1))
{
	$query="SELECT * FROM company_register WHERE company_name='$Organization[$i]'";
	$result1=mysqli_query($db_Con,$query);
	$row2=mysqli_fetch_array($result1);
	$image=$row2['Image'];
	$Vacancy='
<form method="post" action="Vacancy.php">
<div id="info">
<img src="'.$image.'" height="100px" width="100px"/>
<po><b>'.$Organization[$i].'</b></po><br/>
<pi>Vacancy For '.$JobTitle[$i].'</pi>
</div>
<button name="View'.$i.'">View Details</button>
</form>';
	echo $Vacancy;
	$i++;
}
?>
</div>
</div>
</body>
</html>