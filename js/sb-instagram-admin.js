jQuery(document).ready(function($) {

	//Autofill the token and id
	var hash = window.location.hash,
        token = hash.substring(14),
        id = token.split('.')[0];
    //If there's a hash then autofill the token and id
    if(hash){
        $('#sbi_config').append('<div id="sbi_config_info"><p><b>Access Token: </b><input type="text" size=58 readonly value="'+token+'" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)."></p><p><b>User ID: </b><input type="text" size=12 readonly value="'+id+'" onclick="this.focus();this.select()" title="To copy, click the field then press Ctrl + C (PC) or Cmd + C (Mac)."></p><p>Copy and paste these into the fields below, or use a different Access Token and User ID if you wish.</p></div>');
    }
	
	//Tooltips
	jQuery('#sbi_admin .sbi_tooltip_link').click(function(){
		jQuery(this).siblings('.sbi_tooltip').slideToggle();
	});

    //Add the color picker
	if( jQuery('.sbi_colorpick').length > 0 ) jQuery('.sbi_colorpick').wpColorPicker();

	//Check User ID is numeric
	jQuery("#sb_instagram_user_id").change(function() {

		var sbi_user_id = jQuery('#sb_instagram_user_id').val(),
			$sbi_user_id_error = $(this).closest('td').find('.sbi_user_id_error');

		if (sbi_user_id.match(/[^0-9, _.-]/)) {
  			$sbi_user_id_error.fadeIn();
  		} else {
  			$sbi_user_id_error.fadeOut();
  		}

	});

});