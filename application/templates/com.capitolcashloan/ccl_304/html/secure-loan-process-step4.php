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
            <p class="progress" style="background-position: 0px -63px;"> </p>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <label for="rbm_personalloan_address_1" class="full">Street Address 1</label>
                <input type="text" name="rbm_personalloan_address_1" id="rbm_personalloan_address_1" class="full" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_address_2" class="full">Street Address 2</label>
                <input type="text" name="rbm_personalloan_address_2" id="rbm_personalloan_address_2" class="full" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_city" class="half">City</label>
                <input type="text" name="rbm_personalloan_city" id="rbm_personalloan_city" class="half" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_residence_type" class="half">Residence Type</label>
                <select name="rbm_personalloan_residence_type" id="rbm_personalloan_residence_type" class="half">
                    <option value="">Choose</option>
                    <option value="rent">Rental</option>
                    <option value="own">Home Owner</option>
                </select>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" > </a>
            <input type="submit" id="rbm_personalloan_next_btn" value=""/>
        </div>
    </form>
</div>
