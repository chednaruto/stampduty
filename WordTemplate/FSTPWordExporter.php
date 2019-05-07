<?php
	session_start();
	include("../inc/config.php");
	include('docxtemplate.class.php');
	$stamp_party_transaction_id = $_GET['stamp_party_transaction_id'];
	date_default_timezone_set("Asia/Bangkok");
	$docx = new DOCXTemplate('FSTPTemplate.docx');
	
	$docx->set("OFFICENAME",EngToThaiNumber($_SESSION['OFFICENAME']));
	$sql1 = "SELECT t.*,p.province_name,d.district_name,sd.subdistrict_name FROM tb_stamp_party t 
	LEFT JOIN tb_province p ON t.stamp_party_province_id = p.province_id 
	LEFT JOIN tb_district d ON t.stamp_party_district_id = d.district_id 
	LEFT JOIN tb_subdistrict sd ON t.stamp_party_subdistrict_id = sd.subdistrict_id 
	WHERE t.stamp_party_transaction_id LIKE '".$stamp_party_transaction_id."'";
	$rs1 = mysql_query($sql1,$connection);
	$row1 = mysql_fetch_assoc($rs1);
	$document_number = explode("/", $row1['stamp_party_number']);
	if(count($document_number)==2){
		$id = stringToArray($document_number[0]);
		$rep = 0;
		for($i=30;$i<=33;$i++){
			$docx->set($i,EngToThaiNumber($id[$rep]));
			$rep++;
		}
		$id = stringToArray($document_number[1]);
		$rep = 0;
		for($i=37;$i>=34;$i--){
			$docx->set($i,EngToThaiNumber($id[$rep]));
			$rep++;
		}
		/*for($i=0;$i<$document_number[0] && $i<4;$i++)	{
			$docx->set(''+($i+30),EngToThaiNumber(substr($document_number[0], count($document_number[0])-$i, 1)));
		}*/
		for($i=0;$i<$document_number[0] && $i<4;$i++)	{
			$docx->set(''+($i+34),EngToThaiNumber(substr($document_number[1], $i, 1)));
		}
	}else{
		
	}
	for($i=0;$i<10;$i++){
		$docx->set(''+$i,EngToThaiNumber(substr($row1['stamp_party_tin'], $i, 1)));
	}
	
	for($i=0;$i<13;$i++){
		$docx->set(''+($i+11),EngToThaiNumber(substr($row1['stamp_party_cid'], $i, 1)));
	}
	if($_SESSION['OFFICELEVEL']=="00"){
		$docx->set("00","✓".$_SESSION['OFFICELEVEL']);
		$docx->set("02","");
		$docx->set("03","");
		$docx->set("04","");
		
		$docx->set("N2","");
		$docx->set("N3","");
		$docx->set("N4","");
	}else if($_SESSION['OFFICELEVEL']=="02"){
		$docx->set("00","");
		$docx->set("02","✓");
		$docx->set("03","");
		$docx->set("04","");
		
		$docx->set("N2",EngToThaiNumber(str_replace("สำนักงานสรรพากรภาค","",$_SESSION['OFFICENAME'])));
		$docx->set("N3","");
		$docx->set("N4","");
	}else if($_SESSION['OFFICELEVEL']=="03"){
		$docx->set("00","");
		$docx->set("02","");
		$docx->set("03","✓");
		$docx->set("04","");
		
		$docx->set("N2","");
		$docx->set("N3",EngToThaiNumber(str_replace("สำนักงานสรรพากรพื้นที่","",$_SESSION['OFFICENAME'])));
		$docx->set("N4","");
	}else if($_SESSION['OFFICELEVEL']=="04"){
		$docx->set("00","");
		$docx->set("02","");
		$docx->set("03","");
		$docx->set("04","✓");
		
		$docx->set("N2","");
		$docx->set("N3","");
		$docx->set("N4",EngToThaiNumber(str_replace("สำนักงานสรรพากรพื้นที่สาขา","",$_SESSION['OFFICENAME'])));
	}

	$sqlpv = "SELECT DISTINCT tp.province_id,tp.province_name FROM tb_office_area ta LEFT JOIN tb_subdistrict ts ON ta.moi_id = ts.subdistrict_id
	LEFT JOIN tb_district td ON ts.district_id = td.district_id LEFT JOIN tb_province tp ON td.province_id = tp.province_id 
	WHERE ta.officeid = '".$_SESSION['OFFICEID']."' AND tp.province_id IS NOT NULL";
	$rspv = mysql_query($sqlpv,$connection);
	$rowpv = mysql_fetch_assoc($rspv);
	$docx->set("PV",EngToThaiNumber($rowpv['province_name']));
	
	$date1 = strtotime($row1['stamp_party_date']);
	$docx->set("D1",EngToThaiNumber(date("d",$date1)));
	$thai_month_arr=array("0"=>"","1"=>"มกราคม","2"=>"กุมภาพันธ์","3"=>"มีนาคม","4"=>"เมษายน","5"=>"พฤษภาคม","6"=>"มิถุนายน", "7"=>"กรกฎาคม","8"=>"สิงหาคม","9"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$docx->set("M1",EngToThaiNumber($thai_month_arr[(int)date("m",$date1)]));
	$y1 = (string)date("Y",$date1)+543;
	$docx->set("Y1",EngToThaiNumber((string)$y1));
	$docx->set("FULLNAME",EngToThaiNumber($row1['stamp_party_fullname']));
	$docx->set("AGE",EngToThaiNumber($row1['stamp_party_age']));
	$docx->set("COMPANY",EngToThaiNumber($row1['stamp_party_company']));
	
	$docx->set("BUILDING",EngToThaiNumber($row1['stamp_party_building']));
	$docx->set("ROOM",EngToThaiNumber($row1['stamp_party_room_number']));
	$docx->set("FL",EngToThaiNumber($row1['stamp_party_floor']));
	$docx->set("VILLAGE",EngToThaiNumber($row1['stamp_party_village_name']));
	$docx->set("ADDRESS",EngToThaiNumber($row1['stamp_party_address']));
	$docx->set("MOO",EngToThaiNumber($row1['stamp_party_village_moo']));
	$docx->set("ALLEY",EngToThaiNumber($row1['stamp_party_alley']));
	$docx->set("ROAD",EngToThaiNumber($row1['stamp_party_road']));
	$docx->set("SUBDISTRICT",EngToThaiNumber($row1['subdistrict_name']));
	$docx->set("DISTRICT",EngToThaiNumber($row1['district_name']));
	$docx->set("PROVINCE",EngToThaiNumber($row1['province_name']));
	$docx->set("TELEPHONE",EngToThaiNumber($row1['stamp_party_telephone']));
	$docx->set("WITNESS1",EngToThaiNumber($row1['stamp_party_witness1']));
	$docx->set("WITNESS2",EngToThaiNumber($row1['stamp_party_witness2']));
	for($i=0;$i<5;$i++){
		$docx->set(''+($i+24),EngToThaiNumber(substr($row1['stamp_party_postcode'], $i, 1)));
	}
	if($row1['stamp_party_status']=='Y'){
		$docx->set('Y',"✓");
		$docx->set('N',"");
		$docx->set('SPR',$row1['stamp_party_reason']);
	}else if($row1['stamp_party_status']=='N'){
		$docx->set('Y',"");
		$docx->set('N',"✓");
		$docx->set('SPR',$row1['stamp_party_reason']);
	}else{
		$docx->set('Y',"");
		$docx->set('N',"");
		$docx->set('SPR',$row1['stamp_party_reason']);
	}
	$sqlsn = "SELECT * FROM tb_signature_board ts WHERE ts.id = '".$row1['signature_id']."'";
	$rssn = mysql_query($sqlsn,$connection);
	$rowsn = mysql_fetch_assoc($rssn);
	$docx->set("FULLNAMESI",EngToThaiNumber($rowsn['fullname']));
	$docx->saveAs("Doc/".str_replace("FSP","FSTP",$stamp_party_transaction_id).".docx");

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
	function stringToArray($s)
	{
		$r = array();
		for($i=0; $i<strlen($s); $i++) 
			 $r[$i] = $s[(strlen($s)-($i+1))];
		return $r;
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
	header( "location: Doc/".str_replace("FSP","FSTP",$stamp_party_transaction_id).".docx");


?>