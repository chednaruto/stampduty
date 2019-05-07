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
					<a href="index.php?service=receivetransactionManager"> รายการตอบรับแสตมป์อากร (อ.ส.๐๑.๘)</a>
				</li>
				<li> บันทึกรายการตอบรับแสตมป์อากร (อ.ส.๐๑.๘) </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> บันทึกรายการตอบรับแสตมป์อากร (อ.ส.๐๑.๘) </h1>
            </div>
    		<?php
				$sql_getData = "SELECT tr.* 
				FROM tb_allowed_withdraw_transaction t
				INNER JOIN tb_receive_transaction tr ON t.allowed_withdraw_transaction_id = tr.allowed_withdraw_transaction_id
				WHERE t.allowed_withdraw_transaction_id='".$_GET['allowed_withdraw_transaction_id']."'";
				$rs_getData = mysql_query($sql_getData,$connection);
				$row_getData = mysql_fetch_assoc($rs_getData);
			?>
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
								$sql_wt = "SELECT t.*,
								tr.stamp_one_bath,stamp_five_bath,tr.stamp_twenty_bath,
								tw.withdraw_id1,tw.withdraw_id2,tw.withdraw_id3
								FROM tb_allowed_withdraw_transaction t
								LEFT JOIN tb_receive_transaction tr ON t.allowed_withdraw_transaction_id = tr.allowed_withdraw_transaction_id
								LEFT JOIN tb_withdraw_transaction tw ON t.withdraw_transaction_id = tw.withdraw_transaction_id
								WHERE t.allowed_withdraw_transaction_id = '".$_GET['allowed_withdraw_transaction_id']."'";
								$rs_wt = mysql_query($sql_wt,$connection);							
								$row_wt = mysql_fetch_assoc($rs_wt);
								if($row_wt['pay_document_date']=="0000-00-00") {$row_wt['pay_document_date'] = "";}
							?>
                            <div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลรายการตอบรับแสตมป์อากร (อ.ส.๐๑.๘)</span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> รายการตอบรับแสตมป์อากรที่ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-9">
                                                    <input class="form-control center" type="text" id="receive_document_number_tf" style="width:100%;" value="<?php echo $row_getData['receive_document_number']; ?>">
												</div>   
                                            </span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ลงวันที่ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-9">
													<input class="form-control date-picker center" id="receive_date_tf" type="text" data-date-format="dd-mm-yyyy" value="<?php if($row_getData['receive_date']!="0000-00-00" && $row_getData['receive_date']!=""){ echo date('d-m-Y',strtotime($row_getData['receive_date']));} ?>"/>
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
                                    <span class="bigger-110">รายละเอียดจำนวนที่จ่าย และที่ได้รับไว้ (ดวง)</span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> จ่ายราคาดวงละ 1 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="amount_withdraw_one_bath_tf" style="width:100%;" readonly="readonly" value="<?php echo $row_wt['allowed_withdraw_one_bath']; ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:150px;"> จำนวนที่ได้รับไว้ </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="stamp_one_bath_tf" style="width:100%;" onchange="CallMoney(this.value,1,'one')" value="<?php if($row_getData['stamp_one_bath']==""){echo $row_wt['allowed_withdraw_one_bath'];}else{echo $row_getData['stamp_one_bath'];} ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control center" type="text" id="money_one_bath_tf" style="width:100%;" readonly="readonly" value="<?php echo $row_wt['allowed_withdraw_one_bath']; ?>">
                                                </div>
                                           	</span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> จ่ายราคาดวงละ 5 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="amount_withdraw_five_bath_tf" style="width:100%;" readonly="readonly" value="<?php echo $row_wt['allowed_withdraw_five_bath']; ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:150px;"> จำนวนที่ได้รับไว้ </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="stamp_five_bath_tf" style="width:100%;" onchange="CallMoney(this.value,5,'five')" value="<?php if($row_getData['stamp_five_bath']==""){echo $row_wt['allowed_withdraw_five_bath'];}else{echo $row_getData['stamp_five_bath'];} ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control center" type="text" id="money_five_bath_tf" style="width:100%;" readonly="readonly" value="<?php if($row_getData['stamp_five_bath']==""){echo $row_wt['allowed_withdraw_five_bath']*5;}else{echo $row_getData['stamp_five_bath']*5;} ?>">
                                                </div>
                                           	</span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> จ่ายราคาดวงละ 20 บาท </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="amount_withdraw_twenty_bath_tf" style="width:100%;" readonly="readonly" value="<?php echo $row_wt['allowed_withdraw_twenty_bath']; ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:150px;"> จำนวนที่ได้รับไว้ </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control center" type="text" id="stamp_twenty_bath_tf" style="width:100%;" onchange="CallMoney(this.value,20,'twenty')" value="<?php if($row_getData['stamp_twenty_bath']==""){echo $row_wt['allowed_withdraw_twenty_bath'];}else{echo $row_getData['stamp_twenty_bath'];} ?>">
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<input class="form-control center" type="text" id="money_twenty_bath_tf" style="width:100%;" readonly="readonly" value="<?php if($row_getData['stamp_twenty_bath']==""){echo $row_wt['allowed_withdraw_twenty_bath']*20;}else{echo $row_getData['stamp_twenty_bath']*20;} ?>">
                                                </div>
                                           	</span>
										</div>
									</div>
								</div>
							</div>
                            
                            <div class="col-xs-12 col-sm-12">
                            	<div class="space-12"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลคณะกรรมการผู้รับแสตมป์ </span>
                                </div>
                                <div class="space-12"></div>
                                <div id="list">
                                    <div class="profile-user-info profile-user-info-striped profile1">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;">
                                                <span>
                                                	<div class="input-group  col-sm-12">
                                                    	<select style="width:100%;" onchange="GetInfoStockBoard(1)" id="stock_id1_tf">
                                                        	<option value="" ></option>
                                                    	<?php
															$sql_wb = "SELECT * ,tbt.stock_board_type_name
															FROM (
																SELECT * 
																FROM tb_stock_document t 
																WHERE t.stock_document_status = 'Y' AND  t.officeid = '".$_SESSION['OFFICEID']."'
																ORDER BY t.stock_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id";
															$rs_wb = mysql_query($sql_wb,$connection);
															while($row_wb = mysql_fetch_array($rs_wb)){
																if($row_getData['receive_id1']==$row_wb['id']){
																	echo '<option value="'.$row_wb['id'].'" selected="selected">'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																	$position1 = $row_wb['position_m'];
																	$signature_img1 =  $row_wb['id'];
																}else{
																	echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																}
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m1_stock_tf"><?php echo $position1; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img1_stock_tf"><img src="http://eoffice.rd.go.th/e_office/signature/<?php echo $signature_img1; ?>.jpg" style="height:32px;"/></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped profile2">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;">
                                                <span>
                                                	<div class="input-group  col-sm-12">
                                                    	<select style="width:100%;" onchange="GetInfoStockBoard(2)" id="stock_id2_tf">
                                                        	<option value="" ></option>
                                                    	<?php
															$sql_wb = "SELECT * ,tbt.stock_board_type_name
															FROM (
																SELECT * 
																FROM tb_stock_document t 
																WHERE t.stock_document_status = 'Y' AND  t.officeid = '".$_SESSION['OFFICEID']."'
																ORDER BY t.stock_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id";
															$rs_wb = mysql_query($sql_wb,$connection);
															while($row_wb = mysql_fetch_array($rs_wb)){
																if($row_getData['receive_id2']==$row_wb['id']){
																	echo '<option value="'.$row_wb['id'].'" selected="selected">'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																	$position2 = $row_wb['position_m'];
																	$signature_img2 =  $row_wb['id'];
																}else{
																	echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																}
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m2_stock_tf"><?php echo $position2; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img2_stock_tf"><img src="http://eoffice.rd.go.th/e_office/signature/<?php echo $signature_img2; ?>.jpg" style="height:32px;"/></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="profile-user-info profile-user-info-striped profile3">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;">
                                                <span>
                                                	<div class="input-group  col-sm-12">
                                                    	<select style="width:100%;" onchange="GetInfoStockBoard(3)" id="stock_id3_tf">
                                                        	<option value="" ></option>
                                                    	<?php
															$sql_wb = "SELECT * ,tbt.stock_board_type_name
															FROM (
																SELECT * 
																FROM tb_stock_document t 
																WHERE t.stock_document_status = 'Y' AND  t.officeid = '".$_SESSION['OFFICEID']."'
																ORDER BY t.stock_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id";
															$rs_wb = mysql_query($sql_wb,$connection);
															while($row_wb = mysql_fetch_array($rs_wb)){
																if($row_getData['receive_id3']==$row_wb['id']){
																	echo '<option value="'.$row_wb['id'].'" selected="selected">'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																	$position3 = $row_wb['position_m'];
																	$signature_img3 =  $row_wb['id'];
																}else{
																	echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																}
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m3_stock_tf"><?php echo $position3; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img3_stock_tf"><img src="http://eoffice.rd.go.th/e_office/signature/<?php echo $signature_img3; ?>.jpg" style="height:32px;"/></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                               	</div>
                                <div class="space-10"></div>
							</div>
                            
                            <div class="col-xs-12 col-sm-12">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลผู้มีอำนาจลงนาม </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> ข้อมูลผู้มีอำนาจลงนาม </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <select class="form-control" id="receive_signature_id_tf" style="width:100%;">
                                                    	<option value=""></option>
                                                    	<?php
															$sql3 = "SELECT t.id,t.fullname,t.position_display FROM tb_signature_board t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.`status` = 'Y'";
															$rs3 = mysql_query($sql3,$connection);
															while($row3 = mysql_fetch_array($rs3)){
																if($row3['id']==$row_getData['signature_id']){
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
								<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="SaveReceiveTransaction()">
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
	function GetInfoStockBoard(tag){
		var id = $('#stock_id'+tag+'_tf').val();
		if(id.trim()!=""){
			$.ajax({
				type: "POST",
				url: "ajax/ajax_GetStockBoardInfo.php",
				data: "id="+id,
				cache: false,
				success: function(data){
					var info = JSON.parse(data);
					$('#sinature_img'+tag+'_stock_tf').empty();
					$('#position_m'+tag+'_stock_tf').text('');
					$('#sinature_img'+tag+'_stock_tf').append('<img src="http://eoffice.rd.go.th/e_office/signature/'+id+'.jpg" style="height:32px;"/>')
					$('#position_m'+tag+'_stock_tf').text(info['position_m']);
				}
			});
		}else{
			$('#sinature_img'+tag+'_stock_tf').empty();
			$('#position_m'+tag+'_stock_tf').text('');
		}
	}
	function SaveReceiveTransaction(){
		var receive_transaction_id = '<?php echo $row_getData['receive_transaction_id']; ?>';
		var officeid = '<?php echo $_SESSION['OFFICEID']; ?>';
		var receive_document_number = $("#receive_document_number_tf").val();
		var dfrom = $("#receive_date_tf").val().split("-")
		var receive_date = dfrom[2]+"-"+dfrom[1]+"-"+dfrom[0];
		var allowed_withdraw_transaction_id = '<?php echo $_GET['allowed_withdraw_transaction_id']; ?>';
		var stamp_one_bath = $('#stamp_one_bath_tf').val();
		var stamp_five_bath = $('#stamp_five_bath_tf').val();
		var stamp_twenty_bath = $('#stamp_twenty_bath_tf').val();
		var withdraw_id1 = '<?php $row_wt['withdraw_id1']; ?>';
		var withdraw_id2 = '<?php $row_wt['withdraw_id2']; ?>';
		var withdraw_id3 = '<?php $row_wt['withdraw_id3']; ?>';
		var receive_id1 = $('#stock_id1_tf').val();
		var receive_id2 = $('#stock_id2_tf').val();
		var receive_id3 = $('#stock_id3_tf').val();
		var signature_id = $('#receive_signature_id_tf').val();
		$.ajax({
			type: "POST",
			url: "ajax/ajax_ReceiveStampAdding.php",
			data: "receive_transaction_id="+receive_transaction_id+"&officeid="+officeid+"&receive_date="+receive_date+"&allowed_withdraw_transaction_id="+allowed_withdraw_transaction_id+"&stamp_one_bath="+stamp_one_bath+"&stamp_five_bath="+stamp_five_bath+"&stamp_twenty_bath="+stamp_twenty_bath+"&withdraw_id1="+withdraw_id1+"&withdraw_id2="+withdraw_id2+"&withdraw_id3="+withdraw_id3+"&receive_id1="+receive_id1+"&receive_id2="+receive_id2+"&receive_id3="+receive_id3+"&signature_id="+signature_id+"&receive_document_number="+receive_document_number,
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
								window.location.href="index.php?service=receivetransactionManager";
							}
						}
					}
				});
			}
		});
	}
	
</script>			