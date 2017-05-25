<?php 
	include("include/connection.php");
	require_once("auth.php");
	$ad_id=$_SESSION['SESS_MEMBER_ID'];
	$ad_sq="select * from sys_lib_admin where admin_id='$ad_id' ";
	$ad_res=mysql_query($ad_sq);
	$ad_arr=mysql_fetch_array($ad_res);

 ?>
<!DOCTYPE html> 
<html>

<head>
  <title>NEUB LIBRARY</title>
  <link rel="shortcut icon" href="images/logo.png" type="image/png">
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  
</head>

<body>
  <div id="main">		