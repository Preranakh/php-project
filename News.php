<?php
include('Database Connection/connection.php');
session_start();
$company_name=$_SESSION['company_nam'];
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#main2
{
	position:absolute;	
	top:60px;
	left:260px;	
	width:100%;
}
#main2 #news
{
	position:relative;
	float:left;
	margin-left:5px;
	margin-top:5px;
	padding:20px;
	background-color:white;
	height:300px;
	width:300px;
	box-shadow:0px 0px 1px 0px black;
	font-family:"Trebuchet MS";
	color:#7B7D7D;

}
#main2 #news po
{
	position:relative;
	font-size:20px;
	color:black;

}
#main2 #news button
{
	position:absolute;
	top:300px;
	left:90px;
	border:0;
	height:25px;
	width:150px;
	cursor:pointer;
	background-color:white;
	color:#3498DB;		
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
<po><a href="SearchJobs.php">Search Job</a></po><br/><br/>
<po><pi>Companies Accounts</pi></po><br/><br/>
<po><a href="#">Users Accounts</a></po><br/><br/>
<po><a href="HomeForum.php">Forum</a></po><br/><br/>
<po>About Us</po><br/><br/>
<hr width="230px"><br/>
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div>
<div id="main2">
<?php
$g=0;
$p=0;
$title=array();
$News=array();
$sql="SELECT * FROM news WHERE CompanyName='$company_name'";
$res=mysqli_query($db_Con,$sql);
$total=mysqli_num_rows($res);
while($g<$total)
{
	$sql1="SELECT * FROM news WHERE CompanyName='$company_name' ORDER BY ID DESC LIMIT 1 OFFSET $g";
	$res1=mysqli_query($db_Con,$sql1);
	$row=mysqli_fetch_array($res1);
	$title[$g]=$row['NewsTitle'];
	$News[$g]=$row['News'];
	$PDF[$g]=$row['PDF'];
	$PDFName[$g]=$row['PDF_Name'];
	if($PDF[$g]==NULL)
	{
		$display='
		<div id="news">
		<po><b>'.$title[$g].'</b></po><br/><br/>
		'.$News[$g].'
	    </div>';
	    echo $display;
	}
	else
	{
		$display='
	    <div id="news">
		 	<po><b>'.$title[$g].'</b></po><br/><br/>
			'.$News[$g].'
			<form action="News.php" method="post">
		<button name="View'.$g.'">View Details</button>
		</form>
		</div>';
		echo $display;
	}
	$g++;
}

//Viewing News Details
$View=array();
while($p<$total)
{
$View[$p]='View'.$p.'';
if(isset($_POST[$View[$p]]))
{
	$_SESSION['diff2']='diff2';
	$redirect_page='View.php';
    $_SESSION['view_news']=$PDF[$p];
	$_SESSION['news_name']=$PDFName[$p];
	header('location:'.$redirect_page);
}
$p++;
}
ob_end_flush();
?>
</div> 
</body>
</html>