<?php
	session_start();
	include("../inc/config.php");

	
	$id = $_POST['id'];
	
	
		$sql1 = "SELECT * FROM tb_withdraw_board t WHERE t.id = '".$id."' AND t.officeid = '".$_SESSION['OFFICEID']."'";
		$rs = mysql_query($sql1,$connection);
		$row = mysql_fetch_assoc($rs);
		$ret = json_encode($row);
		echo $ret;

?>