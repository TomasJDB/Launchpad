<div id="rbm_creditscore">
    <form id="rbm_creditscore_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_creditscore_header">
            
            <p class="progress" style="background-position: 0px -30px;"> </p>
        </div>
        <div id="rbm_creditscore_content">
            <h1 class="form-title">
                <span class="bld">Your Information</span> - All Fields Required
            </h1>
            <div class="section">
                <label for="rbm_creditscore_address_1" class="half">Address 1</label>
                <input type="text" name="rbm_creditscore_address_1" id="rbm_creditscore_address_1" class="half"/>
            </div>
            <div class="section">
                <label for="rbm_creditscore_address_2" class="half">Address 2</label>
                <input type="text" name="rbm_creditscore_address_2" id="rbm_creditscore_address_2" class="half"/>
            </div>
            <div class="section">
                <label for="rbm_creditscore_city" class="half">City</label>
                <input type="text" name="rbm_creditscore_city" id="rbm_creditscore_city" class="half"/>
            </div>
            <div class="section">
                
                <label for="rbm_creditscore_home_phone" class="full">Phone</label>
                <input type="text" class="phone rbm_creditscore_autotab" id="rbm_creditscore_home_phone_area" name="rbm_creditscore_home_phone_area" data-next="rbm_creditscore_home_phone_exchange" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_creditscore_autotab" id="rbm_creditscore_home_phone_exchange" name="rbm_creditscore_home_phone_exchange" data-next="rbm_creditscore_home_phone_extension" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_creditscore_autotab" id="rbm_creditscore_home_phone_extension" name="rbm_creditscore_home_phone_extension" data-validate="true" maxlength="4" value="" />
           
            </div>
            <div class="section">
                <span class="tootltip-txt">Why do we need this?</span>
            </div>
            <br />
            <span class="gray bld">
            What is the primary reason for checking your credit scores?</span><span class="i"> (Optional)
            </span>
            <div class="radio-all">
              	<div class="radio-out"><input type="radio" name="radio_name" class="rd"/>Just Curious</div>
                <div class="radio-out"><input type="radio" name="radio_name" class="rd"/>Get out of Debt</div>
                <div class="radio-out"><input type="radio" name="radio_name" class="rd"/>Fix my Credit</div>
                <div class="radio-out"><input type="radio" name="radio_name" class="rd"/>Victim of ID Theft</div>
                <div class="radio-out"><input type="radio" name="radio_name" class="rd"/>Improve Credit Score</div>
                <div class="radio-out"><input type="radio" name="radio_name" class="rd"/>Buying a Car</div>
                <div class="radio-out"><input type="radio" name="radio_name" class="rd"/>Recently Denied Credit</div>
                <div class="radio-out"><input type="radio" name="radio_name" class="rd"/>Buying a Home</div>
              	<div class="clr"> </div>
              </div>
            
        </div>
        <div id="rbm_creditscore_footer">
            <a href="@@prev@@" id="rbm_creditscore_back_btn" > </a>
            <input type="submit" id="rbm_creditscore_next_btn" value=""/>
        </div>
    </form>
</div>
