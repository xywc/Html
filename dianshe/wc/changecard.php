<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>正在充值扣费</title> 
</head> 
<body> 
  <?php 

  	$ycard=$_POST["ycard"]; 
	$account=$_COOKIE["account"];
	$new=$ycard;
	$d=rs232_connect(com3, 9600, $new);
   $yanzhen=substr($d,-2);//get pass
  $zhi=floor($d/100);//int
	$link=mysql_connect("localhost","root","351668265"); 
    if (!$link) { 
      die('数据库连接失败'.$mysql_error()); 
    } 
    mysql_select_db("user_info", $link); 
	$sql="UPDATE user_info SET  card='$zhi'  WHERE account='$account' ";
	mysql_query($sql) or die("存入数据库失败".mysql_error()) ;	
	mysql_close($link);

	
	header('Location:'.'call.php?chongzhi='.$new.'&yue='.$zhi.'&account='.$account); 
 /***echo "<script type='text/javascript'> 
   alert('修改信息成功'); 
  window.location.href='../wc/personalcenter.php'; 
    </script> ";***/
/***function rs232_connect($com, $baudrate, $in) {
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
    $str="";
    $a="";
       while($str==$a)
	  {

            $str.=bin2hex(fread($f,8)); 
	   }  
		$l=(hexdec($str)); 
   return $l;
  //关闭端口    
  fclose($f);
  //串口操作结束
}***/
function hexToStr($hex) {
  $string = "";
  for ($i = 0; $i <=strlen($hex) - 1; $i+=3) {
    $string.=chr(hexdec($hex[$i] . $hex[$i + 1]));
  }
  return $string;
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
    $str="";
    $a="";
       while($str==$a)
	  {
            for($i=0;$i<=2;$i++){
            $str.=bin2hex(fread($f,8)); }
	   }  
	   $sdr=$str;//00
	    while($sdr==$str)
	  {
            for($i=0;$i<=2;$i++){
            $sdr.=bin2hex(fread($f,8)); }
	   } 
	   $scr=$sdr;
	       while($scr==$sdr)
	  {
            for($i=0;$i<=3;$i++){
            $scr.=bin2hex(fread($f,8)); }
	   } 
	   $abc=substr($scr,4,2);
	   $bcd=substr($scr,2,2);
		$l=(hexdec($str))*10000+(hexdec($abc))+(hexdec($bcd))*100;	
		
  return $l;
  //关闭端口    
  fclose($f);
  //串口操作结束
}

?>
