<?php
include('Database Connection/connection.php');
session_start();
$LoginEmail=$_SESSION['user_email'];
$sql="SELECT * FROM register WHERE email='$LoginEmail' ";
$res=mysqli_query($db_Con,$sql);
$row=mysqli_fetch_array($res);
if($res)
{
	$User_First=$row['first_name'];
	$User_Last=$row['last_name'];
	$User_Contact=$row['ContactNumber'];
	$User_DOB=$row['DOB'];
	$User_Image=$row['Image'];
	$User_Cv_Location=$row['CV'];
	$User_Cv=$row['CVName'];
}
else
{
	echo "<script>
	window.alert('Failed to Login');
	</script>";
	header('location:User_Login.php');
}

//LOGOUT
if(isset($_POST['Logout']))
{
	session_destroy();
	header('location:Home.php');
}
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
::-webkit-scrollbar { 
    display: none; 
}
#content
{
	position:absolute;
}
.vertical
{
	text-align:center;
}
.vertical po
{
	position:relative;
	left:0px;
	top:70px;
	color:white;
	font-size:18px;
}
#content #User_Cv
{
	position:absolute;
	left:270px;
	top:70px;
	height:500px;
	width:600px;
	background-color:white;
	box-shadow:0px 0px 1px 0px #7B7D7D;
	font-family:"Trebuchet MS";
}
#content #User_Cv button
{
	position:relative;
	top:70px;
	left:200px;
	height:30px;
	width:150px;
	cursor:pointer;

}
#content #User_Cv #User_Cv_Header
{
	position:relative;
	padding:20px;
	width:93.5%;
	left:0px;
	background-color:#F7F9F9;
	box-shadow:0px 0px 1px 0px #7B7D7D;

}
#content #Notification
{
	position:absolute;
	left:900px;
	top:70px;
	height:530px;
	width:400px;
	background-color:white;
	box-shadow:0px 0px 1px 0px #7B7D7D;

}
#content #Notification #Notification_Box
{
	overflow-y:auto;
	overflow-x:hidden;
	height:440px;
}
#content #Notification #Inner_Notification
{
	position:relative;
	padding:20px;
	width:90%;
	left:0px;
	background-color:#BCE8C6;
	color:#096F35;
	box-shadow:0px 0px 1px 0px #7B7D7D;
	font-family:"Trebuchet MS";	

}
#content #Notification #Offer
{
	font-family:"Trebuchet MS";
	position:relative;
	padding:20px;
	margin-top:10px;
	margin-left:10px;
	background-color:#FBFCFC;
	box-shadow:0px 0px 1px 0px #7B7D7D;
	width:340px;
	height:100px;

}
#content #Notification #Offer button
{
	position:absolute;
	overflow-y:auto;
	top:30px;
	left:340px;
	background-color:#FBFCFC;
	border:0;
	color:#2E86C1;
}
#content #Notification #Offer img
{
	position:relative;
	top:-10px;
	left:-10px;
}
#content #Notification #Offer po
{

	position:relative;
	top:-110px;
	font-size:17px;
	color:#3498DB;
}
#content #Notification #Offer #pi
{
	position:relative;
	top:-100px;
	left:120px;
}
#content #Notification #Offer #pi input
{
	height:30px;
	cursor:pointer;
}
#content #Notification #Offer da
{
	position:absolute;
	top:0px;
	left:290px;

}
#content #User_Cv #INFO info
{
	position:relative;
	left:10px;
}
#content #User_Cv #INFO button
{
	position:relative;
	top:0px;
	left:0px;
	border:0;
	width:100px;
	background-color:white;
	color:#2E86C1;
}
#content #User_Cv #INFO #Info_Inner
{
	position:relative;
	padding:10px;
	top:-23px;
	margin-top:0px;
	left:140px;
	width:400px;
	height:15px;
	background-color:white;
	box-shadow:0px 0px 1px 0px black;
}
</style>
<script type="text/javascript" src="Javascript File/script.js">
function apply()
{
	document.getElementById('inner').style.display="none";
	document.getElementById('vacancy').style.display="block";

}
</script>
	</head>
		<body bgcolor="#ECF0F1">
<div class="singin">
<pro>
Job Finder
</pro>
</div>
<div class="vertical">
<img src="<?php echo $User_Image; ?>" style="position:relative;left:0px;top:50px;height:170px; width:170px;border-radius:5px;" /><br/>
<po><b><?php echo $User_First; ?> <?php echo $User_Last; ?></b><br/>
Jobs Offered:3
</po>
<form action="User_Profile_Inner" method="post"> 
	<button style="position:absolute;top:400px;" name="Logout">Logout</button>
