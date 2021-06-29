<?php

$articleDb = require_once './data/database/models/article_Db.php';
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$id = $_GET['id'] ?? '';

if ($id) {
    $articleDb->deleteOne($id);
}
header('Location: /');
