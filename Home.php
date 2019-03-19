<?php
include('Database Connection/connection.php');
$x=0;
$c=0;
$i=0;
$Vacancy;
$JobTitle=array();
$Organization=array();
//$Vacancy=array();
$Vacancy;
while($x<=3)
{
$sql="SELECT * FROM jobpost ORDER BY ID desc LIMIT 1 OFFSET $x";
$res=mysqli_query($db_Con,$sql);

//
$row=mysqli_fetch_array($res); // gives one row

$JobTitle[$x]=$row['JobTitle'];
$Organization[$x]=$row['Organization'];
$x++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
/* slider style */
	#slider{

		position: relative;
		width:700px;
		height:330px;
		left:260px;
		top:60px;
		background-color:#ECF0F1;
		padding:4px;


	}

/* end of slider */

 /* desc about Job Finder */
 	#main_part{
 		position: relative;
 		left:300px;
 		width:800px;
 		top:-600px;
 		border-top: 1px solid grey;
 		font-size: 18px;
 		background-color:#ECF0F1;
 		padding:8px;

 	}
@keyframes slidy {
0% { left: 0%; }
20% { left: 0%; }
25% { left: -100%; }
45% { left: -100%; }
50% { left: -200%; }
70% { left: -200%; }
75% { left: -300%; }
95% { left: -300%; }
100% { left: -400%; }
}

