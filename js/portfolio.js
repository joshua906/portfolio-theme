// JavaScript Document

jQuery(document).ready( function($){
	
	
	
	///masonry layout
	
	/*var container = document.querySelector('#ms-container');
      var msnry = new Masonry( container, {
        itemSelector: '.ms-item',
        columnWidth: '.ms-item',                
      });  
      
	
	var $container = $('#ms-container');
	// initialize
	$container.masonry({
  	columnWidth: '.ms-item',
  	itemSelector: '.ms-item'
	});
	*/
	var $grid = $('#ms-container').masonry({
  itemSelector: '.ms-item',
  percentPosition: true,
  columnWidth: '.ms-item'
});
// layout Isotope after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.masonry();
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
			$('#name').parent('.form-group-two').addClass('has-error');
			return;
		}
		
		
		if( email === '' ){
			$('#email').parent('.form-group-two').addClass('has-error');
			return;
		}

		if( message === '' ){
			$('#message').parent('.form-group-two').addClass('has-error');
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
				$('.js-form-submission').addClass('js-show-feedback');
				$('.js-form-error').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success : function( response ){
				if(response === 0) {
					
				setTimeout(function(){
					
				
				$('.js-form-submission').addClass('js-show-feedback');
				$('.js-form-error').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
					},500);
				}else{ 
					setTimeout(function(){
				$('.js-form-submission').addClass('js-show-feedback');
				$('.js-form-success').addClass('js-show-feedback');
				form.find('input, button, textarea').removeAttr('disabled').val('');
					
					},500);
				}
			}
			
		});

	});
	
	
	// animation loading
	$(window).load(function() {
	$("#loading").delay(1000).fadeOut(500);
	});
	
	//aniimate inview		
		
		
		
	
});