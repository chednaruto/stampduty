<?php
	session_start();
	include("../inc/config.php");
	$data = $_POST['data'];
	
	$withdraw_document_id = $_POST['withdraw_document_id'];
	$sql = "DELETE FROM tb_withdraw_board WHERE tb_withdraw_board.withdraw_document_id = '".$withdraw_document_id."'";
	$rs = mysql_query($sql,$connection);
	$sql = "DELETE FROM tb_withdraw_document WHERE tb_withdraw_document.withdraw_document_id = '".$withdraw_document_id."'";
	$rs = mysql_query($sql,$connection);
	if($rs){
		echo "TRUE";
	}else{
		echo "FALSE";
	}
	
?>