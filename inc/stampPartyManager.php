<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
            	<li>
					<i class="ace-icon fa fa-home home-icon"></i><a href="#">หน้าหลัก</a>
				</li>
				<li> รายการสัญญาซื้อ (อ.ส.๑๑) </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						รายการสัญญาซื้อ (อ.ส.๑๑)
				</h1>
            </div>
            
            <div class="row">
				<div class="col-xs-12">		
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
                    

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center">ลำดับที่</th>
									<th class="center">เลขอ้างอิงในระบบ</th>
									<th class="center">ชื่อผู้ให้สัญญา</th>
									<th class="center">ชื่อสถานประกอบการ</th>
									<th class="center">วันที่ขอ</th>
                                    <th class="center">วันหมดอายุ</th>
                                    <th class="center">ระยะเวลา</th>
									<th class="center">เลือกรายการ</th>
								</tr>
							</thead>
									
							<tbody>
                        	<?php
							
								$sql_u = "SELECT tsp.stamp_party_transaction_id,
								tsp.stamp_party_fullname,tsp.stamp_party_company,
								IF(tsp.stamp_party_date='0000-00-00','',tsp.stamp_party_date) AS stamp_party_date,
								IF(tsp.stamp_party_date='0000-00-00','',DATE_ADD(DATE_ADD(tsp.stamp_party_date,INTERVAL 3 YEAR),INTERVAL -1 DAY)) AS stamp_party_date_exp,
								TIMESTAMPDIFF(DAY,NOW(),DATE_ADD(DATE_ADD(tsp.stamp_party_date,INTERVAL 3 YEAR),INTERVAL -1 DAY)) ex_day
								FROM tb_stamp_party tsp 
								WHERE tsp.stamp_party_officeid = '".$_SESSION['OFFICEID']."' ORDER BY  DATE_ADD(DATE_ADD(tsp.stamp_party_date,INTERVAL 3 YEAR),INTERVAL -1 DAY) ASC";
								$rs_u = mysql_query($sql_u,$connection);
								$u_index = 1;
								while($row_u = mysql_fetch_array($rs_u)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td class="center">'.$row_u['stamp_party_transaction_id'].'</td>';
									echo '<td class="center">'.$row_u['stamp_party_fullname'].'</td>';
									echo '<td class="center">'.$row_u['stamp_party_company'].'</td>';
									echo '<td class="center">'.date('d-m-Y',strtotime($row_u['stamp_party_date'])).'</i></td>';
									echo '<td class="center">'.date('d-m-Y',strtotime($row_u['stamp_party_date_exp'])).'</i></td>';
									if($row_u['ex_day']>=60){
										echo '<td class="center"><b class=" btn-xs btn-success">'.number_format($row_u['ex_day']).' วัน </b></i></td>';
									}else{
										echo '<td class="center"><b class=" btn-xs btn-danger">'.number_format($row_u['ex_day']).' วัน </b></i></td>';
									}
									echo '<td class="center">';
									echo '<div class="btn-group">';
									echo '	<button data-toggle="dropdown" class="btn btn-white btn-xs dropdown-toggle" aria-expanded="false">';
									echo '		เลือกรายการ';
									echo '		<span class="ace-icon fa fa-caret-down icon-on-right"></span>';
									echo '	</button>';
									echo '	<ul  class="dropdown-menu dropdown-info dropdown-menu-right">';
									echo '		<li><a href="index.php?service=stampPartyAdding&stamp_party_transaction_id='.$row_u['stamp_party_transaction_id'].'">แก้ไขสัญญา</a></li>';
									echo '		<li><a href="WordTemplate/FSPWordExporter.php?stamp_party_transaction_id='.$row_u['stamp_party_transaction_id'].'">พิมพ์แบบคำขอ</a></li>';
									echo '		<li><a href="WordTemplate/FSTPWordExporter.php?stamp_party_transaction_id='.$row_u['stamp_party_transaction_id'].'">พิมพ์สัญญา</a></li>';
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
                                
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-block alert-success" style="text-align:center;">
                        <button class="btn btn-white btn-warning btn-bold" onclick="GoAdding()">
							<i class="ace-icon fa fa-user bigger-120 orange"></i> เพิ่มสัญญาซื้อ (อ.ส.๑๑) 
						</button>
                  	</div>				
              	</div>
         	</div>
            
        </div>
    </div>
</div>
<script>
	function GoAdding(){
		window.location.href="index.php?service=stampPartyAdding";
	}
</script>		