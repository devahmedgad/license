	var OpenedWindows = [];
$(document).ready(function() {    
    $(".messages-wrapper").niceScroll({
    	cursorcolor:"rgba(0, 0, 0, 0.3)",
    	cursorwidth:'10px',
    	bouncescroll:true,
    });

    
    Metronic.init(); // init metronic core components
	//Layout.init(); // init current layout
	// Login.init();
  	//Demo.init();
       // init background slide images
   
    /* End Trigger Init() [ With - admin panel Metronic ] */ 
    
    /*******************************************************
      ***                                               ***
    		*** Start Custom Js [ Admin Panle ] ******
      ***												***
    /*******************************************************
		
	/* Start My Custom js framework  */	
		

		/* Start Add More Input File To add more images */
			var max_fields      = 15;
			var wrapper         = '.contant-images-file';
			var add_button      = '#img-file-plus';

			var x = 1 ;
			$('#img-file-plus').click(function(e) {
				e.preventDefault();

				if(x < max_fields )
				{
					x++ ;
					$(wrapper).append('<tr> <td> <label class="control-label label-info" id="my_label">صوره '+ x +'  <i class="remove_field fa fa-close fa-1x" style="cursor:pointer"> حذف </i> </label> </td> <td><div  class="col-md-11"> <input name="img[]" type="file"> <small class="text-danger"></small> </div></td> </tr>');//add input box

				}else{

					$('#msg_err').fadeIn('fast', function() {
						$(this).delay(5000).fadeOut('slow');
					});
				}

			});
			$(wrapper).on("click",".remove_field", function(e){ //user click on remove text

				var remo = $(this).parent().parent().parent().fadeOut('slow').remove();
				x--;
			});
		/* End Add More Input File To add more images */

	/* End My Custom js framework  */	



    /* Start Js Page [ Photos - Admin Panel ] */

    	$('#arrow').click(function() {
 				
 			$('.img-section').fadeToggle('200', function() {
 			
	 			if($('#arrow').attr('class') == 'fa fa-arrow-circle-o-down' )
	 			{
	 				$('#arrow').attr('class','fa fa-arrow-circle-o-right') ;
	 			}else
	 			{
	 				$('#arrow').attr('class','fa fa-arrow-circle-o-down') ;
	 			}	
 				
 			});

    	});
});
    /* End Js Page [ Photos - Admin Panel ] */

	function do_login(url) {
   		$('button').prop("disabled", true);
   		$('input').prop("disabled", true);
   		$('#notify').show();

   		$.post( url , { email: $('#email').val() , password: $('#password').val() }).done(function( data )
		{
		  	if(data.scode == 401)
		  	{
		  		$('#login-status').removeClass('info');
		  		$('#login-status-icon-container').find('i').removeClass('fa-spinner fa-pulse');
		  		$('#login-status-icon-container').find('i').addClass('fa-times-circle');
		  		$('#login-status-message').html('');
		  		$.each(data.errors, function(k, v) {
				    $('#login-status-message').append('<li>'+v+'</li>')
				});
				$('button').prop("disabled", false);
				$('input').prop("disabled", false);
		  	}else if(data.scode == 202){
		  		$('#login-status').removeClass('info');
	  			$('#login-status').addClass('success');
	  			$('#login-status-icon-container').find('i').removeClass('fa-spinner fa-pulse');
		  		$('#login-status-icon-container').find('i').addClass('fa-check-circle');
		  		$('#login-status-message').html('');
			    $.each(data.msg, function(k, v) {
				    $('#login-status-message').append('<li>'+v+'</li>')
				});
				setTimeout(function(){ location.reload(); }, 4000);
		  	}else{
		  		$('#login-status').removeClass('info');
		  		$('#login-status-icon-container').find('i').removeClass('fa-spinner fa-pulse');
		  		$('#login-status-icon-container').find('i').addClass('fa-check-circle');
		  		$('#login-status-message').html('');
			    $('#login-status-message').append('<li>Some Error Happened</li>');
				$('button').prop("disabled", false);
				$('input').prop("disabled", false);
		  	}
  		});
	}	
/**************************Chat JS****************************/
/*  Get Id user or admin */


