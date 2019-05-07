<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="#">หน้าหลัก</a>
				</li>
				<li class="active"> สถานะการติดตามการบันทึกข้อมูล </li>
			</ul>
		</div>

		<div class="page-content">
			<div class="page-header">
            	<h1>
                    <strong class="red">
                       
                    </strong>
                    <strong> สถานะการติดตามการบันทึกข้อมูล </strong>
                </h1>
                
			</div>
            <div class="row">
				<div class="col-sm-12">
                    <table id="report_table" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th rowspan="2" class="center">ลำดับที่</th>
                                <th rowspan="2" class="center">หน่วยงาน</th>
                                <th colspan="2" class="center">กำหนดวงเงินเก็บรักษา</th>
                                <th colspan="2" class="center">ตั้งยอดยกมา</th>
                            </tr>
                            <tr>
                                <th class="center">ดำเนินการเรียบร้อย</th>
                                <th class="center">ยังไม่ดำเนินการ</th>
                                <th class="center">ดำเนินการเรียบร้อย</th>
                                <th class="center">ยังไม่ดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
								$sql = "SELECT t.office_code,t.office_name,t.office_limit_money,if(t.office_limit_money>0,'Y','N') AS LimitStatus,
								ti.balance_1bath,ti.balance_5bath,ti.balance_20bath,if(ti.balance_1bath+ti.balance_5bath+ti.balance_20bath>=0 AND ti.balance_1bath IS NOT NULL,'Y','N') AS BalanceStatus
								FROM tb_office t 
								LEFT JOIN tb_innit_stock ti ON t.office_code = ti.officeid
								WHERE t.office_level IN('02','03','04') 
								AND t.office_active_status = 'Y'";
								$rs = mysql_query($sql,$connection);
								$i = 1;
								$LimitStatusTRUE = 0;
								$LimitStatusFALSE = 0;
								$BalanceStatusTRUE = 0;
								$BalanceStatusFALSE =0;
								while($row = mysql_fetch_array($rs)){
									echo '<tr>';
									echo '<td class="center">'.$i.'</td>';
									echo '<td>'.$row['office_name'].'</td>';
									if($row['LimitStatus']=="Y"){
										echo '<td class="center"><i class="ace-icon fa fa-check green"></i></td>';
										echo '<td></td>';
										$LimitStatusTRUE++;
									}else{
										echo '<td></td>';
										echo '<td class="center"><i class="ace-icon fa fa-times red"></i></td>';
										$LimitStatusFALSE++;
									}
									
									if($row['BalanceStatus']=="Y"){
										echo '<td class="center"><i class="ace-icon fa fa-check green"></i></td>';
										echo '<td></td>';
										$BalanceStatusTRUE++;
									}else{
										echo '<td></td>';
										echo '<td class="center"><i class="ace-icon fa fa-times red"></i></td>';
										$BalanceStatusFALSE++;
									}
									echo '</tr>';
									$i++;
								}
							?>
                            <tr>
                            	<td colspan="2" class="center">สรุป</td>
                                <td class="center"><?=$LimitStatusTRUE?></td>
                                <td class="center"><?=$LimitStatusFALSE?></td>
                                <td class="center"><?=$BalanceStatusTRUE?></td>
                                <td class="center"><?=$BalanceStatusFALSE?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
			</div><!-- /.row -->
		</div>
	</div>
</div>
<script>
	function GoToEditUser(id,edituser_mode){
		window.location.href = "index.php?service=user_editing&edituser_mode="+edituser_mode+"&employer_id="+id;
	}
</script>
            