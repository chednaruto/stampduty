<?php
	session_start();
	include("../inc/config.php");
	date_default_timezone_set("Asia/Bangkok");
	if(isset($_SESSION['PIN'])){
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGOUT','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
		
		
		session_destroy();
		echo "TRUE";
	}else{
		echo "FALSE";
	}
		
?>