<?php
	session_start();
	include("../inc/config.php");

	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$posname = $_POST['posname'];
	$empstatus = $_POST['empstatus'];
	$class_data = $_POST['class_data'];
	$skillid = $_POST['skillid'];
	$emptype = $_POST['emptype'];
	$officeid = $_POST['officeid'];
	$officename = $_POST['officename'];
	$pin = $_POST['pin'];
	$position_m = $_POST['position_m'];
	$class_new = $_POST['class_new'];
	$level = $_POST['level'];
	$posact = $_POST['posact'];
	$groupname = $_POST['groupname'];
	$isadmin = $_POST['isadmin'];
	
	$set_limits = $_POST['set_limits'];
	$withdraw = $_POST['withdraw'];
	$deposit = $_POST['deposit'];
	$sell = $_POST['sell'];
	$agreement = $_POST['agreement'];
	$board = $_POST['board'];
	$user_manage = $_POST['user_manage'];
	$permission_status = $_POST['permission_status'];
		
		//LOG BEFOR UPDATE
		$sql_log = "SELECT * FROM tb_user_eoffice t WHERE t.id = '".$id."'";
		$rs_log = mysql_query($sql_log,$connection);
		if(mysql_fetch_assoc($rs_log)){
			$log_mode = "Edit User";
		}else{
			$log_mode = "Add User";
		}
		$rs_log = mysql_query($sql_log,$connection);
		$befo = json_encode(mysql_fetch_assoc($rs_log));
		
		$sql1 = "REPLACE INTO tb_user_eoffice(id,title,fname,
		lname,email,posname,empstatus,
		class_data,skillid,emptype,
		officeid,officename,pin,
		position_m,class_new,level,
		posact,groupname,last_update,isadmin) 
		VALUES('".$id."','".$title."','".$fname."',
		'".$lname."','".$email."','".$posname."','".$empstatus."',
		'".$class_data."','".$skillid."','".$emptype."',
		'".$officeid."','".$officename."','".$pin."',
		'".$position_m."','".$class_new."','".$level."',
		'".$posact."','".$groupname."',NOW(),'".$isadmin."')";
		$rs = mysql_query($sql1,$connection);
		
		//LOG UPDATE
		$sql_log = "SELECT * FROM tb_user_eoffice t WHERE t.id = '".$id."'";
		$rs_log = mysql_query($sql_log,$connection);
		
		$uptodate = json_encode(mysql_fetch_assoc($rs_log));
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
		VALUES('".$log_mode."','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
		
		
		//LOG BEFOR UPDATE
		$sql_log = "SELECT * FROM tb_user_permission t WHERE t.id = '".$id."'";
		$rs_log = mysql_query($sql_log,$connection);
		if(mysql_fetch_assoc($rs_log)){
			$log_mode = "Edit Permission";
		}else{
			$log_mode = "Add Permission";
		}
		$rs_log = mysql_query($sql_log,$connection);
		$befo = json_encode(mysql_fetch_assoc($rs_log));
		
		$sql2 = "REPLACE INTO tb_user_permission(id,set_limits,withdraw,deposit,sell,agreement,officeid,permission_status,board,user_manage) 
		VALUES('".$id."','".$set_limits."','".$withdraw."','".$deposit."','".$sell."','".$agreement."','".$officeid."','".$permission_status."','".$board."','".$user_manage."')";
		$rs = mysql_query($sql2,$connection);
		if($rs){
			echo "TRUE";
		}else{
			echo "FALSE";
		}
		//LOG UPDATE
		$sql_log = "SELECT * FROM tb_user_permission t WHERE t.id = '".$id."'";
		$rs_log = mysql_query($sql_log,$connection);
		$uptodate = json_encode(mysql_fetch_assoc($rs_log));
		
		$sql_log = "INSERT INTO tb_log(log_mode,log_data,cid,id,office_code,log_date) 
		VALUES('".$log_mode."','".$befo."|".$uptodate."','".$_SESSION['PIN']."','".$_SESSION['ID']."','".$_SESSION['OFFICEID']."',NOW())";
		mysql_query($sql_log,$connection);
		

?>