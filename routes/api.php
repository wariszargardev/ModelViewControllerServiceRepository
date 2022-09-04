<?php
/*
 This is just for testing we can dynamically call routers file and call them in require
 */
$files = glob(__DIR__ . "/api/*.php");
foreach ($files as $file) {
    require($file);
}
