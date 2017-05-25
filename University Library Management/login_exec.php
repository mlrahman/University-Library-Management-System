    <?php
    //Start session
    session_start();
     
    //Include database connection details
    require_once('include/connection.php');
     
    //Array to store validation errors
    $errmsg_arr = array();
     
    //Validation error flag
    $errflag = false;
     
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
    $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
    }
     
    //Sanitize the POST values
    $username = clean($_POST['username']);
    $password = clean($_POST['password']);
	$password = sha1($password);
     
     
	 
	 //inactive checking
	  $qry="SELECT * FROM sys_lib_admin WHERE username='$username' AND password='$password' AND status='inactive' ";
    $result=mysql_query($qry);
	 if($result) {
    if(mysql_num_rows($result) > 0) {
	$errmsg_arr[] = '<font color="white"><b> **Sorry your status is inactive** &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </b></font>';
    $errflag = true;
	 $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
	 header("location: index.php");
    exit();
    }}
	 
	 
	 
    //Create query
    $qry="SELECT * FROM sys_lib_admin WHERE username='$username' AND password='$password' AND status='active' ";
    $result=mysql_query($qry);
     
    //Check whether the query was successful or not
    if($result) {
    if(mysql_num_rows($result) > 0) {
    //Login Successful
    session_regenerate_id();
    $member = mysql_fetch_assoc($result);
    $_SESSION['SESS_MEMBER_ID'] = $member['admin_id'];
    $_SESSION['SESS_FIRST_NAME'] = $member['username'];
    $_SESSION['SESS_LAST_NAME'] = $member['password'];
    session_write_close();
    header("location: u_index.php");
    exit();
    }else {
    //Login failed
    $errmsg_arr[] = '<font color="white"><b>**Invaid username or password** &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </b></font>';
    $errflag = true;
    if($errflag) {
    $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
    session_write_close();
    header("location: index.php");
    exit();
    }
    }
    }else {
    die("Query failed");
    }
    ?>