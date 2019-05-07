<?php
session_start();
include("../inc/config.php");
include('docxtemplate.class.php');
$allowed_withdraw_transaction_id = $_GET['allowed_withdraw_transaction_id'];
date_default_timezone_set("Asia/Bangkok");
$docx = new DOCXTemplate('FRCTemplate.docx');
$docx->set('OFFICENAME',EngToThaiNumber($_SESSION['OFFICENAME']));

$sql_al = "SELECT t.*,t1.office_name AS officename_target,ta.pay_document_date,ta.pay_document_number,t1.office_code
FROM tb_receive_transaction t 
LEFT JOIN tb_allowed_withdraw_transaction ta ON ta.allowed_withdraw_transaction_id = t.allowed_withdraw_transaction_id
LEFT JOIN tb_office t1 ON ta.officeid = t1.office_code
WHERE t.allowed_withdraw_transaction_id = '".$allowed_withdraw_transaction_id."'";
$rs_al = mysql_query($sql_al,$connection);
$row_al = mysql_fetch_assoc($rs_al);

if($row_al['receive_date']=="" || $row_al['receive_date']=="0000-00-00"){
	$docx->set('DOCUMENTDATE',"............  เดือน .............................. พศ................");
}else{
	$docx->set('DOCUMENTDATE',EngToThaiNumber(thai_date($row_al['receive_date'])));
}

if($row_al['receive_document_number']==""){
$docx->set('DOCUMENTNUMBER',"...........................................");
}else{
$docx->set('DOCUMENTNUMBER',EngToThaiNumber($row_al['receive_document_number']));
}

$sqlof = "SELECT * FROM tb_office o WHERE o.office_code LIKE '".$row_al['office_code']."'";
$rsof = mysql_query($sqlof,$connection);
$rowof = mysql_fetch_array($rsof);
if($rowof['office_levle']=='00' || $rowof['office_levle']=='01'){
	$docx->set('OFFICETARGET',EngToThaiNumber('ผู้อำนวยการ'.$row_al['officename_target']));
}else{
	$docx->set('OFFICETARGET',EngToThaiNumber(str_replace("สำนักงาน","",$row_al['officename_target'])));
}

$docx->set('PAYDOCNUMBER',EngToThaiNumber($row_al['pay_document_number']));
$docx->set('PAYDOCDATE',EngToThaiNumber(thai_date($row_al['pay_document_date'])));

$docx->set('PAYOFFICENAME',EngToThaiNumber($row_al['officename_target']));

$docx->set('1BATH',EngToThaiNumber(number_format($row_al['stamp_one_bath'])));
$docx->set('5BATH',EngToThaiNumber(number_format($row_al['stamp_five_bath'])));
$docx->set('20BATH',EngToThaiNumber(number_format($row_al['stamp_twenty_bath'])));
$docx->set('SUM',EngToThaiNumber(number_format($row_al['stamp_one_bath']+$row_al['stamp_five_bath']+$row_al['stamp_twenty_bath'])));


if($row_al['receive_id1']==""){
	$docx->set('FULLNAME1','๑.	...................................................');
	$docx->set('POSITION1','……………………………………………..');
}else{
	$sql_r1 = "SELECT tb.fullname,tb.position_m,tb.id
		FROM (
			SELECT * 
			FROM tb_stock_document t 
			WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
			ORDER BY t.stock_document_date 
			DESC LIMIT 1
		) as b 
		LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
		LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
		WHERE tb.id IN('".$row_al['receive_id1']."')";
	$rs_r1 = mysql_query($sql_r1,$connection);
	$row_r1 = mysql_fetch_assoc($rs_r1);
	$docx->set('FULLNAME1','๑.	'.EngToThaiNumber($row_r1['fullname']));
	$docx->set('POSITION1',EngToThaiNumber($row_r1['position_m']));
}

if($row_al['receive_id2']==""){
	$docx->set('FULLNAME2','๒.	...................................................');
	$docx->set('POSITION2','……………………………………………..');
}else{
	$sql_r2 = "SELECT tb.fullname,tb.position_m,tb.id
		FROM (
			SELECT * 
			FROM tb_stock_document t 
			WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
			ORDER BY t.stock_document_date 
			DESC LIMIT 1
		) as b 
		LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
		LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
		WHERE tb.id IN('".$row_al['receive_id2']."')";
	$rs_r2 = mysql_query($sql_r2,$connection);
	$row_r2 = mysql_fetch_assoc($rs_r2);
	$docx->set('FULLNAME2','๒.	'.EngToThaiNumber($row_r2['fullname']));
	$docx->set('POSITION2',EngToThaiNumber($row_r2['position_m']));
}

