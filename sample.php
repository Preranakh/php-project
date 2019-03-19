<?php
include('Database Connection/connection.php');
session_start();
$Company_Email=$_SESSION['login_email'];
$Company_Name;
$Company_Address;
$Phone_Number;
$Fax;
$Employees;
$id;
$sql="SELECT * FROM company_register WHERE email='$Company_Email' LIMIT 1";
$result=mysqli_query($db_Con,$sql);
$row=mysqli_fetch_array($result);
$Company_Name=$row['company_name'];
$Company_Address=$row['company_address'];
$Phone_Number=$row['phone_number'];
$Fax=$row['fax'];
$Employees=$row['employess'];
$image=$row['Image'];
$id=$row['id'];
if(isset($_POST['Done']))
{
	$Compani_Name=$_POST['CompanyName'];
	$Compani_Address=$_POST['CompanyAddress'];
	$Phoni_Number=$_POST["PhoneNumber"];
	$Employeei=$_POST['TotalEmployee'];
	$Fai=$_POST['FaxNumber'];
	if($Compani_Name!=null)
	{
		$sql="UPDATE company_register SET company_name='$Compani_Name' WHERE id='$id' ";
		mysqli_query($db_Con,$sql);
		$Company_Name=$Compani_Name;
	}
	if($Compani_Address!=null)
	{
		$sql="UPDATE company_register SET company_address='$Compani_Address' WHERE id='$id' ";
		mysqli_query($db_Con,$sql);
		$Company_Address=$Compani_Address;
	}
	if($Phoni_Number!=null)
	{
		$sql="UPDATE company_register SET phone_number='$Phoni_Number' WHERE id='$id' ";
		mysqli_query($db_Con,$sql);
		$Phone_Number=$Phoni_Number;
	}
	if($Employeei!=null)
	{
		$sql="UPDATE company_register SET employess='$Employeei' WHERE id='$id' ";
		mysqli_query($db_Con,$sql);
		$Employees=$Employeei;
	}
	if($Fai!=null)
	{
		$sql="UPDATE company_register SET fax='$Fai' WHERE id='$id' ";
		mysqli_query($db_Con,$sql);
		$Fax=$Fai;
	}

}
if(isset($_POST["JobPost"]))
{
	$JobTitle=$_POST["JobTitle"];
	$VacantSeats=$_POST["VacantSeats"];
	$LastDate=$_POST["LastDate"];
	$Salary=$_POST["Salary"];
	$WorkingLocation=$_POST["WorkingLocation"];
	$Requirement1=$_POST['Requirement1'];
	$Requirement2=$_POST['Requirement2'];
	$Requirement3=$_POST['Requirement3'];
	$Requirement4=$_POST['Requirement4'];
	$Requirement5=$_POST['Requirement5'];
	$sql="INSERT INTO jobpost(JobTitle,Organization,VacantSeat,LastDate,Salary,WorkingLocation,Requirement1,Requirement2,Requirement3,Requirement4,Requirement5) VALUES('$JobTitle','$Company_Name','$VacantSeats','$LastDate','$Salary','$WorkingLocation','$Requirement1','$Requirement2','$Requirement3','$Requirement4','$Requirement5')";

	if(mysqli_query($db_Con,$sql))
	{
		echo "<script>
		window.alert('Job Posted');
		</script>";		
	}
	else
	{
		echo "<script>
		window.alert('Job Not Posted');
		</script>";	

	}
}
if(isset($_POST["LogOut"]))
{
	unset($_SESSION['login_email']);
	session_destroy();
	header('location:organization_sign.php');
}
?>
<?php
//POSTING NEWS
if(isset($_POST['PostNews']))
{
	$News=$_POST['news'];
	$Title=$_POST['NewsTitle'];
	$today_date=date('Y/m/d');

 	$news_name=$_FILES['news_pdf']['name'];
 	$news_type=$_FILES['news_pdf']['type'];
	$news_size=$_FILES['news_pdf']['size'];
	$news_tmp=$_FILES['news_pdf']['tmp_name'];
	if($news_name!=NULL){

		if($news_type=="application/pdf")
		 {

		 	if($news_size<=1000000000)
		 	{
		 		move_uploaded_file($news_tmp,"./img/Company/$Company_Email/News/$news_name");
		 	}
		 	else
		 	{
		 		echo "<script>
		 		window.alert('PDF should be less than 10MB);
		 		</script>";
		 	}
		 	$New_Location='./img/Company/'.$Company_Email.'/News/'.$news_name.'';
		 	$sql5="INSERT INTO news(CompanyName,News,PDF,NewsTitle,PDF_Name,TDate) VALUES('$Company_Name','$News','$New_Location','$Title','$news_name','$today_date')";
		 	if(mysqli_query($db_Con,$sql5))
		 	{
		 		echo "<script>
		 		window.alert('News Published');
		 		</script>";
		 	}
		 	else
		 	{
		 		echo "<script>
		 		window.alert('News Not Published');
		 		</script>";
		 	}
		 }
		 else
		 {
		 	echo "<script>
		 	window.alert('PDF version of  news was not submitted');
		 	</script>";
		 }
		}
		else
		{
		$sql5="INSERT INTO news(CompanyName,News,PDF,NewsTitle,PDF_Name) VALUES('$Company_Name','$News',NULL,'$Title',NULL)";
		 	if(mysqli_query($db_Con,$sql5))
		 	{
		 		echo "<script>
		 		window.alert('News Published');
		 		</script>";
		 	}
		 	else
		 	{
		 		echo "<script>
		 		window.alert('News Not Published');
		 		</script>";
		 	}

		}


}	
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head><title>JobFinder</title>
<link rel="stylesheet" type="text/css" href="head-nav.css">
<style>
.singin #lo
{
	position:relative;
	left:1100px;
	top:-40px;
	padding:20px;
	height:10px;
	width:190px;
	background-color:#F4F6F7;
	color:#4D5656;
	box-shadow:0px 0px 1px 0px black;
	font-size:17px;
	text-transform: uppercase;
	font-family:"Trebuchet MS";
}
.singin #lo po
{
	position:relative;
	top:-25px;
	left:-10px;
}

#tables
{
	position:relative;
	padding:20px;
	width:900px;
	height:400px;
	background-color:white;
	left:10px;
	top:60px;
	box-shadow:0px 0px 1px 0px black;
}
#tables #logo
{
	display:block;
	position:relative;
	padding:20px;
	height:350px;
	width:250px;
	background-color:#B5CDCE;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#tables #info
{
	display:block;
	position:relative;
	padding:20px;
	left:300px;
	top:-390px;
	width:550px;
	height:350px;
	background-color:white;
	border-radius:10px;
}
#tables #logo img
{
	position:relative;
	left:25px;
	height:150px;
	width:150px;
	border-radius:50%;
}
#tables #logo button
{
	position:relative;
	height:30px;
	width:200px;
	left:30px;
	top:10px;
	cursor:pointer;
}
#tables #info #Name
{
	position:relative;
	height:23px;
	background-color:white;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#tables #info #Name #data
{
	position:relative;
	background-color:#B3B6B7;
	width:440px;
	top:-20px;
	left:135px;
	color:black;
	padding-left:10px;
	text-transform:uppercase;

}
#tables #info button
{
	position:relative;
	height:30px;
	width:200px;
	left:200px;
	cursor:pointer;
	background-color:#B5CDCE;
	border-radius:5px;
	border-color:#B5CDCE; 
}
#tables #messages
{
	display:none;
	overflow-y:auto;
	position:absolute;
	padding:20px;
	background-color:#FBFCFC;
	box-shadow:0px 0px 1px 0px #979A9A;
	width:560px;
	height:350px;
	left:320px;
	top:20px;
	font-family:"Trebuchet MS";

}
#tables #messages po
{
	font-size:20px;
}
#tables #messages #message_box
{
	position:relative;
	margin-top:10px;
	background-color:white;
	color:#4D5656;
	height :100px;
	width:550px;
	box-shadow:0px 0px 1px 0px #979A9A;
	font-size:16px;
}
#tables #messages #message_box pi
{
	position:relative;
	left:450px;
	color:#3498DB;
	font-size:15px;
	
}
#tables #messages #message_box lo
{
	position:relative;
	left:20px;
}
#tables #edit
{
	display:none;
	position:relative;
	padding:20px;
	left:300px;
	top:-390px;
	width:550px;
	height:350px;
	background-color:white;
	border-radius:10px;
}
#tables #edit #name
{
	position:relative;
	height:23px;
	background-color:white;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#tables #edit #name input
{
	position:relative;
	left:30px;
	height:20px;
	width:500px;
}
#tables #edit button
{
	position:relative;
	height:30px;
	width:100px;
	cursor:pointer;
	left:180px;
}
#content #Applicant
{
	display:block;
	position:absolute;
	top:510px;
	left:30px;
	width:900px;

}
#Applicant #header
{
	position:relative;
	padding:20px;
	left:-20px;
	top:0px;
	height:20px;
	width:100%;
	background-color:#F4F6F7;
	box-shadow:0px 0px 1px 0px black;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
}
#Applicant #ApplicantList
{
	position:relative;
	padding:20px;
	left:-20px;
	background-color:white;
	box-shadow:0px 0px 1px 0px black;
	height:100px;
	width:100%;
}
#Applicant #ApplicantList po
{
	position:relative;
	top:-90px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;	
	color:#2E86C1;
	text-transform: uppercase;
}
#Applicant #ApplicantList pi
{
	position:relative;
	left:105px;
	top:-80px;
	font-family:"Trebuchet MS", Helvetica, sans-serif;	
	color:#34495E ;
}
#Applicant #ApplicantList button
{
	position:absolute;
	height:30px;
	width:150px;
	left:750px;
	top:50px;
	background-color:#2E86C1;
	color:white;
	font-family:"Trebuchet MS", Helvetica, sans-serif;
	cursor:pointer;
}
#tables #PostAJob
{
	display:none;
	position:relative;
	left:300px;
	top:-370px;
}
#tables #PostAJob input
{

	height:30px;
	width:230px;

}
#tables #PostAJob button
{
	position:relative;
	left:0px;
	height:30px;
	width:200px;
	cursor:pointer;
}
#content
{
	position:absolute;
}
#content #message
{
	display:block;
	font-family:"Trebuchet MS";
	position:fixed;
	padding:20px;
	top:100px;
	left:960px;
	background-color:white;
	height:200px;
	width:330px;
	box-shadow:0px 0px 1px 0px black;
}
#content #message button
{
	position:relative;
	top:-20px;
	height:30px;
	width:130px;
	left:200px;
	cursor:pointer;
}
#content #message #header
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
#content #news
{
	display:block;
	font-family:"Trebuchet MS";
	position:fixed;
	padding:20px;
	height:280px;
	width:330px;
	left:960px;
	top:345px;
	background-color:white;
	box-shadow:0px 0px 1px 0px black;
}
#content #news input
{
	height:25px;
	width:330px;
}
#content #news #header
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
#content #news button
{
	position:relative;
	height:30px;
	width:130px;
	cursor:pointer;
	left:200px;
}
.singin #lo input#Logout
{
	position:absolute;
	left:-50px;
	top:3px;
	background:url(./img/Logout2.png);
	background-size:100% auto;
	width:50px;
	height:50px;
	border:0;
	z-index:1;
	cursor:pointer;
}
#content #Search_Box
{
	display:none;
	overflow-y:auto;
	overflow-x:hidden;
	font-family:"Trebuchet MS";
	position:fixed;
	padding:20px;
	height:510px;
	width:330px;
	left:960px;
	top:100px;
	background-color:white;
	box-shadow:0px 0px 1px 0px black;
} 
#content #Search_Box #Search_Box_Result
{
	position:relative;
	padding:10px;
	margin-left:-10px;
	margin-top:10px;
	background-color:#FBFCFC;
	box-shadow:0px 0px 1px 0px #4D5656;
	height:230px;
	width:320px;
	font-size:14px;
}
#content #Search_Box #Search_Box_Result #po
{
	position:relative;
	top:-215px;
	left:110px;
	color:#424949;
}
#content #Search_Box #Search_Box_Result #po button
{
	position:relative;
	left:0px
	border:0;
	background-color:#3498DB;
	color:white;
	border-radius:3px;
	cursor:pointer;
	height:25px;
}
#content #Search_Box #Search_Box_Result lo
{
	position:relative;
	font-size:16px;
	color:#3498DB;
}
#content #Response
{
	display:none;
	overflow-y:auto;
	overflow-x:hidden;
	font-family:"Trebuchet MS";
	position:fixed;
	padding:20px;
	height:510px;
	width:330px;
	left:960px;
	top:100px;
	background-color:white;
	box-shadow:0px 0px 1px 0px black;

}
#content #Response #Response_box
{
	position:relative;
	margin-top:5px;
	left:0px;
	background-color:#FBFCFC;
	box-shadow:0px 0px 1px 0px #626567;
	height:120px;
	font-size:15px;
	color:#566573;
}
#content #Response #Response_box po
{
	position:relative;
	top:-100px;
	font-size:17px;
	color:#3498DB;
}
#content #Response #Response_box #Response_Inner_Box
{
	position:relative;
	top:-100px;
	left:105px;
}
#content #Response #Response_box #Response_Inner_Box button
{
	position:relative;
	top:10px;
	height:25px;
	cursor:pointer;
	border:0;
	background-color:#EBF5FB;
	color: #2874A6;
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
<div id="lo">
<form action="sample.php" method="post">
<input type="submit" id="Logout" name="LogOut" value=""/>
</form>
<img src="<?php echo $image; ?>" height="40px" width="40px" style="position:relative;top:-14px;left:-18px"/>
<po><?php echo $Company_Name; ?></po>	
</div>
</div>
<div id="content">
<div id="tables">
<div id="logo">
<img src="<?php echo $image; ?>" />
<button>Change Logo</button><br/><br/>
<button name="View_Message" id="View_Message" onclick="message()">View Messages</button><br/><br/>
<?php
$j=0;
$display=array();
$Message=array();
$Date=array();
$SDate=date('Y/m/d');
$sql45="SELECT * FROM admin_message WHERE Company='$Company_Name'";
$res45=mysqli_query($db_Con,$sql45);
$total_message=mysqli_num_rows($res45);
$sql456="SELECT * FROM admin_message WHERE Company='$Company_Name' AND SDate='$SDate'";
$res456=mysqli_query($db_Con,$sql456);
$today_message=mysqli_num_rows($res456);
while($j<$total_message)
{
$sql41="SELECT * FROM admin_message WHERE Company='$Company_Name' ORDER BY ID DESC LIMIT 1 OFFSET $j";
$res41=mysqli_query($db_Con,$sql41);
$row41=mysqli_fetch_array($res41);
$Message[$j]=$row41['Message'];
$Date[$j]=$row41['SDate'];
$display[$j]='
		<div id="message_box">
		<pi><i>('.$Date[$j].')</i></pi><br/>
		<lo>'.$Message[$j].'</lo>
</div>';
$j++;
}
?>
<font style="position:relative;left:60px;top:10px;">Total Messages(<?php echo $total_message; ?>)<br/><br/>
Today's Message(<?php echo $today_message; ?>)</font>
</div>
<div id="info">
<div id="Name">
Company Name:-<div id="data"><?php echo $Company_Name; ?></div>
</div>
<br/>
<div id="Name">
Address:-<div id="data"><?php echo $Company_Address; ?></div>
</div>
<br/>
<div id="Name">
Contact Number:-<div id="data"> <?php echo $Phone_Number; ?></div>
</div>
<br/>
<div id="Name">
Total Employees:-<div id="data"><?php echo $Employees; ?></div>
</div>
<br/>
<div id="Name">
Fax Number:- <div id="data"><?php echo $Fax; ?></div>
</div>
<br/>
<div id="Name">
Jobs Offered:-<div id="data"></div>
</div>
<br/>
<div id="Name">
Vacant Seats:-<div id="data"></div>
</div>
<br/>
<button onclick="edit()">Edit Info</button>
<br/><br/>
<button onclick="PostAJob()">Post A Job</button>
</div>
<!--Admin Messages-->
<div id="messages">
	<po>Admin Messages</po><br/><br/>
<?php
$c=0;
while($c<$total_message)
{
	echo $display[$c];
	$c++;
}
?>
</div>

<div id="PostAJob">
<form method="post" action="sample.php">
<input type="name" name="JobTitle" placeholder="Job Title" required >&nbsp;&nbsp;&nbsp;&nbsp;
<input type="name" name="Requirement1" placeholder="Requirement 1" style="width:330px;" required/>
<br/><br/>
<input type="name" name="VacantSeats" placeholder="Vacant Seats" required>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="name" name="Requirement2" placeholder="Requirement 2" style="width:330px;" required/><br/><br/>
<input type="name" name="LastDate" placeholder="Last Date of Application(YYYY-MM-DD)" required>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="name" name="Requirement3" placeholder="Requirement 3" style="width:330px;"/ required><br/><br/>
<input ty="name" name="Salary" placeholder="Salary" required />&nbsp;&nbsp;&nbsp;&nbsp;
<input type="name" name="Requirement4" placeholder="Requirement 4" style="width:330px;"/><br/><br/>
<input type="name" name="WorkingLocation" placeholder="Working Location" required />&nbsp;&nbsp;&nbsp;&nbsp;
<input type="name" name="Requirement5" placeholder="Requirement 5" style="width:330px;"/><br/><br/>
<button name="JobPost">Post</button><br/><br/>
</form>
<button onclick="discard()">Discard</button>
</div>
<form method="post" action="sample.php">
<div id="edit">
<div id="name">
<input type="name" placeholder="Company Name" name="CompanyName" class="CompanyName" id="CompanyName"/>
</div>
<br/>
<div id="name">
<input type="name" placeholder="Address" name="CompanyAddress" class="CompanyAddress" id="CompanyAddress" />
</div>
<br/>
<div id="name">
<input type="name" placeholder="Contact Number" name="PhoneNumber" id="PhoneNumber" class="PhoneNumber" />
</div>
<br/>
<div id="name">
<input type="name" placeholder="Total Employee" name="TotalEmployee" id="TotalEmployee" class="TotalEmployee" />
</div>
<br/>
<div id="name">
<input type="name" placeholder="Fax Number" name="FaxNumber"  id="FaxNumber" class="FaxNumber" />
</div>
<br/>
<div id="name">
<input type="name" placeholder="Jobs Offered" />
</div>
<br/>
<div id="name">
<input type="name" placeholder="Vacant Seats"/>
</div>
<br/>
<button onclick="exit()" id="Done" name="Done" class="Done">Done</button>
<button onclick="exit()">Discard</button>
</div>
</form>
</div>
<div id="Applicant">
<div id="header">
<b>Applicants</b>
</div>
<?php

//Viewing Applicant
$FisrtName=array();
$LastName=array();
$AEmail=array();
$ANumber=array();
$AImage=array();
$ACv=array();
$y=0;
$x=0;
$i=0;
$query="SELECT * FROM $Company_Name";
$res1=mysqli_query($db_Con,$query);
while($x<mysqli_num_rows($res1))
{
$sql="SELECT * FROM $Company_Name ORDER BY ID asc LIMIT 1 OFFSET $x";
$res=mysqli_query($db_Con,$query);
$row=mysqli_fetch_array($res1); // gives one row

$FirstName[$x]=$row['ApplicantFirstName'];
$LastName[$x]=$row['ApplicantLastName'];
$AEmail[$x]=$row['ApplicantEmail'];
$ANumber[$x]=$row['ApplicantNumber'];
$JobTitle[$x]=$row['JobTitle'];
$x++;
}

while($i<mysqli_num_rows($res1))
{
	$query="SELECT * FROM register WHERE email='$AEmail[$i]' ";
	$result1=mysqli_query($db_Con,$query);
	$row4=mysqli_fetch_array($result1);
	$AImage[$i]=$row4['Image'];
	$ACv[$i]=$row4['CV'];
	$ACvName[$i]=$row4['CVName'];
$Applicant='<div id="ApplicantList">
<img src="'.$AImage[$i].' " height="100px" width="100px"/>
<po><b>'.$FirstName[$i].' '.$LastName[$i].'</b></po><br/>
<pi>Applied Job:-'.$JobTitle[$i].'</pi><br/>
<pi>Contact Number:-'.$ANumber[$i].'</pi><br/>
<pi>Email:-'.$AEmail[$i].'</pi>
<form action="sample.php" method="post" enctype="multipart/form-data">
<button name="View'.$i.'">View CV</button>
</form>
</div>';
	echo $Applicant;
	$i++;
}
?>
<?php
$View=array();
$p=0;
$Diff="CV";
$sql2="SELECT * FROM $Company_Name";
$res2=mysqli_query($db_Con,$sql2);
while($p<mysqli_num_rows($res2))
{
$View[$p]='View'.$p.'';
if(isset($_POST[$View[$p]]))
{
	$redirect_page='View.php';
	echo "<script>
	window.alert('$ACv[$p]'); 
	</script>";
    $_SESSION['view_cv']=$ACv[$p];
	$_SESSION['cv_name']=$ACvName[$p];
	$_SESSION['diff']=$Diff;
	header('location:'.$redirect_page);
}
$p++;
}
?>
</div>
<button style="
position:fixed;
left:960px;
top:58px;
height:35px;
width:175px;
z-index:1;
background-color:#3498DB;
color:white;
border-radius:5px;
border:0;
cursor:pointer;
" onclick="SearchU()">Click Here To Search Users</button>
<button style="
position:fixed;
left:1150px;
top:58px;
height:35px;
width:175px;
z-index:1;
background-color:#3498DB;
color:white;
border-radius:5px;
border:0;
cursor:pointer;
" onclick="Response()">Click here to see users response</button>
<div id="Search_Box">
<form action="sample.php" method="post">
<input type="name" name="Area_Intrest" placeholder="Area Of Interest"/><button name="User_Search_Profile" onclick="SearchU()">Search</button>
</form>
<?php
//SEARCHING USERS 
if(isset($_POST['User_Search_Profile']))
{
	$m=0;
	$Search_First=array();
	$Search_Last=array();
	$Search_Contact=array();
	$Search_Email=array();
	$Search_Image=array();
	$Search_Cv_Location=array();
	$Search_Cv_Name=array();
	$AreaIntrest=$_POST['Area_Intrest'];
	$_SESSION['Area_In']=$AreaIntrest;
	$query_area="SELECT * FROM register WHERE InterestedField='$AreaIntrest'";
	$res_area=mysqli_query($db_Con,$query_area);
	$row_area=mysqli_fetch_array($res_area);
	$total_area=mysqli_num_rows($res_area);
	$_SESSION['total_a']=$total_area;
	if($total_area!=0)
	{
		while($m<$total_area)
		{
		$query_area1="SELECT * FROM register WHERE InterestedField='$AreaIntrest' ORDER BY ID LIMIT 1 OFFSET $m";
		$res_area1=mysqli_query($db_Con,$query_area1);
		$row_area1=mysqli_fetch_array($res_area1);
		
			$Search_First[$m]=$row_area1['first_name'];
			$Search_Last[$m]=$row_area1['last_name'];
			$Search_Contact[$m]=$row_area1['ContactNumber'];
			$Search_Email[$m]=$row_area1['email'];
			$_SESSION['Search_Ema'.$m.'']=$Search_Email[$m];
			$Search_Image[$m]=$row_area1['Image'];
			$Search_Cv_Location[$m]=$row_area1['CV'];
			$Search_Cv_Name[$m]=$row_area1['CVName'];
			$Search_Display='
				<div id="Search_Box_Result">
		<img src="'.$Search_Image[$m].'" height="110px" width="100px"/><br/><br/>
		<lo><b>'.$Search_First[$m].' '.$Search_Last[$m].'</b></lo><br/>
		Contact Number:'.$Search_Contact[$m].'<br/>
		Email:'.$Search_Email[$m].'<br/>
		Location:Kathmandu,Nepal<br/>
		<form action="sample.php" method="post">
		<button name="Search_CV'.$m.'">View CV</button>
		<div id="po">
			<input type="name" name="JobTit'.$m.'" placeholder="Job To Be Offered"/><br/>
			<input type="name" name="Salar'.$m.'" placeholder="Salary To Be Offered"/><br/>
			<font size="2px">Upload Job Description(PDF Format)</font><br/>
			<input type="file"/><br/>	
			<button name="Offer_Job'.$m.'">Offer Job</button>
		</div>
		</form>
	</div>';
	echo $Search_Display;
			$m++;
		}


	}
	else
	{
		echo "<script>
		window.alert('No Users Found');
		</script>";
	}

}
$b=0;
$User_Offer_Job=array();
$total_ar=@$_SESSION['total_a'];
$Area_Int=@$_SESSION['Area_In'];
while($b<$total_ar)
{
	$Search_Em=$_SESSION['Search_Ema'.$b.''];
	$Search_Cv[$b]='Search_CV'.$b.'';
	if(isset($_POST[$Search_Cv[$b]]))
	{
		$CV_Redirects='View_CV.php';
		$query_area2="SELECT * FROM register WHERE email='$Search_Em'";
		$res_area2=mysqli_query($db_Con,$query_area2);
		$row_area2=mysqli_fetch_array($res_area2);
		$View_C_Location=$row_area2['CV'];
		$View_C_Name=$row_area2['CVName'];
		$_SESSION['CV_LOCATION']=$View_C_Location;
		$_SESSION['CV_NAME']=$View_C_Name;
		header('location:'.$CV_Redirects);
		exit();
	}
	//OFFERING A JOB TO USER
	$User_Offer_Job[$b]='Offer_Job'.$b.'';
	if(isset($_POST[$User_Offer_Job[$b]]))
	{
		$TDate=date('Y/m/d');
		$JobT=$_POST['JobTit'.$b.''];
		$Salar=$_POST['Salar'.$b.''];
		$sql_offer="INSERT INTO job_offer(User_Email,CompanyName,Job_Offered,OfferedSalary,TDate,Response) VALUES('$Search_Em','$Company_Name','$JobT','$Salar','$TDate',NULL)";
		if(mysqli_query($db_Con,$sql_offer))
		{
			echo "<script>
			window.alert('Job Offered');
			</script>";
		}
		else
		{
			echo "<script>
			window.alert('Sorry Job Can't be offered);
			</script>";
		}

	}
	$b++;	
}
?>
</div>
<div id="Response">
<?php
//VIEWING RESPONSE OF THE USERS
$z=0;
$Response_User=array();
$Response_Job=array();
$Response_Salary=array();
$Response_first=array();
$Response_last=array();
$Response_Status=array();
$Response_Image=array();
$Response_Delete=array();
$response_sql="SELECT * FROM job_offer WHERE Response!='NULL' AND CompanyName='$Company_Name'";
$response_res=mysqli_query($db_Con,$response_sql);
$response_total=mysqli_num_rows($response_res);
$response_row=mysqli_fetch_array($response_res);
while($z<$response_total)
{
	$response_sql1="SELECT * FROM job_offer WHERE Response!='NULL' AND CompanyName='$Company_Name' ORDER BY ID DESC LIMIT 1 OFFSET $z";
	$response_res1=mysqli_query($db_Con,$response_sql1);
	$response_row1=mysqli_fetch_array($response_res1);
	$Response_User[$z]=$response_row1['User_Email'];
	$Response_Job[$z]=$response_row1['Job_Offered'];
	$Response_Salary[$z]=$response_row1['OfferedSalary'];
	$Response_Status[$z]=$response_row1['Response'];
	//FETCHING NAME FROM REGISTER TABLE 
	$response_sql2="SELECT * FROM register WHERE email='$Response_User[$z]'";
	$response_sql2=mysqli_query($db_Con,$response_sql2);
	$response_row2=mysqli_fetch_array($response_sql2);
	$Response_first[$z]=$response_row2['first_name'];
	$Response_last[$z]=$response_row2['last_name'];
	$Response_Image[$z]=$response_row2['Image'];
	$displays='
		<div id="Response_box">
			<img src="'.$Response_Image[$z].'" height="120px" width="100px"/>
			<po>'.$Response_first[$z].' '.$Response_last[$z].'</po><br/>
			<div id="Response_Inner_Box">
				'.$Response_Status[$z].'<br/>
				Job:'.$Response_Job[$z].'<br/>
				Salary Offered:'.$Response_Salary[$z].'<br/>
				<form action="sample.php" method="post">
			<button name="Delete'.$z.'">Delete</button>&nbsp;&nbsp;&nbsp;<button name="ResponseView'.$z.'">View CV</button>
			</form>
			</div>
		</div>
	';
	echo $displays;

	//DELETING USERS RESPONSE
	$Response_Delete[$z]='Delete'.$z.'';
	if(isset($_POST[$Response_Delete[$z]]))
	{

		$sql_del="DELETE FROM job_offer WHERE User_Email='$Response_User[$z]'";
		if(mysqli_query($db_Con,$sql_del))
		{
			echo "<script>
			window.alert('User Deleted');
			</script>";
			header("Refresh:0");
		}
		else
		{
			echo "<script>
			window.alert('Deletion Failed');
			</script>";
		}


	}
	$Response_Cv_View[$z]='ResponseView'.$z.'';
	if(isset($_POST[$Response_Cv_View[$z]]))
	{
		$CV_Redirects1='View_CV.php';
		$query_area21="SELECT * FROM register WHERE email='$Response_User[$z]'";
		$res_area21=mysqli_query($db_Con,$query_area21);
		$row_area21=mysqli_fetch_array($res_area21);
		$View_C_Location1=$row_area21['CV'];
		$View_C_Name1=$row_area2['CVName'];
		$_SESSION['CV_LOCATION']=$View_C_Location1;
		$_SESSION['CV_NAME']=$View_C_Name1;
		header('location:'.$CV_Redirects1);
		exit();

	}
	$z++;
}
ob_end_flush();
?>
</div>
<div id="message">
<div id="header">Messgae From CEO</div><br/>
<textarea cols="45" rows="7" placeholder="Write A Message From CEO.."></textarea>
<br/><br/>
<button name="CEO">Post</button>
</div>
<div id="news">
<div id="header">Publish News</div>
<form action="sample.php" method="post" enctype="multipart/form-data">
<input type="name" placeholder="News Title" name="NewsTitle"><br/><br/>
<textarea cols="45" rows="6" name="news" placeholder="Write  A News..." required></textarea><br/><br/>
Upload A PDF<input type="file" name="news_pdf" /><br/>
<button name="PostNews">Publish</button>
</form>
</div>
</div>
</body>
</html>