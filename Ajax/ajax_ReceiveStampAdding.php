<?php
	session_start();
	include("../inc/config.php");
	$receive_transaction_id = $_POST['receive_transaction_id'];
	$officeid = $_POST['officeid'];
	$receive_date = $_POST['receive_date'];
	$allowed_withdraw_transaction_id = $_POST['allowed_withdraw_transaction_id'];
	$stamp_one_bath = $_POST['stamp_one_bath'];
	$stamp_five_bath = $_POST['stamp_five_bath'];
	$stamp_twenty_bath = $_POST['stamp_twenty_bath'];
	$withdraw_id1 = $_POST['withdraw_id1'];
	$withdraw_id2 = $_POST['withdraw_id2'];
	$withdraw_id3 = $_POST['withdraw_id3'];
	$receive_id1 = $_POST['receive_id1'];
	$receive_id2 = $_POST['receive_id2'];
	$receive_id3 = $_POST['receive_id3'];
	$signature_id = $_POST['signature_id'];
	$receive_document_number = $_POST['receive_document_number'];
	if($receive_transaction_id==""){
		$sqlid = "SELECT MAX(t.receive_transaction_id) AS cc FROM tb_receive_transaction t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.receive_transaction_id LIKE 'FRC%'";
		$rsid = mysql_query($sqlid,$connection);
		$rowid = mysql_fetch_assoc($rsid);
		if($rowid['cc']==""){
			$rowid['cc']="0001";
		}
		$date = date('Ymd');
		$receive_transaction_id = substr($rowid['cc'], 19, 4)-0;
		$receive_transaction_id = "FRC".$_SESSION['OFFICEID'].$date.str_pad($receive_transaction_id+1, 4, "0", STR_PAD_LEFT);
		$receive_transaction_date = "NOW()";
	}else{
		$sqlgd = "SELECT t.receive_transaction_date FROM tb_receive_transaction t WHERE t.receive_transaction_id = '".$receive_transaction_id."'";
		$rsgd = mysql_query($sqlgd,$connection);
		$rowgd = mysql_fetch_assoc($rsgd);
		$receive_transaction_date = "'".$rowgd['receive_transaction_date']."'";
	}
	
	if(!isset($allowed_withdraw_transaction_id)){
		$allowed_withdraw_transaction_id = $receive_transaction_id;
	}
	
	$sqlq1 = "REPLACE INTO tb_receive_transaction(receive_transaction_id,receive_transaction_date,officeid,receive_date,allowed_withdraw_transaction_id,
	stamp_one_bath,stamp_five_bath,stamp_twenty_bath,withdraw_id1,
	withdraw_id2,withdraw_id3,receive_id1,receive_id2,
	receive_id3,signature_id,last_update,receive_document_number)
	VALUES('".$receive_transaction_id."',".$receive_transaction_date.",'".$officeid."','".$receive_date."','".$allowed_withdraw_transaction_id."',
	'".$stamp_one_bath."','".$stamp_five_bath."','".$stamp_twenty_bath."','".$withdraw_id1."',
	'".$withdraw_id2."','".$withdraw_id3."','".$receive_id1."','".$receive_id2."',
	'".$receive_id3."','".$signature_id."',NOW(),'".$receive_document_number."')";
	$rsq1 = mysql_query($sqlq1,$connection);
	

	if($rsq1){
		echo "TRUE";
	}else{
		echo "FALSE";
	}
?>