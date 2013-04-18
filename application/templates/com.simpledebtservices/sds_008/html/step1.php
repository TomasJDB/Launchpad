<div class="fields">
    <form action="/sds_008/submit" method="get" id="form">
        <div class="form">
            <div class="section">
                <label id="firstname_lbl" for="rbm_consumerdebt_first_name" >First Name:</label>
                <input type="text" class="w180" name="rbm_consumerdebt_first_name" id="rbm_consumerdebt_first_name" value=""/>
            </div>
            <div class="section">
                <label id="lastname_lbl" for="rbm_consumerdebt_last_name" class="">Last Name:</label>
                <input type="text" class="w180" name="rbm_consumerdebt_last_name" id="rbm_consumerdebt_last_name" value=""/>
            </div>
            <div class="section">
                <label id="email_lbl" for="rbm_consumerdebt_email" class="">Email Address:</label>
                <input type="text" class="w180" name="rbm_consumerdebt_email" id="rbm_consumerdebt_email" value=""/>
            </div>
            <div class="section">
                <label id="zip_lbl" for="rbm_consumerdebt_zip" class="">Zip Code:</label>
                <input type="text" class="w100" name="rbm_consumerdebt_zip" id="rbm_consumerdebt_zip" value="" maxlength="5"/>
            </div>
            <div class="section">
                <label id="phone_lbl" for="rbm_consumerdebt_home_phone" class="">Phone Number:</label>
                <p>
                    <input class="w51" type="text" maxlength="3" value="" name="rbm_consumerdebt_home_phone_area" id="rbm_consumerdebt_home_phone_area" />
                    <input class="w51" type="text" maxlength="3" value="" name="rbm_consumerdebt_home_phone_exchange" id="rbm_consumerdebt_home_phone_exchange" />
                    <input class="w68" type="text" maxlength="4" value="" name="rbm_consumerdebt_home_phone_extension" id="rbm_consumerdebt_home_phone_extension" />
                </p>
            </div>
            <div class="section">
                <label id="other_lbl" for="rbm_consumerdebt_debt_amount" class="">Total Other <a id="rollover_link">Unsecured debt</a></label>
                <div id="rollover_copy">
                    <b>Unsecured Debt</b>
                    <br />
                    <br />
                    <div class="rollover_copy_arrow_border"> </div>
                    <div class="rollover_copy_arrow"> </div>
                    Debt without any collateral that can be taken back if you don't pay.
                    <br />
                    <br />
                    Examples: credit cards, dept. store cards, personal loans, cell phone bills,
                    legal bills, medical bills, credit lines, health club memberships.
                    <br />
                    <br />
                    No mortgages, auto loans, etc.
                </div>
                <select name="rbm_consumerdebt_debt_amount" id="rbm_consumerdebt_debt_amount" class="w180drop">
                    <option value="">Select Amount</option>
                    <option value="2500" >$2500 - $4999</option>
                    <option value="5000" >$5000 - $9999</option>
                    <option value="10000" >$10000 - $14999</option>
                    <option value="15000" >$15000 - $19999</option>
                    <option value="20000" >$20000 - $24999</option>
                    <option value="25000" >$25000 - $29999</option>
                    <option value="30000" >$30000 - $39999</option>
                    <option value="40000" >$40000+</option>
                </select>
            </div><!-- end section -->
            <!-- OVERLAY START -->
            
            
            
            <!-- OVERLAY END -->
            
            <div class="section full" id="disclaimer">
                Simple Debt Services facilitates debt relief the smart way by matching <br />
                people with licensed, certified debt providers in just a few easy steps.
                <input  id="button" type="image" src="/sds_008/img/getridofdebtBtn.png" value=" " />
            </div>
        </div>
    </form><!-- end form -->
</div><!-- end fields -->
