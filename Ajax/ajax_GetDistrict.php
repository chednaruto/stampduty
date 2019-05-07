<?php
	session_start();
	include("../inc/config.php");
	$province_id = $_POST['province_id'];
	$rs = mysql_query("SELECT * FROM tb_district t WHERE t.province_id = '".$province_id."'",$connection);
	while($row = mysql_fetch_assoc($rs)){
		$rows[] = $row;
	}
	echo json_encode($rows)
?>