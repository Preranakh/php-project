<?php 
include('Database Connection/connection.php');
session_start();
	if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$query="SELECT * FROM company_register WHERE email='$email'";
		$result=mysqli_query($db_Con,$query);
		$row=mysqli_fetch_array($result);
		$dPassword=$row['password'];
		if($dPassword==$password)
		{
			$_SESSION['login_email']=$email;
			header("location:sample.php");
		}else
		{

			echo "<script>
			window.alert('please enter your valid email and password');
			</script>";
		}


	}

	

?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#main
{
	position:relative;
	padding:20px;
	background-color:white;
	width:900px;
	height:300px;
	left:325px;
	top:150px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#main form
{
	position:relative;
	left:280px;

}
#main form #head
{
	position:relative;
	left:70px;
}
#main form input
{
	width:300px;
	height:30px;
}
#main form button
{
	position:relative;
	height:30px;
	width:150px;
	left:70px;
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
<po><pi>Companies Accounts</pi></po><br/><br/>
<po><a href="#">Users Accounts</a></po><br/><br/>
<po><a href="HomeForum.php">Forum</a></po><br/><br/>
<po>About Us</po><br/><br/>
<hr width="230px"><br/>
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div> 
<div id="main">
		<form action="organization_sign.php" method="post">
				<p id="head">Organization Sign In</p><br/><br/>
				
					<input type="email" name="email" placeholder="E-mail" required><br/><br/>
				
					<input type="password" name="password" placeholder="Password" required><br/><br/>
				<button name="submit">Sign In</button>
			
		</form>
		</div>
</body>
</html>