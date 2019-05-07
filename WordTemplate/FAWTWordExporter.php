<?php
session_start();
include("../inc/config.php");
include('docxtemplate.class.php');
include('../Function/ExportWordManager.php');
$exportClass = new DATAINFO();

$allowed_withdraw_transaction_id = $_GET['allowed_withdraw_transaction_id'];
date_default_timezone_set("Asia/Bangkok");
$docx = new DOCXTemplate('FAWTTemplate.docx');
$docx->set('OFFICENAME',$_SESSION['OFFICENAME']);

$sql_al = "SELECT t.allowed_withdraw_date,t1.office_name AS withdraw_officename,t1.office_code as withdraw_officeid,twt.withdraw_document_id,twt.withdraw_document_date,
t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,twt.withdraw_transaction_date,
twt.amount_withdraw_one_bath,twt.amount_withdraw_five_bath,twt.amount_withdraw_twenty_bath,t.signature_id,t.allowed_withdraw_id1,t.allowed_withdraw_id2,t.allowed_withdraw_id3
,twt.officeid,t2.office_name as	 withdraw_officename_old
FROM tb_allowed_withdraw_transaction t 
LEFT JOIN tb_withdraw_transaction twt ON t.withdraw_transaction_id = twt.withdraw_transaction_id
LEFT JOIN tb_office t1 ON t.officeid = t1.office_code
LEFT JOIN tb_office t2 ON twt.officeid = t2.office_code
WHERE t.allowed_withdraw_transaction_id = '".$allowed_withdraw_transaction_id."'";
$rs_al = mysql_query($sql_al,$connection);
$row_al = mysql_fetch_assoc($rs_al);

$docx->set('ALLOWEDDATE',EngToThaiNumber(thai_date($row_al['allowed_withdraw_date'])));
$docx->set('WITHDRAWOFFICE',EngToThaiNumber(str_replace("สำนักงาน","",$row_al['withdraw_officename'])));
$docx->set('WITHDRAWOFFICEOLD',EngToThaiNumber($row_al['withdraw_officename_old']));
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

