<?php
session_start();
	$file=$_SESSION['CV_LOCATION'];
	$filename=$_SESSION['CV_NAME'];
	header('Content-type:application/pdf');
	header('Content-Disposition:inline; filename="'.$filename.'" ');
	header('Content-Transfer-Encoding:binary');
	header('Accept-Ranges:bytes');
	@readfile($file);
?>
