<!doctype html> 
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>用户注册</title> 
</head> 
<body> 
  <?php 
  	echo "test";
    $account=$_POST["account"]; 
    $password=$_POST["password"]; 
    $name=$_POST["name"];
    $sex=$_POST["sex"];
    $telephone=$_POST["telephone"];
    $isjob=$_POST["isjob"];
    $address=$_POST["address"];
    $introduction=$_POST["introduction"];
  
    $link=mysql_connect("localhost","root","351668265"); 
    if (!$link) { 
      die('数据库连接失败'.$mysql_error()); 
    } 
    mysql_select_db("travel_guide",$link); 
    $dbaccount=null; 
    $result=mysql_query("select * from user_info where account ='$account'"); 
    while ($row=mysql_fetch_array($result)) { 
      $dbaccount=$row["account"]; 
    } 
    if(!is_null($dbaccount)){ 
		?> 
		  <script type="text/javascript"> 
		    alert("用户名已存在"); 
		    window.location.href="register.html"; 
		  </script>  
		<?php 
    } 
	else
	{
		$sql="insert into user_info (account,password,name,sex,telephone,isjob,
		address,introduction) values('$account','$password','$name',
		'$sex','$telephone','$isjob','$address','$introduction')";
		mysql_query($sql) or die("存入数据库失败".mysql_error()) ;
		?>
			<script type="text/javascript"> 
				alert("注册成功");
		    	window.location.href="index.php"; 
			</script>  
		<?php 
	}
	mysql_close($link);
  ?> 
  
</body> 
</html> 

