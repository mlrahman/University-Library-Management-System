<?php include("include/p_header.php"); ?>
	
	<p style="font-size:30px;"> Edit Your Profile </p>
	
	<?php 
	
	if(isset($_REQUEST['sub']))
	{
		$username=trim($_REQUEST['username']);
		$old_password=sha1(trim($_REQUEST['o_pass']));
		$flag=0;
		if(trim($_REQUEST['n_pass'])=="")
			$flag=1;
		$new_password=sha1(trim($_REQUEST['n_pass']));
		if($ad_arr['password']==$old_password && $flag==0)
		{
			$sql="update sys_lib_admin set
					username='$username',
					password='$new_password'
					where admin_id='$ad_id' ";
			mysql_query($sql);
			$msg='<font color="green"><b> Profile successfully updated. </b></font>';
			echo $msg.'</br></br>';
			header("Refresh: 1; url=u_close.php");
		}
		else if($ad_arr['password']==$old_password)
		{
			$sql="update sys_lib_admin set
					username='$username'
					where admin_id='$ad_id' ";
			mysql_query($sql);
			$msg='<font color="green"><b> Profile successfully updated. </b></font>';
			echo $msg.'</br></br>';
			header("Refresh: 1; url=u_close.php");
		}
		else
		{
			$msg='<font color="red"><b> Password doesn\'t match. </b></font>';
			echo $msg;
		}
		$ad_id=$_SESSION['SESS_MEMBER_ID'];
		$ad_sq="select * from sys_lib_admin where admin_id='$ad_id' ";
		$ad_res=mysql_query($ad_sq);
		$ad_arr=mysql_fetch_array($ad_res);
	}
	if(isset($_REQUEST['sub_ad']))
	{
		$username=trim($_REQUEST['username']);
		$name=trim($_REQUEST['name']);
		$contact=trim($_REQUEST['contact']);
		$email=trim($_REQUEST['email']);
		$neub_id_no=trim($_REQUEST['neub_id_no']);
		$old_password=sha1(trim($_REQUEST['o_pass']));
		$flag=0;
		if(trim($_REQUEST['n_pass'])=="")
			$flag=1;
		$new_password=sha1(trim($_REQUEST['n_pass']));
		if($ad_arr['password']==$old_password && $flag==0)
		{
			$sql="update sys_lib_admin set
					username='$username',
					contact='$contact',
					email='$email',
					neub_id_no='$neub_id_no',
					name='$name',
					password='$new_password'
					where admin_id='$ad_id' ";
			mysql_query($sql);
			$msg='<font color="green"><b> Profile successfully updated. </b></font>';
			echo $msg.'</br></br>';
			header("Refresh: 1; url=u_close.php");
		}
		else if($ad_arr['password']==$old_password)
		{
			$sql="update sys_lib_admin set
					username='$username',
					contact='$contact',
					email='$email',
					neub_id_no='$neub_id_no',
					name='$name'
					where admin_id='$ad_id' ";
			mysql_query($sql);
			$msg='<font color="green"><b> Profile successfully updated. </b></font>';
			echo $msg.'</br></br>';
			header("Refresh: 1; url=u_close.php");
		}
		else
		{
			$msg='<font color="red"><b> Password doesn\'t match. </b></font>';
			echo $msg;
		}
		$ad_id=$_SESSION['SESS_MEMBER_ID'];
		$ad_sq="select * from sys_lib_admin where admin_id='$ad_id' ";
		$ad_res=mysql_query($ad_sq);
		$ad_arr=mysql_fetch_array($ad_res);
	}
	if($ad_id==1){ ?>
	
		<form action="u_profile.php" method="post">
	<table style="margin-left:20px;">
		<tr>
			<td colspan="2">
				<img src="images/user/<?php echo $ad_arr['picture']; ?>" height="120" width="100" style="border-radius:5px;border:2px solid black;">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				Name: 
			</td>
			<td>
				<input type="text" name="name" style="border-radius:5px;" value="<?php echo $ad_arr['name'];?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				NEUB ID: 
			</td>
			<td>
				<input type="text" name="neub_id_no" style="border-radius:5px;" value="<?php echo $ad_arr['neub_id_no'];?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				Email: 
			</td>
			<td>
				<input type="text" name="email" style="border-radius:5px;" value="<?php echo $ad_arr['email'];?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				Contact: 
			</td>
			<td>
				<input type="text" name="contact" style="border-radius:5px;" value="<?php echo $ad_arr['contact'];?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				Username: 
			</td>
			<td>
				<input type="text" name="username" style="border-radius:5px;" value="<?php echo $ad_arr['username'];?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				Current Password: 
			</td>
			<td>
				<input type="password" name="o_pass" style="border-radius:5px;" placeholder=" ********** " required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				New Password: 
			</td>
			<td>
				<input type="password" name="n_pass" placeholder=" ********** " style="border-radius:5px;" title="Enter new password for change your password">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				&nbsp&nbsp 
			</td>
			<td style="text-align:right;">
				<input type="submit" name="sub_ad" value="Edit" style="border-radius:5px;width:70px;background:url(images/bg.jpg) repeat;;color:white;" title="Click for update your profile">
			</td>
		</tr>
	
	<table>
	
	
	
	<?php } else { ?>
	<form action="u_profile.php" method="post">
	<table style="margin-left:20px;">
		<tr>
			<td colspan="2">
				<img src="images/user/<?php echo $ad_arr['picture']; ?>"  height="120" width="100" style="border-radius:5px;border:2px solid black;">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				Username: 
			</td>
			<td>
				<input type="text" name="username" style="border-radius:5px;" value="<?php echo $ad_arr['username'];?>" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				Current Password: 
			</td>
			<td>
				<input type="password" name="o_pass" style="border-radius:5px;" placeholder=" ********** " required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				New Password: 
			</td>
			<td>
				<input type="password" name="n_pass" style="border-radius:5px;" placeholder=" ********** " title="Enter new password for change your password">
			</td>
		</tr>
		<tr>
			<td colspan="2">
				&nbsp&nbsp
			</td>
		</tr>
		<tr>
			<td>
				&nbsp&nbsp 
			</td>
			<td style="text-align:right;">
				<input type="submit" name="sub" value="Edit" style="border-radius:5px;width:70px;background:url(images/bg.jpg) repeat;;color:white;" title="Click for update your profile">
			</td>
		</tr>
	
	<table>
	<?php } ?>










	
