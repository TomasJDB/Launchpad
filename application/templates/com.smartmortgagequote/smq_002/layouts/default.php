<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Smart Mortgage Quote</title>
		<link href="/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" media="screen,projection" href="/css/jquery-ui.css" />
        <link rel="icon" type="image/x-icon" href="/smq_002/img/favicon.ico" />
        <link rel="shortcut icon" href="/smq_002/img/favicon.ico" />
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"> </script>
        <!-- using jQuery 1.9.0 genorates an error
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"> </script> -->
        <script src="//code.jquery.com/jquery-migrate-1.0.0.js"> </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"> </script>
	</head>
	<body>
		<div id="container">
			<div id="header"><img src="/smq_002/img/header.jpg" width="882" height="135" alt="Paying too much for your Loan?" /></div>
			<div id="form">
				<div id="form_content"><div id="rbmOffer"></div></div>
			</div>
			<div id="right_col">
				<img src="/smq_002/img/lowest_rates_top_lenders.jpg" width="506" height="105" /><img width="506" height="298" src="/smq_002/img/over_200_lenders.jpg" style="margin-top: -5px" />
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
        <script src="/smq_002/js/main.js" type="text/javascript"> </script>
	</body>
</html>