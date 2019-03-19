<?php
include('Database Connection/connection.php');
$x=0;
$Organization=array();
$JobTitle=array();
$Salary=array();
$Image=array();
$Date=array();
if(isset($_POST['Search']))
{
	$Job=$_POST['Job'];
	$sql="SELECT * FROM jobpost WHERE JobTitle='$Job'";
	$res=mysqli_query($db_Con,$sql);
	$to=mysqli_num_rows($res);
	if($to!=0)
	{
	$row=mysqli_fetch_array($res);
	while($x<mysqli_num_rows($res))
	{
		$sql1="SELECT * FROM jobpost WHERE JobTitle='$Job' ORDER BY Salary DESC LIMIT 1 OFFSET $x";
		$res1=mysqli_query($db_Con,$sql1);
		$row1=mysqli_fetch_array($res1);
		$Organization[$x]=$row1['Organization'];
		$sql2="SELECT * FROM company_register WHERE company_name='$Organization[$x]' LIMIT 1";
		$res2=mysqli_query($db_Con,$sql2);
		$row2=mysqli_fetch_array($res2);
		$Image[$x]=$row2['Image'];
		$JobTitle[$x]=$row['JobTitle'];
		$Salary[$x]=$row['Salary'];
		$Date[$x]=$row['LastDate'];
		$x++;
	}
}
else
{
	echo "<script>
	window.alert('Vacancy For $Job Not Found');
	</script>";
}


}
if(isset($_POST['proceed']))
{
	$Category=$_POST['category'];
	header("Location:$Category.php");
}
?>
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
	width:500px;
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
<!--<form action="SearchJob.php" method="post">
<input type="name" name="Job" placeholder="Enter The Job Category"/>
<button name="Search">Search</button>
</form>-->
<div id="HowSearch">
How would you want to search?<br/><br/>
<form action="SearchJob.php" method="post">
<input type="radio" name="category" value="Salary"/>Salary<br/>
<input type="radio" name="category" value="Profession"/>Profession<br/>
<input type="radio" name="category" value="Location"/>Location<br/>
<input type="radio" name="category" value="Company"/>Company<br/>
<input type="radio" name="category" value="Time"/>Working Hour<br/>
<button name="proceed">Proceed</button>
</form>
</div>
</div>
</body>
</html>