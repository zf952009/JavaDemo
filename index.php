<?php
//统一设置编码，设置为utf-8
header("Content-type:text/html;charset=utf-8");
if (version_compare(PHP_VERSION,'5.3.0','<'))die('repuire PHP > 5.3.0 !');

define('APP_DEBUG',true);

define('APP_PATH','./Application/');

require './Think PHP/ThinkPHP.php';