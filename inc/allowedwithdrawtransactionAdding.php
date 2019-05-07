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
					<a href="index.php?service=allowedwithdrawtransactionManager"> รายการขออนุญาตจ่ายแสตมป์อากร (อ.ส.๐๑.๖)</a>
				</li>
				<li> เพิ่มรายการขออนุญาตจ่ายแสตมป์อากร (อ.ส.๐๑.๖) </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> เพิ่มรายการขออนุญาตจ่ายแสตมป์อากร (อ.ส.๐๑.๖) </h1>
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
										<a href="#my-modal-info" class="tooltip-info" title="รายละเอียด" data-toggle="modal"><img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/withdrawlogo.png" style="width:200px;height:200px;" /></a>
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
								ta.allowed_withdraw_transaction_id,ta.allowed_withdraw_date
								FROM tb_withdraw_transaction tb
								INNER JOIN tb_office tf ON tb.officeid = tf.office_code
								LEFT JOIN tb_allowed_withdraw_transaction ta ON tb.withdraw_transaction_id = ta.withdraw_transaction_id
								WHERE tb.withdraw_transaction_id = '".$_GET['withdraw_transaction_id']."'";
								$rs_wt = mysql_query($sql_wt,$connection);							
								$row_wt = mysql_fetch_assoc($rs_wt);
							?>
                            <div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลเบิกแสตมป์อากร (อ.ส.01) </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
                                	<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> หน่วยงาน </div>
										<div class="profile-info-value col-sm-12">
											<span><?php echo $row_wt['office_name']; ?></span>
										</div>
									</div>
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> คำขอเบิกแสตมป์อากรที่ </div>
										<div class="profile-info-value col-sm-12">
											<span><?php echo $row_wt['withdraw_document_id']; ?></span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ลงวันที่ </div>
										<div class="profile-info-value col-sm-12">
											<span><?php echo date('d-m-Y',strtotime($row_wt['withdraw_document_date'])); ?></span>
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
                                    <span class="bigger-110"> คณะกรรมการเบิกอากรแสตมป์ </span>
                                </div>
                                <div class="space-12"></div>
                                <div id="list"> 
                                	<?php
										$sql1 = "SELECT * ,tbt.withdraw_board_type_name
												FROM (
													SELECT * 
													FROM tb_withdraw_document t 
													WHERE t.withdraw_document_status = 'Y' 
													and t.officeid IN(
														SELECT twt.officeid 
														FROM tb_withdraw_transaction twt 
														WHERE twt.withdraw_transaction_id = '".$_GET['withdraw_transaction_id']."'
													)
													ORDER BY t.withdraw_document_date 
													DESC LIMIT 1
												) as b 
												LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
												LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id
												WHERE tb.id = '".$row_wt['withdraw_id1']."'";
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
													and t.officeid IN(
														SELECT twt.officeid 
														FROM tb_withdraw_transaction twt 
														WHERE twt.withdraw_transaction_id = '".$_GET['withdraw_transaction_id']."'
													)
													ORDER BY t.withdraw_document_date 
													DESC LIMIT 1
												) as b 
												LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
												LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id
												WHERE tb.id = '".$row_wt['withdraw_id2']."'";
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
													and t.officeid IN(
														SELECT twt.officeid 
														FROM tb_withdraw_transaction twt 
														WHERE twt.withdraw_transaction_id = '".$_GET['withdraw_transaction_id']."'
													)
													ORDER BY t.withdraw_document_date 
													DESC LIMIT 1
												) as b 
												LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
												LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id
												WHERE tb.id = '".$row_wt['withdraw_id3']."'";
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
                            <div class="space-10"></div>
                            <div class="col-xs-12 col-sm-12">
                            	<div class="space-12"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> คณะกรรมการคลังอากรแสตมป์ </span>
                                </div>
                                <div class="space-12"></div>
                                <div id="list"> 
                                    <div class="profile-user-info profile-user-info-striped profile1">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;height:40px;">
                                                <span>
                                                    <div class="input-group  col-sm-12">
                                                    	<select style="width:100%;" onchange="GetInfoStockBoard(1)" id="stock_id1_tf">
                                                        	<option value="" ></option>
                                                    	<?php
															$sql_wb = "SELECT * ,tbt.stock_board_type_name
															FROM (
																SELECT * 
																FROM tb_stock_document t 
																WHERE t.stock_document_status = 'Y' and t.officeid = '".$_SESSION['OFFICEID']."'
																ORDER BY t.stock_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id";
															$rs_wb = mysql_query($sql_wb,$connection);
															while($row_wb = mysql_fetch_array($rs_wb)){
																if($row_wt['allowed_withdraw_id1'] == $row_wb['id']){
																	echo '<option value="'.$row_wb['id'].'" selected>'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																}else{
																	echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																}
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                           
                                           <?php
										   				if($row_wt['allowed_withdraw_id1']!=""){
														
										   					$sql_ps = "SELECT tb.position_m
															FROM (
																SELECT * 
																FROM tb_stock_document t 
																WHERE t.stock_document_status = 'Y'
																ORDER BY t.stock_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
															WHERE tb.officeid = '".$_SESSION['OFFICEID']."' AND tb.id = '".$row_wt['allowed_withdraw_id1']."'";
															$rs_ps = mysql_query($sql_ps,$connection);
															$row_ps = mysql_fetch_assoc($rs_ps);
															$postion1 = $row_ps['position_m'];
														}else{
															$position1 = "&nbsp;";
														}
										   ?>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m1_stock_tf"><?php echo $postion1; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img1_stock_tf"><?php if($row_wt['allowed_withdraw_id1']!=""){ ?><img src="http://eoffice.rd.go.th/e_office/signature/<?php echo $row_wt['allowed_withdraw_id1']; ?>.jpg" style="height:32px;"/><?php } ?></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped profile2">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;height:40px;">
                                                <span>
                                                    <div class="input-group  col-sm-12">
                                                    	<select style="width:100%;" onchange="GetInfoStockBoard(2)" id="stock_id2_tf">
                                                        	<option value="" ></option>
                                                    	<?php
															$sql_wb = "SELECT * ,tbt.stock_board_type_name
															FROM (
																SELECT * 
																FROM tb_stock_document t 
																WHERE t.stock_document_status = 'Y' and t.officeid = '".$_SESSION['OFFICEID']."'
																ORDER BY t.stock_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id";
															$rs_wb = mysql_query($sql_wb,$connection);
															while($row_wb = mysql_fetch_array($rs_wb)){																
																if($row_wt['allowed_withdraw_id2'] == $row_wb['id']){
																	echo '<option value="'.$row_wb['id'].'" selected>'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																}else{
																	echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																}
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                             <?php
										   				if($row_wt['allowed_withdraw_id2']!=""){
														
										   					$sql_ps = "SELECT tb.position_m
															FROM (
																SELECT * 
																FROM tb_stock_document t 
																WHERE t.stock_document_status = 'Y'
																ORDER BY t.stock_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
															WHERE tb.officeid = '".$_SESSION['OFFICEID']."' AND tb.id = '".$row_wt['allowed_withdraw_id2']."'";
															$rs_ps = mysql_query($sql_ps,$connection);
															$row_ps = mysql_fetch_assoc($rs_ps);
															$postion = $row_ps['position_m'];
															
														}else{
															$position = "&nbsp;";
															
														}
										   ?>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m2_stock_tf"><?php echo $postion; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img2_stock_tf"><?php if($row_wt['allowed_withdraw_id2']!=""){ ?><img src="http://eoffice.rd.go.th/e_office/signature/<?php echo $row_wt['allowed_withdraw_id2']; ?>.jpg" style="height:32px;"/><?php } ?></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="profile-user-info profile-user-info-striped profile3">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                            <div class="profile-info-value" style="width:300px;height:40px;">
                                                <span>
                                                    <div class="input-group  col-sm-12">
                                                    	<select style="width:100%;" onchange="GetInfoStockBoard(3)" id="stock_id3_tf">
                                                        	<option value="" ></option>
                                                    	<?php
															$sql_wb = "SELECT * ,tbt.stock_board_type_name
															FROM (
																SELECT * 
																FROM tb_stock_document t 
																WHERE t.stock_document_status = 'Y' and t.officeid = '".$_SESSION['OFFICEID']."'
																ORDER BY t.stock_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id";
															$rs_wb = mysql_query($sql_wb,$connection);
															while($row_wb = mysql_fetch_array($rs_wb)){
																if($row_wt['allowed_withdraw_id3'] == $row_wb['id']){
																	echo '<option value="'.$row_wb['id'].'" selected>'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																}else{
																	echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['stock_board_type_name'].']</option>';
																}
															}
														?>
                                                        </select>
                                                    </div>
                                                </span>
                                            </div>
                                           	<?php
										   				if($row_wt['allowed_withdraw_id3']!=""){
														
										   					$sql_ps = "SELECT tb.position_m
															FROM (
																SELECT * 
																FROM tb_stock_document t 
																WHERE t.stock_document_status = 'Y'
																ORDER BY t.stock_document_date 
																DESC LIMIT 1
															) as b 
															LEFT JOIN tb_stock_board tb ON b.stock_document_id = tb.stock_document_id
															LEFT JOIN tb_stock_board_type tbt ON tb.stock_board_type_id = tbt.stock_board_type_id
															WHERE tb.officeid = '".$_SESSION['OFFICEID']."' AND tb.id = '".$row_wt['allowed_withdraw_id3']."'";
															$rs_ps = mysql_query($sql_ps,$connection);
															$row_ps = mysql_fetch_assoc($rs_ps);
															$postion = $row_ps['position_m'];
															
														}else{
															$position = "&nbsp;";
															
														}
										   ?>
                                            <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                            <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                <span id="position_m3_stock_tf"><?php echo $postion; ?></span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;"> ตัวอย่างลายมือชื่อ </div>
                                            <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                <span id="sinature_img3_stock_tf"><?php if($row_wt['allowed_withdraw_id3']!=""){ ?><img src="http://eoffice.rd.go.th/e_office/signature/<?php echo $row_wt['allowed_withdraw_id3']; ?>.jpg" style="height:32px;"/><?php } ?></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                               	</div>
                                <div class="space-10"></div>
							</div>
                            <div class="col-xs-12 col-sm-12">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> สถานะการจ่าย </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> สถานะการจ่าย </div>
                                        <?php
                                        if($row_wt['allowed_withdraw_status']==''){
											$z = 'checked="checked"';
                                        }else if($row_wt['allowed_withdraw_status']=='Y'){
											$y = 'checked="checked"';
										}else if($row_wt['allowed_withdraw_status']=='N'){
											$n = 'checked="checked"';
										}
										?>
										<div class="profile-info-value col-sm-12">
											<span>
                                          		<div class="checkbox">
													<label class="col-xs-3">
														<input name="allowed_withdraw_status_tf" id="allowed_withdraw_status_tf" type="radio" class="ace" value="Y" <?php echo $y; ?>>
														<span class="lbl"> อนุญาตให้จ่ายได้ </span>
													</label>
                                                    <label class="col-xs-3">
														<input name="allowed_withdraw_status_tf" id="allowed_withdraw_status_tf" type="radio" class="ace" value="N" <?php echo $n; ?>>
														<span class="lbl"> ไม่อนุญาต </span>
													</label>
                                                     <label class="col-xs-3" style="display:none;">
														<input name="allowed_withdraw_status_tf" id="allowed_withdraw_status_tf" type="radio" class="ace" value="" <?php echo $z; ?>>
														<span class="lbl"> xxxx </span>
													</label>
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
                                                    <select class="form-control" id="signature_id_tf" style="width:100%;">
                                                    	<option value=""></option>
                                                    	<?php
															$sql3 = "SELECT t.id,t.fullname,t.position_display FROM tb_signature_board t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.`status` = 'Y'";
															$rs3 = mysql_query($sql3,$connection);
															while($row3 = mysql_fetch_array($rs3)){
																if($row_wt['signature_id']==$row3['id']){
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
								<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="SaveallowedWithdrawTransaction()">
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

<div class="profile-social-links align-center">
	<div id="my-modal-info" class="modal fade" tabindex="-1">
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
                <div class="modal-footer" style="height:640px;overflow-y:scroll">
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
                                                       	<a href="#">ข้อมูลการกำหนดวงเงินของท่านเทียบอากรคงคลัง</a>  ดังนี้
                                                 	</div>
                                                    <div class="text">
                                                        <div id="chart-containerxx"></div>
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
                                                       	<a href="#">ข้อมูลแสตมป์อากรคงคลัง</a>  ดังนี้
                                                 	</div>
                                                    <div class="text">
                                                        <div id="chart-container2"></div>
                                                   	</div>
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
<script type="text/javascript" src="fusion_chart/js/fusioncharts.js"></script>
<script type="text/javascript" src="fusion_chart/js/themes/fusioncharts.theme.fusion.js"></script>
<script type="text/javascript">
	FusionCharts.ready(function() {
		var chartProperties = {
			"caption": "วงเงินเก็บรักษาแสตมป์อากรเทียบอากรคงคลัง",
			"showValues":"1",
			//"numberSuffix": "%",
			"xAxisName": "หน่วยงาน",
            "yAxisName": "จำนวนวงเงินเก็บรักษา (บาท)",
			"theme": "fusion",
			"enableMultiSlicing":"1",
			"numberSuffix":" บาท",
			"formatNumberScale":"0"
		};
		var chartProperties2 = {
			"caption": "แสตมป์อากรคงคลัง",
			"showValues":"1",
			//"numberSuffix": "%",
			"xAxisName": "รายการ",
            "yAxisName": "จำนวน(ดวง)",
			"theme": "fusion",
			"enableMultiSlicing":"1",
			"numberSuffix":" ดวง",
			"formatNumberScale":"0"
		};
		$.ajax({
			type: "POST",
			url: "AjaxChart/ajax_GetWithdrawTransactionInfo.php",
			cache: false,
			success: function(data){
				var dietChart = new FusionCharts({
					type: "stackedbar3d",
					renderAt: "chart-containerxx",
					width: "100%",
					height: "300px",
					dataFormat: "json",
					dataSource: {
					  "chart": chartProperties,
					  "categories": [
						{
						  "category": [
							{
							  "label": data['LIMITMONEY']['label']
							}
						  ]
						}
					  ],
					  "dataset": [
						{
						  "seriesname": data['LIMITMONEY']['seriesname'][0],
						  "data": [
							{
							  "value": data['LIMITMONEY']['value'][0]
							}
						  ]
						},
						{
						  "seriesname": data['LIMITMONEY']['seriesname'][1],
						  "data": [
							{
							  "value": data['LIMITMONEY']['value'][1]
							}
						  ]
						}
					  ]
					}
				}).render();
				
				var dietChart = new FusionCharts({
					type: 'column3d',
					renderAt: 'chart-container2',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
					  "chart": chartProperties2,
					  "data": data['BALANCE']
					}
				}).render();
			}
		});
		
	});
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
	function CallMoney(val,multiply,tag){
		var number = val*multiply;
		$('#money_'+tag+"_bath_tf").val(number);
	}
	function SaveallowedWithdrawTransaction(){
		var allowed_withdraw_transaction_id = '<?php echo $row_wt['allowed_withdraw_transaction_id']; ?>';
		var allowed_withdraw_date = '<?php echo $row_wt['allowed_withdraw_date']; ?>';
		var officeid = '<?php echo $_SESSION['OFFICEID']; ?>';
		var allowed_withdraw_one_bath = $('#allowed_withdraw_one_bath_tf').val();
		var allowed_withdraw_five_bath = $('#allowed_withdraw_five_bath_tf').val();
		var allowed_withdraw_twenty_bath = $('#allowed_withdraw_twenty_bath_tf').val();
		var withdraw_transaction_id = '<?php echo $_GET['withdraw_transaction_id']; ?>';
		var allowed_withdraw_id1 = $('#stock_id1_tf').val();
		var allowed_withdraw_id2 = $('#stock_id2_tf').val();
		var allowed_withdraw_id3 = $('#stock_id3_tf').val();
		var signature_id = $('#signature_id_tf').val();
		var allowed_withdraw_status = $('input[name=allowed_withdraw_status_tf]:checked').val();
		$.ajax({
			type: "POST",
			url: "ajax/ajax_AllowedWithdrawTransactionAdding.php",
			data: "allowed_withdraw_transaction_id="+allowed_withdraw_transaction_id+"&allowed_withdraw_date="+allowed_withdraw_date+"&officeid="+officeid+"&withdraw_transaction_id="+withdraw_transaction_id+"&allowed_withdraw_one_bath="+allowed_withdraw_one_bath+"&allowed_withdraw_five_bath="+allowed_withdraw_five_bath+"&allowed_withdraw_twenty_bath="+allowed_withdraw_twenty_bath+"&allowed_withdraw_id1="+allowed_withdraw_id1+"&allowed_withdraw_id2="+allowed_withdraw_id2+"&allowed_withdraw_id3="+allowed_withdraw_id3+"&signature_id="+signature_id+"&allowed_withdraw_status="+allowed_withdraw_status,
			cache: false,
			success: function(data){
				alert(data);
				
				if(data=="TRUE"){
					alert("บันทึกเรียบร้อย");
					window.location.href="index.php?service=allowedwithdrawtransactionManager"
				}else{
					alert(data);
				}
			}		
		});
	}
	
	
</script>			