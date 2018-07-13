<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>保存修改行程</title> 
</head> 
<body> 
  <?php 
    $account=$_COOKIE["account"];
    $starttime0=$_COOKIE["starttime"]; 
    $endtime0=$_COOKIE["endtime"];
    $address0=$_COOKIE["address"];
    $cost0=$_COOKIE["cost"];
    
    $starttime=$_POST["starttime"]; 
    $endtime=$_POST["endtime"];
    $address=$_POST["address"];
    $cost=$_POST["cost"];
    $isfree=$_POST["isfree"];
    
    $link=mysql_connect("localhost","root","351668265"); 
    if (!$link) { 
      die('数据库连接失败'.$mysql_error()); 
    } 
    mysql_select_db("travel_guide",$link);  
    $sql="DELETE FROM schedule WHERE starttime='$starttime0' AND endtime='$endtime0'
    		AND account='$account' AND address='$address0' AND cost='$cost0' ";
    mysql_query($sql) or die("删除数据库失败".mysql_error()) ;
    
	$sql="insert into schedule (starttime,endtime,account,address,cost,
		isfree) values('".$starttime."','$endtime','$account',
		'$address','$cost','$isfree')";
	mysql_query($sql) or die("存入数据库失败".mysql_error()) ;	
	mysql_close($link);
 
  
  echo "<script type='text/javascript'> 
    alert('修改成功'); 
    window.location.href='scheduletable.php ';
  </script> ";
  ?>
</body> 
</html> 

