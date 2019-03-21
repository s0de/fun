<?php
if (preg_match('/\.(?:png|jpg|jpeg|gif|woff|ttf|woff2|eot|js|css)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

include __DIR__ . '/www/index.php';