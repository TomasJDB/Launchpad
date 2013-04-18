<div class="text-center" id="top_form">
                                <img src="/spl_001/img/shield.png" alt="Capitol Cash Loans" />
                            </div>
<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
         <table id="loan_pending" class="embeded_white text-center auto_width">
                <tbody>
                    <tr>
                        <td class=" vertical_middle">
                            <h2 class="medium_small light white text-shadow-small">Loan Amount Pending:</h2>
                            
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
                <label for="state" class="full">I am interested in applying for business financing</label>
                <select name="state" class="full">
                    <option value=''>Choose</option>
                    <option value='true'>Yes</option>
                    <option value='false'>No</option>
                </select>
            </div>
            <div class="section">
                <label for="business_loan_amount" class="full">Desired loan amount</label>
                <select name="business_loan_amount" class="full">
                    <option value="">Choose</option>
                    <option value="300">$300</option>
                    <option value="500">$500</option>
                    <option value="750">$750</option>
                    <option value="1000">$1000</option>
                    <option value="1250">$1250</option>
                    <option value="1500">$1500</option>
                    <option value="2000">$2000</option>
                    <option value="2500">$2500+</option>
                </select>
            </div>
            <div class="section">
                <label for="business_loan_type" class="full">Type of business loan</label>
                <select name="business_loan_type" class="full">
                    <option value="">Choose</option>
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
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
