<div id="rbm_creditscore">
    <form id="rbm_creditscore_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_creditscore_header">
            
            <p class="progress" style="background-position: 0px -60px;"> </p>
        </div>
        <div id="rbm_creditscore_content">
            
            <h1 class="form-title2">All Fields Required</h1>
            <div class="radio-all">
                <p class="gray">
                    We need the following information to confirm your identity and retrieve your credit data. The information you submit on our website is secure.
                </p>
                <br />
            <div class="section">
                <label for="rbm_creditscore_ssn" class="full">
                    Social Security Number <span class="subheading">(9 Digits)</span>
                    <span class="subheading"><a href="javascript:void(0);" data-target="ssn" class="rbm_creditscore_overlay_open">Why?</a></span>
                </label>
                <input type="text" class="phone rbm_creditscore_autotab" id="rbm_creditscore_ssn_1" name="rbm_creditscore_ssn_1" data-next="rbm_creditscore_ssn_2" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_creditscore_autotab" id="rbm_creditscore_ssn_2" name="rbm_creditscore_ssn_2" data-next="rbm_creditscore_ssn_3" maxlength="2" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_creditscore_autotab" id="rbm_creditscore_ssn_3" name="rbm_creditscore_ssn_3" data-validate="true" maxlength="4" value="" />
                <img src="/ccs_102/img/lock-secure.gif" alt="lock" />
            </div>
            <div class="section">
                <label for="rbm_creditscore_birthdate" class="full date">Date of Birth <span class="subheading">(mm/dd/yyyy)</span></label>
                <input type="text" class="datebox rbm_creditscore_autotab" id="rbm_creditscore_birthdate_month" name="rbm_creditscore_birthdate_month" data-next="rbm_creditscore_birthdate_day" maxlength="2" value="" />
                <span class="lg_gray">/</span>
                <input type="text" class="datebox rbm_creditscore_autotab" id="rbm_creditscore_birthdate_day" name="rbm_creditscore_birthdate_day" data-next="rbm_creditscore_birthdate_year" maxlength="2" value="" />
                <span class="lg_gray">/</span>
                <input type="text" class="datebox rbm_creditscore_autotab" id="rbm_creditscore_birthdate_year" name="rbm_creditscore_birthdate_year" data-validate="true" maxlength="4" value="" />
            </div>
            </div>
        </div>
        <div id="rbm_creditscore_ssn" class="rbm_creditscore_overlay">
            <div id="rbm_creditscore_ssn_content" class="rbm_creditscore_overlay_content">
                <div class="rbm_creditscore_overlay_txt">
                    <h1>SOCIAL SECURITY NUMBER</h1>
                    <h2>WHY IS IT NEEDED?</h2>
                    <p>
                        This information is used to verify your identity prior to being serviced by the lender. We do not store this private information in our data base to ensure your data is not compromised.
                    </p>
                </div>
                <div class="rbm_creditscore_overlay_close" data-target="ssn"> </div>
            </div>
        </div>
        <div id="rbm_creditscore_footer">
            <a href="@@prev@@" id="rbm_creditscore_back_btn" > </a>
            <input type="submit" id="rbm_creditscore_next_btn" class="submit" value=""/>
        </div>
    </form>
</div>
