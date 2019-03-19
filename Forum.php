<?php
include('Database Connection/connection.php');
$i=0;
$sql="SELECT * FROM forum";
$res=mysqli_query($db_Con,$sql);
$row=mysqli_num_rows($res);
$Question=array();
$ID=array();
$Ans=array();
$Status=array();
while($i<$row)
{
	$sql1="SELECT * FROM forum ORDER BY id asc LIMIT 1 OFFSET $i";
	$res1=mysqli_query($db_Con,$sql1);
	$row1=mysqli_fetch_array($res1);
	$Question[$i]=$row1['Questions'];
	$Ans[$i]=$row1['Answer'];
	if($Ans[$i]==null)
	{
		$Status[$i]="Not Answered";

	}
	else
	{
		$Status[$i]="Answered";

	}
	$ID[$i]=$row1['id'];
	$i++;
}
if(isset($_POST["LogOut"]))
{
		unset($_SESSION['login_email']);
		session_destroy();
		header("location:Home.php");
}
$Answer=array();
$AdminAnswer=array();
$Delete=array();
$v=0;
$o=0;
while($v<mysqli_num_rows($res))
{
$Answer[$v]='Answer'.$v.'';
$Delete[$v]='Delete'.$v.'';
$AdminAnswer[$v]='AdminAnswer'.$v.'';
if(isset($_POST[$Answer[$v]]))
{
	$AdminAnswe=stripslashes($_POST[$AdminAnswer[$v]]);
	$sql3="UPDATE forum SET Answer='$AdminAnswe' WHERE id='$ID[$v]'";
	$res3=mysqli_query($db_Con,$sql3);
	header("Refresh:0");
}
if(isset($_POST[$Delete[$o]]))
{
	echo "<script> 
	window.alert('Question Deleted');
	</script>";
	$sql4="DELETE FROM forum WHERE id='$ID[$o]'";
	mysqli_query($db_Con,$sql4);
	header("Refresh:0");

}
$v++;
$o++;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<title>JobFinder</title>
<style>
#mainblock #Question
{
	position:relative;
	padding:30px;
	top:-30px;
	background-color:white;
	height:30px;
	width:700px;
	border-radius:20px;
	font-size:17px;
	padding-top:5px;
	padding-left:1px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}

#questionbox
{
	position:relative;
	top:0px;
}
#mainblock
{
	display:block;
	position:relative;
	left:300px;
	top:100px;
	padding:30px;
	width:750px;
	background-color:white;
	height:120px;
	border-radius:5px;
}
#mainblock form  button
{
	position:relative;
	height:30px;
	width:100px;
	top:-70px;
	left:20px;
	cursor:pointer;
}
#mainblock textarea
{
	position:relative;
	top:-50px;
}
#mainblock lo
{
	position:absolute;
	color:#3498DB;
	font-size:15px;
	left:700px;
	top:-20px;
}
</style>
<script>
var span=document.getElementsByClassName("close")[0];
span.onclick=function(){
	document.getElementById("Anonymously").style.display="none";
}
function Answer()
{
	//var Question=document.getElementById("questionbox");
	document.getElementById("Anonymously1").style.display="none";
	document.getElementById("Anonymously").style.display="block";
	//document.getElementById("AnswerBox").innerHTML=Question.innerHTML;

}
function Answer1()
{
	document.getElementById("Anonymously").style.display="none";
	document.getElementById("Anonymously1").style.display="block";
}

function close()
{
	alert("nothing");
}
//function PostQuestion()
//{
//	document.getElementById("PostQuestion1").style.display="block";
//	document.getElementById("Anonymously").style.display="none";
//}
function FinalPosts()
{
	var Question=document.getElementById("Asked");
	document.getElementById("questionbox").innerHTML=Question.innerHTML;
	document.getElementById("mainblock").style.top="200px";
}
function setting()
{
	window.location.href="AdminSetting.php";
}
</script>
</head>
<body bgcolor="#ECF0F1">
<div class="singin">
<pro>Job Finder</pro>
<button name="adminlogin" id="admin" onclick="adminlogin()">Admin</button>
<button name="userlogin" onclick="userlogin()">User</button>
</div>
<div class="vertical">
<br/><br/>
<po><a href="Admin.php">Admin Home</a></po><br/><br/>
<po>Companies Profile</po><br/><br/>
<po>Users Profile</po><br/><br/>
<po><pi>Asked Questions</pi></po><br/><br/>
<hr color="white" width="200"><br/>
<button onclick="setting()">Setting</button>
<br/><br/>
<form action="Admin.php" method="post">
<button name="LogOut">LogOut</button>
</form>
</div> 
<?php
$t=0;
while($t<$row)
{
$Questions='<div id="mainblock">
<div class="Question" id="Question">
<form method="post" action="Forum.php">
<p id="questionbox" name="questionbox" class="questionbox">
'.$Question[$t].'<lo>'.$Status[$t].'</lo>
</p>
</form>
</div> 
<br/>
<form action="Forum.php" method="post">
<textarea cols="70" rows="6" placeholder="Write Your Answer..." name="AdminAnswer'.$t.'" required></textarea>
<button id="Answer" name="Answer'.$t.'">
Answer
</button>
</form>
<form action="Forum.php" method="post">
<button id="Delete" name="Delete'.$t.'" style="position:absolute;left:680px;top:120px;">
Delete
</button>
</form>
</div><br/>
';

echo $Questions;
$t++;
}
?>
</form>
</div>
</body>
</html>