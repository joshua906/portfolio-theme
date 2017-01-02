// JavaScript Document

jQuery(document).ready( function($){
	
	/*Contact Form submission*/
	$('#portfolioContactForm').on('submit', function(e){
		
		e.preventDefault();
		
		var form = $(this),
				name = form.find('#name').val(),
				email = form.find('#email').val(),
				company = form.find('#company').val(),
				message = form.find('#message').val(),
				ajaxurl = form.data('url');
		
		if( name === '' || email === '' || message === '' || company === ''){
			console.log('Required inputs are empty');
			return;
		
		}
		
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
					console.log('Message Saved, thank you!')
				}
			}
			
		});

	});
	
	
	
	
	
	
	
});