<?php

define('PNDPATH', true);

$REQUIRED_FILE_CONFIGURATION = dirname(__DIR__) . '/app/configuration/'; // Confing
$REQUIRED_FILE_CORE = dirname(__DIR__) . '/app/core/'; // Core
$REQUIRED_FILE_HELPER = dirname(__DIR__) . '/app/helper/'; // Helper

require_once($REQUIRED_FILE_CONFIGURATION . 'appConfiguration.php');
require_once($REQUIRED_FILE_HELPER . 'generalFunction.php');
require_once($REQUIRED_FILE_CORE . 'appRouter.php');
