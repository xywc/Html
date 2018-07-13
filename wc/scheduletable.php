<!DOCTYPE html>
<html>
<head>
<title>行程信息</title>
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
</head>
<body> 
	<?php
	$account=$_COOKIE["account"];
	
	$con = mysql_connect('localhost', 'root', '351668265');
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("travel_guide", $con);
	
	$sql="SELECT * FROM schedule WHERE account = '$account' ORDER BY starttime ASC";
	
	$result = mysql_query($sql);
	
	echo "<table id='scheduleTable' class='table' align='center' border='1'>
		<tr>
    		<td colspan='4' bgcolor='#6666FF' align='center'>
    			<font color='#FFFFFF'>行程信息</font>
    		</td>
    	</tr>";

	while($row = mysql_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>
				<div>开始时间：</div>
				<div>结束时间：</div>
				<div>地址：</div>
				<div>时薪（元）：</div>
			</td>";
		echo "<td>
				<div>" . $row['starttime'] . "</div>
				<div>" . $row['endtime'] . "</div>
				<div>" . $row['address'] . "</div>
				<div>" . $row['cost'] . "</div>
			</td>";
		echo "<td>
				<a><button type='button' onclick='editschedule(this)'>修改</button></a>
				</br>
				</br>
				<a><button type='button' onclick='return deleteschedule(this)'>删除</button></a>
			 </td>";
		echo "</tr>";
		/*echo "<tr>";
		echo "<td>" . $row['starttime'] . "</td>";
		echo "<td>" . $row['endtime'] . "</td>";
		echo "<td align='center'>" . $row['address'] . "</td>";
		echo "<td align='center'>" . $row['cost'] . "</td>";
		echo "<td><a href ='editschedule.php ? starttime=".$row['starttime']."
				 & endtime=".$row['endtime']." & address=".$row['address']."
				 & cost=".$row['cost']." ' >编辑</a></td>";
		echo "<td><a href ='deleteschedule.php ? starttime=".$row['starttime']."
				 & endtime=".$row['endtime']." & address=".$row['address']." 
				 & cost=".$row['cost']." ' 
				onclick='return deleteschedule();'>删除</a></td>";		
		echo "</tr>";*/
	}
	echo "</table>";
	mysql_close($con);
	
	echo "<table  border='2' align='center' bodercolor='#6666FF'>	
			<td>	
				<input style='font-size:20px;text-align:center;width:100px;height:30px' type='button' value='发布行程' onClick='schedule()'>
				<input style='font-size:20px;text-align:center;width:100px;height:30px' type='button' value='退出' onClick='exit()'>
			</td>
		</td>";
	echo "</table>";
	//setcookie('starttime',td.children[0].innerHTML);
	echo "<script type='text/javascript'> 
 		function exit(){
   			window.location.href='../wc/personalcenter.php';
 		}
 		function schedule(){
			
   			window.location.href='../wc/schedule.html';
 		}   
 		function deleteschedule(btn){  
 		    if(confirm('确认删除此行程吗？')){  
				var tr = btn.parentElement.parentElement.parentElement;
    			var td = tr.cells[1];			
            	document.cookie='starttime='+td.children[0].innerHTML;
				document.cookie='endtime='+td.children[1].innerHTML;
				document.cookie='address='+encodeURI(td.children[2].innerHTML);
				document.cookie='cost='+td.children[3].innerHTML;
				window.location.href='../wc/deleteschedule.php';
 		        return true;  
 		    }  
 		    return false;  
 		} 
		function editschedule(btn)
        {
			var tr = btn.parentElement.parentElement.parentElement;
    		var td = tr.cells[1];			
            document.cookie='starttime='+td.children[0].innerHTML;
			document.cookie='endtime='+td.children[1].innerHTML;
			document.cookie='address='+encodeURI(td.children[2].innerHTML);
			document.cookie='cost='+td.children[3].innerHTML;
			window.location.href='../wc/editschedule.php';
        }
  	</script>";
  ?>
</body> 
</html> 