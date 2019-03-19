<?php
include('Database Connection/connection.php');
$Posted;
$storearray;
$x=0;
$i=0;
$t=0;
if(isset($_POST["postquestion"]))
{
	$Posted=stripslashes($_POST["posted"]);
	if($Posted!=null)
	{
		$sql="INSERT INTO forum(Questions,Answer) VALUES('$Posted',NULL)";
		mysqli_query($db_Con,$sql);
	}
	else
	{
		echo "You haven't posted a question";
	}
}
$sql="SELECT Questions FROM forum";
$res=mysqli_query($db_Con,$sql);
$Questions=Array();
while($x<mysqli_num_rows($res))
{
	$sql1="SELECT * FROM forum ORDER BY id desc LIMIT 1 OFFSET $x";
	$res1=mysqli_query($db_Con,$sql1);
	$row=mysqli_fetch_array($res1);
	$Questions[$x]=$row['Questions'];
	$x++;
}

//Fetching answer
$Answers=array();
while($t<mysqli_num_rows($res))
{
	$sql1="SELECT * FROM forum ORDER BY id desc LIMIT 1 OFFSET $t";
	$res1=mysqli_query($db_Con,$sql1);
	$row=mysqli_fetch_array($res1);
	$Answers[$t]=$row['Answer'];
	$t++;
}

?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#mainblock #Question1
{
	display:block;
	position:relative;
	padding:20px;
	height:100px;
	width:800px;
	left:300px;
	top:70px;
	color:#3498DB;
	background-color:white;
	box-shadow:0px 0px 1px 0px black;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#mainblock #Question1 #answer
{
	position:relative;
	padding:10px;
	left:-20px;
	top:20px;
	background-color:#D5D8DC;  
	height:50px;
	width:820px;
}
#mainblock #Question1 button
{
	position:absolute;
	height:30px;
	left:700px;
	background-color:#B5CDCE;
	border-radius:5px;
	cursor:pointer;
	font-family:Verdana, Geneva, sans-serif;

}
#mainblock #Question1 button:hover
{
	border-color:#117491;
}
#more
{
	position:relative;
	height:30px;
	background-color:#B5CDCE;
	border-radius:5px;
	left:650px;
	top:-600px;
	cursor:pointer;

}
#post
{
	position:absolute;
	left:1170px;
	top:100px;
	height:30px;
	width:150px;
	cursor:pointer;
	background-color:#B5CDCE;
	border-radius:5px;
}
#Questions
{
	display:block;
}
#ask
{
	display:none;
	position:relative;
	left:400px;
	top:100px;
}
#ask button
{
	cursor:pointer;
	position:relative;
	height:30px;
	width:100px;
	left:500px;
	border-radius:7px;
	background-color:#B5CDCE;
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
</style>
<script>
function Question()
{
	document.getElementById("Questions").style.display="none";
	document.getElementById("ask").style.display="block";

}
function exit()
{
	document.getElementById("Questions").style.display="block";
	document.getElementById("ask").style.display="none";
}
function setting()
{
	window.location.href="AdminSetting.php";
}
function Oreg()
{
	window.location.href="ORegistration.php";
}
function Ureg()
{
	window.location.href="URegistration.php";
}
function adminlogin()
{
	window.location.href="Admin_Login.php";

}
function userlogin()
{
	window.location.href="user_login.php";

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
<po><a href="Home.php">Job Home</a></po><br/><br/>
<po><a href="Vacancy.php">Vacancy</a></po><br/><br/>
<po><a href="Organization.php">Companies Accounts</a></po><br/><br/>
<po>Users Accounts</po><br/><br/>
<po><pi>Forum</pi></po><br/><br/>
<po>About Us</po><br/><br/>
<hr color="white" width="200"><br/>
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div>
<div id="Questions">
<?php
$i=0;
while($i<mysqli_num_rows($res))
{
	$Vacancy='
	<form action="HomeForum.php" method="post">
<div id="mainblock">
<div id="Question1">
<b>
'.$Questions[$i].'</b>
<div id="answer"><font color="#566573">'.$Answers[$i].'</font></div>
</div>
</div>
</form>';
	echo $Vacancy;
	$i++;
}
?>
<br/>
<button id="post" onclick="Question()">Post A Question</button>
</div>
<form method="post" action="HomeForum.php">
<div id="ask">
<textarea cols="100" rows="10" placeholder="Write Your Question.." name="posted"></textarea><br/><br/>
<button onclick="exit()" name="postquestion">Post</button>
<button onclick="exit()">Discard</button>
</div>
</form>
</body>
</html>