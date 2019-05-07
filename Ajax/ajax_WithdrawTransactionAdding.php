<?php
	session_start();
	include("../inc/config.php");
	include("../Function/FTSQLMS.php");
	$balanceClass = new FTSQLMS();
	$withdraw_transaction_id = $_POST['withdraw_transaction_id'];
	$withdraw_document_id = $_POST['withdraw_document_id'];
	$withdraw_document_date = $_POST['withdraw_document_date'];
	$amount_withdraw_one_bath = $_POST['amount_withdraw_one_bath'];
	$amount_withdraw_five_bath = $_POST['amount_withdraw_five_bath'];
	$amount_withdraw_twenty_bath = $_POST['amount_withdraw_twenty_bath'];
	$withdraw_id1 = $_POST['withdraw_id1'];
	$withdraw_id2 = $_POST['withdraw_id2'];
	$withdraw_id3 = $_POST['withdraw_id3'];
	$signature_id = $_POST['signature_id'];
	$officeid = $_POST['officeid'];
	$officelimitmoney = $balanceClass->GetLimitMoNey($_SESSION["OFFICELEVEL"],$_SESSION["OFFICEID"]);
	$stampBalance = $balanceClass->GetBalance($_SESSION["OFFICEID"]);
	
	if($officelimitmoney>=($stampBalance['money_one_bath']+$stampBalance['money_five_bath']+$stampBalance['money_twenty_bath']+($amount_withdraw_one_bath+$amount_withdraw_five_bath*5+$amount_withdraw_twenty_bath*20))){
		if($withdraw_transaction_id==""){
			$sqlid = "SELECT MAX(t.withdraw_transaction_id) AS cc FROM tb_withdraw_transaction t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.withdraw_transaction_id LIKE 'FWT%'";
			$rsid = mysql_query($sqlid,$connection);
			$rowid = mysql_fetch_assoc($rsid);
			if($rowid['cc']==""){
				$rowid['cc']="0002";
			}
			$date = date('Ymd');
			$withdraw_transaction_id = substr($rowid['cc'], 19, 4)-0;
			$withdraw_transaction_id = "FWT".$_SESSION['OFFICEID'].$date.str_pad($withdraw_transaction_id+1, 4, "0", STR_PAD_LEFT);
			$withdraw_transaction_date = "NOW()";
			$log_mode = "Add Withdraw Transaction";
		}else{
			$getdate = "SELECT twt.withdraw_transaction_date FROM tb_withdraw_transaction twt WHERE twt.withdraw_transaction_id LIKE '".$withdraw_transaction_id."'";
			$rsdate = mysql_query($getdate,$connection);
			$rowdate = mysql_fetch_assoc($rsdate);
			$withdraw_transaction_date = "'".$rowdate['withdraw_transaction_date']."'";
			$log_mode = "Edit Withdraw Transaction";
		}
		
		//LOG BEFOR UPDATE
		$sql_log = "SELECT * FROM tb_withdraw_transaction t WHERE t.withdraw_transaction_id = '".$withdraw_transaction_id."'";
		$rs_log = mysql_query($sql_log,$connection);
		$befo = json_encode(mysql_fetch_assoc($rs_log));
		
		
		$sqlq1 = "REPLACE INTO tb_withdraw_transaction(withdraw_transaction_id,withdraw_transaction_date,withdraw_document_id,withdraw_document_date,amount_withdraw_one_bath,
		amount_withdraw_five_bath,amount_withdraw_twenty_bath,withdraw_id1,withdraw_id2,
		withdraw_id3,signature_id,officeid,last_update)
		VALUES('".$withdraw_transaction_id."',".$withdraw_transaction_date.",'".$withdraw_document_id."','".$withdraw_document_date."','".$amount_withdraw_one_bath."',
		'".$amount_withdraw_five_bath."','".$amount_withdraw_twenty_bath."','".$withdraw_id1."','".$withdraw_id2."',
		'".$withdraw_id3."','".$signature_id."','".$officeid."',NOW())";
		$rsq1 = mysql_query($sqlq1,$connection);
	
		if($rsq1){
			//LOG UPDATE
			$sql_log = "SELECT * FROM tb_withdraw_transaction t WHERE t.withdraw_transaction_id = '".$withdraw_transaction_id."'";
			$rs_log = mysql_query($sql_log,$connection);
			$uptodate = json_encode(mysql_fetch_assoc($rs_log));
			
			$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
			VALUES('".$log_mode."','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
			mysql_query($sql_log,$connection);
			
			
			
			
			echo "TRUE";
		}else{
			echo "FALSE";
		}
	}else{
		echo "ยังไม่ได้กำหนดยอดยกมา หรือยอดเบิกเกินกว่าวงเงินเก็บรักษา ยอกที่เบิกเพิ่มได้ : ".number_format($officelimitmoney-($stampBalance['money_one_bath']+$stampBalance['money_five_bath']+$stampBalance['money_twenty_bath']));
	}
	
	
	
	
?>