<?php
	session_start();
	include("../inc/config.php");

	if($_SESSION['OFFICELEVEL']=="00"){
		$sql_c = "SELECT t.office_name AS label,t.office_limit_money AS value FROM tb_office t WHERE t.office_level LIKE '02'";
	}else if($_SESSION['OFFICELEVEL']=="02"){
		$sql_c = "SELECT t.office_name AS label,t.office_limit_money AS value 
		FROM tb_office t WHERE t.office_level LIKE '03' 
		AND t.office_code LIKE '".(substr($_SESSION['OFFICEID'],0,2))."%'";
	}else if($_SESSION['OFFICELEVEL']=="03"){
		$sql_c = "SELECT t.office_name AS label,t.office_limit_money AS value 
		FROM tb_office t WHERE t.office_level LIKE '04' 
		AND t.office_code LIKE '".(substr($_SESSION['OFFICEID'],0,5))."%'";
	}else{
		$sql_c = "SELECT t.office_name AS label,t.office_limit_money AS value FROM tb_office t WHERE t.office_code LIKE '".$_SESSION['OFFICEID']."'";
	}
	
	$rs_c = mysql_query($sql_c,$connection);
	$rows = array();
	while($r = mysql_fetch_assoc($rs_c)) {
		$rows[] = $r;
	}
	header('Content-type: application/json');
	echo json_encode($rows);
	

?>