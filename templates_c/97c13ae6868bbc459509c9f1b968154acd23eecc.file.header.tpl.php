<?php /* Smarty version Smarty-3.0.8, created on 2011-08-02 09:26:09
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10170751024e37b4a1226471-60363133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1312273358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10170751024e37b4a1226471-60363133',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="MB" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="robots" content="all" />

	<title>timetable</title>
	
	<script type="text/JavaScript" src="../jquery-1.6.1.js"></script>
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
        <div id="intro">
            <div id="pageheader">
                    <div id="title"><b>timetable</b></div>
		    <div id="byline"></div>
            </div>
        </div>