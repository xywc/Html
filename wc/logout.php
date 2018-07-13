<!doctype html> 
<html> 
<head> 
  <meta charset="UTF-8"> 
  <title>正在注销 </title> 
</head> 
<body> 
  <?php  
	$account=$_COOKIE["account"];
     
    $link=mysql_connect("localhost","root","351668265");//闂傚倸鍊峰ù鍥р枖閺囥垹绐楅柟鐗堟緲閸戠姴鈹戦悩瀹犲缂佺媭鍨堕弻锝夊箣閿濆憛鎾绘煛閸涱喗鍊愰柡宀嬬節瀹曟帒螣閻氬瓨瀚归柡宥庡亾閹峰嘲顫濇鏍уysql 闂傚倸鍊峰ù鍥р枖閺囥垹绐楅柟鐗堟緲閸戠姴鈹戦悩瀹犲缂佺媭鍨堕弻锝夊箣閿濆憛鎾绘煛閸涱喗鍊愰柡宀�鍠栭幃鐑藉级閹稿巩鈺冪磽娴ｉ潧濮傚ù婊冪埣瀵偄顓奸崨顖涙畷闂佸憡娲﹂崜姘枍閵忋倖鈷戦柛娑橈攻鐏忣參鏌曢崶顭戠劷婵″弶鍔欓、姘舵晸娴犲宓侀煫鍥ㄧ♁閸婂鏌ら幁鎺戝姕婵炲懌鍨藉娲传閸曨偓鎷烽崼鏇炵９闁哄稁鍋撻幏宄邦潩鏉堚晜娈榦ot 闂傚倸鍊峰ù鍥р枖閺囥垹绐楅柟鐗堟緲閸戠姴鈹戦悩瀹犲缂佺媭鍨堕弻锝夊箣閿濆憛鎾绘煛閸涱喗鍊愰柡宀嬬節瀹曟帒螣閻氬瓨瀚归柡宥庡亾閹峰嘲顫濋鍌溞ㄩ梺鍝勮閸旀垿骞冮姀銈呭窛濠电姴瀚槐鏇㈡⒒娴ｅ摜绉烘い銉︽崌閳ワ妇绮电槐锟絫 
    if (!$link) { 
      die('数据库连接失败'.$mysql_error()); 
    } 
    mysql_select_db("travel_guide",$link);
    
	$sql="DELETE FROM user_info
        WHERE account='$account' ";
	mysql_query($sql) or die("删除数据库失败".mysql_error()) ;	

	$sql="DELETE FROM schedule
	WHERE account='$account' ";
	mysql_query($sql) or die("删除数据库失败".mysql_error()) ;
	
	mysql_close($link); 
  ?> 
    <script type="text/javascript"> 
    alert("注销成功"); 
    document.cookie="account="+"";
    window.location.href="index.php"; 
  </script> 
</body> 
</html> 
    