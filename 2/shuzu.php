<?php 
           $time=$_POST[shijian];
	   $didian=$_POST[didian];
          $con=mysql_connect("localhost","root","351668265");
		mysql_query("set names 'utf8'");
    mysql_select_db("travel_guide",$con); 
    $result=mysql_query("select * from schedule where address like '%" .$didian. "%'");
// while ($row = mysql_fetch_assoc($result))
//{
 //   echo  $row['account'].'<br>'.$didian;
//} 
  // $a=$_POST["shijian"];
   //$k="time".$a;
   //$_POST['shijian'];
	$i=0;
 while ($row = mysql_fetch_array($result))
{
     
        $b[$i][0]=$row['account'];
        $b[$i][1]=$row['address'];
       $b[$i][2]=$row['starttime'];
        $b[$i][3]=$row['endtime'];
$i=$i+1;
	
} 
       echo json_encode($b);
// mysql_query("set names gbk") ;������post���������ı������������������ǻᵼ�º����"select * from lvyou where $time= '$didian' "�޷�������ѯ��
?>  
