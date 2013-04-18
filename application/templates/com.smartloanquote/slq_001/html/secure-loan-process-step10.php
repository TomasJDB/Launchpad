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
                <label for="rbm_personalloan_bank_account_type" class="full">Bank Account Type</label>
                <select name="rbm_personalloan_bank_account_type" id="rbm_personalloan_bank_account_type" class="full">
                    <option value=''>Choose</option>
                    <option value="checking">Checking account</option>
                    <option value="savings">Savings account</option>
                    <option value="both">Both checking and savings accounts</option>
                    <option value="none">No bank account</option>
                </select>
            </div>
            <div class="section">
                <label for="rbm_personalloan_income_type" class="full">Your primary source of income</label>
                <select name="rbm_personalloan_income_type" id="rbm_personalloan_income_type" class="full">
                    <option value="">Choose</option>
                    <option value="disability">Disability Benefits</option>
                    <option value="pension">Pension</option>
                    <option value="unemployed">Unemployed</option>
                    <option value="employed">Full-Time Employment</option>
                    <option value="employed_part_time">Part-Time Employment</option>
                    <option value="self_employed">Self Employed</option>
                    <option value="military">Active Military</option>
                    <option value="welfare">Welfare</option>
                </select>
            </div>
            <div class="section">
                <label for="rbm_personalloan_direct_deposit" class="half">Are you paid by direct deposit?</label>
                <select name="rbm_personalloan_direct_deposit" id="rbm_personalloan_direct_deposit" class="half">
                    <option value="">Choose</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </div>
            <div class="section">
                <label for="rbm_personalloan_credit_score" class="half">Rate your credit</label>
                <select name="rbm_personalloan_credit_score" id="rbm_personalloan_credit_score" class="half">
                    <option value="">Choose</option>
                    <option value="excellent">Excellent</option>
                    <option value="good">Good</option>
                    <option value="fair">Fair</option>
                    <option value="poor">Poor</option>
                </select>
            </div>
            <div class="section">
                <label for="rbm_personalloan_military" class="half">Are you or your spouse active in the US military?</label>
                <select name="rbm_personalloan_military" id="rbm_personalloan_military" class="half">
                    <option value="">Choose</option>
                    <option value="true">Yes</option>
                    <option value="false">No</option>
                </select>
            </div>
            <div class="section">
                <label for="rbm_personalloan_income" class="half">What is your monthly income?*</label>
                <span class="white">$</span> <input type="text" name="rbm_personalloan_income" id="rbm_personalloan_income" class="quarter" /><span class="white">.00</span>
            </div>
            <div class="section">
                <p class="full white">
                    * You do not have to disclose alimony, child support, or separate maintenance income if you do not wish to have it considered as a basis for
                    repaying the credit extended to you.
                </p>
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
            the funds to your account. Also, after your transaction we will
            delete this information from our database to ensure your privacy.
        </p>
    </div>
</div>
