<?php include("include/u_header.php"); ?>
	<script type="text/javascript" src="js/user.js"></script>
	
	<li><a href="u_index.php">Home</a></li>	
	<li class="current"><a href="u_user.php">Users</a></li>
	<li><a href="u_dept.php">Departments</a></li>
	<li><a href="u_book.php">Books</a></li>
	<li><a href="u_registry.php">Registry</a></li>
	<?php 
		if($ad_id==1)
		{  ?>
				<li><a href="u_admin.php">Admin List</a></li>
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
		<?php
		if(isset($_REQUEST['search']))
		{
			$neub_id_no=trim($_REQUEST['neub_id_no']);
			$sql_1="select * from sys_lib_user where neub_id_no LIKE '%$neub_id_no%' ";
			$res_1=mysql_query($sql_1);
			$sql_2="select * from sys_lib_user where name LIKE '%$neub_id_no%' ";
			$res_2=mysql_query($sql_2);
			if(mysql_num_rows($res_1)>0)
			{ 
				$arr_2=mysql_fetch_array($res_1);
			?>
				<button style="border-radius: 40px 40px 0px 0px;margin-top:15px;margin-left:150px;height:60px;width:620px;background:url(images/bg.jpg) repeat;">
					<h1 style="font-size:30px;font-weight:bold;color:white;">User Details</h1>
				</button>
				<div OnMouseOut="this.style.background='#F5F5DC'" OnMouseOver="this.style.background='#F0F8FF'" style="background:	#F5F5DC;width:615px;min-height:300px;height:auto;border: 2px solid black;margin-left:151px;border-radius: 0px 0px 5px 5px;">
					<img src="images/user/<?php echo $arr_2['picture']; ?>" height="120" width="100" alt="u_prof" style="margin-left:5px;margin-top:5px;border: 1px solid black;border-radius:0px 0px 5px 0px;float:left;">
					<table style="margin-left:120px;margin-top:30px;margin-bottom:20px;font-size:15px;font-weight:bold;">
						<tr>
							<td style="width: 150px;">
								Name
							</td>
							<td style="width: 300px;">
								: <?php echo $arr_2['name']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Father Name 
							</td>
							<td>
								: <?php echo $arr_2['f_name']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Mother Name 
							</td>
							<td>
								: <?php echo $arr_2['m_name']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Category 
							</td>
							<td>
								: <?php echo $arr_2['category']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Designation 
							</td>
							<td>
								: <?php echo $arr_2['designation']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								NEUB ID 
							</td>
							<td>
								: <font color="purple"><?php echo $arr_2['neub_id_no']; ?></font>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Department
							</td>
							<td>
								: <?php 
									$ss="select * from sys_lib_department where dept_id='$arr_2[dept_id]'";
									$rr=mysql_query($ss);
									$de_a=mysql_fetch_array($rr);
									echo $de_a['dept_title'];
									?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td valign="top">
								Present Address
							</td>
							<td style="text-align:justify;width: 300px;">
								: <font style="font-weight:normal;"><?php echo $arr_2['present_address']; ?></font>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td valign="top">
								Permanent Address 
							</td>
							<td  style="text-align:justify;width: 300px;">
								: <font style="font-weight:normal;"><?php echo $arr_2['permanent_address']; ?></font>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Contact 
							</td>
							<td>
								: <?php echo $arr_2['contact']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Email 
							</td>
							<td>
								: <a href="https://<?php echo $arr_2['email']; ?>" style="text-decoration:none;color:blue;"><?php echo $arr_2['email']; ?></a>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Join History 
							</td>
							<td>
								: <?php echo $arr_2['join_time'].', '.$arr_2['join_date']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
					</table>
					<table style="margin-left:440px;margin-bottom:20px;">
						<tr>
							<td><a href="u_user.php" style="text-decoration:none;"><p OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="border:2px solid white;width:70px;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px;border-radius:5px;">Refresh</p></a></td>
						<tr>	
					</table>
				</div>
			<?php }
			else if(mysql_num_rows($res_2)>0)
			{
				$arr_2=mysql_fetch_array($res_2);
			?>
				<button style="border-radius: 40px 40px 0px 0px;margin-top:15px;margin-left:150px;height:60px;width:620px;background:url(images/bg.jpg) repeat;">
					<h1 style="font-size:30px;font-weight:bold;color:white;">User Details</h1>
				</button>
				<div OnMouseOut="this.style.background='#F5F5DC'" OnMouseOver="this.style.background='#F0F8FF'"  style="background:	#F5F5DC;width:615px;min-height:300px;height:auto;border: 2px solid black;margin-left:151px;border-radius: 0px 0px 5px 5px;">
					<img src="images/user/<?php echo $arr_2['picture']; ?>" height="120" width="100" alt="u_prof" style="border: 1px solid black;border-radius:0px 0px 5px 0px;margin-left:5px;margin-top:5px;float:left;">
					<table style="margin-left:120px;margin-top:30px;margin-bottom:20px;font-size:15px;font-weight:bold;">
						<tr>
							<td style="width: 150px;">
								Name
							</td>
							<td style="width: 300px;">
								: <?php echo $arr_2['name']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Father Name 
							</td>
							<td>
								: <?php echo $arr_2['f_name']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Mother Name 
							</td>
							<td>
								: <?php echo $arr_2['m_name']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Category 
							</td>
							<td>
								: <?php echo $arr_2['category']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Designation 
							</td>
							<td>
								: <?php echo $arr_2['designation']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								NEUB ID 
							</td>
							<td>
								: <font color="purple"><?php echo $arr_2['neub_id_no']; ?></font>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Department
							</td>
							<td>
								: <?php 
									$ss="select * from sys_lib_department where dept_id='$arr_2[dept_id]'";
									$rr=mysql_query($ss);
									$de_a=mysql_fetch_array($rr);
									echo $de_a['dept_title'];
									?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td valign="top">
								Present Address
							</td>
							<td style="text-align:justify;width: 300px;">
								: <font style="font-weight:normal;"><?php echo $arr_2['present_address']; ?></font>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td valign="top">
								Permanent Address 
							</td>
							<td style="text-align:justify;width: 300px;">
								: <font style="font-weight:normal;"><?php echo $arr_2['permanent_address']; ?></font>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Contact 
							</td>
							<td>
								: <?php echo $arr_2['contact']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Email 
							</td>
							<td>
								: <a href="https://<?php echo $arr_2['email']; ?>" style="text-decoration:none;color:blue;"><?php echo $arr_2['email']; ?></a>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
						<tr>
							<td>
								Join History 
							</td>
							<td>
								: <?php echo $arr_2['join_time'].', '.$arr_2['join_date']; ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="height: 0px;">
							</td>
						</tr>
					</table>
					<table style="margin-left:440px;margin-bottom:20px;">
						<tr>
							<td><a href="u_user.php" style="text-decoration:none;"><p OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="border:2px solid white;width:70px;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px;border-radius:5px;">Refresh</p></a></td>
							
						<tr>	
					</table>
				</div>
			<?php
			}
			else
			{
				echo '<p style="color:red;font-size:15px;text-align:center;font-weight:bold;margin-top:15px;">*** No match found ***</p>';
			}
		}
		?>
		<script>
		function register(){
		var myWindow = window.open("u_user_register.php", "Register a new User", "width=750,height=700");
		
	}
	</script>
		<h1 style="text-align:center;font-size:30px;margin-top:25px;font-weight:bold;"> Registered User </h1>
		<p title="Sign Up a new user..." onclick="register()" style="color:purple;font-weight:bold;float:left;background:#FFEBCD;padding: 2px 10px 2px 10px;border:1px solid black;border-radius:10px;" onMouseOver="this.style.color='white',this.style.background='#000080'" onMouseOut="this.style.color='purple',this.style.background='#FFEBCD'"> Register User </p>
		<form action="u_user.php" method="post" style="float:left;margin-left:20px;margin-bottom:30px;">
		     <select name="dept_id" style="width:150px;border-radius:5px;margin-bottom:0px;">
				<?php if(isset($_REQUEST['sort']))
						{ 
					$s_dd="select * from sys_lib_department where dept_id='$_REQUEST[dept_id]'";
					$r_dd=mysql_query($s_dd);
					$a_dd=mysql_fetch_array($r_dd);
					$s_d="select * from sys_lib_department where dept_id!='$_REQUEST[dept_id]' order by dept_title asc ";
					if(mysql_num_rows($r_dd)<=0)
					{
				?>
						<option value="">Select...</option>
				
				<?php } else { ?>
						<option value="<?php echo $a_dd['dept_id']; ?>"><?php echo $a_dd['dept_title']; ?></option>
				<?php } } else { 
					$s_d="select * from sys_lib_department order by dept_title asc ";
				?>
				<option value="">Select...</option>
				<?php }
					
					$r_d=mysql_query($s_d);
					while($a_d=mysql_fetch_array($r_d))
					{
				?>
						<option value="<?php echo $a_d['dept_id']; ?>"><?php echo $a_d['dept_title']; ?></option>
				
				<?php } ?>
			</select>
			<input title="Sort the User List..." type="submit" name="sort" value="Sort" style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;">
			 <input type="text" name="neub_id_no" autocomplete="off" id="id" onkeyup="autocomplet()" placeholder="    Search for user...." style="margin-left:270px;width:250px;border-radius:5px;" title="Enter user NEUB ID No. or Name">
			 <input type="submit" name="search" value="Search" title="Click for search user." style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;"/>
			<ul id="user_list_id" style="margin-left:484px;position:absolute;background:white;border:1px solid gray;border-radius:5px;overflow-x:scroll;color:black;width:250px;list-style:none;margin-right:0px;"></ul>
		</form>
		<table style="margin-left:0px;color:white;font-weight:bold;font-size:20px;border: 2px solid black;border-radius:10px;background:url(images/bg.jpg) repeat;">
			<tr>
				<td style="width:10px">
					&nbsp
				</td>
				<td style="width:120;text-align:center;">
					SL No.
				</td>
				<td style="width: 330px;text-align:center;"> 
					User Name
				</td>
				<td style="width:150px;text-align:center;">
					User ID
				</td>
				<td style="width:235px;text-align:center;">
					Dept.
				</td>
				<td style="width:120px;text-align:center;">
					Status
				</td>
				<td style="width:10px;">
					&nbsp
				</td>
			<tr>
		</table>
		<div style="height:450px;overflow-y:scroll;margin-top:2px;margin-bottom:20px;border-radius:15px;">
			<table style="margin-left:0px;">
			<?php
				if(isset($_REQUEST['sort']))
				{
					if($_REQUEST['dept_id']=="")
						$sql="select * from sys_lib_user order by name asc" ;
					else
						$sql="select * from sys_lib_user where dept_id='$_REQUEST[dept_id]' order by name asc" ;
				}
				else
				{
					$sql="select * from sys_lib_user order by name asc" ;
				}
				$res=mysql_query($sql);
				$k=0;
				while($arr=mysql_fetch_array($res))
				{ $k++;
			?>
				<tr OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" style="background: #F5DEB3;" title="Click for view user.">
					<td style="font-size:16px;font-weight:bold;width:96px;border-radius: 10px 0px 0px 10px;text-align:center;">
						<?php echo $k; ?>
					</td>
					<td>
						<a href="u_user.php?search=act&neub_id_no=<?php echo $arr['neub_id_no']; ?>" style="text-decoration:none;" >
						<img title="User Image." alt="p_logo" src="images/user/<?php echo $arr['picture']; ?>" height="50" width="40" style="border-radius:5px;border: 1px solid black;"/>
						</a>
					</td>
					<td style="width:260px;">
						<a href="u_user.php?search=act&neub_id_no=<?php echo $arr['neub_id_no']; ?>" style="text-decoration:none;"><p title="User Name." style="font-size:16px;color:black;margin-left:10px;font-weight:bold;"><?php echo $arr['name']; ?></td></a>
					</td>
					<td style="width:170px;text-align:center;">
						<a href="u_user.php?search=act&neub_id_no=<?php echo $arr['neub_id_no']; ?>" style="text-decoration:none;" ><p title="NEUB ID No." style="color:purple;font-size:16px;margin-left:0px;"><?php echo $arr['neub_id_no']; ?></p></a>
					</td>
					<td style="width:220px;text-align:center;font-size:16px;font-weight:bold;">
						<a href="u_user.php?search=act&neub_id_no=<?php echo $arr['neub_id_no']; ?>" style="text-decoration:none;" >
						<?php 
							$ss="select * from sys_lib_department where dept_id='$arr[dept_id]'";
							$rr=mysql_query($ss);
							$de_a=mysql_fetch_array($rr);
							echo $de_a['dept_title'];
						?>
						</a>
					</td>
					<td style="width:120px;border-radius: 0px 10px 10px 0px;">
						<a href="u_user.php?search=act&neub_id_no=<?php echo $arr['neub_id_no']; ?>" style="text-decoration:none;" >
						<?php if($arr['status']=='active'){  ?>
							<img src="images/on.png" height="20" width="20" title="Status: Active." style="margin-left:45px;">
						<?php } else { ?>
							<img src="images/off.png" height="20" width="20" title="Status: Inactive." style="margin-left:45px;">
						<?php }  ?>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						
					</td>
				</tr>
			<?php }
				if(mysql_num_rows($res)<=0)
				{
			?>
			<tr OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" style="background: #F5DEB3;">
				<td style="width:915px;border-radius:10px;"> <p style="font-size:30px;color:red;font-weight:bold;margin-left:340px;">No user found.</p></td>
			</tr>
			<?php } ?>
			</table>
		</div>
	</div>
<?php include("include/footer.php"); ?>