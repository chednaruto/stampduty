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
				<li> จำลองสิทธิ์หน่วยงานอื่น </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> จำลองสิทธิ์หน่วยงานอื่น
 </h1>
            </div>
    
            <div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <strong class="blue">
                                <small>ค้นหารผู้ใช้งานด้วยเลข ลสก. จากระบบ E-Office ในช่อง</small></strong><strong class="red"><small> ลสก. </small>
                            </strong>
                  		</div>	
					</div>


					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<!-- #section:pages/profile.picture -->
									<span class="profile-picture">
										<a href="#my-modal" class="tooltip-info" title="รายละเอียด" data-toggle="modal"><img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/avar6.png" /></a>
									</span>

									<!-- /section:pages/profile.picture -->
									<div class="space-4"></div>

									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<b href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
												&nbsp;
												<span class="white">&nbsp;</span>
											</b>
										</div>
									</div>
								</div>

								<div class="space-6"></div>

								<!-- /section:custom/extra.grid -->
								<div class="hr hr16 dotted"></div>
							</div>

							<div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>

								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> ค้นหา เลข ลสก. </div>
										<div class="profile-info-value col-sm-10">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="uid_tf" onkeydown="infomationHide();" value="<?php echo $_SESSION['ID']; ?>">
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-user bigger-110"></i>
                                                    </span>
                                                 	
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-value col-sm-2 center">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<button class="btn btn-white btn-warning btn-sm" style="height:33px;" onclick="SearchInfo();">
                                                    	<i class="ace-icon fa fa-search bigger-120 orange"></i> ค้นหา
                                                   	</button>
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
							</div>
                            <div class="space-10"></div>
                            <div class="col-xs-12 col-sm-9" id="infomation">
								<div class="space-12"></div>
								<!-- #section:pages/profile.info -->
                                <div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลผู้ใช้งาน </span>
                                </div>
                                <div class="space-10"></div>
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> ชื่อ-สกุล </div>

										<div class="profile-info-value">
											<span id="fullname_tf">&nbsp;</span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> หน่วยงาน </div>

										<div class="profile-info-value">
											<span id="officename_tf">&nbsp;</span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> กลุ่มงาน </div>

										<div class="profile-info-value">
											<span id="groupname_tf">&nbsp;</span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> ตำแหน่ง </div>

										<div class="profile-info-value">
											<span id="position_m_tf">&nbsp;</span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Email </div>

										<div class="profile-info-value">
											<span id="email_tf">&nbsp;</span>
										</div>
									</div>
                                    <div style="display:none;">
                                    	<input name="officeid_tf" id="officeid_tf" />
                                    	<input name="id_tf" id="id_tf" />
                                        <input name="posname_tf" id="posname_tf"/>
                                        <input name="empstatus_tf" id="empstatus_tf" />
                                        <input name="class_data_tf" id="class_data_tf"  />
                                        <input name="skillid_tf" id="skillid_tf"  />
                                        <input name="pin_tf" id="pin_tf" />
                                        <input name="level_tf" id="level_tf"  /> 
                                        <input name="posact_tf" id="posact_tf"  />
                                        <input name="isadmin_tf" id="isadmin_tf"  />
                                        <input name="emptype_tf" id="emptype_tf"  />
                                        <input name="title_tf" id="title_tf"  />
                                        <input name="fname_tf" id="fname_tf"  />
                                        <input name="lname_tf" id="lname_tf"  />
                                        <input name="class_new_tf" id="class_new_tf"  />
                                    </div>
								</div>
                                <div class="space-10"></div>
							</div>
                            
                            
                            <div class="col-xs-12 col-sm-12" id="infomation2">
                                <div class="social-or-login center">
                                    <span class="bigger-110"> กำหนดสิทธิ์ในการเข้าใช้งานระบบ </span>
                                </div>
								<div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> สิทธิ์การใช้งาน </div>

										<div class="profile-info-value">
											<span class="editable" id="username">

                                            	<div class="col-xs-4">
													<label>
														<input id="withdraw_tf" class="ace ace-switch ace-switch-6" type="checkbox" checked="checked">
														<span class="lbl">&nbsp;&nbsp;การเบิกแสตมป์อากร </span>
													</label>
												</div>

                                                <div class="col-xs-4">
													<label>
														<input id="deposit_tf" class="ace ace-switch ace-switch-6" type="checkbox" checked="checked">
														<span class="lbl">&nbsp;&nbsp;การรับ/จ่ายแสตมป์อากร </span>
													</label>
												</div>
                                                <div class="col-xs-4">
													<label>
														<input id="set_limits_tf" class="ace ace-switch ace-switch-6" type="checkbox" checked="checked">
														<span class="lbl">&nbsp;&nbsp;กำหนดวงเงินเก็บรักษา </span>
													</label>
												</div>
                                                <div class="col-xs-4">
													<label>
														<input id="sell_tf" class="ace ace-switch ace-switch-6" type="checkbox" checked="checked">
														<span class="lbl">&nbsp;&nbsp;จำหน่ายแสตมป์อากร </span>
													</label>
												</div>

                                                <div class="col-xs-4">
													<label>
														<input id="agreement_tf" class="ace ace-switch ace-switch-6" type="checkbox" checked="checked">
														<span class="lbl">&nbsp;&nbsp;จัดทำคู่สัญญา </span>
													</label>
												</div>
                                                 <div class="col-xs-4">
													<label>
														<input id="board_tf" class="ace ace-switch ace-switch-6" type="checkbox" checked="checked">
														<span class="lbl">&nbsp;&nbsp;จัดการคณะกรรมการ/ผู้มีอำนาจลงนาม </span>
													</label>
												</div>
                                                <div class="col-xs-4">
													<label>
														<input id="user_manage_tf" class="ace ace-switch ace-switch-6" type="checkbox" checked="checked">
														<span class="lbl">&nbsp;&nbsp;จัดการข้อมูลผู้ใช้งาน </span>
													</label>
												</div>
                                            </span>
										</div>
									</div>
								</div>
								<div class="space-10"></div>
                                <div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> หน่วยงาน </div>

										<div class="profile-info-value">
											<span class="editable" id="username">
                                                <div class="col-xs-4">
													<label>
														<select class="chosen-select form-control" id="off_state_changde_tf" data-placeholder="หน่วยงาน" style="width:100%;">
                                                        <option value="">  </option>
                                                        <?php
															$sql_pv = "SELECT * FROM tb_office t WHERE t.office_active_status = 'Y'";
															$rs_pv = mysql_query($sql_pv,$connection);
															while($row_pv = mysql_fetch_array($rs_pv)){
																echo '<option value="'.$row_pv['office_code'].'">'.$row_pv['office_name'].'</option>';
															}
														?>
                                                    </select>
													</label>
												</div>
                                            </span>
										</div>
									</div>
								</div>
							</div>
                            
                            <div class="col-xs-12 col-sm-12" id="infomation3" >
                                <div class="social-or-login center">
                                    <span class="bigger-110"> สถานะการใช้งาน </span>
                                </div>
								<div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">										
                                    	<div class="profile-info-value">
											<span id="username">
                                            	<div class="col-xs-12 center">
													<label>
														<input id="permission_status_tf" class="ace ace-switch ace-switch-6" type="checkbox" checked="checked">
														<span class="lbl">&nbsp;&nbsp;อนุญาต/ระงับ</span>
													</label>
												</div>
                                            </span>
										</div>
									</div>
								</div>
								
								<!-- /section:pages/profile.info -->
								<div class="space-10"></div>
                                
								<div class="center">
									<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="AddingUser();">
										<i class="ace-icon fa fa-floppy-o bigger-150 middle orange2"></i>
										<span class="bigger-110">เปลี่ยนหน่วยงานชั่วคราว</span>
									</button>
								</div>
							</div>
                            
						</div>
					</div>
                    <div class="space-10"></div>
                    <div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <strong class="blue">
                                <small>&nbsp;</small></strong>
                  		</div>	
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
        </div>
    </div>
