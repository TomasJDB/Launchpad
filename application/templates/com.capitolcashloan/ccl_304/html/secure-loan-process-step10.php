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
            <p class="progress" style="background-position: 0px -143px;"> </p>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <label for="email" class="full">Business Name</label>
                <input type="text" name="email" class="full" value="" />
            </div>
            <div class="section">
                <label for="state" class="full">Does your business accept credit cards?</label>
                <select name="state" class="full">
                    <option value=''>Choose</option>
                    <option value='true'>Yes</option>
                    <option value='false'>No</option>
                </select>
            </div>
            <div class="section">
                <label for="business_loan_cc_amount" class="full">Amount of credit card receivables</label>
                <select name="business_loan_cc_amount" class="full">  
                    <option value="">Choose</option>  
                    <option value="Less than $1,000">Less than $1,000</option>  
                    <option value="$1,000-$3,000">$1,000-$3,000</option>  
                    <option value="$3,000-$6,000">$3,000-$5,999</option>  
                    <option value="$6,000-$10,000">$6,000-$10,000</option>  
                    <option value="$10,000-$20,000">$10,000-$20,000</option>  
                    <option value="$20,000-$50,000">$20,000-$50,000</option>  
                    <option value="$50,000+">$50,000+</option>  
                </select>
            </div>
            <div class="section">
                <label for="business_loan_years_opration" class="half">Years in business</label>
                <select name="business_loan_years_operation" class="half">  
                    <option value="">Choose</option>  
                    <option value="0-5 months">0 - 5 Months</option>  
                    <option value="6-11 months">6 - 11 Months</option>  
                    <option value="1-2 years">1 - 2 Years</option>
                    <option value="3+ years">3 + Years</option>    
                </select>
            </div>
            <div class="section">
                <label for="business_loan_monthly_sales" class="half">Monthly sales volume</label>
                <select name="business_loan_monthly_sales" class="half">  
                    <option value="">Choose</option>  
                    <option value="Less than $1,000">Less than $1,000</option>  
                    <option value="$1,000-$3,000">$1,000-$3,000</option>  
                    <option value="$3,000-$6,000">$3,000-$5,999</option>  
                    <option value="$6,000-$10,000">$6,000-$10,000</option>  
                    <option value="$10,000-$20,000">$10,000-$20,000</option>  
                    <option value="$20,000-$50,000">$20,000-$50,000</option>  
                    <option value="$50,000+">$50,000+</option>  
                </select>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
