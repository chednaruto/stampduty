<?php
	session_start();
	include("../inc/config.php");
	include("../Function/FTSQLMS.php");
	$balanceClass = new FTSQLMS();
	$sell_party_transaction_id = $_POST['sell_party_transaction_id'];
	$stamp_one_bath = $_POST['stamp_one_bath'];
	$stamp_five_bath = $_POST['stamp_five_bath'];
	$stamp_twenty_bath = $_POST['stamp_twenty_bath'];
	$stamp_party_transaction_id = $_POST['stamp_party_transaction_id'];
	$stampBalance = $balanceClass->GetBalanceNotIn($_SESSION["OFFICEID"],"tb_sell_party_transaction",$sell_party_transaction_id);
	
	
	//LOG BEFOR UPDATE
	$sql_log = "SELECT * FROM tb_sell_party_transaction t WHERE t.sell_party_transaction_id = '".$sell_party_transaction_id."'";
	$rs_log = mysql_query($sql_log,$connection);
	$row_log = mysql_fetch_assoc($rs_log);
	$befo = json_encode($row_log);
	if($row_log['sell_party_transaction_id']==""){
		$log_mode = "Add Sell Party Withdraw Transaction";
	}else{
		$log_mode = "Edit Sell Party Withdraw Transaction";
	}
	
	if($stampBalance['stamp_one_bath'] >= $stamp_one_bath && $stampBalance['stamp_five_bath'] >= $stamp_five_bath && $stampBalance['stamp_twenty_bath'] >= $stamp_twenty_bath){
		if($sell_party_transaction_id == ""){
			$sqlid = "SELECT MAX(ts.sell_party_transaction_id) AS cc FROM tb_sell_party_transaction ts WHERE ts.officeid = '".$_SESSION['OFFICEID']."' AND DATE(ts.sell_datetime) = DATE(NOW())";
			$rsid = mysql_query($sqlid,$connection);
			$rowid = mysql_fetch_assoc($rsid);
			if($rowid['cc']==""){
				$rowid['cc']="0001";
			}
			$date = date('Ymd');
			$sell_party_transaction_id = substr($rowid['cc'], 19, 4)-0;
			$sell_party_transaction_id = "FSS".$_SESSION['OFFICEID'].$date.str_pad($sell_party_transaction_id+1, 4, "0", STR_PAD_LEFT);
			$sqlq = "INSERT INTO tb_sell_party_transaction(sell_party_transaction_id,officeid,stamp_one_bath,stamp_five_bath,
			stamp_twenty_bath,stamp_party_transaction_id,sell_datetime,last_update) VALUES('".$sell_party_transaction_id."','".$_SESSION['OFFICEID']."','".$stamp_one_bath."','".$stamp_five_bath."',
			'".$stamp_twenty_bath."','".$stamp_party_transaction_id."',NOW(),NOW())";
			$rsq = mysql_query($sqlq,$connection);
			if($rsq){
				echo "TRUE";
			}else{
				echo "FALSE";
			}
		}else{
			$sqlq = "UPDATE tb_sell_party_transaction SET sell_party_transaction_id = '".$sell_party_transaction_id."',officeid='".$_SESSION['OFFICEID']."',
			stamp_one_bath='".$stamp_one_bath."',stamp_five_bath='".$stamp_five_bath."',stamp_twenty_bath='".$stamp_twenty_bath."',
			stamp_party_transaction_id='".$stamp_party_transaction_id."',last_update = NOW() WHERE sell_party_transaction_id='".$sell_party_transaction_id."'";
			$rsq = mysql_query($sqlq,$connection);
			if($rsq){
				echo "TRUE";
			}else{
				echo "FALSE";
			}
		}
		
			//LOG UPDATE
			$sql_log = "SELECT * FROM tb_sell_party_transaction t WHERE t.sell_party_transaction_id = '".$sell_party_transaction_id."'";
			$rs_log = mysql_query($sql_log,$connection);
			$uptodate = json_encode(mysql_fetch_assoc($rs_log));
			
			$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
			VALUES('".$log_mode."','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
			mysql_query($sql_log,$connection);
	}else{
		echo "ไม่สามารถขายได้ แสตมป์อากรไม่เพียงพอ";
	}
?>