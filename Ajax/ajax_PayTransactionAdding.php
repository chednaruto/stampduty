<?php
	session_start();
	include("../inc/config.php");
	
	$allowed_withdraw_transaction_id = $_POST['allowed_withdraw_transaction_id'];
	$pay_document_number = $_POST['pay_document_number'];
	$pay_document_date = $_POST['pay_document_date'];
	$pay_signature_id = $_POST['pay_signature_id'];

	//LOG BEFOR UPDATE
	$sql_log = "SELECT * FROM tb_allowed_withdraw_transaction t WHERE t.allowed_withdraw_transaction_id = '".$allowed_withdraw_transaction_id."'";
	$rs_log = mysql_query($sql_log,$connection);
	$row_log = mysql_fetch_assoc($rs_log);
	$befo = json_encode($row_log);
	if($row_log['pay_document_number']==""){
		$log_mode = "Add Pay Withdraw Transaction";
	}else{
		$log_mode = "Edit Pay Withdraw Transaction";
	}
	
	
	$sqlq1 = "UPDATE tb_allowed_withdraw_transaction t
	SET t.pay_document_date ='".$pay_document_date."',t.pay_document_number='".$pay_document_number."',t.pay_signature_id='".$pay_signature_id."'
	WHERE t.allowed_withdraw_transaction_id ='".$allowed_withdraw_transaction_id."'";
	$rsq1 = mysql_query($sqlq1,$connection);
	
	if($rsq1){
		//LOG UPDATE
		$sql_log = "SELECT * FROM tb_allowed_withdraw_transaction t WHERE t.allowed_withdraw_transaction_id = '".$allowed_withdraw_transaction_id."'";
		$rs_log = mysql_query($sql_log,$connection);
		$uptodate = json_encode(mysql_fetch_assoc($rs_log));
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
		VALUES('".$log_mode."','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
		
		
		echo "TRUE";
	}else{
		echo "FALSE";
	}

?>