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
                    <label for="email" class="full_plus">Business Name</label>
                    <input type="text" name="email" class="full_plus" value="" />
                </div>
                <div class="section">
                    <label for="state" class="full_plus">Does your business accept credit cards?</label>
                    <select name="state" class="half">
                        <option value=''>Choose</option>
                        <option value='true'>Yes</option>
                        <option value='false'>No</option>
                    </select>
                </div>
                <div class="section">
                    <label for="business_loan_cc_amount" class="full_plus">Amount of credit card receivables</label>
                    <select name="business_loan_cc_amount" class="full_plus">  
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
                    <label for="business_loan_years_opration" class="full_plus">Years in business</label>
                    <select name="business_loan_years_operation" class="half">  
                        <option value="">Choose</option>  
                        <option value="0-5 months">0 - 5 Months</option>  
                        <option value="6-11 months">6 - 11 Months</option>  
                        <option value="1-2 years">1 - 2 Years</option>
                        <option value="3+ years">3 + Years</option>    
                    </select>
                </div>
                <div class="section">
                    <label for="business_loan_monthly_sales" class="full_plus">Monthly sales volume</label>
                    <select name="business_loan_monthly_sales" class="full_plus">  
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
                <a href="@@prev@@" id="rbm_personalloan_back_btn" >BACK</a>
                <input type="submit" id="rbm_personalloan_next_btn" value="next"/>
            </div>
        </form>
        <div class="info">
            <h1 class="info-title">Business Info</h1>
            <img src="img/icon-business.jpg" align="personal information" />
            <p>This basic information about your business will determine your options for financing.</p>
        </div>
    </div>
