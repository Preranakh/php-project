<?php
include('Database Connection/connection.php');
session_start();
$Organization=$_SESSION['view_organization'];
$JobTitle=$_SESSION['view_jobtitle'];
$sql="SELECT * FROM jobpost WHERE Organization='$Organization' AND JobTitle='$JobTitle'";
$res=mysqli_query($db_Con,$sql);
$row=mysqli_fetch_array($res);
$VacantSeats=$row['VacantSeat'];
$Salary=$row['Salary'];
$WorkingLocation=$row['WorkingLocation'];
$Requirement1=$row['Requirement1'];
$Requirement2=$row['Requirement2'];
$Requirement3=$row['Requirement3'];
$Requirement4=$row['Requirement4'];
$Requirement5=$row['Requirement5'];
//Application of applicant
if(isset($_POST['apply']))
{
	$ApplicantEmail=$_POST['ApplicantEmail'];
	$ApplicantPassword=$_POST['ApplicantPassword'];
	$sql1="SELECT * FROM register WHERE email='$ApplicantEmail' AND password='$ApplicantPassword' LIMIT 1";
	$res1=mysqli_query($db_Con,$sql1);
	if(mysqli_query($db_Con,$sql1))
	{
		$row1=mysqli_fetch_array($res1);
		$ApplicantFirstName=$row1['first_name'];
		$ApplicantLastName=$row1['last_name'];
		$ApplicantNumber=$row1['ContactNumber'];
		$sql3="INSERT INTO $Organization(ApplicantFirstName,ApplicantLastName,ApplicantEmail,ApplicantNumber,JobTitle) VALUES('$ApplicantFirstName','$ApplicantLastName','$ApplicantEmail','$ApplicantNumber','$JobTitle')";
		if(mysqli_query($db_Con,$sql3))
		{
		echo "<script>
		window.alert('Applicantion Submitted');
		</script>";
		}
		else
		{
		echo "<script>
		window.alert('Error in submission');
		</script>";
		}
	}
	else
	{
		echo "<script>
		window.alert('Email and Password doesnt match');
		</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#content
{
	position:absolute;
	top:5px;
	bottom:10px;
}
#main
{
position:relative;
padding:20px;
left:270px;
top:70px;
height:400px;
width:950px;
background-color:white;
}
#content #main #info
{
	position:relative;
	padding:20px;
	top:-20px;
	left:-20px;
	height:100%;
	width:200px;
	background-color:#FBFCFC;
	box-shadow:0px 0px 1px 0px black;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#content #main #info img
{
	position:relative;
	left:0px;
	top:0px;
	height:200px;
	width:200px;
}
#content #main #info #info1
{
	position:relative;
	padding:10px;
	left:-10px;
	height:130px;
	width:100%;
	color:#566573;  	
}
#content #main #info po
{
	position:relative;
	left:0px;
	font-size:18px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;	
	color:#2E86C1;
	text-transform: uppercase;
}
#content #main #requirements
{
	position:relative;
	left:222px;
	padding:20px;
	top:-460px;
	width:708px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
	height:20px;
	background-color:#F4F6F7;
	box-shadow:0px 0px 1px 0px black;
	color:#2E86C1;
	font-size:18px;
}
#content #main #Inner
{
	position:relative;
	left:230px;
	height:200px;
	top:-445px;
	background-color:white;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
	width:730px;
	color:#566573;


}
#content #main #apply
{
	position:relative;
	left:250px;
	top:-430px;
}
#content #main #apply input
{
	height:30px;
	width:300px;
}
#content #main #apply button
{
	height:30px;
	width:100px;
	cursor:pointer;
	background-color:#2E86C1;
	border-radius:5px;
	color:white;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
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
<po><a href="\JobFinder/Home.php">Job Home</a></po><br/><br/>
<po><pi>Vacancy</pi></po><br/><br/>
<po><a href="\JobFinder/Organization.php">Companies Accounts</a></po><br/><br/>
<po>Users Accounts</po><br/><br/>
<po><a href="\JobFinder/HomeForum.php">Forum</a></po><br/><br/>
<po>About Us</po><br/><br/>
<hr width="230px"><br/>
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div>
<div id="content">
<div id="main">
<div id="info">
<?php
$Image;
$query="SELECT * FROM company_register WHERE company_name='$Organization' LIMIT 1";
$result=mysqli_query($db_Con,$query);
$row2=mysqli_fetch_array($result);
$Image=$row2['Image']; 
?>
<img src="<?php echo $Image; ?>"/><br/>
<po>
<b><?php echo $Organization; ?></b></po><br/>
<div id="info1">
Post:-<?php echo $JobTitle; ?><br/><br/>
Vacant Seats:-<?php echo $VacantSeats; ?><br/><br/>
Salary:-$<?php echo $Salary; ?><br/><br/>
Location:-<?php echo $WorkingLocation; ?>
</div>
</div>
<div id="requirements">
<b>Requirements</b>
</div>
<div id="Inner">
<?php echo $Requirement1; ?><br/><br/>
<?php echo $Requirement2; ?><br/><br/>
<?php echo $Requirement3; ?><br/><br/>
<?php echo $Requirement4; ?><br/><br/>
<?php echo $Requirement5; ?><br/><br/>
</div>
<div id="apply">
<form action="ViewOrganization.php" method="post">
<input type="email" placeholder="Your Email" name="ApplicantEmail" required/><br/><br/>
<input type="Password" placeholder="Your Password" name="ApplicantPassword" required/><br/><br/>
<button name="apply">Apply</button>
</form>
</div>
</div>
</div>
</body>
</html>
