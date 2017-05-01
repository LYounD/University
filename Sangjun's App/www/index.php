<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='http://code.jquery.com/ui/1.10.4/themes/redmond/jquery-ui.min.css' />
    
    <title>Memo App</title>
  </head>
	
	
  <body style = 'text-align:center' OnLoad="namosw_init_clock('form1.textclock1', 11)">
	
	<div id='phpstart'></div>
	
    <header style='text-align: center;'>
      <h1>Memo App</h1>
    </header>
    <form name="form1">
       <input type="text" name="textclock1" size="40" style=" text-align:right; border : 0; width:90%;">
    </form>
    <hr size="1" width="90%" align="center" color=#6799FF>
    <div id="Memo_input" style='text-align: center; width: 100%'>
      <input style ='width: 90%' type = "text" id = "text_title" placeholder="제목">
      <br>
      <form method='get' action="<? echo  $_Get['txt_input']; ?>">
      <textarea name= 'txt_input' id='txt_input' style="width: 90%" rows=10 placeholder="본문"></textarea>
      </form>
      <input type="button" id="input_button" value="save" onClick="when_clicked_button()"
    </div>

    <div id="search" style="text-align: right; padding-right: 10px" width="10%">
      <input type="text" id="search_box" placeholder="search">
    </div>
    <div id = 'padding' style="padding-bottom: 5px">
    </div>
    <div id='ac' style='display:inline-block;  border: 1px solid color=#6799FF ; width:90%; height: 300px'>

	<!--
      <h3> 과제 </h3>
      <div id = "accordion">
        <p> i don't like this</p>
      </div>

      <h3> 과제2 </h3>
      <div id = "dialog">
        <p> test</p>
      </div>
    -->
    </div>

    <div id = 'padding' style="padding-bottom: 50px">
    </div>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="jquery.cookie.js"></script>
	<?php
		echo ("
		<script>
			test = '1';
		</script>");
	?>
	<script src='com.js'> </script>

	

    <!-- clock -->

    <script language="JavaScript">

          <!--
    function namosw_init_clock()
    {
     var type, i, top, obj, clocks;
     clocks = new Array();
       for (i = 0, top = 0; i < namosw_init_clock.arguments.length; i += 2) {
        obj = eval('document.'+namosw_init_clock.arguments[i]);
        if (obj == null) continue;
        if ((type = namosw_init_clock.arguments[i+1]) < 1 && 11 < type) continue;
        clocks[top++] = obj;
        clocks[top++] = type;
     }
      clocks.months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July',
                                'August', 'September', 'October', 'November', 'December');
      clocks.days   = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday',
                                'Thursday', 'Friday', 'Saturday');
      clocks.k_days = new Array('일', '월', '화', '수', '목', '금', '토');
      clocks.ampm_str   = new Array('AM', 'PM');
      clocks.k_ampm_str = new Array('오전', '오후');
    
      if (top > 0) {
        document.namosw_clocks = clocks;
        namosw_clock();
      }
    }
    
    function namosw_clock()
    {
      var i, type, clocks, next_call, str, hour, ampm, now, year2, year4;
      clocks = document.namosw_clocks;
      if (clocks == null) return;
      next_call = false;
      for (i = 0; i < clocks.length; i += 2) {
        obj   = clocks[i];
        type  = clocks[i+1];
        now   = new Date();
        year2 = now.getYear();
        year4 = year2;
        if (year2 < 1000) year4 = 1900 + year2;
        if (year2 >= 100) year2 = year4;
    
        if (type == 1 || type == 2) {
          obj.value = clocks.months[now.getMonth()] + ' ' + now.getDate() + ', ' + year4;
          if (type == 2) 
           obj.value = clocks.days[now.getDay()] + ', ' + obj.value;
       } else if (type == 3 || type == 4) {
         obj.value = year2 + '/' + (now.getMonth()+1) + '/' + now.getDate();
       } else if (type == 5 || type == 6) {
         obj.value = now.getDate() + '/' + (now.getMonth()+1) + '/' + year2;
       } else if (type == 8 || type == 9 || type == 10 || type == 11) {
         obj.value = year4 + '-' + (now.getMonth()+1) + '-' + now.getDate() + '';
         if (type == 9)
           obj.value += ' ' + clocks.k_days[now.getDay()] + '요일';
       }
       if (type == 4 || type == 6 || type == 7 || type == 10 || type == 11) {
         hour = now.getHours();
         ampm = 0;
         if (hour >= 12) {
    if (hour > 12) hour -= 12;
    ampm = 1;
         }
         if (type == 10 || type == 11) {
    str = clocks.k_ampm_str[ampm] +' '+ hour+':'+ now.getMinutes() +':';
    if (type == 11) str += '' + now.getSeconds();
         } else {
    str = hour +':'+ ((now.getMinutes() < 10) ? '0'+now.getMinutes():now.getMinutes()) +':'+ ((now.getSeconds() < 10) ? '0'+now.getSeconds():now.getSeconds()) +' '+ clocks.ampm_str[ampm];
         }
         if (type == 7) obj.value  = str;
         else           obj.value += ' ' + str;
       }
       if (type == 4 || type == 6 || type == 7 || type == 10 || type == 11)
         next_call = true;
     }
     if (next_call)
       window.setTimeout("namosw_clock();", 1000);
   }
  
	</script>
  </body>

</html>


