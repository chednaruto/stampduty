<?php
	session_start();
	include("../inc/config.php");
	$deliver_transaction_id = $_POST['deliver_transaction_id'];
	$officeid = $_POST['officeid'];
	$deliver_date = $_POST['deliver_date'];
	$deliver_time = $_POST['deliver_time'];
	$stamp_status = $_POST['stamp_status'];
	$key_status = $_POST['key_status'];
	$stamp_one_bath = $_POST['stamp_one_bath'];
	$stamp_five_bath = $_POST['stamp_five_bath'];
	$stamp_twenty_bath = $_POST['stamp_twenty_bath'];
	$deliver_id1 = $_POST['deliver_id1'];
	$deliver_id2 = $_POST['deliver_id2'];
	$deliver_id3 = $_POST['deliver_id3'];
	$receive_id1 = $_POST['receive_id1'];
	$receive_id2 = $_POST['receive_id2'];
	$receive_id3 = $_POST['receive_id3'];
	$signature_id = $_POST['signature_id'];
	$note = $_POST['note'];
	if($deliver_transaction_id == ""){
		$month = date('m')-0;
		$year = "";
		if($month>9){
			$year = date('Y')+1;
		}else{
			$year = date('Y');
		}
		$sqlid = "SELECT MAX(t.deliver_transaction_id) AS cc 
		FROM tb_deliver_transaction t 
		WHERE t.officeid ='".$officeid."' AND DATE(t.deliver_transaction_date) BETWEEN '".($year-1)."-10-01' AND '".$year."-09-30'";
		$rsid = mysql_query($sqlid,$connection);
		$rowid = mysql_fetch_assoc($rsid);
		if($rowid['cc']==""){
			$rowid['cc']="0001";
		}
		$date = date('Ymd');
		$deliver_transaction_id = substr($rowid['cc'], 19, 4)-0;
		$deliver_transaction_id = "FDV".$_SESSION['OFFICEID'].$date.str_pad($deliver_transaction_id+1, 4, "0", STR_PAD_LEFT);
		$sql_u = "INSERT INTO tb_deliver_transaction(deliver_transaction_id,deliver_transaction_date,officeid,deliver_date,
		deliver_time,stamp_status,key_status,stamp_one_bath,
		stamp_five_bath,stamp_twenty_bath,deliver_id1,deliver_id2,
		deliver_id3,receive_id1,receive_id2,receive_id3,
		last_update,signature_id,note) VALUES('".$deliver_transaction_id."',NOW(),'".$officeid."','".$deliver_date."',
		'".$deliver_time."','".$stamp_status."','".$key_status."','".$stamp_one_bath."',
		'".$stamp_five_bath."','".$stamp_twenty_bath."','".$deliver_id1."','".$deliver_id2."',
		'".$deliver_id3."','".$receive_id1."','".$receive_id2."','".$receive_id3."',
		NOW(),'".$signature_id."','".$note."')";
		$rs_u = mysql_query($sql_u,$connection);
		if($rs_u){
			echo "TRUE";
		}else{
			echo "FALSE";
		}
	}else{
		$sql_u = "UPDATE tb_deliver_transaction d
		SET d.deliver_date='".$deliver_date."',
		d.deliver_time='".$deliver_time."',
		d.stamp_status='".$stamp_status."',
		d.key_status='".$key_status."',
		d.stamp_one_bath='".$stamp_one_bath."',
		d.stamp_five_bath='".$stamp_five_bath."',
		d.stamp_twenty_bath='".$stamp_twenty_bath."',
		d.deliver_id1='".$deliver_id1."',
		d.deliver_id2='".$deliver_id2."',
		d.deliver_id3='".$deliver_id3."',
		d.receive_id1='".$receive_id1."',
		d.receive_id2='".$receive_id2."',
		d.receive_id3='".$receive_id3."',
		d.last_update = NOW(),
		d.note = '".$note."'
		WHERE d.deliver_transaction_id = '".$deliver_transaction_id."'";
		$rs_u = mysql_query($sql_u,$connection);
		if($rs_u){
			echo "TRUE";
		}else{
			echo "FALSE";
		}
	}

?>