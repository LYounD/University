if(localStorage){
	if(localStorage.getItem('add_text') == null){
		var add_text = '';
		localStorage.setItem('add_text', add_text);
	}else{
		var add_text = localStorage.getItem('add_text');
}
}

//var add_text = '';

var comptxt = '';
var copytext = add_text;

//문자열.subString(<h3>을 찾고, </div>를 찾아 분할시킨다.);



function search(){
	
	comptxt = '';
	copytext = add_text;
	
	while(true){
		console.log((copytext != ''));
		if(copytext.indexOf('<h3>') != -1){
			
			var temptxt = copytext.substring(copytext.indexOf('<h3>')+4, copytext.indexOf('</h3>'))+ copytext.substring(copytext.indexOf('<p>')+3, copytext.indexOf('</p>'));
		
			//window.alert(temptxt);
			if( temptxt.indexOf($('#search_box').val()) != -1 ){
			comptxt += '<h3>'+copytext.substring(copytext.indexOf('<h3>')+4, copytext.indexOf('</h3>'))+'</h3>'
			+'<div class=body_label><p>'+copytext.substring(add_text.indexOf('<p>')+3, copytext.indexOf('</p>')) +'</p></div>';

			copytext = copytext.substring(copytext.indexOf('</div>')+6, copytext.length);
			//window.alert(copytext);
			
		}else{
		
			console.log('못찾음');
			copytext = copytext.substring(copytext.indexOf('</div>')+6, copytext.length);
		

		//add_text = add_text.substring(add_text.indexOf('</div>')+6, add_text.length);
		//console.log(add_text);
		}
		//console.log(comptxt);
		
	//console.log(copytext);
	show(comptxt);
	//return comptxt;	
		}
		
		if(copytext == ''){
			break;
		}
		
	}
}
/*
while(add_text != ''){
	if(add_text.indexOf('<h3>') != -1){
		console.log(add_text.subString(add_text.indexOf('<h3>'), add_text.indexOf('</div>')) );
	}
}
*/
function when_clicked_button() {
	/*
	$("<div id ='ac2'><h3 id ='la_tae'"+i+" class='la_tae'>야호<input type='button' id='bttt()' onClick='bttt()'></h3><div class='automata' value='아'>dkdkdk</div></div>").prependTo('body');
	*/
	var date = new Date();
	date = date.toLocaleString();
	
	add_text += '<h3>'+$('#text_title').val()+'</h3>'+'<div class=body_label><p>'+$('#txt_input').val()+'</p><p>'+date+'</div>';
	
	$.cookie('add_text', add_text, {expires: 30} );
	
	var init_text = "<div id='ac' style='display:inline-block;  border: 1px solid color=#6799FF ; width:90%; height: 300px'>"
	+
	add_text														//추가할 내용
	+
"\
	<h3> 과제 </h3>\
	<div id = 'accordion'><p> i don't like this</p></div>\
\
	<h3> 과제2 </h3>\
	<div id = 'dialog'>\
	<p> test</p>\
	</div>\
\
	</div>"
	
	$('#ac').replaceWith("<div id='ac' style='display:inline-block;  border: 1px solid color=#6799FF ; width:90%; height: 300px'>"
	+
	add_text);
	acc();
	
	$
	localStorage.setItem('add_text', add_text);
	return add_text;
}

function allshow(){
$(function() {
	var init_text = "<div id='ac' style='display:inline-block;  border: 1px solid color=#6799FF ; width:90%; height: 300px'>"+add_text+"<h3> 과제 </h3><div id = 'accordion'><p> i don't like this</p></div><h3> 과제2 </h3><div id = 'dialog'><p> test</p></div></div>";

	$('#ac').replaceWith("<div id='ac' style='display:inline-block;  border: 1px solid color=#6799FF ; width:90%; height: 300px'>"+add_text);
	acc();
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

$('#search_box').change(function(e){
	//window.alert('d');
	//console.log(copytext);
	
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

allshow();
acc();

