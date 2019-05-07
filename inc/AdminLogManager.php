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
				<li> จัดการ Log </li>
             </ul>
             <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						จัดการ Log
				</h1>
            </div>
            
            <div class="row">
				<div class="col-xs-12">
										
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
                    
					<div class="table-header">
						ข้อมูล Log ทั้งหมด
					</div>

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table100" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center">ลำดับที่</th>
									<th class="center">หน่วยงาน</th>
									<th class="center">ชื่อ-สกุล</th>
									<th class="center">Log Mode</th>
									<!--<th class="center">รายละเอียดก่อนการเปลี่ยนแปลง</th>
                                    <th class="center">รายละเอียดก่อนหลังเปลี่ยนแปลง</th>-->
									<th class="center">วันที่</th>
                                    <th class="center">เลือกรายการ</th>
								</tr>
							</thead>
									
							<tbody>
                        	<?php
							
								$sql_u = "SELECT CONCAT(tu.title,tu.fname,' ',tu.lname) AS fullname,t.log_mode,t.log_data,t.office_code,tof.office_name,t.log_date
								FROM tb_log  t 
								INNER JOIN tb_user_eoffice tu ON t.id = tu.id
								LEFT JOIN tb_office tof ON t.office_code = tof.office_code
								ORDER BY t.log_data DESC";
								$rs_u = mysql_query($sql_u,$connection);
								$u_index = 1;
								while($row_u = mysql_fetch_array($rs_u)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td>'.$row_u['office_name'].'</td>';
									echo '<td>'.$row_u['fullname'].'</td>';
									echo '<td class="center">'.$row_u['log_mode'].'</td>';
									$dataLog = explode('|',$row_u['log_data']);
									//echo '<td class="center">'.$dataLog[0].'</td>';
									//echo '<td class="center">'.$dataLog[1].'</td>';
									echo '<td class="center">'.$row_u['log_date'].'</td>';
									
									echo '<td class="center">';
									echo '<div class="hidden-sm hidden-xs action-buttons">';
									echo '<a class="green" href="#"><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
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
							<i class="ace-icon fa fa-user bigger-120 orange"></i> เพิ่มผู้ใช้งาน
						</button>
                  	</div>				
              	</div>
         	</div>
            
        </div>
    </div>
</div>
<script>
	function GoAdding(){
		window.location.href="index.php?service=UserAdding";
	}
</script>		