<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>正在修改信息</title> 
</head> 
<body> 
  <?php 
  	$account=$_COOKIE["account"];
    $password=$_POST["password"]; 
    $link=mysql_connect("localhost","root","351668265"); 
    if (!$link) { 
      die('数据库连接失败'.$mysql_error()); 
    } 
    mysql_select_db("user_info", $link); 
	$sql="UPDATE user_info SET password='$password' WHERE account='$account' ";
	mysql_query($sql) or die("存入数据库失败".mysql_error()) ;		
	mysql_close($link);
  echo "<script type='text/javascript'> 
    alert('修改信息成功'); 
    window.location.href='../wc/personalcenter.php'; 
  </script> ";
  ?>
</body> 
</html> 

