<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>用户注册</title> 
</head> 
<body> 
  <?php 
    $account=$_COOKIE["account"];
    
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
	$sql="insert into schedule (starttime,endtime,account,address,cost,
		isfree) values('".$starttime."','$endtime','$account',
		'$address','$cost','$isfree')";
	mysql_query($sql) or die("存入数据库失败".mysql_error()) ;
	
	mysql_close($link);
  ?> 
  
  <script type="text/javascript"> 
    alert("发布成功"); 
    window.location.href="scheduletable.php"; 
  </script> 
  
</body> 
</html> 

