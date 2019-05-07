<?php
	session_start();
	include("../inc/config.php");
	include('docxtemplate.class.php');
	$perpage = 16;
	$sell_minor_transaction_id = $_GET['sell_minor_transaction_id'];
	date_default_timezone_set("Asia/Bangkok");
	$sql_p = "SELECT COUNT(*) as cc FROM tb_sell_minor_sub_transaction t WHERE t.sell_minor_transaction_id = '".$sell_minor_transaction_id."' 
	AND (t.stamp_one_bath+stamp_five_bath+t.stamp_twenty_bath)>0";
	$rs_p = mysql_query($sql_p,$connection);
	$row_p = mysql_fetch_assoc($rs_p);

	
	if( ceil($row_p['cc']/$perpage) > 1 ){
		$docx = new DOCXTemplate('FSMTemplate'.ceil($row_p['cc']/16).'.docx');
		$sql_sac = "SELECT * FROM tb_sell_minor_sub_transaction t WHERE t.sell_minor_transaction_id = '".$sell_minor_transaction_id."'";
		$rs_sac = mysql_query($sql_sac,$connection);
		$i = 1;
		$page = array();
		$pageIndex = 1;
		while($row_sac = mysql_fetch_assoc($rs_sac)){
			$ta1 += (int)$row_sac['stamp_one_bath'];
			$ta5 += (int)$row_sac['stamp_five_bath'];
			$ta20 += (int)$row_sac['stamp_twenty_bath'];
			
			
			$stamp1 += (int)$row_sac['stamp_one_bath'];
			$stamp5 += (int)$row_sac['stamp_five_bath'];
			$stamp20 += (int)$row_sac['stamp_twenty_bath'];
			$docx->set($i."A1",EngToThaiNumber(number_format($row_sac['stamp_one_bath'])));
			$docx->set($i."M1",EngToThaiNumber(number_format($row_sac['stamp_one_bath'],2)));
			$docx->set($i."A5",EngToThaiNumber(number_format($row_sac['stamp_five_bath'])));
			$docx->set($i."M5",EngToThaiNumber(number_format($row_sac['stamp_five_bath']*5,2)));
			$docx->set($i."A20",EngToThaiNumber(number_format($row_sac['stamp_twenty_bath'])));
			$docx->set($i."M20",EngToThaiNumber(number_format($row_sac['stamp_twenty_bath']*20,2)));
			$docx->set($i."AT",EngToThaiNumber(number_format($row_sac['stamp_one_bath']+$row_sac['stamp_five_bath']+$row_sac['stamp_twenty_bath'])));
			$docx->set($i."MT",EngToThaiNumber(number_format($row_sac['stamp_one_bath']+($row_sac['stamp_five_bath']*5)+($row_sac['stamp_twenty_bath']*20),2)));
			if($i%$perpage == 0 ){
				$docx->set($pageIndex."TA1",EngToThaiNumber(number_format($stamp1)));
				$docx->set($pageIndex."TA5",EngToThaiNumber(number_format($stamp5)));
				$docx->set($pageIndex."TA20",EngToThaiNumber(number_format($stamp20)));
				$docx->set($pageIndex."TAT",EngToThaiNumber(number_format($stamp1+$stamp5+$stamp20)));
				$docx->set($pageIndex."TM1",EngToThaiNumber(number_format($stamp1,2)));
				$docx->set($pageIndex."TM5",EngToThaiNumber(number_format($stamp5*5,2)));
				$docx->set($pageIndex."TM20",EngToThaiNumber(number_format($stamp20*20,2)));
				$docx->set($pageIndex."TMT",EngToThaiNumber(number_format($stamp1+$stamp5*5+$stamp20*20,2)));
				
				$docx->set("P".$pageIndex."A1",EngToThaiNumber(number_format($stamp1)));
				$docx->set("P".$pageIndex."A5",EngToThaiNumber(number_format($stamp5)));
				$docx->set("P".$pageIndex."A20",EngToThaiNumber(number_format($stamp20)));
				$docx->set("P".$pageIndex."AT",EngToThaiNumber(number_format($stamp1+$stamp5+$stamp20)));
				$docx->set("P".$pageIndex."M1",EngToThaiNumber(number_format($stamp1,2)));
				$docx->set("P".$pageIndex."M5",EngToThaiNumber(number_format($stamp5*5,2)));
				$docx->set("P".$pageIndex."M20",EngToThaiNumber(number_format($stamp20*20,2)));
				$docx->set("P".$pageIndex."MT",EngToThaiNumber(number_format($stamp1+$stamp5*5+$stamp20*20,2)));
				$stamp1 = 0;
				$stamp5 = 0;
				$stamp20 = 0;
				$pageIndex ++;
			
			}
			$i++;
		}
		for(;$i<=($perpage*ceil($row_p['cc']));$i++){
			$docx->set($i."A1","");
			$docx->set($i."M1","");
			$docx->set($i."A5","");
			$docx->set($i."M5","");
			$docx->set($i."A20","");
			$docx->set($i."M20","");
			$docx->set($i."AT","");
			$docx->set($i."MT","");
		}
		$docx->set($pageIndex."TA1",EngToThaiNumber(number_format($stamp1)));
		$docx->set($pageIndex."TA5",EngToThaiNumber(number_format($stamp5)));
		$docx->set($pageIndex."TA20",EngToThaiNumber(number_format($stamp20)));
		$docx->set($pageIndex."TAT",EngToThaiNumber(number_format($stamp1+$stamp5+$stamp20)));
		$docx->set($pageIndex."TM1",EngToThaiNumber(number_format($stamp1,2)));
		$docx->set($pageIndex."TM5",EngToThaiNumber(number_format($stamp5*5,2)));
		$docx->set($pageIndex."TM20",EngToThaiNumber(number_format($stamp20*20,2)));
		$docx->set($pageIndex."TMT",EngToThaiNumber(number_format($stamp1+$stamp5*5+$stamp20*20,2)));
		
		$docx->set("P".$pageIndex."A1",EngToThaiNumber(number_format($stamp1)));
		$docx->set("P".$pageIndex."A5",EngToThaiNumber(number_format($stamp5)));
		$docx->set("P".$pageIndex."A20",EngToThaiNumber(number_format($stamp20)));
		$docx->set("P".$pageIndex."AT",EngToThaiNumber(number_format($stamp1+$stamp5+$stamp20)));
		$docx->set("P".$pageIndex."M1",EngToThaiNumber(number_format($stamp1,2)));
		$docx->set("P".$pageIndex."M5",EngToThaiNumber(number_format($stamp5*5,2)));
		$docx->set("P".$pageIndex."M20",EngToThaiNumber(number_format($stamp20*20,2)));
		$docx->set("P".$pageIndex."MT",EngToThaiNumber(number_format($stamp1+$stamp5*5+$stamp20*20,2)));
		
		
		
		$docx->set("PTA1",EngToThaiNumber(number_format($ta1)));
		$docx->set("PTA5",EngToThaiNumber(number_format($ta5)));
		$docx->set("PTA20",EngToThaiNumber(number_format($ta20)));
		$docx->set("PTAT",EngToThaiNumber(number_format($ta1+$ta5+$ta20)));
		$docx->set("PTM1",EngToThaiNumber(number_format($ta1,2)));
		$docx->set("PTM5",EngToThaiNumber(number_format($ta5*5,2)));
		$docx->set("PTM20",EngToThaiNumber(number_format($ta20*20,2)));
		$docx->set("PTMT",EngToThaiNumber(number_format($ta1+$ta5*5+$ta20*20,2)));
	}else{
		$docx = new DOCXTemplate('FSMTemplate.docx');
		$sql_sac = "SELECT * FROM tb_sell_minor_sub_transaction t WHERE t.sell_minor_transaction_id = '".$sell_minor_transaction_id."'";
		$rs_sac = mysql_query($sql_sac,$connection);
		$i = 1;
		while($row_sac = mysql_fetch_assoc($rs_sac)){
			$stamp_one_bath_total +=($row_sac['stamp_one_bath']-0);
			$stamp_five_bath_total +=($row_sac['stamp_five_bath']-0);
			$stamp_twenty_bath_total +=($row_sac['stamp_twenty_bath']-0);
			
			$docx->set($i."A1",EngToThaiNumber(number_format($row_sac['stamp_one_bath'])));
			$docx->set($i."M1",EngToThaiNumber(number_format($row_sac['stamp_one_bath'],2)));
			$docx->set($i."A5",EngToThaiNumber(number_format($row_sac['stamp_five_bath'])));
			$docx->set($i."M5",EngToThaiNumber(number_format($row_sac['stamp_five_bath']*5,2)));
			$docx->set($i."A20",EngToThaiNumber(number_format($row_sac['stamp_twenty_bath'])));
			$docx->set($i."M20",EngToThaiNumber(number_format($row_sac['stamp_twenty_bath']*20,2)));
			$docx->set($i."AT",EngToThaiNumber(number_format($row_sac['stamp_one_bath']+$row_sac['stamp_five_bath']+$row_sac['stamp_twenty_bath'])));
			$docx->set($i."MT",EngToThaiNumber(number_format($row_sac['stamp_one_bath']+($row_sac['stamp_five_bath']*5)+($row_sac['stamp_twenty_bath']*20),2)));
			$i++;
		}
		for(;$i<=16;$i++){
			$docx->set($i."A1","");
			$docx->set($i."M1","");
			$docx->set($i."A5","");
			$docx->set($i."M5","");
			$docx->set($i."A20","");
			$docx->set($i."M20","");
			$docx->set($i."AT","");
			$docx->set($i."MT","");
		}
		$docx->set("TA1",EngToThaiNumber(number_format($stamp_one_bath_total)));
		$docx->set("TA5",EngToThaiNumber(number_format($stamp_five_bath_total)));
		$docx->set("TA20",EngToThaiNumber(number_format($stamp_twenty_bath_total)));
		$docx->set("TAT",EngToThaiNumber(number_format($stamp_twenty_bath_total+$stamp_one_bath_total+$stamp_five_bath_total)));
		$docx->set("TM1",EngToThaiNumber(number_format($stamp_one_bath_total,2)));
		$docx->set("TM5",EngToThaiNumber(number_format($stamp_five_bath_total*5,2)));
		$docx->set("TM20",EngToThaiNumber(number_format($stamp_twenty_bath_total*20,2)));
		$docx->set("TMT",EngToThaiNumber(number_format($stamp_twenty_bath_total*20+$stamp_one_bath_total+$stamp_five_bath_total*5,2)));
	}
	
	$sql1 = "SELECT t.* FROM tb_sell_minor_transaction t WHERE t.sell_minor_transaction_id LIKE '".$sell_minor_transaction_id."'";
	$rs1 = mysql_query($sql1,$connection);
	$row1 = mysql_fetch_assoc($rs1);
	for($i=0;$i<10;$i++){
		$docx->set(''+$i,EngToThaiNumber(substr($row1['sell_minor_tin'], $i, 1)));
	}
	
	for($i=0;$i<13;$i++){
		$docx->set(''+($i+11),EngToThaiNumber(substr($row1['sell_minor_cid'], $i, 1)));
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
	
	$date1 = strtotime($row1['sell_minor_date']);
	$docx->set("D1",EngToThaiNumber(date("d",$date1)));
	$thai_month_arr=array("0"=>"","1"=>"มกราคม","2"=>"กุมภาพันธ์","3"=>"มีนาคม","4"=>"เมษายน","5"=>"พฤษภาคม","6"=>"มิถุนายน", "7"=>"กรกฎาคม","8"=>"สิงหาคม","9"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
	$docx->set("M1",EngToThaiNumber($thai_month_arr[(int)date("m",$date1)]));
	$y1 = (string)date("Y",$date1)+543;
	$docx->set("Y1",EngToThaiNumber((string)$y1));
	
	
	
	
	$docx->saveAs("Doc/".$sell_minor_transaction_id.".docx");
	header( "location: Doc/".$sell_minor_transaction_id.".docx");
	

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
	//header( "location: Doc/".$sell_minor_transaction_id.".docx");


?>