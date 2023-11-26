<?php
defined("MDPPROJECT") || header('location: ' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/login", true, 301) && exit;
