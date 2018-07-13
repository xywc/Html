<!doctype html> 
<html> 
<head> 
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta charset="UTF-8"> 
<title>修改行程</title> 
<style type="text/css"> 
form { 
  text-align: center; 
} 
</style> 
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/loginstyle.css" rel="stylesheet" type="text/css" media="all" />	
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
	  	
	  	setcookie('starttime',$starttime);
	  	setcookie('endtime',$endtime);
	  	setcookie('address',$address);
	  	setcookie('cost',$cost);
	  	
	  	
	    $link=mysql_connect("localhost","root","351668265"); 
	    if (!$link) { 
	      die('数据库连接失败'.$mysql_error()); 
	    } 
	    mysql_select_db("travel_guide", $link);
	    
		$sql="DELETE FROM schedule WHERE starttime='$starttime' AND endtime='$endtime' AND account='$account' AND address='$address' ";
		//mysql_query($sql) or die("存入数据库失败".mysql_error()) ;		
		mysql_close($link); 
  echo "<div class='header'>
		<div class='col-md-8 for'>
			<div class='col-top'>
				<div class='col-md-5 account'>
					<div class='account-in'>
						<h3>修改 行程</h3>											
						<div class='your'>
							 <form action='save_schedule.php' name='form_schedule' method='post' onsubmit='return check()'>
								<div class='your-top'>
									<div>*开始时间：<input type='datetime-local' name='starttime' id='starttime' value=" .$starttime. "></div>
								</div>
								<div class='your-top'>
									<div>*结束时间：<input type='datetime-local' name='endtime' id='endtime' value=" .$endtime. "></div>
								</div>
								<div class='your-top'>
									<input type='text' name='address' value=" . $address . ">
								</div>
								<div class='your-top'>
									<input type='text' name='cost' value=" . $cost . " />
								</div>
								<div class='your-top'>
									<div>*是否空闲：
										<input type='radio' name='isfree' value='空闲' required='' checked>空闲
										<input type='radio' name='isfree' value='忙碌' required=''>忙碌
									</div>
								</div>														
								<input type='submit' value='保存'>
								<input type='reset' value='重新填写'>
							</form>
 						</div>
					</div>
					<div class='clearfix'> </div>
				</div>
 			</div>
 		</div>
 	</div>";
  ?>
  <script type="text/javascript"> 
    function check() {      
      if(document.form_schedule.starttime.value.length==0){ 
        alert("“开始时间”一定要填写哦。。。"); 
        return false; 
      } 
      if(document.form_schedule.endtime.value.length==0){ 
          alert("“结束时间”一定要填写哦。。。"); 
          return false; 
      }
      if(document.form_schedule.address.value.length==0){ 
          alert("“地址”一定要填哦。。。"); 
          return false; 
      }
      if(document.form_schedule.cost.value.length==0){ 
          alert("“时薪”忘了填哦。。。"); 
          return false; 
      }
    } 
  </script> 
</body> 
</html> 
