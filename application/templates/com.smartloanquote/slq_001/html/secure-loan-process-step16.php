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
                    <label for="credit_score_range" class="full">Total Credit Card Debt</label>
                    <select name="credit_score_range" class="full">  
                        <option value="">Choose</option>
                        <option value="500">$500 - $2499</option>
                        <option value="2500">$2500 - $4999</option>
                        <option value="5000">$5000 - $9999</option>
                        <option value="10000">$10000 - $14999</option>
                        <option value="15000">$15000 - $19999</option>
                        <option value="25000">$25000 - $29999</option>
                        <option value="30000">$30000 - $39999</option>
                        <option value="40000">$40000+</option>
                    </select>
                </div>

                <div class="section">
                    <label for="state" class="full">I am interested in hearing my options to save money</label>
                    <select name="state" class="half">
                        <option value=''>Choose</option>
                        <option value='true'>Yes</option>
                        <option value='false'>No</option>
                    </select>
                </div>
                <div class="section">
                    <label for="state" class="full">I can afford a $250 monthly minimum payment</label>
                    <select name="state" class="half">
                        <option value=''>Choose</option>
                        <option value='true'>Yes</option>
                        <option value='false'>No</option>
                    </select>
                </div>

                <div class="section">
                    <label for="debt_consent" class="debt_consent">Yes! I need help.</label>
                    <input type="checkbox" name="terms" />
                </div>
                <div class="section">
                    <p class="full_plus sub-label">
                        By choosing yes above I give permission for a certified debt specialist to contact me by phone for my free debt analysis. I fully understand that this
                        is a free consultation to reduce my existing debt, and is an alternative option to my<span class="small_stars">**</span> Loan Requests.
                    </p>
                </div>
            </div>
            <div id="rbm_personalloan_footer">
                <a href="@@prev@@" id="rbm_personalloan_back_btn" >BACK</a>
                <input type="submit" id="rbm_personalloan_next_btn" value="next"/>
            </div>
        </form>
        <div class="info">
            <h1 class="info-title">Debt Info</h1>
            <img src="img/icon-debt.jpg" align="personal information" />
            <p>
                If you are behind on your bills, loans are not always the best option.
                Working with a certified debt company could be a great way to 
                quickly lower your monthly bills. <span class="i grey">Note, this
                    service does not apply to secured debts like auto loans or home loans ect.</span>
            </p>
        </div>
    </div>
