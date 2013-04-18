<?php

echo checkLendersStatus();
function checkLendersStatus( $status = "online" ){
	if( $status == "online" ){
		$captStatus = "Updated: 03/25/2013 6:34 PM <br> Lender Status: <br><span class='blink bld'>Lenders are online &amp; accepting requests</span>";	
	}else{
		$captStatus = "Updated: 03/25/2013 6:34 PM <br> Lender Status: Lenders are offline &amp; <br> can't accepting requests.";	
	}
	return $captStatus;
}
?>
