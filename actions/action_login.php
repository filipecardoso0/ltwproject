<?php

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once (__DIR__ . '/../db/userclass.php');

    $db = getDatabaseConnection();

    $user = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);


    if($user){
    $_SESSION['id'] = $user->id;
        echo('Sessao inciada com sucesso');
    }
    else{
        session_destroy();
        echo('Falha ao iniciar sessao');
    }

?>