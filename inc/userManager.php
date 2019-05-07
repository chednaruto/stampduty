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
				<li> ข้อมูลผู้ใช้งาน </li>
             </ul>
             <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1>
						ข้อมูลผู้ใช้งาน
				</h1>
            </div>
            
            <div class="row">
				<div class="col-xs-12">
										
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
                    
					<div class="table-header">
						ข้อมูลผู้ใช้งาน สังกัด<?php echo $_SESSION['OFFICENAME']; ?>
					</div>

					<!-- div.dataTables_borderWrap -->
					<div>
						<table id="dynamic-table" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th class="center">ลำดับที่</th>
									<th class="center">หน่วยงาน</th>
									<th class="center">ชื่อ-สกุล</th>
									<th class="center">ตำแหน่ง</th>
									<th class="center">สถานะ</th>
									<th class="center">เลือกรายการ</th>
								</tr>
							</thead>
									
							<tbody>
                        	<?php
							
								$sql_u = "SELECT u.officeid,of.office_name,
								u.id,CONCAT(e.title,e.fname,' ',e.lname) AS fullname,e.position_m,e.officeid AS officeid_old,u.permission_status
								FROM tb_user_permission u
								LEFT JOIN tb_user_eoffice e ON u.id = e.id 
								LEFT JOIN tb_office of ON u.officeid = of.office_code 
								WHERE u.officeid LIKE '".$_SESSION['OFFICEID']."'";
								$rs_u = mysql_query($sql_u,$connection);
								$u_index = 1;
								while($row_u = mysql_fetch_array($rs_u)){
									echo '<tr>';
									echo '<td class="center">'.$u_index.'</td>';
									echo '<td>'.$row_u['office_name'].'</td>';
									echo '<td>'.$row_u['fullname'].'</td>';
									echo '<td class="center">'.$row_u['position_m'].'</td>';
									if($_SESSION['OFFICEID'] != $row_u['officeid_old'] || $row_u['permission_status']=='N'){
										echo '<td class="center"><i class="ace-icon fa fa-times  bigger-110 icon-only red"></i></td>';
									}else{
										echo '<td class="center"><i class="ace-icon fa fa-check  bigger-110 icon-only green"></i></td>';
									}
									
									echo '<td class="center">';
									echo '<div class="hidden-sm hidden-xs action-buttons">';
									echo '<a class="green" href="index.php?service=userEditing&id='.$row_u['id'].'"><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
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