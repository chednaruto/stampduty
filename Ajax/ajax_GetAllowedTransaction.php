<?php
	session_start();
	include("../inc/config.php");
	$allowed_withdraw_transaction_id = $_POST['allowed_withdraw_transaction_id'];
	$sql = "SELECT t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,tw.withdraw_id1,tw.withdraw_id2,tw.withdraw_id3
	FROM tb_allowed_withdraw_transaction t 
	INNER JOIN tb_withdraw_transaction tw ON t.withdraw_transaction_id = tw.withdraw_transaction_id
	WHERE t.allowed_withdraw_transaction_id = '".$allowed_withdraw_transaction_id."'";
	$rs = mysql_query($sql,$connection);
	while($row = mysql_fetch_assoc($rs)){
		$rows[] = $row;
	}
	echo json_encode($rows)
?>