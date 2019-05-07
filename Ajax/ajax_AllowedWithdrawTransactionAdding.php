<?php
	session_start();
	include("../inc/config.php");
	include("../Function/FTSQLMS.php");
	$balanceClass = new FTSQLMS();
	
	$allowed_withdraw_transaction_id = $_POST['allowed_withdraw_transaction_id'];
	$officeid = $_POST['officeid'];
	if($_POST['allowed_withdraw_date']=="" || $_POST['allowed_withdraw_date']=="0000-00-00" || !isset($_POST['allowed_withdraw_date'])){
		$allowed_withdraw_date = 'NOW()';
	}else{
		$allowed_withdraw_date = "'".$_POST['allowed_withdraw_date']."'";
	}
	$withdraw_transaction_id = $_POST['withdraw_transaction_id'];
	$allowed_withdraw_one_bath = $_POST['allowed_withdraw_one_bath'];
	$allowed_withdraw_five_bath = $_POST['allowed_withdraw_five_bath'];
	$allowed_withdraw_twenty_bath = $_POST['allowed_withdraw_twenty_bath'];
	$allowed_withdraw_id1 = $_POST['allowed_withdraw_id1'];
	$allowed_withdraw_id2 = $_POST['allowed_withdraw_id2'];
	$allowed_withdraw_id3 = $_POST['allowed_withdraw_id3'];
	$allowed_withdraw_status = $_POST['allowed_withdraw_status'];
	$signature_id = $_POST['signature_id'];

	$stampBalance = $balanceClass->GetBalanceNotIn($_SESSION["OFFICEID"],"tb_allowed_withdraw_transaction",$allowed_withdraw_transaction_id);
		//LOG BEFOR UPDATE
		$sql_log = "SELECT * FROM tb_allowed_withdraw_transaction t WHERE t.allowed_withdraw_transaction_id = '".$allowed_withdraw_transaction_id."'";
		$rs_log = mysql_query($sql_log,$connection);
		$befo = json_encode(mysql_fetch_assoc($rs_log));
	
	
	if($stampBalance['stamp_one_bath']>= $allowed_withdraw_one_bath && $stampBalance['stamp_five_bath']>= $allowed_withdraw_five_bath && $stampBalance['stamp_twenty_bath']>= $allowed_withdraw_twenty_bath) {
		if($allowed_withdraw_transaction_id==""){
			$sqlid = "SELECT MAX(t.allowed_withdraw_transaction_id) AS cc FROM tb_allowed_withdraw_transaction t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.allowed_withdraw_transaction_id LIKE 'FAWT%'";
			$rsid = mysql_query($sqlid,$connection);
			$rowid = mysql_fetch_assoc($rsid);
			if($rowid['cc']==""){
				$rowid['cc']="0001";
			}
			$date = date('Ymd');
			$allowed_withdraw_transaction_id = substr($rowid['cc'], 20, 4)-0;
			$allowed_withdraw_transaction_id = "FAWT".$_SESSION['OFFICEID'].$date.str_pad($allowed_withdraw_transaction_id+1, 4, "0", STR_PAD_LEFT);
			
			$sqlq1 = "INSERT INTO tb_allowed_withdraw_transaction(allowed_withdraw_transaction_id,allowed_withdraw_transaction_date,officeid,allowed_withdraw_date,withdraw_transaction_id,
			allowed_withdraw_one_bath,allowed_withdraw_five_bath,allowed_withdraw_twenty_bath,allowed_withdraw_id1,
			allowed_withdraw_id2,allowed_withdraw_id3,allowed_withdraw_status,signature_id,last_update)
			VALUES('".$allowed_withdraw_transaction_id."',NOW(),'".$officeid."',".$allowed_withdraw_date.",'".$withdraw_transaction_id."',
			'".$allowed_withdraw_one_bath."','".$allowed_withdraw_five_bath."','".$allowed_withdraw_twenty_bath."','".$allowed_withdraw_id1."',
			'".$allowed_withdraw_id2."','".$allowed_withdraw_id3."','".$allowed_withdraw_status."','".$signature_id."',NOW())";
			$rsq1 = mysql_query($sqlq1,$connection);
			
			if($rsq1){
				echo "TRUE";
			}else{
				echo "FALSE";
			}
			$log_mode = "Add Allowed Withdraw Transaction";
		}else{
			$sqlgd = "SELECT t.allowed_withdraw_transaction_date FROM tb_allowed_withdraw_transaction t 
			WHERE t.allowed_withdraw_transaction_id = '".$allowed_withdraw_transaction_id."'";
			$rsgd = mysql_query($sqlgd,$connection);
			$rowgd = mysql_fetch_assoc($rsgd);
			
			$sqlq1 = "REPLACE INTO tb_allowed_withdraw_transaction(allowed_withdraw_transaction_id,allowed_withdraw_transaction_date,officeid,allowed_withdraw_date,withdraw_transaction_id,
			allowed_withdraw_one_bath,allowed_withdraw_five_bath,allowed_withdraw_twenty_bath,allowed_withdraw_id1,
			allowed_withdraw_id2,allowed_withdraw_id3,allowed_withdraw_status,signature_id,
			last_update)
			VALUES('".$allowed_withdraw_transaction_id."','".$rowgd['allowed_withdraw_transaction_date']."','".$officeid."',".$allowed_withdraw_date.",'".$withdraw_transaction_id."',
			'".$allowed_withdraw_one_bath."','".$allowed_withdraw_five_bath."','".$allowed_withdraw_twenty_bath."','".$allowed_withdraw_id1."',
			'".$allowed_withdraw_id2."','".$allowed_withdraw_id3."','".$allowed_withdraw_status."','".$signature_id."',
			NOW())";
			$rsq1 = mysql_query($sqlq1,$connection);
		
			if($rsq1){
				echo "TRUE";
			}else{
				echo "FALSE";
			}
			$log_mode = "Edit Allowed Withdraw Transaction";
		}
			//LOG UPDATE
			$sql_log = "SELECT * FROM tb_allowed_withdraw_transaction t WHERE t.allowed_withdraw_transaction_id = '".$allowed_withdraw_transaction_id."'";
			$rs_log = mysql_query($sql_log,$connection);
			$uptodate = json_encode(mysql_fetch_assoc($rs_log));
			
			$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
			VALUES('".$log_mode."','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
			mysql_query($sql_log,$connection);
	}else {
		echo "จำนวนแสตมป์อากรคงเหลือไม่พอ";
	}
	
?>