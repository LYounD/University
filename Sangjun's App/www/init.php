<?php
require_once __DIR__ . '/database_conf.php';
require_once '/h.php';
//echo "<script>alert(\"실행됨\");</script>";
	try{//접속
		$db = new PDO("sqlite:sangjun.db");
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		
		$result = 'SELECT * FROM sangjun';
		$db_value = array();
		echo "<script>js_value = [];</script>";
		foreach($db->query('SELECT * FROM sangjun') as $row) {
			array_push($db_value, array( $row['id'],$row['addTitle'],$row['addText'],$row['addDate'] ) );					
		}
		//echo $db_value[0][0]; // == 제목
		
		
		foreach($db_value as $key=>$value){
			
			$db_title = $value[1];
			$db_text = $value[2];
			$db_date = $value[3];
			//echo "<script>alert('$db_title'+'$db_text');</script>";
			//echo "<script>alert( '$value[1]' );</script>";
			//echo "<script>js_temp = [];</script>";

			echo "<script>js_value.push( ['$db_title','$db_text','$db_date'] ); </script>";
			//echo "<script>window.alert(js_value);</script>";
		}
		
		//echo "<script>alert( '$db_value[0]' );</script>";
		//print_r($db_value);
		
	} catch (PDOException $e) {
		echo '에러가 발생했습니다. 내용: ' . h($e->getMessage());
	}
?>

<!--
<script>
function allshow(){
	var init_text = "\
	<div id='ac' \
	style='display:inline-block;  border: 1px solid color=#6799FF ; \
	width:90%; height: 300px'>"
		+add_text
		
		+"<h3> 과제 </h3>\
		<div id = 'accordion'>\
			<p> i don't like this</p>\
		</div>\
		<h3> 과제2 </h3>\
		<div id = 'dialog'>\
			<p>test</p>\
		</div>\
	</div>";

	$('#ac').replaceWith("<div id='ac' style='display:inline-block;  \
	border: 1px solid color=#6799FF ; \
	width:90%; \
	height: 300px'>"
	+add_text);
	
	acc();
}

function show(comptxt){
	var init_text = "\
	<div id='ac' style='display:inline-block;  \
	border: 1px solid color=#6799FF ; \
	width:90%; height: 300px'>"
		+comptxt
		+"<h3> 과제 </h3>\
		<div id = 'accordion'>\
			<p> i don't like this</p>\
		</div>\
		<h3> 과제2 </h3>\
		<div id = 'dialog'>\
			<p>test</p>\
		</div>\
	</div>";

	$('#ac').replaceWith("<div id='ac' style='display:inline-block;  border: 1px solid color=#6799FF ; width:90%; height: 300px'>"+comptxt);
	acc();
}

$('#search_box').change(function(e){
	if( add_text.indexOf($('#search_box').val()) == '' ){
		allshow();
	}else{
		search();
	}
});

function acc(){
$(function () {
	$('#ac').accordion({
		active : 0
	});
});
}
</script>
-->