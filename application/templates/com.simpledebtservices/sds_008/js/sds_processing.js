/**
 * OnLoad Handler
 */
$(document).ready(function(){
	// Delay the form posting to give content time to be read
	$('#form').submit(function(){
       $('#processing').show();
       $('#processing_msg').show(); 
	});
        // Add the overlay behaivior
        $('.rbm_consumerdebt_overlay').overlay();
});