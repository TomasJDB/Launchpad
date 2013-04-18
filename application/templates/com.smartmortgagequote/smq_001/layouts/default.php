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
        <link rel="stylesheet" type="text/css" media="screen,projection" href="/smq_001/css/font.css" />
        <link rel="stylesheet" type="text/css" media="screen,projection" href="/smq_001/css/style.css" />
        <link rel="stylesheet" type="text/css" media="screen,projection" href="/smq_001/css/jquery-ui.css" />
        <link rel="icon" type="image/x-icon" href="/smq_001/img/favicon.ico" />
        <link rel="shortcut icon" href="/smq_001/img/favicon.ico" />

        <script src="/smq_001/js/jquery.js" type="text/javascript"> </script> 
        <script src="/smq_001/js/jquery-migrate.js"> </script>
        <script src="/smq_001/js/jquery-ui.js" type="text/javascript"> </script>


    </head>
    <body>
        <div id="container_page">			
            <div id="left_col">
                <img src="/smq_001/img/logo.jpg" width="427" height="158" />
                <img src="/smq_001/img/left_col.jpg" width="427" height="488" style="margin-top: -5px;" />
            </div>
            <div id="right_col">
                <div><img src="/smq_001/img/form_top.jpg" height="96" /></div>
                <div id="form_bg" style="margin-top: -5px;">
                    <div id="rbmOffer"><span style="display: none">test</span></div>
                </div>
                <div>
                    <img src="/img/right_col_bot.jpg" width="529" height="150"  />
                </div>
            </div>			
            <div id="container_footer">
                <div id="footer_content">
                    <p>By clicking the button above you agree to be matched with up to 5 lenders and for them to contact you even if your telephone
                        number is on a corporate, state, or the National Do Not Call Registry and you agree to our Terms of Use and Privacy Statement.</p>
                    <div id="footer-credits">
                        <div id="copyright">
                            <p></p>
                            <p>© Copyright 2013 SmartMortgageQuote. All Rights Reserved.</p>
                        </div>
                        <div id="credit"> </div>
                    </div>
                    <p></p>
                </div>			
            </div>		
        </div>		
        <script type="text/javascript" src="https://rbmleads.com/mortgage/v3/js/"></script>
        <script type="text/javascript">
            // Include
            var rbmInclude = new RBMMortgage({ 
                anchor: 'rbmOffer',					  
                affid: '200001',
                c1: '',
                c2: '',
                c3: ''
            });
            // Google Analytics
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-20918501-2']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <script src="/js/date.js" type="text/javascript"> </script>
        <script src="/js/rbm-string.js" type="text/javascript"> </script>
        <script src="/js/rbm-autotab.js" type="text/javascript"> </script>
        <script src="/js/rbm-overlay.js" type="text/javascript"> </script>
        <script src="/smq_001/js/main.js" type="text/javascript"> </script>
    </body>
</html>                                                                                                   