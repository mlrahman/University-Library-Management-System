<?php include("include/p_header.php"); ?>
<div style="text-align:center;width:750px;background:#8FBC8F;height:750px;">
	</br></br><h1 style="padding: 5px 50px 10px 50px;border-radius:10px;color:white;font-size:30px;margin-top:0px;font-weight:bold;margin-bottom:30px;margin-left:10px;margin-right:12px;background: url(images/bg.jpg) repeat;"> Give a book </h1>
	<?php if(isset($_REQUEST['stepiii'])){
		$user_id=$_REQUEST['user_id'];
		$ss="select * from sys_lib_user where neub_id_no='$user_id'";		
		$re=mysql_query($ss);
		$arr=mysql_fetch_array($re);
		$book_id=$_REQUEST['book_id'];
		$book_det_id=$_REQUEST['book_det_id'];
		$offset=5*60*60; //converting 5 hours to seconds.
		  $dateFormat="d/m/Y";
		  $taken_date=gmdate($dateFormat, time()+$offset);
		  
		$sq="update sys_lib_book_det set
						status='inactive'
						where book_det_id='$book_det_id'";
				mysql_query($sq);
		$sql="INSERT INTO sys_lib_books_taken(admin_id,book_det_id,user_id,taken_date,status,time)
			VALUES
			('$ad_id','$book_det_id','$arr[user_id]','$taken_date','inactive','') ";
		if (!mysql_query($sql,$con))
		{
		  die('Error: ' . mysql_error());
		}
		echo '<p style="margin-left:5px;color:white;font-weight:bold;font-size:20px;margin-bottom:5px;">Registry entry successfull...</p>';	
			
			?>
			<script>
				setTimeout(function(){ window.close(); }, 1000);
			</script>
			<?php
		
	} else { ?>
	<table style="margin-left:130px;margin-top:50px;font-weight:bold;font-size:20px;text-align:left;">
		<form action="u_book_register.php" method="post">
		<?php 
		if(isset($_REQUEST['stepii'])){  ?>
			<input type="hidden" name="user_id" value="<?php echo $_REQUEST['user_registry_id']; ?>">
			<?php
				$ckk="select * from sys_lib_user where neub_id_no='$_REQUEST[user_registry_id]'";
				$rr=mysql_query($ckk);
				$a=mysql_fetch_array($rr);
				$sckk=mysql_num_rows($rr);
				$u_id=$a['user_id'];
				$ch="select * from sys_lib_books_taken where user_id=' $u_id' and status='inactive' ";
				$r=mysql_query($ch);
				$cou=mysql_num_rows($r);
				if($cou>=1)
				{
				?>
					<script>
						alert("This user already crossed the taken limits");
						setTimeout(function(){ window.close();window.open("u_book_register.php", "Give Book to a user", "width=750,height=400");}, 0000);
					
					</script>
				
				<?php 
				
				}
				if($sckk==0)
				{
				?>
					<script>
						alert("Invalid user ID !!!");
						setTimeout(function(){ window.close();window.open("u_book_register.php", "Give Book to a user", "width=750,height=400");}, 0000);
					
					</script>
				<?php } ?>
			<input type="hidden" name="book_id" value="<?php echo $_REQUEST['book_id']; ?>">
			<tr height="50">
				<td valign="top"> Book Code </td>
				<td valign="top">: 
				<select name="book_det_id">
				<option value="">Select book code..</option>
				<?php
					$sq="select * from sys_lib_book_det where book_id='$_REQUEST[book_id]' and status='active'";
					$re=mysql_query($sq);
					while($arr=mysql_fetch_array($re))
					{
						$iii=$arr['book_det_id'];
						$ch="select * from sys_lib_books_taken where book_det_id='$iii' and status='inactive'";
						$rr=mysql_query($ch);
						$cou=mysql_num_rows($rr);
						if($cou==0)
						{
				?>
					<option value="<?php echo $arr['book_det_id']; ?>"><?php echo $arr['book_code']; ?></option>
		<?php
		} }  ?>
		</select>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="stepiii" value="Next" OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="margin-top:0px;margin-left:330px;border:2px solid white;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px 8px 3px 8px;border-radius:5px;margin-bottom:10px;"></td>
		</tr>
		<?php }
		else if(isset($_REQUEST['stepi'])){     
		
		
				$ckk="select * from sys_lib_book_det where book_id='$_REQUEST[registry_book_id]' and status='active'";
				$rr=mysql_query($ckk);
				$count=0;
				while($arr=mysql_fetch_array($rr))
				{
					
					$ch="select * from sys_lib_books_taken where book_det_id=' $arr[book_det_id]' and status='inactive' ";
					$r=mysql_query($ch);
					$co=mysql_num_rows($r);
					if($co==0)
						$count++;
				}	
				if($count==0)
				{
		
		?>
		
		<script>
						alert("This books is not available !!!");
						setTimeout(function(){ window.close();window.open("u_book_register.php", "Give Book to a user", "width=750,height=400");}, 0000);
					
					</script>
				
				<?php 
				
				} ?>
		<script type="text/javascript" src="js/u_book_register.js"></script>
		<tr height="50">
			<td valign="top"> User NEUB ID </td>
			<td valign="top">
				: <input type="text" name="user_registry_id" autocomplete="off" id="id1" onkeyup="autocomplet()" placeholder="    Search for user...." style="width:250px;border-radius:5px;margin-left:0px;" title="Enter user NEUB ID or name." required>
				</br><ul id="u_book_register" style="overflow-x:scroll;position:absolute;background:white;border:1px solid gray;color:black;width:250px;list-style:none;margin-left:14px;border-radius:5px;"></ul>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="stepii" value="Next" OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="margin-top:0px;margin-left:350px;border:2px solid white;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px 8px 3px 8px;border-radius:5px;margin-bottom:10px;"></td>
		</tr>
		
		<input type="hidden" name="book_id" value="<?php echo $_REQUEST['registry_book_id']; ?>">
		<?php  } else { ?>
		<script type="text/javascript" src="js/book_register.js"></script>
		<tr height="50">
			<td valign="top"> Book Name </td>
			<td valign="top">
				: <input type="text" name="registry_book_id" autocomplete="off" id="id2" onkeyup="autocomplet()" placeholder="    Search for book...." style="width:250px;border-radius:5px;margin-left:0px;" title="Enter book name or writer name." required >
				</br><ul id="book_register" style="overflow-x:scroll;position:absolute;background:white;border:1px solid gray;color:black;width:250px;list-style:none;margin-left:14px;border-radius:5px;"></ul>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="stepi" value="Next" OnMouseOut="this.style.background='url(images/bg.jpg) repeat',this.style.color='white'" OnMouseOver="this.style.background='purple',this.style.color='white'" style="margin-top:0px;margin-left:330px;border:2px solid white;background:  url(images/bg.jpg) repeat;color:white;text-align:center;padding:3px 8px 3px 8px;border-radius:5px;margin-bottom:10px;"></td>
		</tr>
		<?php } ?>
		</form>
	</table>
	<?php } ?>
</div>