<?php
session_start();
include("../inc/config.php");
include('docxtemplate.class.php');
include('../Function/ExportWordManager.php');
$exportClass = new DATAINFO();
$withdraw_transaction_id = $_GET['withdraw_transaction_id'];



date_default_timezone_set("Asia/Bangkok");
$docx = new DOCXTemplate('FWTTemplate.docx');
$docx->set('OFFICENAME',EngToThaiNumber($_SESSION['OFFICENAME']));
$sql1 = "SELECT * FROM tb_withdraw_transaction d WHERE d.withdraw_transaction_id = '".$withdraw_transaction_id."'";
$rs1 = mysql_query($sql1,$connection);
$row1 = mysql_fetch_assoc($rs1);
if(trim($row1['withdraw_document_id'])==""){
	$row1['withdraw_document_id']="...................";	
}else{
	$row1['withdraw_document_id'] = EngToThaiNumber($row1['withdraw_document_id']);
}
$docx->set('DOCUMENTID',$row1['withdraw_document_id']);

if($_SESSION['OFFICELEVEL']=='00' || $_SESSION['OFFICELEVEL']=='02'){
	$docx->set('TOTARGET','ผู้อำนวยการสำนักบริหารการคลังและรายได้');
}else if($_SESSION['OFFICELEVEL']=="03"){
	$sql_of = "SELECT * FROM tb_office t WHERE t.office_code LIKE '".substr($_SESSION["OFFICEID"],0,2)."%' AND t.office_level = '02'";
	$rs_of = mysql_query($sql_of,$connection);
	$row_of = mysql_fetch_assoc($rs_of);
	$target = EngToThaiNumber(str_replace("สำนักงาน","",$row_of['office_name']));
	$docx->set('TOTARGET',$target);
}else if($_SESSION['OFFICELEVEL']=="04"){
	$sql_of = "SELECT * FROM tb_office t WHERE t.office_code LIKE '".substr($_SESSION["OFFICEID"],0,5)."%' AND t.office_level = '03'";
	$rs_of = mysql_query($sql_of,$connection);
	$row_of = mysql_fetch_assoc($rs_of);
	$target = EngToThaiNumber(str_replace("สำนักงาน","",$row_of['office_name']));
	$docx->set('TOTARGET',$target);
}
if($row1['withdraw_document_date']=="0000-00-00" || $row1['withdraw_document_date']==""){
	$row1['withdraw_document_date']="............................................................";	
}else{
	$row1['withdraw_document_date']= EngToThaiNumber(thai_date($row1['withdraw_document_date']))."";
}
$docx->set('DOCUMENTDATE',$row1['withdraw_document_date']);

$sql_money = "SELECT * FROM tb_office t WHERE t.office_code LIKE '".$_SESSION['OFFICEID']."'";
$rs_money = mysql_query($sql_money,$connection);
$row_money = mysql_fetch_assoc($rs_money);
$docx->set('OFFICELIMITMONEY',EngToThaiNumber(number_format($row_money['office_limit_money'],2)));

$sql_tt = "SELECT * FROM tb_withdraw_transaction t WHERE t.withdraw_transaction_id = '".$withdraw_transaction_id."'";
$rs_tt = mysql_query($sql_tt,$connection);
$row_tt = mysql_fetch_assoc($rs_tt);
$docx->set('ONEBATH',EngToThaiNumber(number_format($row_tt['amount_withdraw_one_bath'])));
$docx->set('ONEBATHMONEY',EngToThaiNumber(number_format($row_tt['amount_withdraw_one_bath'],2)));
$docx->set('FIVEBATH',EngToThaiNumber(number_format($row_tt['amount_withdraw_five_bath'])));
$docx->set('FIVEBATHMONEY',EngToThaiNumber(number_format($row_tt['amount_withdraw_five_bath']*5,2)));
$docx->set('TWBATH',EngToThaiNumber(number_format($row_tt['amount_withdraw_twenty_bath'])));
$docx->set('TWBATHMONEY',EngToThaiNumber(number_format($row_tt['amount_withdraw_twenty_bath']*20,2)));
$docx->set('SUMBATH',EngToThaiNumber(number_format($row_tt['amount_withdraw_one_bath']+$row_tt['amount_withdraw_five_bath']+$row_tt['amount_withdraw_twenty_bath'])));
$docx->set('SUMMONEY',EngToThaiNumber(number_format($row_tt['amount_withdraw_one_bath']+($row_tt['amount_withdraw_five_bath']*5)+($row_tt['amount_withdraw_twenty_bath']*20),2)));

// USE BEFO
$dataU = $exportClass->GetUsage($_SESSION['OFFICEID'],$row1['withdraw_transaction_date']);
$docx->set('USEBEFO1',EngToThaiNumber(number_format($dataU['usebefo_1bath'])));
$docx->set('USEBEFO5',EngToThaiNumber(number_format($dataU['usebefo_5bath'])));
$docx->set('USEBEFO20',EngToThaiNumber(number_format($dataU['usebefo_20bath'])));
$docx->set('SUMUSEBEFO',EngToThaiNumber(number_format($dataU['usebefo_1bath']+$dataU['usebefo_5bath']+$dataU['usebefo_20bath'])));

