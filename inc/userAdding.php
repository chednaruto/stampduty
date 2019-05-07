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
                <li>
					<a href="index.php?service=userManager">ข้อมูลผู้ใช้งาน</a>
				</li>
				<li> เพิ่มข้อมูลผู้ใช้งาน </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> เพิ่มข้อมูลผู้ใช้งาน </h1>
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
                                                    <input class="form-control active center" type="text" id="uid_tf" onkeydown="infomationHide();">
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
                            <div class="col-xs-12 col-sm-9" id="infomation" style="display:none;">
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
                            
                            
                            <div class="col-xs-12 col-sm-12" id="infomation2" style="display:none;">
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
                                            	<?php
													if($_SESSION['OFFICELEVEL']!='00' ){
												?>
                                            	<div class="col-xs-4">
													<label>
														<input id="withdraw_tf" class="ace ace-switch ace-switch-6" type="checkbox">
														<span class="lbl">&nbsp;&nbsp;การเบิกแสตมป์อากร </span>
													</label>
												</div>
                                                <?php
													}
													if($_SESSION['OFFICELEVEL']!='00' || $_SESSION['OFFICEID']=="00005000"){
												?>
                                                <div class="col-xs-4">
													<label>
														<input id="deposit_tf" class="ace ace-switch ace-switch-6" type="checkbox">
														<span class="lbl">&nbsp;&nbsp;การรับ/จ่ายแสตมป์อากร </span>
													</label>
												</div>
                                                <?php
													}
													if(($_SESSION['OFFICELEVEL']!='04' && $_SESSION['OFFICELEVEL']!='00') || $_SESSION['OFFICEID']=="00011000"){
												?>
                                                <div class="col-xs-4">
													<label>
														<input id="set_limits_tf" class="ace ace-switch ace-switch-6" type="checkbox">
														<span class="lbl">&nbsp;&nbsp;กำหนดวงเงินเก็บรักษา </span>
													</label>
												</div>
                                                <?php
													}
													if($_SESSION['OFFICELEVEL']!='00' || $_SESSION['OFFICEID']=="00005000"){
												?>
                                                <div class="col-xs-4">
													<label>
														<input id="sell_tf" class="ace ace-switch ace-switch-6" type="checkbox">
														<span class="lbl">&nbsp;&nbsp;จำหน่ายแสตมป์อากร </span>
													</label>
												</div>
                                                <?php
													}
													if($_SESSION['OFFICELEVEL']!='00' || $_SESSION['OFFICEID']=="00005000"){
												?>
                                                <div class="col-xs-4">
													<label>
														<input id="agreement_tf" class="ace ace-switch ace-switch-6" type="checkbox">
														<span class="lbl">&nbsp;&nbsp;จัดทำคู่สัญญา </span>
													</label>
												</div>
                                                <?php
													}
													if($_SESSION['OFFICELEVEL']!='00' || $_SESSION['OFFICEID']=="00005000"){
												?>
                                                 <div class="col-xs-4">
													<label>
														<input id="board_tf" class="ace ace-switch ace-switch-6" type="checkbox">
														<span class="lbl">&nbsp;&nbsp;จัดการคณะกรรมการ/ผู้มีอำนาจลงนาม </span>
													</label>
												</div>
                                                <?php 
													}
												?>
                                                <div class="col-xs-4" style="display:none;">
													<label>
														<input id="user_manage_tf" class="ace ace-switch ace-switch-6" type="checkbox">
														<span class="lbl">&nbsp;&nbsp;จัดการข้อมูลผู้ใช้งาน </span>
													</label>
												</div>
                                            </span>
										</div>
									</div>
								</div>
								<div class="space-10"></div>
							</div>
                            
                            <div class="col-xs-12 col-sm-12" id="infomation3" style="display:none;">
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
										<span class="bigger-110">เพิ่มผู้ใช้งาน</span>
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
					if( result['DataUser']['OFFICEID'] =='<?php echo $_SESSION['OFFICEID']; ?>'){
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
						$.ajax({
							type: "POST",
							url: "ajax/ajax_GetPermission.php",
							data: "id="+uid,
							cache: false,
							success: function(ret){
								permiss = JSON.parse(ret);
								$('#set_limits_tf').prop( "checked", permiss['set_limits']=='Y' );
								$('#sell_tf').prop( "checked", permiss['sell']=='Y' );
								$('#withdraw_tf').prop( "checked", permiss['withdraw']=='Y' );
								$('#deposit_tf').prop( "checked", permiss['deposit']=='Y' );
								$('#agreement_tf').prop( "checked", permiss['agreement']=='Y' );
								$('#board_tf').prop( "checked", permiss['board']=='Y' );
								$('#user_manage_tf').prop( "checked", permiss['user_manage']=='Y' );
							}
						});
						infomationShow();
					}else{
						$.alert({title: 'SDMS Alert!',content: 'เจ้าหน้าที่ท่านนี้ไม่ได้อยู่ในหน่วยงานของท่าน',animation: 'news',closeAnimation: 'news',});
					}
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
		var id = $('#id_tf').val();
		var title = $('#title_tf').val();
		var fname = $('#fname_tf').val();
		var lname = $('#lname_tf').val();
		var email = $('#email_tf').text();
		var posname = $('#posname_tf').val();
		var empstatus = $('#empstatus_tf').val();
		var class_data = $('#class_data_tf').val();
		var skillid = $('#skillid_tf').val();
		var emptype = $('#emptype_tf').val();
		var officeid = $('#officeid_tf').val();
		var officename = $('#officename_tf').text();
		var pin = $('#pin_tf').val();
		var position_m = $('#position_m_tf').text();
		var class_new = $('#class_new_tf').val();
		var level = $('#level_tf').val();
		var posact = $('#posact_tf').val();
		var groupname = $('#groupname_tf').text();
		var isadmin = $('#isadmin_tf').val();
		var withdraw = $('#withdraw_tf').is(':checked') ? 'Y':'N'; 
		var deposit = $('#deposit_tf').is(':checked') ? 'Y':'N';
		var sell = $('#sell_tf').is(':checked') ? 'Y':'N'; 
		var set_limits = $('#set_limits_tf').is(':checked') ? 'Y':'N';
		var agreement = $('#agreement_tf').is(':checked') ? 'Y':'N'; 
		var board = $('#board_tf').is(':checked') ? 'Y':'N'; 
		var user_manage = $('#user_manage_tf').is(':checked') ? 'Y':'N';
		var permission_status = $('#permission_status_tf').is(':checked') ? 'Y':'N';
		
		$.ajax({
			type: "POST",
			url: "ajax/ajax_UserAdding.php",
			data: "id="+id+"&title="+title+"&fname="+fname+"&lname="+lname+"&email="+email+"&posname="+posname+"&empstatus="+empstatus+"&class_data="+class_data
			+"&skillid="+skillid+"&emptype="+emptype+"&officeid="+officeid+"&officename="+officename+"&pin="+pin+"&position_m="+position_m+"&class_new="+class_new
			+"&level="+level+"&posact="+posact+"&groupname="+groupname+"&isadmin="+isadmin+"&withdraw="+withdraw+"&deposit="+deposit+"&sell="+sell
			+"&set_limits="+set_limits+"&agreement="+agreement+"&board="+board+"&user_manage="+user_manage+"&permission_status="+permission_status,
			cache: false,
			success: function(data){
				if(data=="TRUE"){
					$.confirm({
						title: 'SDMS Alert!',
						content: 'บันทึกข้อมูลเรียบร้อย',
						animation: 'news',
						closeAnimation: 'news',
						buttons: {
							somethingElse: {
								text: 'ตกลง',
								btnClass: 'btn-blue',
								keys: ['enter', 'shift'],
								action: function(){
									window.location.href="index.php?service=userManager"
								}
							}
						}
					});
					
				}
			}
		});
	}
</script>			