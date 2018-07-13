<!doctype html> 
<html> 
<head> 
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta charset="UTF-8"> 
<title>补办中心</title> 
<style type="text/css"> 
form { 
  text-align: center; 
} 
</style> 
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/loginstyle.css" rel="stylesheet" type="text/css" media="all" />	
</head> 
<body style="background-image:url(xj.jpg); background-size:100%"> 
	<?php
	$account=$_COOKIE["account"];
	$link = mysql_connect('localhost', 'root', '351668265');
	if (!$link)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("user_info", $link);
	$sql="SELECT * FROM user_info WHERE account = '$account'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	 $d=rs232_connect(com3, 9600, row["id"]); 
  mysql_close($link);
  echo  "<script type='text/javascript'> 
   alert('补办成功'); 
  window.location.href='../wc/personalcenter.php'; 
    </script> ";
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
