<?php

$indexRequiredFile = "app/appInit.php";
if (file_exists($indexRequiredFile)) {
    require_once("app/appInit.php");
} else {
    header("HTTP/1.0 404 Not Found");
    exit("An error occurred, the required file (" . $indexRequiredFile . ") does not exist.");
}
