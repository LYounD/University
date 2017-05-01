

$('#phpstart').load('init.php', function(){
	add_text = '';
	for(index in js_value){		
		add_text 
			+= '<h3>'
			+js_value[index][0]
			+'</h3>'
			+'<div class=body_label><p>'
			+js_value[index][1]
			+'</p><p>'
			+js_value[index][2]
			+'</p></div>';
		add_area.push( [js_value[index][0],js_value[index][1],js_value[index][2]] );
		
	}
	$.cookie('add_text', add_text, {expires: 30} );
	allshow();
	acc();
	});


if(localStorage){
	if(localStorage.getItem('add_text') == null){
		var add_text = '';
		localStorage.setItem('add_text', add_text);
	}else{
		var add_text = localStorage.getItem('add_text');
}
}
var add_area = [];


function search(){
	
	comptxt = '';
	
	for (index in add_area){
		if (add_area[index][0].indexOf($('#search_box').val()) != -1){

			comptxt += '<h3>'
			+ add_area[index][0]
			+ '</h3>'
			+ '<div class=body_label><p>'
			+ add_area[index][1]
			+ '</p><p>'
			+ add_area[index][2]
			+ '</p></div>';

			console.log('run');
		}
		else if (add_area[index][1].indexOf($('#search_box').val()) != -1){
			comptxt += '<h3>'
			+ add_area[index][0]
			+ '</h3>'
			+ '<div class=body_label><p>'
			+ add_area[index][1]
			+ '</p><p>'
			+ add_area[index][2]
			+ '</p></div>';

			console.log('run');
		}
		else{
			console.log('못찾음');
		}
	}
	show(comptxt);
}

function when_clicked_button() {
	var title = $('#text_title').val()
	var text = $('#txt_input').val()
	var date = new Date();
	date = date.toLocaleString();
	add_area.push( [title,text,date] );
	console.log(add_area);
	
	//
/*	구버전
	add_text 
	+= '<h3>'
	+$('#text_title').val()
	+'</h3>'
	+'<div class=body_label><p>'
	+$('#txt_input').val()
	+'</p><p>'
	+date
	+'</p></div>';
*/	
	add_text 
		+= '<h3>'
		+add_area[add_area.length - 1][0]
		+'</h3>'
		+'<div class=body_label><p>'
		+add_area[add_area.length - 1][1]
		+'</p><p>'
		+add_area[add_area.length - 1][2]
		+'</p></div>';
	
	$.cookie('add_text', add_text, {expires: 30} );
	
	$('#ac').replaceWith("<div id='ac' style='display:inline-block;  border: 1px solid color=#6799FF ; width:90%; height: 300px'>"
	+
	add_text);
	
	acc();//아코디언 디자인 실행.
	
	
	var cookie_addtitle = '';
	for(index in add_area){
		cookie_addtitle += (index+'_title');
		cookie_addtitle += '=';
		cookie_addtitle += add_area[index][0];
		cookie_addtitle += ' & ';
	}
	//alert(cookie_addtitle);
	$.cookie('addTitle',cookie_addtitle);

	var cookie_addtext = '';
	for(index in add_area){
		cookie_addtext += (index+'_text');
		cookie_addtext += '=';
		cookie_addtext += add_area[index][1];
		cookie_addtext += ' & ';
	}
	console.log(cookie_addtext);
	$.cookie('addText',cookie_addtext);

	var cookie_addDate = '';
	for(index in add_area){
		cookie_addDate += (index+'_date');
		cookie_addDate += '=';
		cookie_addDate += add_area[index][2];
		cookie_addDate += ' & ';
	}
	console.log(cookie_addDate);
	$.cookie('addDate',cookie_addDate);		
	
	/*
	var cookie_addtitle = '';
	cookie_addtitle += ( (add_area.length -1)+'_title');
	cookie_addtitle += '=';
	cookie_addtitle += add_area[add_area.length -1][0];
	cookie_addtitle += ' & ';
	$.cookie('addTitle',cookie_addtitle);
	
	
	var cookie_addtext = '';
	cookie_addtext += ( (add_area.length -1)+'_text');
	cookie_addtext += '=';
	cookie_addtext += add_area[add_area.length -1][1];
	cookie_addtext += ' & ';
	$.cookie('addText',cookie_addtext);

	var cookie_adddate = '';
	cookie_adddate += ( (add_area.length -1)+'_date');
	cookie_adddate += '=';
	cookie_adddate += add_area[add_area.length -1][2];
	cookie_adddate += ' & ';
	$.cookie('addDate',cookie_adddate);	
	*/
	//console.log(cookie_addtitle,cookie_addtext,cookie_adddate);
	$('#phpstart').load('sangjun.php');
	
	/*
	$.ajax(
	{
		url:'sangjun.php',
		success:function(data){
			
		}	
	}
	*/

	allshow();
	acc();
	localStorage.setItem('add_text', add_text);
	return add_text;
}


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

function show(comptxt){
$(function() {
	//window.alert(comptxt);
	var init_text = "<div id='ac' style='display:inline-block;  border: 1px solid color=#6799FF ; width:90%; height: 300px'>"+comptxt+"<h3> 과제 </h3><div id = 'accordion'><p> i don't like this</p></div><h3> 과제2 </h3><div id = 'dialog'><p> test</p></div></div>";
	//console.log(copytext);
	$('#ac').replaceWith("<div id='ac' style='display:inline-block;  border: 1px solid color=#6799FF ; width:90%; height: 300px'>"+comptxt);
	acc();
});
}

allshow();
acc();


