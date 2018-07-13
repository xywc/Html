<!doctype html> 
<html> 
<head> 
  <meta charset="UTF-8"> 
  <title>正在登录 </title> 
</head> 
<body> 
  <?php  
	$account=$_REQUEST["account"]; 
    $password=$_REQUEST["password"];  
    $link=mysql_connect("localhost","root","351668265");
    if (!$link) { 
      die('数据库连接错误'.$mysql_error()); 
    } 
    mysql_select_db("travel_guide",$link);
    $dbaccount=null; 
    $dbpassword=null; 
    $result=mysql_query("select * from user_info where account ='$account'");
    while ($row=mysql_fetch_array($result)) {
      $dbaccount=$row["account"]; 
      $dbpassword=$row["password"]; 
    } 
    if (is_null($dbaccount)) {
	  ?> 
	  <script type="text/javascript"> 
	    alert("用户名错误！"); 
	    window.location.href="index.php"; 
	  </script> 
	  <?php 
    } 
    else { 
      if ($dbpassword!=$password){
		  ?> 
		  <script type="text/javascript"> 
		    alert("密码错误！"); 
		    window.location.href="index.php"; 
		  </script> 
		  <?php 
      } 
      else { 
		if(empty($_POST['f_enter'])){
			setcookie("account",$account);
		}
		else{
			setcookie("account",$account,time()+60*60*24*3);
		}
		//setcookie('account',$account);
		echo "<script type='text/javascript'>
		    window.location.href='../wc/personalcenter.php';
		</script>";
      } 
    } 
  mysql_close($link); 
  ?> 
</body> 
</html> 
    