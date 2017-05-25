<?php 
	include("include/header.php");
	session_start();
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);

 ?>
	</br>
<script>
	function myFunction() {
		document.getElementById("demo").innerHTML = '<form action="index.php" method="post" style="margin-left:50px;"><table><tr><td>Name: </td><td><input type="text" name="name" placeholder=" Your fullname" style="border-radius:5px;width:150px;" autocomplete="off" required/></td><td> &nbsp </td></tr><tr><td>NEUB ID: </td><td><input type="text" name="n_id" placeholder=" Your NEUB id no." style="border-radius:5px;width:150px;" autocomplete="off" required/></td><td &nbsp </td></tr><tr><td>Email: </td><td><input type="text" name="email" placeholder=" Your email address" autocomplete="off" style="border-radius:5px;width:150px;" required/></td><td> &nbsp </td></tr><tr><td valign="top">Comment: &nbsp&nbsp </td><td> <textarea name="comment" title="Write your comment." style="height:50px;width:200px;border-radius:5px;">Post Your Comment...</textarea></td><td valign="bottom"> &nbsp&nbsp <input type="submit" name="submit" value="Submit" title="Click to post a comment." style="width:60px;border-radius:5px;background:url(images/bg.jpg) repeat;;color:white;" /></td></tr></form></br>';
	}  
	function myFunctionbook()
	{
		var myWindow = window.open("book.php", "_blank" );
		myWindow.focus();
	}
	function myFunctionregistry()
	{
		var myWindow = window.open("registry.php", "_blank" );
		myWindow.focus();
	}
</script>
<form action="login_exec.php" method="post">
<?php
	//Start session
	
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<li style="margin-left:310px;">'.$msg;
	}
		echo '</li>';
		echo '<li><input type="text" name="username" placeholder="   Username" style="border-radius:5px;width:120px;" title="Enter your username." required/></li>';
		unset($_SESSION['ERRMSG_ARR']);
	}
	else
	{
?>

	<li style="margin-left:600px;"><input type="text" name="username" placeholder="   Username" style="border-radius:5px;width:120px;" title="Enter your username." required/></li>
<?php } ?>
	<li><input type="password" name="password" placeholder="   Password" style="border-radius:5px;width:120px;" title="Enter your password."required/></li>
	<li><input type="submit" name="login" value="Log In" style="border-radius:5px;width:50px;background:url(images/bg.jpg) repeat;;color:white;" title="Click for login.">	
	
</form>			
	</ul>
        </div><!--close menubar-->	
      </nav>
    </header>
<?php 
	//<li class="current"><a href="index.php">Home</a></li>
	//<li><a href="#">Contact Us</a></li>
	include("include/slide_show.php"); 
?>	
	  
	     
<p style="text-align:justify;font-size:12px;"> NEUB Library started its operation during the establishment of North East University Bangladesh (NEUB) in the year 2012. The mission of NEUB Library is to provide innovative and quality Library services for the students, faculty members, researchers and staffs. Presently NEUB Library has a wide collection of Books, Magazines, Journals, CD and DVDs. In addition the numbers of Library Resources are increasing rapidly. NEUB Library is located at 3rd floor, Academic Building of North East University Bangladesh. The total floor space of NEUB Library is 2000 sq.ft. Authority has further plan to extend the floor capacity of the library. NEUB Library provides special user services for external users under some circumstances. Currently 150 to 200 users visit NEUB Library everyday including researchers and faculty members. The numbers of library user are increasing gradually. NEUB Library is open seven days a week. Library users are taking this advantage effectively. Currently NEUB Library is providing Reference Service, Lending service and Reprography services for its users. In addition Internet facility, Magazines and Newspapers are also available for the readers.
</br>For details please contact:
</br>
</br>
Arup Ratan Apu</br>
Assistant Librarian</br>
Tel: 88-0821-710220-2 Ext. 104</br>
Fax: 880-0821710223</br>
Email: neublibrary@gmail.com</br>
Web: <a href="http://www.neub.edu.bd">www.neub.edu.bd</a> </p>
 <?php 
 if(isset($_REQUEST['submit']))
 {  
	$offset=6*60*60; //converting 5 hours to seconds.
	$dateFormat="h:i a";
	$post_time=gmdate($dateFormat, time()+$offset);
	$offset=6*60*60; //converting 5 hours to seconds.
	$dateFormat="d M Y";
	$post_date=gmdate($dateFormat, time()+$offset);
	$name=trim($_REQUEST['name']); 
	$email=trim($_REQUEST['email']); 
	$neub_id_no=trim($_REQUEST['n_id']); 
	$comment=nl2br($_REQUEST['comment']);
	$comment=trim($comment);
	if($comment=="")
	{
		$msg='<font color="red"><b> Invalid comment!!! </b></font>';
		echo $msg;
	}
	else
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		{
			$qry="select * from sys_lib_comment where comment='$comment' and neub_id_no='$neub_id_no' and email='$email' ";
			$result=mysql_query($qry);
			if(mysql_num_rows($result) > 0)
			{
				$msg='<font color="red"><b> Comment already submitted!!! </b></font>';
				echo $msg;
			}
			else
			{
				$sql="INSERT INTO sys_lib_comment (name, time, date, neub_id_no, email, comment, status)
				VALUES
				('$name','$post_time','$post_date','$neub_id_no','$email','$comment','inactive')";
				if (!mysql_query($sql,$con))
				{
				  die('Error: ' . mysql_error());
				}
				$msg='<font color="green"><b> Comment succesfully submitted </b></font>';
				echo $msg;
			}
		
		}
		else
		{
			$msg='<font color="red"><b> Invalid email!!! </b></font>';
			echo $msg;
		}
	}
 } 
 ?>	 
<button type="button" onclick="myFunction()" style="border-radius:5px;width:90px;background:url(images/bg.jpg) repeat;color:white;" title="Click to post your comment"> Comment </button>
<button type="button" onclick="myFunctionbook()" style="border-radius:5px;width:90px;background:url(images/bg.jpg) repeat;color:white;" title="Click to view the books of the library."> Books </button>
<button type="button" onclick="myFunctionregistry()" style="border-radius:5px;width:90px;background:url(images/bg.jpg) repeat;color:white;" title="Click to view the books registry details of the library."> Registry </button>

<p id="demo"></p>	 
<?php include("include/footer.php"); ?>