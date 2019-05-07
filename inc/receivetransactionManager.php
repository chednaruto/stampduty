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
				<li> รายการตอบรับแสตมป์อากร (อ.ส.๐๑.๘)</li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						รายการตอบรับแสตมป์อากร (อ.ส.๐๑.๘)
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
			?>
            
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
									<th class="center">ลำดับที่</th>
                                    <th class="center">เลขอ้างอิงใบจ่ายแสตมป์อากร</th>
									<th class="center">ใบจ่ายแสตมป์อากรที่</th>
                                    <th class="center">ลงวันที่</th>
                                    <th class="center">หน่วยงาน</th>
									<th class="center">ราคา 1 บาท</th>
                                    <th class="center">ราคา 5 บาท</th>
                                    <th class="center">ราคา 20 บาท</th>
                                    <th class="center">สถานะ</th>
                                    <th class="center">&nbsp;</th>
								</tr>
							</thead>
									
							<tbody>
                            
                        	<?php
								
								
								
								$sql_lm = "SELECT tof.office_name,ta.allowed_withdraw_transaction_id,ta.pay_document_date,ta.pay_document_number,tof2.office_name AS allowed_officename,ta.allowed_withdraw_one_bath,ta.allowed_withdraw_five_bath,ta.allowed_withdraw_twenty_bath,trt.receive_transaction_id
									FROM tb_withdraw_transaction t  
									LEFT JOIN tb_office tof ON t.officeid = tof.office_code
									LEFT JOIN tb_allowed_withdraw_transaction ta ON t.withdraw_transaction_id = ta.withdraw_transaction_id
									LEFT JOIN tb_office tof2 ON tof2.office_code = ta.officeid
									LEFT JOIN tb_receive_transaction trt ON ta.allowed_withdraw_transaction_id = trt.allowed_withdraw_transaction_id
									WHERE t.officeid IN(
										SELECT tf.office_code 
										FROM tb_office tf 
										WHERE tf.office_active_status = 'Y'
									) AND ta.allowed_withdraw_transaction_id IS NOT NULL AND ta.allowed_withdraw_status='Y'
									AND t.officeid = '".$_SESSION['OFFICEID']."'
									AND ta.pay_document_date IS NOT NULL AND ta.pay_document_date <> '0000-00-00' AND ta.pay_document_number <> ''";
								
								$rs_lm = mysql_query($sql_lm,$connection);
								$u_index = 1;
								while($row_lm = mysql_fetch_array($rs_lm)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td>'.$row_lm['allowed_withdraw_transaction_id'].'</td>';
									echo '<td>'.$row_lm['pay_document_number'].'</td>';
									echo '<td>'.date('d-m-Y',strtotime($row_lm['pay_document_date'])).'</td>';
									echo '<td>'.$row_lm['allowed_officename'].'</td>';
									echo '<td align="right">'.number_format($row_lm['allowed_withdraw_one_bath']).'</td>';
									echo '<td align="right">'.number_format($row_lm['allowed_withdraw_five_bath']).'</td>';
									echo '<td align="right">'.number_format($row_lm['allowed_withdraw_twenty_bath']).'</td>';
									if($row_lm['receive_transaction_id']!=""){
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
									echo '		<li><a href="index.php?service=receivetransactionAdding&allowed_withdraw_transaction_id='.$row_lm['allowed_withdraw_transaction_id'].'">บันทึกตอบรับแสตมป์อากร</a></li>';				if($row_lm['receive_transaction_id']!=""){
										echo '	<li><a href="WordTemplate/FRCWordExporter.php?allowed_withdraw_transaction_id='.$row_lm['allowed_withdraw_transaction_id'].'">พิมพ์ใบตอบรับแสตมป์อากร</a></li>';	
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
		