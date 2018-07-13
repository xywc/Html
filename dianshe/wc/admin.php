<!DOCTYPE html>
<html>
<head>
<title>管理中心</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Nakropol Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/bootstrap.js"></script>
</head>
<body style="background-image:url(xj.jpg); background-size:100%">
<?php
function rs232_connect($com, $baudrate, $in) {
  @set_time_limit(10);
  //使用 'windows下设置窜口参数';
  exec("mode " . $com . " BAUD=" . $baudrate . " PARITY=n DATA=8 STOP=1 odsr=off");
  // "打开端口串口$com";
  $f = @fopen($com, 'w+');
  //判断串口是否正常打开
  if (!$f) {
    ?> 
		  <script type="text/javascript"> 
		    alert("没有插入有效卡"); 
		    window.location.href="../wc/index.php"; 
		  </script>  
		<?php 
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
 $d=rs232_connect(com3, 9600, 0); 
 $yanzhen=substr($d,-2);//get pass
 $zhi=floor($d/100);//int
 
	$link = mysql_connect('localhost', 'root', '351668265');
	if (!$link)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("user_info", $link);
	$sql="SELECT * FROM user_info WHERE id = '$yanzhen'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$account=$row["account"];
	
	if(!is_null($account))
	{ 
	mysql_select_db("user_info", $link);
	$sql1="UPDATE user_info SET  card='$zhi'  WHERE id='$yanzhen' ";
	mysql_query($sql1);
	echo "<div class='col-md-4 top-grid-in' >
			<div class='grid' >
				<div class='grid-top' style='background:#000000;'>
					<a href='#'><img class='img-responsive' src='images/cir.png' alt=''></a>
					<h6>姓名：" . $row['account'] . "</h6>	
					<h6>余额：" . $row['card'] . "</h6>	
					<div>
					<h6><a href='../wc/admin.php'>刷新</a></h6>	
					</div>					
				</div>
				  <!--//part1-->
				<div class='just-in'>
					
					 <div class='follow'>
					    <div class='col-md-6 two'>
							
							<span><a onclick='card()'>充值</a></span>
							<br>
							<p></p>
						 </div>
						 <div class='col-md-6 two'>
							
							<span>注销</span>
							<br>
							<p></p>
						 </div>
						<div class='clearfix'> </div>
				    </div>
					<br>
				          
				   <!--//part2-->
				   <div class='follow'>
					    <div class='col-md-6 two-left'>
						
						     <span><a onclick='set()'>更换密码</a></span>
										 
				        </div>
					    <div class='clearfix'> </div>
				    </div>
					<br>	
				</div>
				<a class='follow-at' onclick='exit()'>退出</a>
		 </div>
	</div>";
	}
	else if(is_null($account)) {
	 ?> 
		  <script type="text/javascript"> 
		    alert("用户不存在"); 
		    window.location.href="../wc/index.php"; 
		  </script>  
		<?php 
	}
?>
<script type="text/javascript"> 
 		function set(){
   			window.location.href="../wc/change.php";
 		}  
		function card(){
   			window.location.href="../wc/card2.php";
 		}  
 		function exit(){ 		
 			document.cookie="account="+"";
   			window.location.href="../wc/index.php";
 		}   
  	</script>
</body>	
</html> 