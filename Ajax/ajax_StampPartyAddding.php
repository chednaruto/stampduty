<?php
	session_start();
	include("../inc/config.php");
	include("../Function/FTSQLMS.php");
	$balanceClass = new FTSQLMS();
	$stamp_party_transaction_id = $_POST['stamp_party_transaction_id'];
	$stamp_party_number = $_POST['stamp_party_number'];
	$stamp_party_officeid = $_POST['stamp_party_officeid'];
	$stamp_party_accep_date = $_POST['stamp_party_accep_date'];
	$stamp_party_date = $_POST['stamp_party_date'];
	$stamp_party_cid = $_POST['stamp_party_cid'];
	$stamp_party_tin = $_POST['stamp_party_tin'];
	$stamp_party_fullname = $_POST['stamp_party_fullname'];
	$stamp_party_age = $_POST['stamp_party_age'];
	$stamp_party_company = $_POST['stamp_party_company'];
	$stamp_party_building = $_POST['stamp_party_building'];
	$stamp_party_room_number = $_POST['stamp_party_room_number'];
	$stamp_party_floor = $_POST['stamp_party_floor'];
	$stamp_party_village_name = $_POST['stamp_party_village_name'];
	$stamp_party_address = $_POST['stamp_party_address'];
	$stamp_party_village_moo = $_POST['stamp_party_village_moo'];
	$stamp_party_alley = $_POST['stamp_party_alley'];
	$stamp_party_road = $_POST['stamp_party_road'];
	$stamp_party_subdistrict_id = $_POST['stamp_party_subdistrict_id'];
	$stamp_party_district_id = $_POST['stamp_party_district_id'];
	$stamp_party_province_id = $_POST['stamp_party_province_id'];
	$stamp_party_postcode = $_POST['stamp_party_postcode'];
	$stamp_party_telephone = $_POST['stamp_party_telephone'];
	$stamp_party_status = $_POST['stamp_party_status'];
	$stamp_party_reason = $_POST['stamp_party_reason'];
	$stamp_party_witness1 = $_POST['stamp_party_witness1'];
	$stamp_party_witness2 = $_POST['stamp_party_witness2'];

	$signature_id = $_POST['signature_id'];
	
	if($stamp_party_transaction_id != ""){
		//update
		$sql_insert = "REPLACE INTO tb_stamp_party(stamp_party_transaction_id,stamp_party_officeid,stamp_party_date,stamp_party_accep_date,stamp_party_cid,
		stamp_party_tin,stamp_party_fullname,stamp_party_age,stamp_party_company,
		stamp_party_building,stamp_party_room_number,stamp_party_floor,stamp_party_village_name,
		stamp_party_address,stamp_party_village_moo,stamp_party_alley,stamp_party_road,
		stamp_party_subdistrict_id,stamp_party_district_id,stamp_party_province_id,stamp_party_postcode,
		stamp_party_telephone,stamp_party_status,signature_id,last_update,stamp_party_reason,stamp_party_witness1,stamp_party_witness2,stamp_party_number) 
		VALUES('".$stamp_party_transaction_id."','".$stamp_party_officeid."','".$stamp_party_date."','".$stamp_party_accep_date."','".$stamp_party_cid."',
		'".$stamp_party_tin."','".$stamp_party_fullname."','".$stamp_party_age."','".$stamp_party_company."',
		'".$stamp_party_building."','".$stamp_party_room_number."','".$stamp_party_floor."','".$stamp_party_village_name."',
		'".$stamp_party_address."','".$stamp_party_village_moo."','".$stamp_party_alley."','".$stamp_party_road."',
		'".$stamp_party_subdistrict_id."','".$stamp_party_district_id."','".$stamp_party_province_id."','".$stamp_party_postcode."',
		'".$stamp_party_telephone."','".$stamp_party_status."','".$signature_id."',NOW(),'".$stamp_party_reason."','".$stamp_party_witness1."','".$stamp_party_witness2."',
		'".$stamp_party_number."')" ;
		$rs_insert = mysql_query($sql_insert,$connection);
		if($rs_insert){
			echo "TRUE";
		}else{
			echo "FALSE";
		}
	}else{
		//INSERT
		$sqlid = "SELECT MAX(t.stamp_party_transaction_id) AS cc FROM tb_stamp_party t 
		WHERE t.stamp_party_officeid = '".$_SESSION['OFFICEID']."'";
		$rsid = mysql_query($sqlid,$connection);
		$rowid = mysql_fetch_assoc($rsid);
		if($rowid['cc']==""){
			$rowid['cc']="0001";
		}
		$date = date('Ymd');
		$stamp_party_transaction_id = substr($rowid['cc'], 19, 4)-0;
		$stamp_party_transaction_id = "FSP".$_SESSION['OFFICEID'].$date.str_pad($stamp_party_transaction_id+1, 4, "0", STR_PAD_LEFT);
		$sql_insert = "INSERT INTO tb_stamp_party(stamp_party_transaction_id,stamp_party_officeid,stamp_party_date,stamp_party_accep_date,stamp_party_cid,
		stamp_party_tin,stamp_party_fullname,stamp_party_age,stamp_party_company,
		stamp_party_building,stamp_party_room_number,stamp_party_floor,stamp_party_village_name,
		stamp_party_address,stamp_party_village_moo,stamp_party_alley,stamp_party_road,
		stamp_party_subdistrict_id,stamp_party_district_id,stamp_party_province_id,stamp_party_postcode,
		stamp_party_telephone,stamp_party_status,signature_id,last_update,stamp_party_reason,stamp_party_witness1,stamp_party_witness2,stamp_party_number) 
		VALUES('".$stamp_party_transaction_id."','".$stamp_party_officeid."','".$stamp_party_date."','".$stamp_party_accep_date."','".$stamp_party_cid."',
		'".$stamp_party_tin."','".$stamp_party_fullname."','".$stamp_party_age."','".$stamp_party_company."',
		'".$stamp_party_building."','".$stamp_party_room_number."','".$stamp_party_floor."','".$stamp_party_village_name."',
		'".$stamp_party_address."','".$stamp_party_village_moo."','".$stamp_party_alley."','".$stamp_party_road."',
		'".$stamp_party_subdistrict_id."','".$stamp_party_district_id."','".$stamp_party_province_id."','".$stamp_party_postcode."',
		'".$stamp_party_telephone."','".$stamp_party_status."','".$signature_id."',NOW(),'".$stamp_party_reason."','".$stamp_party_witness1."','".$stamp_party_witness2."',
		'".$stamp_party_number."')" ;
		$rs_insert = mysql_query($sql_insert,$connection);
		if($rs_insert){
			echo "TRUE";
		}else{
			echo "FALSE";
		}
	}

?>