<?php
include('Database Connection/connection.php');
session_start();

//REDIRECTING TO VACANCY PAGE
if(isset($_POST['apply']))
{
	header("location:apply.php");
}

//REDIRECTING TO NEWS PAGE
if(isset($_POST['ViewAll']))
{
	if($_SESSION['total']!=0)
	{
	header("Location:News.php");
	}
	else
	{
		$Sorry="There are no news published";
		$ID=$_SESSION['company_id'];
		$Redirect='image.php?id='.$ID.'';
		header("location:".$Redirect);
	}

}


?>



<?php ob_start(); ?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="head-nav.css">

			<style type="text/css">
			    #content
	            {
                    position: absolute;
                    top:100px;
                    bottom:20px;
	            }

				#content #company_info{
					position:absolute;
					height:230px;
					left:270px;
					width:1000px;
					background-color:white;
					position: relative;
					top:-35px;
					padding:15px;
					font-family:"Trebuchet MS", Helvetica, sans-serif;
				}
				#content #company_info #inner
				{
					display:block;
				}
				#content #company_info #vacancy
				{
					display:none;
					position:relative;
					background-color:black;
					padding:20px;
					top:100px;
				}

				#content #company_info #company_info1{
					position:relative;
					top:30px;
					left:200px;
					width:300px;
					height:300px;
					padding:10px;
					font-size:16px;


				}

				#content #company_info #company_logo{
					position:relative;
					top:-300px;
					padding:10px;
					left:0px;
					width:520px;
					height:500px;
				}
				#content #company_info #company_info1 pi
				{
					color:#2E86C1;
					font-size:18px;
				}
				#content #company_info #company_info1 po
				{
					color:#566573;
				}
				#content #company_info button
				{
					position:relative;
					left:200px;
					top:-400px;
					height:40px;
					width:200px;
					background-color:#3498DB;
	                color:white;
	                border-radius:5px;
	                font-family:"Trebuchet MS";
	                cursor:pointer;
	            }
	            #content #main2
	            {
	            	position:absolute;
	            	top:240px;
	            	left:270px;
	            	padding:20px;
	            	background-color:white;
	            	height:340px;
	            	width:990px;
	            	font-family:"Trebuchat MS";
	            }
	            #content #main2 #overview po
	            {
	            	font-family:"Trebuchet MS";
	            	font-size:18px;
	            	color:black;
	            }
	            #content #main2 #overview #inner-overview
	            {
	            	font-family:"Trebuchet MS";
	            	position:relative;
	            	padding:20px;
	            	background-color:#FBFCFC;
	            	color:#7B7D7D;
	            	box-shadow:0px 0px 1px 0px #B3B6B7;
	            	width:250px;
	            	top:0px;
	            	height:270px;
	            }
	            #content #main2 #news
	            {
	            	position:relative;
	            	font-family:"Trebuchet MS";
	            	left:300px;
	            	top:-330px;
	            }
	            #content #main2 #news po
	            {
	            	font-size:18px;
	            	color:black;
	            }
	            #content #main2 #news #inner-news
	            {
	            	position:relative;
	            	padding:20px;
	            	background-color:#FBFCFC;
	            	color:#7B7D7D;  
	            	width:300px;
	            	top:0px;
	            	height:270px;
	            	box-shadow:0px 0px 1px 0px #B3B6B7;
	            }
	            #content #main2 #news #inner-news button
	            {
	            	position:relative;
	            	height:30px;
	            	border:0;
	            	background-color:#FBFCFC;
	            	color:#3498DB;
	            	cursor:pointer;

	            }
	            #content #main2 #news #inner-news po
	            {
	            	font-size:18px;

	            }
	            #content #main2 #Message
	            {
	            	position:relative;
	            	font-family:"Trebuchet MS";
	            	left:655px;
	            	top:-660px;

	            }
	            #content #main2 #Message #Inner-Message
	            {
	            	position:relative;
	            	padding:20px;
	            	height:250px;
	            	width:300px;
	            	background-color:#FBFCFC;
	            	color:#7B7D7D;
	            	box-shadow:0px 0px 1px 0px #B3B6B7;
	            	border-radius:10px;
	          
	            }
	            #content #main2 #Message po
	            {
	            	font-size:18px;

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
<div id="content">
										 
		       <div id="company_info">
		       <div id="inner">
		       			
				<?php
				global $company_name;
					$image_id=@$_GET['id'];
					$query="SELECT * FROM `company_register` WHERE id='$image_id' LIMIT 1";
					$result=mysqli_query($db_Con,$query);
					while($row=mysqli_fetch_array($result)){
						$id=$row['id'];
						$_SESSION['company_id']=$id;
						$company_name=$row['company_name'];
						$sql_rats="SELECT * FROM company_register WHERE company_name='$company_name' LIMIT 1";
						$result10=mysqli_query($db_Con,$sql_rats);
						$row10=mysqli_fetch_array($result10);
						$Rating=$row10['Rating'];
						$Rating=$Rating+1;
						$sql_rat="UPDATE company_register SET Rating='$Rating' WHERE company_name='$company_name'";
						mysqli_query($db_Con,$sql_rat);
						$_SESSION['company_nam']=$company_name;
						$company_address=$row['company_address'];
						$phone_number=$row['phone_number'];
						$fax=$row['fax'];
						$employess=$row['employess'];
						$image=$row['Image'];
						$company_overview=$row['company_overview'];
						if($Rating<10)
						{
							$img_rating="img/Rating/0Stars.jpg";
						}

					else if($Rating>10 && $Rating<20)
					{
					    $img_rating="img/Rating/1Stars.jpg";
					}
					else if($Rating>20 && $Rating<30)
					{
						$img_rating="img/Rating/2Stars.jpg";

					}
					else if($Rating>30 && $Rating<50)
					{
						$img_rating="img/Rating/3Stars.jpg";

					}
					else if($Rating>50 && $Rating<60)
					{
						$img_rating="img/Rating/4Stars.jpg";

					}
					else
					{
						$img_rating="img/Rating/5Stars.jpg";
					}
					$query12="SELECT * FROM news WHERE CompanyName='$company_name'";
					$res12=mysqli_query($db_Con,$query12);
					$total12=mysqli_num_rows($res12);
					$_SESSION['total']=$total12;
					
				?>	

				<div id="company_info1">
					<pi><b><?php echo $company_name; ?></b></pi><br/><br/>
					<po>Address:</po><?php echo $company_address; ?><br/>
					<po>Phone Number:</po><?php echo $phone_number; ?><br/>
					<po>Fax:</po> <?php echo $fax; ?><br/>
					<po>Employess:</po><?php echo $employess; ?><br/>
					<po>Rating:<img src="<?php echo $img_rating;?>" style="position:relative;height:20px;top:5px;left:5px;"></po><br/><br/>
				</div>


				<div id="company_logo">
					<img src="<?php echo $image; ?>" style="width:170px; height:170px;" >

					<?php } ?>
				</div>
			  <form method="post" action="image.php"> 
			  <button name="apply" style="position:relative;left:800px;top:-830px;" onclick="apply()">Apply For A Job</button>
			  </form>
			<br/><br/>

			<form action="organization_sign.php" method="post"> 
			  <button name="sign in" style="position:relative;top:-800px;left:500px;">Sign In</button>
			</form>
		  </div><br/>
		  </div>
		  <div id="main2">
		  <div id="overview">
		  <po><b>Overview</b></po>
		  <div id="inner-overview">
		  This company is meant to provide better jobs for them who are seeking 


		  </div>
		  </div>
		  <div id="news">
		  <po>Recent News</po>
		  <div id="inner-news">
		  <?php echo @$sorry; ?>
		  <?php
		  $g=0;
		  $PDF=array();
		  $PDFName=array();
		  $News_Header=array();
		  $company_news=array();

		  while($g<1)
		  {
		  	$query3="SELECT * FROM news WHERE CompanyName='$company_name' ORDER BY ID DESC LIMIT 1 OFFSET $g";
		  	$ress=mysqli_query($db_Con,$query3);
		  	$row12=mysqli_fetch_array($ress);

		  	$company_news[$g]=$row12['News'];
		  	$News_Header[$g]=$row12['NewsTitle'];
		  	$PDF[$g]=$row12['PDF'];
		  	$PDFName[$g]=$row12['PDF_Name'];
		  	if($PDF[$g]==NULL)
		  	{
		  	$news_header='
		  	<po><b>'.$News_Header[$g].'</b></po><br/><br/>
		  	';
		  	echo $news_header;
		  	echo $company_news[$g];
		  }
		  else
		  {
		  	$news_header='
		  	<po><b>'.$News_Header[$g].'</b></po><br/><br/>
		  	';
		  	echo $news_header;
		  	$prin='<form action="image.php" method="post">
		  	(<button name="View'.$g.'">View Details</button>)
		  	</form>';		  	
		  	echo $company_news[$g];
		  	echo $prin;

		  }
		  $g++;
		  }
		  //Viewing News Details
		$View=array();
		$p=0;
		while($p<1)
		{
			$View[$p]='View'.$p.'';
			if(isset($_POST[$View[$p]]))
				{
			$_SESSION['diff1']='diff1';
				$redirect_page='View.php';
    			$_SESSION['view_new']=$PDF[$p];
				$_SESSION['new_name']=$PDFName[$p];
				header('location:'.$redirect_page);
				}
				$p++;
		}
		ob_end_flush();
	   ?>
		  <form action="Image.php" method="post">
		  <button style="position:absolute;top:270px;left:170px;height:30px;width:150px;border:0;cursor:pointer;background-color:#3498DB;color:white;" name="ViewAll">View All</button>
		  </form>
		  </div>
		  </div>
		  <div id="Message">
		  <po><b>Message From CEO</b></po>
		  <div id="Inner-Message">
		  "We will be happy to welcome you all"<br/><br/>
		  -Ashish Subedi,CEO of Facebook
		  </div>
		  </div>				
		  </div>
		</body>
</html>