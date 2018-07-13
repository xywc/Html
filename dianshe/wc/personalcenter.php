<!DOCTYPE html>
<html>
<head>
<title>个人中心</title>
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
	
	$con = mysql_connect('localhost', 'root', '351668265');
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("user_info", $con);	
	$sql="SELECT * FROM user_info WHERE account = '$account' ";
	$result = mysql_query($sql);
	$scheduleresult = mysql_num_rows($result);
	echo "<div class='col-md-4 top-grid-in' >
			<div class='grid' >
				<div class='grid-top' style='background:#0099CC;'>
					<a href='#'><img class='img-responsive' src='images/cir.png' alt=''></a>
					<h6>姓名：" . $row['name'] . "</h6>	
					<h6>余额：" . $row['card'] . "</h6>	
					<div>
					<h6><a href='../wc/cardsure.php'>请确认是否是你的卡</a></h6>	
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
							
							<span><a onclick='buban()'>补办</a></span>
							<br>
							<p></p>
						 </div>
						<div class='clearfix'> </div>
						 <br><br>
				    </div>
					<br>
				          
				   <!--//part2-->
				   <div class='follow'>
					    <div class='col-md-6 two-left'>
						
						     <span><a onclick='set()'>更换密码</a></span>
										 
				        </div>
						 <div class='col-md-6 two'>
							<span><a href='../wc/shuaxin.php'>刷新</a></span>
							<br>
							<p></p>
						 </div>
                     <div class='clearfix'> </div>
					 <br><br>
				    </div>
					<br>	
				</div>
				<a class='follow-at' onclick='exit()'>退出</a>
		 </div>
	</div>";
?>
<script type="text/javascript"> 
 		function set(){
   			window.location.href="../wc/change.php";
 		}  
		function buban(){
   			window.location.href="../wc/buban.php";
 		}  
		function card(){
   			window.location.href="../wc/card.php";
 		}  
 		function exit(){ 		
 			document.cookie="account="+"";
   			window.location.href="../wc/index.php";
 		}   
  	</script>
</body>	
</html> 