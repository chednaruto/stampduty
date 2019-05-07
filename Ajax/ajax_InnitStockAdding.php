<?php
	session_start();
	include("../inc/config.php");
	include("../Function/FTSQLMS.php");
	$balanceClass = new FTSQLMS();
	$balance_1bath = $_POST['balance_1bath'];
	$balance_5bath = $_POST['balance_5bath'];
	$balance_20bath = $_POST['balance_20bath'];
	$usebefo_1bath = $_POST['usebefo_1bath'];
	$usebefo_5bath = $_POST['usebefo_5bath'];
	$usebefo_20bath = $_POST['usebefo_20bath'];
	$usesum_1bath = $_POST['usesum_1bath'];
	$usesum_5bath = $_POST['usesum_5bath'];
	$usesum_20bath = $_POST['usesum_20bath'];
	$officeid = $_POST['officeid'];
	
	$id = $_POST['id'];
	$sql = "SELECT * FROM tb_innit_stock i WHERE i.officeid LIKE '".$officeid."'"; 
	$rs = mysql_query($sql,$connection);
	$row = mysql_fetch_assoc($rs);
	$befo = json_encode($row);
	if($row['officeid']!==""){
		$log_mode = "Add Innit Stock";
	}else{
		$log_mode = "Edit Innit Stock";
	}
	
	$officeLimitMoney = $balanceClass->GetLimitMoNey($_SESSION["OFFICELEVEL"],$_SESSION["OFFICEID"]);

	if($officeLimitMoney>=(($balance_1bath-0)+($balance_5bath-0)*5+($balance_20bath-0)*20)){
		if($row['stock_date']==""){
			$sqlq = "REPLACE INTO tb_innit_stock(stock_date,balance_1bath,balance_5bath,balance_20bath,usebefo_1bath,usebefo_5bath,usebefo_20bath,usesum_1bath,usesum_5bath,
			usesum_20bath,officeid,id) 
			VALUE(NOW(),'".$balance_1bath."','".$balance_5bath."','".$balance_20bath."','".$usebefo_1bath."','".$usebefo_5bath."','".$usebefo_20bath."',
			'".$usesum_1bath."','".$usesum_5bath."','".$usesum_20bath."','".$officeid."','".$id."')";
		}else{
			$sqlq = "UPDATE tb_innit_stock t set t.balance_1bath='".$balance_1bath."',t.balance_5bath='".$balance_5bath."',t.balance_20bath='".$balance_20bath."',
			t.usebefo_1bath='".$usebefo_1bath."',t.usebefo_5bath='".$usebefo_5bath."',t.usebefo_20bath='".$usebefo_20bath."',
			t.usesum_1bath='".$usesum_1bath."',t.usesum_5bath='".$usesum_5bath."',t.usesum_20bath='".$usesum_20bath."',t.id='".$id."' WHERE t.officeid='".$officeid."'";
		}
		
		$rsq = mysql_query($sqlq,$connection);
		if($rsq){
			echo "TRUE";
		}else{
			echo "เกิดข้อผิดพลาด";
		}
		
		//LOG UPDATE
		$sql_log = "SELECT * FROM tb_innit_stock i WHERE i.officeid LIKE '".$officeid."'"; 
		$rs_log = mysql_query($sql_log,$connection);
		$uptodate = json_encode(mysql_fetch_assoc($rs_log));
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
		VALUES('".$log_mode."','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
		
	}else{
		echo "ยอดอากรแสตมป์เกินยอดเก็บรักษา";
	}
?>