if($row_al['receive_id3']==""){
	$docx->set('FULLNAME3','๒.	...................................................');
	$docx->set('POSITION3','……………………………………………..');
}else{
	$sql_r3 = "SELECT tb.fullname,tb.position_m,tb.id
		FROM (
			SELECT * 
			FROM tb_stock_document t 
			WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
			ORDER BY t.stock_document_date 
			DESC LIMIT 1
		) as b 
		LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
		LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
		WHERE tb.id IN('".$row_al['receive_id3']."')";
	$rs_r3 = mysql_query($sql_r3,$connection);
	$row_r3 = mysql_fetch_assoc($rs_r3);
	$docx->set('FULLNAME3','๓.	'.EngToThaiNumber($row_r3['fullname']));
	$docx->set('POSITION3',EngToThaiNumber($row_r3['position_m']));
}

if($row_al['signature_id']==""){
	$docx->set('SIGNATURENAME','........................................................');
	$docx->set('SIGNATUREPOSITION','ตำแหน่ง..............................................................');
}else{
	$sql_si = "SELECT * FROM tb_signature_board t WHERE t.id = '".$row_al['signature_id']."' AND officeid = '".$_SESSION['OFFICEID']."' AND t.status ='Y'";
	$rs_si = mysql_query($sql_si,$connection);
	$row_si = mysql_fetch_assoc($rs_si);
	$docx->set('SIGNATURENAME',EngToThaiNumber(" ".$row_si['fullname']." "));
	$docx->set('SIGNATUREPOSITION',EngToThaiNumber($row_si['position_display']));
}


