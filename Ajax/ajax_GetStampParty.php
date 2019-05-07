<?php
	session_start();
	include("../inc/config.php");
	$cid = $_POST['cid'];
	$sql = "SELECT * FROM tb_stamp_party t WHERE (t.stamp_party_cid = '".$cid."' OR t.stamp_party_tin = '".$cid."' OR t.stamp_party_number ='".$cid."') AND t.stamp_party_officeid='".$_SESSION['OFFICEID']."' AND t.stamp_party_status='Y' AND TIMESTAMPADD(YEAR,3,t.stamp_party_date) >= DATE(NOW()) ORDER BY t.stamp_party_date DESC LIMIT 1";
	$rs = mysql_query($sql,$connection);
	$row = mysql_fetch_assoc($rs);
	echo json_encode($row)
?>