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
					<a href="index.php?service=deliverManager"> รายการบันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ (อ.ส.๐๑.๔) </a>
				</li>
				<li> เพิ่มรายการบันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ (อ.ส.๐๑.๔) </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> เพิ่มรายบันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ (อ.ส.๐๑.๔)</h1>
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
							
                            <div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลบันทึกการส่งมอบ-รับมอบแสตมป์อากร/ลูกกุญแจ </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> ลงวันที่ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
													<input class="form-control date-picker center" id="deliver_date_tf" type="text" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y'); ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>                                               
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:250px;"> เวลา </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group bootstrap-timepicker">
                                                    <input id="timepicker1" type="text" class="form-control" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-clock-o bigger-110"></i>
                                                    </span>
                                                </div>                                         
                                            </span>
										</div>
									</div>
                                </div>
                            	<div class="profile-user-info profile-user-info-striped" style="border-top:none;">
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> กรณีส่งมอบ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="checkbox">
													<label>
														<input name="form-field-checkbox" type="radio" class="ace" id="case_selected_tf" value="W" onchange="stampChecked(this)">
														<span class="lbl"> ส่งมอบและรับมอบจากการเบิกแสตมป์อากร</span>
													</label>
                                                    <label>
														<input name="form-field-checkbox" type="radio" class="ace" id="case_selected_tf" value="O" onchange="stampChecked(this)">
														<span class="lbl"> ส่งมอบและรับมอบกรณีอื่นๆ</span>
													</label>
												</div>                                              
                                            </span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;display:none;" id="withdraw_transaction_info">
                                    <div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> เลือกรายการจากใบจ่าย </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                             	<div class="input-group  col-sm-12">
                                                    <select style="width:100%;" onchange="DisplayDataInfo(this.value)" id="allowed_withdraw_transaction_id_tf">
                                                        <option value="" ></option>
                                                    <?php
                                                        $sql_wb = "SELECT tof.office_name,ta.allowed_withdraw_transaction_id,ta.pay_document_date,ta.pay_document_number,
														tof2.office_name AS allowed_officename,ta.allowed_withdraw_one_bath,ta.allowed_withdraw_five_bath,
														ta.allowed_withdraw_twenty_bath,trt.receive_transaction_id
														FROM tb_withdraw_transaction t  
														LEFT JOIN tb_office tof ON t.officeid = tof.office_code
														LEFT JOIN tb_allowed_withdraw_transaction ta ON t.withdraw_transaction_id = ta.withdraw_transaction_id
														LEFT JOIN tb_office tof2 ON tof2.office_code = ta.officeid
														LEFT JOIN tb_receive_transaction trt ON ta.allowed_withdraw_transaction_id = trt.allowed_withdraw_transaction_id
														WHERE t.officeid IN(
															SELECT tf.office_code 
															FROM tb_office tf 
															WHERE tf.office_active_status = 'Y'
														) AND ta.allowed_withdraw_transaction_id IS NOT NULL AND ta.allowed_withdraw_status='Y'
														AND t.officeid = '".$_SESSION['OFFICEID']."'
														AND ta.pay_document_date IS NOT NULL AND ta.pay_document_date <> '0000-00-00' 
														ORDER BY ta.allowed_withdraw_transaction_id DESC";
                                                        $rs_wb = mysql_query($sql_wb,$connection);
                                                        while($row_wb = mysql_fetch_array($rs_wb)){
                                                            echo '<option value="'.$row_wb['allowed_withdraw_transaction_id'].'"> ในจ่ายที่ '.$row_wb['pay_document_number'].' ลงวันที่ ['.thai_date($row_wb['pay_document_date']).']</option>';
                                                        }
                                                    ?>
                                                    </select>
                                                </div>                                     
                                            </span>
										</div>
									</div>
								</div>
                               	<div class="profile-user-info profile-user-info-striped" style="border-top:none;">
                                    <div class="profile-info-row">
										<div class="profile-info-name"  style="width:200px;"> ส่งมอบและรับมอบแสตมป์อากร </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="checkbox">
													<label>
														<input name="form-field-checkbox" type="checkbox" class="ace" id="stamp_status_tf" onchange="displayStampInfo(this);">
														<span class="lbl"> ส่งมอบและรับมอบแสตมป์อากร </span>
													</label>
												</div>                                              
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:250px;">  ส่งมอบและรับมอบลูกกุญแจ/รหัสลับ </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="checkbox">
													<label>
														<input name="form-field-checkbox" type="checkbox" class="ace" id="key_status_tf">
														<span class="lbl"> ส่งมอบและรับมอบลูกกุญแจ/รหัสลับ  </span>
													</label>
												</div>                                          
                                            </span>
										</div>
									</div>
                            	</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
                                    <div class="profile-info-row">
										<div class="profile-info-name"  style="width:200px;"> หมายเหตุ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                           		<div>
                                                    <textarea class="form-control limited" id="note_tf" maxlength="400"></textarea>
                                                </div>                                          
                                            </span>
										</div>
									</div>
                            	</div>
                                <div class="col-xs-12 col-sm-12" id="stamp_info" style="display:none;">
                                    <div class="space-12"></div>
                                    <div class="social-or-login center">
                                        <span class="bigger-110">รายละเอียดจำนวนแสตมป์อากร</span>
                                    </div>
                                    <div class="space-12"></div>
                                    <!-- #section:pages/profile.info -->
                                    <div class="profile-user-info profile-user-info-striped">
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:150px;"> ราคาดวงละ 1 บาท </div>
                                            <div class="profile-info-value col-sm-12">
                                                <span>
                                                    <div class="input-group col-sm-12">
                                                        <input class="form-control center" type="text" id="stamp_one_bath_tf" style="width:100%;" onchange="CallMoney(this.value,1,'one')">
                                                    </div>                                                
                                                </span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                            <div class="profile-info-value col-sm-12">
                                                <span>
                                                    <div class="input-group col-sm-12">
                                                        <input class="form-control center" type="text" id="money_one_bath_tf" style="width:100%;" readonly="readonly">
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:150px;"> ราคาดวงละ 5 บาท </div>
                                            <div class="profile-info-value col-sm-12">
                                                <span>
                                                    <div class="input-group col-sm-12">
                                                        <input class="form-control center" type="text" id="stamp_five_bath_tf" style="width:100%;" onchange="CallMoney(this.value,5,'five')">
                                                    </div>                                                
                                                </span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                            <div class="profile-info-value col-sm-12">
                                                <span>
                                                    <div class="input-group col-sm-12">
                                                        <input class="form-control center" type="text" id="money_five_bath_tf" style="width:100%;" readonly="readonly">
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="profile-info-row">
                                            <div class="profile-info-name" style="width:150px;"> ราคาดวงละ 20 บาท </div>
                                            <div class="profile-info-value col-sm-12">
                                                <span>
                                                    <div class="input-group col-sm-12">
                                                        <input class="form-control center" type="text" id="stamp_twenty_bath_tf" style="width:100%;" onchange="CallMoney(this.value,20,'twenty')">
                                                    </div>                                                
                                                </span>
                                            </div>
                                            <div class="profile-info-name" style="width:100px;">จำนวนเงิน</div>
                                            <div class="profile-info-value col-sm-12">
                                                <span>
                                                    <div class="input-group col-sm-12">
                                                        <input class="form-control center" type="text" id="money_twenty_bath_tf" style="width:100%;" readonly="readonly">
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               	<div class="col-xs-12 col-sm-12">
                                    <div class="space-12"></div>
                                    <div class="social-or-login center">
                                        <span class="bigger-110"> คณะกรรมการผู้ส่งมอบ </span>
                                    </div>
                                    <div class="space-12"></div>
                                    <div id="list"> 
                                        <div class="profile-user-info profile-user-info-striped profile1">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                                <div class="profile-info-value" style="width:300px;height:40px;">
                                                    <span>
                                                        <div class="input-group  col-sm-12">
                                                            <select style="width:100%;" id="deliver_id1_tf">
                                                                <option value="" ></option>
                                                            <?php
                                                                $sql_wb = "SELECT * ,tbt.withdraw_board_type_name
                                                                FROM (
                                                                    SELECT * 
                                                                    FROM tb_withdraw_document t 
                                                                    WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
                                                                    ORDER BY t.withdraw_document_date 
                                                                    DESC LIMIT 1
                                                                ) as b 
                                                                LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
                                                                LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
                                                                $rs_wb = mysql_query($sql_wb,$connection);
                                                                while($row_wb = mysql_fetch_array($rs_wb)){
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการเบิก]</option>';
                                                                }
                                                            ?>
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
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการคลัง]</option>';
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
                                                <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                                <div class="profile-info-value" style="width:300px;height:40px;">
                                                    <span>
                                                        <div class="input-group  col-sm-12">
                                                            <select style="width:100%;" id="deliver_id2_tf">
                                                                <option value="" ></option>
                                                            <?php
                                                                $sql_wb = "SELECT * ,tbt.withdraw_board_type_name
                                                                FROM (
                                                                    SELECT * 
                                                                    FROM tb_withdraw_document t 
                                                                    WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
                                                                    ORDER BY t.withdraw_document_date 
                                                                    DESC LIMIT 1
                                                                ) as b 
                                                                LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
                                                                LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
                                                                $rs_wb = mysql_query($sql_wb,$connection);
                                                                while($row_wb = mysql_fetch_array($rs_wb)){
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการเบิก]</option>';
                                                                }
                                                            ?>
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
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการคลัง]</option>';
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
                                                <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                                <div class="profile-info-value" style="width:300px;height:40px;">
                                                    <span>
                                                        <div class="input-group  col-sm-12">
                                                            <select style="width:100%;" id="deliver_id3_tf">
                                                                <option value="" ></option>
                                                            <?php
                                                                $sql_wb = "SELECT * ,tbt.withdraw_board_type_name
                                                                FROM (
                                                                    SELECT * 
                                                                    FROM tb_withdraw_document t 
                                                                    WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
                                                                    ORDER BY t.withdraw_document_date 
                                                                    DESC LIMIT 1
                                                                ) as b 
                                                                LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
                                                                LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
                                                                $rs_wb = mysql_query($sql_wb,$connection);
                                                                while($row_wb = mysql_fetch_array($rs_wb)){
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการเบิก]</option>';
                                                                }
                                                            ?>
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
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการคลัง]</option>';
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
                                <div class="col-xs-12 col-sm-12">
                                    <div class="space-12"></div>
                                    <div class="social-or-login center">
                                        <span class="bigger-110"> คณะกรรมการผู้รับมอบ </span>
                                    </div>
                                    <div class="space-12"></div>
                                    <div id="list"> 
                                        <div class="profile-user-info profile-user-info-striped profile1">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                                <div class="profile-info-value" style="width:300px;height:40px;">
                                                    <span>
                                                        <div class="input-group  col-sm-12">
                                                            <select style="width:100%;" id="receive_id1_tf">
                                                                <option value="" ></option>
                                                            <?php
                                                                $sql_wb = "SELECT * ,tbt.withdraw_board_type_name
                                                                FROM (
                                                                    SELECT * 
                                                                    FROM tb_withdraw_document t 
                                                                    WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
                                                                    ORDER BY t.withdraw_document_date 
                                                                    DESC LIMIT 1
                                                                ) as b 
                                                                LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
                                                                LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
                                                                $rs_wb = mysql_query($sql_wb,$connection);
                                                                while($row_wb = mysql_fetch_array($rs_wb)){
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการเบิก]</option>';
                                                                }
                                                            ?>
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
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการคลัง]</option>';
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
                                                <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                                <div class="profile-info-value" style="width:300px;height:40px;">
                                                    <span>
                                                        <div class="input-group  col-sm-12">
                                                            <select style="width:100%;" id="receive_id2_tf">
                                                                <option value="" ></option>
                                                            <?php
                                                                $sql_wb = "SELECT * ,tbt.withdraw_board_type_name
                                                                FROM (
                                                                    SELECT * 
                                                                    FROM tb_withdraw_document t 
                                                                    WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
                                                                    ORDER BY t.withdraw_document_date 
                                                                    DESC LIMIT 1
                                                                ) as b 
                                                                LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
                                                                LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
                                                                $rs_wb = mysql_query($sql_wb,$connection);
                                                                while($row_wb = mysql_fetch_array($rs_wb)){
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการเบิก]</option>';
                                                                }
                                                            ?>
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
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการคลัง]</option>';
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
                                                <div class="profile-info-name" style="width:100px;"> คณะกรรมการ </div>
                                                <div class="profile-info-value" style="width:300px;height:40px;">
                                                    <span>
                                                        <div class="input-group  col-sm-12">
                                                            <select style="width:100%;" id="receive_id3_tf">
                                                                <option value="" ></option>
                                                            <?php
                                                                $sql_wb = "SELECT * ,tbt.withdraw_board_type_name
                                                                FROM (
                                                                    SELECT * 
                                                                    FROM tb_withdraw_document t 
                                                                    WHERE t.withdraw_document_status = 'Y' AND t.officeid = '".$_SESSION['OFFICEID']."'
                                                                    ORDER BY t.withdraw_document_date 
                                                                    DESC LIMIT 1
                                                                ) as b 
                                                                LEFT JOIN tb_withdraw_board tb ON b.withdraw_document_id = tb.withdraw_document_id
                                                                LEFT JOIN tb_withdraw_board_type tbt ON tb.withdraw_board_type_id = tbt.withdraw_board_type_id";
                                                                $rs_wb = mysql_query($sql_wb,$connection);
                                                                while($row_wb = mysql_fetch_array($rs_wb)){
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการเบิก]</option>';
                                                                }
                                                            ?>
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
                                                                    echo '<option value="'.$row_wb['id'].'">'.$row_wb['fullname'].' ['.$row_wb['position_m'].'][คณะกรรมการคลัง]</option>';
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
                                <div class="space-10"></div>
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
                                                        <select class="form-control" id="signature_id_tf" style="width:100%;">
                                                            <option value=""></option>
                                                            <?php
                                                                $sql3 = "SELECT t.id,t.fullname,t.position_display FROM tb_signature_board t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.`status` = 'Y'";
                                                                $rs3 = mysql_query($sql3,$connection);
                                                                while($row3 = mysql_fetch_array($rs3)){
                                                                    if($row1['signature_id']==$row3['id']){
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
					</div>
                    <div class="space-10"></div>
                    <div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <div class="center">
								<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="SaveDeliver()">
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

<script type="text/javascript" src="fusion_chart/js/fusioncharts.js"></script>
<script type="text/javascript" src="fusion_chart/js/themes/fusioncharts.theme.fusion.js"></script>
<script type="text/javascript">
	function SaveDeliver(){
		var dfrom = $("#deliver_date_tf").val().split("-")
		var deliver_date = dfrom[2]+"-"+dfrom[1]+"-"+dfrom[0];
		var officeid = '<?php echo $_SESSION['OFFICEID'];?>';
		var deliver_time = $('#timepicker1').val();
		var stamp_status = $('#stamp_status_tf').is(":checked") ? 'Y':'N';
		var key_status = $('#key_status_tf').is(":checked") ? 'Y':'N';
		var stamp_one_bath = $('#stamp_one_bath_tf').val();
		var stamp_five_bath = $('#stamp_five_bath_tf').val();
		var stamp_twenty_bath = $('#stamp_twenty_bath_tf').val();
		var deliver_id1 = $("#deliver_id1_tf").val();
		var deliver_id2 = $("#deliver_id2_tf").val();
		var deliver_id3 = $("#deliver_id3_tf").val();
		var receive_id1 = $("#receive_id1_tf").val();
		var receive_id2 = $("#receive_id2_tf").val();
		var receive_id3 = $("#receive_id3_tf").val();
		var deliver_transaction_id = '<?php echo $_GET['deliver_transaction_id'];?>';
		var signature_id = $('#signature_id_tf').val();
		var note = $('#note_tf').val();
		$.ajax({
			type: "POST",
			url: "ajax/ajax_DeliverAdding.php",
			data: "deliver_transaction_id="+deliver_transaction_id+"&deliver_date="+deliver_date+"&deliver_time="+deliver_time+"&stamp_status="+stamp_status+"&key_status="+key_status+"&stamp_one_bath="+stamp_one_bath+"&stamp_five_bath="+stamp_five_bath+"&stamp_twenty_bath="+stamp_twenty_bath+"&deliver_id1="+deliver_id1+"&deliver_id2="+deliver_id2+"&deliver_id3="+deliver_id3+"&receive_id1="+receive_id1+"&receive_id2="+receive_id2+"&receive_id3="+receive_id3+"&officeid="+officeid+"&signature_id="+signature_id+"&note="+note,
			cache: false,
			success: function(data){
				if(data=="TRUE"){
					$.confirm({
						title: '',
						content: 'บันทึกข้อมูลเรียบร้อย',
						animation: 'news',
						closeAnimation: 'news',
						buttons: {
							somethingElse: {
								text: 'ตกลง',
								btnClass: 'btn-blue',
								keys: ['enter', 'shift'],
								action: function(){
									window.location.href="index.php?service=deliverManager";
								}
							}
						}
					});
				}
			}
		});

	}
	function displayStampInfo(obj){
		var item = $(obj);
		if(item.is(":checked") ){
			$('#stamp_info').show();
		}else{
			$('#stamp_info').hide();
			$("#stamp_one_bath_tf").val(0);
			$("#stamp_five_bath_tf").val(0);
			$("#stamp_twenty_bath_tf").val(0);
			$("#money_one_bath_tf").val(0);
			$("#money_five_bath_tf").val(0);
			$("#money_twenty_bath_tf").val(0);
			$("#deliver_id1_tf").val("");
			$("#deliver_id2_tf").val("");
			$("#deliver_id3_tf").val("");
			$("#allowed_withdraw_transaction_id_tf").val("");
		}
			
	}
	function stampChecked(obj){
		if($(obj).val()=="W"){
			$('#stamp_status_tf').prop( "checked", true );
			$('#stamp_info').show();
			$('#withdraw_transaction_info').show();
		}else{
			$('#stamp_status_tf').prop( "checked", false );
			$('#withdraw_transaction_info').hide();
			$('#stamp_info').hide();
			$("#stamp_one_bath_tf").val(0);
			$("#stamp_five_bath_tf").val(0);
			$("#stamp_twenty_bath_tf").val(0);
			$("#money_one_bath_tf").val(0);
			$("#money_five_bath_tf").val(0);
			$("#money_twenty_bath_tf").val(0);
			$("#deliver_id1_tf").val("");
			$("#deliver_id2_tf").val("");
			$("#deliver_id3_tf").val("");
			$("#allowed_withdraw_transaction_id_tf").val("");
		}
	}
	function CallMoney(val,multiply,tag){
		var number = val*multiply;
		$('#money_'+tag+"_bath_tf").val(number);
	}
	function DisplayDataInfo(allowed_withdraw_transaction_id){
		$.ajax({
			type: "POST",
			url: "ajax/ajax_GetAllowedTransaction.php",
			data: "allowed_withdraw_transaction_id="+allowed_withdraw_transaction_id,
			cache: false,
			success: function(data){
				var info = JSON.parse(data);
				$("#stamp_one_bath_tf").val(info[0]['allowed_withdraw_one_bath']);
				CallMoney(info[0]['allowed_withdraw_one_bath'],1,"one")
				$("#stamp_five_bath_tf").val(info[0]['allowed_withdraw_five_bath']);
				CallMoney(info[0]['allowed_withdraw_five_bath'],5,"five")
				$("#stamp_twenty_bath_tf").val(info[0]['allowed_withdraw_twenty_bath']);
				CallMoney(info[0]['allowed_withdraw_twenty_bath'],20,"twenty")
				$("#deliver_id1_tf").val(info[0]['withdraw_id1']);
				$("#deliver_id2_tf").val(info[0]['withdraw_id2']);
				$("#deliver_id3_tf").val(info[0]['withdraw_id3']);
			}
		});
	}
</script>
<?php
	function thai_date($time){
		$thai_month_arr=array(
			"0"=>"",
			"1"=>"มกราคม",
			"2"=>"กุมภาพันธ์",
			"3"=>"มีนาคม",
			"4"=>"เมษายน",
			"5"=>"พฤษภาคม",
			"6"=>"มิถุนายน", 
			"7"=>"กรกฎาคม",
			"8"=>"สิงหาคม",
			"9"=>"กันยายน",
			"10"=>"ตุลาคม",
			"11"=>"พฤศจิกายน",
			"12"=>"ธันวาคม"                 
		);
		$time = strtotime($time);
		$thai_date_return.= ((int)date("d",$time));
		$thai_date_return.=" เดือน ".$thai_month_arr[(int)date("m",$time)];
		$thai_date_return.= " พ.ศ.".(date("Y",$time)+543);
		return $thai_date_return;
	}
?>			