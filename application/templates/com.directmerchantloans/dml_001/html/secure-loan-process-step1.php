<div id="rbm_bizdebt">
    <form id="rbm_bizdebt_form" action="@@action@@" method="post">
        <div id="rbm_bizdebt_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px 0px;"> </p>
        </div>
        <div id="rbm_bizdebt_content">

            <!-- INPUTS start -->

            <div class="section">
                <label for="rbm_bizdebt_business_name" class="full">
                    <span class="star">*</span> Business Name
                </label>
                <input type="text" class="full" name="rbm_bizdebt_business_name" id="rbm_bizdebt_business_name"/>
            </div>
            
            <div class="section">
                <label for="rbm_bizdebt_first_name" class="full">
                    <span class="star">*</span>
                    First Name
                </label>
                <input type="text" name="rbm_bizdebt_first_name" id="rbm_bizdebt_first_name" class="full" />
            </div>
            
            
            
            <div class="section">
                <label for="rbm_bizdebt_last_name" class="full">
                    <span class="star">*</span>
                    Last Name
                </label>
                <input type="text" name="rbm_bizdebt_last_name" id="rbm_bizdebt_last_name" class="full" />
            </div>

            

            <div class="section">
                <label for="rbm_bizdebt_email" class="full">
                    <span class="star">*</span> E-mail
                </label>
                <input type="text" class="full" name="rbm_bizdebt_email" id="rbm_bizdebt_email"/>
            </div>

         
            
            <div class="section">
                <label for="rbm_bizdebt_primary_phone" class="full">
                    <span class="star">*</span> Primary Phone
                </label>
                <input type="text" class="phone rbm_bizdebt_autotab" id="rbm_bizdebt_primary_phone_area" name="rbm_bizdebt_primary_phone_area" data-next="rbm_bizdebt_primary_phone_exchange" maxlength="3" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_bizdebt_autotab" id="rbm_bizdebt_primary_phone_exchange" name="rbm_bizdebt_primary_phone_exchange" data-next="rbm_bizdebt_primary_phone_extension" maxlength="3" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_bizdebt_autotab" id="rbm_bizdebt_primary_phone_extension" name="rbm_bizdebt_primary_phone_extension" data-validate="true" maxlength="4" />
            </div>

            <!-- INPUTS end -->

        </div>
       
        <div id="rbm_bizdebt_footer">
            <div class="privacy">
	                <img src="img/shield.png" alt="shield privacy security" align="left" />
                  Privacy Secured
                  <span class="bit-128">This website is 128 Bit Secured</span>
                </div>
            
            
            <input type="submit" id="rbm_bizdebt_next_btn" class="single btn-next" value="NEXT »"/>
        </div>
    </form>
</div>
