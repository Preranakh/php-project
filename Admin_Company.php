<?php 
include('Database Connection/connection.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
.company_img{
				position:absolute;
				top:30px;
				clear:both;
				background-color:white;
				width:1030px;
				height:500px;
				left:270px;
				margin-right:auto;
				box-shadow:0px 0px 1px 0px black;	
				padding:20px;
				color:black;
				font-family:"Trebuchet MS";
				
				
}
.company_img lo
{
	color:#34495E;
	font-size:23px;
}
.company_img pi
{
	font-size:14px;
	color:#797D7F;

}
.company_img #image
{
				
				position:relative;
				margin-left:20px;
				margin:30px;
				border-radius:50%;
				top:-40px;
				border-radius:0px 1px 1px 0px black;
				float:left;
				text-transform: uppercase;
				font-size:15px;

}
.company_img #image img
{

				border-radius: 0%;
				position: relative;
}
.company_img #image po
{
				position: relative;
				color:black;
				left:45px;
}
.company_img #search
{
	position:relative;
	top:-30px;
	left:600px;
}
.company_img #search form input
{
	height:30px;
	width:300px	;
}
.company_img #search form button
{
	border-radius:5px;
	height:40px;
	background-color:#3498DB;
	color:white;
	width:100px;
	cursor:pointer;
}
</style>
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
<po><pi>Companies Profile</pi></po><br/><br/>
<po>Users Profile</po><br/><br/>
<po><a href="Forum.php">Asked Questions</a></po><br/><br/>
<hr color="white" width="200"><br/>
<button onclick="setting()">Setting</button>
<br/><br/>
<form action="Admin.php" method="post">
<button name="LogOut">LogOut</button>
</form>
<div class="company_img">
<lo>Company</lo>-<pi>View Company Details</pi>
<div id="search">
<form action="Admin_Company.php" method="post">
<input type="name" name="comp_key" placeholder="Search For The Company.."/> <button name="comp_search">Search</button>
</form>
</div>

							<?php
							if(isset($_POST['comp_search']))
							{
								$company_name=$_POST['comp_key'];
								$query="SELECT * FROM company_register WHERE company_name='$company_name'";
								$result=mysqli_query($db_Con,$query);
								$num=mysqli_num_rows($result);
								if($num!=0)
								{
									
							
								$row=mysqli_fetch_array($result);
								$image=$row['Image'];
								$id=$row['id'];
								?>
									<div  id="image" >
						       		<a href="Admin_Company_Info.php?id=<?php echo $id; ?>" title="<?php echo $company_name; ?>"><img src="<?php echo $image; ?>" style="width:150px;
									height:150px;"></a><br/>
									<po><?php echo $company_name; ?></po>
								</div>
								<?php
							}
							else
							{
								echo "<script>
								window.alert('Sorry $company_name not found');
								</script>";
								$query="SELECT * FROM `company_register` ";
								$result=mysqli_query($db_Con,$query);
								while($row=mysqli_fetch_array($result)){
									$id=$row['id'];
									$company_name=$row['company_name'];
									$company_address=$row['company_address'];
									$phone_number=$row['phone_number'];
									$fax=$row['fax'];
									$employess=$row['employess'];
									$image=$row['Image'];
									$company_overview=$row['company_overview'];
									$company_news=$row['company_news'];
									?>
						        	<div  id="image" >
						       		<a href="Admin_Company_Info.php?id=<?php echo $id; ?>" title="<?php echo $company_name; ?>"><img src="<?php echo $image; ?>" style="width:150px;
									height:150px;"></a><br/>
									<po><?php echo $company_name; ?></po>
								</div>
								<?php 
							}

							}
						}
							else
							{

								$query="SELECT * FROM `company_register` ";
								$result=mysqli_query($db_Con,$query);
								while($row=mysqli_fetch_array($result)){
									$id=$row['id'];
									$company_name=$row['company_name'];
									$company_address=$row['company_address'];
									$phone_number=$row['phone_number'];
									$fax=$row['fax'];
									$employess=$row['employess'];
									$image=$row['Image'];
									$company_overview=$row['company_overview'];
									$company_news=$row['company_news'];
								
							?>	
						       	<div  id="image" >
						       		<a href="Admin_Company_Info.php?id=<?php echo $id; ?>" title="<?php echo $company_name; ?>"><img src="<?php echo $image; ?>" style="width:150px;
									height:150px;"></a><br/>
									<po><?php echo $company_name; ?></po>
								</div>
						       
						       	<?php }
						       }
						       	 ?>
</div>
</body>
</html>