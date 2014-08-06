var pointer=1;
function suggest(evt,select_row_bg,select_text,default_bg,default_text)
{	
	var str_name= document.getElementById("State_auto").value;
	var keynum = 0;
	var keynum=(evt.which) ? evt.which : event.keyCode;

	if (keynum==38 || keynum==40 || keynum == 13 || keynum == 9)
	{
		if(keynum == 38)  // up
		{
			if(pointer<=1){
				pointer=document.getElementById("lastval").value;
			}
			else{
				pointer=parseInt(pointer)-1;	
			}		
			
			$("#State_auto").val($("#row_"+pointer+" a").html());	
			document.getElementById("suggestion_box").style.display="block";
			
			for(i=1; i<=document.getElementById("lastval").value; i++)	
			{
				document.getElementById("row_"+i).style.background=default_bg;
				$("#row_"+i+" a").css('color',default_text);
			}		

			document.getElementById("row_"+pointer).style.background=select_row_bg;
			$("#row_"+pointer+" a").css('color',select_text);
		}
		
		else if(keynum == 40)  // down
		{
			if(parseInt(pointer)>=document.getElementById("lastval").value){
				pointer=1;
			}
			else{
				pointer=parseInt(pointer)+1;	
			}
			
			$("#State_auto").val($("#row_"+pointer+" a").html());	
			document.getElementById("suggestion_box").style.display="block";
			
			for(i=1; i<=document.getElementById("lastval").value; i++)	
			{
				document.getElementById("row_"+i).style.background=default_bg;
				$("#row_"+i+" a").css('color',default_text);
			}		

			document.getElementById("row_"+pointer).style.background=select_row_bg;
			$("#row_"+pointer+" a").css('color',select_text);
		}
		
		else if(keynum == 13 || keynum == 9)  // enter
		{
			if(document.getElementById("State_auto").value!=""){
				make_text($("#row_"+pointer+" a").attr('id'));
			}
		}
	}					
	
	else if (str_name.length>1)
	{
		document.getElementById("suggestion_box").style.display="block";
		$.ajax({
	       type:'POST',
	       url:'ajax_states.php',
	       data: {country_id:$("#Country_auto").val(),term:$("#State_auto").val()}, 
	    }).done(function(msg){
	        document.getElementById("suggestion_box").innerHTML = msg;
	        $('#State_auto').after($('#suggestion_box'));
	        $('#suggestion_box').css('width',$('#State_auto').attr('width'));
	    });
	}
	else if(str_name.length<=1)
	{
		pointer=1;
		document.getElementById("suggestion_box").style.display="none";
	}
	
	else
	{
		document.getElementById("suggestion_box").style.display="none";
	}
}

function make_text(id)
{
	document.getElementById("State_auto").value=document.getElementById(id).innerHTML;	
	document.getElementById("State_auto").focus();
	document.getElementById("suggestion_box").style.display="none";
}

function change_bg(id,select_row_bg,select_text,default_bg,default_text)
{
	$('#'+id).closest('tr').css('background',default_bg);
	$('#'+id).css('color',default_text);
}

function changebghover(id,select_row_bg,select_text,default_bg,default_text)
{
	for(i=1; i<=document.getElementById("lastval").value; i++)
	{
		document.getElementById("row_"+i).style.background=default_bg;
		$("#row_"+i).find('a').css('color',default_text);
	}
	
	$('#'+id).closest('tr').css('background',select_row_bg);
	$('#'+id).css('color',select_text);
	pointer=$('#'+id).closest('tr').attr('id').charAt(4);
}
