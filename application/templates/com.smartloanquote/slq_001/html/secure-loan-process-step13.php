<div id="form-app-container">
    <div class="arrow"> </div>
    <div id="rbm_personalloan">
        <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
            <div id="rbm_personalloan_header">
                <p class="form-subtitle">$ <input type="text" id="rbm_personalloan_amount_pending" name="rbm_personalloan_amount_pending" class="money bld"  /><span class="small_stars">**</span> Loan Request Progress</p>
                <img src="/slq_001/img/locked.png" alt="locked" class="locked" align="left" /> <p class="progress" style="background-position: 0px -143px;"> </p>
                <div class="cover"> </div>
            </div>
            <div id="rbm_personalloan_content">
                <div class="section">
                    <label for="state" class="full">I am interested in applying for business financing</label>
                    <select name="state" class="half">
                        <option value=''>Choose</option>
                        <option value='true'>Yes</option>
                        <option value='false'>No</option>
                    </select>
                </div>
                <div class="section">
                    <label for="business_loan_amount" class="full">Desired loan amount <span class="subheading">($5,000 - $1,000,000)</span></label>
                    <input type="text" name="business_loan_amount" class="full" />
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
                <div class="section">
                    <label for="rbm_personalloan_pharmacy">Pharmacy Option</label>
                    <input type="button" name="rbm_personalloan_pharmacy" value="yes" id="rbm_personalloan_pharmacy_yes" selected="selected"/>
                </div>
            </div>
            <div id="rbm_personalloan_footer">
                <a href="@@prev@@" id="rbm_personalloan_back_btn" >BACK</a>
                <input type="submit" id="rbm_personalloan_next_btn" value="next"/>
            </div>
        </form>
        <div class="info">
            <h1 class="info-title">Loan Info</h1>
            <img src="/slq_001/img/icon-loan.jpg" align="personal information" />
            <p>Business financing is available for lines of credit, startup loans, and business loans. Good credit is not required in all cases.</p>
        </div>
    </div>
