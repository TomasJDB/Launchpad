<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px -104px;"> </p>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <p class="full center headline">
                    Please tell us where you would like your <span class="emphasis">CASH</span> to be deposited
                </p>
            </div>
            <div class="section">
                <label for="rbm_personalloan_bank_routing_number" class="full">
                        Routing Number <span class="subheading">(9 digits)</span><br />
                        <span class="subheading"><a href="javascript:void(0);" data-target="check" class="rbm_personalloan_overlay_open">Where is this?</a></span>
                </label>
                <input type="text" name="rbm_personalloan_bank_routing_number" id="rbm_personalloan_bank_routing_number" maxlength="9" class="full" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_bank_name" class="full">Bank Name</label>
                <input type="text" name="rbm_personalloan_bank_name" id="rbm_personalloan_bank_name" class="full" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_bank_account_number" class="full">
                        Checking Account Number<br />
                        <span class="subheading"><a href="javascript:void(0);" data-target="check" class="rbm_personalloan_overlay_open">Where is this?</a></span>
                </label>
                <input type="text" name="rbm_personalloan_bank_account_number" id="rbm_personalloan_bank_account_number" class="full" maxlength="17" value="" />
            </div>
            <div class="section">
                <a href="@@rush_link@@"><img src="/fcq_002/img/get_bank_acct.png" /></a>
            </div>
            <div class="section">
                <label for="rbm_personalloan_bank_months" class="full">
                        Account Age<br />
                        <span class="subheading">Choose the length of time that best fits</span>
                </label>
                <select name="rbm_personalloan_bank_months" id="rbm_personalloan_bank_months" class="full">
                    <option value=''>Choose</option>
                    <option value="0">Brand New</option>
                    <option value="1">30 Days</option>
                    <option value="3">90 Days</option>
                    <option value="6">6 Months</option>
                    <option value="12">1 year</option>
                    <option value="24">2 years</option>
                    <option value="36">3 years</option>
                    <option value="48">4 years</option>
                    <option value="60">5 years</option>
                    <option value="72">6 years</option>
                    <option value="84">7 years</option>
                    <option value="96">8 years</option>
                    <option value="108">9 years</option>
                    <option value="120">10+ years</option>
                </select>
            </div>
        </div>
        <div id="rbm_personalloan_check" class="rbm_personalloan_overlay">
            <div id="rbm_personalloan_check_content" class="rbm_personalloan_overlay_content">
                <div class="rbm_personalloan_overlay_txt">
                    <h1>BANKING INFORMATION</h1>
                    <h2>WHY WE NEED IT</h2>
                    <p>Your banking information is needed for your money to be deposited upon loan approval. As a part of the application process, we may verify that the account informatoin is correct.</p>
                    <h2>WHERE TO FIND IT</h2>
                    <p>Your bank uses an ABA routing number to identify itself, and an account number to identify your specific account. You can find both of these numbers on a check, as shown in the picture below.</p>
                    <img src="/fcq_002/img/check-image.gif" />
                </div>
                <div class="rbm_personalloan_overlay_close" data-target="check"> </div>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
