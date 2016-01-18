var Warisan = {
	CURRENTPAGE : '',
	init : function() {
		Warisan.CURRENTPAGE = $('#CURRENTPAGE').val();
		Warisan.initPage();
		Warisan.initCommon();
	},

	initPage : function(page){
		var page = page==undefined ? Warisan.CURRENTPAGE : page;
		switch(page) {
			case 'home' : Warisan.initHome(); break;
			case 'product-detail' : Warisan.initProductDetail(); break;
			case 'contact' : Warisan.initContact(); break;
		}
	},

	initCommon: function(){
		// MAIN MENU

		// SEARCH BAR ON HEADER
		var $search = $( '.search' ),
			$searchinput = $search.find('input.search-input'),
			$body = $('html,body'),
			openSearch = function() {
				$search.data('open',true).addClass('search-open');
				$searchinput.focus();
				return false;
			},
			closeSearch = function() {
				$search.data('open',false).removeClass('search-open');
			};
		$searchinput.on('click',function(e) { e.stopPropagation(); $search.data('open',true); });
		$search.on('click',function(e) {
			e.stopPropagation();
			if( !$search.data('open') ) {

				openSearch();

				$body.off( 'click' ).on( 'click', function(e) {
					closeSearch();
				} );

			}
			else {
				if( $searchinput.val() === '' ) {
					closeSearch();
					return false;
				}
			}
		});

		//FORM VALIDATION
		$(function() {
			$("#smart-form").validate({
				/* @validation states + elements */
				errorClass: "state-error",
				validClass: "state-success",
				errorElement: "em",
				/* @validation rules */
				rules: {
					/* REGISTER */					
					f_name:{ required: true },
					s_address:{ required: true },
					city:{ required: true },
					province:{ required: true },
					postal_code:{ required: true },
					country:{ required: true },
					project_type:{ required: true },
					project_info_needed: { required: true },
					phone:{ required: true },
					email: { required: true, email: true },
					password:{ required: true, minlength: 6, maxlength: 16 },
					repeatPassword:{ required: true, minlength: 6, maxlength: 16, equalTo: '#password' }
				},

				/* @validation error messages */
				messages: {
					/* REGISTER */
					f_name:{ required: 'Please enter your name' },
					s_address:{ required: 'Please enter your street address' },
					city:{ required: 'Please enter your city' },
					province:{ required: 'Please enter your province' },
					postal_code:{ required: 'Please enter your postal code' },
					country:{ required: 'Please select your country' },
					project_type:{ required: 'Please select a project type' },
					project_info_needed:{ required: 'Please enter your project needed' },
					phone:{ required: 'Please enter your phone number or fax' },
					email: { required: 'Please enter email address', email: 'Please enter valid email address' },
					password:{ required: 'Please enter your password' },
					repeatPassword:{ required: 'Please enter your password again', equalTo: 'Password not match' }
				},

				/* @validation highlighting + error placement  
						---------------------------------------------------- */	
				highlight: function(element, errorClass, validClass) {
					$(element).closest('.field').addClass(errorClass).removeClass(validClass);
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).closest('.field').removeClass(errorClass).addClass(validClass);
				},
				errorPlacement: function(error, element) {
					if (element.is(":radio") || element.is(":checkbox")) {
						element.closest('.option-group').after(error);
					} else {
						error.insertAfter(element.parent());
					}
				}
			});
		});
	},

	initHome : function(){

		$('a[href^="#home-boxes-wrap"]').click(function() {
			$('html,body').animate({ scrollTop: $(this.hash).offset().top}, 600);
			return false;
			e.preventDefault();
		});
	},

	initContact : function (){
	}
}

