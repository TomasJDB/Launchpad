<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px -26px;"> </p>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <label for="rbm_personalloan_title" class="half">Title</label>
                <select name="rbm_personalloan_title" id="rbm_personalloan_title" class="half">
                    <option value=''>Choose</option>
                    <option value="Mr">Mr.</option>
                    <option value="Mrs">Mrs.</option>
                    <option value="Miss">Miss</option>
                    <option value="Ms">Ms.</option>
                    <option value="Dr">Dr.</option>
                </select>
            </div>
            <div class="section">
                <label for="rbm_personalloan_first_name" class="half">First Name</label>
                <input type="text" name="rbm_personalloan_first_name" id="rbm_personalloan_first_name" class="half" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_middle_name" class="half">Middle Name</label>
                <input type="text" name="rbm_personalloan_middle_name" id="rbm_personalloan_middle_name" class="half" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_last_name" class="half">Last Name</label>
                <input type="text" name="rbm_personalloan_last_name" id="rbm_personalloan_last_name" class="half" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_email" class="full">Email Address</label>
                <input type="text" name="rbm_personalloan_email" id="rbm_personalloan_email" class="full" value="" />
            </div>
            <div class="section" id="somediv">
                <label for="rbm_personalloan_home_phone" class="full">Home Phone</label>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_home_phone_area" name="rbm_personalloan_home_phone_area" data-next="rbm_personalloan_home_phone_exchange" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_home_phone_exchange" name="rbm_personalloan_home_phone_exchange" data-next="rbm_personalloan_home_phone_extension" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_home_phone_extension" name="rbm_personalloan_home_phone_extension" data-validate="true" maxlength="4" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_mobile_phone" class="full">Mobile Phone</label>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_mobile_phone_area" name="rbm_personalloan_mobile_phone_area" data-next="rbm_personalloan_mobile_phone_exchange" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_mobile_phone_exchange" name="rbm_personalloan_mobile_phone_exchange" data-next="rbm_personalloan_mobile_phone_extension" data-prev="home_phone_area" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_mobile_phone_extension" name="rbm_personalloan_mobile_phone_extension" data-validate="true" maxlength="4" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_contact_time" class="full">Best time to contact you, if needed</label>
                <select name="rbm_personalloan_contact_time" id="rbm_personalloan_contact_time" class="full">
                    <option value="">Choose</option>
                    <option value="morning">Morning (9-12 AM)</option>
                    <option value="afternoon">Afternoon (12-5 PM)</option>
                    <option value="evening">Evening (5-9 PM)</option>
                    <option value="anytime">Anytime</option>
                </select>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
