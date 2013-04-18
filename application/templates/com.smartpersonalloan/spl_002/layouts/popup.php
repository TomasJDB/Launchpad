<?php
    $arr = explode('|',$this->pageTitle);
    $heading = trim($arr[0]);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title><?php echo $this->pageTitle; ?></title>
        <link rel="stylesheet" media="screen" type="text/css" href="/spl_002/css/popup.css" />
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
