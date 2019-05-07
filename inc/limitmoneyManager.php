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
            <?php
				
				if($_SESSION['OFFICELEVEL']=="00"){
					$sql_dash = 'SELECT COUNT(*) as ch,SUM(tb.office_limit_money) AS sh,COUNT(CASE WHEN tb.office_limit_money<>0 THEN tb.office_code END) cm FROM tb_office tb WHERE tb.office_level = "02" AND tb.office_active_status = "Y"';
				
				}else if($_SESSION['OFFICELEVEL']=='02'){
					$sql_dash = "SELECT
					(SELECT t.office_limit_money FROM tb_office t WHERE t.office_code LIKE '".$_SESSION['OFFICEID']."') AS sh,
					(SELECT COUNT(DISTINCT t.office_code) FROM tb_office t WHERE t.office_level = '03' AND t.office_code LIKE '".substr($_SESSION['OFFICEID'],0,2)."%' AND t.office_active_status = 'Y' ) AS  ch,
					(SELECT COUNT(DISTINCT t.office_code) FROM tb_office t WHERE t.office_level = '03' AND t.office_code LIKE '".substr($_SESSION['OFFICEID'],0,2)."%' AND t.office_active_status = 'Y' AND (t.office_limit_money != '' AND t.office_limit_money != 0)) AS  cm";
				}else if($_SESSION['OFFICELEVEL']=='03'){
					$sql_dash = "SELECT
					(SELECT t.office_limit_money FROM tb_office t WHERE t.office_code LIKE '".$_SESSION['OFFICEID']."') AS sh,
					(SELECT COUNT(DISTINCT t.office_code) FROM tb_office t WHERE t.office_level = '04' AND t.office_code LIKE '".substr($_SESSION['OFFICEID'],0,5)."%' AND t.office_active_status = 'Y' ) AS  ch,
					(SELECT COUNT(DISTINCT t.office_code) FROM tb_office t WHERE t.office_level = '04' AND t.office_code LIKE '".substr($_SESSION['OFFICEID'],0,5)."%' AND t.office_active_status = 'Y' AND (t.office_limit_money != '' AND t.office_limit_money != 0)) AS  cm";
				}
				$rs_dash = mysql_query($sql_dash,$connection);
				$row_dash = mysql_fetch_assoc($rs_dash);
			?>
            <div class="row">
				<div class="space-12"></div>

				<div class="col-sm-12 infobox-container">
					<!-- #section:pages/dashboard.infobox -->
					<div class="infobox infobox-green">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-home"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo $row_dash['ch']; ?></span>
							<div class="infobox-content">หน่วยอากรแสตมป์</div>
						</div>
						
					</div>
                    
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

					<div class="infobox infobox-blue">
						<div class="infobox-icon">
							<i class="ace-icon fa  fa-dollar"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo $row_dash['cm']; ?></span>
							<div class="infobox-content">หน่วยกำหนดวงเงินแล้ว</div>
						</div>

						<div class="badge badge-success">
							<?php echo number_format($row_dash['cm']*100/ $row_dash['ch'],2); ?>%
							
						</div>
					</div>

					<div class="infobox infobox-red">
						<div class="infobox-icon">
							<i class="ace-icon fa  fa-dollar"></i>
						</div>
                        
						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo $row_dash['ch']-$row_dash['cm']; ?></span>
							<div class="infobox-content">หน่วยยังไม่กำหนดวงเงิน</div>
						</div>
						<div class="badge badge-danger"><?php echo number_format(($row_dash['ch']-$row_dash['cm'])*100/ $row_dash['ch'],2); ?>%</div>
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
									<th class="center" style="display:inline-table">ลำดับที่</th>
                                    <th class="center">รหัสหน่วยแสตมป์อากร</th>
									<th class="center">หน่วยแสตมป์อากร</th>
									<th class="center">วงเงินให้เก็บรักษา (บาท)</th>
                                    <th class="center">กระบวนการ</th>
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
								}
								
								
								$rs_lm = mysql_query($sql_lm,$connection);
								$u_index = 1;
								if($row_dash['sh']!=0){
									while($row_lm = mysql_fetch_array($rs_lm)){
										echo '<tr>';
										echo '<td class="center">'.$u_index.'</td>';
										echo '<td>'.$row_lm['office_code'].'</td>';
										echo '<td>'.$row_lm['office_name'].'</td>';
										echo '<td class="right" style="text-align:right">'.number_format($row_lm['office_limit_money'],2).'</td>';
										
										echo '<td class="center">';
										echo '<div class="hidden-sm hidden-xs action-buttons">';
										echo '<a class="green" href="index.php?service=limitmoneyEditing&officeid='.$row_lm['office_code'].'"><i class="ace-icon fa fa-pencil"></i></a>';
										echo '</div>';
										echo '</td>';
										echo '</tr>';
										$u_index++;
									}
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
		