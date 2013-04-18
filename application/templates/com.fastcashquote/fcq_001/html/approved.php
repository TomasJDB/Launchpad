<div id="rbm_personalloan">
    <div id="rbm_personalloan_plain_container">
        <div class="section"><img src="/fcq_001/img/approved_hdr.png" alt="" /> </div>
        <div class="section">
            <p class="color_box center headline">
                You Have been Matched with a Lender
            </p>
        </div>
        <div class="section">
            <div class="loader">
                <img src="/fcq_001/img/loading.gif" alt="" />
            </div>
        </div>
        <div class="section">
            <p class="fine_print center navy"><b>
YOU ARE BEING CONNECTED TO COMPLETE YOUR LOAN            </b></p>
        </div>
        <div class="section">
            <ul class="actions">
                <li class="active">Read and review the terms of your loan before you click the <span class="teal">GET MY CASH</span> button</li>
                <li class="active">Complete &amp; electronically sign the documents on the next page to <span class="teal">recieve your cash in 24 hours or less</span></li>
            </ul>
        </div>
        <div class="section">
            <p class="fine_print center" style="color: #9D9D9D;">
                If you are not automatically redirected in 10 seconds, please <a href="@@dest_url@@">click here</a>.
            </p>
        </div>
        @@ppa_pixel@@
    </div>
    <script type="text/javascript">
        //<![CDATA[
        
        if (navigator.appName == "Microsoft Internet Explorer") {
            $(window).load(function () { 
                window.location = '@@dest_url@@';
            });
        }
        else {
            window.addEventListener('load', function () { 
                window.location = '@@dest_url@@';
            }, false);
        }
        
        //]]>
    </script>
</div>
