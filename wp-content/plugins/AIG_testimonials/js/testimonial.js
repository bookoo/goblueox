(function($) { //start remap jQuery to $
	//start single testimonial
	$('#AIG_single_testimonial .testimonial');
	//rotate the testimonials
	setInterval(function(){
		//fade out the visible testimonial
		$('#AIG_single_testimonial .testimonial').filter(':visible').fadeOut(1000,function(){
			//if there is another testimonial fade it in
			if($(this).next('#AIG_single_testimonial .testimonial').size()){
				$(this).next().fadeIn(1000);
			}
			//if there are no more testimonials (at the end) fade the first testimonial in
			else{
				$('#AIG_single_testimonial .testimonial').eq(0).fadeIn(1000);
			}
		});
	//set an interval of 8 seconds
	}, 8000);
	//set the tallest variable to the height of the first testimonial
	var currentTallest = $('#AIG_single_testimonial .testimonial').eq(0).height();
	//if for each testimonial if the height of the current testimonial is taller then the variable for the tallest then update the variable
	$('#AIG_single_testimonial .testimonial').each(function() {
		if($(this).height() > currentTallest ) {
			currentTallest = $(this).height();
		}
	});
	//set the height of #AIG_single_testimonial to the height of the tallest testimonial
	$('#AIG_single_testimonial .testimonial').height(currentTallest);
	//end single testimonial
})(jQuery);//end map $ to jquery