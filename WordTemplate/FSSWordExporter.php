<?php
	session_start();
	include("../inc/config.php");
	include('docxtemplate.class.php');
	$sell_party_transaction_id = $_GET['sell_party_transaction_id'];
	date_default_timezone_set("Asia/Bangkok");
	$docx = new DOCXTemplate('FSSTemplate.docx');
	
	$sql1 = "SELECT ts.sell_party_transaction_id,ts.officeid,ts.stamp_one_bath,ts.stamp_five_bath,ts.stamp_twenty_bath,ts.sell_datetime,tp.*,p.province_name,
	d.district_name,s.subdistrict_name
	FROM tb_sell_party_transaction ts LEFT JOIN tb_stamp_party tp ON ts.stamp_party_transaction_id = tp.stamp_party_transaction_id 
	LEFT JOIN tb_province p ON tp.stamp_party_province_id = p.province_id
	LEFT JOIN tb_district d ON tp.stamp_party_district_id = d.district_id LEFT JOIN tb_subdistrict s ON tp.stamp_party_subdistrict_id = s.subdistrict_id
	WHERE ts.sell_party_transaction_id = '".$sell_party_transaction_id."'";
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
	
	
	//TIN
	for($i=0;$i<10;$i++){
		$docx->set(''+$i,EngToThaiNumber(substr($row1['stamp_party_tin'], $i, 1)));
	}
	//CID
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
	
	for($i=0;$i<5;$i++){
		$docx->set(''+($i+24),EngToThaiNumber(substr($row1['stamp_party_postcode'], $i, 1)));
	}
	$docx->set("AONE",EngToThaiNumber($row1['stamp_one_bath']));
	$docx->set("AFIVE",EngToThaiNumber($row1['stamp_five_bath']));
	$docx->set("ATWENTY",EngToThaiNumber($row1['stamp_twenty_bath']));
	$docx->set("MONE",EngToThaiNumber(number_format($row1['stamp_one_bath'],2)));
	$docx->set("MFIVE",EngToThaiNumber(number_format($row1['stamp_five_bath']*5,2)));
	$docx->set("MTWENTY",EngToThaiNumber(number_format($row1['stamp_twenty_bath']*20,2)));
	$docx->set("MSUM",EngToThaiNumber(number_format($row1['stamp_one_bath']+$row1['stamp_five_bath']*5+$row1['stamp_twenty_bath']*20,2)));
	if(($row1['stamp_one_bath']+($row1['stamp_five_bath']*5)+($row1['stamp_twenty_bath']*20))>=1000){
		$docx->set("MPERCENT",EngToThaiNumber(number_format(($row1['stamp_one_bath']+$row1['stamp_five_bath']*5+$row1['stamp_twenty_bath']*20)*3/100,2)));
		$docx->set("MTOTAL",EngToThaiNumber(number_format(($row1['stamp_one_bath']+$row1['stamp_five_bath']*5+$row1['stamp_twenty_bath']*20)-(($row1['stamp_one_bath']+$row1['stamp_five_bath']*5+$row1['stamp_twenty_bath']*20)*3/100),2)));
	}else{
		$docx->set("MPERCENT",EngToThaiNumber(number_format(0,2)));
		$docx->set("MTOTAL",EngToThaiNumber(number_format(($row1['stamp_one_bath']+$row1['stamp_five_bath']*5+$row1['stamp_twenty_bath']*20),2)));
	}
	
	$docx->saveAs("Doc/".$sell_party_transaction_id.".docx");

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
	header( "location: Doc/".$sell_party_transaction_id.".docx");


?>