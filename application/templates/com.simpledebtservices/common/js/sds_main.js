/**
 * SDS Javascript
 */
 
/**
 * The onLoad event handler
 */
$(document).ready(function(){
	// Secure Site Click Action
	$('#godaddy').click(function(){
		showGodaddyVerification();
	});
	// Add the rollover actions
	$('#rollover_link').hover(function(){
		// Mouse Over behavior
		$('#rollover_copy').show();
	},function(){
		// Mouse Out behavior
		$('#rollover_copy').hide();
	});
        
        
         $('.rbm_consumerdebt_overlay').overlay();
        
        
});



/**
 * Shows the GoDaddy verification window
 */
function showGodaddyVerification()
{	// Show the window
	window.open('https://seal.godaddy.com/verifySeal?sealID=P9XTvHhj8tvVkwFeyeYTTkUaw65Dc0qWp5No1vGCjiFN4j9HLarWc87thV5t',
				'Secure Site by GoDaddy.com',
				'width=550, height=370, top=150, left=400, titlebar=no, location=no, menubar=no, toolbar=no, status=no');

}
