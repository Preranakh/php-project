<?php
include('Database Connection/connection.php');
	
	if(isset($_POST['submit']))
	{
		 $first_name=$_POST['FirstName'];
		 $last_name=$_POST['LastName'];
		 $email=$_POST['Email'];
		 $password=$_POST['Password'];
		 $cpassword=$_POST['CPassword'];
		 $date=$_POST['Date'];
		 $ContactNumber=$_POST['ContactNumber'];
		 $Intrest_Field=$_POST['Intrest_Field'];
		 
		 if(file_exists('./img/User/'.$email.''))
		 {
		 	echo "<script>
		 	window.alert('E-mail is already used');
		 	</script>
		 	";
		 }
		 else
		 {
		 mkdir('./img/User/'.$email.'',0777,true);

		 $cv_name=$_FILES['cv']['name'];
		 $cv_type=$_FILES['cv']['type'];
		 $cv_size=$_FILES['cv']['size'];
		 $cv_tmp=$_FILES['cv']['tmp_name'];

		 if($cv_type=="application/pdf")
		 {

		 	if($cv_size<=1000000000)
		 	{
		 		move_uploaded_file($cv_tmp,"./img/User/$email/$cv_name");
		 	}
		 	else
		 	{
		 		echo "<script>
		 		window.alert('PDF should be less than 10MB);
		 		</script>";
		 	}
		 }
		 else
		 {
		 	echo "<script>
		 	window.alert('PDF not submitted');
		 	</script>";
		 }
		 $Cv='./img/User/'.$email.'/'.$cv_name.'';

	  
	 $image_name=$_FILES['image']['name'];
	 $image_type=$_FILES['image']['type'];
	 $image_size=$_FILES['image']['size'];
	 $image_tmp=$_FILES['image']['tmp_name'];
		if($image_type=="image/jpeg" or $image_type=="image/png" or $image_type=="image/gif")
		{
			if($image_size<=500000000)
			{
				move_uploaded_file($image_tmp, "./img/User/$email/$image_name");
			}
			else
			{
				echo "<script>
				window.alert('Image size is greater than 5MB');
				</script>";
			}
		}
		
		else
		{
			echo "<script>
			window.alert('Invalid Image File');
			</script>";
		}
		$Uimage='./img/User/'.$email.'/'.$image_name.'';

		if($password==$cpassword)
		 {
		 	$sql="INSERT INTO register(first_name,last_name,email,password,ContactNumber,DOB,Image,CV,CVName,InterestedField) VALUES('$first_name','$last_name','$email','$password','$ContactNumber','$date','$Uimage','$Cv','$cv_name','$Intrest_Field')";	
		 	if(mysqli_query($db_Con,$sql))
		 	{
		 		echo "<script>
		 		window.alert('Registered Successfully');
		 		</script>
		 		";
		 	}
		 	else
		 	{
		 		echo "<script>
		 		window.alert('Registration Failed');
		 		</script>
		 		";
		 	}
		 }
		 else
			 {
			 		echo "confirm password and password must be same";
			 		
			 }
			}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
#main_part{
	position:relative;
				background-color:white;
				left: 320px;
				height:400px;
				margin-right:auto;
				width:900px;
				top:150px;
				padding:20px;
		}
		#main_part form
		{
			position:relative;
			left:130px;
			top:30px;
			font-family:"Trebuchet MS", Helvetica, sans-serif;
			
		}

		#main_part form input
		{
			height:30px;
			width:250px;
		}
		#main_part form button
		{
			position:relative;
			left:380px;
			top:-50px;
			height:30px;
			width:200px;
			cursor:pointer;
		}
		#main_part #header
{
	position:relative;
	left:230px;
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
<po><a href="Organization.php">Companies Accounts</a></po><br/><br/>
<po>Users Accounts</po><br/><br/>
<po><a href="HomeForum.php">Forum</a></po><br/><br/>
<po>About Us</po><br/><br/>
<hr width="230px"><br/>
<button name="Ureg" onclick="Ureg()">User Registration</button><br/><br/>
<button onclick="Oreg()" >Company Registration</button>
</div> 
		<div id="main_part">	
					
							<form action="URegistration.php" method="post" enctype="multipart/form-data">
							<div id="header">Create Your Account</div><br/><br/>
										<input type="name" name="FirstName" placeholder="First Name" required >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									

				
										
										<input type="name" name="LastName" placeholder="Last Name" required><br/><br/>
									

									
										
										<input type="Email" name="Email" placeholder="E-mail" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									


									
										
										<input type="password" name="Password" placeholder="Password" required/><br/><br/>
									

									
									
										<input type="password" name="CPassword" placeholder="Confirm password" required/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									

									
										
										<input type="name" name="Date" placeholder="Date of birth(YY-MM-DD)" required/><br/><br/>
										<input type="name" name="ContactNumber" placeholder="Contact Number" required/>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										Profile Picture:-<input type="file" name="image" style="width:200px;" required><br/><br/>
										Upload Your CV:-<input type="file" name="cv"/><br/><br/>
										<input type="name" name="Intrest_Field" placeholder="Interested Field(Only One Specific)"/><br/><br/>

									<button name="submit">Register<br/>	
									
									
								
							</form>
							
						
		</div>
</body>
</html>