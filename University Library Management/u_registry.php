<?php include("include/u_header.php"); 


?>
	<script type="text/javascript" src="js/user_registry.js"></script>
	
	<li><a href="u_index.php">Home</a></li>	
	<li><a href="u_user.php">Users</a></li>
	<li><a href="u_dept.php">Departments</a></li>
	<li><a href="u_book.php">Books</a></li>
	<li class="current"><a href="u_registry.php">Registry</a></li>
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
				if(isset($_REQUEST['open_registry']))
				{	
					$take_id=$_REQUEST['take_id'];
					$sql="select * from sys_lib_books_taken where take_id='$take_id'";
					$res=mysql_query($sql);
					$arr=mysql_fetch_array($res);
				?>
				<button style="border-radius: 40px 40px 0px 0px;margin-top:15px;margin-left:150px;height:60px;width:620px;background:url(images/bg.jpg) repeat;">
					<h1 style="font-size:30px;font-weight:bold;color:white;">Registry Details</h1>
				</button>
				<div OnMouseOut="this.style.background='#F5F5DC'" OnMouseOver="this.style.background='#F0F8FF'" style="background:	#F5F5DC;width:615px;min-height:300px;height:auto;border: 2px solid black;margin-left:151px;border-radius: 0px 0px 5px 5px;">
					<table style="margin-top:10px;margin-left:50px;font-size:15px;font-weight:bold;">
						<tr>
							<td colspan="3" style="font-size:20px;font-weight:bold;">
								Books Details:
							</td>
						</tr>
						<tr>
							<td colspan="3"> </td>
						</tr>
						<tr>
							<td style="width:20px;">
							
							</td>
							<td>
								Book Code
							</td>
							<td>
								: <font color="purple"> 
								<?php
									$ss="select * from sys_lib_book_det where book_det_id='$arr[book_det_id]'";
									$rr=mysql_query($ss);
									$aa=mysql_fetch_array($rr);
									echo $aa['book_code'];
								?></font>
							</td>
						</tr>
						<tr>
							<td style="width:20px;">
							
							</td>
							<td>
								Book Title
							</td>
							<td>
								: 
								<?php
									$ss="select * from sys_lib_book_det where book_det_id='$arr[book_det_id]'";
									$rr=mysql_query($ss);
									$aa=mysql_fetch_array($rr);
									$ss="select * from sys_lib_book where book_id='$aa[book_id]'";
									$rr=mysql_query($ss);
									$aa=mysql_fetch_array($rr);
									echo $aa['book_name'];
								?>
							</td>
						</tr>
						<tr>
							<td style="width:20px;">
							
							</td>
							<td>
								Book Dept.
							</td>
							<td>
								: 
								<?php
									$ss="select * from sys_lib_book_det where book_det_id='$arr[book_det_id]'";
									$rr=mysql_query($ss);
									$aa=mysql_fetch_array($rr);
									$ss="select * from sys_lib_book where book_id='$aa[book_id]'";
									$rr=mysql_query($ss);
									$aa=mysql_fetch_array($rr);
									$ss="select * from sys_lib_department where dept_id='$aa[dept_id]'";
									$rr=mysql_query($ss);
									$aa=mysql_fetch_array($rr);
									echo $aa['dept_title'];
								?>
							</td>
							
						</tr>
						<tr>
							<td colspan="3"> &nbsp </td>
						</tr>
						<tr>
							<td colspan="3" style="font-size:20px;font-weight:bold;">
								User Details:
							</td>
						</tr>
						
						<tr>
							<td colspan="3"></td>
						</tr>
						<tr>
							<td style="width:20px;">
							
							</td>
							<td style="font-size:20px;font-weight:bold;">
								<?php 
								$ss="select * from sys_lib_user where user_id='$arr[user_id]'";
								$rr=mysql_query($ss);
								$aa=mysql_fetch_array($rr);
								$desig=$aa['designation'];
								?>
								<img title="User Image." alt="p_logo" src="images/user/<?php echo $aa['picture']; ?>" height="70" width="60" style="border-radius:5px;border: 1px solid black;margin-left:1px;"/>
							</td>
							<td valign="top" style="text-align:left;">
								<?php echo 'Name: &nbsp&nbsp&nbsp&nbsp&nbsp ';  echo $aa['name']; echo '</br>'; echo 'NEUB ID: <font color="purple">'; echo $aa['neub_id_no']; echo '</font>'; 
									$ss="select * from sys_lib_department where dept_id='$aa[dept_id]'";
									$rr=mysql_query($ss);
									$aa=mysql_fetch_array($rr);
									echo '</br>Dept.: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp '; echo $aa['dept_title'];
									echo '</br>Category: '; echo $desig;
								?>
							</td>
						</tr>
						<tr>
							<td colspan="3"> &nbsp </td>
						</tr>
						<tr>
							<td colspan="3" style="font-size:20px;font-weight:bold;">
								Time Details:
							</td>
						</tr>
						<tr>
							<td colspan="3"> </td>
						</tr>
						<tr>
							<td></td>
							<td>Taken Time</td>
							<td>: <font color="purple"><?php $tt=call_time($arr['taken_date']); echo $tt; ?></font> </td>
						</tr>
						<?php if($ad_id==1){ ?>
						<tr>
							<td></td>
							<td style="color:blue;">Authorized By</td>
							<td>: <font color="red"><?php 
								$ss="select * from sys_lib_admin where admin_id='$arr[admin_id]'";
								$rr=mysql_query($ss);
								$aa=mysql_fetch_array($rr);
								echo $aa['name'];

							?></font> </td>
						</tr>
						<?php  } ?>
					</table>
					<table style="margin-left:440px;margin-bottom:20px;">
						<tr>
							<td><a href="u_registry.php?update=act&take_id=<?php echo $take_id; ?>" style="text-decoration:none;"><p OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="border:2px solid white;width:70px;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px;border-radius:5px;">Update</p></a></td>
							<td><a href="u_registry.php" style="text-decoration:none;"><p OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="border:2px solid white;width:70px;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px;border-radius:5px;">Refresh</p></a></td>
						<tr>	
					</table>
				</div>
				<?php
				}
		?>
		<script>
		function give_book(){
		var myWindow = window.open("u_book_register.php", "Give Book to a User", "width=750,height=400");
		
	}
		
		function old_book(){
		var myWindow = window.open("u_old_book_register.php", "Updated Registry Details", "width=870,height=750");
		
	}
		</script>
		<h1 style="text-align:center;font-size:30px;margin-top:25px;font-weight:bold;margin-bottom:10px;"> Registry Management </h1>
		<p title="Give a book to a user..." onclick="give_book()" style="margin-right:10px;color:purple;font-weight:bold;float:left;background:#FFEBCD;padding: 2px 10px 2px 10px;border:1px solid black;border-radius:10px;" onMouseOver="this.style.color='white',this.style.background='#000080'" onMouseOut="this.style.color='purple',this.style.background='#FFEBCD'"> Give Book </p>
		<p title="Returned books registry list..." onclick="old_book()" style="margin-right:10px;color:purple;font-weight:bold;float:left;background:#FFEBCD;padding: 2px 10px 2px 10px;border:1px solid black;border-radius:10px;" onMouseOver="this.style.color='white',this.style.background='#000080'" onMouseOut="this.style.color='purple',this.style.background='#FFEBCD'"> Updated List </p>
		<form action="u_registry.php" method="post"  style="margin-bottom:30px;">
			<select name="dept_id" title="Sort by department" style="width:150px;border-radius:5px;margin-bottom:0px;float:left;">
				<?php if(isset($_REQUEST['sort']))
						{ 
					$s_dd="select * from sys_lib_department where dept_id='$_REQUEST[dept_id]'";
					$r_dd=mysql_query($s_dd);
					$a_dd=mysql_fetch_array($r_dd);
					$s_d="select * from sys_lib_department where dept_id!='$_REQUEST[dept_id]' order by dept_title asc ";
					if(mysql_num_rows($r_dd)<=0)
					{
				?>
						<option value="">Select dept...</option>
				
				<?php } else { ?>
						<option value="<?php echo $a_dd['dept_id']; ?>"><?php echo $a_dd['dept_title']; ?></option>
				<?php } } else { 
					$s_d="select * from sys_lib_department order by dept_title asc ";
				?>
				<option value="">Select dept...</option>
				<?php }
					
					$r_d=mysql_query($s_d);
					while($a_d=mysql_fetch_array($r_d))
					{
				?>
						<option value="<?php echo $a_d['dept_id']; ?>"><?php echo $a_d['dept_title']; ?></option>
				
				<?php } ?>
			</select> 
			<select name="book_id" title="Sort by book name" style="width:150px;border-radius:5px;margin-bottom:0px;float:left;margin-left:3px;">
				<?php if(isset($_REQUEST['sort']))
						{ 
					$s_dd="select * from sys_lib_book where book_id='$_REQUEST[book_id]'";
					$r_dd=mysql_query($s_dd);
					$a_dd=mysql_fetch_array($r_dd);
					$s_d="select * from sys_lib_book where book_id!='$_REQUEST[book_id]' order by book_name asc ";
					if(mysql_num_rows($r_dd)<=0)
					{
				?>
						<option value="">Select book...</option>
				
				<?php } else { ?>
						<option value="<?php echo $a_dd['book_id']; ?>"><?php echo $a_dd['book_name']; echo ' &nbsp&nbsp&nbsp WRITER: '; echo $a_dd['writer']; ?></option>
				<?php } } else { 
					$s_d="select * from sys_lib_book order by book_name asc ";
				?>
				<option value="">Select book...</option>
				<?php }
					
					$r_d=mysql_query($s_d);
					while($a_d=mysql_fetch_array($r_d))
					{
				?>
						<option value="<?php echo $a_d['book_id']; ?>"><?php echo $a_d['book_name']; echo ' &nbsp&nbsp&nbsp WRITER: '; echo $a_d['writer']; ?></option>
				
				<?php } ?>
			</select>
			<input type="submit" name="sort" value="Sort" style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;float:left;margin-left:3px;">
			<input type="text" name="user_registry_id" autocomplete="off" id="id" onkeyup="autocomplet()" placeholder="    Search for user...." style="float:left;width:250px;border-radius:5px;margin-left:38px;" title="Enter user NEUB ID or name." >
			<input type="submit" name="search" value="Search" title="Click for search user registry details." style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;"/>
			<ul id="user_registry_list_id" style="overflow-x:scroll;position:absolute;background:white;border:1px solid gray;color:black;width:250px;list-style:none;margin-left:624px;border-radius:5px;"></ul>
		</form>
		<?php
			if(isset($_REQUEST['update']))
			{
				$take_id=$_REQUEST['take_id'];
				$sql="select * from sys_lib_books_taken where take_id='$take_id'";
				$res=mysql_query($sql);
				$arr=mysql_fetch_array($res);
				$sq="update sys_lib_book_det set
						status='active'
						where book_det_id='$arr[book_det_id]'";
				mysql_query($sq);
				$tt=call_time($arr['taken_date']);
				$sq="update sys_lib_books_taken set status='active',time='$tt'
						where take_id='$take_id'";
				mysql_query($sq);
				echo '<p style="margin-left:5px;color:green;font-weight:bold;font-size:20px;margin-bottom:5px;">Registry details updated successfully...</p>';
			}
		?>
		<table style="margin-left:0px;color:white;font-weight:bold;font-size:20px;border: 2px solid black;border-radius:10px;background:url(images/bg.jpg) repeat;">
			<tr>
				<td style="width: 90px;text-align:center;"> 
					SL.No.
				</td>
				<td style="width:230px;text-align:center;">
					Book Name
				</td>
				<td style="width:250px;text-align:center;">
					User Name
				</td>
				<td style="width:122px;text-align:center;">
					NEUB ID
				</td>
				<td style="width:142px;text-align:center;">
					Dept.
				</td>
				<td style="width:65px;text-align:center;">
					Time
				</td>
				<td style="width:20px">
				</td>
			<tr>
		</table>
		<div style="height:450px;margin-top:2px;overflow-y:scroll;margin-bottom:20px;border-radius:15px;">
			<table style="margin-left:0px;">
			<?php
				if(isset($_REQUEST['search']))
				{
					$neub_id_no=trim($_REQUEST['user_registry_id']);
					$sql_1="select * from sys_lib_user where neub_id_no LIKE '%$neub_id_no%' ";
					$res_1=mysql_query($sql_1);
					$sql_2="select * from sys_lib_user where name LIKE '%$neub_id_no%' ";
					$res_2=mysql_query($sql_2);
					if(mysql_num_rows($res_1)>0)
					{ 
						$aa=mysql_fetch_array($res_1);
						$sql="select * from sys_lib_books_taken where status='inactive' and user_id='$aa[user_id]' order by take_id asc";
					}
					else if(mysql_num_rows($res_2)>0)
					{
						$aa=mysql_fetch_array($res_2);
						$sql="select * from sys_lib_books_taken where status='inactive' and user_id='$aa[user_id]' order by take_id asc";
					}
				}
				else if(isset($_REQUEST['sort']))
				{
					if($_REQUEST['dept_id']=="" && $_REQUEST['book_id']=="")
						$sql="select * from sys_lib_books_taken where status='inactive' order by take_id asc";
					else if($_REQUEST['book_id']=="" && $_REQUEST['dept_id']!="")
						$sql="select * from sys_lib_books_taken where status='inactive' and user_id in(select user_id from sys_lib_user where dept_id='$_REQUEST[dept_id]') order by take_id asc";
					else if($_REQUEST['book_id']!="" && $_REQUEST['dept_id']=="")
						$sql="select * from sys_lib_books_taken where status='inactive' and book_det_id in(select book_det_id from sys_lib_book_det where book_id='$_REQUEST[book_id]') order by take_id asc";
					else
						$sql="select * from sys_lib_books_taken where status='inactive' and book_det_id in(select book_det_id from sys_lib_book_det where book_id='$_REQUEST[book_id]') and user_id in(select user_id from sys_lib_user where dept_id='$_REQUEST[dept_id]') order by take_id asc";
				}
				else
					$sql="select * from sys_lib_books_taken where status='inactive' order by take_id asc";
				$res=mysql_query($sql);
				$k=0;
				while($arr=mysql_fetch_array($res))
				{ 
					$k++;
			?>
				<tr OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" style="background: 	#F5DEB3;" title="Click for view this registry details..">
					<td style="width:70px;border-radius: 10px 0px 0px 10px;">
						<p style="font-size:16px;color:black;font-weight:bold;text-align:center;">
							<?php echo $k; ?>
						</p>
					</td>
					<td style="width:260px;">
						<a href="u_registry.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
							<p title="Book Code & Title..." style="text-align:center;font-size:16px;color:black;font-weight:bold;">
							<?php 
								$ss="select * from sys_lib_book_det where book_det_id='$arr[book_det_id]'";
								$rr=mysql_query($ss);
								$aa=mysql_fetch_array($rr);
								echo ' (<font color="purple">'.$aa['book_code'].'</font>) </br>';
								 $ss="select * from sys_lib_book where book_id='$aa[book_id]'";
								$rr=mysql_query($ss);
								$aa=mysql_fetch_array($rr);
								echo $aa['book_name'];
							?>
							
						</a>
					</td>
					
					<td style="width:44px;">
						<a href="u_registry.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
							<?php 
								$ss="select * from sys_lib_user where user_id='$arr[user_id]'";
								$rr=mysql_query($ss);
								$aa=mysql_fetch_array($rr);
								?>
								<img title="User Image." alt="p_logo" src="images/user/<?php echo $aa['picture']; ?>" height="50" width="40" style="border-radius:5px;border: 1px solid black;margin-left:1px;"/>
						</a>
					</td>
					<td style="width:190px;">
						<a href="u_registry.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
						<p title="Taken user name.." style="text-align:center;font-size:16px;color:black;font-weight:bold;">	
							<?php echo $aa['name']; ?>
						</p>
						</a>
					</td>
					
					<td style="width:150px;">
						<a href="u_registry.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
						<p title="Taken user neub ID no.." style="text-align:center;font-size:16px;color:purple;font-weight:bold;">	
							<?php echo $aa['neub_id_no']; ?>
						</p>
						</a>
					</td>
					<td style="width:135px;">
						<a href="u_registry.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
							<?php 
								$ss="select * from sys_lib_user where user_id='$arr[user_id]'";
								$rr=mysql_query($ss);
								$aa=mysql_fetch_array($rr);
								$ss="select * from sys_lib_department where dept_id='$aa[dept_id]'";
								$rr=mysql_query($ss);
								$aa=mysql_fetch_array($rr);
								?>
							<p title="Taken user dept.." style="text-align:center;font-size:11px;color:black;font-weight:bold;">	
								<?php echo $aa['dept_title']; ?>
							</p>		
						
						</a>
					</td>
					<td style="width:60px;border-radius: 0px 10px 10px 0px;">
						<a href="u_registry.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
						<p style="text-align:center;font-size:11px;color:purple;" title="Total taken period...">
						<?php
							$tt= call_time($arr['taken_date']);
							echo $tt;
						?>
						</p>
						</a>
					</td>
				</tr>
			<?php } 
			if(mysql_num_rows($res)<=0)
			{
			?>
			
			<tr style="background: 	#F5DEB3;" OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'">
				<td style="width:915px;border-radius:10px;"> <p style="font-size:30px;color:red;font-weight:bold;margin-left:350px;">No registry found.</p></td>
			</tr>
			
			<?php } ?>
			</table>
		</div>
		
		
		
		
	</div>
<?php include("include/footer.php"); ?>