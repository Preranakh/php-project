<?php 
include('Database Connection/connection.php');
session_start();
$company_name=$_SESSION['company_nam'];
$t=0;
$JobTitle=array();
$sql="SELECT * FROM jobpost WHERE Organization='$company_name'";
$res=mysqli_query($db_Con,$sql);
$row=mysqli_num_rows($res);
while($t<=$row)
{
	$sql1="SELECT * FROM jobpost WHERE Organization='$company_name' ORDER BY ID desc LIMIT 1 OFFSET $t ";
	$res1=mysqli_query($db_Con,$sql1);
	$row1=mysqli_fetch_array($res1);
	$JobTitle[$t]=$row1['JobTitle'];
	$t++;
}

//directing to another page(ViewOrganization) using view button

$v=0;
while($v<mysqli_num_rows($res))
{
$View[$v]='View'.$v.'';
if(isset($_POST[$View[$v]]))
{
	$_SESSION['view_organization']=$company_name;
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
			#main_item{
				position:relative;
				top:100px;

				top:100px;
				width:900px;

				margin-left:300px;
				margin-right: auto;
				background-color: white;
				height:400px;
				padding:10px;
			}

			#main_item .company_logo{
				float:left;
				width:500px;
				padding:10px;
				height:300px;
			}

			#main_item .company_rules{
				float:left;
				border-left:1px solid black;
				width:400px;
				margin-left:10px;
				height:300px;
				padding:10px;
			}

			#main_item #company_req{
				border-top:1px solid black;
				padding-top: 30px;
				clear:both;
				width:900px;
				margin-left: auto;
				margin-right: auto;
				height:200px;
			}

			

			#main_item #company_req input[type="radio"]{
				margin:10px;
				padding:10px;
				padding-left: 10px;
			}
#main_item #info
{
	position:relative;
	padding:20px;
	height:0px;
	width:850px;
	background-color:white;
	box-shadow:0px 0px 1px 0px black;
	font-family:"Trebuchet MS";
	color:black;
	margin-top:-10px;
}
#main_item form button
{
	position:relative;
	left:770px;
	top:-35px;
	width:120px;
	height:35px;
	top:-38px;
	background-color:#2E86C1;
	color:white;
	cursor:pointer;
}
#main_item form #info pi
{
	position:relative;
	top:-10px;

}
#main_item #header
{
	position:relative;
	padding:20px;
	background-color:#F4F6F7;
	width:98%;
	left:-10px;
	top:-10px;
	box-shadow:0px 0px 1px 0px black;
	font-family:"Trebuchet MS";
	font-size:17px;

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
<pro>
Job Finder
</pro>
<button name="adminlogin" onclick="adminlogin()">Admin</button>
<button name="userlogin" onclick="userlogin()">User</button>
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
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div> 
		<div id="main_item"> 
		<div id="header">Vacancy</div><br/>
<?php
$i=0;
$s=1;
$d=mysqli_num_rows($res);
while($i<$d)
{
	$Vacancy='
<form method="post" action="apply.php">
<div id="info">
<pi>'.$s.'. Vacancy For '.$JobTitle[$i].'</pi>
</div>
<button name="View'.$i.'">View Details</button>
</form>';
	echo $Vacancy;
	$i++;
	$s++;
}
?>
	
</div>

</body>
</html>