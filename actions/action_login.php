<?php

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once (__DIR__ . '/../db/userclass.php');
    require_once(__DIR__ . '/../utils/session.php');

    $session = new Session();

    $db = getDatabaseConnection();

    $user = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);

    if($user){
        $session->setId($user->id);
        $session->setName($user->name);
        $session->addMessage('success', 'Login efetuado com sucesso');
    }
    else{
        $session->addMessage('error', 'Wrong data provided');
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>