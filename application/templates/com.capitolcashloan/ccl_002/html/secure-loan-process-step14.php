<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px -143px;"> </p>
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
                <p class="color_box">
                    <img src="/ccl_002/img/white_warning.png" /><br />
                    Business and personal credit scores are vital to financial health. More than ever before, lenders are placing emphasis on credit scores from Experian, Equifax, TransUnion and Bunn &amp; Bradstreet
                </p>
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
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
