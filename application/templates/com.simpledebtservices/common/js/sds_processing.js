/**
 * OnLoad Handler
 */
$(document).ready(function(){
	// Delay the form posting to give content time to be read
	setTimeout(function(){
		$('#lead_form').submit();
	},1000);
});