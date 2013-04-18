<div id="rbm_creditscore">
    <form id="rbm_creditscore_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_creditscore_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px -91px;"> </p>
        </div>
        <div id="rbm_creditscore_content">
            <div class="section">
                <label for="rbm_creditscore_employ_name" class="full">Employer Name</label>
                <input type="text" name="rbm_creditscore_employ_name" id="rbm_creditscore_employ_name" class="full" value="" />
            </div>
            <div class="section">
                <label for="rbm_creditscore_work_phone_area" class="full">Work Phone</label>
                <input type="text" class="phone rbm_creditscore_autotab" id="rbm_creditscore_work_phone_area" name="rbm_creditscore_work_phone_area" data-next="rbm_creditscore_work_phone_exchange" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_creditscore_autotab" id="rbm_creditscore_work_phone_exchange" name="rbm_creditscore_work_phone_exchange" data-next="rbm_creditscore_work_phone_extension" data-prev="work_phone_area" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_creditscore_autotab" id="rbm_creditscore_work_phone_extension" name="rbm_creditscore_work_phone_extension" maxlength="4" value="" />
            </div>
        </div>
        <div id="rbm_creditscore_footer">
            <a href="@@prev@@" id="rbm_creditscore_back_btn" > </a>
            <input type="submit" id="rbm_creditscore_next_btn" value=""/>
        </div>
    </form>
</div>
