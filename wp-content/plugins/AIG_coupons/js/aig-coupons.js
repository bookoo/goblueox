jQuery(document).ready(function($) {
var myImgBG;
    $('.upload_button').click(function() {
       tb_show('Upload a logo', 'media-upload.php?type=image&TB_iframe=true&post_id=0', false);
       myImgBG = this;
       return false;
    });
    
    //Convert RGB values to hex
	function rgb2hex(rgb) {
		rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
		function hex(x) {
		    return ("0" + parseInt(x).toString(16)).slice(-2);
		}
		return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
	}
    
    // Display the Image link in TEXT Field
    window.send_to_editor = function(html) {
        var image_url = $('img',html).attr('src');
        $(myImgBG).siblings().val(image_url);
        tb_remove();
    }
    
    jQuery('h4').click(function() {
	jQuery(this).next('.toggle-element').slideToggle();
    });
    
    //add text field
    jQuery('.add_input_button').click(function() {
	$i = jQuery(this).attr("data-id");
	$j = jQuery('#coupon-' + $i + '-inputfields').val();
	$j++;
	jQuery('#coupon-' + $i + '-inputfields').val($j);
        var $addTextField = '';
         $addTextField += '<div class="row input-field-row">';
         $addTextField += '<div class="column">';
         $addTextField += '<label for="coupon-' + $i + '-inputfield-' + $j + '">Text:</label>';
         $addTextField += '<input type="text" name="aig_coupons_settings[coupon-' + $i + '-inputfield-' + $j + ']" id="coupon-' + $i + '-inputfield-' + $j + '" class="real-time-text" value="Change me!" />';
         $addTextField += '</div>';
         $addTextField += '<div class="column">';
         $addTextField += '<label for="coupon-' + $i + '-inputfield-' + $j + '-fontsize">Font Size:</label>';
         $addTextField += '<input type="text" name="aig_coupons_settings[coupon-' + $i + '-inputfield-' + $j + '-fontsize]" id="coupon-' + $i + '-inputfield-' + $j + '" class="real-time-fontsize" value="12" />';
         $addTextField += '<div class="inc-button font-size-button">+</div><div class="dec-button font-size-button">-</div>';
         $addTextField += '</div>';
         $addTextField += '<div class="column">';
         $addTextField += '<label for="coupon-' + $i + '-inputfield-' + $j + '-color">Color:</label>';
         $addTextField += '<input type="text" name="aig_coupons_settings[coupon-' + $i + '-inputfield-' + $j + '-color]" id="coupon-' + $i + '-inputfield-' + $j + '" class="minicolors minicolors-input new-minicolor" />';
         $addTextField += '</div>';
         $addTextField += '<div class="column">';
         $addTextField += '<label for="coupon-' + $i + '-inputfield-' + $j + '-bold"><b>Bold</b></label>';
         $addTextField += '<input type="checkbox" name="aig_coupons_settings[coupon-' + $i + '-inputfield-' + $j + '-bold]" id="coupon-' + $i + '-inputfield-' + $j + '" class="real-time-bold" />';
         $addTextField += '</div>';
         $addTextField += '<div class="column">';
         $addTextField += '<label for="coupon-' + $i + '-inputfield-' + $j + '-italic"><i>Italic</i></label>';
         $addTextField += '<input type="checkbox" name="aig_coupons_settings[coupon-' + $i + '-inputfield-' + $j + '-italic]" id="coupon-' + $i + '-inputfield-' + $j + '" class="real-time-italic" />';
         $addTextField += '</div>';
         $addTextField += '<div class="column"><input type="hidden" name="aig_coupons_settings[coupon-' + $i + '-inputfield-' + $j + '-xcoords]" id="coupon-' + $i + '-inputfield-' + $j + '-xcoords" class="x-coords" value="0" />';
         $addTextField += '</div>';
         $addTextField += '<div class="column">';
         $addTextField += '<input type="hidden" name="aig_coupons_settings[coupon-' + $i + '-inputfield-' + $j + '-ycoords]" id="coupon-' + $i + '-inputfield-' + $j + '-ycoords" class="y-coords" value="0" />';
         $addTextField += '</div>';
         $addTextField += '</div>';
	jQuery('.add-input-here-' + $i).before($addTextField);
        jQuery('.new-minicolor').minicolors({
            change: function() {
		var updatedColorClass = '.' + jQuery(this).attr('id');
		updatedColor = jQuery(this).val();
		jQuery('.single-coupon-preview ' + updatedColorClass).css("color", updatedColor);
            }
         });
        jQuery('.single-coupon-preview .aig-coupon-' + $i).append('<div class="coupon-inputfieldtext coupon-' + $i + '-inputfield-' + $j + '" tabindex="-1">Change me!</div>');
    });
    
    //remove text field
    jQuery('.remove_input_button').click(function() {
	$i = jQuery(this).attr("data-id");
	$j = jQuery('#coupon-' + $i + '-inputfields').val();
	$j--;
	jQuery('#coupon-' + $i + '-inputfields').val($j);
	jQuery('.all-the-text-inputs-' + $i + ' .input-field-row').last().remove();
        jQuery('.single-coupon-preview .aig-coupon-' + $i +' .coupon-inputfieldtext').last().remove();
    });
    
    var $moveInput;
    var $noEdit;
    //select text in coupon
    jQuery('.coupon-inputfieldtext').live("focus",function() {
	jQuery(this).addClass("current-edit-element");
	$moveInput = jQuery(this).attr('class').split(' ')[1];
	$noEdit = false;
    });
    //deselect text in coupon
    jQuery('.coupon-inputfieldtext').live("blur",function() {
	jQuery(this).css("border","0px");
	jQuery(this).removeClass("current-edit-element");
	$noEdit = true;
    });
    //key events
    jQuery(document).live("keydown",function(e){
	if (!$noEdit) {
		if (e.which == 37) {
			$moveElement = '#' + $moveInput;
			var xCoordInput = nextInDOM('.x-coords', jQuery($moveElement));
			xCoordVal = parseInt( xCoordInput.val() );
			if (isNaN(xCoordVal)) {
				xCoordVal = 0;
			}
			xCoordInput.val(xCoordVal - 1);
			jQuery('.current-edit-element').css("left", xCoordVal-1 );
			e.preventDefault();
		}
		if (e.which == 39) {
			$moveElement = '#' + $moveInput;
			var xCoordInput = nextInDOM('.x-coords', jQuery($moveElement));
			xCoordVal = parseInt( xCoordInput.val() );
			if (isNaN(xCoordVal)) {
				xCoordVal = 0;
			}
			xCoordInput.val(xCoordVal + 1);
			jQuery('.current-edit-element').css("left", xCoordVal+1 );
			e.preventDefault();
		}
		if (e.which == 38) {
			$moveElement = '#' + $moveInput;
			var yCoordInput = nextInDOM('.y-coords', jQuery($moveElement));
			yCoordVal = parseInt( yCoordInput.val() );
			yCoordInput.val(yCoordVal - 1);
			if (isNaN(yCoordVal)) {
				yCoordVal = 0;
			}
			jQuery('.current-edit-element').css("top", yCoordVal-1 );
			e.preventDefault();
		}
		if (e.which == 40) {
			$moveElement = '#' + $moveInput;
			var yCoordInput = nextInDOM('.y-coords', jQuery($moveElement));
			yCoordVal = parseInt( yCoordInput.val() );
			if (isNaN(yCoordVal)) {
				yCoordVal = 0;
			}
			yCoordInput.val(yCoordVal + 1);
			jQuery('.current-edit-element').css("top", yCoordVal+1 );
			e.preventDefault();
		}
                if (e.which == 37 && e.shiftKey) {
			$moveElement = '#' + $moveInput;
			var xCoordInput = nextInDOM('.x-coords', jQuery($moveElement));
			xCoordVal = parseInt( xCoordInput.val() );
			if (isNaN(xCoordVal)) {
				xCoordVal = 0;
			}
			xCoordInput.val(xCoordVal - 10);
			jQuery('.current-edit-element').css("left", xCoordVal-10 );
			e.preventDefault();
		}
                if (e.which == 39 && e.shiftKey ) {
			$moveElement = '#' + $moveInput;
			var xCoordInput = nextInDOM('.x-coords', jQuery($moveElement));
			xCoordVal = parseInt( xCoordInput.val() );
			if (isNaN(xCoordVal)) {
				xCoordVal = 0;
			}
			xCoordInput.val(xCoordVal + 10);
			jQuery('.current-edit-element').css("left", xCoordVal+10 );
			e.preventDefault();
		}
		if (e.which == 38 && e.shiftKey ) {
			$moveElement = '#' + $moveInput;
			var yCoordInput = nextInDOM('.y-coords', jQuery($moveElement));
			yCoordVal = parseInt( yCoordInput.val() );
			yCoordInput.val(yCoordVal - 10);
			if (isNaN(yCoordVal)) {
				yCoordVal = 0;
			}
			jQuery('.current-edit-element').css("top", yCoordVal-10 );
			e.preventDefault();
		}
		if (e.which == 40 && e.shiftKey ) {
			$moveElement = '#' + $moveInput;
			var yCoordInput = nextInDOM('.y-coords', jQuery($moveElement));
			yCoordVal = parseInt( yCoordInput.val() );
			if (isNaN(yCoordVal)) {
				yCoordVal = 0;
			}
			yCoordInput.val(yCoordVal + 10);
			jQuery('.current-edit-element').css("top", yCoordVal+10 );
			e.preventDefault();
		}
	}
	});
    jQuery(".font-size-button").live("click", function() {

	var $button = jQuery(this);
	var oldValue = $button.parent().find("input").val();
      
	if ($button.text() == "+") {
		var newVal = parseFloat(oldValue) + 1;
	      } else {
	 // Don't allow decrementing below zero
	  if (oldValue > 0) {
	    var newVal = parseFloat(oldValue) - 1;
	  } else {
	    newVal = 0;
	  }
	}
      
	$button.parent().find("input").val(newVal);
	var theInputElement = $button.parent().find("input");
	var updateFontClass = '.' + jQuery(theInputElement).attr('id');
	updatedFontSize = parseInt( jQuery(theInputElement).val() );
	jQuery('.single-coupon-preview ' + updateFontClass).css("font-size", updatedFontSize);
      });
    
    jQuery('.real-time-text').live("keyup",function(e){
	var updateTextClass = '.' + this.id;
	updatedText = jQuery(this).val();
	jQuery('.single-coupon-preview ' + updateTextClass).html(updatedText);
    });
    
    jQuery('.real-time-bold').live("click",function() {
      var updateBoldClass = '.' + this.id;
      if (jQuery(this).attr('checked')) {
         jQuery('.single-coupon-preview ' + updateBoldClass).css("font-weight","bold");
      }
      if (!jQuery(this).attr('checked')) {
         jQuery('.single-coupon-preview ' + updateBoldClass).css("font-weight","normal");
      }
    });
    
    jQuery('.real-time-italic').live("click",function() {
      var updateItalicClass = '.' + this.id;
      if (jQuery(this).attr('checked')) {
         jQuery('.single-coupon-preview ' + updateItalicClass).css("font-style","italic");
      }
      if (!jQuery(this).attr('checked')) {
         jQuery('.single-coupon-preview ' + updateItalicClass).css("font-style","normal");
      }
    });
    
    jQuery('.minicolors').minicolors({
	change: function() {
		var updatedColorClass = '.' + jQuery(this).attr('id');
		updatedColor = jQuery(this).val();
		jQuery('.single-coupon-preview ' + updatedColorClass).css("color", updatedColor);
	}
    });
    
});

function nextInDOM(_selector, _subject) {
    var next = getNext(_subject);
    while(next.length != 0) {
        var found = searchFor(_selector, next);
        if(found != null) return found;
        next = getNext(next);
    }
    return null;
}
function getNext(_subject) {
    if(_subject.next().length > 0) return _subject.next();
    return getNext(_subject.parent());
}
function searchFor(_selector, _subject) {
    if(_subject.is(_selector)) return _subject;
    else {
        var found = null;
        _subject.children().each(function() {
            found = searchFor(_selector, jQuery(this));
            if(found != null) return false;
        });
        return found;
    }
    return null; // will/should never get here
}