$(document).on('click', '.content', function(event) {

	var admin = $(this).parent();
	// This ID Per user Or Admin . 
	//console.log(admin.attr('data-val-id'));
	var id = admin.attr('data-val-id') ;
	var name = admin.attr('data-val-name') ;
	//console.log('"window_'+id+'"') ;
	if(!window.OpenedWindows.includes(id)){
		open_window(id,name) ;
		window.OpenedWindows.push(id);
		console.log(window.OpenedWindows);
	}
	
});

function open_window(id,name) {
	var length = window.OpenedWindows.length
	var windowBox = 
	"<div class='chat-window mini' id=\"window_"+id+"\"  style='left:"+ 245*length +"px ; height:314px'>"
    +"<div class='chat-window-title' onclick=\"chat_window_minimize("+id+")\">"
       + "<div class='close' onclick=\"close_window("+id+")\"></div>"
      +  "<div class='text'>"+ name +"</div>"
	+"</div>"

	+"<div class='chat-window-content' style='display: block;'>"
       + "<div class='chat-window-inner-content message-board pm-window'>"
           + "<div class='messages-wrapper' id='messages-wrapper-"+id+"' tabindex='0'></div>"
          + "<div class='panel-footer'>"
               + "<div class='input-group'>"
                	+"<input id='btn-input' type='text' class='form-control input-sm chat_input' placeholder=\"... Write your message here\"/>"
						+"<span class='input-group-btn'>"
						+	"<button class='btn btn-primary btn-sm' id='btn-chat'>Send</button>"
					+	"</span>"
             +   "</div>"

               + "<div class='chat-window-text-box-wrapper' id='messages_"+id+"'>"
                        +"<form id='chatForm_"+id+"' onsubmit='send_message("+id+");'>"
                            +"<input type='text' id='chat_"+id+"' autocomplete='off' class='chat-window-text-box'>"
                       + "</form>"
                   + "</div>"
               + "</div>"
       	+"</div>"
 	 +"</div>"
+"</div>";

	/* Section append windowBox   *****************************/
	//console.log($('.chat-window').size());
	/*if($('.chat-window').size() > 0)
	{
		var size = $(".chat-window:last-child").css("left:245px");
		var clone = $(".chat_window").clone().appendTo(windowBox);
			
		
		//$("#chat_window_1").appendTo(".container") ;
		
	    //var size = $( ".chat-window:last-child" ).css("margin-left");
	   //  size_total = parseInt(size) + 400;
	    //clone.css("margin-left", size_total);
	}else
	{
		console.log("Oo") ;*/
		$('#windows').append(windowBox) ; // Add NEw Box 
	/*}*/


}// ENd Function 

function chat_list_toggle() {
	if($('#main_list').hasClass('mini')){
		$('#main_list').animate({
		  height: "436px",
		});
		$('#main_list').removeClass('mini');
		
	}else{
		$('#main_list').animate({
		  height: "35px",
		});
		$('#main_list').addClass('mini');
	}
}

function chat_window_minimize(id) {
	if($('#window_'+id).hasClass('mini'))
	{
		$('#window_'+id).animate({
		  height: "314px"
		});
		$('#window_'+id).removeClass('mini');
	}else{
		$('#window_'+id).animate({
		  height: "35px"
		});
		$('#window_'+id).addClass('mini');
	}
}

function close_window(id) {
	//console.log($('#window_'+id)) ;
	$('#window_'+id).remove();
	var index = window.OpenedWindows.indexOf(id);
	window.OpenedWindows.splice(index, 1);
	console.log(window.OpenedWindows);
}
/************************** Chat JS ****************************/


/* NEw Chat JS */
/*
$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});

$(document).on('click', '#new_chat', function (e) {
	//console.log("OO") ;
	if($(".icon_close").size() > 0)
	{
    	var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
		console.log("OP") 

	}else
	{
		
		//$("#chat_window_1").appendTo(".container") ;
	}
    //var size = $( ".chat-window:last-child" ).css("margin-left");
   //  size_total = parseInt(size) + 400;
    //clone.css("margin-left", size_total);
});

$(document).on('click', '.icon_close', function (e) {
    $(this).parent().parent().parent().parent().remove();
   // $(this).remove();
});


/* NEw Chat JS */

/* Toggle Menu */
/* $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
*/
/* Toggle Menu */
