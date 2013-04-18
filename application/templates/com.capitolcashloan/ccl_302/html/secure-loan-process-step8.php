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
            <p class="progress" style="background-position: 0px -147px;"> </p>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <label for="rbm_personalloan_license_number" class="half">Driver's License Number</label>
                <input type="text" name="rbm_personalloan_license_number" id="rbm_personalloan_license_number" class="half" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_license_state" class="half">State Issued From</label>
                <select name="rbm_personalloan_license_state" id="rbm_personalloan_license_state" class="half">
                    <option value=''>Choose</option>
                    <option value="AK">AK</option>
                    <option value="AL">AL</option>
                    <option value="AR">AR</option>
                    <option value="AZ">AZ</option>
                    <option value="CA">CA</option>
                    <option value="CO">CO</option>
                    <option value="CT">CT</option>
                    <option value="DC">DC</option>
                    <option value="DE">DE</option>
                    <option value="FL">FL</option>
                    <option value="GA">GA</option>
                    <option value="HI">HI</option>
                    <option value="IA">IA</option>
                    <option value="ID">ID</option>
                    <option value="IL">IL</option>
                    <option value="IN">IN</option>
                    <option value="KS">KS</option>
                    <option value="KY">KY</option>
                    <option value="LA">LA</option>
                    <option value="MA">MA</option>
                    <option value="MD">MD</option>
                    <option value="ME">ME</option>
                    <option value="MI">MI</option>
                    <option value="MN">MN</option>
                    <option value="MO">MO</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="NC">NC</option>
                    <option value="ND">ND</option>
                    <option value="NE">NE</option>
                    <option value="NH">NH</option>
                    <option value="NJ">NJ</option>
                    <option value="NM">NM</option>
                    <option value="NV">NV</option>
                    <option value="NY">NY</option>
                    <option value="OH">OH</option>
                    <option value="OK">OK</option>
                    <option value="OR">OR</option>
                    <option value="PA">PA</option>
                    <option value="RI">RI</option>
                    <option value="SC">SC</option>
                    <option value="SD">SD</option>
                    <option value="TN">TN</option>
                    <option value="TX">TX</option>
                    <option value="UT">UT</option>
                    <option value="VA">VA</option>
                    <option value="VT">VT</option>
                    <option value="WA">WA</option>
                    <option value="WI">WI</option>
                    <option value="WV">WV</option>
                    <option value="WY">WY</option>
                </select>
            </div>

            <div class="section">
                <label for="rbm_personalloan_birthdate" class="half date">Date of Birth<br /><span class="subheading">(mm/dd/yyyy)</span></label>
                <input type="text" class="datebox rbm_personalloan_autotab" id="rbm_personalloan_birthdate_month" name="rbm_personalloan_birthdate_month" data-next="rbm_personalloan_birthdate_day" maxlength="2" value="" />
                <span class="lg_gray">/</span>
                <input type="text" class="datebox rbm_personalloan_autotab" id="rbm_personalloan_birthdate_day" name="rbm_personalloan_birthdate_day" data-next="rbm_personalloan_birthdate_year" maxlength="2" value="" />
                <span class="lg_gray">/</span>
                <input type="text" class="datebox rbm_personalloan_autotab" id="rbm_personalloan_birthdate_year" name="rbm_personalloan_birthdate_year" data-validate="true" maxlength="4" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_ssn" class="half">
                    Social Security Number <span class="subheading">(9 Digits)</span><br />
                    <span class="subheading"><a href="javascript:void(0);" data-target="ssn" class="rbm_personalloan_overlay_open">Why?</a></span>
                </label>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_ssn_1" name="rbm_personalloan_ssn_1" data-next="rbm_personalloan_ssn_2" maxlength="3" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_ssn_2" name="rbm_personalloan_ssn_2" data-next="rbm_personalloan_ssn_3" maxlength="2" value="" />
                <span class="lg_gray">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_ssn_3" name="rbm_personalloan_ssn_3" data-validate="true" maxlength="4" value="" />
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
