<?php include("include/u_header.php"); ?>
	<script type="text/javascript" src="js/book.js"></script>
	
	<li><a href="u_index.php">Home</a></li>	
	<li><a href="u_user.php">Users</a></li>
	<li><a href="u_dept.php">Departments</a></li>
	<li  class="current"><a href="u_book.php">Books</a></li>
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
			if(isset($_REQUEST['open_book']))
			{ 
				$s_b="select * from sys_lib_book where book_id='$_REQUEST[book_id]'";
				$s_b_r=mysql_query($s_b);
				$s_b_a=mysql_fetch_array($s_b_r);
				$w_name=$s_b_a['writer']; 
				$name=$s_b_a['book_name'];
			?>
				<button style="border-radius: 40px 40px 0px 0px;margin-top:15px;margin-left:150px;height:60px;width:620px;background:url(images/bg.jpg) repeat;"><h1 style="font-size:30px;font-weight:bold;color:white;" title="Writer Name: <?php echo $w_name; ?>"><?php echo $s_b_a['book_name']; ?></h1></button>
				<div style="width:615px;height:300px;overflow-y:scroll;border: 2px solid black;margin-left:151px;border-radius: 0px 0px 5px 5px;">
					<table style="width:600px;margin: 0auto;">
						<tr style="background: #FFE4E1;">
							<td style="width: 20px;font-weight:bold;text-align:center;font-size:24px;">
								&nbsp
							</td>
							<td style="width: 80px;font-weight:bold;text-align:center;font-size:24px;">
								SL. No.
							</td>
							<td style="width: 250px;font-weight:bold;text-align:center;font-size:24px;">
								Book Code
							</td>
							<td style="width:150px;font-weight:bold;text-align:center;font-size:24px;">
								Status
							</td>
						</tr>
						<tr>
							<td colspan="4">
								
							</td>
						</tr>
						<?php 
						
							$s_b="select * from sys_lib_book_det where book_id='$_REQUEST[book_id]' order by book_det_id asc ";
							$s_b_r=mysql_query($s_b);
							if(mysql_num_rows($s_b_r)<=0)
							{ ?>
							<tr>
								<td colspan="4" style="background:#F0FFFF"> <p style="font-size:30px;color:red;font-weight:bold;margin-left:180px;">No book in stock.</p></td>
							</tr>
							<?php
							}
							$c=0; while($s_b_a=mysql_fetch_array($s_b_r)){ $c++; ?>
						<tr style="background:#F0FFFF" OnMouseOut="this.style.background='#F0FFFF'" OnMouseOver="this.style.background='#87CEFA'">
							<td style="width: 20px;font-weight:bold;text-align:center;font-size:24px;">
								&nbsp
							</td>
							<td style="width: 80px;font-weight:bold;text-align:center;font-size:18px;">
								<?php echo $c; ?>
							</td>
							<td style="width: 250px;font-weight:bold;text-align:center;font-size:18px;" title="Book_Code of <?php echo $name; ?>">
								<?php echo $s_b_a['book_code']; ?>
							</td>
							<td style="width:150px;font-weight:bold;text-align:center;font-size:18px;">
								<?php if($s_b_a['status']=='active'){  ?>
									<img src="images/on.png" height="20" width="20" title="Status: Active." style="margin-left:0px;">
								<?php } else if($s_b_a['status']=='destroy'){ ?>
									<img src="images/destroy.png" height="20" width="20" title="This book was permanently destroyed." style="margin-left:0px;">
								<?php } else { 
								$s_b_a_id=$s_b_a['book_det_id'];
								$s_book="select * from sys_lib_books_taken where book_det_id='$s_b_a_id' and status='inactive' ";
								$s_book_res=mysql_query($s_book);
								$s_book_arr=mysql_fetch_array($s_book_res);
								$s_book_user_id=$s_book_arr['user_id'];
								$s_user="select * from sys_lib_user where user_id='$s_book_user_id'";
								$s_user_res=mysql_query($s_user);
								$neub_id_no=mysql_fetch_array($s_user_res);
								echo '<a href="u_user.php?search=act&neub_id_no='.$neub_id_no['neub_id_no'].'">';
								?>
									<img src="images/off.png" height="20" width="20" title="Taken By: <?php echo $neub_id_no['name']; echo ' | Taken Period: '; echo call_time($s_book_arr['taken_date']);  ?>" style="margin-left:0px;">
									</a>
								<?php }  ?>
							</td>
						</tr>
						<?php } ?>
					</table>
					<table style="margin-left:510px;margin-bottom:20px;">
						<tr>
							<td><a href="u_book.php" style="text-decoration:none;"><p OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="border:2px solid white;width:70px;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px;border-radius:5px;">Refresh</p></a></td>
						<tr>	
					</table>
				</div>
		<?php }
		?>
		<h1 style="text-align:center;font-size:30px;margin-top:25px;font-weight:bold;margin-bottom:20px;"> Books in Stock </h1>
		<?php if($ad_id==1){ ?>
		<p title="Add a new book..." onclick="register()" style="color:purple;font-weight:bold;float:left;background:#FFEBCD;padding: 2px 10px 2px 10px;border:1px solid black;border-radius:10px;margin-right:10px;" onMouseOver="this.style.color='white',this.style.background='#000080'" onMouseOut="this.style.color='purple',this.style.background='#FFEBCD'"> Add Book </p>
		<form action="u_book.php" method="post" title="Sort by department" style="margin-bottom:30px;">
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
			<input type="submit" name="sort" value="Sort" style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;">
			<input type="text" name="book_id" autocomplete="off" id="id" onkeyup="autocomplet()" placeholder="    Search for book...." style="width:250px;border-radius:5px;margin-left:310px;" title="Enter book name or writer name." >
			<input type="submit" name="search" value="Search" title="Click for search book." style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;"/>
			<ul id="book_list_id" style="overflow-x:scroll;position:absolute;background:white;border:1px solid gray;color:black;width:250px;list-style:none;margin-left:624px;border-radius:5px;"></ul>
		</form>
		<?php } else { ?>
		<form action="u_book.php" method="post" title="Sort by department" style="margin-bottom:30px;">
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
			<input type="submit" name="sort" value="Sort" style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;">
			<input type="text" name="book_id" autocomplete="off" id="id" onkeyup="autocomplet()" placeholder="    Search for book...." style="width:250px;border-radius:5px;margin-left:410px;" title="Enter book name or writer name." >
			<input type="submit" name="search" value="Search" title="Click for search book." style="border-radius:5px;width:55px;background:url(images/bg.jpg) repeat;color:white;"/>
			<ul id="book_list_id" style="overflow-x:scroll;position:absolute;background:white;border:1px solid gray;color:black;width:250px;list-style:none;margin-left:624px;border-radius:5px;"></ul>
		</form>
		<?php  } ?>
	<table style="margin-left:0px;color:white;font-weight:bold;font-size:20px;border: 2px solid black;border-radius:10px;background:url(images/bg.jpg) repeat;">
			<tr>
				<td style="width:10px;">
					&nbsp
				</td>
				<td style="width: 70px;text-align:center;"> 
					SL. No.
				</td>
				<td style="width:250px;text-align:center;">
					Book Name
				</td>
				<td style="width:250px;text-align:center;">
					Writer Name
				</td>
				<td style="width:112px;text-align:center;">
					Dept.
				</td>
				<td style="width:122px;text-align:center;">
					Total
				</td>
				<td style="width:100px;text-align:center;">
					Status
				</td>
				<td style="width:20px;">
					&nbsp
				</td>
			<tr>
		</table>
		<div style="height:450px;margin-top:2px;overflow-y:scroll;margin-bottom:20px;border-radius:15px;">
			<table style="margin-left:0px;">
			<?php
				$k=0;
				if(isset($_REQUEST['sort']))
				{
					if($_REQUEST['dept_id']=="")
						$sql="select * from sys_lib_book order by book_name asc" ;
					else
						$sql="select * from sys_lib_book where dept_id='$_REQUEST[dept_id]' order by book_name asc" ;
				}
				else if(isset($_REQUEST['search']))
				{
					$b_i=trim($_REQUEST['book_id']);
					if($b_i=="")
					{
						$sql="select * from sys_lib_book where book_id=-2 " ;
					}
					else
					{
						$s_c="select * from sys_lib_book where book_id LIKE '%$b_i%' ";
						$r_c=mysql_query($s_c);
						$s_c2="select * from sys_lib_book where writer LIKE '%$b_i%' ";
						$r_c2=mysql_query($s_c2);
						$s_c3="select * from sys_lib_book where book_name LIKE '%$b_i%' ";
						$r_c3=mysql_query($s_c3);
						if(mysql_num_rows($r_c)>=1)
						{
							$sql="select * from sys_lib_book where book_id LIKE '%$b_i%' order by book_name asc" ;
						}
						else if(mysql_num_rows($r_c2)>=1)
						{
							$sql="select * from sys_lib_book where writer LIKE '%$b_i%' order by book_name asc" ;
						}
						else if(mysql_num_rows($r_c3)>=1)
						{
							$sql="select * from sys_lib_book where book_name LIKE '%$b_i%' order by book_name asc" ;
						}
						else
						{
							$sql="select * from sys_lib_book where book_id=-2 " ;
						}
					}
				}
				else
				{
					$sql="select * from sys_lib_book order by book_name asc" ;
				}
				
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res))
				{
				$k++;
			?>
				<tr OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" style="background: 	#F5DEB3;" title="Click for view all books of <?php echo $arr['book_name']; ?>">
					
					<td style="width:10px;border-radius: 10px 0px 0px 10px;">
						&nbsp
					</td>
					<td style="width:70px;">
						<p style="font-size:16px;color:black;font-weight:bold;text-align:center;">
							<?php echo $k; ?>
						</p>
					</td>
					<td style="width:250px;">
						<a href="u_book.php?open_book=book&book_id=<?php echo $arr['book_id']; ?>" style="text-decoration:none;" >
							<p title="Book Title." style="text-align:center;font-size:16px;color:black;font-weight:bold;"><?php echo $arr['book_name']; ?></td>
						</a>
					</td>
					<td style="width:220px;">
						<a href="u_book.php?open_book=book&book_id=<?php echo $arr['book_id']; ?>" style="text-decoration:none;" >
							<p title="Writer Name." style="text-align:center;font-size:16px;color:purple;font-weight:bold;"><?php echo $arr['writer']; ?></td>
						</a>
					</td>
					<td style="width:155px;">
						<a href="u_book.php?open_book=book&book_id=<?php echo $arr['book_id']; ?>" style="text-decoration:none;" >
							<p title="Department Name." style="text-align:center;font-size:16px;color:black;font-weight:bold;"><?php 
								$s_d="select * from sys_lib_department where dept_id='$arr[dept_id]' ";
								$r_d=mysql_query($s_d);
								$a_d=mysql_fetch_array($r_d);
								echo $a_d['dept_title'];
							?></p>
						</a>
					</td>
					<td style="width:105px;">
						<a href="u_book.php?open_book=book&book_id=<?php echo $arr['book_id']; ?>" style="text-decoration:none;" >
							<p title="Available Books of <?php echo $arr['book_name']; ?>" style="text-align:center;font-size:16px;color:black;font-weight:bold;"><?php 
								$s_b="select count(book_det_id) from sys_lib_book_det where book_id='$arr[book_id]' ";
								$r_b=mysql_query($s_b);
								$a_b=mysql_fetch_array($r_b);
								echo $a_b['count(book_det_id)'];
							?></p>
						</a>
					</td>
					<td style="width:100px;border-radius: 0px 10px 10px 0px;">
						<a href="u_book.php?open_book=book&book_id=<?php echo $arr['book_id']; ?>" style="text-decoration:none;" >
						<?php if($arr['status']=='active'){  ?>
							<img src="images/on.png" height="20" width="20" title="Status: Active." style="margin-left:40px;">
						<?php } else { ?>
							<img src="images/off.png" height="20" width="20" title="Status: Inactive." style="margin-left:40px;">
						<?php }  ?>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="6">
						
					</td>
				</tr>
			<?php }
				if(mysql_num_rows($res)<=0)
				{
			?>
			<tr OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" style="background: 	#F5DEB3;">
				<td style="width:915px;border-radius:10px;"> <p style="font-size:30px;color:red;font-weight:bold;margin-left:360px;">No book found.</p></td>
			</tr>
			<?php } ?>
			</table>
		</div>	
		
<?php include("include/footer.php"); ?>