<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px -36px;"> </p>
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
