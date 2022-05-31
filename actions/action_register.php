<?php

    require_once(__DIR__ . '/../db/connectiondb.php');
    require_once(__DIR__ . '/../db/userclass.php');
    require_once(__DIR__ . '/../utils/session.php');

    $session = new Session();

    $db = getDatabaseConnection();

    $result = User::createNewUser($db, $_POST['username'], $_POST['name'], $_POST['address'], $_POST['phonenumber'], $_POST['password'], $_POST['confirmpassword'], $_POST['registertype']);

    if(isset($result['ERROR'])){
        $session->addMessage('error', $result['ERROR']);
    }

    //No error occurred
    if($result == null){
        $user = User::getUserWithPassword($db, $_POST['username'], $_POST['password']);

        //Starts session variables
        $session->setId($user->id);
        $session->setName($_POST['name']);
        $session->addMessage('success', 'Account created successfully!');
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>