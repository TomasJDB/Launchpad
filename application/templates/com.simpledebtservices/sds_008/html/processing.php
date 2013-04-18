<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Simple Debt Services</title>
		<link type="text/css" href="/sds_008/css/site.css" rel="stylesheet" />
		<link type="text/css" href="/sds_008/css/form.css" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="/sds_008/css/style.css" media="all" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/sds_008/js/sds_processing.js" ></script>
	</head>
<?php flush(); ?>
	<body>
		<div id="mainContainer">
			<div id="mainCol">
				<div class="left">
					<div id="logo">
						<img src="/sds_008/img/clear.gif" width="266" height="113" alt=""/>
					</div>
					<ul id="list1">
						<li>
							<div class="tooltip" name="parent">
								<strong>Completely free analysis</strong>
							</div>
						</li>
						<li>
							<div class="tooltip" name="parent">
								<strong>State licensed &amp; certified Counselors</strong>
							</div>
						</li>
						<li>
							<div class="tooltip" name="parent">
								<strong> Learn about your debt relief options to lower your monthly payments, interest, and
								consolidate bills </strong>
							</div>
						</li>
						<li>
							<div class="tooltip" name="parent">
								<strong>At least $2,500 in credit card debt to qualify.</strong>
							</div>
						</li>
					</ul>
				</div>
				<div class="right">
					<div id="progress_bar">
						<div id="progress" style="width: 339px"></div>
						<div id="progress_text">
							100% Complete
						</div>
					</div>
					<div id="container">
			            <form action="https://app.leadconduit.com/v2/PostLeadAction" method="post" id="form">
							<div id="fourth_step">
								<div class="form">
									<div style="text-align: center; margin: 20px 0px; font-size: 20px; color: #fff; font-weight: bold;">
										Loading Your Options
									</div>
									<h3 style="color:white;text-align:justify;font-size:16px;margin:10px 0px;">Thanks! We have matched you with our preferred provider...</h3>
									<div class="head_text1">
										You're being matched to CareOne&#8480;, a BBB accredited service, to continue your debt analysis. <strong>CareOne Debt Relief Services Work.</strong>
									</div>
									<div class="head_text"><img src="/sds_008/img/careone-logo.png" />
										<span>The proof is in the numbers:</span>
										<ul id="list1">
											<li>
												CareOne has helped over 4.5 million people
											</li>
											<li>
												$719 million in debts paid down - 2009
											</li>
											<li>
												Solid relationships with over 249,000 creditors
											</li>
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
								</div>
							</div><!-- end fourth_step -->
						</form><!-- end form -->
					</div><!-- end container -->
				</div><!-- end #right -->
				<div class="clear"><img src="/sds_008/img/clear.gif" alt="" />
				</div>
			</div>
			<div id="footer">
				<br />
				<font class="weservice"> We Service:  Credit Cards, Personal Loans, Department Store Cards, Gas Cards,
					Utility Bills, Phone Bills, Medical Bills </font>
				<br />
				<img src="/sds_008/img/footerLine.gif" alt="" />
				<br />
				<div class="clear"><img src="/sds_008/img/clear.gif" alt="" />
				</div>
				<div class="line1">
					&copy;2011 SimpleDebtServices.com All rights reserved. <a href="/sds_008/sds_008/privacy" target="_blank">Privacy Policy</a>
				</div>
			</div>
		</div>
	</body>
</html>