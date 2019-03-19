<?php
include('Database Connection/connection.php');
global $message;
if(isset($_POST['submit']))
{
	$Company_Name=$_POST['Company_Name'];
	$Company_Address=$_POST['Company_Address'];
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];
	$Phone_Number=$_POST['Phone_Number'];
	$Fax=$_POST['Fax'];
	$Employees=$_POST['Employees'];
	$Company_Overview=$_POST['Company_Overview'];
	$Company_News=$_POST['Company_News'];

	mkdir('./img/Company/'.$Email.'',0777,true);
	mkdir('./img/Company/'.$Email.'/News',0777,true);

	  
	 $image_name=$_FILES['image']['name'];
	 $image_type=$_FILES['image']['type'];
	 $image_size=$_FILES['image']['size'];
	 $image_tmp=$_FILES['image']['tmp_name'];
		if($image_type=="image/jpeg" or $image_type=="image/png" or $image_type=="image/gif")
		{
			if($image_size<=500000000)
			{
				move_uploaded_file($image_tmp, "./img/Company/$Email/$image_name");
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
		$image='./img/Company/'.$Email.'/'.$image_name.'';
		$sql="INSERT INTO company_register(company_name,company_address,email,password,phone_number,fax,employess,company_overview,company_news,Image,Search,Rating) VALUES('$Company_Name','$Company_Address','$Email','$Password','$Phone_Number','$Fax','$Employees','$Company_Overview','$Company_News','$image',NULL,NULL)";
		if(mysqli_query($db_Con,$sql))
		{
			$sql1="CREATE TABLE $Company_Name(
              ID INT(11) AUTO_INCREMENT PRIMARY KEY,
              ApplicantFirstName VARCHAR(200) NOT NULL,
              ApplicantLastName VARCHAR(30) NOT NULL,
              ApplicantEmail VARCHAR(50) NOT NULL,
              ApplicantNumber BIGINT(11) NOT NULL,
              JobTitle VARCHAR(250) NOT NULL
              )";
              if(mysqli_query($db_Con,$sql1))
              {
              	echo "<script>
              	window.alert('Table created');
              	</script>";
              }
              else
              {
              echo "<script>
              	window.alert('Table not created');
              	</script>";              	
              }
			echo "<script>
			window.alert('Registraton Successfull');
			</script>
			";
		}
		else
		{
			echo "<script>
			window.alert('Registraton Failed');
			</script>
			";

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
	
    position: absolute;
    top:5px;
    bottom:20px;
}

#main_section
{
	position:relative;
	background-color:white;
	left: 320px;
	margin-right: auto;
	width:900px;
	top:100px;
	padding:20px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#main_section form
{
	position:relative;
	left:25px;
}
#main_section form input
{
	position:relative;
	height:30px;
	width:330px;
}
#main_section form button
{
	position:relative;
	left:330px;
	height:30px;
	width:200px;
	cursor:pointer;
}
#main_section #header
{
	position:relative;
	left:350px;
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
<div id="content">
					<div id="main_section" >
						<form action="ORegistration.php" method="post" enctype="multipart/form-data">
						<div id="header">Register A Company</div><br/><br/>
								
									<input type="name" name="Company_Name" placeholder="Company Name" required >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								

								
									<input type="name" name="Company_Address" placeholder="Company Address" required><br/><br/>
								


									<input type="Email" name="Email" placeholder="E-mail" required></td>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


								
									
									<input type="password" name="Password" placeholder="Password" required><br/><br/>
							

							
									
									<input type="name" name="Phone_Number" placeholder="Phone number" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

								
								
									<input type="name" name="Fax" placeholder="Fax number" required></td><br/><br/>
								

								
									
									<input type="name" name="Employees" placeholder="Total number of Employees" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								
									Company Logo:-<input type="file" name="image" style="width:200px;" required><br/><br/>
								

								
									<textarea name="Company_Overview" cols="45" rows="7" placeholder="Write overview of the company"></textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								

								
									
									<textarea name="Company_News"    cols="45" rows="5" placeholder="Slogan of the company" style="position:relative;top:-30px;" ></textarea><br/><br/>
								

								<button name="submit">Register</button>		


						</form>
					
			</div>
			</div>
</body>
</html>