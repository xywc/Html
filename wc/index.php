<!DOCTYPE html>
<html>
<head>
<title>登录</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/loginstyle.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href="css/fonts.css" rel='stylesheet' type='text/css'>	   
<style type="text/css"> 
form { 
  text-align: center; 
} 
</style> 
</head>
<body>
<?php  
	if(!empty($_COOKIE['account'])){  
		echo "<script type='text/javascript'>
		    window.location.href='../wc/personalcenter.php';
			</script>";   	
    }	  
?>  
	<div class="header">
		<div class="col-md-8 for">
						<div class="col-top">
							<div class="col-md-5 account">
								<div class="account-in">
									<h3>欢 迎</h3>											
									<div class="your">
										<form action="enter.php" name="form_register" method="post">
											
											<div class="your-top">
												<i> </i>
												<input type="text" name="account" placeholder="用户账号" required=""/>
											</div>
											<div class="your-top">
												<i class="top-ic"> </i>
												<input type="password" name="password" placeholder="密码" required=""/>
											</div>
											<div><input type="checkbox" name="f_enter">三天免登陆</input></div>
											<input type="submit" value="登录">
											<a href="register.html">注册</a>
										</form>
									</div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<!---->
					</div>
				</div>
			<div class="clearfix"> </div>
			<p class="footer-class"><a href="http://www.lanrenmb.com/">千旅千行</a> </p>

		</div>
	</div>
	</body>
</html>