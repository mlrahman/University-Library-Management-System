<?php include("include/u_header.php");
$page = $_SERVER['PHP_SELF'];
$sec = "3";
if($ad_id==1)
{ ?>
	
	
	<li><a href="u_index.php">Home</a></li>	
	<li><a href="u_user.php">Users</a></li>
	<li><a href="u_dept.php">Departments</a></li>
	<li><a href="u_book.php">Books</a></li>
	<li><a href="u_registry.php">Registry</a></li>
	<?php 
		if($ad_id==1)
		{  ?>
				<li><a href="u_admin.php">Admin List</a></li>
				<li  class="current"><a href="u_comment.php">Comments</a></li>
	<?php	}
	?>
	<li><a href="index.php" class="confirmation">Log Out</a></li>
	<script type="text/javascript">
							var elems = document.getElementsByClassName('confirmation');
							var confirmIt = function (e) {
								if (!confirm('Are you sure you want to log out?')) e.preventDefault();
							};
							for (var i = 0, l = 1; i < l; i++) {
								elems[i].addEventListener('click', confirmIt, false);
							}
						</script>
	</ul>
	<p style="color:white;margin-top:30px;margin-left:10px;font-size:14px;font-family:Monotype Corsiva;" title="Click to edit your profile."><a onclick="editProf()" style="color:white;text-decoration:none;font-weight:normal;"><?php echo $ad_arr['name']; ?></a></li>
           </div><!--close menubar-->	
      </nav>
    </header>

	<div id="site_content">
	
		<?php
			if(isset($_REQUEST['act']))
			{
				$comment_id=$_REQUEST['comment_id'];
				$up="update sys_lib_comment set
					status='active'
					where comment_id='$comment_id'";
				mysql_query($up);
				$s_c="select * from sys_lib_comment where comment_id='$comment_id'";
				$s_r=mysql_query($s_c);
				$s_arr=mysql_fetch_array($s_r);
				$fl=0;
				$ch="select * from sys_lib_user where neub_id_no='$s_arr[neub_id_no]'";
				$re=mysql_query($ch);
				if(mysql_num_rows($re)>=1)
					$fl=1;
				?>
				<button style="border-radius: 40px 40px 0px 0px;margin-top:15px;margin-left:150px;height:60px;width:620px;background:url(images/bg.jpg) repeat;">
					<h1 style="font-size:30px;font-weight:bold;color:white;">Comment Details</h1>
				</button>
				<div OnMouseOut="this.style.background='#F5F5DC'" OnMouseOver="this.style.background='#F0F8FF'" style="background:	#F5F5DC;width:615px;min-height:300px;height:auto;border: 2px solid black;margin-left:151px;border-radius: 0px 0px 5px 5px;">
				<table><tr><td style="width:70px;"> &nbsp </td><td><a href="u_comment.php?delact=suc&comment_id=<?php echo $comment_id; ?>" style="text-decoration:none;"><p OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="margin-top:10px;margin-left:0px;border:2px solid white;width:70px;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px;border-radius:5px;">Delete</p></a></td>
				
							<td><a href="u_comment.php" style="text-decoration:none;"><p OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="margin-top:10px;border:2px solid white;width:70px;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px;border-radius:5px;">Refresh</p></a></td>
						</tr>
				</table>
				<table style="margin-left:70px;margin-bottom:20px;font-weight:bold;font-size:18px;margin-top:10px;">
					<tr>
						<td style="width: 90px;">
							Name
						</td>
						<td style="width: 350px;">
							: <?php echo $s_arr['name']; ?>
						</td>
					</tr>
					<tr>
						<td style="width: 90px;">
							Email
						</td>
						<td style="width: 350px;">
							: <a style="color:blue;" href="http://<?php echo $s_arr['email']; ?>"><?php echo $s_arr['email']; ?></a>
						</td>
					</tr>
					<tr>
						<td style="width: 90px;">
							NEUB ID
						</td>
						<td style="width: 350px;">
							: <?php if($fl==1){ echo '<a title="Click to view this user..." style="color:blue;" href="u_user.php?search=act&neub_id_no='.$s_arr['neub_id_no'].'">'; echo $s_arr['neub_id_no']; echo '</a>'; } else { echo '<font color="purple">';  echo $s_arr['neub_id_no']; echo '</font>'; } ?>
						</td>
					</tr>
					<tr>
						<td style="width: 90px;">
							Time
						</td>
						<td style="width: 350px;">
							: <font color="red"><?php echo $s_arr['time']; echo ', '; echo $s_arr['date']; ?></font>
						</td>
					</tr>
					<tr>
						<td style="width: 90px;" valign="top">
							Comment
						</td>
						<td style="width: 350px;text-align:justify;font-weight:normal;">
							<b>:</b> <?php echo $s_arr['comment']; ?>
						</td>
					</tr>
				</table>
				</div>	
				<?php
			}
		else
				{
		?>
		<meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $page?>'">
		<?php } ?>
		<h1 style="text-align:center;font-size:30px;margin-top:25px;font-weight:bold;margin-bottom:0px;"> User Comments </h1>
		<?php
			$fll=0;
			if(isset($_POST['mark_delete']))
			{
				if(!empty($_POST['check_list']))
				{
					foreach($_POST['check_list'] as $selected)
					{
						$sq="delete from sys_lib_comment where comment_id='$selected' ";
						mysql_query($sq);
						$fll=0;
					}
					echo '<p style="margin-left:5px;color:green;font-weight:bold;font-size:20px;margin-bottom:5px;">All selected comments deleted successfully...</p>';
				}
				else 
					$fll=1;
			}
		
			if(isset($_REQUEST['delact']))
			{
				$sq="delete from sys_lib_comment where comment_id='$_REQUEST[comment_id]'";
				mysql_query($sq);
				echo '<p style="margin-left:5px;color:green;font-weight:bold;font-size:20px;margin-bottom:5px;">Comment deleted successfully...</p>';
			}
			
			if(isset($_REQUEST['delete_all']))
			{
				$s="select * from sys_lib_comment";
				$r=mysql_query($s);
				while($a=mysql_fetch_array($r))
				{
					$sq="delete from sys_lib_comment where comment_id='$a[comment_id]'";
					mysql_query($sq);
				}
				echo '<p style="margin-left:5px;color:green;font-weight:bold;font-size:20px;margin-bottom:5px;">All comments deleted successfully...</p>';
			}
		?>
		<form action="u_comment.php" method="post">
			<input type="submit" OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" name="mark_delete" style="margin-top:0px;margin-left:0px;border:2px solid white;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px 8px 3px 8px;border-radius:5px;margin-bottom:10px;" value="<?php if($fll==0) { ?>Mark Delete<?php } else { ?> Delete Selected <?php } ?>"> 
			<input type="submit" name="delete_all" OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="margin-top:0px;margin-left:0px;border:2px solid white;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px 8px 3px 8px;border-radius:5px;margin-bottom:10px;" value="Delete All">
		
		
	<table style="margin-left:0px;color:white;font-weight:bold;font-size:30px;border: 2px solid black;border-radius:10px;background:url(images/bg.jpg) repeat;">
			<tr>
				<td style="width: 150px;text-align:center;"> 
					SL. No.
				</td>
				<td style="width:260px;text-align:center;">
					Email
				</td>
				<td style="width:300px;text-align:center;">
					Name
				</td>
				<td style="width:220px;text-align:center;">
					NEUB-ID
				</td>
				<td style="width:40px;">
					&nbsp
				</td>
			<tr>
		</table>
		<div style="height:450px;margin-top:2px;overflow-y:scroll;margin-bottom:20px;border-radius:15px;">
			<table style="margin-left:0px;">
			<?php
				$sql="select * from sys_lib_comment where status='inactive' order by comment_id desc ";
				$res1=mysql_query($sql);
				$k=0;
				while($arr=mysql_fetch_array($res1))
				{
					$k++;
			?>
				<tr style="background: 	#F5ABA3;" OnMouseOut="this.style.background='#F5ABA3'" OnMouseOver="this.style.background='#87CEFA'" title="Click for view this comment. [**Unread**]">
					<td style="width:25px;border-radius: 10px 0px 0px 10px;">
					</td>
					<td style="width:100px;">
						<a href="u_comment.php?act=view&comment_id=<?php echo $arr['comment_id']; ?>" style="text-decoration:none;">
						<p style="font-size:17px;color:black;font-weight:bold;text-align:center;">
							<?php echo $k; ?>
						</p>
						</a>
					</td>
					<td style="width:290px;">
						<a href="u_comment.php?act=view&comment_id=<?php echo $arr['comment_id']; ?>"  style="text-decoration:none;">
						<p style="font-size:17px;color:black;font-weight:bold;text-align:center;">
							<?php echo $arr['email']; ?>
						</p>
						</a>
					</td>
					
					<td style="width:290px;">
						<a href="u_comment.php?act=view&comment_id=<?php echo $arr['comment_id']; ?>"  style="text-decoration:none;">
						<p style="font-size:17px;color:black;font-weight:bold;text-align:center;">
							<?php echo $arr['name']; ?>
						</p>
						</a>
					</td>

					<td style="width:190px;">
						<a href="u_comment.php?act=view&comment_id=<?php echo $arr['comment_id']; ?>"  style="text-decoration:none;">
						<p style="font-size:17px;color:black;font-weight:bold;text-align:center;">
							<?php echo $arr['neub_id_no']; ?>
						</p>
						</a>
					</td>
					<td style="width:35px;border-radius: 0px 10px 10px 0px;">
						<?php if($fll==1){ ?><input style="margin-left:4px;" name="check_list[]" type="checkbox" value="<?php echo $arr['comment_id']; ?>"><?php } ?>
					</td>
				</tr>
				
				<tr>
					<td colspan="4">
					</td>
				</tr>
			<?php } ?>
			<?php
				$sql="select * from sys_lib_comment where status='active' order by comment_id desc ";
				$res2=mysql_query($sql);
				$k=0;
				while($arr=mysql_fetch_array($res2))
				{
					$k++;
			?>
				<tr style="background: 	#F5DEB3;" OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" title="Click for view this comment. [**Read**]">
					<td style="width:25px;border-radius: 10px 0px 0px 10px;">
					</td>
					<td style="width:100px;">
						<a href="u_comment.php?act=view&comment_id=<?php echo $arr['comment_id']; ?>" style="text-decoration:none;">
						<p style="font-size:17px;color:black;font-weight:bold;text-align:center;">
							<?php echo $k; ?>
						</p>
						</a>
					</td>
					<td style="width:290px;">
						<a href="u_comment.php?act=view&comment_id=<?php echo $arr['comment_id']; ?>"  style="text-decoration:none;">
						<p style="font-size:17px;color:black;font-weight:bold;text-align:center;">
							<?php echo $arr['email']; ?>
						</p>
						</a>
					</td>
					
					<td style="width:290px;">
						<a href="u_comment.php?act=view&comment_id=<?php echo $arr['comment_id']; ?>"  style="text-decoration:none;">
						<p style="font-size:17px;color:black;font-weight:bold;text-align:center;">
							<?php echo $arr['name']; ?>
						</p>
						</a>
					</td>

					<td style="width:200px;">
						<a href="u_comment.php?act=view&comment_id=<?php echo $arr['comment_id']; ?>"  style="text-decoration:none;">
						<p style="font-size:17px;color:black;font-weight:bold;text-align:center;">
							<?php echo $arr['neub_id_no']; ?>
						</p>
						</a>
					</td>
					<td style="width:25px;border-radius: 0px 10px 10px 0px;">
						<?php if($fll==1){ ?><input style="margin-left:4px;" name="check_list[]" type="checkbox" value="<?php echo $arr['comment_id']; ?>"><?php } ?>
					</td>
				</tr>
				
				<tr>
					<td colspan="4">
					</td>
				</tr>
			<?php }
			if(mysql_num_rows($res2)<=0 && mysql_num_rows($res1)<=0)
				{
			?>
			<tr style="background: 	#F5DEB3;" OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" >
				<td colspan="4" style="width:960px;border-radius:10px;"> <p style="font-size:30px;color:red;font-weight:bold;margin-left:320px;">No comment found.</p></td>
			</tr>
			<?php } ?>
			</table>
			</form>
		</div>
	</div>
		
<?php include("include/footer.php"); }
else
	header("location: u_index.php");
?>