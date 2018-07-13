<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>正在删除行程</title> 
</head> 
<body> 
  <?php 
  	date_default_timezone_set("PRC");
  	$account=$_COOKIE["account"];
  	
  	$starttime=$_COOKIE["starttime"];
	//echo $starttime;
	$starttime=str_replace(" ","T",$starttime);
	//echo "</br>";
	//echo $starttime;
	$endtime=$_COOKIE["endtime"];	
	$endtime=str_replace(" ","T",$endtime);
	$address=$_COOKIE["address"];	
	//echo $address;
	$cost=$_COOKIE["cost"];
	//echo $cost;
	
    $link=mysql_connect("localhost","root","351668265"); 
    if (!$link) { 
      die('数据库连接失败'.$mysql_error()); 
    } 
    mysql_select_db("travel_guide", $link);
    
	$sql="DELETE FROM schedule WHERE starttime='$starttime' AND endtime='$endtime' 
		AND account='$account' AND address='$address' AND cost='$cost' ";
	mysql_query($sql) or die("删除数据库失败".mysql_error()) ;		
	mysql_close($link);
   
  echo "<script type='text/javascript'> 
    alert('删除成功'); 
    window.location.href='scheduletable.php'; 
  </script> ";
?>  
</body> 
</html> 