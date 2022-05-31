<?php

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/userclass.php');
    require_once(__DIR__ . '/../utils/session.php');

    $db = getDatabaseConnection();

    $result = User::createNewUser($db, $_POST['username'], $_POST['name'], $_POST['address'], $_POST['phonenumber'], $_POST['password'], $_POST['confirmpassword'], $_POST['registertype']);

    if($result == false){
        echo "Ocorreu um erro ao efetuar o registro";
    }
    else{
        echo "Registro efetuado com sucesso";
    }
?>