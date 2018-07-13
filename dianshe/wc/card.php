<!doctype html> 
<html> 
<head> 
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta charset="UTF-8"> 
<title>充值扣费</title> 
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
 	echo "
		<div class='header'>
		<div class='col-md-8 for'>
			<div class='col-top'>
				<div class='col-md-5 account'>
					<div class='account-in'>
						<h3>充值扣费</h3>	
						<div class='your'>
							<form action='changecard.php' method='post' onsubmit='return check()'>
								<div class='your-top'>
									<div type='text' name='account'/>用户账号：   " . $account . "</div>
								</div>
								<div class='your-top'>
									<i class='top-ic'> </i>
									<input type='text' name='ycard' id='ycard' value=''>
								</div>																
								<input type='submit' value='确认'>
								<input type='reset' value='重新填写' onclick='rewrite()'>
								<a href='javascript:logout()'>注销</a>
							</form>
						</div>
					</div>
					<div class='clearfix'> </div>
				</div>
 			</div>
 		</div>
	</div>";
  mysql_close($link);
  echo "<script type='text/javascript'> 
  	
    function check() {      
      /***if(document.getElementByID('ycard').value>=250){ 
          alert('单次充值上限250元哦'); 
          return false; 
      }
	    if(document.form_register.ycard.value.length==0){ 
          alert('请填写充值金额哦'); 
          return false; 
      }
      if(document.form_register.ncard.value.length==0){ 
          alert('请填写扣费金额哦'); 
          return false; 
      }
      if(document.form_register.ncard.value>=250){ 
          alert('单次消费不能超过250元哦'); 
          return false; 
      }***/
    }    
    function rewrite(){
    	document.form_register.reset();
    	window.location.href='#top';
	}
    function logout(){
			if(confirm('真的要注销账户吗?')){
				window.location.href='logout.php';
				return true;				
			}else{
				return false;
			}
			
	}
  </script>";
  ?>
</body> 
</html> 
