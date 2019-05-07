<?php
	session_start();
	include("../inc/config.php");
	$cid = $_POST['cid'];
	$sql = "SELECT * FROM tb_stamp_party t WHERE t.stamp_party_cid = '".$cid."' OR t.stamp_party_tin = '".$cid."' ORDER BY t.stamp_party_date DESC LIMIT 1";
	$rs = mysql_query($sql,$connection);
	if($row = mysql_fetch_assoc($rs)){
	
	}else{
		$sql = "SELECT CONCAT(t.CONTRACT_TITLE,t.CONTRACT_FNAME,' ',t.CONTRACT_LNAME) AS stamp_party_fullname,t.PIN AS stamp_party_cid,t.TIN AS stamp_party_tin,
		t.CONTRACT_AGE AS stamp_party_age,t.BRANAME AS stamp_party_company,t.BUILD_NAME AS stamp_party_building,t.ROOM_NO AS stamp_party_room_number,t.FLOOR_NO AS stamp_party_floor,
		t.VILLAGE AS stamp_party_village_name,t.ADDNO AS stamp_party_address,t.MOO AS stamp_party_village_moo,t.SOI AS stamp_party_alley,t.THANON AS stamp_party_road,
		s.subdistrict_id AS stamp_party_subdistrict_id,d.district_id AS stamp_party_district_id,p.province_id AS stamp_party_province_id,t.POSTCODE AS stamp_party_postcode,
		t.TELEPHONE AS stamp_party_telephone
		FROM tb_stamp_party_tmp t 
		LEFT JOIN tb_province p ON t.PROVINCE = p.province_name
		LEFT JOIN tb_district d ON t.DISTRICT = d.district_name AND d.province_id = p.province_id
		LEFT JOIN tb_subdistrict s ON t.TAMBON = s.subdistrict_name AND d.district_id = s.district_id
		WHERE t.TIN = '".$cid."' OR t.PIN = '".$cid."'  
		ORDER BY t.CO_DATE DESC
		LIMIT 1";
		$rs = mysql_query($sql,$connection);
		$row = mysql_fetch_assoc($rs);
	}
	echo json_encode($row)
?>