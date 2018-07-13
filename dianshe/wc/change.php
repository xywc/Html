<!doctype html> 
<html> 
<head> 
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta charset="UTF-8"> 
<title>修改信息</title> 
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
						<h3>修改资料</h3>	
						<div class='your'>
							<form action='changeinformation.php' method='post' onsubmit='return check()'>
								<div class='your-top'>
									<div type='text' name='account'/>用户账号：   " . $account . "</div>
								</div>
								<div class='your-top'>
									<i class='top-ic'> </i>
									<input type='password' name='password' value=" . $row['password'] . " required=''/>
								</div>
								<div class='your-top'>
									<i class='top-ic'> </i>
									<input type='password' name='re_password' value=" . $row['password'] . " required=''/>
								</div>																	
								<input type='submit' value='保存'>
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
      if(document.form_register.password.value.length==0){ 
          alert('“用户密码”一定要填写哦。。。'); 
          return false; 
      }
      if(document.form_register.password.value.length>10){ 
          alert('“用户密码”不可以超过10个字符哦。。。'); 
          return false; 
      }
      if(document.form_register.re_password.value.length==0){ 
          alert('“密码确认”忘了填哦。。。'); 
          return false; 
      }
      if(document.form_register.re_password.value!=document.form_register.password.value){ 
          alert('“密码确认”字段与“用户密码”字段一定要相同哦。。。'); 
          return false; 
      }
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
