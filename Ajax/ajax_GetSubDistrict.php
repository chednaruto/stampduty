<?php
	session_start();
	include("../inc/config.php");
	$district_id = $_POST['district_id'];
	$rs = mysql_query("SELECT * FROM tb_subdistrict t WHERE t.district_id = '".$district_id."'",$connection);
	while($row = mysql_fetch_assoc($rs)){
		$rows[] = $row;
	}
	echo json_encode($rows)
?>