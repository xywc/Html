<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>用户注册</title> 
</head> 
<body> 
  <?php 
    $account=$_POST["account"]; 
    $password=$_POST["password"]; 
	$name=$_POST["name"];
	$tel=$_POST["telephone"];
    $link=mysql_connect("localhost","root","351668265"); 
    if (!$link) { 
     die('数据库连接失败'.$mysql_error()); 
   } 
    mysql_select_db("user_info",$link); 
    $dbaccount=null; 
    $result=mysql_query("select * from user_info where account ='$account'"); 
    while ($row=mysql_fetch_array($result,MYSQL_ASSOC)) { 
      $dbaccount=$row["account"]; 
    } 
    if(!is_null($dbaccount)){ 
		?> 
		  <script type="text/javascript"> 
		    alert("用户名已存在"); 
		    window.location.href="register.html"; 
		  </script>  
		<?php 
    } 
	else
	{
		$sql="insert into user_info (account,password,tel,name) values('$account','$password','$tel','$name')";
		mysql_query($sql) or die("存入数据库失败".mysql_error()) ;
		mysql_close($link);
      $con=mysql_connect("localhost","root","351668265"); 
    if (!$con) { 
      die('数据库连接失败'.$mysql_error()); 
    } 
    mysql_select_db("user_info",$con); 
    $result=mysql_query("select * from user_info where account ='$account'"); 
	$row=mysql_fetch_array($result);
	$d=rs232_connect(com3, 9600, $row["id"]); 
	echo $row["id"];
		?>
			<script type="text/javascript"> 
				alert("注册成功");
		    	window.location.href="index.php"; 
			</script>  
		<?php 
	}
	
function rs232_connect($com, $baudrate, $in) {
  @set_time_limit(10);
  //使用 'windows下设置窜口参数';
  exec("mode " . $com . " BAUD=" . $baudrate . " PARITY=n DATA=8 STOP=1 odsr=off");
  // "打开端口串口$com";
  $f = @fopen($com, 'w+');
  //判断串口是否正常打开
  if (!$f) {
    die("Error when open $com");
  }
  //向串口发送数据;
  $d=dechex($in); 
  $k=hexToStr($d);
  fwrite($f,$k);
  //关闭端口    
  fclose($f);
  //串口操作结束
}


function hexToStr($hex) {
  $string = "";
  for ($i = 0; $i <= strlen($hex) - 1; $i+=3) {
    $string.=chr(hexdec($hex[$i] . $hex[$i + 1]));
  }
  return $string;
}

  ?> 
 
  
</body> 
</html> 

