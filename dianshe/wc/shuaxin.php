<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>���ڳ�ֵ�۷�</title> 
</head> 
<body> 
  <?php 
	$account=$_COOKIE["account"];
	$d=rs232_connect(com3, 9600, 0);
    $yanzhen=substr($d,-2);//get pass
    $zhi=floor($d/100);//int
	$link=mysql_connect("localhost","root","351668265"); 
    if (!$link) { 
      die('���ݿ�����ʧ��'.$mysql_error()); 
    } 
    mysql_select_db("user_info", $link); 
	$sql="UPDATE user_info SET  card='$zhi'  WHERE account='$account' ";
	mysql_query($sql) or die("�������ݿ�ʧ��".mysql_error()) ;	
	mysql_close($link);
 echo "<script type='text/javascript'> 
   alert('OK!'); 
  window.location.href='../wc/personalcenter.php'; 
    </script> ";
/***function rs232_connect($com, $baudrate, $in) {
  @set_time_limit(10);
  //ʹ�� 'windows�����ôܿڲ���';
  exec("mode " . $com . " BAUD=" . $baudrate . " PARITY=n DATA=8 STOP=1 odsr=off");
  // "�򿪶˿ڴ���$com";
  $f = @fopen($com, 'w+');
  //�жϴ����Ƿ�������
  if (!$f) {
    die("Error when open $com");
  }
  //�򴮿ڷ�������;
  $d=dechex($in); 
  $k=hexToStr($d);
  fwrite($f,$k);
  //�رն˿�    
    $str="";
    $a="";
       while($str==$a)
	  {

            $str.=bin2hex(fread($f,8)); 
	   }  
		$l=(hexdec($str)); 
   return $l;
  //�رն˿�    
  fclose($f);
  //���ڲ�������
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
  //ʹ�� 'windows�����ôܿڲ���';
  exec("mode " . $com . " BAUD=" . $baudrate . " PARITY=n DATA=8 STOP=1 odsr=off");
  // "�򿪶˿ڴ���$com";
  $f = @fopen($com, 'w+');
  //�жϴ����Ƿ�������
  if (!$f) {
    die("Error when open $com");
  }
  //�򴮿ڷ�������;
  $d=dechex($in); 
  $k=hexToStr($d);
  fwrite($f,$k);
  //�رն˿�    
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
  //�رն˿�    
  fclose($f);
  //���ڲ�������
}

?>