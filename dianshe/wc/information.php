<!doctype html> 
<html> 
<head> 
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta charset="UTF-8"> 
<title>个人信息</title> 
<style type="text/css"> 
form { 
  text-align: center; 
} 
</style> 

</head> 
<body> 
	<?php
	$account=$_COOKIE["account"];

	$link = mysql_connect('localhost', 'root', '351668265');
	if (!$link)
	 {
	 die('Could not connect: ' . mysql_error());
	 }
	
	mysql_select_db("travel_guide", $link);
	
	$sql="SELECT * FROM user_info WHERE account = '$account'";
	
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	echo "<table border='2' align='center' bodercolor='#6666FF'>
	 	<tr>
    		<td colspan='2' bgcolor='#6666FF' align='center'>
    			<font color='#FFFFFF'>个人信息</font>
    		</td>
    	</tr>
			
		<tr bgcolor='#99FF99'>
			<td align='right'>*用户账号：</td>
			<td bgcolor='#CCCCCC'> <div align='center' size='15'>" . $row['account'] . "</td>
		</tr>
    				
		<tr bgcolor='#99FF99'>
			<td align='right'>*用户密码：</td>
			<td bgcolor='#CCCCCC'> <div align='center' size='15'>" . $row['password'] . "</td>
		</tr>
					
		<tr bgcolor='#99FF99'>
			<td align='right'>*姓名：</td>
			<td bgcolor='#CCCCCC'> <div align='center' size='15'>" . $row['name'] . "</td>
		</tr>
					
		<tr bgcolor='#99FF99'>
			<td align='right'>*性别：</td>
			<td bgcolor='#CCCCCC'> <div align='center' size='15'>" . $row['sex'] . "</td>
		</td>
		
		<tr bgcolor='#99FF99'>
			<td align='right'>*电话：</td>
			<td bgcolor='#CCCCCC'> <div align='center' size='15'>" . $row['telephone'] . "</td>
		</td>

		<tr bgcolor='#99FF99'>
			<td align='right'>*身份：</td>
			<td bgcolor='#CCCCCC'> <div align='center' size='15'>" . $row['isjob'] . "</td>
		</td>
					
		<tr bgcolor='#99FF99'>
			<td align='right'>地址：</td>
			<td bgcolor='#CCCCCC'> <div align='center' size='15'>" . $row['address'] . "</td>
		</td>	
					
		<tr bgcolor='#99FF99'>
			<td align='right'>个人简介：</td>
			<td><textarea bgcolor='#CCCCCC' align='center' cols='40' rows='4' size='15'>" . $row['introduction'] . "</textarea></td>
		</td>";					
	echo "</table>";	
	mysql_close($link);
	
	
	echo "<table  border='2' align='center' bodercolor='#6666FF'>
		<tr bgcolor='#99FF99'>
			<td align='center'>
				<input style='font-size:20px;text-align:center;width:100px;height:30px' type='button' value='退出' onClick='exit()'>
				<input  style='font-size:20px;text-align:center;width:100px;height:30px' type='button' value='修改信息' onClick='change()'></td>
		</td>		
		<tr bgcolor='#99FF99'>		
			<td align='center'>	
				<input style='font-size:20px;text-align:center;width:100px;height:30px' type='button' value='注销' onClick='logout()'>			
				<input style='font-size:20px;text-align:center;width:100px;height:30px' type='button' value='发布行程' onClick='schedule()'>
			</td>
		</td>";
	echo "</table>";
	?>													
	<script type="text/javascript"> 
 		function exit(){
   			window.location.href="scheduletable.php";
 		}
 		function change(){
   			window.location.href="change.php";
 		}
 		function logout(){
 			if(confirm("真的要注销账户吗?")){
 				window.location.href="logout.php";
 				return true;				
 			}else{
 				return false;
 			}
   			
 		}
 		function schedule(){
   			window.location.href="schedule.html";
 		}   
 		function deleteschedule(){  
 		    if(confirm("确认删除此行程吗？")){  
 		        return true;  
 		    }  
 		    return false;  
 		} 
 		function editschedule(){
   			window.location.href="editschedule.php";
 		}   
  	</script>
</body> 
</html> 