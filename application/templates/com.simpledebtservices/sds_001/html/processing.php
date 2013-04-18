<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex nofollow" />
<title>SimpleDebtServices | Processing</title>
<link rel="stylesheet" type="text/css" href="/sds_001/css/style.css"/>
<!--[if IE]><link rel="stylesheet" type="text/css" 
href="/sds_001/css/ie.css"><![endif]-->
<script type="text/javascript" src="/sds_001/js/jquery-1.4.4.min.js" ></script>
<script type="text/javascript" src="/sds_001/js/sds_processing.js" ></script>
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
        <div class="page_top_inner2">
          <div class="debt_analysis_section">
            <form action="https://app.leadconduit.com/v2/PostLeadAction" method="post" id="lead_form">
              <div id="loader">
                <img src="/sds_001/img/logo_careone.png" /><br />
                <p class="notice">We are Preparing Your Debt Plan...</p>
                <img src="/sds_001/img/ajax-loader.gif" /><br />
                <p class="info">
                  You're being matched to CareOne&#8480;, a BBB accredited service, to continue your 
                  debt analysis. If you are not automatically redirected in five seconds, please click
                  <input type="submit" id="submit_link" value="here" />.
                </p>
                <p class="headline">Our Debt Relief Services Work</p>
                <p class="subhead">The proof is in the numbers:</p>
                <ul>
                  <li>CareOne providers have helped over 4.5 million people</li>
                  <li>Our customers paid down $719 million in debts in 2009</li>
                  <li>We have solid relationships with over 249,000 creditors</li>
                </ul>
              </div>
              <input type="hidden" name="Firstname" value="<?php echo $this->first_name; ?>" />
              <input type="hidden" name="LastName" value="<?php echo $this->last_name; ?>" />
              <input type="hidden" name="Emailaddress" value="<?php echo $this->email; ?>" />
              <input type="hidden" name="PhoneAreaCode" value="<?php echo $this->phone_area; ?>" />
              <input type="hidden" name="phoneprefix" value="<?php echo $this->phone_exchange; ?>" />
              <input type="hidden" name="Phonelast4" value="<?php echo $this->phone_extension; ?>" />
              <input type="hidden" name="Postalcode" value="<?php echo $this->zip; ?>" />
              <input type="hidden" name="debtamountselect" value="<?php echo $this->debt_amount; ?>" />
              <input type="hidden" name="xxAccountId" value="051nq5xpi" />
              <input type="hidden" name="xxCampaignId" value="05167z2i5" />
              <input type="hidden" name="CampaignID" value="26517" />
              <input type="hidden" name="ldplead" value="1" />
              <input type="hidden" name="affid" value="<?php echo $this->affid; ?>" />
              <input type="hidden" name="subid" value="<?php echo $this->cid; ?>" />
              <input type="hidden" name="utm_source" value="RBM SDS_001" />
              <input type="hidden" name="utm_medium" value="affiliate" />
              <input type="hidden" name="utm_campaign" value="transition" />
              <input type="hidden" name="xxRedir" value="https://www.careonecredit.com/rbmpost" />
              <input type="hidden" name="xxRedirVerbose" value="true" />
            </form>
          </div>
        </div>
        <div class="page_top_inner2_btm_cap"></div>
      </div>
    </div>
  </div>
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