</form>
</div> 
<div id="content">
<div id="User_Cv">
	<div id="User_Cv_Header">
	Your Information
	</div><br/>
	<div id="INFO">
	<info>Full Name:<div id="Info_Inner"><?php echo $User_First; ?> <?php echo $User_Last; ?></div>
	Date Of Birth:<div id="Info_Inner"><?php echo $User_DOB; ?></div>
	Contact Number:<div id="Info_Inner"><?php echo $User_Contact; ?></div><br/>
	Location:<div id="Info_Inner"></div>
	Your CV<br><br/>
		<?php echo $User_Cv; ?><button name="View_CV">View</button>
	</info>
	</div>
	<button name="Edit_Info">Edit Info</button>
</div>
<div id="Notification">
	<div id="Inner_Notification">
		Job Offers
	</div>
	<div id="Notification_Box">
<?php
	$t=0;
	$Company_Name=array();
	$Job_Offered=array();
	$Job_Salary=array();
	$Offer_Date=array();
	$Response=array();
	$Response_d=array();
	$Status=array();	
	$Status_re=array();
	$sql_not="SELECT * FROM job_offer WHERE User_Email='$LoginEmail'";
	$res_not=mysqli_query($db_Con,$sql_not);
	$total_not=mysqli_num_rows($res_not);
	while($t<$total_not)
	{
	$sql_not1="SELECT * FROM job_offer WHERE User_Email='$LoginEmail' ORDER BY ID DESC LIMIT 1 OFFSET $t";
			$res_not1=mysqli_query($db_Con,$sql_not1);
			$row_not1=mysqli_fetch_array($res_not1);
			$Company_Name[$t]=$row_not1['CompanyName'];
			$sql_comp="SELECT * FROM company_register WHERE company_name='$Company_Name[$t]'";
			$res_comp=mysqli_query($db_Con,$sql_comp);
			$row_comp=mysqli_fetch_array($res_comp);
			$Image=$row_comp['Image'];

			$Job_Offered[$t]=$row_not1['Job_Offered'];
			$Job_Salary[$t]=$row_not1['OfferedSalary'];
			$Offer_Date[$t]=$row_not1['TDate'];	
			$Status_re[$t]=$row_not1['Response'];
			if($Status_re[$t]==NULL)
			{
				$Status[$t]="Not Responded";
			}
			else if($Status_re[$t]=='Approve')
			{
				$Status[$t]="Approved";

			}
			else
			{
				$Status[$t]="Declined";
			}
			$dis='
				<div id="Offer">
				<img src="'.$Image.'" height="120px" width="120px"><po><b>'.$Company_Name[$t].'</b></po>
					<da><i>'.$Offer_Date[$t].'</i><br/><font color="#5DADE2">('.$Status[$t].')</font></da>
						<div id="pi">
							Job:'.$Job_Offered[$t].'<br/>
							Salary:'.$Job_Salary[$t].'<br/><br/>
							<form action="User_Profile_Inner.php" method="post">
							<input type="submit" name="Approve'.$t.'" value="Approve"/>&nbsp;&nbsp;<input type="submit" name="Decline'.$t.'" value="Decline"/>&nbsp;&nbsp;<input type="button" value="View Details"/>
							</form>
						</div>
				</div>';
				echo $dis;

				//APPROVAL 
				$Response[$t]='Approve'.$t.'';
				if(isset($_POST[$Response[$t]]))
				{
					$response_query="UPDATE job_offer SET Response='Approve' WHERE User_Email='$LoginEmail' AND CompanyName='$Company_Name[$t]' AND Job_Offered='$Job_Offered[$t]'";
					if(mysqli_query($db_Con,$response_query))
					{
						echo "<script>
						window.alert('Response Sent');
						</script>";
						header("Refresh:0");
					}
					else
					{
						echo "<script>
						window.alert('Sorry, Cannot send your response');
						</script>";

					}
				}

				//DECLINE
				$Response_d[$t]='Decline'.$t.'';
				if(isset($_POST[$Response_d[$t]]))
				{
					$response_query1="UPDATE job_offer SET Response='Decline' WHERE User_Email='$LoginEmail' AND CompanyName='$Company_Name[$t]' AND Job_Offered='$Job_Offered[$t]'";
					if(mysqli_query($db_Con,$response_query1))
					{
						echo "<script>
						window.alert('Response Sent');
						</script>";
						header("Refresh:0");
					}
					else
					{
						echo "<script>
						window.alert('Sorry, Cannot send your response');
						</script>";

					}
				}
				$t++;
	}
	ob_end_flush();

?>
</div>
</div>
</div>
</body>
</html>
