<?php
	session_start();
	require('../fpdf/fpdf.php');
	include('../inc/configuration_init.php');

	
	$pdf = new FPDF();
	$pdf->AddFont('THB','','THSarabun Bold.php');
	$pdf->AddFont('TH','','THSarabun.php');
	$pdf->SetMargins(20, 10, 15);
	$pdf->AddPage('L','A4',0);
	$pdf->SetFont('THB','',24);
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','อ.ส.๐๑.๔'),0,1,"R");
	$pdf->Ln();
	$pdf->Cell(0,15,iconv( 'UTF-8','TIS-620','บันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ'),0,1,"C");
	$pdf->SetFont('TH','',16);
	
	$pdf->Cell(0,5,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','วันที่.................................................................                    '),0,1,"R");
	$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','           บันทึกไว้เป็นหลักฐานเพื่อแสดงว่า วันนี้ เวลา.......................น. ข้าพเจ้าผู้ลงนามท้ายนี้ได้ทำการส่งมอบและรับมอบ     '.$pdf->Image("../Imgs/Checkbox-icon-ch.png", 202, $pdf->GetY()-1,-200).' แสตมป์อากร   '.$pdf->Image("../Imgs/Checkbox-icon-un.png", 228, $pdf->GetY()-1,-200).'   ลูกกุญแจ/รหัสลับ ต่อกันถูกต้อง'),0,1,"L");
	$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	$pdf->Cell(0,0,iconv( 'UTF-8','TIS-620','เรียบร้อยแล้ว ดังนี้'),0,1,"L");
	$pdf->Cell(0,8,iconv( 'UTF-8','TIS-620',''),0,1,"L");
	
	$pdf->Cell(15,12,iconv( 'UTF-8','TIS-620','ลำดับที่'),'LTB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','รายการแสตมป์อากร'),'LT',0,'C');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620','จำนวน'),'LT',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','จำนวนเงิน'),'LT',0,'C');
	$pdf->Cell(130,12,iconv( 'UTF-8','TIS-620','  หมายเหตุ (ระบุ) ..........................................................................................................'),'LTR',0,'L');
	$pdf->Cell(0,6,'',0,1); 
	
	$pdf->Cell(15,6,'',0,0);
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','ที่ขอเบิก'),'LB',0,'C');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620','(ดวง)'),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','(บาท)'),'LB',0,'C');
	$pdf->Cell(130,14,iconv( 'UTF-8','TIS-620','  .....................................................................................................................................'),'R',0,'L');
	$pdf->Cell(0,6,'',0,1); 

	$pdf->Cell(15,6,iconv( 'UTF-8','TIS-620','๑'),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','ราคาดวงละ    ๑  บาท'),'LB',0,'L');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620',EngToThaiNumber($row_tst['usebefo_1bath'],0)),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620',''),'LRB',0,'C');
	$pdf->Cell(130,16,iconv( 'UTF-8','TIS-620','  .....................................................................................................................................'),'R',0,'L');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(15,6,iconv( 'UTF-8','TIS-620','๒'),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','ราคาดวงละ    ๕  บาท'),'LB',0,'L');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620',EngToThaiNumber($row_tst['usebefo_1bath'],0)),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620',''),'LRB',0,'C');
	$pdf->Cell(130,18,iconv( 'UTF-8','TIS-620','  .....................................................................................................................................'),'RL',0,'L');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(15,6,iconv( 'UTF-8','TIS-620','๓'),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','ราคาดวงละ  ๒๐  บาท'),'LB',0,'L');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620',EngToThaiNumber($row_tst['usebefo_1bath'],0)),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620',''),'LRB',0,'C');
	$pdf->Cell(130,12,iconv( 'UTF-8','TIS-620',''),'RB',0,'L');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(15,6,iconv( 'UTF-8','TIS-620',''),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620','รวม'),'LB',0,'C');
	$pdf->Cell(35,6,iconv( 'UTF-8','TIS-620',EngToThaiNumber($row_tst['usebefo_1bath']+$row_tst['usebefo_5bath']+$row_tst['usebefo_20bath'],0)),'LB',0,'C');
	$pdf->Cell(40,6,iconv( 'UTF-8','TIS-620',EngToThaiNumber($row_tst['usesum_1bath']+$row_tst['usesum_5bath']+$row_tst['usesum_20bath'],0)),'LB',0,'C');
	
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(130,60,iconv( 'UTF-8','TIS-620',''),'LB',0,'C');
	$pdf->Cell(130,60,iconv( 'UTF-8','TIS-620',''),'LRB',0,'C');
	$pdf->Cell(0,6,'',0,1);
	
	
	$pdf->Cell(130,6,iconv( 'UTF-8','TIS-620','  คณะกรรมการผู้ส่งมอบ ประกอบด้วย'),0,0,'L');
	$pdf->Cell(130,6,iconv( 'UTF-8','TIS-620','  คณะกรรมการผู้รับมอบ ประกอบด้วย'),0,0,'L');
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->Cell(0,6,'',0,1);
	
	$pdf->SetFont('TH','U',16);
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','ชื่อ'),0,0,'C');
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','ลายมือชื่อ'),0,0,'C');
	$pdf->Cell(4,6,'',0,0);
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','ชื่อ'),0,0,'C');
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','ลายมือชื่อ'),0,0,'C');
	$pdf->Cell(0,8,'',0,1);
	
	$pdf->SetFont('TH','',16);
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','๑.........................................................'),0,0,'C');
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','.........................................................'),0,0,'C');
	$pdf->Cell(4,6,'',0,0);
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','๔.........................................................'),0,0,'C');
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','.........................................................'),0,0,'C');
	$pdf->Cell(0,8,'',0,1);
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','๒.........................................................'),0,0,'C');
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','.........................................................'),0,0,'C');
	$pdf->Cell(4,6,'',0,0);
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','๕.........................................................'),0,0,'C');
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','.........................................................'),0,0,'C');
	$pdf->Cell(0,8,'',0,1);
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','๓.........................................................'),0,0,'C');
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','.........................................................'),0,0,'C');
	$pdf->Cell(4,6,'',0,0);
	
	$pdf->Cell(6,6,'',0,0);
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','๖.........................................................'),0,0,'C');
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','.........................................................'),0,0,'C');
	$pdf->Cell(0,30,'',0,1);
	
	
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','หมายเหตุ  ให้ใช้บันทึกการส่งมอบ-รับมอบแสตมป์อากร นี้ในทุกกรณีที่มีการส่งมอบ-รับมอบแสตมป์อากร รวมตลอดถึงการส่งมอบลูกกุญแจ และรหัสลับ ห้องมั่นคง หรือตู้นิรภัย'),0,1,'L');
	$pdf->Cell(60,6,iconv( 'UTF-8','TIS-620','หรือกำปั่น หรือหีบเหล็ก ฯลฯ ที่ใช้เก็บรักษาแสตมป์อากรต่อกันด้วย'),0,0,'L');
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