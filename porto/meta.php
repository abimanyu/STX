<?php
/**
* @package      Qapuas 5.0
* @version      Dev : 5.0
* @author       Rosi Abimanyu Yusuf <bima@abimanyu.net>
* @license      http://creativecommons.org/licenses/by-nc/3.0/ CC BY-NC 3.0
* @copyright    2015
* @since        File available since 5.0
* @category     Themes Meta Header
*/
echo "<!doctype html>
<html class=\"fixed\">
<head>
<meta charset=\"UTF-8\">
<title>".c_APP." - ".c_CLIENT."</title>
<meta name=\"keywords\" content=\"".c_APP." Applications\" />
<meta name=\"description\" content=\"".c_APP." - Admin Pages\">
<meta name=\"author\" content=\"abimanyu.net\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\" />
<link href=\"http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light\" rel=\"stylesheet\" type=\"text/css\">";

ITEM_HEAD($ITEM_HEAD);

echo "
<link rel='apple-touch-icon' href='".IMAGES."favicon.png' />
<link rel='icon' type='image/vnd.microsoft.icon' href='".IMAGES."favicon.ico' />
</head>";
?>