<?php
	session_start();
	include("../inc/config.php");

	$id = $_POST['id'];
	$officeid = $_POST['officeid'];
	$fullname = $_POST['fullname'];
	$position_m = $_POST['position_m'];
	$position_display = $_POST['position_display'];
	$status = $_POST['status'];

	$sql1 = "REPLACE INTO tb_signature_board(id,officeid,fullname,position_m,position_display,status,last_update) 
	VALUES('".$id."','".$officeid."','".$fullname."','".$position_m."','".$position_display."','".$status."',NOW())";
	$rs = mysql_query($sql1,$connection);
		
	if($rs){
			echo "TRUE";
	}else{
			echo "FALSE".$sql2;
	}

?>