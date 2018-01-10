#!/usr/bin/php
<?php
error_reporting(E_ALL ^ E_NOTICE);
require(__DIR__ .'/../params.php');
$oApp = new websioux\nxtphpclient\MyCNxt;
$oApp->aInput = array('requestType'=>'getState');
$oApp->getResponse();
print_r($oApp);
