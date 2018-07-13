<!doctype html> 
<html> 
<head> 
  <meta charset="UTF-8"> 
  <title>正在注销 </title> 
</head> 
<body> 
  <?php  
	$account=$_COOKIE["account"];
     
    $link=mysql_connect("localhost","root","351668265");
    if (!$link) { 
      die('数据库连接失败'.$mysql_error()); 
    } 
    mysql_select_db("travel_guide",$link);
    
	$sql="DELETE FROM user_info
        WHERE account='$account' ";
	mysql_query($sql) or die("删除数据库失败".mysql_error()) ;	

	$sql="DELETE FROM schedule
	WHERE account='$account' ";
	mysql_query($sql) or die("删除数据库失败".mysql_error()) ;
	
	mysql_close($link); 
  ?> 
    <script type="text/javascript"> 
    alert("注销成功"); 
    document.cookie="account="+"";
    window.location.href="index.php"; 
  </script> 
</body> 
</html> 
    