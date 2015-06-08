<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blue Ox HEATING &amp; AIR</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1-10-2.min.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#form719').validate({
				errorElement: "label",
				highlight: function(element) {
				jQuery(element).parent().addClass("error");
				},
				
				unhighlight: function(element) {
				jQuery(element).parent().removeClass("error");
				},

				rules: {
					Field1: "required",
					Field2: {
						required: true,
						email: true
					},
					Field3: "required",
					Field4: "required"
				},
				messages: {
					Field1: "",
					Field2: "",
					Field3: "",
					Field4: ""
				},
				submitHandler: function(form) {
					form.submit();
				}
		});
		
		
	});
	
		
</script>
</head>

<body>

<div class="main_wrapper">

  <div class="inner_wrapper">

    <div class="top-wrapper">

      <div class="left-top">

        <div class="logo"><a href="http://blueox-landing.aigdev.net"><img src="images/logo.png" alt="Blue Ox HEATING &amp; AIR" title="Blue Ox HEATING &amp; AIR" width="278" height="284" /></a></div>
		
		<!-- NEW FORM -->
		<div class="contact-form">
			<div>
				<div class="contact-heading"><img src="images/thankyou-bg.png" alt="" /></div>
				<div class="clear"></div>
			</div>
			<div class="message">
				<p class="title">Thank you for contacting Blue Ox Heating and Air.</p>
				<p class="title">We have received your form and will contact you shortly.</p>
			</div>
		</div>
		
      </div>

      <div class="right-top">

        <div class="warm_txt"><img src="images/warm-weather-txt.png" alt="" /></div>

        <div class="withover"><img src="images/withover-txt.png" alt="" /></div>

      </div>

    </div>

    <div class="discount-panel">

    <div class="discount-inner">

      <div class="discount-box"> <span class="price">$79</span>

        <p>Air Conditioning<br />

          Tune Up</p>

        <span>Regular $149. Not valid with any<br />

        other offers. Expires 7/31/2013</span> </div>

      <div class="discount-box discount-box-second"> <span class="price">FREE</span>

        <p>Second Opinions on<br />



          Any Competitor <br />





          Repairs! </p>

        <span>Not valid with any<br />

        other offers. Expires 7/31/2013</span> </div>

      <div class="discount-box discount-box-last"> <span class="up">UP TO</span><span class="price1">$800</span><span class="off">OFF</span><br />

<br />

<br />

<br />



	

        <p>Any High Efficiency

          Air Condition &amp;<br />



          Furnace System </p>

        <span>Not valid with any<br />

        other offers. Expires 7/31/2013</span> </div>

    </div>

    <div class="why-box">

      <h4>Why Choose <span>Blue Ox</span> Heating and Air?</h4>

      <ul>

        <li>Convenient Night &amp; Weekand Appointments Available for Now Equipment Purchased. </li>

        <li>Background - Checked Techs. </li>

        <li>Repair &amp; Installation.</li>

        <li>Free Estimates on New Equipment.</li>

      </ul>

    </div>

    </div>

  </div>

</div>

<div class="footer-wrapper">

  <div class="inner_wrapper">

    <div class="footer-txt"> © 2013 <span>Blue Ox Heating &amp; Air</span> All rights reserved.<br />

      <img src="images/footer-logo.png" alt="Blue Ox HEATING &amp; AIR" title="Blue Ox HEATING &amp; AIR" /> </div>

  </div>

</div>

</body>

</html>

