<!DOCTYPE html>
<html>
<head>
<title>导游介绍</title>
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
<script language=javascript runat="server">
	var src =location.href;
	//alert(src);
	var params = src.split('?');
	//输出newid=10001中的id
	if(params[1]) {
		var idparams = params[1].split('=');
	}
$(document).ready(function(){ 
        $.ajax({
             url: "shuzu1.php",  
             type: "POST",
			data:{daoyou:idparams[1]},
             dataType: "text",
             error: function(){  
                 alert('Error loading XML document');  
             },  
             success: function(data){
				 var html="";
				 var row=eval(data);
		  var mdiv = document.createElement("div");
		 var limian="<div class='col-md-4 top-grid-in'>"+"<div class='grid' >"+"<div class='grid-top' style='background:#000;'>"+"<a href='#'>"+"<img class='img-responsive' src='images/cir.png' alt=''>"+"</a>"+"<h6>姓名："+idparams[1]+"</h6>"+"</div>"+"<div class='just-in'>"+"<p class='just'>个人简介："+row[1] +" </p>"+"<div class='follow'>"+"<div class='col-md-6 two'>"+"<span>"+"旅行驿站"+"</span>"+"<br>"+"<p>"+"</p>"+"</div>"+"<div class='col-md-6 two-left'>"+"<span>"+"ta的收藏"+"</span>"+"<br>"+"<p>"+"</p>"+"</div>"+"<div class='clearfix'>"+" </div>"+"</div>"+"<br>"+"<br>"+"<div class='follow'>"+"<div class='col-md-6 two'>"+"<span>"+"</span>"+"</div>"+"<br>"+"<br>"+"<br>"+"<div class='clearfix'>"+" </div>"+"</div>"+"</div>"+"<a class='follow-at' href='../wc/yuyue.html?$account="+idparams[1]+"'"+">"+"预约"+"</a>"+"</div>"+"</div>";
		  mdiv.innerHTML=limian;     
          document.body.appendChild(mdiv);
		  document.cookie="daoyou"+"="+idparams[1];
				 }
        })
		})
</script>


</body>	
</html> 