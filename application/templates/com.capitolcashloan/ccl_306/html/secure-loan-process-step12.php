<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
         <table id="loan_pending" class="embeded_white text-center auto_width">
            <tbody>
                <tr>
                    <td class=" vertical_middle">
                        <h2 class="medium_small light_black">Loan Amount Pending:</h2>
                        <span class="small_big light gray">Complete information below</span>
                    </td>
                    <td class="vertical_middle relevant">
                        <div class="relevant">
                            <label for="rbm_personalloan_loan_ammount_pending" class="half">

                            </label> <div id="loan_pending_box" class="round text-center inset_shadow_light">  </div>
                        <input id="rbm_personalloan_loan_ammount_pending" name="rbm_personalloan_loan_ammount_pending" type="hidden" value="$0" class="round text-center inset_shadow_light bold"/>
                       
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
                <p class="color_box">
                    <img src="/ccl_306/img/white_warning.png" alt="info" />
                    If personal debt is the main reason for your loan, we highly recommend professional debt services to legally reduce your debt. You can INCREASE your CASH by 
                    LOWERING your monthly PAYMENTS up to 40%, by saving on interest and consolidating your bills into a SINGLE payment.
                </p>
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
                <p class="color_box">
                    Debt services are probably not the right fit for you at this time.
                </p>
            </div>
            <div class="section">
                <label for="debt_consent" class="debt_consent">Yes! I need help.</label>
                <input type="checkbox" name="terms" />
            </div>
            <div class="section">
                <p class="full sm_gray">
                    By choosing yes above I give permission for a certified debt specialist to contact me by phone for my free debt analysis. I fully understand that this
                    is a free consultation to reduce my existing debt, and is an alternative option to my loan requests.
                </p>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
