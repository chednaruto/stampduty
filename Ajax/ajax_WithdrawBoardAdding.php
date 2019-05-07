<?php
	session_start();
	include("../inc/config.php");
	$data = $_POST['data'];
	
	$withdraw_document_number = $data['withdraw_document_number'];
	$withdraw_document_old_number = $data['withdraw_document_old_number'];
	$withdraw_document_old_date = $data['withdraw_document_old_date'];
	$withdraw_document_date = $data['withdraw_document_date'];
	$signature_id = $data['signature_id'];
	
	
	
	
	
	//Set ID
	if(isset($data['withdraw_document_id'])){
		$new_index = $data['withdraw_document_id'];
	}else{
		$sqlid = "SELECT MAX(t.withdraw_document_id) AS cc FROM tb_withdraw_document t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.withdraw_document_id LIKE 'FWD%'";
		$rsid = mysql_query($sqlid,$connection);
		$rowid = mysql_fetch_assoc($rsid);
		if($rowid['']==""){
			$rowid['']="0001";
		}
		$date = date('Ymd');
		$last_index = substr($rowid['cc'], 19, 4)-0;
		$new_index = "FWD".$_SESSION['OFFICEID'].$date.str_pad($last_index+1, 4, "0", STR_PAD_LEFT);
	}
	
	//-------------------------------
	$sqlq1 = "REPLACE INTO tb_withdraw_document(withdraw_document_id,withdraw_document_number,withdraw_document_date,officeid,
	withdraw_document_status,last_update,withdraw_document_old_number,withdraw_document_old_date,signature_id)
	VALUES('".$new_index."','".$withdraw_document_number."','".$withdraw_document_date."','".$_SESSION['OFFICEID']."',
	'Y',NOW(),'".$withdraw_document_old_number."','".$withdraw_document_old_date."','".$signature_id."')";
	$rsq1 = mysql_query($sqlq1,$connection);
	
	$sql2 = "DELETE FROM tb_withdraw_board WHERE withdraw_document_id = '".$new_index."'";
	mysql_query($sql2,$connection);
	for($i=0;$i<count($data['id']);$i++){
		$sql2 = "INSERT INTO tb_withdraw_board(id,officeid,fullname,position_m,withdraw_document_id,withdraw_board_type_id,last_update) 
		VALUES('".$data['id'][$i]."','".$_SESSION['OFFICEID']."','".$data['fullname'][$i]."','".$data['position_m'][$i]."','".$new_index."','".$data['withdraw_board_type'][$i]."',NOW())";
		$rs = mysql_query($sql2,$connection);
	}
	if($rs){
		echo "TRUE";
	}else{
		echo "FALSE";
	}
	
?>