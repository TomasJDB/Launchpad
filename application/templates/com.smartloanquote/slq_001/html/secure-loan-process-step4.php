<div id="form-app-container">
    <div class="arrow"> </div>
<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p class="form-subtitle">$ <input type="text" id="rbm_personalloan_amount_pending" name="rbm_personalloan_amount_pending" class="money bld"  /><span class="small_stars">**</span> Loan Request Progress</p>
            <img src="/slq_001/img/locked.png" alt="locked" class="locked" align="left" /> <p class="progress" style="background-position: 0px -33px;"> </p>
            <div class="cover"> </div>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <label for="rbm_personalloan_address_1" class="full_plus">Street Address 1</label>
                <input type="text" name="rbm_personalloan_address_1" id="rbm_personalloan_address_1" class="full_plus" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_address_2" class="full_plus">Street Address 2</label>
                <input type="text" name="rbm_personalloan_address_2" id="rbm_personalloan_address_2" class="full_plus" value="" />
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
            <a href="@@prev@@" id="rbm_personalloan_back_btn" >BACK</a>
            <input type="submit" id="rbm_personalloan_next_btn" value="next"/>
        </div>
    </form>
    <div class="info">
        <h1 class="info-title">Contact Info</h1>
        <img src="/slq_001/img/icon-contact.jpg" align="personal information" />
        <p>We may use this information to communicate with you about your loan, as well as verify identity.</p>
    </div>
</div>