$docx->set('W1BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['amount_withdraw_one_bath']))));
$docx->set('W5BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['amount_withdraw_five_bath']))));
$docx->set('W20BATH',EngToThaiNumber(EngToThaiNumber(number_format($row_al['amount_withdraw_twenty_bath']))));
$docx->set('WSUM',EngToThaiNumber(EngToThaiNumber(number_format($row_al['amount_withdraw_one_bath']+$row_al['amount_withdraw_five_bath']+$row_al['amount_withdraw_twenty_bath']))));

$yearTarget = GetYearThai($row_al['withdraw_document_date']);

//USE BEFO
$dataU = $exportClass->GetUsage($row_al['officeid'],$row_al['withdraw_transaction_date']);
$docx->set('UB1BATH',EngToThaiNumber(EngToThaiNumber(number_format($dataU['usebefo_1bath']))));
$docx->set('UB5BATH',EngToThaiNumber(EngToThaiNumber(number_format($dataU['usebefo_5bath']))));
$docx->set('UB20BATH',EngToThaiNumber(EngToThaiNumber(number_format($dataU['usebefo_20bath']))));
$docx->set('UBSUM',EngToThaiNumber(EngToThaiNumber(number_format($dataU['usebefo_1bath']+$dataU['usebefo_5bath']+$dataU['usebefo_20bath']))));

$docx->set('SU1BATH',EngToThaiNumber(EngToThaiNumber(number_format($dataU['usesum_1bath']))));
$docx->set('SU5BATH',EngToThaiNumber(EngToThaiNumber(number_format($dataU['usesum_5bath']))));
$docx->set('SU20BATH',EngToThaiNumber(EngToThaiNumber(number_format($dataU['usesum_20bath']))));
$docx->set('SUSUM',EngToThaiNumber(EngToThaiNumber(number_format($dataU['usesum_1bath']+$dataU['usesum_5bath']+$dataU['usesum_20bath']))));


$dataB = $exportClass->GetBalanceDate($row_al['officeid'],$row_al['withdraw_transaction_date']);
$docx->set('BL1BATH',EngToThaiNumber(EngToThaiNumber(number_format($dataB['stamp_one_bath']))));
$docx->set('BL5BATH',EngToThaiNumber(EngToThaiNumber(number_format($dataB['stamp_five_bath']))));
$docx->set('BL20BATH',EngToThaiNumber(EngToThaiNumber(number_format($dataB['stamp_twenty_bath']))));
$docx->set('BLSUM',EngToThaiNumber(EngToThaiNumber(number_format($dataB['stamp_one_bath']+$dataB['stamp_five_bath']+$dataB['stamp_twenty_bath']))));


if($row_al['allowed_withdraw_id1']==""){
	$docx->set('FULLNAME1',"................................................");
	$docx->set('POSITIONM1',"………………………………………………………….");
}else{
	$sql_st = "SELECT tb.fullname,tb.position_m,tb.id
		FROM (
			SELECT * 
			FROM tb_stock_document t 
			WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
			ORDER BY t.stock_document_date 
			DESC LIMIT 1
		) as b 
		LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
		LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
		WHERE tb.id IN('".$row_al['allowed_withdraw_id1']."')";
	
	$rs_st = mysql_query($sql_st,$connection);
	$row_st = mysql_fetch_assoc($rs_st);
	$docx->set('FULLNAME1',EngToThaiNumber($row_st['fullname']));
	$docx->set('POSITIONM1',EngToThaiNumber($row_st['position_m']));
}
if($row_al['allowed_withdraw_id2']==""){
	$docx->set('FULLNAME2',"................................................");
	$docx->set('POSITIONM2',"………………………………………………………….");
}else{
	$sql_st = "SELECT tb.fullname,tb.position_m,tb.id
		FROM (
			SELECT * 
			FROM tb_stock_document t 
			WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
			ORDER BY t.stock_document_date 
			DESC LIMIT 1
		) as b 
		LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
		LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
		WHERE tb.id IN('".$row_al['allowed_withdraw_id2']."')";
	$rs_st = mysql_query($sql_st,$connection);
	$row_st = mysql_fetch_assoc($rs_st);
	$docx->set('FULLNAME2',EngToThaiNumber($row_st['fullname']));
	$docx->set('POSITIONM2',EngToThaiNumber($row_st['position_m']));
}

if($row_al['allowed_withdraw_id3']==""){
	$docx->set('FULLNAME3',"................................................");
	$docx->set('POSITIONM3',"………………………………………………………….");
}else{
	$sql_st = "SELECT tb.fullname,tb.position_m,tb.id
		FROM (
			SELECT * 
			FROM tb_stock_document t 
			WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
			ORDER BY t.stock_document_date 
			DESC LIMIT 1
		) as b 
		LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
		LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
		WHERE tb.id IN('".$row_al['allowed_withdraw_id3']."')";
	$rs_st = mysql_query($sql_st,$connection);
	$row_st = mysql_fetch_assoc($rs_st);
	$docx->set('FULLNAME3',EngToThaiNumber($row_st['fullname']));
	$docx->set('POSITIONM3',EngToThaiNumber($row_st['position_m']));
}


if($row_al['signature_id']==""){
	$docx->set('SIGNATURENAME',EngToThaiNumber("........................................................"));
	$docx->set('SIGNATUREPOSITION',EngToThaiNumber("ตำแหน่ง.............................................................."));
}else{
	$sql_sg = "SELECT * FROM tb_signature_board t where t.id = '".$row_al['signature_id']."' AND officeid = '".$_SESSION['OFFICEID']."'";
	$rs_sg = mysql_query($sql_sg,$connection);
	$row_sg = mysql_fetch_assoc($rs_sg);
	$docx->set('SIGNATURENAME',EngToThaiNumber(" ".$row_sg['fullname']." "));
	$docx->set('SIGNATUREPOSITION',EngToThaiNumber(" ".$row_sg['position_display']." "));
}

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