	<?php
	session_start();
	//Viewing CV
	$Diff=@$_SESSION['diff'];
	$Diff1=@$_SESSION['diff1'];
	$Diff2=@$_SESSION['diff2'];
	if($Diff=='CV')
	{
	$file=$_SESSION['view_cv'];
	$filename=$_SESSION['cv_name'];
	header('Content-type:application/pdf');
	header('Content-Disposition:inline; filename="'.$filename.'" ');
	header('Content-Transfer-Encoding:binary');
	header('Accept-Ranges:bytes');
	@readfile($file);
	}
	//Viewing News Details
	if($Diff1=='diff1')
	{
	$file1=$_SESSION['view_new'];
	$filename1=$_SESSION['new_name'];
	header('Content-type:application/pdf');
	header('Content-Disposition:inline; filename="'.$filename1.'" ');
	header('Content-Transfer-Encoding:binary');
	header('Accept-Ranges:bytes');
	@readfile($file1);
	}	

	//VIEWING NEWS DETAILS FROM NEWS PAGE
	if($Diff2='diff2')
	{
	$file2=$_SESSION['view_news'];
	$filename2=$_SESSION['news_name'];
	header('Content-type:application/pdf');
	header('Content-Disposition:inline; filename="'.$filename2.'" ');
	header('Content-Transfer-Encoding:binary');
	header('Accept-Ranges:bytes');
	@readfile($file2);
	}
	?>