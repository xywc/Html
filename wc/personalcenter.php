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
<body>
<?php
	$account=$_COOKIE["account"];
	$link = mysql_connect('localhost', 'root', '351668265');
	if (!$link)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("travel_guide", $link);
	
	$sql="SELECT * FROM user_info WHERE account = '$account'";
	
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	
	$con = mysql_connect('localhost', 'root', '351668265');
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("travel_guide", $con);	
	$sql="SELECT * FROM schedule WHERE account = '$account' ";
	$result = mysql_query($sql);
	$scheduleresult = mysql_num_rows($result);
	echo "<div class='col-md-4 top-grid-in' >
			<div class='grid' >
				<div class='grid-top' style='background:#000;'>
					<a href='#'><img class='img-responsive' src='images/cir.png' alt=''></a>
					<h6>姓名：" . $row['account'] . "</h6>	
					<h6>电话：" . $row['telephone'] . "</h6>						
				</div>
				  <!--//part1-->
				<div class='just-in'>
					 <p class='just'>个人简介：" . $row['introduction'] . " </p>
					 <div class='follow'>
					    <div class='col-md-6 two'>
							
							<span>旅行驿站</span>
							<br>
							<p>2</p>
						 </div>
						 <div class='col-md-6 two-left'>
							
							<span>我的收藏</span>
							<br>
							<p>5</p>
					     </div>
						<div class='clearfix'> </div>
				    </div>
					<br>
				          
				   <!--//part2-->
				   <div class='follow'>
				       <div class='col-md-6 two'>
						
						    <span onClick='return schedule()'>行程</span>
							<br>
						    <p onClick='return schedule()'>".$scheduleresult."</p>
					    </div>
					    <div class='col-md-6 two-left'>
						
						     <span>我的订单</span>
										 
				        </div>
					    <div class='clearfix'> </div>
				    </div>
					<br>
							
							
					<div class='follow'>
				        <div class='col-md-6 two'>						
						     <span onClick='return set()'>修改信息</span>						                
					     </div>
					<br><br><br>
					            
					    <div class='clearfix'> </div>
				    </div>
				</div>
				<a class='follow-at' onclick='exit()'>退出</a>
		 </div>
	</div>";
?>
<script type="text/javascript"> 
 		function set(){
   			window.location.href="../wc/change.php";
 		}  
 		function exit(){ 		
 			document.cookie="account="+"";
   			window.location.href="../wc/index.php";
 		}   
 		function schedule(){
   			window.location.href="../wc/scheduletable.php";
 		}
  	</script>
</body>	
</html> 