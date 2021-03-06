<?php
	session_start();
	require('../fpdf/fpdf.php');
	include('../inc/config.php');
	
	$pdf = new FPDF();
	$pdf->AddFont('THB','','THSarabun Bold.php');
	$pdf->AddFont('TH','','THSarabun.php');
	$pdf->SetMargins(30, 17, 17);
	$pdf->AddPage('P','A4',0);
	$pdf->SetFont('THB','',20);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','อ.ส.๐๑.๒'),0,1,"R");
	$pdf->Image("../Imgs/krut.jpg",  97, $pdf->GetY()-1,32.8,32.9);
	$pdf->Cell(0,40,'',0,1);
	$pdf->SetFont('TH','',16);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','คำสั่ง....................................'),0,1,"C");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','ที่ .................../๒๕๕๔'),0,1,"C");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','เรื่อง  แต่งตั้งกรรมการคลังแสตมป์อากร..................................'),0,1,"C");
	$pdf->Cell(0,11,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','--------------------------'),0,1,"C");
	$pdf->Cell(0,11,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','                  เพื่อให้การปฏิบัติในการเบิก จ่าย เก็บรักษา และจำหน่ายแสตมป์อากรของคลังแสตมป์อากร'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','สำนักงานสรรพากรอำเภอนาด้วง เป็นไปด้วยความเรียบร้อย อาศัยอำนาจตามระเบียบกรมสรรพากรว่าด้วยการ'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','เบิก จ่าย เก็บรักษา และจำหน่ายแสตมป์อากร พ.ศ.๒๕๕๔ (ข้อ ๗ ข้อ ๙ ข้อ ๑๐ ข้อ ๑๑ ) จึงมีคำสั่ง'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','ดังต่อไปนี้'),0,1,"L");
	$pdf->Cell(0,9,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','                  ข้อ ๑ แต่งตั้งกรรมการคลังแสตมป์อากร............................................................ประกอบด้วย'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','                  (๑) 	นาย/นาง/นางสาว.......................................................ตำแหน่ง.........................................'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','เป็นประธานกรรมการ'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','                  (๒) 	นาย/นาง/นางสาว.......................................................ตำแหน่ง.........................................'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','เป็นกรรมการ'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','                  (๓) 	นาย/นาง/นางสาว.......................................................ตำแหน่ง.........................................'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','เป็นกรรมการ'),0,1,"L");
	$pdf->Cell(0,9,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','                  ข้อ ๒ กรณีประธานกรรมการหรือกรรมการตามข้อ ๑ ไม่อยู่หรือไม่อาจปฏิบัติราชการได้ ให้'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','ข้าราชการตามบัญชีแนบท้ายคำสั่งนี้ปฏิบัติหน้าที่แทน'),0,1,"L");
	$pdf->Cell(0,9,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','                  ข้อ ๓ ให้คณะกรรมการคลังแสตมป์อากรที่ได้รับแต่งตั้งตามข้อ ๑ และข้อ ๒ ปฏิบัติตาม'),0,1,"L");
	$pdf->Cell(0,8,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','ระเบียบกรมสรรพากร ว่าด้วยการเบิก จ่าย เก็บรักษา และจำหน่ายแสตมป์อากร พ.ศ.๒๕๕๔ โดยเคร่งครัด'),0,1,"L");
	$pdf->Cell(0,9,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','                  ทั้งนี้  ตั้งแต่บัดนี้เป็นต้นไป'),0,1,"L");
	$pdf->Cell(0,9,'',0,1);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','สั่ง   ณ  วันที่......................................................'),0,1,"C");
	$pdf->Cell(0,9,'',0,1);
	$pdf->Cell(0,9,'',0,1);
	
	$pdf->Cell(82,9,iconv( 'UTF-8','TIS-620',' '),0,0,"L");
	$pdf->Cell(50,9,iconv( 'UTF-8','TIS-620','(................................................)'),0,0,"C");
	$pdf->Cell(0,9,'',0,1);
	$pdf->Cell(65,9,iconv( 'UTF-8','TIS-620',' '),0,0,"L");
	$pdf->Cell(89,9,iconv( 'UTF-8','TIS-620','ตำแหน่ง.............................................................'),0,0,"C");
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