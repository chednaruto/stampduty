<?php
	session_start();
	include("../inc/config.php");
	$data = $_POST['data'];
	
	$stock_document_number = $data['stock_document_number'];
	$stock_document_old_number = $data['stock_document_old_number'];
	$stock_document_old_date = $data['stock_document_old_date'];
	$stock_document_date = $data['stock_document_date'];
	$signature_id = $data['signature_id'];
	//Set ID
	if(isset($data['stock_document_id'])){
		$new_index = $data['stock_document_id'];
	}else{
		$sqlid = "SELECT MAX(t.stock_document_id) AS cc FROM tb_stock_document t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.stock_document_id LIKE 'FST%'";
		$rsid = mysql_query($sqlid,$connection);
		$rowid = mysql_fetch_assoc($rsid);
		if($rowid['']==""){
			$rowid['']="0001";
		}
		$date = date('Ymd');
		$last_index = substr($rowid['cc'], 19, 4)-0;
		$new_index = "FST".$_SESSION['OFFICEID'].$date.str_pad($last_index+1, 4, "0", STR_PAD_LEFT);
	}
	//-------------------------------
	$sqlq1 = "REPLACE INTO tb_stock_document(stock_document_id,stock_document_number,stock_document_date,officeid,
	stock_document_status,last_update,stock_document_old_number,stock_document_old_date,signature_id)
	VALUES('".$new_index."','".$stock_document_number."','".$stock_document_date."','".$_SESSION['OFFICEID']."',
	'Y',NOW(),'".$stock_document_old_number."','".$stock_document_old_date."','".$signature_id."')";
	$rsq1 = mysql_query($sqlq1,$connection);
	
	$sql2 = "DELETE FROM tb_stock_board WHERE stock_document_id = '".$new_index."'";
	mysql_query($sql2,$connection);
	for($i=0;$i<count($data['id']);$i++){
		$sql2 = "INSERT INTO tb_stock_board(id,officeid,fullname,position_m,stock_document_id,stock_board_type_id,last_update) 
		VALUES('".$data['id'][$i]."','".$_SESSION['OFFICEID']."','".$data['fullname'][$i]."','".$data['position_m'][$i]."','".$new_index."','".$data['stock_board_type'][$i]."',NOW())";
		$rs = mysql_query($sql2,$connection);
	}
	if($rs){
		echo "TRUE";
	}else{
		echo "FALSE";
	}
?>