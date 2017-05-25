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
  <script>
  function editProf(){
		var myWindow = window.open("u_profile.php", "Edit Profile", "width=400,height=500");
		
	}
	</script>
</head>

<body>
  <div id="main">		

    <header>
	  <div id="strapline">
	    <div id="welcome_slogan">
			<img src="images/logo.png" alt="Logo" height="100" width="80" title="Education with Innovation" style="float:left;margin-left:170px;margin-right:10px;">
			<p style="font-family:Monotype Corsiva;color:white;font-size:70px;float:left;" title="Education with Innovation">NEUB LIBRARY</p>
			
		
		</div><!--close welcome_slogan-->
      </div><!--close strapline-->	  
	  <nav>
	    <div id="menubar" >
          <ul id="nav">