<?php
session_start();
include('Database Connection/connection.php');
$i=0;
$JobTitl=array();
$Organization=array();
$Salary=array();
$LastDate=array();
$Locations=array();
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Job Finder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#main
{
	position:absolute;
	padding:20px;
	left:300px;
	top:70px;
	height:20px;
	width:900px;
	font-family:"Trebuchet MS";
}
#main #Search
{
	display:block;
	position:relative;
	padding:20px;
	height:200px;
	width:800px;
	background-color:white;
}
#main #Search input
{
	position:relative;
	height:30px;
	width:270px;
}
#main #Search button
{
	position:relative;
	height:35px;
	width:200px;
	background-color:#3498DB;
	color:white ;
	cursor:pointer;
}
#main #result
{
	position:relative;
	padding:20px;
	background-color:white;
	height:100px;
	width:800px;
}
#main #result po
{
	position:relative;
	top:-95px;
	color:#2E86C1;
	font-size:16px;
	text-transform: uppercase;
}
#main #result pi
{
	position:relative;
	top:-85px;
	left:115px;
	font-color:#34495E;
}
#main #result button
{
	position:absolute;
	left:600px;
	top:60px;
	height:30px;
	width:150px;
	background-color:#3498DB;
	color:white;
	cursor:pointer;
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
<po><a href="Vacancy.php">Vacancy</a></po><br/><br/>
<po><pi>Search Job</pi></po><br/><br/>
<po><a href="Organization.php">Companies Accounts</a></po><br/><br/>
<po><a href="#">Users Accounts</a></po><br/><br/>
<po><a href="HomeForum.php">Forum</a></po><br/><br/>
<po>About Us</po><br/><br/>
<hr width="230px"><br/>
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div>
<div id="main">
<div id="Search">
Enter the desired location<br/><br/>
<form action="Location.php" method="post">
<input type="name" name="Location" placeholder="Enter The Desired Location" required/><br/><br/>
<button name="search">Search</button>
</form>
</div><br/>
<?php
//fetching row between the estimated range of salary
if(isset($_POST['search']))
{
	$Location=$_POST['Location'];
	$sql="SELECT * FROM jobpost WHERE WorkingLocation='$Location'";
	$res=mysqli_query($db_Con,$sql);
	$total=mysqli_num_rows($res);
	$_SESSION['total']=$total;
	if($res)
	{
	if($total!=0)
	{
	while($i<$total)
	{
			$sql1="SELECT * FROM jobpost WHERE WorkingLocation='$Location' ORDER BY ID LIMIT 1 OFFSET $i";
			$res1=mysqli_query($db_Con,$sql1);
			$row=mysqli_fetch_array($res1);
			$Locations[$i]=$row['WorkingLocation'];
			$_SESSION['Location['.$i.']']=$Locations[$i];
			$JobTitl[$i]=$row['JobTitle'];
			$_SESSION['JobTitle['.$i.']']=$JobTitl[$i];
			$Organization[$i]=$row['Organization'];
			$_SESSION['Organization['.$i.']']=$Organization[$i];
			$sql3="SELECT Image FROM company_register WHERE company_name='$Organization[$i]' LIMIT 1";
			$res3=mysqli_query($db_Con,$sql3);
			$row3=mysqli_fetch_array($res3);
			$img=$row3['Image']; 
			$Salary[$i]=$row['Salary'];
			$LastDate[$i]=$row['LastDate'];
			$job='<div id="result">
<img src="'.$img.'" height="110px" width="110px"/>
<po><b>'.$Organization[$i].'</b></po><br/>
<pi>Job:-'.$JobTitl[$i].'<br/>
Salary:-'.$Salary[$i].'<br/>
Last Date Of Application:-'.$LastDate[$i].'<br/>
Working Location:-'.$Locations[$i].'</pi>
<form method="post" action="Salary.php">
<button name="View'.$i.'">View Details</button>
</form>
</div>';


echo $job;
$i++;
}
}
else
{
	echo "<script>
	window.alert('Sorry Could Not Find Suitable Job For You');
	</script>";
}
}
else
{
	echo "<script>
	window.alert('Error Occured');
	</script>";
}
}

$v=0;
while($v<$_SESSION['total'])
{
$View[$v]='View'.$v.'';	
if(isset($_POST[$View[$v]]))
{
$_SESSION['view_organization']=$_SESSION['Organization['.$v.']'];
$_SESSION['view_jobtitle']=$_SESSION['JobTitle['.$v.']'];
header('Location:ViewOrganization.php');
}
$v++;
}
?>
</div>
</body>
</html>