body { margin: 0; } 
div#slider { overflow: hidden; }
div#slider figure img { width: 20%; float: left; }
div#slider figure { 
  position: relative;
  width: 500%;
  margin: 0;
  left: 0;
  text-align: left;
  font-size: 0;
  animation: 10s slidy infinite; 
}
#VacancyAnnouncement
{
	position:relative;
	padding:20px;
	background-color:white;
	height:300px;
	width:300px;
	left:980px;
	top:-275px;
	box-shadow:0.3px  1px black;

}
#VacancyAnnouncement #Announcement
{
	position:relative;
	left:-20px;
	top:-20px;
	padding:20px;
	width:100%;
	/*background-color:#2E86C1;*/
	background-color:#BCE8C6;
	height:7px;
	color:#096F35;
	font-size:15px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;

}
#VacancyAnnouncement #OAnnouncement
{
	position:relative;
	left:0px;
	top:0px;
	padding:20px;
	height:0px;
	width:90%;
	background-color:#F2F3F4;
	font-size:13px;
	color:#273746;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
	cursor:pointer;

}
#VacancyAnnouncement #OAnnouncement lo
{
	position:relative;
	top:-10px;
	left:-10px;
}
#VacancyAnnouncement button
{
	position:relative;
	top:-10px;
	height:25px;
	width:100px;
	left:100px;
	cursor:pointer;
	border-radius:5px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#RecentCompany
{
	position:relative;
	padding:20px;
	top:-260px;
	left:980px;
	height:259px;
	width:300px;
	background-color:white;
	color:white;
	box-shadow:0.3px 1px black;
	font-size:20px;
}
#RecentCompany #header
{
	position:relative;
	left:-20px;
	top:-20px;
	padding:20px;
	width:100%;
	/*background-color:#2E86C1;*/
	background-color:#FAD7A0;
	height:7px;
	color:#784212;
	font-size:15px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#topsearch
{
	position:absolute;

				top:420px;
				clear:both;
				background-color:white;
				width:660px;
				height:260px;
				left:265px;
				margin-right:auto;
				box-shadow:0px 0px 1px 0px black;	
				padding:20px;
				font-family:"Trebuchet MS";
}
#topsearch #company
{
				position:absolute;
				margin:auto;
				margin-left:20px;
				top:100px;
				float:left;
				text-transform: uppercase;
				font-size:15px;
				box-shadow:0px 0px 1px 0px white;
				font-family:"Trebuchet MS";
	font-size:14px;

}
#topsearch #company po
{
	position:relative;
	top:30px;
	left:-150px;
}
#topsearch #top
{
	position:relative;
	padding:20px;
	left:-20px;
	top:-20px;
	width:100%;
	height:10px;
	background-color:#F4F6F7;
	box-shadow:0px 0px 1px 0px black;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
	color:#186A3B;

}
#footer
{
	bottom: 0;
    position: absolute;
    height: 35px;
    width: 100%;
}
#content
{
    position: absolute;
    top:5px;
    bottom:20px;
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
<po><pi>Job Home</pi></po><br/><br/>
<po><a href="Vacancy.php">Vacancy</a></po><br/><br/>
<po><a href="SearchJobs.php">Search Job</a></po><br/><br/>
<po><a href="Organization.php">Companies Accounts</a></po><br/><br/>
<po><a href="#">Users Accounts</a></po><br/><br/>
<po><a href="HomeForum.php">Forum</a></po><br/><br/>
<po>About Us</po><br/><br/>
<hr width="230px"><br/>
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div> 
<div id="content">
<div id="slider">
<figure>
<img src="img/job1.jpg" alt>
<img src="img/job2.jpg" alt>
<img src="img/job3.jpg" alt>
<img src="img/job4.jpg" alt>
</figure>
</div>
<div id="VacancyAnnouncement">
<div id="Announcement">
<b>Vacancy Posts</b>
</div>
<?php
$i=0;
while($i<3)
{
	$Vacancy='<font style="position:relative;top:0px;font-size:13px;color:#2E86C1;text-transform:uppercase;">'.$Organization[$i].'</font>
<div id="OAnnouncement"><lo>Vacancy for '.$JobTitle[$i].'</lo></div><br/>';
	echo $Vacancy;
	$i++;
}
?>
<button onclick="Vacancy()">See More</button>	
</div>
<div id="RecentCompany">
<div id="header">
	<b>New Companies</b>
</div>
<?php
$w=0;
$q=0;
$query="SELECT * FROM company_register";
$res2=mysqli_query($db_Con,$query);
$index=1;
while($w<=9)
{
$sql="SELECT * FROM company_register ORDER BY ID desc LIMIT 1 OFFSET $w";
$res=mysqli_query($db_Con,$sql);

//
$row=mysqli_fetch_array($res); // gives one row

$CompanyName[$w]=$row['company_name'];
$Location[$w]=$row['company_address'];
$w++;
}
if(mysqli_num_rows($res2)<10)
{
while($q<mysqli_num_rows($res2))
{
	$Company='<font color="black" size="2px" style="text-transform:uppercase;">'.$index.'. '.$CompanyName[$q].':-</font><font color="#BDC3C7" size="2px">'.$Location[$q].'</font><br/>';
	echo $Company;
	$q++;
	$index++;
}
}
else
{
	while($q<9)
	{
	$Company='<font color="black" size="2px" style="text-transform:uppercase;">'.$index.'. '.$CompanyName[$q].':-</font><font color="#BDC3C7" size="2px">'.$Location[$q].'</font><br/>';
	echo $Company;
	$q++;
	$index++;

	}
}
?>
</div>
<div id="topsearch">
	<div id="top">
		<b>Top Search</b>
	</div>
	<div id="company">
	<?php
$p=0;
while($p<3)
{
$sql_top="SELECT * FROM company_register ORDER BY Search desc LIMIT 3 OFFSET $p";
$query_top=mysqli_query($db_Con,$sql_top);
$comp_row=mysqli_fetch_array($query_top);
$company_name=$comp_row['company_name'];
$id=$comp_row['id'];
$image=$comp_row['Image'];
?>
						       		<a href="image.php?id=<?php echo $id; ?>" title="<?php echo $company_name; ?>"><img src="<?php echo $image; ?>" style="width:150px;
									height:150px;"></a>
									<po><?php echo $company_name; ?></po>
									<?php
									$p++;
									}
									?>
									</div>
</div>
</div>
<div id="footer">
</div>
</body>
</html>