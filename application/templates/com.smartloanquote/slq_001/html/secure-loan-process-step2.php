<div id="form-app-container">
    <div class="arrow"> </div>
<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p class="form-subtitle">
                $ <input type="text" id="rbm_personalloan_amount_pending" name="rbm_personalloan_amount_pending" class="money bld" /><span class="small_stars">**</span> Loan Request Progress</p>
           <img src="/slq_001/img/locked.png" alt="locked" class="locked" align="left" /> <p class="progress" style="background-position: 0px -11px;"> </p>
           <div class="cover"> </div>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section" >
                <label for="rbm_personalloan_loan_type" class="half">Reason for Loan
                    <br />
                    <br />
                </label>
                <select id="rbm_personalloan_loan_type" name="rbm_personalloan_loan_type" class="half">
                    <option value="">Choose</option>
                    <option value="personal">Personal Loan</option>
                    <option value="auto">Car Loan</option>
                    <option value="home_loc">Home Line of Credit</option>
                    <option value="home_equity">Home Equity Loan</option>
                    <option value="home">Home Loan</option>
                    <option value="boat">Boat Loan</option>
                    <option value="rv">RV Loan</option>
                    <option value="medical">Medical Loan</option>
                    <option value="cosmetic">Cosmetic Loan</option>
                    <option value="student">Student Loan</option>
                    <option value="veterinary">Veterinary Loan</option>
                    <option value="business">Business Loan</option>
                    <option value="vacation">Vacation</option>
                    <option value="home_appliance">Home Appliance</option>
                    <option value="legal">Legal Help</option>
                    <option value="travel">Travel</option>
                    <option value="furniture">Furniture</option>
                    <option value="debt">Debt Consolidation</option>
                    <option value="tenant">Tenant Loans</option>
                    <option value="pilot">Pilot Programs</option>
                    <option value="farm">Farm Loans</option>
                    <option value="tax">Taxes</option>
                    <option value="unemployment">Layoff</option>
                    <option value="vision">Vision</option>
                    <option value="dentistry">Dentistry</option>
                    <option value="pension">Pension Loan</option>
                </select>
            </div>
            <div class="section">
                <label for="rbm_personalloan_bankruptcy" class="half">Do you have a prior active bankruptcy?</label>
                <select name="rbm_personalloan_bankruptcy" id="rbm_personalloan_bankruptcy" class="half">
                    <option value="">Choose</option>
                    <option value="no">No</option>
                    <option value="active">Yes, Active</option>
                    <option value="discharged">Yes, Discharged</option>
                    <option value="multiple">Yes, Multiple Discharged</option>
                </select>
            </div>
            <div class="section" >
                <label class="full" for="rbm_personalloan_min_amount">
                    To INCREASE your APPROVAL chances, please select the minimum
                    amount you would accept</label>
                <select name="rbm_personalloan_min_amount" id="rbm_personalloan_min_amount" class="full">
                    <option value="100">Get me as much as you can!</option>
                    <option value="200">$200</option>
                    <option value="300">$300</option>
                    <option value="400">$400</option>
                    <option value="500">$500</option>
                    <option value="600">$600</option>
                    <option value="700">$700</option>
                    <option value="800">$800</option>
                    <option value="900">$900</option>
                </select>
            </div>

        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" >BACK</a>
            <input type="submit" id="rbm_personalloan_next_btn" value="next"/>
        </div>
    </form>
    <div class="info">
        <h1 class="info-title">Loan Info</h1>
        <img src="/slq_001/img/notice.gif" align="personal information" />
        <p>This information is needed to supply you with the most appropriate loan.</p>
    </div>
</div>
