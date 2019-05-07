<?php
	session_start();
	include("../inc/config.php");
	$sell_minor_sub_transaction_id = $_POST['sell_minor_sub_transaction_id'];
	$sql = "SELECT * FROM tb_sell_minor_sub_transaction t WHERE t.sell_minor_sub_transaction_id = '".$sell_minor_sub_transaction_id."'";
	$rs = mysql_query($sql,$connection);
	$row = mysql_fetch_assoc($rs);
	echo json_encode($row)
?>