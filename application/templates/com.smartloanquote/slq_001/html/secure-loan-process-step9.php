<div id="form-app-container">
    <div class="arrow"> </div>
<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p class="form-subtitle">$ <input type="text" id="rbm_personalloan_amount_pending" name="rbm_personalloan_amount_pending" class="money bld"  /><span class="small_stars">**</span> Loan Request Progress</p>
            <img src="/slq_001/img/locked.png" alt="locked" class="locked" align="left" /> <p class="progress" style="background-position: 0px -99px;"> </p>
            <div class="cover"> </div>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <p class="full center headline_shadow">
                    Please tell us where you would like your CASH to be deposited
                </p>
            </div>
            <div class="section">
                <label for="rbm_personalloan_bank_routing_number" class="full_plus">
                    Routing Number <span class="subheading">(9 digits)</span><br />
                    <span class="subheading"><a href="javascript:void(0);" data-target="check" class="rbm_personalloan_overlay_open">Where is this?</a></span>
                </label>
                <input type="text" name="rbm_personalloan_bank_routing_number" id="rbm_personalloan_bank_routing_number" maxlength="9" class="full_plus" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_bank_name" class="full_plus">Bank Name</label>
                <input type="text" name="rbm_personalloan_bank_name" id="rbm_personalloan_bank_name" class="full_plus" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_bank_account_number" class="full_plus">
                    Checking Account Number<br />
                    <span class="subheading"><a href="javascript:void(0);" data-target="check" class="rbm_personalloan_overlay_open">Where is this?</a></span>
                </label>
                <input type="text" name="rbm_personalloan_bank_account_number" id="rbm_personalloan_bank_account_number" class="full_plus" maxlength="17" value="" />
            </div>
            <div class="section">
                <a href="@@rush_link@@"><img src="/slq_001/img/get_bank_acct.png" /></a>
            </div>
            <div class="section">
                <label for="rbm_personalloan_bank_months" class="full_plus">
                    Account Age<br />
                    <span class="subheading">Choose the length of time that best fits</span>
                </label>
                <select name="rbm_personalloan_bank_months" id="rbm_personalloan_bank_months" class="full_plus">
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
                    <img src="/slq_001/img/check-image.gif" />
                </div>
                <div class="rbm_personalloan_overlay_close" data-target="check"> </div>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" >BACK</a>
            <input type="submit" id="rbm_personalloan_next_btn" value="next"/>
        </div>
    </form>
    <div class="info">
        <h1 class="info-title">Bank Info</h1>
        <img src="/slq_001/img/icon-bank.jpg" align="personal information" />
        <p>
            This information is vital in order for the lender to transfer
            the funds to your account. Also, after your transaction, we will
            delete this information from our database to ensure your privacy.
        </p>
    </div>
</div>
