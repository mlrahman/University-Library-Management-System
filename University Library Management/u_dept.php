<?php include("include/u_header.php"); ?>
	
	
	<li><a href="u_index.php">Home</a></li>	
	<li><a href="u_user.php">Users</a></li>
	<li class="current"><a href="u_dept.php">Departments</a></li>
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
		<h1 style="text-align:center;font-size:30px;margin-top:25px;font-weight:bold;margin-bottom:5px;"> Departments in NEUB </h1>
		<?php if($ad_id==1){ ?>
		<p title="Add a new department..." onclick="register()" style="color:purple;font-weight:bold;float:left;background:#FFEBCD;padding: 2px 10px 2px 10px;border:1px solid black;border-radius:10px;" onMouseOver="this.style.color='white',this.style.background='#000080'" onMouseOut="this.style.color='purple',this.style.background='#FFEBCD'"> Add Dept. </p>
	<?php } ?>
	</br></br>
	<table style="margin-top:5px;margin-left:0px;color:white;font-weight:bold;font-size:20px;border: 2px solid black;border-radius:10px;background:url(images/bg.jpg) repeat;">
			<tr>
				<td style="width: 200px;text-align:center;"> 
					SL. No.
				</td>
				<td style="width:420px;text-align:center;">
					Dept. Title
				</td>
				<td style="width:220px;text-align:center;">
					Total Books
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
				$sql="select * from sys_lib_department order by dept_title asc" ;
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res))
				{
				$k++;
			?>
				<tr style="background: 	#F5DEB3;" OnMouseOut="this.style.background='#F5DEB3'" OnMouseOver="this.style.background='#87CEFA'" title="Click for view all books under this dept.">
					<td style="width:45px;border-radius: 10px 0px 0px 10px;">
					</td>
					<td style="width:90px;">
						<p style="font-size:16px;color:black;font-weight:bold;text-align:center;">
							<?php echo $k; ?>
						</p>
					</td>
					<td style="width:452px;">
						<a href="u_book.php?sort=dept&dept_id=<?php echo $arr['dept_id']; ?>" style="text-decoration:none;" >
						<p title="Department Title." style="text-align:center;font-size:16px;color:black;margin-left:10px;font-weight:bold;"><?php echo $arr['dept_title']; ?></td>
						</a>
					</td>
					<td style="width:132px;">
						<a href="u_book.php?sort=dept&dept_id=<?php echo $arr['dept_id']; ?>" style="text-decoration:none;" >
						<p title="Total distinct Books under this department." style="text-align:center;font-size:16px;color:black;margin-left:10px;font-weight:bold;">
						<?php
							$s_b="select count(book_id) from sys_lib_book where dept_id='$arr[dept_id]'";
							$r_b=mysql_query($s_b);
							$a_b=mysql_fetch_array($r_b);
							echo $a_b['count(book_id)'];
						?>
						</p>
						</a>
					</td>
					<td style="width: 190px;border-radius: 0px 10px 10px 0px;">
						<a href="u_book.php?sort=dept&dept_id=<?php echo $arr['dept_id']; ?>" style="text-decoration:none;" >
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
				<td colspan="5" style="width:915px;border-radius:10px;"> <p style="font-size:30px;color:red;font-weight:bold;margin-left:320px;">No department found.</p></td>
			</tr>
			<?php } ?>
			</table>
		</div>

<?php include("include/footer.php"); ?>