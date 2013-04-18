<div id="rbm_creditscore">
    <form id="rbm_creditscore_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_creditscore_header">

            <p class="progress" style="background-position: 0px -120px;"> </p>
        </div>
        <div id="rbm_creditscore_content">
            <h1 class="heading-title">Josh, your credit scores are ready!</h1>
            <span class="subheadeing">Please take time to set up your account.</span>

            <h1 class="form-title"><span class="bld">Verification Information</span></h1>

            <p class="offer">Tell us which card you would like to use for your $1.00 refundable processing fee.</p>
            <br />
            <div>
                <div class="section">
                    <label for="rbm_creditscore_cctype" class="card_label">I am using:</label>
                    <div class="card"><input type="radio" name="rbm_creditscore_cctype" value="credit" class="rd" /> Credit Card</div>
                    <div class="card"><input type="radio" name="rbm_creditscore_cctype" value="debit" class="rd" /> Debit Card</div>
                    <div class="card">
                        <img src="img/visa.gif" alt="visa" />
                        <img src="img/mastercard.gif" alt="master card" />
                        <img src="img/amex.gif" alt="amex" />
                    </div>
                </div>
            </div> 
            <div class="section">
                <label class="half" for="rbm_creditscore_cc_name">
                    Name on Card:
                </label>
                <input type="text" name="rbm_creditscore_cc_name" class="half" id="rbm_creditscore_cc_name" />
            </div>
            <div class="section">
                <label class="half" for="rbm_creditscore_cc_type">
                    Card Type:
                </label>
                <input type="text" name="rbm_creditscore_cc_type" class="half" id="rbm_creditscore_cc_type" />
            </div>
            <div class="section">
                <label class="half" for="rbm_creditscore_cc_number">
                    Card Number:
                </label>
                <input type="text" name="rbm_creditscore_cc_number" class="half" id="rbm_creditscore_cc_number" />
            </div>

            <div class="section">
                <label for="rbm_creditscore_cc_exp" class="half">Expiration Date:</label>
                <select name="rbm_creditscore_cc_exp_month" id="rbm_creditscore_residence_date_month" class="date_drop">
                    <option value="">Month</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <span class="lg_gray">/</span>
                <select name="rbm_creditscore_cc_exp_year" id="rbm_creditscore_residence_date_year" class="date_drop" data-validate="true">
                    <option value="">Year</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                    <option value="1999">1999</option>
                    <option value="1998">1998</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1993">1993</option>
                    <option value="1992">1992</option>
                    <option value="1991">1991</option>
                    <option value="1990">1990</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1987">1987</option>
                    <option value="1986">1986</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1983">1983</option>
                    <option value="1982">1982</option>
                    <option value="1981">1981</option>
                    <option value="1980">1980</option>
                    <option value="1979">1979</option>
                    <option value="1978">1978</option>
                    <option value="1977">1977</option>
                    <option value="1976">1976</option>
                    <option value="1975">1975</option>
                    <option value="1974">1974</option>
                    <option value="1973">1973</option>
                    <option value="1972">1972</option>
                    <option value="1971">1971</option>
                    <option value="1970">1970 or prior</option>
                </select>
            </div>

        </div>
        <div id="rbm_creditscore_footer">
            <a href="@@prev@@" id="rbm_creditscore_back_btn" > </a>
            <input type="submit" id="rbm_creditscore_next_btn" value=""/>
            <p class="offer">
                Offer Details – You are eligible to receive your 3 Free Credit Scores, and begin your trial membership with 
                Completecreditscores credit monitoring. <span class="bld">At the end of the 15-day trial period, your credit card, 
                    debit card will be charged $19.99 on a monthly basis unless you cancel.<br /><br/>

                    You can cancel by calling 1-800-000-0000.</span> 
            </p>
        </div>



    </form>
</div>
