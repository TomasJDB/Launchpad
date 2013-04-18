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
            <p class="progress" style="background-position: 0px -84px;"> </p>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <p class="full text-center headline_shadow">
                    Enter your next two pay dates:
                </p>
            </div>
            <div class="section">
                <label for="rbm_personalloan_pay_date_1" class="half date">Pay Date 1<br /><span class="subheading">(mm/dd/yyyy)</span></label>
                <input type="text" name="rbm_personalloan_pay_date_1" id="rbm_personalloan_pay_date_1" class="half calendar" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_pay_date_2" class="half date">Pay Date 2<br /><span class="subheading">(mm/dd/yyyy)</span></label>
                <input type="text" name="rbm_personalloan_pay_date_2" id="rbm_personalloan_pay_date_2" class="half calendar" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_pay_schedule" class="full">
                    How often do you get paid?<br />
                    <span class="subheading">If you do not see your choice, please recheck your pay dates</span>
                </label>
                <select name="rbm_personalloan_pay_schedule" id="rbm_personalloan_pay_schedule" class="full">
                    <option value="">Choose</option>
                    <option value="weekly">Every 1 Week</option>
                    <option value="biweekly">Every 2 Weeks</option>
                    <option value="semimonthly">Twice a Month</option>
                    <option value="monthly">Monthly</option>
                </select>
            </div>

            <div class="section">
                <label for="rbm_personalloan_residence_date" class="full">When did you move into your current residence? <span class="subheading">(approximate)</span></label>
                <select name="rbm_personalloan_residence_date_month" id="rbm_personalloan_residence_date_month" class="date_drop">
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
                <select name="rbm_personalloan_residence_date_year" id="rbm_personalloan_residence_date_year" class="date_drop" data-validate="true">
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
        <div id="rbm_personalloan_ssn" class="rbm_personalloan_overlay">
            <div id="rbm_personalloan_ssn_content" class="rbm_personalloan_overlay_content">
                <div class="rbm_personalloan_overlay_txt">
                    <h1>SOCIAL SECURITY NUMBER</h1>
                    <h2>WHY IS IT NEEDED?</h2>
                    <p>
                        This information is used to verify your identity prior to being serviced by the lender. We do not store this private information in our data base to ensure your data is not compromised.
                    </p>
                </div>
                <div class="rbm_personalloan_overlay_close" data-target="ssn"> </div>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
