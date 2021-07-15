<?php

require_once './data/database/database.php';
require_once './data/database/security.php';
$currentUser = isLoggedin();
if ($currentUser) {
    $articleDb = require_once './data/database/models/article_Db.php';
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $id = $_GET['id'] ?? '';

    if ($id) {
        $article = $articleDb->fetch($id);
        if ($article['author'] === $currentUser['id']) {
            $articleDb->deleteOne($id);
        }
    }
}
header('Location: /');
