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
					<a href="index.php?service=receivestampManager"> รายการรับอากรแสตมป์ </a>
				</li>
				<li> บันทึกรับแสตมป์อากร </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> บันทึกรับแสตมป์อากร </h1>
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
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/safe-icon.png" style="width:200px;height:200px;" />
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
                                <div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลการรับอากรแสตมป์ </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> จำนวนแสตมป์อากร 1 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
                                                    <input class="form-control center" type="text" id="stamp_one_bath_tf" placeholder="จำนวนดวง">
												</div>                                                
                                            </span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> จำนวนแสตมป์อากร 5 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
                                                    <input class="form-control center" type="text" id="stamp_five_bath_tf" placeholder="จำนวนดวง">
												</div>                                                
                                            </span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> จำนวนแสตมป์อากร 20 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
                                                    <input class="form-control center" type="text" id="stamp_twenty_bath_tf" placeholder="จำนวนดวง">
												</div>                                                
                                            </span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> วันที่รับ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
                                                	<?php 
														$date = date('Y-m-d');
													?>
													<input class="form-control date-picker center" id="receive_date_tf" type="text" data-date-format="yyyy-mm-dd" value="<?php echo $date; ?>" disabled="disabled"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>                                               
                                            </span>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-xs-12 col-sm-12">
                            	<div class="space-12"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลคณะกรรมการเบิกอากรแสตมป์ </span>
                                </div>
                                <div class="space-12"></div>
                                <div id="list"> 
                                    <div class="profile-user-info profile-user-info-striped profile1">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:150px;"> กรรมการเบิกคนที่ 1 </div>
                                            <div class="profile-info-value" style="height:40px;">
                                                <span>
                                                    <div class="input-group col-xs-12">
                                                    	<select style="width:100%;" id="withdraw_id1" onchange="removeWithdrawID(this,1)">
                                                        	<option value=""></option>
                                                        <?php
															$sql1 = "SELECT tb.id,tb.fullname,tb.position_m,tbt.withdraw_board_type_name 
															FROM (	
																SELECT t.withdraw_document_id
																FROM tb_withdraw_document t
																WHERE (t.withdraw_document_date <> '0000-00-00' OR t.withdraw_document_date IS NOT NULL) 
																AND t.officeid = '".$_SESSION['OFFICEID']."' AND t.withdraw_document_status = 'Y'
																ORDER BY withdraw_document_date DESC 
																LIMIT 1
															)as t 
															LEFT JOIN tb_withdraw_board tb ON t.withdraw_document_id = tb.withdraw_document_id
															LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
															$rs1 = mysql_query($sql1,$connection);
															while($row1 = mysql_fetch_array($rs1)){
																echo '<option value="'.$row1['id'].'">'.$row1['fullname']." ตำแหน่ง ".$row1['position_m']." (".$row1['withdraw_board_type_name'].')</option>';
															}
														?>
                                                        
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped profile2">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:150px;"> กรรมการเบิกคนที่ 2</div>
                                            <div class="profile-info-value" style="height:40px;">
                                                <span>
                                                    <div class="input-group col-xs-12">
                                                    	<select style="width:100%;" id="withdraw_id2" onchange="removeWithdrawID(this,2)">
                                                        	<option value=""></option>
                                                       <?php
															$sql1 = "SELECT tb.id,tb.fullname,tb.position_m,tbt.withdraw_board_type_name 
															FROM (	
																SELECT t.withdraw_document_id
																FROM tb_withdraw_document t
																WHERE (t.withdraw_document_date <> '0000-00-00' OR t.withdraw_document_date IS NOT NULL) 
																AND t.officeid = '".$_SESSION['OFFICEID']."' AND t.withdraw_document_status = 'Y'
																ORDER BY withdraw_document_date DESC 
																LIMIT 1
															)as t 
															LEFT JOIN tb_withdraw_board tb ON t.withdraw_document_id = tb.withdraw_document_id
															LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
															$rs1 = mysql_query($sql1,$connection);
															while($row1 = mysql_fetch_array($rs1)){
																echo '<option value="'.$row1['id'].'">'.$row1['fullname']." ตำแหน่ง ".$row1['position_m']." (".$row1['withdraw_board_type_name'].')</option>';
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped profile3">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:150px;"> กรรมการเบิกคนที่ 3</div>
                                            <div class="profile-info-value" style="height:40px;">
                                                <span>
                                                    <div class="input-group col-xs-12">
                                                    	<select style="width:100%;" id="withdraw_id3" onchange="removeWithdrawID(this,3)">
                                                        	<option value=""></option>
                                                        <?php
															$sql1 = "SELECT tb.id,tb.fullname,tb.position_m,tbt.withdraw_board_type_name 
															FROM (	
																SELECT t.withdraw_document_id
																FROM tb_withdraw_document t
																WHERE (t.withdraw_document_date <> '0000-00-00' OR t.withdraw_document_date IS NOT NULL) 
																AND t.officeid = '".$_SESSION['OFFICEID']."' AND t.withdraw_document_status = 'Y'
																ORDER BY withdraw_document_date DESC 
																LIMIT 1
															)as t 
															LEFT JOIN tb_withdraw_board tb ON t.withdraw_document_id = tb.withdraw_document_id
															LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
															$rs1 = mysql_query($sql1,$connection);
															while($row1 = mysql_fetch_array($rs1)){
																echo '<option value="'.$row1['id'].'">'.$row1['fullname']." ตำแหน่ง ".$row1['position_m']." (".$row1['withdraw_board_type_name'].')</option>';
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                               	</div>
                                <div class="space-10"></div>
                                <!--<div class="center">
									<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="AddListDiv();">
										<i class="ace-icon fa fa-bolt bigger-150 middle orange2"></i>
										<span class="bigger-110">เพิ่มคณะกรรมการ</span>
									</button>
								</div>-->
							</div>
                            <div class="space-10"></div>
                            <div class="col-xs-12 col-sm-12">
                            	<div class="space-12"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลคณะกรรมการคลัง </span>
                                </div>
                                <div class="space-12"></div>
                                <div id="list"> 
                                    <div class="profile-user-info profile-user-info-striped profile1">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:150px;"> กรรมการคลังคนที่ 1 </div>
                                            <div class="profile-info-value" style="height:40px;">
                                                <span>
                                                    <div class="input-group col-xs-12">
                                                    	<select style="width:100%;" id="stock_id1" onchange="removeStockID(this,1)">
                                                        	<option value=""></option>
                                                        <?php
															$sql1 = "SELECT tb.id,tb.fullname,tb.position_m,tbt.stock_board_type_name 
															FROM (	
																SELECT t.stock_document_id
																FROM tb_stock_document t
																WHERE (t.stock_document_date <> '0000-00-00' OR t.stock_document_date IS NOT NULL) 
																AND t.officeid = '".$_SESSION['OFFICEID']."' AND t.stock_document_status = 'Y'
																ORDER BY stock_document_date DESC 
																LIMIT 1
															)as t 
															LEFT JOIN tb_stock_board tb ON t.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id";
															$rs1 = mysql_query($sql1,$connection);
															while($row1 = mysql_fetch_array($rs1)){
																echo '<option value="'.$row1['id'].'">'.$row1['fullname']." ตำแหน่ง ".$row1['position_m']." (".$row1['stock_board_type_name'].')</option>';
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped profile2">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:150px;"> กรรมการคลังคนที่ 2</div>
                                            <div class="profile-info-value" style="height:40px;">
                                                <span>
                                                    <div class="input-group col-xs-12">
                                                    	<select style="width:100%;" id="stock_id2" onchange="removeStockID(this,2)">
                                                        	<option value=""></option>
                                                        <?php
															$sql1 = "SELECT tb.id,tb.fullname,tb.position_m,tbt.stock_board_type_name 
															FROM (	
																SELECT t.stock_document_id
																FROM tb_stock_document t
																WHERE (t.stock_document_date <> '0000-00-00' OR t.stock_document_date IS NOT NULL) 
																AND t.officeid = '".$_SESSION['OFFICEID']."' AND t.stock_document_status = 'Y'
																ORDER BY stock_document_date DESC 
																LIMIT 1
															)as t 
															LEFT JOIN tb_stock_board tb ON t.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id";
															$rs1 = mysql_query($sql1,$connection);
															while($row1 = mysql_fetch_array($rs1)){
																echo '<option value="'.$row1['id'].'">'.$row1['fullname']." ตำแหน่ง ".$row1['position_m']." (".$row1['stock_board_type_name'].')</option>';
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped profile3">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:150px;"> กรรมการคลังคนที่ 3</div>
                                            <div class="profile-info-value" style="height:40px;">
                                                <span>
                                                    <div class="input-group col-xs-12">
                                                    	<select style="width:100%;" id="stock_id3" onchange="removeStockID(this,3)">
                                                        <option value=""></option>
                                                        <?php
															$sql1 = "SELECT tb.id,tb.fullname,tb.position_m,tbt.stock_board_type_name 
															FROM (	
																SELECT t.stock_document_id
																FROM tb_stock_document t
																WHERE (t.stock_document_date <> '0000-00-00' OR t.stock_document_date IS NOT NULL) 
																AND t.officeid = '".$_SESSION['OFFICEID']."' AND t.stock_document_status = 'Y'
																ORDER BY stock_document_date DESC 
																LIMIT 1
															)as t 
															LEFT JOIN tb_stock_board tb ON t.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id";
															$rs1 = mysql_query($sql1,$connection);
															while($row1 = mysql_fetch_array($rs1)){
																echo '<option value="'.$row1['id'].'">'.$row1['fullname']." ตำแหน่ง ".$row1['position_m']." (".$row1['stock_board_type_name'].')</option>';
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                               	</div>
                                <div class="space-10"></div>
							</div>
						</div>
					</div>
                    <div class="space-10"></div>
                    <div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <div class="center">
								<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="saveReceiveStamp()">
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
	function removeWithdrawID(withdraw_id,val){
		for(i=1;i<=3;i++){
			if(i!=val){ $("#withdraw_id"+i+" option[value='"+$(withdraw_id).val()+"']").remove();}
		}
	}
	function removeStockID(stock_id,val){
		for(i=1;i<=3;i++){
			if(i!=val){ $("#stock_id"+i+" option[value='"+$(stock_id).val()+"']").remove();}
		}
	}
	function saveReceiveStamp(){
		var stamp_one_bath = $('#stamp_one_bath_tf').val();
		var stamp_five_bath = $('#stamp_five_bath_tf').val();
		var stamp_twenty_bath = $('#stamp_twenty_bath_tf').val();
		var receive_date = $('#receive_date_tf').val();
		var withdraw_id1 = $('#withdraw_id1').val();
		if(withdraw_id1.trim()=="" || withdraw_id1-0 ==0){
			$.alert({title: 'SDMS Alert!',content: 'กรุณาเลือกคณะกรรมการเบิก',animation: 'news',closeAnimation: 'news',});
			return false;
		}
		var withdraw_id2 = $('#withdraw_id2').val();
		var withdraw_id3 = $('#withdraw_id3').val();
		var stock_id1 = $('#stock_id1').val();
		if(stock_id1.trim()=="" || stock_id1-0 == 0){
			$.alert({title: 'SDMS Alert!',content: 'กรุณาเลือกคณะกรรมการคลัง',animation: 'news',closeAnimation: 'news',});
			return false;
		}
		var stock_id2 = $('#stock_id2').val();
		var stock_id3 = $('#stock_id3').val();
		var officeid = '<?php echo $_SESSION['OFFICEID'] ?>';
		
		$.ajax({
			type: "POST",
			url: "ajax/ajax_ReceiveStampAdding.php",
			data: "officeid="+officeid+"&receive_date="+receive_date+"&stamp_one_bath="+stamp_one_bath+"&stamp_five_bath="+stamp_five_bath+"&stamp_twenty_bath="+stamp_twenty_bath+"&withdraw_id1="+withdraw_id1+"&withdraw_id2="+withdraw_id2+"&withdraw_id3="+withdraw_id3+"&receive_id1="+stock_id1+"&receive_id2="+stock_id2+"&receive_id3="+stock_id3,
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
								window.location.href="index.php?service=receivestampManager";
							}
						}
					}
				});
			}
		});
	}
</script>			