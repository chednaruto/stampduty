<?php
	session_start();
	include("../inc/config.php");
	include('docxtemplate.class.php');

	require('../fpdf/fpdf.php');
	date_default_timezone_set("Asia/Bangkok");
	$docx = new DOCXTemplate('FDVTemplate.docx');
	
	$deliver_transaction_id = $_GET['deliver_transaction_id'];
	$sql = "SELECT * FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."'";
	$rs = mysql_query($sql,$connection);
	$row = mysql_fetch_assoc($rs);
	
	
	$docx->set('DELIVERDATE',EngToThaiNumber(thai_date($row['deliver_date'])));
	$docx->set('TIME',EngToThaiNumber(str_replace(":",".",$row['deliver_time'])));
	
	if($row['stamp_status']=='Y'){
		$docx->set('S',"✓");
	}else{
		$docx->set('S',"");
	}
	if($row['key_status']=='Y'){
		$docx->set('K',"✓");
	}else{
		$docx->set('K',"");
	}
	$docx->set('S1BATH',EngToThaiNumber(number_format($row['stamp_one_bath'])));
	$docx->set('A1BATH',EngToThaiNumber(number_format($row['stamp_one_bath'],2)));
	
	$docx->set('S5BATH',EngToThaiNumber(number_format($row['stamp_five_bath'])));
	$docx->set('A5BATH',EngToThaiNumber(number_format($row['stamp_five_bath']*5,2)));
	
	$docx->set('S20BATH',EngToThaiNumber(number_format($row['stamp_twenty_bath'])));
	$docx->set('A20BATH',EngToThaiNumber(number_format($row['stamp_twenty_bath']*20,2)));
	
	$docx->set('STBATH',EngToThaiNumber(number_format($row['stamp_one_bath']+$row['stamp_five_bath']+$row['stamp_twenty_bath'])));
	$docx->set('ATBATH',EngToThaiNumber(number_format($row['stamp_one_bath']+$row['stamp_five_bath']*5+$row['stamp_twenty_bath']*20,2)));
	
	if($row["deliver_id1"]!=""){
		$sqldl = "SELECT tb.id,tb.fullname,tb.position_m 
		FROM ( 
			SELECT * FROM tb_withdraw_document t 
			WHERE t.withdraw_document_status = 'Y' 
			AND t.officeid = '".$_SESSION['OFFICEID']."' 
			ORDER BY t.withdraw_document_date DESC 
			LIMIT 1
		) as b 
		LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id 
		LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id 
		WHERE tb.id IN(SELECT d.deliver_id1 FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."');";
		$rsdl = mysql_query($sqldl,$connection);
		$rowdl = mysql_fetch_assoc($rsdl);
		if($rowdl['fullname']!=""){
			$docx->set('DELIVER1',EngToThaiNumber("๑. ".$rowdl['fullname']));
		}else{
			$sqldl = "SELECT tb.fullname,tb.position_m,tb.id
			FROM (
				SELECT * 
				FROM tb_stock_document t 
				WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
				ORDER BY t.stock_document_date 
				DESC LIMIT 1
			) as b 
			LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
			LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
			WHERE tb.id IN(SELECT d.deliver_id1 FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."');";
			$rsdl = mysql_query($sqldl,$connection);
			$rowdl = mysql_fetch_assoc($rsdl);
			$docx->set('DELIVER1',EngToThaiNumber("๑. ".$rowdl['fullname']));
		}
		
		
	}else{
		$docx->set('DELIVER1',EngToThaiNumber("๑. ........................................................"));
	}
	
	if($row["deliver_id2"]!=""){
		$sqldl = "SELECT tb.id,tb.fullname,tb.position_m 
		FROM ( 
			SELECT * FROM tb_withdraw_document t 
			WHERE t.withdraw_document_status = 'Y' 
			AND t.officeid = '".$_SESSION['OFFICEID']."' 
			ORDER BY t.withdraw_document_date DESC 
			LIMIT 1
		) as b 
		LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id 
		LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id 
		WHERE tb.id IN(SELECT d.deliver_id2 FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."');";
		$rsdl = mysql_query($sqldl,$connection);
		$rowdl = mysql_fetch_assoc($rsdl);
		if($rowdl['fullname']!=""){
			$docx->set('DELIVER2',EngToThaiNumber("๒. ".$rowdl['fullname']));
		}else{
			$sqldl = "SELECT tb.fullname,tb.position_m,tb.id
			FROM (
				SELECT * 
				FROM tb_stock_document t 
				WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
				ORDER BY t.stock_document_date 
				DESC LIMIT 1
			) as b 
			LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
			LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
			WHERE tb.id IN(SELECT d.deliver_id2 FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."');";
			$rsdl = mysql_query($sqldl,$connection);
			$rowdl = mysql_fetch_assoc($rsdl);
			$docx->set('DELIVER2',EngToThaiNumber("๒. ".$rowdl['fullname']));
		}
	}else{
		$docx->set('DELIVER2',EngToThaiNumber("๒. ........................................................"));
	}
	
	if($row["deliver_id3"]!=""){
		$sqldl = "SELECT tb.id,tb.fullname,tb.position_m 
		FROM ( 
			SELECT * FROM tb_withdraw_document t 
			WHERE t.withdraw_document_status = 'Y' 
			AND t.officeid = '".$_SESSION['OFFICEID']."' 
			ORDER BY t.withdraw_document_date DESC 
			LIMIT 1
		) as b 
		LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id 
		LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id 
		WHERE tb.id IN(SELECT d.deliver_id3 FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."');";
		$rsdl = mysql_query($sqldl,$connection);
		$rowdl = mysql_fetch_assoc($rsdl);
		if($rowdl['fullname']!=""){
			$docx->set('DELIVER3',EngToThaiNumber("๓. ".$rowdl['fullname']));
		}else{
			$sqldl = "SELECT tb.fullname,tb.position_m,tb.id
			FROM (
				SELECT * 
				FROM tb_stock_document t 
				WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
				ORDER BY t.stock_document_date 
				DESC LIMIT 1
			) as b 
			LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
			LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
			WHERE tb.id IN(SELECT d.deliver_id3 FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."');";
			$rsdl = mysql_query($sqldl,$connection);
			$rowdl = mysql_fetch_assoc($rsdl);
			$docx->set('DELIVER3',EngToThaiNumber("๓. ".$rowdl['fullname']));
		}
	}else{
		$docx->set('DELIVER3',EngToThaiNumber("๓. ........................................................"));
	}
	
	
	
	if($row["receive_id1"]!=""){
		$sqldl = "SELECT tb.fullname,tb.position_m,tb.id
		FROM (
			SELECT * 
			FROM tb_stock_document t 
			WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
			ORDER BY t.stock_document_date 
			DESC LIMIT 1
		) as b 
		LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
		LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
		WHERE tb.id IN(SELECT d.receive_id1 FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."');";
		$rsdl = mysql_query($sqldl,$connection);
		$rowdl = mysql_fetch_assoc($rsdl);
		$docx->set('RECEIVE1',EngToThaiNumber("๔. ".$rowdl['fullname']));
	}else{
		$docx->set('RECEIVE1',EngToThaiNumber("๔. ............................................................."));
	}
	
	if($row["receive_id2"]!=""){
		$sqldl = "SELECT tb.fullname,tb.position_m,tb.id
		FROM (
			SELECT * 
			FROM tb_stock_document t 
			WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
			ORDER BY t.stock_document_date 
			DESC LIMIT 1
		) as b 
		LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
		LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
		WHERE tb.id IN(SELECT d.receive_id2 FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."');";
		$rsdl = mysql_query($sqldl,$connection);
		$rowdl = mysql_fetch_assoc($rsdl);
		$docx->set('RECEIVE2',EngToThaiNumber("๕. ".$rowdl['fullname']));
	}else{
		$docx->set('RECEIVE2',EngToThaiNumber("๕. ............................................................."));
	}
	
	if($row["receive_id3"]!=""){
		$sqldl = "SELECT tb.fullname,tb.position_m,tb.id
		FROM (
			SELECT * 
			FROM tb_stock_document t 
			WHERE t.stock_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
			ORDER BY t.stock_document_date 
			DESC LIMIT 1
		) as b 
		LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
		LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
		WHERE tb.id IN(SELECT d.receive_id3 FROM tb_deliver_transaction d WHERE d.deliver_transaction_id = '".$deliver_transaction_id."');";
		$rsdl = mysql_query($sqldl,$connection);
		$rowdl = mysql_fetch_assoc($rsdl);
		$docx->set('RECEIVE3',EngToThaiNumber("๖. ".$rowdl['fullname']));
	}else{
		$docx->set('RECEIVE3',EngToThaiNumber("๖. ............................................................."));
	}
	
	$docx->set('MESSAGE',EngToThaiNumber($row['note']));
	
	
	
	$docx->saveAs("Doc/".$deliver_transaction_id.".docx");


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
	header( "location: Doc/".$deliver_transaction_id.".docx");


?>