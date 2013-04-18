<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px -48px;"> </p>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <p class="full center headline_shadow">
                    Enter your next two pay dates:
                </p>
            </div>
            <div class="section">
                <label for="rbm_personalloan_pay_date_1" class="half date">Pay Date 1<br /><span class="subheading">(mm/dd/yyyy)</span></label>
                <input type="text" name="rbm_personalloan_pay_date_1" id="rbm_personalloan_pay_date_1" class="half calendar" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_pay_date_2" class="half date">Pay Date 2<br /><span class="subheading">(mm/dd/yyyy)</span></label>
                <input type="text" name="rbm_personalloan_pay_date_2" id="rbm_personalloan_pay_date_2" class="half calendar" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_pay_schedule" class="full">
                    How often do you get paid?<br />
                    <span class="subheading">If you do not see your choice, please recheck your pay dates</span>
                </label>
                <select name="rbm_personalloan_pay_schedule" id="rbm_personalloan_pay_schedule" class="full">
                    <option value="">Choose</option>
                    <option value="weekly">Every 1 Week</option>
                    <option value="biweekly">Every 2 Weeks</option>
                    <option value="semimonthly">Twice a Month</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
