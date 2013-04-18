<div id="form-app-container">
    <div class="arrow"> </div>
    <div id="rbm_personalloan">
        <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
            <div id="rbm_personalloan_header">
                <p class="form-subtitle">$ <input type="text" id="rbm_personalloan_amount_pending" name="rbm_personalloan_amount_pending" class="money bld"  /><span class="small_stars">**</span> Loan Request Progress</p>
                <img src="/slq_001/img/locked.png" alt="locked" class="locked" align="left" /> <p class="progress" style="background-position: 0px -165px;"> </p>

                <div class="cover"> </div>
            </div>
            <div id="rbm_personalloan_content">
              
                <div class="section">
                    <label for="rbm_personalloan_user_name" class="full_plus">Create Your Username:</label>
                    <span class="subheading"><a href="javascript:void(0);" data-target="ssn" class="rbm_personalloan_overlay_open">Min. Req</a></span>
                    <input type="text" name="rbm_personalloan_user_name" id="rbm_personalloan_user_name" class="full_plus" />
                </div>
                <div class="section">
                    <label for="rbm_personalloan_user_password" class="full_plus">Create Your Password:</label>
                    <span class="subheading"><a href="javascript:void(0);" data-target="ssn" class="rbm_personalloan_overlay_open">Min. Req</a></span>
                    <input type="password" name="rbm_personalloan_user_password" id="rbm_personalloan_user_password" class="full_plus" />
                </div>
                <div class="section">
                    <label for="rbm_personalloan_user_password_verify" class="full_plus">Verify Your Password:</label>
                    <span class="subheading"><a href="javascript:void(0);" data-target="ssn" class="rbm_personalloan_overlay_open">Min. Req</a></span>
                    <input type="password" name="rbm_personalloan_user_password_verify" id="rbm_personalloan_user_password_verify" class="full_plus" />
                </div>
                <div class="section">
                    <a href="#">Tips for creating a secure password</a>
                    <br />
                    <br />
                    <br />
                </div>
                <div class="section">
                    <label for="rbm_personalloan_user_secret_question" class="full_plus">Choose a Secret Question:</label>


                    <select id="rbm_personalloan_user_secret_question" name="rbm_personalloan_user_secret_question" class="full_plus">
                        <option vlaue="">Choose</option>
                    </select>

                </div>
                <div class="section">
                    <label for="rbm_personalloan_user_secret_answer">Answer Question</label>
                    <span class="subheading"><a href="javascript:void(0);" data-target="ssn" class="rbm_personalloan_overlay_open">Min. Req</a></span>
                    <input type="text" class="full_plus" name="rbm_personalloan_user_secret_answer" id="rbm_personalloan_user_secret_answer" />
                </div>
                <div class="section">
                    <label for="rbm_personalloan_user_promotion_code" class="half">Promotion code:</label>
                    <input type="text" class="half" id="rbm_personalloan_user_promotion_code" name="rbm_personalloan_user_promotion_code" />
                </div>
            </div>
            <div id="rbm_personalloan_footer">
                <input type="submit" id="rbm_personalloan_submit_btn" value=""/>
            </div>
        </form>
        <div class="info">
            <h1 class="info-title">Free Credit Monitoring</h1>
            <img src="/slq_001/img/icon-personal.jpg" align="personal information" />
            <p>
                As our customer you ALSO receive 6 months of credit monitoring 
                at no cost. Simply create your username below and you will be 
                send an email conformation to active after your loan request.
            </p>
        </div>
        <div id="rbm_personalloan_lightbox" class="rbm_personalloan_overlay">
            <div id="rbm_personalloan_lightbox_content" class="rbm_personalloan_overlay_content">
                <div class="rbm_personalloan_overlay_txt">
                    <div id="lb-top-1">
                        <div> </div>
                        <h1 class="lb-status">ACCOUNT STATUS: <span class="green bld">PENDING</span></h1>
                        <h2 class="lb-secure">We’ve securely received your <span class="bld">Information.</span></h2>
                    </div>
                    <div id="lb-top-2">
                        <h3 class="lb-wait">PLEASE WAIT! <span class="bld">WE'RE SEARCHING LENDERS...</span></h3>
                    </div>
                    <p class="lb-txt green">
                        We appreciate Your Patience,
                        <br />
                        this process may take a few minutes…
                    </p>
                    <div id="lb-wr-load">
                        <img src="/slq_001/img/loading.gif" alt="" />
                    </div>
                    <p class="lb-txt">
                        Please <span class="u bld">do not</span> click the Back button or
                        <br />
                        close the browser window during this process
                    </p>
                    <p class="lb-txt2 blue">
                        Very Important: To Secure your Loan, <span class="u bld">SIGN</span> your Online Loan Document!
                    </p>
                    <div id="lb-footer">
                        <h4>Your Protection and Security are important to us!</h4>
                        <p>
                            All your data is being transferred over secure lines using the latest SSL technology and
                            we do NOT store your data after your session expires!
                            <br />
                            <br />
                        </p>
                        <p>
                            Payments are ALWAYS online - Our Lenders will NEVER call you to ask you for payment of any fees. NEVER manually transfer money to anyone as your loan fees and payments are all automatically debited for your protection!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            // <![CDATA[
            $('#rbm_personalloan_form').submit(function(){
                // Get a reference to this
                var el = $('#rbm_personalloan_lightbox');
                var content= el.find('#rbm_personalloan_lightbox_content');
                // Get the window height and width
                var winHeight = $(window).height();
                var boxHeight = content.height();
                // Store the original height in the element
                if( ! content.attr('data-orig-hght') ) { 
                    content.attr('data-orig-hght',boxHeight);
                }
                // Adjust the size if necessary
                if( winHeight < content.attr('data-orig-hght') + 200 ) {
                    content.css('margin-top',32);
                    content.height(winHeight-100);
                } else {
                    content.height(content.attr('data-orig-hght'));
                    content.css('margin-top',100);
                }
                // Fade in the content
                el.fadeIn('fast');
                // Pause just a little to let images come in
                var start = new Date().getTime();
                for (var i = 0; i < 1e7; i++) {
                    if ((new Date().getTime() - start) > 10){
                        break;
                    }
                }
                // Execute the submit
                return true;
            });
            // ]]>
        </script>
    </div>
