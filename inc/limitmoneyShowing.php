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
				<li> กำหนดวงเงินเก็บรักษา </li>
             </ul>
             <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>  
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						กำหนดวงเงินเก็บรักษา
				</h1>
            </div>
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
									<th class="center" style="display:inline-table">ลำดับที่</th>
                                    <th class="center">รหัสหน่วยแสตมป์อากร</th>
									<th class="center">หน่วยแสตมป์อากร</th>
									<th class="center">วงเงินให้เก็บรักษา (บาท)</th>
								</tr>
							</thead>
									
							<tbody>
                        	<?php
								
								if($_SESSION['OFFICELEVEL']=="00"){
									$sql_lm = 'SELECT * FROM tb_office tb WHERE tb.office_level = "02" AND tb.office_active_status = "Y"';
									
								}else if($_SESSION['OFFICELEVEL']=='02'){
									$sql_lm = 'SELECT * FROM tb_office tb WHERE tb.office_level = "03" AND tb.office_active_status = "Y" AND office_code LIKE "'.substr($_SESSION['OFFICEID'],0,2).'%"';
								}else if($_SESSION['OFFICELEVEL']=='03'){
									$sql_lm = 'SELECT * FROM tb_office tb WHERE tb.office_level = "04" AND tb.office_active_status = "Y" AND office_code LIKE "'.substr($_SESSION['OFFICEID'],0,5).'%"';
								}else{
									$sql_lm = 'SELECT * FROM tb_office tb WHERE tb.office_level = "04" AND tb.office_active_status = "Y" AND office_code LIKE "'.$_SESSION['OFFICEID'].'%"';
								}
								
								
								$rs_lm = mysql_query($sql_lm,$connection);
								$u_index = 1;
								while($row_lm = mysql_fetch_array($rs_lm)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td>'.$row_lm['office_code'].'</td>';
									echo '<td>'.$row_lm['office_name'].'</td>';
									echo '<td class="right" style="text-align:right">'.number_format($row_lm['office_limit_money'],2).'</td>';
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
		