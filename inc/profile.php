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
				<li class="active">ข้อมูลผู้ใช้งาน</li>
			</ul>
		</div>

		<div class="page-content">
			<div class="page-header">
            	<h1>
                    <strong class="red">
                        <i class="ace-icon fa fa-user"></i>
                    </strong>
                    <strong>ข้อมูลผู้ใช้งาน</strong>
                </h1>
			</div>
			<?php
				$sql = 'SELECT * FROM tb_user_eoffice t WHERE id = "'.$_SESSION['ID'].'"';
				$rs  = mysql_query($sql,$connection);
				$row = mysql_fetch_assoc($rs);
			?>
			<div class="row">
				<div class="col-xs-12">
					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<span class="profile-picture">
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/profile-pic.jpg" />
									</span>
									<div class="space-4"></div>
									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<b  class="user-title-label" >
												<i class="ace-icon fa light-green"></i>
												&nbsp;
												<span class="white"><?php echo $row['title'].$row['fname'].' '.$row['lname']; ?></span>
											</b>
										</div>
									</div>
								</div>
								<div class="space-6"></div>
							</div>
							<div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>
								<div class="profile-user-info profile-user-info-striped">
                                	<div class="profile-info-row">
										<div class="profile-info-name"> เลข ลสก. </div>
										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo $row['id']; ?></span>
                  						</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> ชื่อสกุลผู้ใช้งาน </div>
										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo $row['title'].$row['fname'].' '.$row['lname']; ?></span>
                  						</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> ตำแหน่ง </div>
										<div class="profile-info-value">
											<span class="editable" id="city"><?php echo $row["position_m"]; ?></span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> กลุ่มงาน </div>
										<div class="profile-info-value">
											<span class="editable" id="age"><?php echo $row["groupname"]; ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name"> หน่วยงาน </div>
										<div class="profile-info-value">
											<span class="editable" id="age"><?php echo $row["officename"]; ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> E-mail </div>
										<div class="profile-info-value">
											<span class="editable" id="login"><?php echo $row["email"]; ?></span>
										</div>
									</div>
									
								</div>
								<div class="space-6"></div>
                                
							</div>
						</div>
					</div>
                    <div class="hr hr32 hr-dotted"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function GoToEditUser(id,edituser_mode){
		window.location.href = "index.php?service=user_editing&edituser_mode="+edituser_mode+"&employer_id="+id;
	}
</script>
            