<div id="rbm_bizdebt">
    <form id="rbm_bizdebt_form" action="@@action@@" method="post">
        <div id="rbm_bizdebt_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px -12px;"> </p>
        </div>
        <div id="rbm_bizdebt_content"> 
            <!--form elements start --> 



            <div class="section">
                <label for="rbm_bizdebt_use_credit_card" class="full">
                    <span class="star">*</span>
                    Do you take credit cards?
                </label>
                <input type="radio" name="rbm_bizdebt_use_credit_card" value="yes" />
                Yes
                <input type="radio" name="rbm_bizdebt_use_credit_card" value="no" />
                No
            </div>

            <div class="section">
                <label for="rbm_bizdebt_accepting_credit_card_length" class="full">
                    <span class="star">*</span>
                    Length Taking Credit Card Sales
                </label>
                <select name="rbm_bizdebt_accepting_credit_card_length" class="full" id="rbm_bizdebt_accepting_credit_card_length">
                    <option value="">Select One</option>
                    <option value="Greater than 1 year">Greater than 1 year</option>
                    <option value="Less than 1 year">Less than 1 year</option>
                </select>
            </div>

            <div class="section">
                <label for="rbm_bizdebt_credit_card_volume" class="full">
                    <span class="star">*</span>
                    Monthly Credit Card Sales
                </label>

                <select name="rbm_bizdebt_credit_card_volume" class="full" id="rbm_bizdebt_credit_card_volume">  
                   <option value="">Please select one</option>
                   <option value="Less than $1000">Less than $1000</option>
                   <option value="$1000-$3000">$1000-$3000</option>
                   <option value="$3000-$6000">$3000-$6000</option>
                   <option value="$6000-$10000">$6000-$10000</option>
                   <option value="$10000-$20000">$10000-$20000</option>
                   <option value="$20000 Plus">$20000 Plus</option>
                </select>
            </div>

            <div class="section">
                <label for="rbm_bizdebt_loan_ammount" class="full">
                    <span class="star">*</span>
                    Loan Amount
                </label>
                <span class="lg_gray">$</span><input type="text" name="rbm_bizdebt_loan_amount" id="rbm_bizdebt_loan_amount" class="half" /><span class="lg_gray">.00</span>
            </div>

            <div class="section">
                <label for="rbm_bizdebt_loan_type" class="full">
                    <span class="star">*</span>
                    Reason for Loan</label>
                <select name="rbm_bizdebt_loan_type" class="full" id="rbm_bizdebt_loan_type" >  
                    <option value="">Select One</option>  
                    <option value="payroll">Payroll</option>  
                    <option value="remodeling">Remodeling</option>  
                    <option value="advertsing">Advertising</option>  
                    <option value="expanding">Expanding</option>  
                    <option value="new equipment">New Equipment</option>  
                    <option value="hire staff">Hire Staff</option>
                    <option value="pay off debts">Pay Off Debts</option>
                    <option value="start up">Start Up Loan</option>
                    <option value="other">Other</option>  
                </select>
            </div>




            <!--form elements  end  --> 
        </div>
        <div id="rbm_bizdebt_footer">
            <a href="@@prev@@" id="rbm_bizdebt_back_btn" >BACK</a>
            <input type="submit" id="rbm_bizdebt_next_btn" value="DONE"/>
        </div>
    </form>
</div>
