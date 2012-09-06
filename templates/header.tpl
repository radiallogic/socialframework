<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="MB" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="all" />

	<title>timetable</title>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script type="text/JavaScript">
	        
		$(document).ready( function(){
			var clicked = 0;
			var startId = 0;
			
			$(".space").addClass("space");
			$(".td").hover(
				function(){
					if(clicked == 0){
						$(this).toggleClass("tdRed", 1000);
					}else{
						
					}
					
				}
			);
			$(".td").click(
				function(){
					clicked = 1;
					$(this).toggleClass("tdSelected");
				}
			)
		});
	</script>
	<link rel="stylesheet" href="../css/calender.css" type="text/css">
	
</head>

<body> 
    
    <div id="content">