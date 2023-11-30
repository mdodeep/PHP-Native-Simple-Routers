<?php

$REQUIRED_FILE_CORE = "app/core/"; // Core
$REQUIRED_FILE_CONFIG = "app/config/"; // Confing
$REQUIRED_FILE_HELPER = "app/helper/"; // Helper


require_once($REQUIRED_FILE_CONFIG . "application.php");
//require_once($REQUIRED_FILE_CONFIG . "database.php");

// Important line! Do not delete. Contains the router core
require_once($REQUIRED_FILE_CORE . "router/router.php");
// Important line! Do not delete. Contains the router core