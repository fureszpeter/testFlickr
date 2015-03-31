<?php
/** @var Furesz\App $app */
$app = require_once __DIR__ . "/../src/bootstrap.php";

header('Content-Type: application/javascript');
readfile($app->getAppRoot() . "/vendor/components/jquery/jquery.min.js");