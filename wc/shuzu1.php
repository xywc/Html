<?php
    $account=$_POST["daoyou"];
	$link = mysql_connect('localhost', 'root', '351668265');
mysql_query("set names 'utf8'");
	if (!$link)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("travel_guide", $link);	
	$sql="SELECT * FROM user_info WHERE account = '$account'";	
	$result = mysql_query($sql);
 $row= mysql_fetch_array($result);
 $b[0]=$row["account"];
 $b[1]=$row["introduction"];
 echo json_encode($b);
 
?>