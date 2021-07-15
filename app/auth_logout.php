<?php

require_once './data/database/database.php';
$authDB = require_once './data/database/security.php';

$sessionId = $_COOKIE['session'];
if ($sessionId) {
    $authDB->logout($sessionId);
    header('Location: /auth_login.php');
}
