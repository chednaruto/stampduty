<?php
	session_start();
	require('../fpdf/fpdf.php');
	include('../inc/config.php');

	
	$pdf = new FPDF();
	$pdf->AddFont('THB','','THSarabun Bold.php');
	$pdf->AddFont('TH','','THSarabun.php');
	$pdf->SetMargins(20, 10, 15);
	$pdf->AddPage('L','A4',0);
	$pdf->SetFont('THB','',24);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','อ.ส.๐๑.๘'),0,1,"R");
	$pdf->Ln();
	$pdf->Cell(0,15,iconv( 'UTF-8','TIS-620','ใบตอบรับแสตมป์อากร'),0,1,"C");
	$pdf->SetFont('TH','',16);

	
	
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','ที่.....................................'),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620',$row['office_name']),0,1,"R");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620',"สำนัก...................................................................................."),0,1,"R");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','วันที่....................................................'),0,1,"C");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	
	$target = "";
	if($_SESSION['OFFICELEVEL']=='02' || $_SESSION['OFFICELEVEL']=='00'){
		$target = "ผู้อำนวยการกองกบริหารการคลังและรายได้";
	}else if($_SESSION['OFFICELEVEL']=="03"){
		$sql_of = "SELECT * FROM tb_office t WHERE t.office_code LIKE '".substr($_SESSION["OFFICEID"],0,2)."%' AND t.office_level = '02'";
		$rs_of = mysql_query($sql_of,$connection);
		$row_of = mysql_fetch_assoc($rs_of);
		$target = str_replace("สำนักงาน","",$row_of['office_name']);
	}else if($_SESSION['OFFICELEVEL']=="04"){
		$sql_of = "SELECT * FROM tb_office t WHERE t.office_code LIKE '".substr($_SESSION["OFFICEID"],0,5)."%' AND t.office_level = '03'";
		$rs_of = mysql_query($sql_of,$connection);
		$row_of = mysql_fetch_assoc($rs_of);
		$target = str_replace("สำนักงาน","",$row_of['office_name']);
	}
	
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','เรียน     ........................................................................................'),0,1,"L");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','           ตามคำขอเบิกแสตมป์อากรที่...................................... ลงวันที่.......................................................   สำนัก.....................................................................................................'),0,1,"L");
	$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','ได้จ่ายแสตมป์อากรให้แก่คณะกรรมการฯ และเมื่อได้รับไว้ถูกต้องแล้วขอให้ตอบรับให้ทราบด้วย นั้น บัดนี้ คณะกรรมการฯ ดังกล่าวได้ส่งมอบแสตมป์อากรให้แก่สำนักงาน'),0,1,"L");
	$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','สรรพากร......................................................................................ถูกต้องเรียบร้อยแล้ว ตามรายละเอียดต่อไปนี้'),0,1,"L");
	$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	
	$pdf->Cell(15,12,iconv( 'UTF-8','TIS-620','ลำดับที่'),'LTB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','รายการแสตมป์อากร'),'LT',0,'C');
	$pdf->Cell(40,12,iconv( 'UTF-8','TIS-620','จำนวน (ดวง)'),1,0,'C');
	$pdf->Cell(165,12,iconv( 'UTF-8','TIS-620','คณะกรรมการผู้รับแสตมป์อากร และส่งมอบแสตมป์อากรที่ขอเบิกให้แก่หน่วยงานแล้ว ประกอบด้วย*'),1,0,'C'); 
	$pdf->Cell(0,6,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
	
	$pdf->Cell(15,6,iconv( 'UTF-8','TIS-620',''),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','ที่ขอเบิก'),'LB',0,'C');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(15,6,iconv( 'UTF-8','TIS-620','๑'),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','ราคาดวงละ    ๑  บาท'),'LB',0,'L');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620',EngToThaiNumber($row_tst['usebefo_1bath'],0)),'LB',0,'C');
	$pdf->Cell(3,6,iconv( 'UTF-8','TIS-620',''),'L',0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(3,6,iconv( 'UTF-8','TIS-620',''),'R',0,'C');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(15,6,iconv( 'UTF-8','TIS-620','๒'),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','ราคาดวงละ    ๕  บาท'),'LB',0,'L');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620',EngToThaiNumber($row_tst['usebefo_5bath'],0)),'LB',0,'C');
	$pdf->Cell(3,6,iconv( 'UTF-8','TIS-620',''),'L',0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(3,6,iconv( 'UTF-8','TIS-620',''),'R',0,'C');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(15,6,iconv( 'UTF-8','TIS-620','๓'),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','ราคาดวงละ  ๒๐  บาท'),'LB',0,'L');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620',EngToThaiNumber($row_tst['usebefo_20bath'],0)),'LB',0,'C');
	$pdf->Cell(3,6,iconv( 'UTF-8','TIS-620',''),'L',0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(3,6,iconv( 'UTF-8','TIS-620',''),'R',0,'C');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(15,6,iconv( 'UTF-8','TIS-620',''),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','รวม'),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620',''),'LB',0,'C');
	$pdf->Cell(3,6,iconv( 'UTF-8','TIS-620',''),'LB',0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),'B',0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),'B',0,'C');
	$pdf->Cell(53,6,iconv( 'UTF-8','TIS-620',''),'B',0,'C');
	$pdf->Cell(3,6,iconv( 'UTF-8','TIS-620',''),'RB',0,'C');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(260,60,iconv( 'UTF-8','TIS-620',''),'LBR',0,'C');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(15,6,'',0,0,'L');
	$pdf->Cell(160,6,iconv('UTF-8','TIS-620',''),0,0,'L');
	$pdf->Cell(85,6,iconv( 'UTF-8','TIS-620',''),0,0,'L');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(15,6,'',0,0,'L');
	$pdf->Cell(135,6,'',0,0,'L');
	$pdf->Cell(85,6,iconv( 'UTF-8','TIS-620','ขอแสดงความนับถือ'),0,0,'C');
	$pdf->Cell(0,6,'',0,1);
	
	
	$pdf->SetFont('TH','U',16);
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(4,6,'',0,0);
	$pdf->SetFont('TH','',16);
	$pdf->Cell(85,10,iconv( 'UTF-8','TIS-620',''),0,0,'L');
	$pdf->Cell(0,8,'',0,1);
	
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''.$row_cd1['fullname']),0,0,'L');
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(4,6,'',0,0);
	$pdf->Cell(85,6,iconv( 'UTF-8','TIS-620','...............................................................'),0,0,'C');
	$pdf->Cell(0,8,'',0,1);
	
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''),0,0,'L');
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(4,6,'',0,0);
	$pdf->Cell(85,6,iconv( 'UTF-8','TIS-620','(........................................................)'),0,0,'C');
	$pdf->Cell(0,8,'',0,1);
	
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''.$row_cd1['fullname']),0,0,'L');
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(4,6,'',0,0);
	$pdf->Cell(85,6,iconv( 'UTF-8','TIS-620','ตำแหน่ง..............................................................'),0,0,'C');
	$pdf->Cell(0,8,'',0,1);
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''),0,0,'L');
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(55,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(4,6,'',0,0);
	$pdf->Cell(85,6,iconv( 'UTF-8','TIS-620',''),0,0,'C');
	$pdf->Cell(0,8,'',0,1);
	 
	$pdf->Output();
	
	

	
	function EngToThaiText($txt){
		$ret = "";
		for($i=0;$i<strlen($txt);$i++){
			switch ($txt[$i]) {
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
					$ret.=$txt[$i];
			}
		}
		return $ret;
	}
 	function EngToThaiNumber($number,$digit){
		$ret = "";		
		$number = number_format($number,$digit);
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
	
	function EndToThaiDate($val){
		$ret = "";
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
		$time = strtotime($val);
		$thai_date_return.= ((int)date("d",$time));
		$thai_date_return.="  เดือน  ".$thai_month_arr[(int)date("m",$time)];
		$thai_date_return.= "  พ.ศ.".(date("Y",$time)+543);
		return $thai_date_return;
		return $ret;
	}
?>