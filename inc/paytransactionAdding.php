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
					<a href="index.php?service=paytransactionManager"> รายการใบจ่ายแสตมป์อากร (อ.ส.๐๑.๗)</a>
				</li>
				<li> บันทึกรายการใบจ่ายแสตมป์อากร (อ.ส.๐๑.๗)</li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> บันทึกรายการใบจ่ายแสตมป์อากร (อ.ส.๐๑.๗) </h1>
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
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/withdrawlogo.png" style="width:200px;height:200px;" />
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
							<?php
								$sql_wt = "SELECT tb.*,tf.office_name,ta.allowed_withdraw_one_bath,ta.allowed_withdraw_five_bath,
								ta.allowed_withdraw_twenty_bath,ta.allowed_withdraw_date,ta.allowed_withdraw_id1,ta.allowed_withdraw_id2,ta.allowed_withdraw_id3,
								ta.allowed_withdraw_id1,ta.allowed_withdraw_id2,ta.allowed_withdraw_id3,ta.allowed_withdraw_status,ta.allowed_withdraw_date,ta.signature_id,
								ta.allowed_withdraw_transaction_id,ta.allowed_withdraw_date,
								ta.pay_signature_id,ta.pay_document_number,ta.pay_document_date
								FROM tb_withdraw_transaction tb
								INNER JOIN tb_office tf ON tb.officeid = tf.office_code
								LEFT JOIN tb_allowed_withdraw_transaction ta ON tb.withdraw_transaction_id = ta.withdraw_transaction_id
								WHERE tb.withdraw_transaction_id = '".$_GET['withdraw_transaction_id']."'";
								$rs_wt = mysql_query($sql_wt,$connection);							
								$row_wt = mysql_fetch_assoc($rs_wt);
								if($row_wt['pay_document_date']=="0000-00-00") {$row_wt['pay_document_date'] = "";}
							?>
                            <div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลใบจ่ายแสตมป์อากร (อ.ส.๐๑.๗)</span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> ใบจ่ายแสตมป์อากรที่ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-9">
                                                    <input class="form-control center" type="text" id="pay_document_number_tf" style="width:100%;" value="<?php echo $row_wt['pay_document_number']; ?>">
												</div>   
                                            </span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ลงวันที่ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-9">
													<input class="form-control date-picker center" id="pay_document_date_tf" type="text" data-date-format="dd-mm-yyyy" value="<?php  if($row_wt['pay_document_date']!='0000-00-00' && $row_wt['pay_document_date'] != "" ){ echo date('d-m-Y',strtotime($row_wt['pay_document_date']));} ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div> 
                                            </span>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110">รายละเอียดจำนวนที่ขอเบิกและจำนวนที่อนุญาตให้จ่ายได้ (ดวง) </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> ราคาดวงละ 1 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="amount_withdraw_one_bath_tf" style="width:100%;" readonly="readonly" value="<?php echo $row_wt['amount_withdraw_one_bath']; ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:150px;"> อนุญาตให้จ่ายได้ </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="allowed_withdraw_one_bath_tf" style="width:100%;" onchange="CallMoney(this.value,1,'one')" value="<?php if($row_wt["allowed_withdraw_one_bath"]==""){echo $row_wt['amount_withdraw_one_bath'];}else{echo $row_wt['allowed_withdraw_one_bath'];} ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control center" type="text" id="money_one_bath_tf" style="width:100%;" readonly="readonly" value="<?php if($row_wt["allowed_withdraw_one_bath"]==""){echo $row_wt['amount_withdraw_one_bath'];}else{echo $row_wt['allowed_withdraw_one_bath'];} ?>">
                                                </div>
                                           	</span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> ราคาดวงละ 5 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="amount_withdraw_five_bath_tf" style="width:100%;" readonly="readonly" value="<?php echo $row_wt['amount_withdraw_five_bath']; ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:150px;"> อนุญาตให้จ่ายได้ </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="allowed_withdraw_five_bath_tf" style="width:100%;" onchange="CallMoney(this.value,5,'five')" value="<?php if($row_wt["allowed_withdraw_five_bath"]==""){echo $row_wt['amount_withdraw_five_bath'];}else{echo $row_wt['allowed_withdraw_five_bath'];} ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control center" type="text" id="money_five_bath_tf" style="width:100%;" readonly="readonly" value="<?php if($row_wt["allowed_withdraw_five_bath"]==""){echo $row_wt['amount_withdraw_five_bath']*5;}else{echo $row_wt['allowed_withdraw_five_bath']*5;} ?>">
                                                </div>
                                           	</span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> ราคาดวงละ 20 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="amount_withdraw_twenty_bath_tf" style="width:100%;" readonly="readonly" value="<?php echo $row_wt['amount_withdraw_twenty_bath']; ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:150px;"> อนุญาตให้จ่ายได้ </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="allowed_withdraw_twenty_bath_tf" style="width:100%;" onchange="CallMoney(this.value,20,'twenty')" value="<?php if($row_wt["allowed_withdraw_five_bath"]==""){echo $row_wt['amount_withdraw_twenty_bath'];}else{echo $row_wt['allowed_withdraw_twenty_bath'];} ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control center" type="text" id="money_twenty_bath_tf" style="width:100%;" readonly="readonly" value="<?php if($row_wt["allowed_withdraw_five_bath"]==""){echo $row_wt['amount_withdraw_twenty_bath']*20;}else{echo $row_wt['allowed_withdraw_twenty_bath']*20;} ?>">
                                                </div>
                                           	</span>
										</div>
									</div>
								</div>
							</div>
                            
                            <div class="col-xs-12 col-sm-12">
                            	<div class="space-12"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> คณะกรรมการผู้รับแสตมป์ </span>
                                </div>
                                <div class="space-12"></div>
                                <div id="list"> 
                                	<?php
										$sql1 = "SELECT * ,tbt.withdraw_board_type_name
												FROM (
													SELECT * 
													FROM tb_withdraw_document t 
													WHERE t.withdraw_document_status = 'Y' 
													AND t.officeid IN(
														SELECT twt.officeid 
														FROM tb_withdraw_transaction twt 
														WHERE twt.withdraw_transaction_id = '".$_GET['withdraw_transaction_id']."'
													)
													ORDER BY t.withdraw_document_date 
													DESC LIMIT 1
												) as b 
												LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
												LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id
												WHERE  tb.id = '".$row_wt['withdraw_id1']."'";
										$rs1 = mysql_query($sql1,$connection);
										$row1 = mysql_fetch_assoc($rs1);
														
									?>
                                    <div class="profile-user-info profile-user-info-striped profile1">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;">
                                                <span><?php echo $row1['fullname']; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m1_tf"><?php echo $row1['position_m']; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img1_tf"><?php if($row1['fullname']!=""){ echo '<a href="http://eoffice.rd.go.th/e_office/signature/'.$row1['id'].'.jpg" target="_blank"><img src="http://eoffice.rd.go.th/e_office/signature/'.$row1['id'].'.jpg" style="height:24px;"  /></a>';} ?></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <?php
										$sql1 = "SELECT * ,tbt.withdraw_board_type_name
												FROM (
													SELECT * 
													FROM tb_withdraw_document t 
													WHERE t.withdraw_document_status = 'Y' 
													AND t.officeid IN(
														SELECT twt.officeid 
														FROM tb_withdraw_transaction twt 
														WHERE twt.withdraw_transaction_id = '".$_GET['withdraw_transaction_id']."'
													)
													ORDER BY t.withdraw_document_date 
													DESC LIMIT 1
												) as b 
												LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
												LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id
												WHERE  tb.id = '".$row_wt['withdraw_id2']."'";
										$rs1 = mysql_query($sql1,$connection);
										$row1 = mysql_fetch_assoc($rs1);
														
									?>
                                    <div class="profile-user-info profile-user-info-striped profile2">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;">
                                                <span><?php echo $row1['fullname']; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m2_tf"><?php echo $row1['position_m']; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img2_tf"><?php if($row1['fullname']!=""){ echo '<a href="http://eoffice.rd.go.th/e_office/signature/'.$row1['id'].'.jpg" target="_blank"><img src="http://eoffice.rd.go.th/e_office/signature/'.$row1['id'].'.jpg" style="height:24px;"  /></a>';} ?></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <?php
										$sql1 = "SELECT * ,tbt.withdraw_board_type_name
												FROM (
													SELECT * 
													FROM tb_withdraw_document t 
													WHERE t.withdraw_document_status = 'Y' 
													AND t.officeid IN(
														SELECT twt.officeid 
														FROM tb_withdraw_transaction twt 
														WHERE twt.withdraw_transaction_id = '".$_GET['withdraw_transaction_id']."'
													)
													ORDER BY t.withdraw_document_date 
													DESC LIMIT 1
												) as b 
												LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
												LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id
												WHERE  tb.id = '".$row_wt['withdraw_id3']."'";
										$rs1 = mysql_query($sql1,$connection);
										$row1 = mysql_fetch_assoc($rs1);
														
									?>
                                    <div class="profile-user-info profile-user-info-striped profile3">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;">
                                                <span><?php echo $row1['fullname']; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m3_tf"><?php echo $row1['position_m']; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img3_tf"><?php if($row1['fullname']!=""){ echo '<a href="http://eoffice.rd.go.th/e_office/signature/'.$row1['id'].'.jpg" target="_blank"><img src="http://eoffice.rd.go.th/e_office/signature/'.$row1['id'].'.jpg" style="height:24px;"  /></a>';} ?></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                               	</div>
                                <div class="space-10"></div>
							</div>
                            
                            <div class="col-xs-12 col-sm-12">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> ผู้มีอำนาจลงนาม </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> ผู้มีอำนาจลงนาม </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <select class="form-control" id="pay_signature_id_tf" style="width:100%;">
                                                    	<option value=""></option>
                                                    	<?php
															$sql3 = "SELECT t.id,t.fullname,t.position_display FROM tb_signature_board t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.`status` = 'Y'";
															$rs3 = mysql_query($sql3,$connection);
															while($row3 = mysql_fetch_array($rs3)){
																if($row_wt['pay_signature_id']==$row3['id']){
																	echo '<option value="'.$row3[id].'" selected="selected">'.$row3['fullname'].' ['.$row3['position_display'].']'.'</option>';
																}else{
																	echo '<option value="'.$row3[id].'">'.$row3['fullname'].' ['.$row3['position_display'].']'.'</option>';
																}
															}
														?>
													</select>
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> </span>
                                </div>
                                <div class="space-10"></div>
							</div>
						</div>
					</div>
                    <div class="space-10"></div>
                    <div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <div class="center">
								<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="SavePayTransaction()">
									<i class="ace-icon fa fa-floppy-o bigger-150 middle orange2"></i>
									<span class="bigger-110">บันทึก</span>
								</button>
							</div>
                  		</div>	
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
        </div>
    </div>
</div>
<script type="text/javascript">
	
	function CallMoney(val,multiply,tag){
		var number = val*multiply;
		$('#money_'+tag+"_bath_tf").val(number);
	}
	function SavePayTransaction(){
		var allowed_withdraw_transaction_id = '<?php echo $row_wt['allowed_withdraw_transaction_id']; ?>';
		var pay_document_number = $('#pay_document_number_tf').val();
		var dfrom = $("#pay_document_date_tf").val().split("-")
		var pay_document_date = dfrom[2]+"-"+dfrom[1]+"-"+dfrom[0];
		var pay_signature_id = $('#pay_signature_id_tf').val();
		$.ajax({
			type: "POST",
			url: "ajax/ajax_PayTransactionAdding.php",
			data: "allowed_withdraw_transaction_id="+allowed_withdraw_transaction_id+"&pay_document_number="+pay_document_number+"&pay_document_date="+pay_document_date+"&pay_signature_id="+pay_signature_id,
			cache: false,
			success: function(data){
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
								window.location.href="index.php?service=paytransactionManager";
							}
						}
					}
				});
				
			}
		});
	}
	
	
</script>			