</div>

<div class="profile-social-links align-center">
	<div id="my-modal" class="modal fade" tabindex="-1">
    	<div class="modal-dialog modal-lg">
        	<div class="modal-content">
            	<div class="modal-header" style="color:#99CCCC;">
                	<div class="pull-right onpage-help-modal-buttons">
                    	<button aria-hidden="true" data-dismiss="modal" class="btn btn-white btn-danger btn-sm" type="button">
                        	<i class="ace-icon fa fa-times icon-only"></i>
                       	</button>					  
                  	</div>					  
                    <h4 class="modal-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายละเอียด</h4>					
            	</div>
                <div class="modal-footer">
                	<div>
                    	<div class="col-sm-12">
                        	<div class="widget-box">
                            	<div class="widget-body">
                                	<div class="widget-main no-padding">
                                   		<div class="dialogs">
                                        	<div class="itemdiv dialogdiv">
                                            	<div class="user">
                                               		<img alt="Alexa's Avatar" src="assets/avatars/avatar5.png" />
                                        		</div>
                                               	<div class="body" style="text-align:left;">
                                                	<div class="time">
                                                    	<i class="ace-icon fa fa-clock-o"></i>
                                                    	<span class="green">SYSTEM</span>
                                                   	</div>
                                                  	<div class="name">
                                                       	<a href="#">การเบิกแสตมป์อากร</a>  ประกอบด้วยเมนู
                                                 	</div>
                                                    <div class="text">
                                                     	<div style="margin-left:10px;">1. บันทึกแบบคำขอเบิกแสตมป์อากร อ.ส.๐๑ </div>
                                                   	</div>
                                               	</div>
                                    		</div>
                                            <div class="itemdiv dialogdiv">
                                            	<div class="user">
                                                  	<img alt="Alexa's Avatar" src="assets/avatars/avatar5.png" />
                                              	</div>
                                               	<div class="body" style="text-align:left;">
                                                 	<div class="time">
                                                     	<i class="ace-icon fa fa-clock-o"></i>
                                                        <span class="green">SYSTEM</span>
                                                    </div>
                                                   	<div class="name">
                                                   		<a href="#">การรับ/จ่ายแสตมป์อากร</a>  ประกอบด้วยเมนู
                                                  	</div>
                                                   	<div class="text">
                                                    	<div style="margin-left:10px;">1. บันทึกตั้งยอดยกมา </div>
                                                      	<div style="margin-left:10px;">2. บันทึกรายงานขออนุญาตจ่ายแสตมป์อากร อ.ส.๐๑.๖ </div>
                                                     	<div style="margin-left:10px;">3. บันทึกใบจ่ายแสตมป์อากร อ.ส.๐๑.๗</div>
                                                     	<div style="margin-left:10px;">4. บันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ อ.ส.๐๑.๔</div>
                                                   		<div style="margin-left:10px;">5. บันทึกใบตอบรับแสตมป์อากร อ.ส.๐๑.๘</div>
                                                   	</div>
                                              	</div>
                                        	</div>
                                            <div class="itemdiv dialogdiv">
                                                <div class="user">
                                                    <img alt="Alexa's Avatar" src="assets/avatars/avatar5.png" />
                                                </div>
                                                <div class="body" style="text-align:left;">
                                                    <div class="time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span class="green">SYSTEM</span>
                                                    </div>
                                                    <div class="name">
                                                        <a href="#">กำหนดวงเงินเก็บรักษา</a>  ประกอบด้วยเมนู
                                                    </div>
                                                    <div class="text">
                                                        <div style="margin-left:10px;">1. กำหนดวงเงินเก็บรักษา </div>
                                                        <div style="margin-left:10px;">2. ตรวจสอบวงเงินเก็บรักษา </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="itemdiv dialogdiv">
                                                <div class="user">
                                                    <img alt="Alexa's Avatar" src="assets/avatars/avatar5.png" />
                                                </div>
                                                <div class="body" style="text-align:left;">
                                                    <div class="time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span class="green">SYSTEM</span>
                                                    </div>
                                                    <div class="name">
                                                        <a href="#">จำหน่ายแสตมป์อากร</a>  ประกอบด้วยเมนู
                                                    </div>
                                                    <div class="text">
                                                        <div style="margin-left:10px;">1. แบบขอซื้อแสตมป์อากร อ.ส.๑๐</div>
                                                        <div style="margin-left:10px;">2. แบบนำส่งเงินจากการขายปลีกแสตมป์อากร อ.ส.๑๐.๑</div>
                                                        <div style="margin-left:10px;">3. แบบสัญญาซื้อแสตมป์อากรไปจำหน่าย อ.ส.๑๑</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="itemdiv dialogdiv">
                                                <div class="user">
                                                    <img alt="Alexa's Avatar" src="assets/avatars/avatar5.png" />
                                                </div>
                                                <div class="body" style="text-align:left;">
                                                    <div class="time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span class="green">SYSTEM</span>
                                                    </div>
                                                    <div class="name">
                                                        <a href="#">จัดทำคู่สัญญา</a>  ประกอบด้วยเมนู
                                                    </div>
                                                    <div class="text">
                                                        <div style="margin-left:10px;">1. แบบคำขอเป็นคู่สัญญาซื้อแสตมป์อากรไปจำหน่าย อ.ส.๑๑.๑</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="itemdiv dialogdiv">
                                                <div class="user">
                                                    <img alt="Alexa's Avatar" src="assets/avatars/avatar5.png" />
                                                </div>
                                                <div class="body" style="text-align:left;">
                                                    <div class="time">
                                                        <i class="ace-icon fa fa-clock-o"></i>
                                                        <span class="green">SYSTEM</span>
                                                    </div>
                                                    <div class="name">
                                                        <a href="#"> จัดการคณะกรรมการ/ผู้มีอำนาจลงนาม</a>  ประกอบด้วยเมนู
                                                    </div>
                                                    <div class="text">
                                                        <div style="margin-left:10px;">1. จัดการคณะกรรมการเบิก</div>
                                                        <div style="margin-left:10px;">2. จัดการคณะกรรมการคลัง</div>
                                                        <div style="margin-left:10px;">3. จัดการผู้มีอำนาจลงนาม</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="itemdiv dialogdiv">
                                               	<div class="user">
                                                      	<img alt="Alexa's Avatar" src="assets/avatars/avatar5.png" />
                                            	</div>
                                                <div class="body" style="text-align:left;">
                                                   	<div class="time">
                                                   		<i class="ace-icon fa fa-clock-o"></i>
                                                       	<span class="green">SYSTEM</span>
                                                   	</div>
                                                   	<div class="name">
                                                          	<a href="#"> จัดการข้อมูลผู้ใช้งาน </a>  ประกอบด้วยเมนู
                                               		</div>
                                             		<div class="text">เป็นเมนูที่ใช้ในการกำหนดวงเงินในการเก็บรักษาอากรแสตมป์ ให้แก่หน่วยงานใต้สังกัด</div>
                                            	</div>
                          					</div>
                                      	</div>
                                  	</div><!-- /.widget-main -->
                               	</div><!-- /.widget-body -->
                         	</div><!-- /.widget-box -->
                     	</div><!-- /.col -->
       				</div>
     			</div>
        	</div>
    	</div>
	</div>
