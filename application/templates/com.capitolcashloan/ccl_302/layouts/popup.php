<?php
    $arr = explode('|',$this->pageTitle);
    $heading = trim($arr[0]);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $this->pageTitle; ?></title>
        <link rel="stylesheet" media="screen" type="text/css" href="/ccl_302/css/popup.css" />
        <link rel="shortcut icon" href="/img/favicon.ico" />
    </head>
    <body>
        <div id="head">
            <span class="title"><?php echo $heading; ?></span>
        </div>
        <div id="container">
            <div class="content">
                <?php echo $content; ?>
            </div>
        </div>
    </body>
</html>