/*
$docx->set('ALLOWEDDATE',EngToThaiNumber(thai_date($row_al['pay_document_date'])));
$docx->set('WITHDRAWOFFICE',EngToThaiNumber(str_replace("สำนักงาน","",$row_al['withdraw_officename'])));
$docx->set('WITHDRAWNUMBER',EngToThaiNumber($row_al['withdraw_document_id']));
$docx->set('WITHDRAWDATE',EngToThaiNumber(thai_date($row_al['withdraw_document_date'])));
$docx->set('A1BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_one_bath']))));
$docx->set('A5BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_five_bath']))));
$docx->set('A20BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_twenty_bath']))));
$docx->set('ASUM',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_one_bath']+$row_al['allowed_withdraw_five_bath']+$row_al['allowed_withdraw_twenty_bath']))));
$docx->set('M1BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_one_bath'],2))));
$docx->set('M5BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_five_bath']*5,2))));
$docx->set('M20BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_twenty_bath']*20,2))));
$docx->set('MSUM',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_one_bath']+($row_al['allowed_withdraw_five_bath']*5)+($row_al['allowed_withdraw_twenty_bath']*20),2))));

$docx->set('W1BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_one_bath']))));
$docx->set('W5BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_five_bath']))));
$docx->set('W20BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_twenty_bath']))));
$docx->set('WSUM',EngToThaiNumber(EngToThaiNumber(number_format($row_al['allowed_withdraw_one_bath']+$row_al['allowed_withdraw_five_bath']+$row_al['allowed_withdraw_twenty_bath']))));

$yearTarget = GetYearThai($row_al['withdraw_document_date']);

//USE BEFO
$slq_u = "SELECT t.usebefo_1bath,t.usebefo_5bath,t.usebefo_20bath
FROM tb_innit_stock t 
WHERE t.officeid = '".$row_al['withdraw_officeid']."' 
AND t.stock_date BETWEEN '".$yearTarget["BEGINYEAR"]."-10-01' AND '".$row_al['withdraw_document_date']."'";
$rs_u = mysql_query($slq_u,$connection);
$row_u = mysql_fetch_assoc($rs_u);
$docx->set('UB1BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_u['usebefo_1bath']))));
$docx->set('UB5BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_u['usebefo_5bath']))));
$docx->set('UB20BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_u['usebefo_20bath']))));
$docx->set('UBSUM',EngToThaiNumber(EngToThaiNumber(number_format($row_u['usebefo_1bath']+$row_u['usebefo_5bath']+$row_u['usebefo_20bath']))));



//SUM BEFO
$sql_s = "SELECT SUM(t.usesum_1bath) AS usesum_1bath,SUM(t.usesum_5bath) AS usesum_5bath,SUM(t.usesum_20bath) AS usesum_20bath  FROM 
(
	SELECT t.usesum_1bath,t.usesum_5bath,t.usesum_20bath
FROM tb_innit_stock t
WHERE t.officeid = '".$row_al['withdraw_officeid']."'
AND t.stock_date BETWEEN '".$yearTarget["BEGINYEAR"]."-10-01' AND '".$row_al['withdraw_document_date']."'
	UNION ALL
	SELECT tat.allowed_withdraw_one_bath,tat.allowed_withdraw_five_bath,tat.allowed_withdraw_twenty_bath
	FROM tb_withdraw_transaction twt 
	INNER JOIN tb_allowed_withdraw_transaction tat ON twt.withdraw_transaction_id = tat.withdraw_transaction_id
	WHERE twt.withdraw_document_date BETWEEN '".$yearTarget["BEGINYEAR"]."-10-01' AND '".$row_al['withdraw_document_date']."'
	AND twt.officeid = '".$row_al['withdraw_officeid']."' AND tat.allowed_withdraw_transaction_id <> '".$allowed_withdraw_transaction_id."'
) AS t";
$rs_s = mysql_query($sql_s,$connection);
$row_s = mysql_fetch_assoc($rs_s);

$docx->set('SU1BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_s['usesum_1bath']))));
$docx->set('SU5BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_s['usesum_5bath']))));
$docx->set('SU20BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_s['usesum_20bath']))));
$docx->set('SUSUM',EngToThaiNumber(EngToThaiNumber(number_format($row_s['usesum_1bath']+$row_s['usesum_5bath']+$row_s['usesum_20bath']))));

//BALANCE ยังไม่ตัดการจ่าย
$sql_b = "SELECT t.balance_1bath,t.balance_5bath,t.balance_20bath FROM tb_innit_stock t WHERE t.officeid = '".$row_al['withdraw_officeid']."'";
$rs_b = mysql_query($sql_b,$connection);
$row_b = mysql_fetch_assoc($rs_b);

$docx->set('BL1BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_b['balance_1bath']))));
$docx->set('BL5BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_b['balance_5bath']))));
$docx->set('BL20BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_b['balance_20bath']))));
$docx->set('BLSUM',EngToThaiNumber(EngToThaiNumber(number_format($row_b['balance_1bath']+$row_b['balance_5bath']+$row_b['balance_20bath']))));


if($row_al['withdraw_id1']==""){
	$docx->set('FULLNAME1',"................................................");
	$docx->set('POSITIONM1',"………………………………………………………….");
}else{
	$sql_st = "SELECT tb.fullname,tb.position_m,tb.id FROM (
		SELECT * 
		FROM tb_withdraw_document t
		WHERE t.officeid = '".$row_al['withdraw_officeid']."'
		AND t.withdraw_document_status = 'Y'
		ORDER BY withdraw_document_date DESC LIMIT 1
	) AS t 
	LEFT JOIN tb_withdraw_board tb ON tb.withdraw_document_id = t.withdraw_document_id
	LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id
	WHERE tb.id IN('".$row_al['withdraw_id1']."')";
	
	$rs_st = mysql_query($sql_st,$connection);
	$row_st = mysql_fetch_assoc($rs_st);
	$docx->set('FULLNAME1',EngToThaiNumber($row_st['fullname']));
	$docx->set('POSITIONM1',EngToThaiNumber($row_st['position_m']));
}

if($row_al['withdraw_id2']==""){
	$docx->set('FULLNAME2',"................................................");
	$docx->set('POSITIONM2',"………………………………………………………….");
}else{
	$sql_st = "SELECT tb.fullname,tb.position_m,tb.id FROM (
		SELECT * 
		FROM tb_withdraw_document t
		WHERE t.officeid = '".$row_al['withdraw_officeid']."'
		AND t.withdraw_document_status = 'Y'
		ORDER BY withdraw_document_date DESC LIMIT 1
	) AS t 
	LEFT JOIN tb_withdraw_board tb ON tb.withdraw_document_id = t.withdraw_document_id
	LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id
	WHERE tb.id IN('".$row_al['withdraw_id2']."')";
	$rs_st = mysql_query($sql_st,$connection);
	$row_st = mysql_fetch_assoc($rs_st);
	$docx->set('FULLNAME2',EngToThaiNumber($row_st['fullname']));
	$docx->set('POSITIONM2',EngToThaiNumber($row_st['position_m']));
}

if($row_al['withdraw_id3']==""){
	$docx->set('FULLNAME3',"................................................");
	$docx->set('POSITIONM3',"………………………………………………………….");
}else{
	$sql_st = "SELECT tb.fullname,tb.position_m,tb.id FROM (
		SELECT * 
		FROM tb_withdraw_document t
		WHERE t.officeid = '".$row_al['withdraw_officeid']."'
		AND t.withdraw_document_status = 'Y'
		ORDER BY withdraw_document_date DESC LIMIT 1
	) AS t 
	LEFT JOIN tb_withdraw_board tb ON tb.withdraw_document_id = t.withdraw_document_id
	LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id
	WHERE tb.id IN('".$row_al['withdraw_id3']."')";
	$rs_st = mysql_query($sql_st,$connection);
	$row_st = mysql_fetch_assoc($rs_st);
	$docx->set('FULLNAME3',EngToThaiNumber($row_st['fullname']));
	$docx->set('POSITIONM3',EngToThaiNumber($row_st['position_m']));
}


if($row_al['pay_signature_id']==""){
	$docx->set('SIGNATURENAME',EngToThaiNumber("........................................................"));
	$docx->set('SIGNATUREPOSITION',EngToThaiNumber("ตำแหน่ง.............................................................."));
}else{
	$sql_sg = "SELECT * FROM tb_signature_board t where t.id = '".$row_al['pay_signature_id']."' AND officeid = '".$_SESSION['OFFICEID']."'";
	$rs_sg = mysql_query($sql_sg,$connection);
	$row_sg = mysql_fetch_assoc($rs_sg);
	$docx->set('SIGNATURENAME',EngToThaiNumber(" ".$row_sg['fullname']." "));
	$docx->set('SIGNATUREPOSITION',EngToThaiNumber(" ".$row_sg['position_display']." "));
}
*/
$allowed_withdraw_transaction_id="FRC".substr($allowed_withdraw_transaction_id,4,20);
$docx->saveAs("Doc/".$allowed_withdraw_transaction_id.".docx");

