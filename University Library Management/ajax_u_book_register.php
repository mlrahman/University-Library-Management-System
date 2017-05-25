<?php
include("include/connection.php");

$pdo = connect();
if($_POST['keyword']!="")
{
	$keyword = '%'.$_POST['keyword'].'%';
	$sql = "SELECT * FROM sys_lib_user WHERE neub_id_no LIKE (:keyword) or name LIKE (:keyword) ORDER BY name ASC LIMIT 0, 4";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	$fl=0;
	foreach ($list as $rs) {
		$fl=1;
		// put in bold the written text
		$user_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['name']);
		$sq="select * from sys_lib_books_taken where status='inactive' and user_id='$rs[user_id]'";
		$re=mysql_query($sq);
		$taken=mysql_num_rows($re);
		// add new option
		echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['neub_id_no']).'\')" style="width:500px;"><img src="images/user/'.$rs['picture'].'" height="40" width="30" style="float:left;border-radius:5px;"><p style="margin-left:10px;float:left;font-size:15px;padding-top:5px;color:blue;">'.$user_name.'</br><font color="red">Taken: '.$taken.'</font></p></a></li></br></br>';
	}
	if($fl==0)
		 echo '<li style="width:500px;"><p style="color:red;font-size:15px;margin-left:30px;"><b>No user found.</b></li>';
}
?>