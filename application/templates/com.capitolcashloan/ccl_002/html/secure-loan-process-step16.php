<div id="rbm_personalloan">
    <form id="rbm_personalloan_form" action="/@@template@@/@@action@@" method="post">
        <div id="rbm_personalloan_header">
            <p>Your Loan Request Progress</p>
            <p class="progress" style="background-position: 0px -169px;"> </p>
        </div>
        <div id="rbm_personalloan_content">
            <div class="section">
                <p class="full center headline_shadow">
                    We are <span class="emphasis">READY</span> to submit your application in order to recieve multiple offers of cash and credit.
                </p>
            </div>
            <div class="section">
                <label for="rbm_personalloan_maiden_name" class="half">Mother's Maiden Name?</label>
                <input type="text" name="rbm_personalloan_maiden_name" id="rbm_personalloan_maiden_name" class="half" value="" />
            </div>
            <div class="section">
                <label for="rbm_personalloan_citizen" class="half">Are you a U.S. citizen?</label>
                <select name="rbm_personalloan_citizen" id="rbm_personalloan_citizen" class="half">
                    <option value=''>Choose</option>
                    <option value='true'>Yes</option>
                    <option value='false'>No</option>
                </select>
            </div>
            <div class="section">
                <label for="rbm_personalloan_consent" class="privacy_text"><b>Yes, please present information to all lenders</b>, including short term cash loan lenders if your system is unable to match me with a prime loan provider.</label>
                <input type="checkbox" name="rbm_personalloan_consent" id="rbm_personalloan_consent"/>
            </div>
        </div>
        <div id="rbm_personalloan_footer">
            <input type="submit" id="rbm_personalloan_submit_btn" value=""/>
        </div>
    </form>
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
                    <img src="/ccl_002/img/loading.gif" alt="" />
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
