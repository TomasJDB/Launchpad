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
                    <label for="credit_score_range" class="full">Credit Score</label>
                    <select name="credit_score_range" class="full">  
                        <option value="">Choose</option>
                        <option value="excellent">Excellent (750 – 850)</option>
                        <option value="good">Good (700 – 749)</option>
                        <option value="fair">Fair (630 – 699)</option>
                        <option value="poor">Poor (580 – 629)</option>
                        <option value="bad">Bad  (300 – 529)</option>
                    </select>
                </div>

                <div class="section">
                    <label for="rbm_personalloan_creditrepair_optin" class="full">
                        I would ALSO like a FREE credit improvement
                        consultation to legally raise my credit scores,
                        which may help me lock in better rates in the future.</label>
                    <select name="rbm_personalloan_creditrepair_optin" id="rbm_personalloan_creditrepair_optin" class="half">
                        <option value="">Choose</option>
                        <option value="true">Yes</option>
                        <option value="false">No</option>
                    </select>
                </div>
                <!--
                            <div class="section rbm_personalloan_reveal" data-trigger-element="rbm_personalloan_creditrepair_optin" data-trigger-value="true">
                                <label for="rbm_personalloan_creditrepair_consent" class="full">
                This Direct Attorney service will cost a nominal fee
    to set up but will you save thousands in interest!
    We encourage you to take time to look into this.
                </label>
                                <select name="rbm_personalloan_creditrepair_consent" id="rbm_personalloan_creditrepair_consent" class="half">
                                    <option value="">Choose</option>
                                    <option value="true">Yes</option>
                                    <option value="false">No</option>
                                </select>
                            </div>
                -->
                <div class="section">
                    <label for="state" class="full">Please have a credit improvement specialist contact me via phone or email regarding my consultation.</label>
                    <select name="state" class="half">
                        <option value=''>Choose</option>
                        <option value='true'>Yes</option>
                        <option value='false'>No</option>
                    </select>
                </div>
            </div>
            <div id="rbm_personalloan_footer">
                <a href="@@prev@@" id="rbm_personalloan_back_btn" >BACK</a>
                <input type="submit" id="rbm_personalloan_next_btn" value="next"/>
            </div>
        </form>
        <div class="info">
            <h1 class="info-title">Credit Info</h1>
            <img src="img/icon-credit.jpg" align="personal information" />
            <p>Please be as accurate as you can so that we can provide realistic 
                loan options. <span class="i grey">Note: not all loans require 
                    credit, typically loans under $1000 will not require credit 
                    checks. We encourage our customers to understand their credit 
                    and improve any errors early on.</span></p>
        </div>
    </div>
