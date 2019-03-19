<?php 
include('Database Connection/connection.php');
session_start();
?>
<!DOCTYPE HTML>
<?php ob_start(); ?>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
				#company_info{
					position:absolute;
					height:500px;
					margin-left: auto;
					margin-right:auto;
					width:1000px;
					background-color:white;
					margin-left:280px;
					position: relative;
					top:70px;
					padding:15px;
					font-family:"Trebuchet MS", Helvetica, sans-serif;
				}

				#company_info #company_info1{
					position:absolute;
					background-color:#FBFCFC;
					box-shadow:0px 0px 1px 0px #7B7D7D;
					top:5px;
					left:250px;
					width:720px;
					height:470px;
					padding:10px;
					font-size:16px;

				}

				#company_info #company_logo{
					position:absolute;
					top:10px;
					padding:10px;
					left:23px;
					width:520px;
					height:500px;
				}
				#company_info #company_logo img
				{					
					border-color:#000000;

				}
				#company_info #company_info1 pi
				{
					color:#2E86C1;
					font-size:20px;
				}
				#company_info #company_info1 po
				{
					color:#566573;
					font-size:17px;
				}
				#company_info #company_info1 #message
				{
					position:absolute;
					width:300px;
					height:100px;
					background-color:black;
					left:400px;
					top:20px;

				}
				#company_info #company_info1 #message button
				{
					position:relative;
					height:30px;
					width:100px;
	            	background-color:#D0D3D4;
	            	color:black;
	            	top:10px;
	            	left:200px;

				}
				#company_info #company_info1 #CEO
				{
					position:relative;
					top:0px;
					left:5px;
					width:700px;
					height:150px;
					background-color:white;
					box-shadow:0px 0px 1px 0px #7B7D7D;
				}
				#company_info button
				{
					position:absolute;
					left:30px;
					top:250px;
					height:40px;
					width:200px;
					background-color:#3498DB;
	                color:white;
	                border:0;
	                border-radius:5px;
	                font-family:"Trebuchet MS";
	                cursor:pointer;
	            }
	            #company_info #sure
	            {
	            	display:none;
	            	position:absolute;
	            	width:230px;
	            	height:180px;
	            	padding-top:30px;
	            	padding-left:10px;
					background-color:#FBFCFC;
					box-shadow:0px 0px 1px 0px #7B7D7D;
	            	top:300px;
	            }
	            #company_info #sure button
	            {
	            	position:relative;
	            	top:30px;
	            	left:60px;
	            	height:28px;
	            	width:100px;
	            	background-color:#D0D3D4;
	            	color:black;
	            	border-radius:0px;

	            }
</style>
<script type="text/javascript">
	function sure()
	{
		document.getElementById('sure').style.display="block";
	}
	function decline()
	{
		document.getElementById('sure').style.display="none";
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
<po><pi>Companies Profile</pi></po><br/><br/>
<po>Users Profile</po><br/><br/>
<po><a href="Forum.php">Asked Questions</a></po><br/><br/>
<hr color="white" width="200"><br/>
<button onclick="setting()">Setting</button>
<br/><br/>
<form action="Admin.php" method="post">
<button name="LogOut">LogOut</button>
</form>
</div>
<div id="company_info">
		       			
				<?php
				global $company_name;
					$image_id=@$_GET['id'];

					$query="SELECT * FROM `company_register` WHERE id='$image_id' ";
					$result=mysqli_query($db_Con,$query);
					while($row=mysqli_fetch_array($result)){
						$id=$row['id'];
						$_SESSION['id']=$id;
						$company_name=$row['company_name'];
						$_SESSION['company_nam']=$company_name;
						$company_address=$row['company_address'];
						$phone_number=$row['phone_number'];
						$fax=$row['fax'];
						$employess=$row['employess'];
						$image=$row['Image'];
						$company_overview=$row['company_overview'];
						$company_news=$row['company_news'];					
				?>	

				<div id="company_info1">
					<pi><b><?php echo $company_name; ?></b></pi><br/><br/>
					<po>Address:</po><?php echo $company_address; ?><br/><br/>
					<po>Phone Number:</po><?php echo $phone_number; ?><br/><br/>
					<po>Fax:</po> <?php echo $fax; ?><br/><br/>
					<po>Employess:</po><?php echo $employess; ?><br/><br/>
					<po>Total Applicants:</po><br/><br/>
					<po>Rating:</po><br/><br/>
					<po>About CEO:</po><br/><br/>
					<div id="CEO">

					</div>
					<div id="message">
					<form action="Admin_Company_Info.php" method="post">
						<textarea cols="40" rows="7" name="message" placeholder="Write A Message.." required></textarea><br/>
						<button name="mail">Send</button>
					</form>

					</div>
				</div>
				<div id="company_logo">
					<img src="<?php echo $image; ?>" style="width:200px; height:200px;" >

					<?php 
						}
					?> 
					<?php
					$Company_N=$_SESSION['company_nam'];
					if(isset($_POST['mail']))
					{
						$Message=$_POST['message'];
						$SDate=date("Y/m/d");
						$ID=$_SESSION['id'];
						$Redirect='Admin_Company_Info?id='.$ID.'';
						$sql45="INSERT INTO admin_message(Company,Message,SDate) VALUES('$Company_N','$Message','$SDate')";
						if(mysqli_query($db_Con,$sql45))
						{
							echo "<script>
							window.alert('Message Sent');
							</script>";

						}
						else
						{
						echo "<script>
						window.alert('Message Not Sent');
						</script>";
						}
						header('Location:'.$Redirect);

					}
					if(isset($_POST['remove']))
					{
						$delete_query="DELETE * FROM company_register WHERE company_name='$Company_N'";
						$delete_query="DELETE * FROM admin_message WHERE Company='$Company_N'"; 
						$delete_query="DELETE * FROM jobpost WHERE Organization='$Company_N'";
						$delete_query="DELETE * FROM news WHERE CompanyName='$Company_N'";
						mysqli_multi_query($db_Con,$delete_query);
						header('location:Admin_Company.php');
					}
					?>
				</div>

			<br/><br/> 
			<button onclick="sure()">Remove</button>
			<div id="sure">
				Are you sure you want to remove this company?<br/>
				<form action="Admin_Company_Info.php" method="post">
				<button name="remove" id="remove" >Proceed</button><br/><br/>
				<button name="decline" id="decline" onclick="decline()">Decline</button>
				</form>
			</div>
     		
		  </div>
</body>
</html>