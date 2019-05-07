<?php
session_start();
include("../inc/config.php");
include('docxtemplate.class.php');
$withdraw_document_id = $_GET['withdraw_document_id'];
date_default_timezone_set("Asia/Bangkok");
$docx = new DOCXTemplate('FWDTemplate.docx');
$docx->set('OFFICENAME', EngToThaiNumber($_SESSION['OFFICENAME']));
$sql1 = "SELECT * FROM tb_withdraw_document d WHERE d.withdraw_document_id = '".$withdraw_document_id."'";
$rs1 = mysql_query($sql1,$connection);
$row1 = mysql_fetch_assoc($rs1);
if(trim($row1['withdraw_document_number'])==""){
	$row1['withdraw_document_number']="...................";	
}else{
	$row1['withdraw_document_number'] = EngToThaiNumber($row1['withdraw_document_number']);
}
$docx->set('DOCUMENTNUMBER',$row1['withdraw_document_number']);

if(trim($row1['signature_id'])==""){
	$docx->set('SIGNATURENAME','................................................');
	$docx->set('SIGNATUEPOSITOIN','ตำแหน่ง.............................................................');
	$docx->set('SIGNATUREDISPLAY','');
}else{
	$sql_sn = "SELECT * FROM tb_signature_board t WHERE t.id='".$row1['signature_id']."' AND t.officeid='".$_SESSION['OFFICEID']."'";
	$rs_sn = mysql_query($sql_sn,$connection);
	$row_sn = mysql_fetch_assoc($rs_sn);
	$row_sn['fullname'] = EngToThaiNumber($row_sn['fullname']);
	$row_sn['position_m'] = EngToThaiNumber($row_sn['position_m']);
	$row_sn['position_display'] = EngToThaiNumber($row_sn['position_display']);
	$docx->set('SIGNATURENAME',$row_sn['fullname']);
	if($row_sn['position_display'] == $row_sn['position_m']){
		$docx->set('SIGNATUEPOSITOIN',EngToThaiNumber($row_sn['position_display']));
		$docx->set('SIGNATUREDISPLAY','');
	}else{
		$docx->set('SIGNATUEPOSITOIN',EngToThaiNumber($row_sn['position_m']));
		$docx->set('SIGNATUREDISPLAY',EngToThaiNumber($row_sn['position_display']));
	}
	
}


if($row1['withdraw_document_old_number']==""){
	$row1['withdraw_document_old_number']="............................................................";	
}else{
	$row1['withdraw_document_old_number']= EngToThaiNumber($row1['withdraw_document_old_number'])."";
}
$docx->set('DOCOLDNUMBER',$row1['withdraw_document_old_number']);
if($row1['withdraw_document_old_date']=="0000-00-00" || $row1['withdraw_document_old_date']==""){
	$row1['withdraw_document_old_date']="............................................................";	
}else{
	$row1['withdraw_document_old_date']= EngToThaiNumber(thai_date($row1['withdraw_document_old_date']))."";
}
$docx->set('DOCOLDDATE',$row1['withdraw_document_old_date']);


$sql2 = "SELECT * FROM tb_withdraw_board t WHERE t.withdraw_document_id = '".$withdraw_document_id."' AND withdraw_board_type_id = 1 LIMIT 3";
$rs2 = mysql_query($sql2,$connection);
$i = 1;
while($row2 = mysql_fetch_array($rs2)){
	$docx->set('FULLNAME_POSTION'.$i,$row2['fullname'].'		ตำแหน่ง 	'.$row2['position_m']);
	$i++;
}
if($row1['withdraw_document_date']=="0000-00-00" || $row1['withdraw_document_date']==""){
	$row1['withdraw_document_date']="............................................................";	
}else{
	$row1['withdraw_document_date'] = EngToThaiNumber(thai_date($row1['withdraw_document_date']))."";
}
$docx->set('DOCUMENTDATE',$row1['withdraw_document_date']);

$sql3 = "SELECT * FROM tb_withdraw_board t WHERE t.withdraw_document_id = '".$withdraw_document_id."' AND withdraw_board_type_id = 2 LIMIT 11";
$rs3 = mysql_query($sql3,$connection);
$i=4;
while($row3 = mysql_fetch_array($rs3)){
	$docx->set('FULLNAME'.$i,$row3['fullname']);
	$docx->set('POSITION_M'.$i,$row3['position_m']);
	$i++;
}
while($i<=14){
	$docx->set('FULLNAME'.$i,"");
	$docx->set('POSITION_M'.$i,"");
	$i++;
};


$docx->saveAs("Doc/".$withdraw_document_id.".docx");
/*header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename='".$file.".docx'");
header("Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Expires: 0");
$docx->saveAs("php://output");*/
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
header( "location: Doc/".$withdraw_document_id.".docx" );


?>