function GetYearThai($datetime){
	$ret = array(
		"BEGINYEAR"=>"",
		"ENDYEAR"=>""
	);
	$time = strtotime($datetime);
	$year = date('Y',$time);
	$month = date('m',$time);
	
	if(($month-0)<10){
	
		$ret["BEGINYEAR"] = $year-1;
		$ret["ENDYEAR"] = $year;
	}else{

		$ret["BEGINYEAR"] = $year;
		$ret["ENDYEAR"] = $year+1;
	}
	return $ret;
}
function thai_date($time){
		$thai_month_arr=array(
			"0"=>"",
			"1"=>"มกราคม",
			"2"=>"กุมภาพันธ์",
			"3"=>"มีนาคม",
			"4"=>"เมษายน",
			"5"=>"พฤษภาคม",
			"6"=>"มิถุนายน", 
			"7"=>"กรกฎาคม",
			"8"=>"สิงหาคม",
			"9"=>"กันยายน",
			"10"=>"ตุลาคม",
			"11"=>"พฤศจิกายน",
			"12"=>"ธันวาคม"                 
		);
		$time = strtotime($time);
		$thai_date_return.= ((int)date("d",$time));
		$thai_date_return.=" เดือน ".$thai_month_arr[(int)date("m",$time)];
		$thai_date_return.= " พ.ศ.".(date("Y",$time)+543);
		return $thai_date_return;
	}
function EngToThaiNumber($number){
		$ret = "";		
		
		for($i=0;$i<strlen($number);$i++){
			switch ($number[$i]) {
				case "0":
					$ret.="๐";
					break;
				case "1":
					$ret.="๑";
					break;
				case "2":
					$ret.="๒";
					break;
				case "3":
					$ret.="๓";
					break;
				case "4":
					$ret.="๔";
					break;
				case "5":
					$ret.="๕";
					break;
				case "6":
					$ret.="๖";
					break;
				case "7":
					$ret.="๗";
					break;
				case "8":
					$ret.="๘";
					break;
				case "9":
					$ret.="๙";
					break;
				default:
					$ret.=$number[$i];
			}
		}
		return $ret;
	}
header( "location: Doc/".$allowed_withdraw_transaction_id.".docx" );


?>