</div>
<script type="text/javascript">
	$( document ).ready(function() {
		SearchInfo();
	});
	function SearchInfo(){
		var uid = $('#uid_tf').val();
		if(uid.trim()==""){
			$.alert({title: 'SDMS Alert!',content: 'กรุณากรอกเลข ลสก.',animation: 'news',closeAnimation: 'news',});
			return false;
		}
		$.ajax({
			type: "POST",
			url: "ajax/ajax_AuthenUserEofficeECAR.php",
			data: "UID="+uid,
			cache: false,
			success: function(data){
				result = JSON.parse(data);
				if(result['DataUser']['Authen']==true){
					
						$('#fullname_tf').text(result['DataUser']['TITLE']+result['DataUser']['FNAME']+" "+result['DataUser']['LNAME']);
						$('#title_tf').val(result['DataUser']['TITLE']);
						$('#fname_tf').val(result['DataUser']['FNAME']);
						$('#lname_tf').val(result['DataUser']['LNAME']);
						$('#officename_tf').text(result['DataUser']['OFFICENAME']);
						$('#groupname_tf').text(result['DataUser']['GROUPNAME']);
						$('#position_m_tf').text(result['DataUser']['POSITION_M']);
						$('#email_tf').text(result['DataUser']['EMAIL']);
						$('#officeid_tf').val(result['DataUser']['OFFICEID']);
						$('#class_new_tf').val(result['DataUser']['CLASS_NEW']);
						$('#posname_tf').val(result['DataUser']['POSNAME']);
						$('#id_tf').val(result['DataUser']['ID']);
						$('#postname_tf').val(result['DataUser']['POSTNAME']);
						$('#empstatus_tf').val(result['DataUser']['EMPSTATUS']);
						$('#class_data_tf').val(result['DataUser']['CLASS_data']);
						$('#skillid_tf').val(result['DataUser']['SKILLID']);
						$('#pin_tf').val(result['DataUser']['PIN']);
						$('#level_tf').val(result['DataUser']['LEVEL']);
						$('#posact_tf').val(result['DataUser']['POSACT']);
						$('#isadmin_tf').val(result['DataUser']['ISADMIN']);
						$('#emptype_tf').val(result['DataUser']['EMPTYPE']);
						
						infomationShow();
					
				}else{
					$.alert({title: 'SDMS Alert!',content: 'ไม่พบข้อมูลในระบบ E-Office',animation: 'news',closeAnimation: 'news',});
				}
			}
		});
		
	}
	function infomationShow(){
		$('#infomation').show();
		$('#infomation2').show();
		$('#infomation3').show();
	}
	function infomationHide(){
		$('#infomation').hide();
		$('#infomation2').hide();
		$('#infomation3').hide();
	}
	
	function AddingUser(){
		var officeid = $('#off_state_changde_tf').val();
		$.ajax({
			type: "POST",
			url: "ajax/ajax_AssignLevel.php",
			data: "officeid="+officeid,
			cache: false,
			success: function(data){
				if(data=="TRUE"){
					window.location.href="index.php?service=main";
				}
			}
		});
	}
</script>			