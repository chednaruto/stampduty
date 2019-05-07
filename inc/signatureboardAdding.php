<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
                try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
            </script>
            <ul class="breadcrumb">
                <li>
					<i class="ace-icon fa fa-home home-icon"></i><a href="index.php"> หน้าหลัก </a>
				</li>
                <li>
					<a href="index.php?service=sinatureboardManager"> จัดการผู้มีอำนาจลงนาม </a>
				</li>
				<li> เพิ่มผู้มีอำนาจลงนาม </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> เพิ่มผู้มีอำนาจลงนาม </h1>
            </div>
    
            <div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <strong class="blue">
                                
                            </strong>
                  		</div>	
					</div>


					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<!-- #section:pages/profile.picture -->
                                    <div class="space-20"></div>
									<span class="profile-picture">
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/signature-icon.png" style="width:200px;height:200px;" />
									</span>

									<!-- /section:pages/profile.picture -->
									<div class="space-4"></div>

									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
											<b href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
												&nbsp;
												<span class="white">ผู้มีอำนาจลงนาม</span>
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
								<div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลผู้มีอำนาจลงนาม </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> เลข ลสก. </div>
                                            <div class="profile-info-value col-sm-8" style="height:40px;">
                                                <span>
                                                    <div class="input-group col-sm-12">
                                                        <input class="form-control center input-sm" type="text" id="uid_tf" onkeydown="clearData()">
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="profile-info-value center col-sm-2" style="height:40px;">
                                                <span>
                                                    <div class="input-group col-sm-4">
                                                        <button class="btn btn-white btn-warning btn-sm" style="height:30px;" onclick="SearchInfo();">
                                                            <i class="ace-icon fa fa-search bigger-120 orange"></i> ค้นหา
                                                        </button>
                                                    </div>                                                
                                                </span>
                                            </div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ชื่อ-สกุล </div>
										<div class="profile-info-value col-sm-12">
											<span id="fullname_tf">&nbsp;</span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ตำแหน่ง </div>
										<div class="profile-info-value col-sm-12">
											<span id="position_m_tf">&nbsp;</span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ตำแหน่งแสดงในเอกสาร </div>
										<div class="profile-info-value col-sm-12">
											<span><input class="form-control left input-sm" type="text" id="position_display_tf" ></span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> สถานะ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="col-xs-12 center">
                                                    <label>
                                                        <input id="status_tf" class="ace ace-switch ace-switch-6" type="checkbox" checked="checked">
                                                        <span class="lbl">&nbsp;&nbsp;อนุญาต/ระงับ</span>
                                                    </label>
                                                </div>
                                            </span>
										</div>
									</div>
								</div>
                                <div class="space-12"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> </span>
                                </div>
                                <div class="space-12"></div>
                                <div class="center">
									<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="saveSignatureBoard();">
										<i class="ace-icon fa fa-floppy-o bigger-150 middle orange2"></i>
										<span class="bigger-110">บันทึก</span>
									</button>
								</div>
							</div>
                            <div class="space-10"></div>
						</div>
					</div>
                    <div class="space-10"></div>
                    <div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <div class="center">
								
							</div>
                  		</div>	
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
        </div>
    </div>
</div>
<script type="text/javascript">
	
	function saveSignatureBoard(){
		var fullname = $('#fullname_tf').text();
		var position_m = $("#position_m_tf").text();
		var position_display = $('#position_display_tf').val();
		var id = $('#uid_tf').val();
		var officeid = '<?php echo  $_SESSION['OFFICEID']; ?>';
		var status = $('#status_tf').is(':checked') ? 'Y':'N';
		if(fullname.trim()==""){
			$.alert({title: 'SDMS Alert!',content: 'กรุณากดปุ่มค้นหา',animation: 'news',closeAnimation: 'news',});
		}else{
			$.ajax({
				type: "POST",
				url: "ajax/ajax_SignatureBoardAdding.php",
				data: "id="+id+"&fullname="+fullname+"&position_m="+position_m+"&position_display="+position_display+"&officeid="+officeid+"&status="+status,
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
										window.location.href="index.php?service=signatureboardManager";
									}
								}
							}
						});
					}
				}
			});
		}
	}
	
	function clearData(){
		$('#fullname_tf').text('');
		$('#position_m_tf').text('');
		$('#position_display_tf').val('');
		
	}
	function SearchInfo(){
		var uid = $('#uid_tf').val();

		$.ajax({
			type: "POST",
			url: "ajax/ajax_AuthenUserEofficeECAR.php",
			data: "UID="+uid,
			cache: false,
			success: function(data){
				result = JSON.parse(data);
				if(result['DataUser']['Authen']){
					if( result['DataUser']['OFFICEID'] =='<?php echo $_SESSION['OFFICEID']; ?>'){
						$('#fullname_tf').text(result['DataUser']['TITLE']+result['DataUser']['FNAME']+" "+result['DataUser']['LNAME']);
						$('#position_m_tf').text(result['DataUser']['POSITION_M']);
						$('#position_display_tf').val(result['DataUser']['POSITION_M']);
					}else{
						$.alert({title: 'SDMS Alert!',content: 'เจ้าหน้าที่ท่านนี้ไม่ได้อยู่ในหน่วยงานของท่าน',animation: 'news',closeAnimation: 'news',});
					}
				}else{
					$.alert({title: 'SDMS Alert!',content: 'ไม่พบข้อมูลในระบบ E-Office',animation: 'news',closeAnimation: 'news',});
				}
			}
		});
		
	}

	
	
</script>			