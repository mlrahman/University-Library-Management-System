<?php include("include/p_header.php"); ?>

<?php if(isset($_REQUEST['add_user']))
		{
			$name=trim($_REQUEST['name']);
			$f_name=trim($_REQUEST['f_name']);
			$m_name=trim($_REQUEST['m_name']);
			$neub_id_no=trim($_REQUEST['neub_id_no']);
			$dept_id=trim($_REQUEST['dept_id']);
			$category=trim($_REQUEST['category']);
			$designation=trim($_REQUEST['designation']);
			$contact=trim($_REQUEST['contact']);
			$email=trim($_REQUEST['email']);
			$pre_add=trim($_REQUEST['present_address']);
			$per_add=trim($_REQUEST['permanent_address']);
			
						function photo_upload($file,$i,$max_foto_size,$photo_extention,$folder_name,$path='')
						{


								if($file['tmp_name'][$i]=="")
								{
										
										
										return "Uploading error in image";
								}
								if($file['tmp_name'][$i]!="")
								{
										$p=$file['name'][$i];
										$pos=strrpos($p,".");
										$ph=strtolower(substr($p,$pos+1,strlen($p)-$pos));
										$im_size =  round($file['size'][$i]/1024,2);

										if($im_size > $max_foto_size)
										   {
												echo "Image is Too Large";
												return;
										   }
										$photo_extention = explode(",",$photo_extention);
										if(!in_array($ph,$photo_extention ))
										   {
												echo "Upload Correct Image";

												return;
										   }
								}
										$ran=date(time());
										$c=$ran.rand(1,10000);
										$ran.=$c.".".$ph;



										if(isset($file['tmp_name'][$i]) && is_uploaded_file($file['tmp_name'][$i]))
										{
										$ff = $path."images/".$folder_name."/".$ran;
										move_uploaded_file($file['tmp_name'][$i], $ff );
										chmod($ff, 0777);
										}
							   return  $ran;
						}
								$file=$_FILES['photo'];
								$image_name=photo_upload($file,0,100000,"jpg,gif,png",'user',$path='');

			
			$date=date("d");
			$month=date("m");
			$year=date("y");
			
			
			$join_date=$date.'/'.$month.'/'.$year;
			$join_time=date("H:m");
			
			
			
			$sql="insert into sys_lib_user(picture ,name, f_name, m_name, neub_id_no, dept_id, category, designation, contact, email, present_address, permanent_address, join_date, join_time, status)
					values
					('$image_name' ,'$name', '$f_name', '$m_name', '$neub_id_no', '$dept_id', '$category', '$designation', '$contact', '$email', '$pre_add', '$per_add', '$join_date', '$join_time', 'active')";
			
			mysql_query($sql);
			
			?>
			<script>
				alert("User successfully registered.");
				setTimeout(function(){ window.close(); }, 1500);
			</script>
			
			<?php
		}
?>
<div style="text-align:center;width:750px;background:#8FBC8F;height:750px;">
	</br></br><h1 style="padding: 5px 50px 10px 50px;border-radius:10px;color:white;font-size:30px;margin-top:0px;font-weight:bold;margin-bottom:30px;margin-left:10px;margin-right:12px;background: url(images/bg.jpg) repeat;"> Register User </h1>
	<form action="u_user_register.php" method="post" ENCTYPE="MULTIPART/FORM-DATA">
	<img src="" height="120" width="100" alt="User Image Preview ..."  style="border-radius:10px;background:#FFFACD;border:1px solid black;">				
	<table style="margin-left:70px;margin-top:20px;font-weight:bold;font-size:20px;text-align:left;">
		<tr>
			<td> Upload Image </td>
			<td>
				: <input type="file" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" name='photo[0]' title="User Image .. [Passport Size]" onchange="previewFile()" required/><br>
			</td>
		</tr>
		<tr>
			<td> Name </td>
			<td>
				: <input type="text" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" name='name' style="width:200px;border-radius:5px;" placeholder="  Mr. Abcd Efgh" title="User Name .." required/><br>
			</td>
		</tr>
		<tr>
			<td> Father Name </td>
			<td>
				: <input type="text" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" name='f_name' style="width:200px;border-radius:5px;" placeholder="  Mr. Abcd Efgh" title="User Father Name .." required/><br>
			</td>
		</tr>
		<tr>
			<td> Mother Name </td>
			<td>
				: <input type="text" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" name='m_name' style="width:200px;border-radius:5px;" placeholder="  Ms. Abcd Efgh" title="User Mother Name .." required/><br>
			</td>
		</tr>
		<tr>
			<td> NEUB ID </td>
			<td>
				: <input type="text" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" name='neub_id_no' style="width:200px;border-radius:5px;" placeholder="  123456789101" title="User NEUB ID number .." required/><br>
			</td>
		</tr>
		<tr>
			<td> Department </td>
			<td>
				: <select name="dept_id" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" title="Registration Category" style="width:100px;border-radius:5px;">
						<option value="">Select..</option>
						<?php 
							$sq="select * from sys_lib_department order by dept_title asc ";
							$re=mysql_query($sq);
							while($arr=mysql_fetch_array($re))
							{ ?>
								<option value="<?php echo $arr['dept_id']; ?>"><?php echo $arr['dept_title']; ?></option>
						<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td> Category </td>
			<td>
				: <select name="category" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" title="Registration Category" style="width:100px;border-radius:5px;">
						<option value="">Select..</option>
						<option value="Under Graduate Student">Under Graduate Student</option>
						<option value="Graduate Student">Graduate Student</option>
						<option value="Full Time Faculty">Full Time Faculty</option>
						<option value="Part Time Faculty">Part Time Faculty</option>
						<option value="BOT Member">BOT Member</option>
						<option value="Officer">Officer</option>
						<option value="Others">Others</option>
					</select>
			</td>
		</tr>
		<tr>
			<td> Designation </td>
			<td>
				: <input type="text" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" name='designation' style="width:200px;border-radius:5px;" placeholder="  CEO in example" title="User Designation .." required/><br>
			</td>
		</tr>
		<tr>
			<td> Contact </td>
			<td>
				: <input type="text" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" name='contact' style="width:200px;border-radius:5px;" placeholder="  01xxxxxxxxx" title="User contact number .." required/><br>
			</td>
		</tr>
		<tr>
			<td> Email </td>
			<td>
				: <input type="text" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white';validateEmail(this);" name='email' style="width:200px;border-radius:5px;" placeholder="  example@abcd.com" title="User email address .."/><br>
			</td>
		</tr> 
		<tr>
			<td valign="top"> Present Address
			</td>
			<td valign="top">&nbsp <textarea name="present_address" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" style="height:40px;width:200px;border-radius:5px;"></textarea>
			</td>
		</tr>
		<tr>
			<td valign="top"> Permanent Address
			</td>
			<td valign="top">&nbsp <textarea name="permanent_address" OnMouseOut="this.style.background='white'" OnMouseOver="this.style.background='#E6E6FA'" onfocus="this.style.background = '#FFEFD5'" onblur="this.style.background = 'white'" style="height:40px;width:200px;border-radius:5px;"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="add_user" value="Register" style="border-radius:5px; background: url(images/bg.jpg) repeat;color:white;padding:5px;margin-top:30px;margin-left:400px;" ></td>
		</tr>
	</table>
	</form>
	<script>
	function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

	}
	function previewFile(){
       var preview = document.querySelector('img'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "";
       }
	}
	</script>
	
</div>

