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
					<a href="index.php?service=stockboardManager"> จัดการคณะกรรมการคลัง </a>
				</li>
				<li> แก้ไขคณะกรรมการคลัง </li>
            </ul>
            <label style="float:right;"><?php echo $_SESSION['OFFICENAME'] ?><label>
		</div>

        <div class="page-content">
            <div class="page-header">
                <h1> แก้ไขคณะกรรมการคลัง </h1>
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
										<img id="avatar" class="editable img-responsive" alt="Alex's Avatar" src="assets/avatars/board.png" style="width:200px;height:200px;" />
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
								$sql1 = "SELECT * FROM tb_stock_document t WHERE t.stock_document_id='".$_GET['stock_document_id']."'";
								$rs1 = mysql_query($sql1,$connection);
								$row1 = mysql_fetch_assoc($rs1);
								if($row1['stock_document_date']=="0000-00-00"){
									$row1['stock_document_date'] = "";
								}
								if($row1['stock_document_old_date']=="0000-00-00"){
									$row1['stock_document_old_date'] = "";
								}
							?>
                            <div class="col-xs-12 col-sm-9">
								<div class="space-12"></div>
								<div class="social-or-login center">
                                    <span class="bigger-110"> ข้อมูลคำสั่งแต่งตั้งคณะกรรมการคลังอากรแสตมป์ </span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> เลขที่คำสั่ง </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
                                                    <input class="form-control center" type="text" id="stock_document_number_tf" value="<?php echo $row1['stock_document_number']; ?>">
												</div>                                                
                                            </span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ลงวันที่ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
													<input class="form-control date-picker center" id="stock_document_date_tf" type="text" data-date-format="dd-mm-yyyy" value="<?php if($row1['stock_document_date']!="0000-00-00" && $row1['stock_document_date'] != ""){echo date('d-m-Y',strtotime($row1['stock_document_date']));} ?>"/>
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
                                    <span class="bigger-110"> ยกเลิกคำสั่งแต่งตั้งคณะกรรมการคลังกอากรแสตมป์ (เดิม)</span>
                                </div>
                                <div class="space-12"></div>
								<!-- #section:pages/profile.info -->
								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name" style="width:300px;"> เลขที่คำสั่ง </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
                                                    <input class="form-control center" type="text" id="stock_document_old_number_tf" value="<?php echo $row1['stock_document_old_number']; ?>"/>
												</div>                                                
                                            </span>
										</div>
									</div>
                                    <div class="profile-info-row">
										<div class="profile-info-name"> ลงวันที่ </div>
										<div class="profile-info-value col-sm-12">
											<span>
                                            	<div class="input-group col-sm-6">
													<input class="form-control date-picker center" id="stock_document_old_date_tf" type="text" data-date-format="dd-mm-yyyy" value="<?php if($row1['stock_document_old_date']!="0000-00-00" && $row1['stock_document_old_date'] != ""){ echo date('d-m-Y',strtotime($row1['stock_document_old_date']));} ?>"/>
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
                                    <span class="bigger-110"> ข้อมูลคณะกรรมการคลังอากรแสตมป์ </span>
                                </div>
                                <div class="space-12"></div>
                                <div id="list">
                                	<?php
										$sql2 = "SELECT * FROM tb_stock_board t WHERE t.stock_document_id = '".$_GET['stock_document_id']."'";
										$rs2 = mysql_query($sql2,$connection);
										$i = 1;
										while($row2 = mysql_fetch_array($rs2)){
									?>
                                    	
                                        <div class="profile-user-info profile-user-info-striped profile<?php echo $i; ?>">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name" style="width:100px;"> เลข ลสก. </div>
                                                <div class="profile-info-value" style="width:150px;height:40px;">
                                                    <span>
                                                        <div class="input-group">
                                                            <input class="form-control center input-sm" type="text" id="uid<?php echo $i; ?>_tf" onkeydown="clearData(<?php echo $i; ?>);" value="<?php echo $row2['id']; ?>">
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="profile-info-value center" style="height:40px;">
                                                    <span>
                                                        <div class="input-group col-sm-12">
                                                            <button class="btn btn-white btn-warning btn-sm" style="height:30px;" onclick="SearchInfo(<?php echo $i; ?>);">
                                                                <i class="ace-icon fa fa-search bigger-120 orange"></i> ค้นหา
                                                            </button>
                                                        </div>                                                
                                                    </span>
                                                </div>
                                                <div class="profile-info-name" style="width:100px;"> ชื่อ-สกุล </div>
                                                <div class="profile-info-value" style="width:200px;vertical-align:middle;" >
                                                    <span id="fullname<?php echo $i; ?>_tf"><?php echo $row2['fullname']; ?></span>
                                                </div>
                                                <div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div>
                                                <div class="profile-info-value " style="width:300px;vertical-align:middle;">
                                                    <span id="position_m<?php echo $i; ?>_tf"><?php echo $row2['position_m']; ?></span>
                                                </div>
                                                <div class="profile-info-name" style="width:100px;"> ประเภท </div>
                                                <div class="profile-info-value " style="width:200px;vertical-align:middle;">
                                                    <span>
                                                        <div class="input-group" style="width:100%;">
                                                            <div>
                                                                <select class="form-control" id="stock_board_type_id<?php echo $i; ?>_tf" style="width:100%;">
                                                                    <option value="">  </option>
                                                                    <option value="1" <?php if($row2['stock_board_type_id']==1){ echo 'selected="selected"';} ?> >ประธาน</option>
                                                                    <option value="2" <?php if($row2['stock_board_type_id']==2){ echo 'selected="selected"';} ?> >กรรมการ</option>
                                                                    <option value="3" <?php if($row2['stock_board_type_id']==3){ echo 'selected="selected"';} ?> >ปฏิบัติหน้าที่แทน </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </span>
                                                </div>
                                                <div class="profile-info-name" style="width:100px;"> กระบวนการ </div>
                                                <div class="profile-info-value " style="width:100px;vertical-align:middle;">
                                                    <span>
                                                        <button class="btn btn-danger btn-xs" onclick="DelListDiv(<?php echo $i; ?>);"><i class="ace-icon fa fa-trash  bigger-110 icon-only"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
											$i++;
										}
									?> 
                                    
                               	</div>
                                <div class="space-10"></div>
                                <div class="center">
									<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="AddListDiv();">
										<i class="ace-icon fa fa-bolt bigger-150 middle orange2"></i>
										<span class="bigger-110">เพิ่มคณะกรรมการ</span>
									</button>
								</div>
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
                                                    	<option value="">  </option>
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
                    <div class="space-10"></div>
                    <div class="clearfix">
                   		<div class="alert alert-block alert-success" style="text-align:center;">
                            <div class="center">
								<button type="button" class="btn btn-sm btn-primary btn-white btn-round" onclick="saveMandate()">
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
	var list_id = <?php echo $i; ?>;
	function AddListDiv(){
		
		var div = '<div id="list"><div class="profile-user-info profile-user-info-striped profile'+list_id+'"><div class="profile-info-row"><div class="profile-info-name" style="width:100px;"> เลข ลสก. </div><div class="profile-info-value" style="width:150px;height:40px;"><span><div class="input-group"><input class="form-control center input-sm" type="text" id="uid'+list_id+'_tf" onkeydown="clearData('+list_id+');"></div></span></div><div class="profile-info-value center" style="height:40px;"><span><div class="input-group col-sm-12"><button class="btn btn-white btn-warning btn-sm" style="height:30px;" onclick="SearchInfo('+list_id+');"><i class="ace-icon fa fa-search bigger-120 orange"></i> ค้นหา </button></div></span></div><div class="profile-info-name" style="width:100px;"> ชื่อ-สกุล </div><div class="profile-info-value" style="width:200px;vertical-align:middle;" ><span id="fullname'+list_id+'_tf">&nbsp;</span></div><div class="profile-info-name" style="width:100px;"> ตำแหน่ง </div><div class="profile-info-value " style="width:300px;vertical-align:middle;"><span id="position_m'+list_id+'_tf">&nbsp;</span></div><div class="profile-info-name" style="width:100px;"> ประเภท </div><div class="profile-info-value " style="width:200px;vertical-align:middle;"><span><div class="input-group" style="width:100%;"><div><select class="form-control" id="stock_board_type_id'+list_id+'_tf" style="width:100%;"><option value="">  </option><option value="1">ประธาน</option><option value="2">กรรมการ</option><option value="3">ปฏิบัติหน้าที่แทน</option></select></div></div></span></div><div class="profile-info-name" style="width:100px;"> กระบวนการ </div><div class="profile-info-value " style="width:100px;vertical-align:middle;"><span><button class="btn btn-danger btn-xs" onclick="DelListDiv('+list_id+');"><i class="ace-icon fa fa-trash  bigger-110 icon-only"></i></button></span></div></div></div></div>';
		
		$( "#list" ).append(div);
		list_id += 1;
	}
	function DelListDiv(val){
		if(val == (list_id-1)){
			$('.profile'+val).remove();
			list_id -= 1;
		}else{
			
			$.alert({title: 'SDMS Alert!',content: 'ลบรายการจากล่างขึ้นบน',animation: 'news',closeAnimation: 'news',});
		}
		
	}
	function saveMandate(){
		var id = [];
		var fullname = [];
		var position = [];
		var stock_board_type = [];
		for(var i = 1;i<=list_id;i++){
			id.push($('#uid'+(i)+'_tf').val());
			position.push($('#position_m'+(i)+'_tf').text());
			fullname.push($('#fullname'+(i)+'_tf').text());
			stock_board_type.push($('#stock_board_type_id'+(i)+'_tf').val());
		}
		var stock_document_id ='<?php echo $_GET['stock_document_id']; ?>';
		var stock_document_number = $('#stock_document_number_tf').val();
		var dfrom = $("#stock_document_date_tf").val().split("-")
		var stock_document_date = dfrom[2]+"-"+dfrom[1]+"-"+dfrom[0];
		
		var stock_document_old_number = $('#stock_document_old_number_tf').val();
		dfrom = $("#stock_document_old_date_tf").val().split("-")
		var stock_document_old_date = dfrom[2]+"-"+dfrom[1]+"-"+dfrom[0];
		var signature_id = $('#signature_id_tf').val();
		var data = {
			"stock_document_id":stock_document_id,
			"stock_document_number":stock_document_number,
			"stock_document_date":stock_document_date,
			"stock_document_old_number":stock_document_old_number,
			"stock_document_old_date":stock_document_old_date,
			"id":id,
			"fullname":fullname,
			"position_m":position,
			"stock_board_type":stock_board_type,
			"signature_id":signature_id
		};
		$.ajax({
           type: "POST",
           url: "ajax/ajax_StockBoardAdding.php",
		   data: {data:data},
           success: function (msg) {
              if(msg=="TRUE"){
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
								window.location.href="index.php?service=stockboardManager";
							}
						}
					}
				});
			  }
           }
       });
	}
	
	function clearData(id){
		$('#fullname'+id+'_tf').text('');
		$('#position_m'+id+'_tf').text('');
	}
	function SearchInfo(id){
		var uid = $('#uid'+id+'_tf').val();
		$.ajax({
			type: "POST",
			url: "ajax/ajax_AuthenUserEofficeECAR.php",
			data: "UID="+uid,
			cache: false,
			success: function(data){
				result = JSON.parse(data);
				if(result['DataUser']['Authen']){
					if( result['DataUser']['OFFICEID'] =='<?php echo $_SESSION['OFFICEID']; ?>' || '<?php echo $_SESSION['OFFICEID']; ?>'=='00005000'){
						$('#fullname'+id+'_tf').text(result['DataUser']['TITLE']+result['DataUser']['FNAME']+" "+result['DataUser']['LNAME']);
						$('#position_m'+id+'_tf').text(result['DataUser']['POSITION_M']);
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