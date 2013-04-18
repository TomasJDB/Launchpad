<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php echo $this->pageTitle; ?></title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--[if lt IE 9]>
            <script type="text/javascript" src="/js/modernizr-1.7.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" media="screen,projection" href="/lpo_001/css/style.css" />
        <link rel="stylesheet" type="text/css" media="screen,projection" href="/lpo_001/css/jquery-ui.css" />
        <!--
                <link rel="icon" type="image/x-icon" href="/ccl_001/img/favicon.ico" />
                <link rel="shortcut icon" href="/ccl_001/img/favicon.ico" />
        -->        
        <script src="/lpo_001/js/jquery.js" type="text/javascript"> </script> 
        <script src="/lpo_001/js/jquery-migrate.js"> </script>
        <script src="/lpo_001/js/jquery-ui.js" type="text/javascript"> </script>

    </head>
    <body>
        <!--start wrapper-->

        <div id="wrapper">
            <div class="header">
                <h1 class="red_wake_up">Wake Up With An Extra $2,500.00 In Your Bank Account!</h1>
                <hr/>
                <div class="timer_wrapper bigbg">
                    <h1>Congratulations, you are one step closer to receiving your loan!</h1>

                    <div class="timer_box">
                        <div class="clock"> </div>
                        <div class="timer_box_container">
                            Session will expire in <span id="clocks" class="timer">7 minutes and 39 seconds.</span>
                            Complete the form below to secure your loan.
                        </div>
                    </div>

                </div>
            </div>


            <div class="bod">
                <!--Start left pane -->
                <div class="left-pane">
                    <ul id="left-list">
                        <li><span class="one"> </span><span>Apply for a Loan</span></li>
                        <li><span class="two"> </span><span>Get Your Cash</span></li>
                    </ul>

                    <h2>Your information is safe with us:</h2>
                    <p class="light-gray">
                        This website uses 256-bit encryption which is high level
                        security used as a standard for the the US government
                        and National Security Agency (NSA) to protect sensitive
                        or secrete information.
                    </p>
                    <p class="light-gray">
                        Your information is not shared with any third party
                        unrelated to your service request.
                    </p>
                    <img id="godaddy" name="godaddy" src="/lpo_001/img/godaddy_site_seal.gif" alt="Godaddy Verified &amp; Secured" />
                </div>
                <!-- End left pane-->

                <!-- Start right pane -->

                <div class="right-pane">
                    <div id="rbm_personalloan_content">
                        <?php echo $content; ?>
                    </div>
                </div>
                <!-- End right pane -->

            </div>


        </div>

        <!-- end wrapper -->
        <!-- Scripts -->
        <script src="/lpo_001/js/date.js" type="text/javascript"> </script>
        <script src="/lpo_001/js/rbm-string.js" type="text/javascript"> </script>
        <script src="/lpo_001/js/rbm-autotab.js" type="text/javascript"> </script>
        <script src="/lpo_001/js/rbm-overlay.js" type="text/javascript"> </script>
        <script src="/lpo_001/js/gdaddy.js" type="text/javascript"> </script>
        <script src="/lpo_001/js/rbm-dropdown.js" type="text/javascript"> </script>
        <script src="/lpo_001/js/rbm-timer.js" type="text/javascript"> </script>
        <script src="/lpo_001/js/main.js" type="text/javascript"> </script>
    </body>
</html>