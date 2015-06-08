(function($) { //start remap jQuery to $
	//start form validation
	$("#AIG_testimonial_form").validate({
		rules: {
                    title: "required",
                    client_email: {
                        required: true,
                        email: true
                    },
                    description: {
                        required: true,
                        minlength: 25
                    }
                },
                messages: {
                    title: "Please enter your name",
                    description: {
                        required: "Please enter a testimonial",
                        minlength: "Your testimonial is not long enough"
                    },
                    client_email: "Please enter a valid email address"
                },
		submitHandler: function(form) {
			form.submit();
		}
       });
	//end form validation
})(jQuery);//end map $ to jquery