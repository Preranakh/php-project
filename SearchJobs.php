<?php
session_start();
include('Database Connection/connection.php');
$SLocation=array();
$SSalary=array();
$SJob=array();
$SOrganization=array();
$LastDate=array();
$View=array();
$x=0;
$a=array();
$b=array();
//redirecting to another page
$v=0;
while($v< @$total)
{
$View[$v]='View'.$v.'';	
if(isset($_POST['View0']))
{
$_SESSION['view_organization']=$SOrganization[$v];
$_SESSION['view_jobtitle']=$SJob[$v];
header('Location:ViewOrganization.php');
}
$v++;
}
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head><title>JobFinder</title>
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
#main input
{
	height:30px;
	width:250px;
}
#main button
{
	height:35px;
	width:200px;
	background-color:#3498DB;
	color:white;
	border-radius:7px;
	cursor:pointer;
}
#main #HowSearch
{
	position:relative;
	padding:20px;
	height:300px;
	width:800px;
	background-color:white;
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
#main #header
{
	position:relative;
	background-color:white;
	box-shadow:0px 0px 1px 0px black;
	padding:20px;
	height:30px;
	width:800px;
}
</style>
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

<div id="HowSearch">
How would you want to search?<br/><br/>
<form action="SearchJobs.php" method="post">
<input name="Job" placeholder="Enter The Profession" required/><br/><br/>
Enter The Range Of Salary:-<br/><input type="name" name="HSalary" placeholder="Highest Salary" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="name" name="LSalary" placeholder="Lowest Salary" required/> <br/><br/>
Time:-<select>
<option>Select</option>
<option>Part Time</option>
<option>Full Time</option>
</select><br/><br/>
<input type="name" name="Location" placeholder="Enter The Location" required/><br/><br/>
<button name="Search">Proceed</button>
</form>
</div><br/>
<?php
//Fectching the desired result
if(isset($_POST['Search']))
{
	$Job=$_POST['Job'];
	$HSalary=$_POST['HSalary'];
	$LSalary=$_POST['LSalary'];
	$Location=$_POST['Location'];
	$sql="SELECT * FROM jobpost WHERE 
	JobTitle='$Job'  
	AND Salary BETWEEN $LSalary AND $HSalary
	AND WorkingLocation='$Location'";
	$res=mysqli_query($db_Con,$sql);
	if($res)
	{
	$total=mysqli_num_rows($res);
	if($total!=0)
	{
	$header='<div id="header">
	Search Result
	</div>';
	echo $header;	
	while($x<$total)
	{	
	$sql="SELECT * FROM jobpost WHERE 
	JobTitle='$Job' 
	AND Salary BETWEEN $LSalary AND $HSalary
	AND WorkingLocation='$Location' ORDER BY ID LIMIT 1 OFFSET $x";
	$row=mysqli_fetch_array($res);	
	$SOrganization[$x]=$row['Organization'];
	$sql3="SELECT Image FROM company_register WHERE company_name='$SOrganization[$x]'";
	$res3=mysqli_query($db_Con,$sql3);
	$row3=mysqli_fetch_array($res3);
	$img=$row3['Image']; 	
	$SLocation[$x]=$row['WorkingLocation'];
	$SSalary[$x]=$row['Salary'];
	$SJob[$x]=$row['JobTitle'];
	$LastDate[$x]=$row['LastDate'];
$job='<div id="result">
<form method="post" action="SearchJobs.php">
<img src="'.$img.'" height="110px" width="110px"/>
<po><b>'.$SOrganization[$x].'</b></po><br/>
<pi>Job:-'.$SJob[$x].'<br/>
Salary:-'.$SSalary[$x].'<br/>
Last Date Of Application:-'.$LastDate[$x].'</pi>
<button name="View'.$x.'">View Details</button>
</form>
</div>';
echo $job;
$x++;
}
}
else
{
	echo "<script>
	window.alert('No Job Found');
	</script>";
}
}
else
{
	echo "<script>
	window.alert('Please Enter Fields Correctly');
	</script>";
}
}
?>
</div>
</body>
</html>