$docx->set('USESUM1',EngToThaiNumber(number_format($dataU['usesum_1bath'])));
$docx->set('USESUM5',EngToThaiNumber(number_format($dataU['usesum_5bath'])));
$docx->set('USESUM20',EngToThaiNumber(number_format($dataU['usesum_20bath'])));
$docx->set('SUMUSESUM',EngToThaiNumber(number_format($dataU['usesum_1bath']+$dataU['usesum_5bath']+$dataU['usesum_20bath'])));
$dataB = $exportClass->GetBalanceDate($_SESSION['OFFICEID'],$row1['withdraw_transaction_date']);
$docx->set('BALANCE1',EngToThaiNumber(number_format($dataB['stamp_one_bath'])));
$docx->set('BALANCE5',EngToThaiNumber(number_format($dataB['stamp_five_bath'])));
$docx->set('BALANCE20',EngToThaiNumber(number_format($dataB['stamp_twenty_bath'])));
$docx->set('SUMBALANCE',EngToThaiNumber(number_format($dataB['stamp_one_bath']+$dataB['stamp_five_bath']+$dataB['stamp_twenty_bath'])));

// Withdraw Name
$sqlwd = "SELECT tb.id,tb.fullname,tb.position_m FROM ( SELECT * FROM tb_withdraw_document t WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."' ORDER BY t.withdraw_document_date DESC LIMIT 1 ) as b LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id WHERE tb.id IN(SELECT twt.withdraw_id1 FROM tb_withdraw_transaction twt WHERE twt.withdraw_transaction_id = '".$withdraw_transaction_id."')";
$rswd = mysql_query($sqlwd,$connection);
$rowwd = mysql_fetch_assoc($rswd);
if($rowwd['fullname']==""){
	$docx->set('WDNAME1',EngToThaiNumber("………………………………………………"));
	$docx->set('POSITION_M1',EngToThaiNumber("………………………………………………………"));
}else{
	$docx->set('WDNAME1',EngToThaiNumber($rowwd['fullname']));
	$docx->set('POSITION_M1',EngToThaiNumber($rowwd['position_m']));
}

$sqlwd = "SELECT tb.id,tb.fullname,tb.position_m FROM ( SELECT * FROM tb_withdraw_document t WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."' ORDER BY t.withdraw_document_date DESC LIMIT 1 ) as b LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id WHERE tb.id IN(SELECT twt.withdraw_id2 FROM tb_withdraw_transaction twt WHERE twt.withdraw_transaction_id = '".$withdraw_transaction_id."')";
$rswd = mysql_query($sqlwd,$connection);
$rowwd = mysql_fetch_assoc($rswd);
if($rowwd['fullname']==""){
	$docx->set('WDNAME2',EngToThaiNumber("………………………………………………"));
	$docx->set('POSITION_M2',EngToThaiNumber("………………………………………………………"));
}else{
	$docx->set('WDNAME2',EngToThaiNumber($rowwd['fullname']));
	$docx->set('POSITION_M2',EngToThaiNumber($rowwd['position_m']));
}

$sqlwd = "SELECT tb.id,tb.fullname,tb.position_m FROM ( SELECT * FROM tb_withdraw_document t WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."' ORDER BY t.withdraw_document_date DESC LIMIT 1 ) as b LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id WHERE tb.id IN(SELECT twt.withdraw_id3 FROM tb_withdraw_transaction twt WHERE twt.withdraw_transaction_id = '".$withdraw_transaction_id."')";
$rswd = mysql_query($sqlwd,$connection);
$rowwd = mysql_fetch_assoc($rswd);
if($rowwd['fullname']==""){
	$docx->set('WDNAME3',EngToThaiNumber("………………………………………………"));
	$docx->set('POSITION_M3',EngToThaiNumber("………………………………………………………"));
}else{
	$docx->set('WDNAME3',EngToThaiNumber($rowwd['fullname']));
	$docx->set('POSITION_M3',EngToThaiNumber($rowwd['position_m']));
}





// SIGNATURE
$sql_sg = "SELECT t.* FROM tb_signature_board t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.id IN(
SELECT t.signature_id FROM tb_withdraw_transaction t WHERE t.withdraw_transaction_id = '".$withdraw_transaction_id."')";
$rs_sg = mysql_query($sql_sg,$connection);
$row_sg = mysql_fetch_assoc($rs_sg);
if($row_sg['fullname']==""){
	$docx->set('SIGNATURENAME',EngToThaiNumber('........................................................'));
	$docx->set('SIGNATUREPOSITION',EngToThaiNumber('ตำแหน่ง..................................................'));
}else{
	$docx->set('SIGNATURENAME',EngToThaiNumber(" ".$row_sg['fullname']." "));
	$docx->set('SIGNATUREPOSITION',EngToThaiNumber($row_sg['position_display']));
}


$docx->saveAs("Doc/".$withdraw_transaction_id.".docx");

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
header("location: Doc/".$withdraw_transaction_id.".docx" );


?>