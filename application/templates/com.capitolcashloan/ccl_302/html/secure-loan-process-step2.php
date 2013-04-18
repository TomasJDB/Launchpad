<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
         <table id="loan_pending" class="embeded_white text-center auto_width">
                <tbody>
                    <tr>
                        <td class=" vertical_middle">
                            <h2 class="medium_small light white text-shadow-small">Loan Amount Pending:</h2>
                            <span>Complete information below</span>
                        </td>
                        <td class="vertical_middle relevant">
                            <div class="relevant">
                                <label for="rbm_personalloan_loan_ammount_pending" class="half">

                                </label>
                                <div id="loan_pending_" class="loan_ammount_pending">

                                </div>
                                <input id="rbm_personalloan_loan_ammount_pending" name="rbm_personalloan_loan_ammount_pending" type="hidden" value="$0" class="round text-center bold"/>

                                <div class="cover"> 
                                </div>
                            </div>
                        </td>
                    </tr> 
                </tbody>

            </table>
        <div id="rbm_personalloan_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px -21px;"> </p>
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
                <p class="full sm_gray">
                    * You do not have to disclose alimony, child support, or separate maintenance income if you do not wish to have it considered as a basis for
                    repaying the credit extended to you.
                </p>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
