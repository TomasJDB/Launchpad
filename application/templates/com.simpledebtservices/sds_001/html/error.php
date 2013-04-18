<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex nofollow" />
<title>SimpleDebtServices | Error</title>
<link rel="stylesheet" type="text/css" href="/sds_001/css/style.css"/>
<!--[if IE]><link rel="stylesheet" type="text/css" 
href="/sds_001/css/ie.css"><![endif]-->
<script type="text/javascript" src="/sds_001/js/jquery-1.4.4.min.js" ></script>
<script type="text/javascript" src="/sds_001/js/sds_main.js" ></script>
</head>
<?php flush(); ?>
<body>
<div id="wrapper">
  <div id="header">
    <div class="logo_section">
      <a href="/"><img src="/sds_001/img/logo.jpg" alt="logo"/></a>
    </div>
    <div class="header_content">
      <span>Immediate Debt Assistance:1-(866) 866-6153</span><br />
      <img src="/sds_001/img/secure.jpg" alt="secure" class="secure"/>
      <img src="/sds_001/img/godaddy_site_seal.gif" alt="godaddy" id="godaddy" class="godaddy"/>
      <img src="/sds_001/img/privacy.gif" alt="private" class="privacy"/>
    </div>
  </div>
  <div id="page">
    <div id="page_bg_screen">
      <div id="page_top_section">
        <div class="page_top_inner">
          <div class="debt_analysis_section">
          <div style="padding: 20px; white-space:wrap">
            <h1>An error occurred</h1> 
            <br />
            <h2>@@message@@</h2> 
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
  <br /><br /><br /><br /><br /><br /><br /><br />
  <?php  if ('production' != APPLICATION_ENVIRONMENT) { ?> 
<?php $this->pageTitle=$this->_domain->full_name . ' - Error'; ?>
<h2>Error @@code@@</h2>

<div class="error">
@@message@@
</div>
@@trace@@
<?php } ?>
  <div id="footer">
    <div class="content">
      <p>Immediate Debt Assistance: 1-(866) 866-6153</p>
      <span>&copy;2011 SimpleDebtServices.com All rights reserved.</span>
      <ul>
        <li><a href="/sds_001/privacy">Privacy Policy</a></li>
      </ul>
    </div>
  </div>
</div>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20918501-1']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
