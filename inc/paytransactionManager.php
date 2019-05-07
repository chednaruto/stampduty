<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
            	<li>
					<i class="ace-icon fa fa-home home-icon"></i><a href="index.php">หน้าหลัก</a>
				</li>
				<li> รายการใบจ่ายแสตมป์อากร (อ.ส.๐๑.๗)</li>
           	</ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						รายการใบจ่ายแสตมป์อากร (อ.ส.๐๑.๗)
				</h1>
            </div>
            <?php
				
				if($_SESSION['OFFICELEVEL']=="00"){
					$sql_dash = 'SELECT COUNT(*) as ch,SUM(tb.office_limit_money) AS sh,COUNT(CASE WHEN tb.office_limit_money<>0 THEN tb.office_code END) cm FROM tb_office tb WHERE tb.office_level = "02" AND tb.office_active_status = "Y"';
				
				}else if($_SESSION['OFFICELEVEL']=='02'){
					$sql_dash = 'SELECT COUNT(*) as ch,SUM(tb.office_limit_money) AS sh,COUNT(CASE WHEN tb.office_limit_money<>0 THEN tb.office_code END) cm FROM tb_office tb WHERE tb.office_level = "03" AND tb.office_active_status = "Y" AND office_code LIKE "'.substr($_SESSION['OFFICEID'],0,2).'%"';
				}else if($_SESSION['OFFICELEVEL']=='03'){
					$sql_dash = 'SELECT COUNT(*) as ch,SUM(tb.office_limit_money) AS sh,COUNT(CASE WHEN tb.office_limit_money<>0 THEN tb.office_code END) cm FROM tb_office tb WHERE tb.office_level = "04" AND tb.office_active_status = "Y" AND office_code LIKE "'.substr($_SESSION['OFFICEID'],0,5).'%"';
				}
				$rs_dash = mysql_query($sql_dash,$connection);
				$row_dash = mysql_fetch_assoc($rs_dash);
				if($_SESSION['OFFICEID']=='00005000'){
					$sql_dash2 = 'SELECT * FROM (
				SELECT "ADD" target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
				FROM tb_innit_stock t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION
				SELECT "ADD" target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
				FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND tb.allowed_withdraw_status = "Y" 
				UNION
				SELECT "ADD" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.receive_date
				FROM tb_receive_transaction t
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION
				SELECT "PAY" target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
				FROM tb_allowed_withdraw_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND t.allowed_withdraw_status = "Y"
				UNION
				SELECT "PAY" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
				FROM tb_sell_party_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION 
				SELECT "PAY" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				) as tb_transaction ORDER BY tb_transaction.stock_date ASC';
				}else{
				$sql_dash2 = 'SELECT * FROM (
				SELECT "ADD" target,t.balance_1bath,t.balance_5bath,t.balance_20bath,t.stock_date 
				FROM tb_innit_stock t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION
				SELECT "ADD" target,tb.allowed_withdraw_one_bath,tb.allowed_withdraw_five_bath,tb.allowed_withdraw_twenty_bath,tb.allowed_withdraw_transaction_date 
				FROM tb_withdraw_transaction t  LEFT JOIN tb_allowed_withdraw_transaction tb ON t.withdraw_transaction_id = tb.withdraw_transaction_id
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND tb.allowed_withdraw_status = "Y" 
				UNION 
				SELECT "PAY" target, t.allowed_withdraw_one_bath,t.allowed_withdraw_five_bath,t.allowed_withdraw_twenty_bath,t.allowed_withdraw_transaction_date 
				FROM tb_allowed_withdraw_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'" AND t.allowed_withdraw_status = "Y"
				UNION
				SELECT "PAY" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_datetime 
				FROM tb_sell_party_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				UNION 
				SELECT "PAY" target,t.stamp_one_bath,t.stamp_five_bath,t.stamp_twenty_bath,t.sell_minor_sub_date 
				FROM tb_sell_minor_sub_transaction t 
				WHERE t.officeid = "'.$_SESSION['OFFICEID'].'"
				) as tb_transaction ORDER BY tb_transaction.stock_date ASC';
				}
				$rs_dash2 = mysql_query($sql_dash2,$connection);
				$stamp = 0;
				$stamp_one_bath = 0;
				$stamp_five_bath = 0;
				$stamp_twenty_bath = 0;
				while($row_dash2 = mysql_fetch_assoc($rs_dash2)){
					if($row_dash2['target']=="ADD"){
						$stamp += (int)$row_dash2['balance_1bath']+(int)$row_dash2['balance_5bath']*5+(int)$row_dash2['balance_20bath']*20;
						$stamp_one_bath += (int)$row_dash2['balance_1bath'];
						$stamp_five_bath += (int)$row_dash2['balance_5bath'];
						$stamp_twenty_bath += (int)$row_dash2['balance_20bath'];
					}else{
						$stamp -= (int)$row_dash2['balance_1bath']+(int)$row_dash2['balance_5bath']*5+(int)$row_dash2['balance_20bath']*20;
						$stamp_one_bath -= (int)$row_dash2['balance_1bath'];
						$stamp_five_bath -= (int)$row_dash2['balance_5bath'];
						$stamp_twenty_bath -= (int)$row_dash2['balance_20bath'];
					}
				}
			?>
            <div class="row">
				<div class="space-12"></div>

				<div class="col-sm-12 infobox-container">
					<!-- #section:pages/dashboard.infobox -->
					 <div class="infobox infobox-blue2">
                    	<div class="infobox-icon">
							<i class="ace-icon fa fa-credit-card"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-text">วงเงินเก็บรักษารวม</span>
							<div class="infobox-content">
								<span class="bigger-110">&nbsp;</span>
								<?php echo number_format($row_dash['sh'],2); ?> ฿
							</div>
						</div>
					</div>

                    
                    <div class="infobox infobox-blue2">
                    	<div class="infobox-icon">
							<i class="ace-icon fa fa-dollar"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-text">แสตม์อากรคงคลัง</span>
							<div class="infobox-content">
								<span class="bigger-110">&nbsp;</span>
								<?php echo number_format($stamp,2); ?> ฿
							</div>
						</div>
					</div>

					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa  fa-dollar"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">ราคา 1 บาท</span>
							<div class="infobox-content">คงเหลือ <?php echo number_format($stamp_one_bath); ?> ดวง</div>
						</div>

						<div class="badge badge-success"></div>
					</div>

					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa  fa-dollar"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">ราคา 5 บาท</span>
							<div class="infobox-content">คงเหลือ <?php echo number_format($stamp_five_bath); ?> ดวง</div>
						</div>

						<div class="badge badge-success"></div>
					</div>
                    
					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa  fa-dollar"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number">ราคา 20 บาท</span>
							<div class="infobox-content">คงเหลือ <?php echo number_format($stamp_twenty_bath); ?> ดวง</div>
						</div>

						<div class="badge badge-success"></div>
					</div>
					

					
					<div class="space-6"></div>
				</div>
			</div><!-- /.row -->
            <div class="row">
				<div class="col-xs-12">
										
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table25" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center" rowspan="2">ลำดับที่</th>
                                    <th class="center" rowspan="2">เลขอ้างอิงคำขอเบิก</th>
									<th class="center" rowspan="2">คำขอเบิกที่</th>
                                    <th class="center" rowspan="2">ลงวันที่</th>
                                    <th class="center" rowspan="2">หน่วยแสตม์อากร</th>
									<th class="center" colspan="3">ยอดเบิก</th>
                                    <th class="center" colspan="3">ยอดจ่าย</th>
                                    <th class="center" rowspan="2">สถานะ</th>
                                    <th class="center" rowspan="2">&nbsp;</th>
								</tr>
                                <tr>
                                	<th class="center"> 1 บาท</th>
                                    <th class="center"> 5 บาท</th>
                                    <th class="center"> 20 บาท</th>
                                    
                                    <th class="center"> 1 บาท</th>
                                    <th class="center"> 5 บาท</th>
                                    <th class="center"> 20 บาท</th>
                                </tr>
							</thead>
									
							<tbody>
                            
                        	<?php
								
								
								if($_SESSION['OFFICELEVEL']=="00"){
									$sql_lm = "SELECT t.*,tof.office_name,ta.allowed_withdraw_transaction_id,ta.pay_document_date,tr.receive_transaction_id,
									ta.allowed_withdraw_one_bath,ta.allowed_withdraw_five_bath,ta.allowed_withdraw_twenty_bath
									FROM tb_withdraw_transaction t 
									LEFT JOIN tb_office tof ON t.officeid = tof.office_code
									LEFT JOIN tb_allowed_withdraw_transaction ta ON t.withdraw_transaction_id = ta.withdraw_transaction_id
									LEFT JOIN tb_receive_transaction tr ON ta.allowed_withdraw_transaction_id = tr.allowed_withdraw_transaction_id
									WHERE t.officeid IN(
										SELECT tf.office_code 
										FROM tb_office tf 
										WHERE tf.office_level = '02'
										AND tf.office_active_status = 'Y'
									) AND ta.allowed_withdraw_transaction_id IS NOT NULL AND ta.allowed_withdraw_status='Y' ORDER BY t.withdraw_transaction_date DESC ";
									
								}else if($_SESSION['OFFICELEVEL']=='02'){
									$sql_lm = 'SELECT t.*,tof.office_name,ta.allowed_withdraw_transaction_id,ta.pay_document_date,tr.receive_transaction_id,
									ta.allowed_withdraw_one_bath,ta.allowed_withdraw_five_bath,ta.allowed_withdraw_twenty_bath
									FROM tb_withdraw_transaction t 
									LEFT JOIN tb_office tof ON t.officeid = tof.office_code
									LEFT JOIN tb_allowed_withdraw_transaction ta ON t.withdraw_transaction_id = ta.withdraw_transaction_id
									LEFT JOIN tb_receive_transaction tr ON ta.allowed_withdraw_transaction_id = tr.allowed_withdraw_transaction_id
									WHERE t.officeid IN(
										SELECT tf.office_code 
										FROM tb_office tf 
										WHERE tf.office_level = "03"
										AND tf.office_active_status = "Y" AND office_code LIKE "'.substr($_SESSION['OFFICEID'],0,2).'%"
									) AND ta.allowed_withdraw_transaction_id IS NOT NULL AND ta.allowed_withdraw_status="Y" ORDER BY t.withdraw_transaction_date DESC';
									
								}else if($_SESSION['OFFICELEVEL']=='03'){
									$sql_lm = 'SELECT t.*,tof.office_name,ta.allowed_withdraw_transaction_id,ta.pay_document_date,tr.receive_transaction_id,
									ta.allowed_withdraw_one_bath,ta.allowed_withdraw_five_bath,ta.allowed_withdraw_twenty_bath,ta.pay_document_number
									FROM tb_withdraw_transaction t 
									LEFT JOIN tb_office tof ON t.officeid = tof.office_code
									LEFT JOIN tb_allowed_withdraw_transaction ta ON t.withdraw_transaction_id = ta.withdraw_transaction_id
									LEFT JOIN tb_receive_transaction tr ON ta.allowed_withdraw_transaction_id = tr.allowed_withdraw_transaction_id
									WHERE t.officeid IN(
										SELECT tf.office_code 
										FROM tb_office tf 
										WHERE tf.office_level = "04"
										AND tf.office_active_status = "Y" AND office_code LIKE "'.substr($_SESSION['OFFICEID'],0,5).'%"
									) AND ta.allowed_withdraw_transaction_id IS NOT NULL AND ta.allowed_withdraw_status="Y" ORDER BY t.withdraw_transaction_date DESC';
								}
								
								
								$rs_lm = mysql_query($sql_lm,$connection);
								$u_index = 1;
								while($row_lm = mysql_fetch_array($rs_lm)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td>'.$row_lm['withdraw_transaction_id'].'</td>';
									echo '<td>'.$row_lm['withdraw_document_id'].'</td>';
									echo '<td>'.date('d-m-Y',strtotime($row_lm['withdraw_document_date'])).'</td>';
									echo '<td>'.$row_lm['office_name'].'</td>';
									echo '<td align="right">'.number_format($row_lm['amount_withdraw_one_bath']).'</td>';
									echo '<td align="right">'.number_format($row_lm['amount_withdraw_five_bath']).'</td>';
									echo '<td align="right">'.number_format($row_lm['amount_withdraw_twenty_bath']).'</td>';
									echo '<td align="right">'.number_format($row_lm['allowed_withdraw_one_bath']).'</td>';
									echo '<td align="right">'.number_format($row_lm['allowed_withdraw_five_bath']).'</td>';
									echo '<td align="right">'.number_format($row_lm['allowed_withdraw_twenty_bath']).'</td>';
									if($row_lm['pay_document_date']!="" && $row_lm['pay_document_date']!="0000-00-00" && $row_lm['pay_document_date'] != ""){
										echo '<td align="center"><span class="label label-success label-white middle"><i class="ace-icon fa fa-check bigger-120"></i></span></td>';
									}else{
										echo '<td align="center"><span class="label label-warning label-white middle"><i class="ace-icon fa fa-exclamation-triangle bigger-120"></i></span></td>';
									}
									echo '<td class="center">';
									echo '<div class="btn-group">';
									echo '	<button data-toggle="dropdown" class="btn btn-white btn-xs dropdown-toggle" aria-expanded="false">';
									echo '		เลือกรายการ';
									echo '		<span class="ace-icon fa fa-caret-down icon-on-right"></span>';
									echo '	</button>';
									echo '	<ul  class="dropdown-menu dropdown-info dropdown-menu-right">';
									
										echo '<li><a href="index.php?service=paytransactionAdding&withdraw_transaction_id='.$row_lm['withdraw_transaction_id'].'">บันทึกใบจ่ายแสตมป์อากร</a></li>';	
									
												
									if($row_lm['allowed_withdraw_transaction_id']!=""){
										echo '	<li><a href="WordTemplate/FPTWordExporter.php?allowed_withdraw_transaction_id='.$row_lm['allowed_withdraw_transaction_id'].'">พิมพ์ใบจ่ายแสตมป์อากร</a></li>';	
									}
									echo '	</ul>';
									echo '</div>';
									echo '</td>';
									echo '</tr>';
									$u_index++;
								}
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
		