<?php

$REQUIRED_FILE = "app/init.php";
if (file_exists($REQUIRED_FILE)) {
    require_once("app/init.php");
} else {
    header("HTTP/1.0 404 Not Found");
    exit("An error occurred (error code E100), the required file (" . $REQUIRED_FILE . ") does not exist.");
}
