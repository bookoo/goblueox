jQuery(document).ready(function() {

	if (jQuery("#hpqc").length) {
		jQuery("#hpqc-tab").mouseenter(function(){
			setTimeout(function() { animateQc() }, 400 )
		});
	}
	
	function animateQc() {
		if (!jQuery("#hpqc-form").is(':animated')) {
			jQuery("#hpqc-form").css({"display":"block","border-left":"4px solid #fff"});
			jQuery("#hpqc-form").animate({
				width:400
			});
		}
	}
	
	if (jQuery("#hpqc").length) {
		jQuery("#hpqc").mouseleave(function(){
			jQuery("#hpqc-form").animate({
				width:0
			}, function() {jQuery("#hpqc-form").css({"border-left":"0px","display":"none"})} );
		});
	}
	
	if (jQuery("#hpqc").length) {
		jQuery("#hpqc-close").click(function(){
			jQuery("#hpqc-form").animate({
				width:0
			}, function() {jQuery("#hpqc-form").css({"border-left":"0px","display":"none"})} );
		});
	}
	
	jQuery('#form771').validate({
		errorLabelContainer: "#errorBox",
		rules: {
                    Field1: "required",
                    Field2: "required",
		    Field3: {
                        required: true,
                        email: true
                    },
		    Field4: "required"
                },
		highlight: function(element, errorClass, validClass) {
		   jQuery(element).addClass(errorClass).removeClass(validClass);
		   jQuery(element.form).find("label[for=" + element.id + "]")
				  .addClass(errorClass);
		},
		unhighlight: function(element, errorClass, validClass) {
		   jQuery(element).removeClass(errorClass).addClass(validClass);
		   jQuery(element.form).find("label[for=" + element.id + "]")
				  .removeClass(errorClass);
		},
		submitHandler: function(form) {
                        form.submit();
                }
	});
	
	//Mobile nav
	jQuery('.nav_phone').click(function() {
		displayNav();
	});

	displayNav = function() {
		jQuery('#mobile-nav-div').animate({
			left: 0
			}, 'slow', function() {
				//animation complete.
		});
		jQuery('#overlay').fadeIn('slow', function() {
		  // Animation complete
		});
	};

	jQuery('#overlay').click(function() {
		jQuery('#mobile-nav-div').animate({
			left: '-=100%'
			}, 'slow', function() {
				//animation complete.
		});
		jQuery('#overlay').fadeOut('slow', function() {
		  // Animation complete
		});
	});
	
	jQuery('.menu-parent-item a').on("click", function(e) {
		if (jQuery('.nav_phone').is(":visible")) {
			x = jQuery(this);
			if (x.siblings('.level-0').is(":visible") || x.siblings('.level-1').is(":visible") || x.siblings().children().length == 0) {
				return true;
			}
			console.log(x);
			x.parents('.sub-menu').addClass('notFadeAway');
			jQuery('.sub-menu').not(x.add('.notFadeAway')).fadeOut();
			x.next('.sub-menu').fadeIn();
			jQuery('.sub-menu.level-0').removeClass('notFadeAway');
			e.preventDefault();
		}
	});

});