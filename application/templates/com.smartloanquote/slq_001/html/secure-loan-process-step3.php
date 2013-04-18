<div id="form-app-container">
    <div class="arrow"> </div>
<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p class="form-subtitle">$ <input type="text" id="rbm_personalloan_amount_pending" name="rbm_personalloan_amount_pending" class="money bld"  /><span class="small_stars">**</span> Loan Request Progress</p>
            <img src="/slq_001/img/locked.png" alt="locked" class="locked" align="left" /> <p class="progress" style="background-position: 0px -22px;"> </p>
        <div class="cover"> </div>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <label for="rbm_personalloan_email" class="full_plus"> Email Address: </label>
                <input type="text" name="rbm_personalloan_email" class="full_plus" id="rbm_personalloan_email" />
            </div>
            
            <div class="section">
                <label for="rbm_personalloan_home_phone" class="full">Home Phone</label>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_home_phone_area" name="rbm_personalloan_home_phone_area" data-next="rbm_personalloan_home_phone_exchange" maxlength="3" value="" />
                <span class="white">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_home_phone_exchange" name="rbm_personalloan_home_phone_exchange" data-next="rbm_personalloan_home_phone_extension" maxlength="3" value=""/>
                <span class="white">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_home_phone_extension" name="rbm_personalloan_home_phone_extension" data-validate="true" maxlength="4" value=""/>
            </div>
             <div class="section">
                <label for="rbm_personalloan_mobile_phone" class="full">Mobile Phone</label>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_mobile_phone_area" name="rbm_personalloan_mobile_phone_area" data-next="rbm_personalloan_mobile_phone_exchange" maxlength="3" value="" />
                <span class="white">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_mobile_phone_exchange" name="rbm_personalloan_mobile_phone_exchange" data-next="rbm_personalloan_mobile_phone_extension" maxlength="3" value=""/>
                <span class="white">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_mobile_phone_extension" name="rbm_personalloan_mobile_phone_extension" data-validate="true" maxlength="4" value=""/>
            </div>
            <div class="section">
                <label for="rbm_personalloan_contact_time" class="full">Best time to contact you, if needed</label>
                <select name="rbm_personalloan_contact_time" id="rbm_personalloan_contact_time" class="full_minus">
                    <option value="">Choose</option>
                    <option value="morning">Morning (9-12 AM)</option>
                    <option value="afternoon">Afternoon (12-5 PM)</option>
                    <option value="evening">Evening (5-9 PM)</option>
                    <option value="anytime">Anytime</option>
                </select>
            </div>
            
            
            
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" >BACK</a>
            <input type="submit" id="rbm_personalloan_next_btn" value="next"/>
        </div>
    </form>
    <div class="info">
        <h1 class="info-title">Contact Info</h1>
        <img src="/slq_001/img/icon-contact.jpg" align="personal information" />
        <p>We may use this information to communicate with you about your loan, as well as verify identity.</p>
    </div>
</div>
