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
					<a href="index.php?service=stampPartyManager">รายการสัญญาซื้อ (อ.ส.๑๑)</a>
				</li>
				<li> บันทึกสัญญาซื้อ (อ.ส.๑๑)</li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="clearfix" >
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <strong class="blue">
                                <small>บันทึกสัญญาซื้อ (อ.ส.๑๑)</small>
                            </strong>
                  		</div>	
					</div>
					<?php
						$stamp_party_transaction_id = $_GET['stamp_party_transaction_id'];
						$sqlgd = "SELECT * FROM tb_stamp_party t WHERE t.stamp_party_transaction_id = '".$stamp_party_transaction_id."'";
						$rsgd = mysql_query($sqlgd,$connection);
						$rowgd = mysql_fetch_assoc($rsgd);
					?>
					<div>
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
                                	<div class="space-30"></div>
                                    <div class="space-30"></div>
                                    <div class="space-30"></div>
									<!-- #section:pages/profile.picture -->
									<span class="profile-picture">
										<a href="#my-modal" class="tooltip-info" title="รายละเอียด" data-toggle="modal"><img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/partyLogo.png"  style="width:200px;"/></a>
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
								<!-- /section:custom/extra.grid -->
								<div class="hr hr16 dotted"></div>
							</div>
                            <div class="col-xs-12 col-sm-9" id="infomation">
								<div class="space-6"></div>
                                <div class="social-or-login center">
                                    <span class="bigger-110"> รายละเอียด </span>
                                </div>
                                <div class="space-6"></div>
                                <div class="profile-user-info profile-user-info-striped">
                                	<div class="profile-info-row">
										<div class="profile-info-name" style="width:150px;"> วันที่ขอเป็นคู่สัญญา</div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
													<input class="form-control date-picker center" id="stamp_party_accep_date_tf" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $rowgd['stamp_party_accep_date']=="0000-00-00" || $rowgd['stamp_party_accep_date']=="" ? "":date('d-m-Y',strtotime($rowgd['stamp_party_accep_date'])); ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>                                                  
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;"> วันที่ทำสัญญา</div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
													<input class="form-control date-picker center" id="stamp_party_date_tf" type="text" data-date-format="dd-mm-yyyy" value="<?php echo $rowgd['stamp_party_date']=="0000-00-00" || $rowgd['stamp_party_date']=="" ? "":date('d-m-Y',strtotime($rowgd['stamp_party_date'])); ?>"/>
													<span class="input-group-addon">
														<i class="fa fa-calendar bigger-110"></i>
													</span>
												</div>                                                  
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:100px;"> สัญญาเลขที่ </div>
                                        <div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-12">
													<input class="form-control active center" type="text" id="stamp_party_number_tf" value="<?php echo $rowgd['stamp_party_number']; ?>">
												</div>                                                  
                                            </span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:200px;"> เลขประจำตัวผู้เสียภาษี (13 หลัก)</div>
										<div class="profile-info-value col-sm-10">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="stamp_party_cid_tf" value="<?php echo $rowgd['stamp_party_cid']; ?>">
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-user bigger-110"></i>
                                                    </span>
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-value col-sm-2 center">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<button class="btn btn-white btn-warning btn-sm" style="height:33px;" onclick="SearchInfo('stamp_party_cid_tf');">
                                                    	<i class="ace-icon fa fa-search bigger-120 orange"></i>
                                                   	</button>
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-name" style="width:200px;"> เลขประจำตัวผู้เสียภาษี (10 หลัก)</div>
                                        <div class="profile-info-value col-sm-10">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <input class="form-control active center" type="text" id="stamp_party_tin_tf" >
                                                    <span class="input-group-addon">
                                                    	<i class="fa fa-user bigger-110"></i>
                                                    </span>
												</div>                                                
                                            </span>
										</div>
                                        <div class="profile-info-value col-sm-2 center">
											<span>
                                            	<div class="input-group col-sm-12">
                                                	<button class="btn btn-white btn-warning btn-sm" style="height:33px;" onclick="SearchInfo('stamp_party_tin_tf');">
                                                    	<i class="ace-icon fa fa-search bigger-120 orange"></i>
                                                   	</button>
												</div>                                                
                                            </span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
                                <div class="profile-user-info profile-user-info-striped">
                                	
									<div class="profile-info-row">
										<div class="profile-info-name"> ชื่อผู้ให้สัญญา </div>
										<div class="profile-info-value">
											<span id="fullname_tf"><input class="form-control active center" type="text" id="stamp_party_fullname_tf"></span>
										</div>
                                        <div class="profile-info-name" style="width:50px;"> อายุ </div>
										<div class="profile-info-value" style="width:80px;">
											<span id="fullname_tf"><input class="form-control active center" type="text" id="stamp_party_age_tf"></span>
										</div>
                                        <div class="profile-info-name" style="width:150px;"> ชื่อสถานประกอบการ </div>
                                        <div class="profile-info-value">
											<span id="fullname_tf"><input class="form-control active center" type="text" id="stamp_party_company_tf" ></span>
										</div>
									</div>
								</div>
								<div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name"> อาคาร </div>
										<div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_building_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> ห้องเลขที่ </div>
										<div class="profile-info-value">
											<span id="officename_tf" style="width:80px;"><input class="form-control active center" type="text" id="stamp_party_room_number_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> ชั้นที่ </div>
										<div class="profile-info-value">
											<span id="officename_tf" style="width:80px;"><input class="form-control active center" type="text" id="stamp_party_floor_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> หมู่บ้าน </div>
                                        <div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_village_name_tf" ></span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name"> เลขที่ </div>
										<div class="profile-info-value" style="width:100px;">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_address_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> หมู่ที่ </div>
										<div class="profile-info-value" style="width:70px;">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_village_moo_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:80px;"> ตรอก/ซอย </div>
										<div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_alley_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> ถนน </div>
                                        <div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_road_tf" ></span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name"> จังหวัด </div>
										<div class="profile-info-value" style="width:220px;">
											<span id="officename_tf">
                                            	<div style="220px;">
                                                    <select class="chosen-select form-control" id="stamp_party_province_id_tf" data-placeholder="จังหวัด" onchange="GetDistrice(this.value)">
                                                        <option value="">  </option>
                                                        <?php
															$sql_pv = "SELECT * FROM tb_province";
															$rs_pv = mysql_query($sql_pv,$connection);
															while($row_pv = mysql_fetch_array($rs_pv)){
																echo '<option value="'.$row_pv['province_id'].'">'.$row_pv['province_name'].'</option>';
															}
														?>
                                                    </select>
                                                </div>
                                        	</span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> อำเภอ </div>
										<div class="profile-info-value" style="width:220px;">
											<span id="officename_tf">
                                           		<div style="220px;">
                                                    <select class="chosen-select form-control" id="stamp_party_district_id_tf" data-placeholder="อำเภอ" onchange="GetSubDistrice(this.value)">
                                                        <option value="">  </option>
                                                    </select>
                                              	</div>
                                        	</span>
										</div>
                                        <div class="profile-info-name"  style="width:80px;"> ตำบล </div>
										<div class="profile-info-value">
											<span id="officename_tf">
                                           		<div style="200px;">
                                                    <select class="chosen-select form-control" id="stamp_party_subdistrict_id_tf" data-placeholder="ตำบล">
                                                        <option value="">  </option>
                                                    </select>
                                              	</div>
                                        	</span>
										</div>
									</div>
								</div>
                                <div class="profile-user-info profile-user-info-striped" style="border-top:none;">
									<div class="profile-info-row">
										<div class="profile-info-name"> รหัสไปรษณีย์ </div>
										<div class="profile-info-value">
											<span id="officename_tf"><input class="form-control active center" type="text" id="stamp_party_postcode_tf" ></span>
										</div>
                                        <div class="profile-info-name"  style="width:70px;"> โทรศัพท์ </div>
										<div class="profile-info-value">
											<span><input class="form-control active center" type="text" id="stamp_party_telephone_tf" ></span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
                                <div class="profile-user-info profile-user-info-striped">
                                	<?php
                                	if($rowgd['stamp_party_status']=='Y'){
										$Ystatus = 'checked="checked"';
                                    }else if($rowgd['stamp_party_status_tf']=='N'){
										$Nstatus = 'checked="checked"';
									}
									?>
									<div class="profile-info-row">
                                    	<div class="profile-info-name"  style="width:70px;"> คำสั่ง </div>
										<div class="profile-info-value" style="width:100px;">
											<span>
                                            	<label>
                                            		<input name="stamp_party_status_tf" type="radio" id="stamp_party_status_tf" class="ace" value="Y" <?php echo $Ystatus; ?>>
                                                    <span class="lbl"> อนุมัติ </span>
                                              	</label>
                                          	</span>
										</div>
                                        <div class="profile-info-value" style="width:190px;;">
											<span>
                                            	<label>
                                                	<input name="stamp_party_status_tf" type="radio" id="stamp_party_status_tf" class="ace" value="N" <?php echo $Nstatus; ?>>
                                                    <span class="lbl"> ไม่อนุมัติ (ระบุเหตุผล)</span>
                                             	</label>
                                         	</span>
										</div>
                                        <div class="profile-info-value">
											<span><input type="text" id="stamp_party_reason_tf" class="ace" style="width:100%;" value="<?php echo $rowgd['stamp_party_reason']; ?>"/></span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
                                <div class="profile-user-info profile-user-info-striped">
                                	
									<div class="profile-info-row">
                                    	<div class="profile-info-name"  style="width:90px;"> พยานคนที่ 1 </div>
										<div class="profile-info-value">
											<span><input name="form-field-radio" type="text" class="ace center" style="width:100%;" id="stamp_party_witness1_tf" value="<?php echo $rowgd['stamp_party_witness1']; ?>" /></span>
										</div>
                                        <div class="profile-info-name"  style="width:90px;"> พยานคนที่ 2 </div>
                                        <div class="profile-info-value">
											<span><input name="form-field-radio" type="text" class="ace center" style="width:100%;" id="stamp_party_witness2_tf" value="<?php echo $rowgd['stamp_party_witness2']; ?>" /></span>
										</div>
									</div>
								</div>
                                <div class="space-10"></div>
                                <div class="profile-user-info profile-user-info-striped" style="width:70%;">
									<div class="profile-info-row">
                                    	<div class="profile-info-name"  style="width:120px;"> ผู้มีอำนาจลงนาม </div>
										<div class="profile-info-value">
											<span>
                                            	<div class="input-group col-sm-12">
                                                    <select class="form-control" id="signature_id_tf" style="width:100%;">
                                                    	<option value="">  </option>
                                                    	<?php
															$sql3 = "SELECT t.id,t.fullname,t.position_display FROM tb_signature_board t WHERE t.officeid = '".$_SESSION['OFFICEID']."' AND t.`status` = 'Y'";
															$rs3 = mysql_query($sql3,$connection);
															while($row3 = mysql_fetch_array($rs3)){
																if($rowgd['signature_id']==$row3['id']){
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
							</div>
                            <div class="col-xs-12 col-sm-3" id=""></div>
                            <div class="col-xs-12 col-sm-9" id="">
								<!-- /section:pages/profile.info -->
								<div class="space-10"></div>
                                
								<div class="center">
									<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="saveStampParty();">
										<i class="ace-icon fa fa-floppy-o bigger-150 middle orange2"></i>
										<span class="bigger-110">บันทึกสัญญา</span>
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
	function GetDistrice(province_id,district_id){
		$('#stamp_party_subdistrict_id_tf').children('option').remove();
		$('#stamp_party_subdistrict_id_tf').trigger('chosen:updated');
		$.ajax({
			type: "POST",
			url: "ajax/ajax_GetDistrict.php",
			data: "province_id="+province_id,
			cache: false,
			success: function(data){
				result = JSON.parse(data);
				$('#stamp_party_district_id_tf').children('option').remove();
				$("#stamp_party_district_id_tf").append('<option value=" "></option>');
				for(var i = 0;i<result.length;i++){
					if(result[i]['district_id'] == district_id){
						$("#stamp_party_district_id_tf").append('<option value="'+result[i]['district_id']+'" selected="selectec">'+result[i]['district_name']+'</option>');
					}else{
						$("#stamp_party_district_id_tf").append('<option value="'+result[i]['district_id']+'">'+result[i]['district_name']+'</option>');
					}
				}
				$('#stamp_party_district_id_tf').trigger('chosen:updated');
			}
		});
	}
	
	function GetSubDistrice(district_id,subdistrict_id){
		$.ajax({
			type: "POST",
			url: "ajax/ajax_GetSubDistrict.php",
			data: "district_id="+district_id,
			cache: false,
			success: function(data){
				result = JSON.parse(data);
				$('#stamp_party_subdistrict_id_tf').children('option').remove();
				$("#stamp_party_subdistrict_id_tf").append('<option value=" "></option>');
				for(var i = 0;i<result.length;i++){
					if(subdistrict_id == result[i]['subdistrict_id']){
						$("#stamp_party_subdistrict_id_tf").append('<option value="'+result[i]['subdistrict_id']+'" selected="selected">'+result[i]['subdistrict_name']+'</option>');
					}else{
						$("#stamp_party_subdistrict_id_tf").append('<option value="'+result[i]['subdistrict_id']+'">'+result[i]['subdistrict_name']+'</option>');
					}
				}
				$('#stamp_party_subdistrict_id_tf').trigger('chosen:updated');
			}
		});
	}
	function SearchInfo(obj){
		var dataSearch = $('#'+obj).val();
		if(dataSearch.trim()!=""){
			$.ajax({
				type: "POST",
				url: "ajax/ajax_GetStampPartyInfo.php",
				data: "cid="+dataSearch,
				cache: false,
				success: function(data){
					result = JSON.parse(data);
					$('#stamp_party_fullname_tf').val(result['stamp_party_fullname']);
					$('#stamp_party_cid_tf').val(result['stamp_party_cid']);
					$('#stamp_party_tin_tf').val(result['stamp_party_tin']);
					$('#stamp_party_age_tf').val(result['stamp_party_age']);
					$('#stamp_party_company_tf').val(result['stamp_party_company']);
					$('#stamp_party_building_tf').val(result['stamp_party_building']);
					$('#stamp_party_room_number_tf').val(result['stamp_party_room_number']);
					$('#stamp_party_floor_tf').val(result['stamp_party_floor']);
					$('#stamp_party_village_name_tf').val(result['stamp_party_village_name']);
					$('#stamp_party_address_tf').val(result['stamp_party_address']);
					$('#stamp_party_village_moo_tf').val(result['stamp_party_village_moo']);
					$('#stamp_party_alley_tf').val(result['stamp_party_alley']);
					$('#stamp_party_road_tf').val(result['stamp_party_road']);
					$('#stamp_party_province_id_tf').val(result['stamp_party_province_id']).prop('selected', true);
					$('#stamp_party_province_id_tf').trigger('chosen:updated');
					GetDistrice(result['stamp_party_province_id'],result['stamp_party_district_id']);
					GetSubDistrice(result['stamp_party_district_id'],result['stamp_party_subdistrict_id']);
					$('#stamp_party_postcode_tf').val(result['stamp_party_postcode']);
					$('#stamp_party_telephone_tf').val(result['stamp_party_telephone']);
				}
			});
		}else{
			$.alert({title: 'SDMS Alert!',content: 'กรุณากรอกเลขประจำตะวผู้เสียภาษี 13 หลัก หรือ 10 หลัก ',animation: 'news',closeAnimation: 'news',});
		}
	}
	
	function saveStampParty(){
		var stamp_party_transaction_id = '<?php echo $_GET['stamp_party_transaction_id']; ?>';
		var stamp_party_number = $('#stamp_party_number_tf').val();
		var stamp_party_officeid ='<?php echo $_SESSION['OFFICEID']; ?>';
		if($("#stamp_party_accep_date_tf").val().trim()==""){
			$.alert({title: 'SDMS Alert!',content: 'กรุณาระบุวันที่ขอเป็นคู่สัญญา',animation: 'news',closeAnimation: 'news',});
			return false;
		}else{
			var dfrom = $("#stamp_party_accep_date_tf").val().split("-");
			var stamp_party_accep_date =  dfrom[2]+"-"+dfrom[1]+"-"+dfrom[0];
		}
		if($("#stamp_party_date_tf").val().trim()==""){
			$.alert({title: 'SDMS Alert!',content: 'กรุณาระบุวันที่ทำสัญญา',animation: 'news',closeAnimation: 'news',});
			return false;
		}else{
			var dfrom = $("#stamp_party_date_tf").val().split("-");
			var stamp_party_date = dfrom[2]+"-"+dfrom[1]+"-"+dfrom[0];
		}
		
		var stamp_party_cid = $('#stamp_party_cid_tf').val();
		var stamp_party_tin = $('#stamp_party_tin_tf').val();
		if(stamp_party_cid.trim()=="" && stamp_party_tin == ""){
			$.alert({title: 'SDMS Alert!',content: 'กรุณาระบุเลขผู้เสียภาษี',animation: 'news',closeAnimation: 'news',});
			return false;
		}
		var stamp_party_fullname = $('#stamp_party_fullname_tf').val();
		if(stamp_party_fullname.trim() == ""){
			$.alert({title: 'SDMS Alert!',content: 'กรุณาระบุชื่อผู้ให้สัญญา',animation: 'news',closeAnimation: 'news',});
			return false;
		}
		var stamp_party_age = $('#stamp_party_age_tf').val();
		var stamp_party_company = $('#stamp_party_company_tf').val();
		var stamp_party_building = $('#stamp_party_building_tf').val();
		var stamp_party_room_number = $('#stamp_party_room_number_tf').val();
		var stamp_party_floor = $('#stamp_party_floor_tf').val();
		var stamp_party_village_name = $('#stamp_party_village_name_tf').val();
		var stamp_party_address = $('#stamp_party_address_tf').val();
		var stamp_party_village_moo = $('#stamp_party_village_moo_tf').val();
		var stamp_party_alley = $('#stamp_party_alley_tf').val();
		var stamp_party_road = $('#stamp_party_road_tf').val();
		var stamp_party_subdistrict_id = $('#stamp_party_subdistrict_id_tf').val();
		var stamp_party_district_id = $('#stamp_party_district_id_tf').val();
		var stamp_party_province_id = $('#stamp_party_province_id_tf').val();
		var stamp_party_postcode = $('#stamp_party_postcode_tf').val();
		var stamp_party_telephone = $('#stamp_party_telephone_tf').val();
		var stamp_party_status = $("input:radio[name='stamp_party_status_tf']:checked").val();
		var stamp_party_reason = $('#stamp_party_reason_tf').val();
		var stamp_party_witness1 = $('#stamp_party_witness1_tf').val();
		var stamp_party_witness2 = $('#stamp_party_witness2_tf').val();
		var signature_id = $('#signature_id_tf').val();
		$.ajax({
			type: "POST",
			url: "ajax/ajax_StampPartyAddding.php",
			data: "stamp_party_transaction_id="+stamp_party_transaction_id+"&stamp_party_officeid="+stamp_party_officeid+"&stamp_party_date="+stamp_party_date+"&stamp_party_accep_date="+stamp_party_accep_date+"&stamp_party_cid="+stamp_party_cid+"&stamp_party_tin="+stamp_party_tin+"&stamp_party_fullname="+stamp_party_fullname+"&stamp_party_age="+stamp_party_age+"&stamp_party_company="+stamp_party_company+"&stamp_party_building="+stamp_party_building+"&stamp_party_room_number="+stamp_party_room_number+"&stamp_party_floor="+stamp_party_floor+"&stamp_party_village_name="+stamp_party_village_name+"&stamp_party_address="+stamp_party_address+"&stamp_party_village_moo="+stamp_party_village_moo+"&stamp_party_alley="+stamp_party_alley+"&stamp_party_road="+stamp_party_road+"&stamp_party_subdistrict_id="+stamp_party_subdistrict_id+"&stamp_party_district_id="+stamp_party_district_id+"&stamp_party_province_id="+stamp_party_province_id+"&stamp_party_postcode="+stamp_party_postcode+"&stamp_party_telephone="+stamp_party_telephone+"&stamp_party_status="+stamp_party_status+"&signature_id="+signature_id+"&stamp_party_reason="+stamp_party_reason+"&stamp_party_witness1="+stamp_party_witness1+"&stamp_party_witness2="+stamp_party_witness2+"&stamp_party_number="+stamp_party_number,
			cache: false,
			success: function(data){
				if(data == "TRUE"){
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
									window.location.href="index.php?service=stampPartyManager";
								}
							}
						}
					});
				}
			}
		});
	}
</script>			