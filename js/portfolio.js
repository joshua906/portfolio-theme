// JavaScript Document

jQuery(document).ready( function($){
	
	
	
	///masonry layout
	
	var container = document.querySelector('#ms-container');
      var msnry = new Masonry( container, {
        itemSelector: '.ms-item',
        columnWidth: '.ms-item',                
      });  
      
	
	/*Contact Form submission*/
	$('#portfolioContactForm').on('submit', function(e){
		
		e.preventDefault();
		
		$('.has-error').removeClass('has-error');
		$('.js-show-feedback').removeClass('js-show-feedback');
		
		
		
		var form = $(this),
				name = form.find('#name').val(),
				email = form.find('#email').val(),
				company = form.find('#company').val(),
				message = form.find('#message').val(),
				ajaxurl = form.data('url');
		
		if( name === '' ){
			$('#name').parent('.form-group').addClass('has-error');
			return;
		}
		
		
		if( email === '' ){
			$('#email').parent('.contact-form').addClass('has-error');
			return;
		}

		if( message === '' ){
			$('#message').parent('.contact-form').addClass('has-error');
			return;
		}
		
		
		
		form.find('input, button, textarea').attr('disabled','disabled');
		$('.js-form-submission').addClass('js-show-feedback');
		
		
		$.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				
				name : name,
				email : email,
				company : company,
				message : message,
				action: 'portfolio_save_user_contact_form'
				
			},
			error : function( response ){
				console.log(response);
			},
			success : function( response ){
				if(response === 0) {
					console.log('Unable to save your message, please try again!');
				}else{ 
					console.log('Message Saved, thank you!');
				}
			}
			
		});

	});
	
	
	
	$(window).load(function() {
	$("#loading").delay(1000).fadeOut(500);
	//$("#loading-center").click(function() {
	//$("#loading").fadeOut(500);
	//});
});
	
	
	
});