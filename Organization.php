<?php
include('Database Connection/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
.company_img{
				position:absolute;
				top:100px;
				clear:both;
				background-color:white;
				width:900px;
				height:500px;
				left:300px;
				margin-right:auto;
				box-shadow:0px 0px 1px 0px black;	
				padding:20px;
				font-family:"Trebuchet MS";
				
				
}
.company_img #image
{
				
				position:relative;
				margin-left:20px;
				margin:30px;
				border-radius:50%;
				top:10px;
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
				left:45px;
}
#search
{
	position:relative;
	top:60px;
	left:300px;
}
#search input
{
	height:30px;
	width:700px	;
}
#search button
{
	width:230px;
	height:30px;
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
<div id="search">
<form action="Organization.php" method="post">
<input type="name" name="comp_key" placeholder="Search For The Company.."/> <button name="comp_search">Search</button>
</form>
</div>
<div class="company_img">


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
								$search=$row['Search'];
								$u=$search+1;
								$comp_query="UPDATE company_register SET Search='$u' WHERE company_name='$company_name'";
								mysqli_query($db_Con,$comp_query);
								?>
									<div  id="image" >
						       		<a href="image.php?id=<?php echo $id; ?>" title="<?php echo $company_name; ?>"><img src="<?php echo $image; ?>" style="width:150px;
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
						       		<a href="image.php?id=<?php echo $id; ?>" title="<?php echo $company_name; ?>"><img src="<?php echo $image; ?>" style="width:150px;
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
						       		<a href="image.php?id=<?php echo $id; ?>" title="<?php echo $company_name; ?>"><img src="<?php echo $image; ?>" style="width:150px;
									height:150px;"></a><br/>
									<po><?php echo $company_name; ?></po>
								</div>
						       
						       	<?php }
						       }
						       	 ?>
</div>
</body>
</html>