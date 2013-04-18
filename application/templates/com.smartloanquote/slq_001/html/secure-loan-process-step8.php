<div id="form-app-container">
    <div class="arrow"> </div>
<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p class="form-subtitle">$ <input type="text" id="rbm_personalloan_amount_pending" name="rbm_personalloan_amount_pending" class="money bld"  /><span class="small_stars">**</span> Loan Request Progress</p>
            <img src="/slq_001/img/locked.png" alt="locked" class="locked" align="left" /> <p class="progress" style="background-position: 0px -88px;"> </p>
            <div class="cover"> </div>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <label for="rbm_personalloan_employ_name" class="full_plus">Employer Name</label>
                <input type="text" name="rbm_personalloan_employ_name" id="rbm_personalloan_employ_name" class="full_plus" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_work_phone" class="full_plus">Work Phone</label>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_work_phone_area" name="rbm_personalloan_work_phone_area" data-next="rbm_personalloan_work_phone_exchange" maxlength="3" value="" />
                <span class="white">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_work_phone_exchange" name="rbm_personalloan_work_phone_exchange" data-next="rbm_personalloan_work_phone_extension" data-prev="work_phone_area" maxlength="3" value="" />
                <span class="white">-</span>
                <input type="text" class="phone rbm_personalloan_autotab" id="rbm_personalloan_work_phone_extension" name="rbm_personalloan_work_phone_extension" maxlength="4" value="" />
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <a href="@@prev@@" id="rbm_personalloan_back_btn" >BACK</a>
            <input type="submit" id="rbm_personalloan_next_btn" value="next"/>
        </div>
    </form>
    <div class="info">
        <h1 class="info-title">Job Info</h1>
        <img src="/slq_001/img/icon-job.jpg" align="personal information" />
        <p>Providing your employer information will greatly increase your chance of loan approval, as an additional means of necessary communication.</p>
    </div>
</div>
