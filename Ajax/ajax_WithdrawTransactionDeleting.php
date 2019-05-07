<?php
	session_start();
	include("../inc/config.php");
	$withdraw_transaction_id = $_POST['withdraw_transaction_id'];
	
	//LOG BEFOR UPDATE
	$sql_log = "SELECT * FROM tb_withdraw_transaction t WHERE t.withdraw_transaction_id = '".$withdraw_transaction_id."'";
	$rs_log = mysql_query($sql_log,$connection);
	$befo = json_encode(mysql_fetch_assoc($rs_log));
	
	
	$sql_d = "DELETE FROM tb_withdraw_transaction WHERE withdraw_transaction_id = '".$withdraw_transaction_id."'";
	$rs_d = mysql_query($sql_d,$connection);
	if($rs_d){
		echo "TRUE";
	}else{
		echo "FALSE";
	}
	
	$sql_log = "SELECT * FROM tb_withdraw_transaction t WHERE t.withdraw_transaction_id = '".$withdraw_transaction_id."'";
	$rs_log = mysql_query($sql_log,$connection);
	$uptodate = json_encode(mysql_fetch_assoc($rs_log));
	
	$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
	VALUES('Delete Withdraw Transaction','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
	mysql_query($sql_log,$connection);
	
?>