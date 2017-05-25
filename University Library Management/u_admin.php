<?php include("include/u_header.php");
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
				<li class="current"><a href="u_admin.php">Admin List</a></li>
				<li><a href="u_comment.php">Comments</a></li>
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
		<h1 style="text-align:center;font-size:30px;margin-top:25px;font-weight:bold;margin-bottom:5px;"> Admin List </h1>
		<?php if($ad_id==1){ ?>
		<p title="Add a new librarian..." onclick="register()" style="color:purple;font-weight:bold;float:left;background:#FFEBCD;padding: 2px 10px 2px 10px;border:1px solid black;border-radius:10px;" onMouseOver="this.style.color='white',this.style.background='#000080'" onMouseOut="this.style.color='purple',this.style.background='#FFEBCD'"> Add Librarian </p>
	<?php } ?>
	</br></br>
	<table style="margin-left:0px;color:white;font-weight:bold;font-size:20px;border: 2px solid black;border-radius:10px;background:url(images/bg.jpg) repeat;">
			<tr>
				<td style="width: 200px;text-align:center;"> 
					SL. No.
				</td>
				<td style="width:410px;text-align:center;">
					Admin Name
				</td>
				<td style="width:220px;text-align:center;">
					NEUB ID No.
				</td>
				<td style="width:130px;text-align:center;">
					Status
				</td>
				<td style="width:60px;">
					&nbsp
				</td>
			<tr>
		</table>
		<div style="height:450px;margin-top:2px;overflow-y:scroll;margin-bottom:20px;border-radius:15px;">
			<table style="margin-left:0px;">
			<?php
				$k=0;
				$sql="select * from sys_lib_admin where admin_id!=1 order by name asc " ;
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res))
				{
				$k++;
			?>
				<tr style="background: 	#F5DEB3;" OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" title="Click for view admin details.">
					<td style="width:45px;border-radius: 10px 0px 0px 10px;">
					</td>
					<td style="width:90px;">
						<p style="font-size:16px;color:black;font-weight:bold;text-align:center;">
							<?php echo $k; ?>
						</p>
					</td>
					<td style="width:100px;" align="center">
						<img title="Admin Image." alt="a_logo" src="images/admin/<?php echo $arr['picture']; ?>" height="50" width="40" style="border-radius:5px;border: 1px solid black;"/>
					</td>
					<td style="width:442px;">
						<a href="u_admin.php?sort=admin&admin_id=<?php echo $arr['admin_id']; ?>" style="text-decoration:none;" >
						<p title="Admin Name." style="font-size:16px;color:black;margin-left:10px;font-weight:bold;"><?php echo $arr['name']; ?></td>
						</a>
					</td>
					<td style="width:132px;">
						<a href="u_admin.php?sort=admin&admin_id=<?php echo $arr['admin_id']; ?>" style="text-decoration:none;" >
						<p title="Admin NEUB ID No." style="text-align:center;font-size:16px;color:black;margin-left:10px;font-weight:bold;">
						<?php
							echo $arr['neub_id_no'];
						?>
						</p>
						</a>
					</td>
					<td style="width: 200px;border-radius: 0px 10px 10px 0px;">
						<a href="u_admin.php?sort=admin&admin_id=<?php echo $arr['admin_id']; ?>" style="text-decoration:none;" >
						<?php if($arr['status']=='active'){  ?>
							<img src="images/on.png" height="20" width="20" title="Status: Active." style="margin-left:80px;">
						<?php } else { ?>
							<img src="images/off.png" height="20" width="20" title="Status: Inactive." style="margin-left:80px;">
						<?php }  ?>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="4">
						
					</td>
				</tr>
			<?php }
				if(mysql_num_rows($res)<=0)
				{
			?>
			<tr OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" style="background: 	#F5DEB3;">
				<td colspan="5" style="width:915px;border-radius:10px;"> <p style="font-size:30px;color:red;font-weight:bold;margin-left:320px;">No admin found.</p></td>
			</tr>
			<?php } ?>
			</table>
		</div>





	
<?php include("include/footer.php"); }
else
	header("location: u_index.php");

?>