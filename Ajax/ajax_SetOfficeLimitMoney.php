<?php
	session_start();
	include("../inc/config.php");

	
	$office_code = $_POST['office_code'];
	$office_limit_money = $_POST['office_limit_money'];
	$condition = true;
	if($_SESSION['OFFICELEVEL']=='02'){
		$sqllm = "SELECT t.office_limit_money,
		(select sum(tb.office_limit_money) from tb_office tb 
		where tb.office_level='03' and tb.office_code like '".(substr($_SESSION['OFFICEID'],0,2))."%' 
		and tb.office_code not in('".$office_code."')) as limimoney_target 
		from tb_office t where t.office_code like '".$_SESSION['OFFICEID']."'";
		$rslm = mysql_query($sqllm,$connection);
		$rowlm = mysql_fetch_assoc($rslm);
		if($rowlm['office_limit_money']< ($rowlm['limimoney_target']+$office_limit_money)){
			$condition = false;
		}
	}else if($_SESSION['OFFICELEVEL']=='03'){
		$sqllm = "SELECT t.office_limit_money,
		(SELECT SUM(tb.office_limit_money) AS office_limit_money FROM tb_office tb WHERE tb.office_level = '04' 
		AND tb.office_code LIKE '".substr($_SESSION['OFFICEID'],0,5)."%' AND tb.office_code NOT IN('".$office_code."')) AS limimoney_target
		FROM tb_office t WHERE t.office_code LIKE '".$_SESSION['OFFICEID']."'";
		$rslm = mysql_query($sqllm,$connection);
		$rowlm = mysql_fetch_assoc($rslm);
		if($rowlm['office_limit_money']< ($rowlm['limimoney_target']+$office_limit_money)){
			$condition = false;
		}
	}
	if($condition){
		//LOG BEFOR UPDATE
		$sql_log = "SELECT * FROM tb_office t WHERE t.office_code = '".$office_code."'";
		$rs_log = mysql_query($sql_log,$connection);
		$befo = json_encode(mysql_fetch_assoc($rs_log));
		
		
		$sql1 = "update tb_office t set t.office_limit_money='".$office_limit_money."' where t.office_code = '".$office_code."'";
		$rs = mysql_query($sql1,$connection);
		if($rs){
			echo  "TRUE";
		}else{
			echo "เกิดข้อผิดผลาด";
		}
		//LOG UPDATE
		$sql_log = "SELECT * FROM tb_office t WHERE t.office_code = '".$office_code."'";
		$rs_log = mysql_query($sql_log,$connection);
		$uptodate = json_encode(mysql_fetch_assoc($rs_log));
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
		VALUES('Edit Limit Money','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
		
	}else{
		echo "วงเงินที่กำหนดเกินวงเงินเก็บรักษา";
	}

?>