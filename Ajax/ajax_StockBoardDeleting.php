<?php
	session_start();
	include("../inc/config.php");
	$data = $_POST['data'];
	
	$stock_document_id = $_POST['stock_document_id'];
	$sql = "DELETE FROM tb_stock_board WHERE tb_stock_board.stock_document_id = '".$stock_document_id."'";
	$rs = mysql_query($sql,$connection);
	$sql = "DELETE FROM tb_stock_document WHERE tb_stock_document.stock_document_id = '".$stock_document_id."'";
	$rs = mysql_query($sql,$connection);
	if($rs){
		echo "TRUE";
	}else{
		echo "FALSE";
	}
	
?>