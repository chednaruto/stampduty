<?php
	session_start();
	include("../inc/config.php");
	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$off = $_POST['OFF'];
	if($_SESSION['OFFICELEVEL']==00){
			$i=0;
			if($off=="00"){
			 	$condition = " t.office_code='00005000'";
			}else if($off=="99"){
				$condition = " t.office_level IN('02','03','04') OR t.office_code='00005000'";
			}else{
				$condition = " t.office_level IN('02','03','04' ) AND t.office_code LIKE '".$off."%'";
			}
			$sql_of_sub = "SELECT * FROM tb_office t WHERE ".$condition;
			$rs_of_sub = mysql_query($sql_of_sub,$connection);
			while($row_of_sub = mysql_fetch_assoc($rs_of_sub)){
				if($off=="00"){
				$sql = "SELECT tb_transaction.* FROM (
					SELECT t.officeid,'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
					FROM tb_innit_stock t 
					WHERE t.officeid = '".$row_of_sub['office_code']."'
					UNION ALL
					SELECT t.officeid,'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,
					tb.allowed_withdraw_transaction_date 
					FROM tb_withdraw_transaction t LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND tb.allowed_withdraw_status = 'Y' AND DATE(tb.allowed_withdraw_transaction_date)  < '".$startdate."'
					UNION ALL 
					SELECT t.officeid,'ADD' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.receive_date
					FROM tb_receive_transaction t
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND t.receive_date < '".$startdate."' 
					UNION ALL
					SELECT t.officeid,'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
					FROM tb_allowed_withdraw_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' 
					AND t.allowed_withdraw_status = 'Y' AND DATE(t.allowed_withdraw_transaction_date) < '".$startdate."'
					UNION ALL
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
					FROM tb_sell_party_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_datetime)  < '".$startdate."'
					UNION ALL 
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
					FROM tb_sell_minor_sub_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_minor_sub_date)  < '".$startdate."'
				) as tb_transaction 
				ORDER BY tb_transaction.stock_date ASC";
				}else{
				$sql = "SELECT tb_transaction.* FROM (
					SELECT t.officeid,'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
					FROM tb_innit_stock t 
					WHERE t.officeid = '".$row_of_sub['office_code']."'
					UNION ALL
					SELECT t.officeid,'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,
					tb.allowed_withdraw_transaction_date 
					FROM tb_withdraw_transaction t LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND tb.allowed_withdraw_status = 'Y' AND DATE(tb.allowed_withdraw_transaction_date)  < '".$startdate."'
					UNION ALL
					SELECT t.officeid,'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
					FROM tb_allowed_withdraw_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' 
					AND t.allowed_withdraw_status = 'Y' AND DATE(t.allowed_withdraw_transaction_date) < '".$startdate."'
					UNION ALL
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
					FROM tb_sell_party_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_datetime)  < '".$startdate."'
					UNION ALL 
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
					FROM tb_sell_minor_sub_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_minor_sub_date)  < '".$startdate."'
				) as tb_transaction 
				ORDER BY tb_transaction.stock_date ASC";
				}
				
				$rs = mysql_query($sql,$connection);
				$balance_1_bath  =0;
				$balance_5_bath = 0;
				$balance_20_bath = 0;
				while($row = mysql_fetch_assoc($rs)){
					if($row['target']=="ADD"){
						$balance_1_bath += (int)$row['balance_1bath'];
						$balance_5_bath += (int)$row['balance_5bath'];
						$balance_20_bath += (int)$row['balance_20bath'];
					}else{
						$balance_1_bath -= (int)$row['balance_1bath'];
						$balance_5_bath -= (int)$row['balance_5bath'];
						$balance_20_bath -= (int)$row['balance_20bath'];
					}
				}
				
				
				//เบิก
				if($off=="00"){
			$sql_rc = "SELECT COUNT(DISTINCT t.receive_transaction_id) AS total,
			SUM(t.stamp_one_bath) AS stamp_one_bath,
			SUM(t.stamp_five_bath) AS stamp_five_bath,
			SUM(t.stamp_twenty_bath) AS stamp_twenty_bath
			FROM tb_receive_transaction  t 
			WHERE t.officeid = '".$row_of_sub['office_code']."' 
			AND t.receive_date BETWEEN '".$startdate."' AND '".$enddate."'";
			}else{
			$sql_rc = "SELECT COUNT(DISTINCT t.withdraw_transaction_id) AS total,
			SUM(tb.allowed_withdraw_one_bath) AS stamp_one_bath,
			SUM(tb.allowed_withdraw_five_bath) AS stamp_five_bath,
			SUM(tb.allowed_withdraw_twenty_bath) AS stamp_twenty_bath
			FROM tb_withdraw_transaction t 
			INNER JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id 
			WHERE t.officeid = '".$row_of_sub['office_code']."' 
			AND DATE(tb.allowed_withdraw_transaction_date) BETWEEN '".$startdate."' AND '".$enddate."'";
			}
				$rs_rc = mysql_query($sql_rc,$connection);
				$rc_total_time = 0;
				$rc_stamp_one_bath = 0;
				$rc_stamp_five_bath = 0;
				$rc_stamp_twenty_bath = 0;
				if($row_rc=mysql_fetch_assoc($rs_rc)){
					$rc_total_time = (int)$row_rc["total"];
					$rc_stamp_one_bath = (int)$row_rc["stamp_one_bath"];
					$rc_stamp_five_bath = (int)$row_rc["stamp_five_bath"];
					$rc_stamp_twenty_bath = (int)$row_rc["stamp_twenty_bath"];
				}

				//จ่ายขาย
				$sql_p = "SELECT COUNT(t.target) as pay_total,
				SUM(t.allowed_withdraw_one_bath) AS pay_one_bath,
				SUM(t.allowed_withdraw_five_bath) AS pay_five_bath,
				SUM(t.allowed_withdraw_twenty_bath) AS pay_twenty_bath,
				SUM(t.percent) AS percent
				FROM (
							SELECT t.officeid,'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date,0 as percent
							FROM tb_allowed_withdraw_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' 
							AND t.allowed_withdraw_status = 'Y' AND DATE(t.allowed_withdraw_transaction_date) BETWEEN '".$startdate."' AND '".$enddate."'
							UNION ALL
							SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime,
							if((stamp_one_bath+(stamp_five_bath*5)+(stamp_twenty_bath*20))>=1000,(stamp_one_bath+(stamp_five_bath*5)+(stamp_twenty_bath*20))*3/100,0) AS percent
							FROM tb_sell_party_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_datetime)   BETWEEN '".$startdate."' AND '".$enddate."'
							UNION ALL 
							SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date,0 as percent
							FROM tb_sell_minor_sub_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_minor_sub_date) BETWEEN '".$startdate."' AND '".$enddate."'
				) AS t";
				$rs_p = mysql_query($sql_p,$connection);
				$pay_total_time = 0;
				$pay_one_bath = 0;
				$pay_one_bath = 0;
				$pay_one_bath = 0;
				$pay_percent = 0;
				if($row_p = mysql_fetch_assoc($rs_p)){
					$pay_total_time = (int)$row_p['pay_total'];
					$pay_one_bath = (int)$row_p['pay_one_bath'];
					$pay_five_bath = (int)$row_p['pay_five_bath'];
					$pay_twenty_bath = (int)$row_p['pay_twenty_bath'];
					$pay_percent = (float)$row_p['percent'];
				}
				$balance = array("officename"=>$row_of_sub['office_name'],"balance_one_bath"=>$balance_1_bath,"balance_five_bath"=>$balance_5_bath,"balance_twenty_bath"=>$balance_20_bath,
				"receive_stamp_one_bath"=>$rc_stamp_one_bath,"receive_stamp_five_bath"=>$rc_stamp_five_bath,"receive_stamp_twenty_bath"=>$rc_stamp_twenty_bath,"receive_total_time"=>$rc_total_time,
				"pay_one_bath"=>$pay_one_bath,"pay_five_bath"=>$pay_five_bath,"pay_twenty_bath"=>$pay_twenty_bath,"pay_total_time"=>$pay_total_time,"pay_percent"=>$pay_percent);
				$ret[$i] = $balance;
				$i++;
			}
			
	}else if($_SESSION['OFFICELEVEL']=="02"){
			$i=0;
			$sql_of_sub = "SELECT * FROM tb_office t WHERE t.office_level IN('02','03','04') AND t.office_code LIKE '".substr($_SESSION['OFFICEID'],0,2)."%'";
			$rs_of_sub = mysql_query($sql_of_sub,$connection);
			while($row_of_sub = mysql_fetch_assoc($rs_of_sub)){
				$sql = "SELECT tb_transaction.* FROM (
					SELECT t.officeid,'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
					FROM tb_innit_stock t 
					WHERE t.officeid = '".$row_of_sub['office_code']."'
					UNION ALL
					SELECT t.officeid,'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,
					tb.allowed_withdraw_transaction_date 
					FROM tb_withdraw_transaction t LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND tb.allowed_withdraw_status = 'Y' AND DATE(tb.allowed_withdraw_transaction_date)  < '".$startdate."'
					UNION ALL 
					SELECT t.officeid,'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
					FROM tb_allowed_withdraw_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' 
					AND t.allowed_withdraw_status = 'Y' AND DATE(t.allowed_withdraw_transaction_date) < '".$startdate."'
					UNION ALL
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
					FROM tb_sell_party_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_datetime)  < '".$startdate."'
					UNION ALL 
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
					FROM tb_sell_minor_sub_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_minor_sub_date)  < '".$startdate."'
				) as tb_transaction 
				ORDER BY tb_transaction.stock_date ASC";
				$rs = mysql_query($sql,$connection);
				$balance_1_bath  =0;
				$balance_5_bath = 0;
				$balance_20_bath = 0;
				while($row = mysql_fetch_assoc($rs)){
					if($row['target']=="ADD"){
						$balance_1_bath += (int)$row['balance_1bath'];
						$balance_5_bath += (int)$row['balance_5bath'];
						$balance_20_bath += (int)$row['balance_20bath'];
					}else{
						$balance_1_bath -= (int)$row['balance_1bath'];
						$balance_5_bath -= (int)$row['balance_5bath'];
						$balance_20_bath -= (int)$row['balance_20bath'];
					}
				}
				//เบิก
				$sql_rc = "SELECT COUNT(DISTINCT t.withdraw_transaction_id) AS total,
			SUM(tb.allowed_withdraw_one_bath) AS stamp_one_bath,
			SUM(tb.allowed_withdraw_five_bath) AS stamp_five_bath,
			SUM(tb.allowed_withdraw_twenty_bath) AS stamp_twenty_bath
			FROM tb_withdraw_transaction t 
			INNER JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id 
			WHERE t.officeid = '".$row_of_sub['office_code']."' 
			AND DATE(tb.allowed_withdraw_transaction_date) BETWEEN '".$startdate."' AND '".$enddate."'";
				$rs_rc = mysql_query($sql_rc,$connection);
				$rc_total_time = 0;
				$rc_stamp_one_bath = 0;
				$rc_stamp_five_bath = 0;
				$rc_stamp_twenty_bath = 0;
				if($row_rc=mysql_fetch_assoc($rs_rc)){
					$rc_total_time = (int)$row_rc["total"];
					$rc_stamp_one_bath = (int)$row_rc["stamp_one_bath"];
					$rc_stamp_five_bath = (int)$row_rc["stamp_five_bath"];
					$rc_stamp_twenty_bath = (int)$row_rc["stamp_twenty_bath"];
				}
				
				//จ่ายขาย
				$sql_p = "SELECT COUNT(t.target) as pay_total,
				SUM(t.allowed_withdraw_one_bath) AS pay_one_bath,
				SUM(t.allowed_withdraw_five_bath) AS pay_five_bath,
				SUM(t.allowed_withdraw_twenty_bath) AS pay_twenty_bath,
				SUM(t.percent) AS percent
				FROM (
							SELECT t.officeid,'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date,0 as percent
							FROM tb_allowed_withdraw_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' 
							AND t.allowed_withdraw_status = 'Y' AND DATE(t.allowed_withdraw_transaction_date) BETWEEN '".$startdate."' AND '".$enddate."'
							UNION ALL
							SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime,
							if((stamp_one_bath+(stamp_five_bath*5)+(stamp_twenty_bath*20))>=1000,(stamp_one_bath+(stamp_five_bath*5)+(stamp_twenty_bath*20))*3/100,0) AS percent
							FROM tb_sell_party_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_datetime)   BETWEEN '".$startdate."' AND '".$enddate."'
							UNION ALL 
							SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date,0 as percent
							FROM tb_sell_minor_sub_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_minor_sub_date) BETWEEN '".$startdate."' AND '".$enddate."'
				) AS t";
				$rs_p = mysql_query($sql_p,$connection);
				$pay_total_time = 0;
				$pay_one_bath = 0;
				$pay_one_bath = 0;
				$pay_one_bath = 0;
				$pay_percent = 0;
				if($row_p = mysql_fetch_assoc($rs_p)){
					$pay_total_time = (int)$row_p['pay_total'];
					$pay_one_bath = (int)$row_p['pay_one_bath'];
					$pay_five_bath = (int)$row_p['pay_five_bath'];
					$pay_twenty_bath = (int)$row_p['pay_twenty_bath'];
					$pay_percent = (float)$row_p['percent'];
				}
				$balance = array("officename"=>$row_of_sub['office_name'],"balance_one_bath"=>$balance_1_bath,"balance_five_bath"=>$balance_5_bath,"balance_twenty_bath"=>$balance_20_bath,
				"receive_stamp_one_bath"=>$rc_stamp_one_bath,"receive_stamp_five_bath"=>$rc_stamp_five_bath,"receive_stamp_twenty_bath"=>$rc_stamp_twenty_bath,"receive_total_time"=>$rc_total_time,
				"pay_one_bath"=>$pay_one_bath,"pay_five_bath"=>$pay_five_bath,"pay_twenty_bath"=>$pay_twenty_bath,"pay_total_time"=>$pay_total_time,"pay_percent"=>$pay_percent);
				$ret[$i] = $balance;
				$i++;
			}
	}else if($_SESSION['OFFICELEVEL']=="03"){
		$i=0;
			$sql_of_sub = "SELECT * FROM tb_office t WHERE t.office_level IN('03','04') AND t.office_code LIKE '".substr($_SESSION['OFFICEID'],0,5)."%'";
			$rs_of_sub = mysql_query($sql_of_sub,$connection);
			while($row_of_sub = mysql_fetch_assoc($rs_of_sub)){
				$sql = "SELECT tb_transaction.* FROM (
					SELECT t.officeid,'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
					FROM tb_innit_stock t 
					WHERE t.officeid = '".$row_of_sub['office_code']."'
					UNION ALL
					
					SELECT t.officeid,'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,
					tb.allowed_withdraw_transaction_date 
					FROM tb_withdraw_transaction t LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND tb.allowed_withdraw_status = 'Y' AND DATE(tb.allowed_withdraw_transaction_date)  < '".$startdate."'
					
					UNION ALL 
					SELECT t.officeid,'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
					FROM tb_allowed_withdraw_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' 
					AND t.allowed_withdraw_status = 'Y' AND DATE(t.allowed_withdraw_transaction_date) < '".$startdate."'
					UNION ALL
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
					FROM tb_sell_party_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_datetime)  < '".$startdate."'
					UNION ALL 
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
					FROM tb_sell_minor_sub_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_minor_sub_date)  < '".$startdate."'
				) as tb_transaction 
				ORDER BY tb_transaction.stock_date ASC";
				$rs = mysql_query($sql,$connection);
				$balance_1_bath  =0;
				$balance_5_bath = 0;
				$balance_20_bath = 0;
				while($row = mysql_fetch_assoc($rs)){
					if($row['target']=="ADD"){
						$balance_1_bath += (int)$row['balance_1bath'];
						$balance_5_bath += (int)$row['balance_5bath'];
						$balance_20_bath += (int)$row['balance_20bath'];
					}else{
						$balance_1_bath -= (int)$row['balance_1bath'];
						$balance_5_bath -= (int)$row['balance_5bath'];
						$balance_20_bath -= (int)$row['balance_20bath'];
					}
				}
				//เบิก
				$sql_rc = "SELECT COUNT(DISTINCT t.withdraw_transaction_id) AS total,
			SUM(tb.allowed_withdraw_one_bath) AS stamp_one_bath,
			SUM(tb.allowed_withdraw_five_bath) AS stamp_five_bath,
			SUM(tb.allowed_withdraw_twenty_bath) AS stamp_twenty_bath
			FROM tb_withdraw_transaction t 
			INNER JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id 
			WHERE t.officeid = '".$row_of_sub['office_code']."' 
			AND DATE(tb.allowed_withdraw_transaction_date) BETWEEN '".$startdate."' AND '".$enddate."'";
				$rs_rc = mysql_query($sql_rc,$connection);
				$rc_total_time = 0;
				$rc_stamp_one_bath = 0;
				$rc_stamp_five_bath = 0;
				$rc_stamp_twenty_bath = 0;
				if($row_rc=mysql_fetch_assoc($rs_rc)){
					$rc_total_time = (int)$row_rc["total"];
					$rc_stamp_one_bath = (int)$row_rc["stamp_one_bath"];
					$rc_stamp_five_bath = (int)$row_rc["stamp_five_bath"];
					$rc_stamp_twenty_bath = (int)$row_rc["stamp_twenty_bath"];
				}
				
				//จ่ายขาย
				$sql_p = "SELECT COUNT(t.target) as pay_total,
				SUM(t.allowed_withdraw_one_bath) AS pay_one_bath,
				SUM(t.allowed_withdraw_five_bath) AS pay_five_bath,
				SUM(t.allowed_withdraw_twenty_bath) AS pay_twenty_bath,
				SUM(t.percent) AS percent
				FROM (
							SELECT t.officeid,'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date,0 as percent
							FROM tb_allowed_withdraw_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' 
							AND t.allowed_withdraw_status = 'Y' AND DATE(t.allowed_withdraw_transaction_date) BETWEEN '".$startdate."' AND '".$enddate."'
							UNION ALL
							SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime,
							if((stamp_one_bath+(stamp_five_bath*5)+(stamp_twenty_bath*20))>=1000,(stamp_one_bath+(stamp_five_bath*5)+(stamp_twenty_bath*20))*3/100,0) AS percent
							FROM tb_sell_party_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_datetime)   BETWEEN '".$startdate."' AND '".$enddate."'
							UNION ALL 
							SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date,0 as percent
							FROM tb_sell_minor_sub_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_minor_sub_date) BETWEEN '".$startdate."' AND '".$enddate."'
				) AS t";
				$rs_p = mysql_query($sql_p,$connection);
				$pay_total_time = 0;
				$pay_one_bath = 0;
				$pay_one_bath = 0;
				$pay_one_bath = 0;
				$pay_percent = 0;
				if($row_p = mysql_fetch_assoc($rs_p)){
					$pay_total_time = (int)$row_p['pay_total'];
					$pay_one_bath = (int)$row_p['pay_one_bath'];
					$pay_five_bath = (int)$row_p['pay_five_bath'];
					$pay_twenty_bath = (int)$row_p['pay_twenty_bath'];
					$pay_percent = (float)$row_p['percent'];
				}
				$balance = array("officename"=>$row_of_sub['office_name'],"balance_one_bath"=>$balance_1_bath,"balance_five_bath"=>$balance_5_bath,"balance_twenty_bath"=>$balance_20_bath,
				"receive_stamp_one_bath"=>$rc_stamp_one_bath,"receive_stamp_five_bath"=>$rc_stamp_five_bath,"receive_stamp_twenty_bath"=>$rc_stamp_twenty_bath,"receive_total_time"=>$rc_total_time,
				"pay_one_bath"=>$pay_one_bath,"pay_five_bath"=>$pay_five_bath,"pay_twenty_bath"=>$pay_twenty_bath,"pay_total_time"=>$pay_total_time,"pay_percent"=>$pay_percent);
				$ret[$i] = $balance;
				$i++;
			}
	}else{
			$i=0;
			$sql_of_sub = "SELECT * FROM tb_office t WHERE  t.office_code LIKE '".$_SESSION['OFFICEID']."'";
			$rs_of_sub = mysql_query($sql_of_sub,$connection);
			while($row_of_sub = mysql_fetch_assoc($rs_of_sub)){
				$sql = "SELECT tb_transaction.* FROM (
					SELECT t.officeid,'ADD' target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
					FROM tb_innit_stock t 
					WHERE t.officeid = '".$row_of_sub['office_code']."'
					UNION ALL
					SELECT t.officeid,'ADD' target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,
					tb.allowed_withdraw_transaction_date 
					FROM tb_withdraw_transaction t LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND tb.allowed_withdraw_status = 'Y' AND DATE(tb.allowed_withdraw_transaction_date)  < '".$startdate."'
					UNION ALL 
					SELECT t.officeid,'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
					FROM tb_allowed_withdraw_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' 
					AND t.allowed_withdraw_status = 'Y' AND DATE(t.allowed_withdraw_transaction_date) < '".$startdate."'
					UNION ALL
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
					FROM tb_sell_party_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_datetime)  < '".$startdate."'
					UNION ALL 
					SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
					FROM tb_sell_minor_sub_transaction t 
					WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_minor_sub_date)  < '".$startdate."'
				) as tb_transaction 
				ORDER BY tb_transaction.stock_date ASC";
				$rs = mysql_query($sql,$connection);
				$balance_1_bath  =0;
				$balance_5_bath = 0;
				$balance_20_bath = 0;
				while($row = mysql_fetch_assoc($rs)){
					if($row['target']=="ADD"){
						$balance_1_bath += (int)$row['balance_1bath'];
						$balance_5_bath += (int)$row['balance_5bath'];
						$balance_20_bath += (int)$row['balance_20bath'];
					}else{
						$balance_1_bath -= (int)$row['balance_1bath'];
						$balance_5_bath -= (int)$row['balance_5bath'];
						$balance_20_bath -= (int)$row['balance_20bath'];
					}
				}
				//เบิก
				$sql_rc = "SELECT COUNT(DISTINCT t.withdraw_transaction_id) AS total,
			SUM(tb.allowed_withdraw_one_bath) AS stamp_one_bath,
			SUM(tb.allowed_withdraw_five_bath) AS stamp_five_bath,
			SUM(tb.allowed_withdraw_twenty_bath) AS stamp_twenty_bath
			FROM tb_withdraw_transaction t 
			INNER JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id 
			WHERE t.officeid = '".$row_of_sub['office_code']."' 
			AND DATE(tb.allowed_withdraw_transaction_date) BETWEEN '".$startdate."' AND '".$enddate."'";
				$rs_rc = mysql_query($sql_rc,$connection);
				$rc_total_time = 0;
				$rc_stamp_one_bath = 0;
				$rc_stamp_five_bath = 0;
				$rc_stamp_twenty_bath = 0;
				if($row_rc=mysql_fetch_assoc($rs_rc)){
					$rc_total_time = (int)$row_rc["total"];
					$rc_stamp_one_bath = (int)$row_rc["stamp_one_bath"];
					$rc_stamp_five_bath = (int)$row_rc["stamp_five_bath"];
					$rc_stamp_twenty_bath = (int)$row_rc["stamp_twenty_bath"];
				}
				
				//จ่ายขาย
				$sql_p = "SELECT COUNT(t.target) as pay_total,
				SUM(t.allowed_withdraw_one_bath) AS pay_one_bath,
				SUM(t.allowed_withdraw_five_bath) AS pay_five_bath,
				SUM(t.allowed_withdraw_twenty_bath) AS pay_twenty_bath,
				SUM(t.percent) AS percent
				FROM (
							SELECT t.officeid,'PAY' target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date,0 as percent
							FROM tb_allowed_withdraw_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' 
							AND t.allowed_withdraw_status = 'Y' AND DATE(t.allowed_withdraw_transaction_date) BETWEEN '".$startdate."' AND '".$enddate."'
							UNION ALL
							SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime,
							if((stamp_one_bath+(stamp_five_bath*5)+(stamp_twenty_bath*20))>=1000,(stamp_one_bath+(stamp_five_bath*5)+(stamp_twenty_bath*20))*3/100,0) AS percent
							FROM tb_sell_party_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_datetime)   BETWEEN '".$startdate."' AND '".$enddate."'
							UNION ALL 
							SELECT t.officeid,'PAY' target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date,0 as percent
							FROM tb_sell_minor_sub_transaction t 
							WHERE t.officeid = '".$row_of_sub['office_code']."' AND DATE(t.sell_minor_sub_date) BETWEEN '".$startdate."' AND '".$enddate."'
				) AS t";
				$rs_p = mysql_query($sql_p,$connection);
				$pay_total_time = 0;
				$pay_one_bath = 0;
				$pay_one_bath = 0;
				$pay_one_bath = 0;
				$pay_percent = 0;
				if($row_p = mysql_fetch_assoc($rs_p)){
					$pay_total_time = (int)$row_p['pay_total'];
					$pay_one_bath = (int)$row_p['pay_one_bath'];
					$pay_five_bath = (int)$row_p['pay_five_bath'];
					$pay_twenty_bath = (int)$row_p['pay_twenty_bath'];
					$pay_percent = (float)$row_p['percent'];
				}
				$balance = array("officename"=>$row_of_sub['office_name'],"balance_one_bath"=>$balance_1_bath,"balance_five_bath"=>$balance_5_bath,"balance_twenty_bath"=>$balance_20_bath,
				"receive_stamp_one_bath"=>$rc_stamp_one_bath,"receive_stamp_five_bath"=>$rc_stamp_five_bath,"receive_stamp_twenty_bath"=>$rc_stamp_twenty_bath,"receive_total_time"=>$rc_total_time,
				"pay_one_bath"=>$pay_one_bath,"pay_five_bath"=>$pay_five_bath,"pay_twenty_bath"=>$pay_twenty_bath,"pay_total_time"=>$pay_total_time,"pay_percent"=>$pay_percent);
				$ret[$i] = $balance;
				$i++;
			}
	}
	echo json_encode($ret);
	
?>