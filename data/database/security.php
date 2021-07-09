<?php

function isLoggedin()
{
    global $pdo;
    //$pdo = require_once './data/database/database.php';
    print_r($pdo);
    $sessionId = $_COOKIE['session'] ?? '';
    if ($sessionId) {
        $statementSession = $pdo->prepare('SELECT * FROM session WHERE id= :id');
        $statementSession->bindValue(':id', $sessionId);
        $statementSession->execute();
        $session = $statementSession->fetch();
        if ($session) {
            $statementUser = $pdo->prepare('SELECT * FROM user WHERE id=:id');
            $statementUser->bindValue(':id', $session['userId']);
            $statementUser->execute();
            $user = $statementUser->fetch();
        }
    }

    return $user ?? false;
}
