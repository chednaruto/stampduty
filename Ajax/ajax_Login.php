<?php
	session_start();
	include("../inc/config.php");
	date_default_timezone_set("Asia/Bangkok");
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$ret = array("EOFAuthen"=>"","SDMSAuthen"=>"");
	// ISADMIN
	if($username == "004169"){
		$_SESSION['PIN']='3100201233456';
		$_SESSION['OFFICEID']='00011000';$_SESSION['OFFICENAME']='กองมาตรฐานการจัดเก็บภาษี';
		$_SESSION['FULLNAME']='นางชาลินี นุชหมอน'; $_SESSION['FNAME']='นางชาลินี';
		$_SESSION['ID']='004169';
		$_SESSION['SETLIMIT'] = 'N';$_SESSION['SELL'] = 'N';$_SESSION['WITHDRAW'] = 'N';$_SESSION['DEPOSIT'] ='N';$_SESSION['AGREEMENT'] = 'N';
		$_SESSION['BOARD'] = 'N';$_SERVER['USERMANAGE'] = 'N';$_SESSION['ISADMIN'] = 'Y';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
	}else if($username == "000260"){
		$_SESSION['PIN']='3740300454552';
		$_SESSION['OFFICEID']='00005000';$_SESSION['OFFICENAME']='กองบริหารการคลังและรายได้';
		$_SESSION['FULLNAME']='นางพาชื่น  พรสุรัตน์'; $_SESSION['FNAME']='นางพาชื่น';
		$_SESSION['ID']='000260';
		$_SESSION['SETLIMIT'] = 'N';$_SESSION['SELL'] = 'N';$_SESSION['WITHDRAW'] = 'N';$_SESSION['DEPOSIT'] ='N';$_SESSION['AGREEMENT'] = 'N';
		$_SESSION['BOARD'] = 'N';$_SERVER['USERMANAGE'] = 'N';$_SESSION['ISADMIN'] = 'Y';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
	}else if($username == "000383"){
		$_SESSION['PIN']='3801500064294';
		$_SESSION['OFFICEID']='01000000';$_SESSION['OFFICENAME']='สำนักงานสรรพากรภาค 1';
		$_SESSION['FULLNAME']='นางเกศณี  พงษ์พันธุ์'; $_SESSION['FNAME']='นางเกศณี';
		$_SESSION['ID']='000383';
		$_SESSION['SETLIMIT'] = 'N';$_SESSION['SELL'] = 'N';$_SESSION['WITHDRAW'] = 'N';$_SESSION['DEPOSIT'] ='N';$_SESSION['AGREEMENT'] = 'N';
		$_SESSION['BOARD'] = 'N';$_SERVER['USERMANAGE'] = 'N';$_SESSION['ISADMIN'] = 'Y';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
	}else if($username == "009164"){
		$_SESSION['PIN']='3100100372205';
		$_SESSION['OFFICEID']='01001000';$_SESSION['OFFICENAME']='สำนักงานสรรพากรพื้นที่กรุงเทพมหานคร  1';
		$_SESSION['FULLNAME']='นางสาวบุญอร  สาธิตพรกุล'; $_SESSION['FNAME']='นางสาวบุญอร';
		$_SESSION['ID']='009164';
		$_SESSION['SETLIMIT'] = 'N';$_SESSION['SELL'] = 'N';$_SESSION['WITHDRAW'] = 'N';$_SESSION['DEPOSIT'] ='N';$_SESSION['AGREEMENT'] = 'N';
		$_SESSION['BOARD'] = 'N';$_SERVER['USERMANAGE'] = 'N';$_SESSION['ISADMIN'] = 'Y';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
	}else if($username == "120678"){
		$_SESSION['PIN']='3140500149732';
		$_SESSION['OFFICEID']='01001010';$_SESSION['OFFICENAME']='สำนักงานสรรพากรพื้นที่สาขาพระนคร 1';
		$_SESSION['FULLNAME']='นางสร้อยทิพย์  จันทร์เณร'; $_SESSION['FNAME']='นางสร้อยทิพย์';
		$_SESSION['ID']='120678';
		$_SESSION['SETLIMIT'] = 'N';$_SESSION['SELL'] = 'N';$_SESSION['WITHDRAW'] = 'N';$_SESSION['DEPOSIT'] ='N';$_SESSION['AGREEMENT'] = 'N';
		$_SESSION['BOARD'] = 'N';$_SERVER['USERMANAGE'] = 'N';$_SESSION['ISADMIN'] = 'Y';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
	}
	
	
	
	//USER
	else if($username == "000659"){
		$_SESSION['PIN']='3101800380520';
		$_SESSION['OFFICEID']='00011000';
		$_SESSION['OFFICENAME']='กองมาตรฐานการจัดเก็บภาษี';
		$_SESSION['FULLNAME']='นางสาวสุดา สุคนธพิสาร';
		$_SESSION['FNAME']='นางสาวสุดา';
		$_SESSION['ID']='000659';
		
		$sql_p = "SELECT * FROM tb_user_permission u WHERE u.id = '".$_SESSION['ID']."' AND u.officeid = '".$_SESSION['OFFICEID']."' AND u.permission_status = 'Y'";
		$rs_p = mysql_query($sql_p,$connection);
		$row_p = mysql_fetch_assoc($rs_p);
		
		$_SESSION['SETLIMIT'] = $row_p['set_limits'];
		$_SESSION['SELL'] = $row_p['sell'];
		$_SESSION['WITHDRAW'] = $row_p['withdraw'];
		$_SESSION['DEPOSIT'] = $row_p['deposit'];
		$_SESSION['AGREEMENT'] = $row_p['agreement'];
		$_SESSION['BOARD'] = $row_p['board'];
		$_SESSION['USERMANAGE']= $row_p['user_manage'];
		$_SESSION['ISADMIN'] = 'N';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
	}else if($username == "001922"){
		$_SESSION['PIN']='3130100015071';
		$_SESSION['OFFICEID']='00005000';
		$_SESSION['OFFICENAME']='กองบริหารการคลังและรายได้';
		$_SESSION['FULLNAME']='นางวิจิตรพร  วงษ์จักร';
		$_SESSION['FNAME']='นางวิจิตรพร';
		$_SESSION['ID']='001922';
		
		$sql_p = "SELECT * FROM tb_user_permission u WHERE u.id = '".$_SESSION['ID']."' AND u.officeid = '".$_SESSION['OFFICEID']."' AND u.permission_status = 'Y'";
		$rs_p = mysql_query($sql_p,$connection);
		$row_p = mysql_fetch_assoc($rs_p);
		
		$_SESSION['SETLIMIT'] = $row_p['set_limits'];
		$_SESSION['SELL'] = $row_p['sell'];
		$_SESSION['WITHDRAW'] = $row_p['withdraw'];
		$_SESSION['DEPOSIT'] = $row_p['deposit'];
		$_SESSION['AGREEMENT'] = $row_p['agreement'];
		$_SESSION['BOARD'] = $row_p['board'];
		$_SESSION['USERMANAGE']= $row_p['user_manage'];
		$_SESSION['ISADMIN'] = 'N';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
	}else if($username == "290289"){
		$_SESSION['PIN']='3920100380316';
		$_SESSION['OFFICEID']='01000000';
		$_SESSION['OFFICENAME']='สำนักงานสรรพากรภาค 1';
		$_SESSION['FULLNAME']='นางสาวรัตญา  บุญมาก';
		$_SESSION['FNAME']='นางสาวรัตญา';
		$_SESSION['ID']='290289';
		
		$sql_p = "SELECT * FROM tb_user_permission u WHERE u.id = '".$_SESSION['ID']."' AND u.officeid = '".$_SESSION['OFFICEID']."' AND u.permission_status = 'Y'";
		$rs_p = mysql_query($sql_p,$connection);
		$row_p = mysql_fetch_assoc($rs_p);
		
		$_SESSION['SETLIMIT'] = $row_p['set_limits'];
		$_SESSION['SELL'] = $row_p['sell'];
		$_SESSION['WITHDRAW'] = $row_p['withdraw'];
		$_SESSION['DEPOSIT'] = $row_p['deposit'];
		$_SESSION['AGREEMENT'] = $row_p['agreement'];
		$_SESSION['BOARD'] = $row_p['board'];
		$_SESSION['USERMANAGE']= $row_p['user_manage'];
		$_SESSION['ISADMIN'] = 'N';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
	}else if($username == "009348"){
		$_SESSION['PIN']='3101600457049';
		$_SESSION['OFFICEID']='01001000';
		$_SESSION['OFFICENAME']='สำนักงานสรรพากรพื้นที่กรุงเทพมหานคร  1';
		$_SESSION['FULLNAME']='นางสาวจิตรา  ชูไพโรจน์';
		$_SESSION['FNAME']='นางสาวจิตรา';
		$_SESSION['ID']='009348';
		
		$sql_p = "SELECT * FROM tb_user_permission u WHERE u.id = '".$_SESSION['ID']."' AND u.officeid = '".$_SESSION['OFFICEID']."' AND u.permission_status = 'Y'";
		$rs_p = mysql_query($sql_p,$connection);
		$row_p = mysql_fetch_assoc($rs_p);
		
		$_SESSION['SETLIMIT'] = $row_p['set_limits'];
		$_SESSION['SELL'] = $row_p['sell'];
		$_SESSION['WITHDRAW'] = $row_p['withdraw'];
		$_SESSION['DEPOSIT'] = $row_p['deposit'];
		$_SESSION['AGREEMENT'] = $row_p['agreement'];
		$_SESSION['BOARD'] = $row_p['board'];
		$_SESSION['USERMANAGE']= $row_p['user_manage'];
		$_SESSION['ISADMIN'] = 'N';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
	}else if($username == "011433"){
		$_SESSION['PIN']='3102001841667';
		$_SESSION['OFFICEID']='01001010';
		$_SESSION['OFFICENAME']='สำนักงานสรรพากรพื้นที่สาขาพระนคร 1';
		$_SESSION['FULLNAME']='นางวาสนา  คัมภีรภาพ';
		$_SESSION['FNAME']='นางวาสนา';
		$_SESSION['ID']='011433';
		
		$sql_p = "SELECT * FROM tb_user_permission u WHERE u.id = '".$_SESSION['ID']."' AND u.officeid = '".$_SESSION['OFFICEID']."' AND u.permission_status = 'Y'";
		$rs_p = mysql_query($sql_p,$connection);
		$row_p = mysql_fetch_assoc($rs_p);
		
		$_SESSION['SETLIMIT'] = $row_p['set_limits'];
		$_SESSION['SELL'] = $row_p['sell'];
		$_SESSION['WITHDRAW'] = $row_p['withdraw'];
		$_SESSION['DEPOSIT'] = $row_p['deposit'];
		$_SESSION['AGREEMENT'] = $row_p['agreement'];
		$_SESSION['BOARD'] = $row_p['board'];
		$_SESSION['USERMANAGE']= $row_p['user_manage'];
		$_SESSION['ISADMIN'] = 'N';
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$_SESSION['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		$ret["ECAR"] = 'TRUE';
		$ret["EOFAuthen"]="true";
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
		
	}else{
	//----------------------------
	$client = new soapclient('http://wservice.rd.go.th/ServiceEoffice/AuthenUserEoffice1.asmx?WSDL', array("trace"=>1,"exceptions"=>0,"cache_wsdl"=>0));
	$clientEcar = new soapclient('http://wservice.rd.go.th/ServiceEoffice/AuthenUserEofficeECAR.asmx?WSDL', array("trace"=>1,"exceptions"=>0,"cache_wsdl"=>0));
	$client->soap_defencoding = 'UTF-8';
    $client->decode_utf8 = false;
	$params = array('CheckUser' => 'SupportUser', 'CheckPass' => 'SupportPass','UID' => $username,'Password' => $password);
	
	$result = json_decode(json_encode($client->AuthenUser($params)), true);
	if($result["DataUser"]["Authen"]=="true" && $result["DataUser"]["EMPSTATUS"]=="1" ){
		$ret["EOFAuthen"]="true";
		$paramsEcar = array('CheckUser' => 'ECARUser', 'CheckPass' => 'ECARPass','UID' => $result['DataUser']['ID']);
		$resultEcar = json_decode(json_encode($clientEcar->AuthenUser($paramsEcar)), true);
		$sql1 = "REPLACE INTO tb_user_eoffice(id,title,fname,
		lname,
		email,posname,empstatus,
		class_data,skillid,emptype,
		officeid,officename,pin,
		position_m,class_new,level,
		posact,groupname,last_update,isadmin) 
		VALUES('".$result['DataUser']['ID']."','".$result['DataUser']['TITLE']."','".$result['DataUser']['FNAME']."',
		'".$result['DataUser']['LNAME']."',
		'".$result['DataUser']['EMAIL']."','".$result['DataUser']['POSNAME']."','".$result['DataUser']['EMPSTATUS']."',
		'".$result['DataUser']['CLASS_data']."','".$result['DataUser']['SKILLID']."','".$result['DataUser']['EMPTYPE']."',
		'".$result['DataUser']['OFFICEID']."','".$result['DataUser']['OFFICENAME']."','".$result['DataUser']['PIN']."',
		'".$result['DataUser']['POSITION_M']."','".$result['DataUser']['CLASS_NEW']."','".$result['DataUser']['LEVEL']."'
		,'".$result['DataUser']['POSACT']."','".$result['DataUser']['GROUPNAME']."',NOW(),'".$resultEcar['DataUser']['ISADMIN']."')";
		$rs = mysql_query($sql1,$connection);
		
		
		$ret["ECAR"]=$resultEcar["DataUser"]["Authen"];
		if($resultEcar["DataUser"]["Authen"]=="true"){
			$sql2 = "UPDATE tb_user_eoffice e SET e.isadmin='".$resultEcar["DataUser"]["ISADMIN"]."' WHERE e.id = '".$result['DataUser']['ID']."'";
			$rs = mysql_query($sql1,$connection);
		}
		$_SESSION['PIN']=$result['DataUser']['PIN'];
		$_SESSION['OFFICEID']=$result['DataUser']['OFFICEID'];
		$_SESSION['OFFICENAME']=$result['DataUser']['OFFICENAME'];
		$_SESSION['FNAME'] = $result['DataUser']['TITLE'].$result['DataUser']['FNAME'];
		$_SESSION['FULLNAME']=$result['DataUser']['TITLE'].$result['DataUser']['FNAME']." ".$result['DataUser']['LNAME'];
		$_SESSION['ID']=$result['DataUser']['ID'];
		
		$sql_p = "SELECT * FROM tb_user_permission u WHERE u.id = '".$result['DataUser']['ID']."' AND u.officeid = '".$result['DataUser']['OFFICEID']."' AND u.permission_status = 'Y'";
		$rs_p = mysql_query($sql_p,$connection);
		$row_p = mysql_fetch_assoc($rs_p);
		$_SESSION['SETLIMIT'] = $row_p['set_limits'];
		$_SESSION['SELL'] = $row_p['sell'];
		$_SESSION['WITHDRAW'] = $row_p['withdraw'];
		$_SESSION['DEPOSIT'] = $row_p['deposit'];
		$_SESSION['AGREEMENT'] = $row_p['agreement'];
		$_SESSION['BOARD'] = $row_p['board'];
		$_SERVER['USERMANAGE'] = $row_p['user_manage'];
		$_SESSION['ISADMIN'] = $resultEcar["DataUser"]["ISADMIN"];
		$sql_ol = "SELECT * FROM tb_office o WHERE o.office_code = '".$result['DataUser']['OFFICEID']."'";
		$rs_ol = mysql_query($sql_ol,$connection);
		$row_ol = mysql_fetch_assoc($rs_ol);
		$_SESSION['OFFICELEVEL'] = $row_ol['office_level'];
		
		$ret["ISADMIN"]=$resultEcar["DataUser"]["ISADMIN"];
		
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,
		id,office_code,log_date) VALUES('LOGIN','|','".$_SESSION['PIN']."',
		'".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
		
	}else{
		$ret["EOFAuthen"]="false";
	}
	//------------------------------------------
	}
	
	echo json_encode($ret);
?>