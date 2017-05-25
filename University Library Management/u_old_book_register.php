<?php include("include/p_header.php");
if(isset($_REQUEST['ref']))
	header("location: u_old_book_register.php");

 ?>
 <script type="text/javascript" src="js/user_old_registry.js"></script>
	
<div style="text-align:center;width:870px;background:#8FBC8F;min-height:650px;height:auto;">
	</br>
	<?php
				if(isset($_REQUEST['open_registry']))
				{	
					$take_id=$_REQUEST['take_id'];
					$sql="select * from sys_lib_books_taken where take_id='$take_id'";
					$res=mysql_query($sql);
					$arr=mysql_fetch_array($res);
				?>
				<button style="border-radius: 40px 40px 0px 0px;margin-top:15px;margin-left:10px;height:60px;width:620px;background:url(images/bg.jpg) repeat;">
					<h1 style="font-size:30px;font-weight:bold;color:white;">Registry Details</h1>
				</button>
				<div OnMouseOut="this.style.background='#F5F5DC'" OnMouseOver="this.style.background='#F0F8FF'" style="text-align:left;background:	#F5F5DC;width:615px;min-height:300px;height:auto;border: 2px solid black;margin-left:131px;border-radius: 0px 0px 5px 5px;">
					<table style="margin-top:10px;margin-left:50px;margin-bottom:20px;font-size:15px;font-weight:bold;">
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
							<td><a href="u_old_book_register.php" style="text-decoration:none;"><p OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="border:2px solid white;width:70px;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px;border-radius:5px;">Refresh</p></a></td>
						<tr>	
					</table>
				</div>
				<?php
				}
		?>
		
	</br><h1 style="padding: 5px 50px 10px 50px;border-radius:10px;color:white;font-size:30px;margin-top:0px;font-weight:bold;margin-bottom:30px;margin-left:10px;margin-right:12px;background: url(images/bg.jpg) repeat;">  Updated Registry List </h1>
		<form action="u_old_book_register.php" method="post"  style="margin-bottom:30px;">
			<select name="dept_id" title="Sort by department" style="margin-left:5px;width:150px;border-radius:5px;margin-bottom:0px;float:left;">
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
			<input type="submit" name="ref" value="Refresh" style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;float:left;margin-left:3px;">
			<input type="text" name="user_registry_id" autocomplete="off" id="id" onkeyup="autocomplet()" placeholder="    Search for user...." style="float:left;width:250px;border-radius:5px;margin-left:103px;" title="Enter user NEUB ID or name." >
			<input type="submit" name="search" value="Search" title="Click for search user registry details." style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;"/>
			<ul id="user_old_registry_list_id" style="overflow-x:scroll;position:absolute;background:white;border:1px solid gray;color:black;width:250px;list-style:none;margin-left:529px;border-radius:5px;"></ul>
		</form>
	
	<table style="margin-left:0px;color:black;font-weight:bold;font-size:20px;border: 0px solid black;border-radius:5px;background: #F5DBA6;">
			<tr>
				<td style="width: 50px;text-align:center;"> 
					SN.
				</td>
				<td style="width:210px;text-align:center;">
					Book Name
				</td>
				<td style="width:230px;text-align:center;">
					User Name
				</td>
				<td style="width:122px;text-align:center;">
					NEUB ID
				</td>
				<td style="width:142px;text-align:center;">
					Dept.
				</td>
				<td style="width:83px;text-align:center;">
					Time
				</td>
				<td style="width:0px">
				</td>
			<tr>
		</table>
		<div style="width:850px;height:450px;margin-top:2px;margin-bottom:20px;overflow-y:scroll;margin-bottom:20px;border-radius:15px;">
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
						$sql="select * from sys_lib_books_taken where status='active' and user_id='$aa[user_id]' order by take_id asc";
					}
					else if(mysql_num_rows($res_2)>0)
					{
						$aa=mysql_fetch_array($res_2);
						$sql="select * from sys_lib_books_taken where status='active' and user_id='$aa[user_id]' order by take_id asc";
					}
				}
				else if(isset($_REQUEST['sort']))
				{
					if($_REQUEST['dept_id']=="" && $_REQUEST['book_id']=="")
						$sql="select * from sys_lib_books_taken where status='active' order by take_id asc";
					else if($_REQUEST['book_id']=="" && $_REQUEST['dept_id']!="")
						$sql="select * from sys_lib_books_taken where status='active' and user_id in(select user_id from sys_lib_user where dept_id='$_REQUEST[dept_id]') order by take_id asc";
					else if($_REQUEST['book_id']!="" && $_REQUEST['dept_id']=="")
						$sql="select * from sys_lib_books_taken where status='active' and book_det_id in(select book_det_id from sys_lib_book_det where book_id='$_REQUEST[book_id]') order by take_id asc";
					else
						$sql="select * from sys_lib_books_taken where status='active' and book_det_id in(select book_det_id from sys_lib_book_det where book_id='$_REQUEST[book_id]') and user_id in(select user_id from sys_lib_user where dept_id='$_REQUEST[dept_id]') order by take_id asc";
				}
				else
					$sql="select * from sys_lib_books_taken where status='active' order by take_id asc";
				
				$res=mysql_query($sql);
				$k=0;
				while($arr=mysql_fetch_array($res))
				{ 
					$k++;
			?>
				<tr OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#87CEFA'" style="background:white;" title="Click for view this registry details..">
					<td style="width:70px;border-radius: 10px 0px 0px 10px;">
						<p style="font-size:16px;color:black;font-weight:bold;text-align:center;">
							<?php echo $k; ?>
						</p>
					</td>
					<td style="width:260px;">
						<a href="u_old_book_register.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
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
						<a href="u_old_book_register.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
							<?php 
								$ss="select * from sys_lib_user where user_id='$arr[user_id]'";
								$rr=mysql_query($ss);
								$aa=mysql_fetch_array($rr);
								?>
								<img title="User Image." alt="p_logo" src="images/user/<?php echo $aa['picture']; ?>" height="50" width="40" style="border-radius:5px;border: 1px solid black;margin-left:1px;"/>
						</a>
					</td>
					<td style="width:180px;">
						<a href="u_old_book_register.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
						<p title="Taken user name.." style="text-align:center;font-size:16px;color:black;font-weight:bold;">	
							<?php echo $aa['name']; ?>
						</p>
						</a>
					</td>
					
					<td style="width:150px;">
						<a href="u_old_book_register.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
						<p title="Taken user neub ID no.." style="text-align:center;font-size:16px;color:purple;font-weight:bold;">	
							<?php echo $aa['neub_id_no']; ?>
						</p>
						</a>
					</td>
					<td style="width:125px;">
						<a href="u_old_book_register.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
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
						<a href="u_old_book_registry.php?open_registry=book&take_id=<?php echo $arr['take_id']; ?>" style="text-decoration:none;" >
						<p style="text-align:center;font-size:11px;color:purple;" title="Total taken period...">
						<?php
							echo $arr['time'];
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
				<td style="width:915px;border-radius:10px;"> <p style="font-size:30px;color:red;font-weight:bold;margin-left:50px;">No registry found.</p></td>
			</tr>
			
			<?php } ?>
			</table>
		</div>
		
		</br>
</div>