<?php
	session_start();
	include("../inc/config.php");

	
	$id = $_POST['id'];
	
	
		$sql1 = "SELECT * FROM tb_user_permission t WHERE t.id = '".$id."'";
		$rs = mysql_query($sql1,$connection);
		$row = mysql_fetch_assoc($rs);
		$ret = json_encode($row);
		echo $ret;

?>