<?php
	session_start();
	include("../inc/config.php");
	include("../Function/FTSQLMS.php");
	$balanceClass = new FTSQLMS();
	$sell_minor_date = $_POST['sell_minor_date'];
	$sell_minor_tin = $_POST['sell_minor_tin'];
	$sell_minor_cid = $_POST['sell_minor_cid'];
	$sell_minor_transaction_id = $_POST['sell_minor_transaction_id'];
	$sell_minor_sub_transaction_id = $_POST['sell_minor_sub_transaction_id'];
	$stamp_one_bath = $_POST['stamp_one_bath'];
	$stamp_five_bath = $_POST['stamp_five_bath'];
	$stamp_twenty_bath = $_POST['stamp_twenty_bath'];

	if($sell_minor_transaction_id==""){
		$sql_id = "SELECT MAX(t.sell_minor_transaction_id) AS cc FROM tb_sell_minor_transaction t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.sell_minor_date='".$sell_minor_date."'";
		$rs_id = mysql_query($sql_id,$connection);
		$rowid = mysql_fetch_assoc($rs_id);
		if($rowid['cc']==""){
			$rowid['cc']="0001";
			$sell_minor_transaction_id =$rowid['cc']-0;
		}else{
			$sell_minor_transaction_id = substr($rowid['cc'], 19, 4)-0;
		}
		$date = date('Ymd');
		$sell_minor_transaction_id = "FSM".$_SESSION['OFFICEID'].$date.str_pad($sell_minor_transaction_id+1, 4, "0", STR_PAD_LEFT);
	}
	
	$sql_smt = "REPLACE INTO tb_sell_minor_transaction(sell_minor_transaction_id,officeid,sell_minor_date,sell_minor_tin,
	sell_minor_cid,last_update) VALUES('".$sell_minor_transaction_id."','".$_SESSION['OFFICEID']."','".$sell_minor_date."','".$sell_minor_tin."',
	'".$sell_minor_cid."',NOW())";
	mysql_query($sql_smt,$connection);
	
	$stampBalance = $balanceClass->GetBalanceNotIn($_SESSION["OFFICEID"],"tb_sell_minor_sub_transaction",$sell_minor_sub_transaction_id);
	
	//LOG BEFOR UPDATE
	$sql_log = "SELECT * FROM tb_sell_minor_sub_transaction t WHERE t.sell_minor_sub_transaction_id = '".$sell_minor_sub_transaction_id."'";
	$rs_log = mysql_query($sql_log,$connection);
	$row_log = mysql_fetch_assoc($rs_log);
	$befo = json_encode($row_log);
	if($row_log['sell_minor_sub_transaction_id']==""){
		$log_mode = "Add Sell Minor Withdraw Transaction";
	}else{
		$log_mode = "Edit Sell Minor Withdraw Transaction";
	}
	
	
	if($stampBalance['stamp_one_bath'] >= $stamp_one_bath && $stampBalance['stamp_five_bath'] >= $stamp_five_bath && $stampBalance['stamp_twenty_bath'] >= $stamp_twenty_bath){
		if($sell_minor_sub_transaction_id==""){
			$sqlc = "SELECT MAX(ts.sell_minor_sub_transaction_id) AS cc 
			FROM tb_sell_minor_sub_transaction ts 
			WHERE ts.officeid = '".$_SESSION['OFFICEID']."' AND DATE(ts.sell_minor_sub_date) = DATE(NOW())";
			$rsc = mysql_query($sqlc,$connection);
			$rowc = mysql_fetch_assoc($rsc);
			if($rowc['cc']==""){
				$rowc['cc']="0002";
			}
			$date = str_replace("-","",$sell_minor_date);
			$sell_minor_sub_transaction_id = substr($rowc['cc'], 19, 4)-0;
			$sell_minor_sub_transaction_id = "SSM".$_SESSION['OFFICEID'].$date.str_pad($sell_minor_sub_transaction_id+1, 4, "0", STR_PAD_LEFT);
			$sql_sub = "INSERT INTO tb_sell_minor_sub_transaction(sell_minor_transaction_id,sell_minor_sub_transaction_id,officeid,stamp_one_bath,
			stamp_five_bath,stamp_twenty_bath,sell_minor_sub_date,last_update) VALUES('".$sell_minor_transaction_id."','".$sell_minor_sub_transaction_id."','".$_SESSION['OFFICEID']."','".$stamp_one_bath."',
			'".$stamp_five_bath."','".$stamp_twenty_bath."',NOW(),NOW())";
			$rs_sub = mysql_query($sql_sub,$connection);
			if($rs_sub){
				echo "TRUE";
			}else{
				echo "FALSE".$sql_sub;
			}
		}else{
			$sql_sub = "UPDATE tb_sell_minor_sub_transaction t SET 
			stamp_one_bath='".$stamp_one_bath."',
			stamp_five_bath='".$stamp_five_bath."',
			stamp_twenty_bath='".$stamp_twenty_bath."',
			last_update=NOW() WHERE sell_minor_sub_transaction_id='".$sell_minor_sub_transaction_id."' ";
			$rs_sub = mysql_query($sql_sub,$connection);
			if($rs_sub){
				echo "TRUE";
			}else{
				echo "FALSE";
			}
		}
		
		
		//LOG UPDATE
			$sql_log = "SELECT * FROM tb_sell_minor_sub_transaction t WHERE t.sell_minor_transaction_id = '".$sell_minor_transaction_id."'";
			$rs_log = mysql_query($sql_log,$connection);
			$uptodate = json_encode(mysql_fetch_assoc($rs_log));
			
			$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
			VALUES('".$log_mode."','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
			mysql_query($sql_log,$connection);
	}else{
		echo "ไม่สามารถขายได้ แสตมป์อากรไม่เพียงพอ";
	}
?>