<?php
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


function hexToStr($hex) {
  $string = "";
  for ($i = 0; $i <= strlen($hex) - 1; $i+=3) {
    $string.=chr(hexdec($hex[$i] . $hex[$i + 1]));
  }
  return $string;
}
 $d=rs232_connect(com3, 9600, 0); 
 $yanzhen=substr($d,-2);//get pass
 $zhi=floor($d/100);//int
 
	

?>