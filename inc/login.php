<div class="main-content">
	<div class="row" >
		<div class="col-sm-10 col-sm-offset-1">
			<div class="login-container">
				<div class="center">
                	<div class="space-30"></div>
                    <div class="space-30"></div>
                    <div class="space-30"></div>
					<h1><i class="ace-icon fa fa-laptop red" style="margin-right:5px;"></i><span class="red">เข้าสู่ระบบ</span></h1>
				</div>

				<div class="position-relative">
					<div id="login-box" class="login-box visible widget-box no-border">
						<div class="widget-body">
							<div class="widget-main">
								<h4 class="header blue lighter bigger"></h4>
								<div class="space-3"></div>
								<form>
									<fieldset>
										<label class="block clearfix">
											<span class="block input-icon input-icon-right">
												<input type="text" class="form-control" placeholder="Username" id="username_tf" onkeyup="var start = this.selectionStart;var end = this.selectionEnd;this.value = this.value.toUpperCase();this.setSelectionRange(start, end);"/>
												<i class="ace-icon fa fa-user"></i>
											</span>
										</label>
										<label class="block clearfix">
											<span class="block input-icon input-icon-right">
												<input type="password" class="form-control" placeholder="Password"  id="password_tf"/>
												<i class="ace-icon fa fa-lock"></i>
											</span>
										</label>
                                        <div class="space"></div>
                                        <div class="clearfix center">
											<button type="button" class="width-35 btn btn-sm btn-primary" onclick="Login();">
												<i class="ace-icon fa fa-key"></i>
												<span class="bigger-110">เข้าสู่ระบบ</span>
											</button>
										</div>
										<div class="space-4"></div>
									</fieldset>
								</form>
								<div class="social-or-login center">
									<span class="bigger-110"> เข้าสู่ระบบโดยใช้รหัสจากระบบ E-Office </span>
								</div>
								<div class="space-6"></div>
                                
							</div><!-- /.widget-main -->
						</div><!-- /.widget-body -->
					</div><!-- /.login-box -->
				</div><!-- /.position-relative -->
			</div>
            <div class="space-6"></div>
            <div class="profile-contact-info" style="background-color:#FFFFFF;">
                <div class="profile-contact-links align-left" style="background-color:#FFFFFF;border:none;">
                    <div class="profile-social-links align-center">
                    	<div class="social-or-login center">
							<span class="bigger-110"> Browser ที่รองรับระบบนี้ </span>
						</div>
                    </div>
                    <div class="space-6"></div>
                    <div class="profile-social-links align-center">
                        <button class="btn btn-xs btn-Info" style="border-radius: 12px;" onclick="window.open('https://www.google.com/intl/th/chrome/', '_blank');">
							<img src="assets/avatars/chrome_logo.png" height="21" width="21" /><b> Google Chrome </b>
							<i class="ace-icon fa fa-download icon-on-right"></i>
						</button>
                        <button class="btn btn-xs btn-Info" style="border-radius: 12px;" onclick="window.open('http://download.microsoft.com/download/A/A/3/AA3E9FC6-265D-494F-8082-898DED751490/IE11-Windows6.1-x86-th-th.exe', '_blank');">
							<img src="assets/avatars/IE.png" height="22" width="22" /><b> Internet Explorer Version 9 ขึ้นไป </b>
							<i class="ace-icon fa fa-download icon-on-right"></i>
						</button>
                        <button class="btn btn-xs btn-Info" style="border-radius: 12px;" onclick="window.open('https://www.microsoft.com/en-us/download/details.aspx?id=48126', '_blank');">
							<img src="assets/avatars/microsoft_edge_icon.png" height="22" width="22" /><b> Microsoft Edge </b>
							<i class="ace-icon fa fa-download icon-on-right"></i>
						</button>
                        <button class="btn btn-xs btn-Info" style="border-radius: 12px;" onclick="window.open('https://www.mozilla.org/th/firefox/new/', '_blank');">
							<img src="assets/avatars/Firefox.png" height="22" width="22" /><b> Mozilla Firefox </b>
							<i class="ace-icon fa fa-download icon-on-right"></i>
						</button>
                    </div>
                     <div class="space-6"></div>
                    <div class="space-6"></div>
                    <div class="profile-social-links align-center">
                        <div class="social-or-login center" >
							<span class="bigger-110"></span>
						</div>
                    </div>
                    <div class="space-6"></div>
                    <div class="profile-contact-info">
                        <div class="profile-contact-links align-center">
                            <a href="#" class="btn btn-link">
                                <i class="ace-icon fa fa-envelope bigger-120 pink"></i>
                                sup.it@rd.go.th
                            </a>
                        </div>
                    </div>
                </div>
            </div>
		</div><!-- /.col -->
        
	</div><!-- /.row -->
</div><!-- /.main-content -->

<script>
	function UpperCase(val){
		return val.toUpperCase()
	}
	function Login(){
		 username = $('#username_tf').val();
		 password = $('#password_tf').val();
		 if(username.trim()==""){
			$.alert({title: '',content: '<div style="vertical-align:middle;text-align:center;"> กรุณาระบุชื่อผู้ใช้งาน (Username) </div>',animation: 'news',closeAnimation: 'news',buttons: {okay: {text: 'ตกลง'}}});
			$('#username_tf').focus();
			return false;
		}
		
		if(password.trim()==""){
			$.alert({title: '',content: '<div style="vertical-align:middle;text-align:center;"> กรุณาระบุรหัสผ่านผู้ใช้งาน (Password) </div>',animation: 'news',closeAnimation: 'news',buttons: {okay: {text: 'ตกลง'}}});
			$('#password_tf').focus();
			return false;
		}
		//waitingDialog.show()
		$.ajax({
			type: "POST",
			url: "ajax/ajax_Login.php",
			data: "username="+username+"&password="+password,
			cache: false,
			success: function(data){
				//alert(data);
				waitingDialog.hide()
				result = JSON.parse(data);
				if(result.EOFAuthen=="true"){
					/*$.confirm({
						title: 'SDMS Alert!',
						content: 'เข้าสู่ระบบเรียบร้อย',
						animation: 'news',
						closeAnimation: 'news',
						buttons: {
							somethingElse: {
								text: 'ตกลง',
								btnClass: 'btn-blue',
								keys: ['enter', 'shift'],
								action: function(){*/
									location.href = "index.php";
								/*}
							}
						}
					});*/
				}else{
					$.alert({title: '',content: '<div style="vertical-align:middle;text-align:center;"> คุณไม่สามารถเข้าใช้งานระบบได้ <br>เนื่องจากไม่มีข้อมูลในระบบ E-Office </div>',animation: 'news',closeAnimation: 'news',buttons: {okay: {text: 'ตกลง'}}});
				}
				
			}
		});

	}
</script>
