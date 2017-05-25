<?php
include("include/connection.php");

$pdo = connect();
if($_POST['keyword']!="")
{
	$keyword = '%'.$_POST['keyword'].'%';
	$sql = "SELECT * FROM sys_lib_book WHERE book_name LIKE (:keyword) or writer LIKE (:keyword) ORDER BY book_name ASC LIMIT 0, 4";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	$fl=0;
	foreach ($list as $rs) {
		$fl=1;
		// put in bold the written text
		$user_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['book_name']);
		// add new option
		$sq="select count(book_det_id) from sys_lib_book_det where book_id='$rs[book_id]'";
		$qu = $pdo->prepare($sq);
		$qu->execute();
		$li = $qu->fetchAll();
		foreach($li as $r)
		{
			$kkk=$r['count(book_det_id)'];
		}
		echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['book_name']).'\')" style="width:500px;"><a href="u_book.php?search=act&book_id='.$rs['book_id'].'" style="text-decoration:none;"><p style="margin-left:10px;font-size:15px;padding-top:5px;color:blue;margin-bottom:0px;">'.$user_name.'</br><font style="margin-left:2px;font-size:12px;color:purple;margin-top:0px;">'.$rs['writer'].'</font><font style="margin-left:20px;font-size:12px;color:red;margin-top:0px;">Total: '.$kkk.'</font></p></a></li>';
	}
	if($fl==0)
		 echo '<li style="width:500px;"><p style="color:red;font-size:15px;margin-left:30px;"><b>No book found.</b></li>';
}
?>